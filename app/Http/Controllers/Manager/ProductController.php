<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(private Product $model) {}

    public function index()
    {
        $products = $this->model->paginate(10, ['id', 'name', 'status', 'created_at']);

        return view('manager.products.index', compact('products'));
    }

    public function create(Category $category)
    {
        $categories = $category->get(['id', 'name']);

        return view('manager.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        //Active Record
        // $product = $this->model;
        // $product->name = $request->name;
        // $product->description = $request->description;
        // $product->body = $request->body;
        // $product->slug = $request->slug;
        // $product->price = $request->price;
        // $product->in_stock = $request->in_stock;
        // $product->status   = $request->status;

        // $product->save(); // insert into...

        $product = $this->model->create($request->all());

        if (count($request->categories)) $product->categories()->sync($request->categories);

        return redirect()->route('manager.products.index');
    }

    public function show($product)
    {
        return redirect()->route('manager.products.edit', $product);
    }

    public function edit($product, Category $category)
    {
        $product = $this->model->findOrFail($product); //null ->exception: 404
        $categories = $category->get(['id', 'name']);

        return view('manager.products.edit', compact('product', 'categories'));
    }

    public function update($product, Request $request)
    {
        //Active Record: Update
        // $product = $this->model->findOrFail($product);
        // $product->name = $request->name;
        // $product->description = $request->description;
        // $product->body = $request->body;
        // $product->slug = $request->slug;
        // $product->price = $request->price;
        // $product->in_stock = $request->in_stock;
        // $product->status   = $request->status;

        // $product->save(); // update ...

        $product = $this->model->findOrFail($product);
        $product->update($request->all());

        $product->categories()->sync($request->categories);

        return redirect()->back();
    }

    public function destroy($product)
    {
        $product = $this->model->findOrFail($product);
        $product->delete();

        return redirect()->back();
    }
}
