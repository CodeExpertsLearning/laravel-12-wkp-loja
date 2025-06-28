<?php

namespace App\Models;

use App\OrderStatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = ['code', 'user_id', 'status', 'gateway_code'];

    protected function casts(): array
    {
        return [
            'status' => OrderStatusEnum::class,
        ];
    }

    public function totalOrder()
    {
        $total = $this->items->reduce(function (?int $total, $item) {
            return $total += ($item->quantity * $item->product->price);
        });

        return $total;
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
