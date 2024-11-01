<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\FooterMenuSection;
use App\Models\FooterMenuSectionItem;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Cache;

class FooterMenuSectionController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = FooterMenuSection::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('name', fn($row) => $row->name)
                ->addColumn('action', function($row) {
                    return '<a href="'.route('backend.footer-menu-sections.edit', $row->id).'" class="edit btn btn-primary btn-sm">Edit</a>
                            <button class="btn btn-danger btn-sm delete" data-id="'.$row->id.'">Delete</button>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.footer-menu-sections.index');
    }

    public function create()
    {
        return view('backend.footer-menu-sections.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);

        FooterMenuSection::create(['name' => $request->name]);

        Cache::forget('footer-menu-sections');

        return redirect()->route('backend.footer-menu-sections.index')
                         ->with('success', 'Footer Menu Section created successfully.');
    }

    public function edit(FooterMenuSection $footerMenuSection)
    {
        return view('backend.footer-menu-sections.edit', compact('footerMenuSection'));
    }

    public function update(Request $request, FooterMenuSection $footerMenuSection)
    {
        $request->validate(['name' => 'required|string|max:255']);

        Cache::forget('footer-menu-sections');

        $footerMenuSection->update(['name' => $request->name]);
        return redirect()->route('backend.footer-menu-sections.index')
                         ->with('success', 'Footer Menu Section updated successfully.');
    }

    public function destroy($id)
    {
        $footerMenuSection = FooterMenuSection::find($id);
        if ($footerMenuSection) {

            FooterMenuSectionItem::where('footer_menu_section_id', $id)->delete();
            
            $footerMenuSection->delete();

            Cache::forget('footer-menu-sections');

            return response()->json(['success' => 'Footer Menu Section deleted successfully.']);
        }
        return response()->json(['error' => 'Footer Menu Section not found.'], 404);
    }
}
