<?php

namespace App\Models;

use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $casts = [
        'status' => OrderStatus::class,
    ];

    protected array $dates = ['ordered_at'];

    protected $fillable = [
        'order_code',
        'user_id',
        'customer_id',
        'recipient_name',
        'recipient_phone',
        'total_amount',
        'order_source',
        'note',
        'shipping_note',
        'shipping_address',
        'ordered_at',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_products')
            ->withPivot('quantity', 'price', 'total')
            ->withTimestamps();
    }
}
