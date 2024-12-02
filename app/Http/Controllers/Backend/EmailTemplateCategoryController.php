<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\EmailTemplateCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class EmailTemplateCategoryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = EmailTemplateCategory::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn() // Adds the row index
                ->addColumn('name', function($row) {
                    return $row->name;
                })
                ->addColumn('description', function($row) {
                    return $row->description;
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
                    $btn = '<a href="'.route('backend.email-template-categories.edit', $row->id).'" class="edit btn btn-primary btn-sm">Edit</a>';
                    $btn .= ' <button class="btn btn-danger btn-sm delete" data-id="'.$row->id.'">Delete</button>';
                    return $btn;
                })
                ->rawColumns(['name', 'action', 'description', 'is_active'])
                ->make(true);
        }

        $categories = EmailTemplateCategory::all(); // Fetch all categories
        return view('backend.email-template-categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new category.
     */
    public function create()
    {
        return view('backend.email-template-categories.create'); // Return the create view
    }

    /**
     * Store a newly created category in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255|unique:email_template_categories,name'
        ]);

        $category = EmailTemplateCategory::create([
            'name' => $request->name,
            'description' => !empty($request->description) ? $request->description : null,
            'is_active' => !empty($request->is_active) ? 1 : 0,
        ]);

        return redirect()->route('backend.email-template-categories.index')
                         ->with('success', 'Email Template Category created successfully.');
    }

    /**
     * Display the specified category.
     */
    public function show(EmailTemplateCategory $email_template_category)
    {
        return view('backend.email-template-categories.show', compact('email_template_category')); // Return the show view
    }

    /**
     * Show the form for editing the specified category.
     */
    public function edit(EmailTemplateCategory $email_template_category)
    {
        return view('backend.email-template-categories.edit', compact('email_template_category')); // Return the edit view
    }

    /**
     * Update the specified category in storage.
     */
    public function update(Request $request, EmailTemplateCategory $email_template_category)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255|unique:email_template_categories,name,' . $email_template_category->id,
            'description' => 'nullable|string'
        ]);

        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'is_active' => !empty($request->is_active) ? 1 : 0,
        ];

        // Update the category data
        $email_template_category->update($data);

        return redirect()->route('backend.email-template-categories.index')
                         ->with('success', 'Email Template Category updated successfully.');
    }

    /**
     * Remove the specified category from storage.
     */
    public function destroy($id)
    {
        $email_template_category = EmailTemplateCategory::find($id);
        if ($email_template_category) {
            $email_template_category->delete();
            return response()->json(['success' => 'Email Template Category deleted successfully.']);
        }
        return response()->json(['error' => 'Email Template Category not found.'], 404);
    }
}
