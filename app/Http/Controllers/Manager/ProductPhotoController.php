<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{DB, Storage};

class ProductPhotoController extends Controller
{
    public function destroy(Product $product, string $photo, Request $request)
    {
        // DB::listen(fn($sql) => dump($sql->sql));

        $photo = $product->photos()->findOrFail($photo); //?->photo;

        $disk = Storage::disk('public');

        if ($disk->exists($photo->photo)) $disk->delete($photo->photo);

        $photo->delete();

        return redirect()->back();
    }
}
