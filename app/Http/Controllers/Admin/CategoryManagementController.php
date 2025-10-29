<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class CategoryManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate();

        return view('admin.categories.index')
            ->with('categories', $categories);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create():View
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  Category  $category
     * @return View
     */
    public function show(Category $category):View
    {
        return view('admin.categories.show')
            ->with('category', $category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Category  $category
     * @return View
     */
    public function edit(Category $category): View
    {
        return view('admin.categories.edit')
            ->with('category', $category);
    }

    /**
     * Update the specified category resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $oldCategory = $category;

        $validated = $request->validate([
           'title'=>[
               'required',
               'min:3',
               'max:64',
               Rule::unique('categories','title')->ignore($category)
               ],
            'description'=>[
                'nullable',
                'max:255',
            ]
        ]);

        $category->update($validated);

        return to_route('admin.categories.index');
    }

    /**
     * Confirm the deletion of a category resource from storage.
     *
     * @param  Category  $category
     * @return View
     */
    public function delete(Category $category): View
    {
        return view('admin.categories.delete')
            ->with('category', $category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
