<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'item_name',
        'item_price',
        'estimated_price',
        'pickup_address',
        'pickup_lat',
        'pickup_lng',
        'delivery_address',
        'delivery_lat',
        'delivery_lng',
        'distance',
        'shipping_cost',
        'total_price',
        'payment_method',
        'payment_proof',
        'status',
        'kurir_id',
        'notes',
    ];

    protected $casts = [
        'item_price' => 'decimal:2',
        'distance' => 'decimal:2',
        'shipping_cost' => 'decimal:2',
        'total_price' => 'decimal:2',
        'pickup_lat' => 'decimal:8',
        'pickup_lng' => 'decimal:8',
        'delivery_lat' => 'decimal:8',
        'delivery_lng' => 'decimal:8',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kurir()
    {
        return $this->belongsTo(User::class, 'kurir_id');
    }

    public function chats()
    {
        return $this->hasMany(Chat::class);
    }

    // Helper method untuk hitung ongkir
    public function calculateShippingCost($ratePerKm = 2000)
    {
        if ($this->distance) {
            return $this->distance * $ratePerKm;
        }
        return 0;
    }

    // Helper method untuk hitung total
    public function calculateTotal()
    {
        return $this->item_price + $this->shipping_cost;
    }
}