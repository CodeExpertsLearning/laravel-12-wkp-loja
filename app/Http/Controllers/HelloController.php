<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function hello(Product $product)
    {
        dd($product);
        // dump(config('app.name')); //config/app.php -> ['name' => 'Nome da App']
        $outroValor = '10';
        //php.net/compact
        return view('test.hello', compact('name', 'outroValor'));
    }
}
