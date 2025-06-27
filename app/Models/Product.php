<?php

namespace App\Models;

use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function photos(): HasMany
    {
        return $this->hasMany(ProductPhoto::class);
    }

    //Accessors & Mutators
    public function price(): Attribute
    {
        return new Attribute(
            get: fn($attr) => $attr / 100,
            set: fn($attr) => $attr * 100
        );
    }

    public function thumb(): Attribute
    {
        return new Attribute(
            get: fn($attr) => $this->photos->first()?->photo
        );
    }

    //Query Scope
    #[Scope]
    protected function getValidProducts(Builder $query): void
    {
        $query->where('in_stock', '>', 10)
            ->whereStatus(true);
    }
}
