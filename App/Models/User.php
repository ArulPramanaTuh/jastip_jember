<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phone',
        'address',
        'profile_photo_path',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function hasVerifiedEmail()
    {
        return $this->email_verified_at !== null && $this->is_active;
    }

    // Relationships - TAMBAHKAN INI
    public function orders()
    {
        return $this->hasMany(\App\Models\Order::class);
    }

    public function kurir()
    {
        return $this->belongsTo(User::class, 'kurir_id');
    }

    public function kurirOrders()
    {
        return $this->hasMany(Order::class, 'kurir_id');
    }
    public function sentChats()
    {
        return $this->hasMany(\App\Models\Chat::class, 'sender_id');
    }

    public function receivedChats()
    {
        return $this->hasMany(\App\Models\Chat::class, 'receiver_id');
    }
}