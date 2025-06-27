<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(private Product $product) {}

    public function index()
    {
        $products = $this->product
            ->getValidProducts()
            ->orderBy('id', 'DESC')
            ->take(10)
            ->get();

        return view('site.home', compact('products'));
    }

    public function single($product)
    {
        $product = $this->product->with('photos')
            ->whereSlug($product)
            ->getValidProducts()
            ->first();

        return view('site.single', compact('product'));
    }
}
