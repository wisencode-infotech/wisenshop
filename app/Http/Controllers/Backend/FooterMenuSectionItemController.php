<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\FooterMenuSectionItem;
use App\Models\FooterMenuSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class FooterMenuSectionItemController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = FooterMenuSectionItem::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('name', fn($row) => $row->name)
                ->addColumn('url', fn($row) => $row->url ?? '-')
                ->addColumn('slug', fn($row) => $row->slug)
                ->addColumn('is_external', fn($row) => $row->is_external ? '<span class="badge bg-success">Yes</span>' : '<span class="badge bg-danger">No</span>')
                ->addColumn('is_system_built', fn($row) => $row->is_system_built ? '<span class="badge bg-primary">Yes</span>' : '<span class="badge bg-secondary">No</span>')
                ->addColumn('status', fn($row) => $row->status ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-warning">Inactive</span>')
                ->addColumn('created_at', fn($row) => $row->created_at->format('Y-m-d H:i:s'))
                ->addColumn('action', function($row) {
                    return '
                        <a href="'.route('backend.footer-menu-section-item.edit', $row->id).'" class="edit btn btn-primary btn-sm">Edit</a>
                        <button class="btn btn-danger btn-sm delete" data-id="'.$row->id.'">Delete</button>
                    ';
                })
                ->rawColumns(['is_external', 'is_system_built', 'status', 'action'])
                ->make(true);
        }
        return view('backend.footer-menu-section-items.index');
    }

    public function create()
    {
        $footerMenuSections = FooterMenuSection::all(); // Retrieve sections for the dropdown
        return view('backend.footer-menu-section-items.create', compact('footerMenuSections'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'footer_menu_section_id' => 'required|exists:footer_menu_sections,id',
            'is_external' => 'required|boolean',
            'is_system_built' => 'required|boolean',
            'status' => 'required|boolean',
            'url' => 'required_if:is_external,1|nullable',
            'slug' => 'required_if:is_external,0|unique:footer_menu_section_items,slug',
            // 'content' => 'required_if:is_external,0|nullable|string|required_if:is_system_built,0',
        ], [
            'name.required' => 'The name field is required.',
            'footer_menu_section_id.required' => 'The footer menu section field is required.',
            'footer_menu_section_id.exists' => 'The selected footer menu section does not exist.',
            'is_external.required' => 'The external link option is required.',
            'is_external.boolean' => 'The external link option must be true or false.',
            'is_system_built.required' => 'The system built option is required.',
            'is_system_built.boolean' => 'The system built option must be true or false.',
            'status.required' => 'The status field is required.',
            'status.boolean' => 'The status field must be true or false.',
            'url.required_if' => 'The URL field is required when the external link is set to yes.',
            'slug.required_if' => 'The slug field is required when the external link is set to no.',
            'slug.unique' => 'The slug has already been taken.',
        ]);


        FooterMenuSectionItem::create([
            'name' => $request->name,
            'url' => $request->is_external == 1 ? $request->url : null,
            'slug' => $request->is_external == 0 ? $request->slug : null,
            'is_external' => $request->is_external,
            'is_system_built' => $request->is_external == 1 ? 0 : $request->is_system_built,
            'footer_menu_section_id' => $request->footer_menu_section_id,
            'content' => $request->content,
            'status' => $request->status
        ]);

        return redirect()->route('backend.footer-menu-section-item.index')
                         ->with('success', 'Item created successfully.');
    }

    public function edit(FooterMenuSectionItem $footer_menu_section_item)
    {
        $footerMenuSections = FooterMenuSection::all();
        return view('backend.footer-menu-section-items.edit', compact('footer_menu_section_item', 'footerMenuSections'));
    }

    public function update(Request $request, FooterMenuSectionItem $footer_menu_section_item)
    {
        $request->validate([
            'name' => 'required|string',
            'footer_menu_section_id' => 'required|exists:footer_menu_sections,id',
            'is_external' => 'required|boolean',
            'is_system_built' => 'required|boolean',
            'status' => 'required|boolean',
            'url' => 'required_if:is_external,1|nullable',
            'slug' => 'required_if:is_external,0|unique:footer_menu_section_items,slug,' . $footer_menu_section_item->id,
            // 'content' => 'required_if:is_external,0|nullable|string|required_if:is_system_built,0',
        ], [
            'name.required' => 'The name field is required.',
            'footer_menu_section_id.required' => 'Please select a footer menu section.',
            'footer_menu_section_id.exists' => 'The selected footer menu section does not exist.',
            'is_external.required' => 'Please specify if the item is external.',
            'is_system_built.required' => 'Please specify if the item is system built.',
            'status.required' => 'Please select the status of the item.',
            'url.required_if' => 'The URL field is required when the item is external.',
            'slug.required_if' => 'The slug field is required when the item is not external.',
            'slug.unique' => 'The slug must be unique.',
            // 'content.required_if' => 'Content is required when the item is not external and not system built.',
        ]);

        $footer_menu_section_item->update([
            'name' => $request->name,
            'url' => $request->is_external == 1 ? $request->url : null,
            'slug' => $request->is_external == 0 ? $request->slug : null,
            'is_external' => $request->is_external,
            'is_system_built' => $request->is_external == 1 ? 0 : $request->is_system_built,
            'footer_menu_section_id' => $request->footer_menu_section_id,
            'content' => $request->content,
            'status' => $request->status
        ]);

        $cache_key = 'page_content_' . $footer_menu_section_item->slug;

        Cache::forget($cache_key);

        return redirect()->route('backend.footer-menu-section-item.index')
                         ->with('success', 'Item updated successfully.');
    }

    public function destroy($id)
    {
        $item = FooterMenuSectionItem::findOrFail($id);
        $item->delete();
        return response()->json(['success' => 'Item deleted successfully.']);
    }
}
