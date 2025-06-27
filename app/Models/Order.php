<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'customer_id',
        'total',
        'warehouse_id', // <-- asegúrate de incluir esto
    ];

    protected $with = ['user', 'customer'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
    
    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }

    protected static function booted(): void
    {
        static::created(function (Order $order) {
            foreach ($order->orderProducts as $item) {
                $inventory = Inventory::where('warehouse_id', $order->warehouse_id)
                    ->where('product_id', $item->product_id)
                    ->get()[0];
    
                if ($inventory) {
                    $inventory->quantity -= $item->quantity;
                    $inventory->save();
                }
            }
        });
    }

}
