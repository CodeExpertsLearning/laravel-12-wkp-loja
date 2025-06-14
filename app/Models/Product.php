<?php

namespace App\Models;

use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, Sluggable;

    protected $slugColumnFrom = 'name';

    protected $fillable = [
        'name',
        'description',
        'body',
        'price',
        'in_stock',
        'status',
        'slug'
    ];
}
