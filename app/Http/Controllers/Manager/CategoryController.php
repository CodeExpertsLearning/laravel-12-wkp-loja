<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(private Category $model) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = $this->model->paginate(10, ['id', 'name', 'created_at']);

        return view('manager.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('manager.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->model->create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return redirect()->route('manager.products.edit', $category);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        // $category = $this->model->findOrFail($category); //null ->exception: 404

        return view('manager.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        // $category = $this->model->findOrFail($category);
        $category->update($request->all());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // $category = $this->model->findOrFail($category);
        $category->delete();
        return redirect()->back();
    }
}
