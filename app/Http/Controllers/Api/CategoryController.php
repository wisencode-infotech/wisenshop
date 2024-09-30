<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;

class CategoryController extends APIController
{
    public function index()
    {
        $categories = Category::all();
        return $this->sendSuccess($categories, 'Categories retrieved successfully');
    }

    public function show($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return $this->sendError('Category not found', 404);
        }

        return $this->sendSuccess($category, 'Category retrieved successfully');
    }
}
