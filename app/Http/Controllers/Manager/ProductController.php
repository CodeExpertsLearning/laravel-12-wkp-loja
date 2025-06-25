<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Traits\UploadFiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    use UploadFiles;

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

    public function store(ProductRequest $request)
    {
        //Storage::disk('public')->delete('products/juHqIB5ojdE9gqkmgsTSpsoTbQBfhFQsgJCgBIBJ.jpg');

        $product = $this->model->create($request->validated());

        if (count($request->categories)) $product->categories()->sync($request->categories);

        if ($request->photos) {
            $photos = $this->uploadMultiple($request->photos, 'products', 'photo');
            $product->photos()->createMany($photos);
        }

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

    public function update($product, ProductRequest $request)
    {
        $product = $this->model->findOrFail($product);
        $product->update($request->validated());

        $product->categories()->sync($request->categories);

        if ($request->photos) {
            $photos = $this->uploadMultiple($request->photos, 'products/', 'photo');

            $product->photos()->createMany($photos);
        }

        return redirect()->back();
    }

    public function destroy($product)
    {
        $product = $this->model->findOrFail($product);
        $product->delete();

        return redirect()->back();
    }
}
