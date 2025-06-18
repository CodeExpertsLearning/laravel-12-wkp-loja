<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductPhoto extends Model
{
    protected $fillable = ['photo', 'is_thumb'];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
