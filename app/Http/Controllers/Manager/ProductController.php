<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
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

    public function create()
    {
        return view('manager.products.create');
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

        $this->model->create($request->all());

        return redirect()->route('manager.products.index');
    }

    public function show($product)
    {
        return redirect()->route('manager.products.edit', $product);
    }

    public function edit($product)
    {
        $product = $this->model->findOrFail($product); //null ->exception: 404

        return view('manager.products.edit', compact('product'));
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

        return redirect()->back();
    }

    public function destroy($product)
    {
        $product = $this->model->findOrFail($product);
        $product->delete();

        return redirect()->back();
    }
}
