<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\EmailTemplate;
use App\Models\EmailTemplateCategory;
use App\Models\Language;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class EmailTemplateController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = EmailTemplate::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn() // Adds the row index
                ->addColumn('name', function($row) {
                    return $row->name;
                })
                ->addColumn('email_template_category', function($row) {
                    return $row->category->name ?? '';
                })
                ->addColumn('subject', function($row) {
                    return $row->subject;
                })
                ->addColumn('body_html', function($row) {
                    return $row->body_html;
                })
                ->addColumn('body_text', function($row) {
                    return $row->body_text;
                })
                ->addColumn('locale', function($row) {
                    return $row->locale;
                })
                ->addColumn('is_active', function($row) {
                    
                    if ($row->is_active == 1) {
                        $html = '<span class="badge rounded-pill badge-soft-success font-size-12">Active</span>';
                    } else {
                        $html = '<span class="badge rounded-pill badge-soft-danger font-size-12">In Active</span>';
                    }
                    return $html;
                })
                ->addColumn('action', function($row) {
                    $btn = '<a href="'.route('backend.email-templates.edit', $row->id).'" class="edit btn btn-primary btn-sm">Edit</a>';
                    $btn .= ' <button class="btn btn-danger btn-sm delete" data-id="'.$row->id.'">Delete</button>';
                    return $btn;
                })
                ->rawColumns(['name', 'action', 'subject', 'body_html', 'body_text', 'locale', 'is_active'])
                ->make(true);
        }

        $email_templates = EmailTemplate::all();
        return view('backend.email-template.index', compact('email_templates'));
    }

    /**
     * Show the form for creating a new category.
     */
    public function create()
    {
        $locales = Language::select('code')->get();
        $categories = EmailTemplateCategory::where('is_active', 1)->get();
        return view('backend.email-template.create', compact('locales', 'categories')); // Return the create view
    }

    /**
     * Store a newly created category in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255|unique:email_templates,name',
            'email_template_category_id' => 'required',
            'subject' => 'required',
            'body_html' => 'required',
            'body_text' => 'required',
            'locale' => 'required'
        ]);

        EmailTemplate::create([
            'name' => $request->name,
            'email_template_category_id' => $request->email_template_category_id,
            'subject' => !empty($request->subject) ? $request->subject : null,
            'body_html' => !empty($request->body_html) ? $request->body_html : null,
            'body_text' => !empty($request->body_text) ? $request->body_text : null,
            'locale' => $request->locale,
            'is_active' => !empty($request->is_active) ? 1 : 0,
        ]);

        return redirect()->route('backend.email-templates.index')
                         ->with('success', 'Email Template created successfully.');
    }

    /**
     * Display the specified category.
     */
    public function show(EmailTemplate $email_template)
    {
        return view('backend.email-template.show', compact('email_template')); // Return the show view
    }

    /**
     * Show the form for editing the specified category.
     */
    public function edit(EmailTemplate $email_template)
    {
        $categories = EmailTemplateCategory::where('is_active', 1)->get();
        return view('backend.email-template.edit', compact('categories', 'email_template')); // Return the edit view
    }

    /**
     * Update the specified category in storage.
     */
    public function update(Request $request, EmailTemplate $email_template)
    {
        // dd($request);
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255|unique:email_templates,name,' . $email_template->id,
            'email_template_category_id' => 'required',
            'subject' => 'required',
            'body_html' => 'required',
            'body_text' => 'required',
            'locale' => 'required'
        ]);

        $data = [
            'name' => $request->name,
            'email_template_category_id' => $request->email_template_category_id,
            'subject' => !empty($request->subject) ? $request->subject : null,
            'body_html' => !empty($request->body_html) ? $request->body_html : null,
            'body_text' => !empty($request->body_text) ? $request->body_text : null,
            'locale' => $request->locale,
            'is_active' => !empty($request->is_active) ? 1 : 0
        ];

        
        // Update the category data
        $email_template->update($data);

        return redirect()->route('backend.email-templates.index')
                         ->with('success', 'Email Template updated successfully.');
    }

    /**
     * Remove the specified category from storage.
     */
    public function destroy($id)
    {
        $email_template = EmailTemplate::find($id);
        if ($email_template) {
            $email_template->delete();
            return response()->json(['success' => 'Email Template deleted successfully.']);
        }
        return response()->json(['error' => 'Email Template not found.'], 404);
    }
}
