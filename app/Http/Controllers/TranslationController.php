<?php

namespace App\Http\Controllers;

use App\Models\Translation;
use Illuminate\Http\Request;

class TranslationController extends Controller
{
    public function index()
    {
        $translations = Translation::all();
        return view('translations.index', compact('translations'));
    }

    public function create()
    {
        return view('translations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'locale' => 'required|string|max:10',
            'group' => 'nullable|string|max:50',
            'key' => 'required|string|max:255|unique:translations,key',
            'value' => 'required|string',
        ]);

        Translation::create($request->all());

        return redirect()->route('translations.index')->with('success', 'Translation created successfully.');
    }

    public function edit(Translation $translation)
    {
        return view('translations.edit', compact('translation'));
    }

    public function update(Request $request, Translation $translation)
    {
        $request->validate([
            'locale' => 'required|string|max:10',
            'group' => 'nullable|string|max:50',
            'key' => 'required|string|max:255|unique:translations,key,' . $translation->id,
            'value' => 'required|string',
        ]);

        $translation->update($request->all());

        return redirect()->route('translations.index')->with('success', 'Translation updated successfully.');
    }

    public function destroy(Translation $translation)
    {
        $translation->delete();

        return redirect()->route('translations.index')->with('success', 'Translation deleted successfully.');
    }
}
