<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('item_name'); // Nama barang
            $table->decimal('item_price', 10, 2); // Harga barang
            
            // Alamat penjemputan
            $table->text('pickup_address');
            $table->decimal('pickup_lat', 10, 8)->nullable();
            $table->decimal('pickup_lng', 11, 8)->nullable();
            
            // Alamat pengiriman
            $table->text('delivery_address');
            $table->decimal('delivery_lat', 10, 8)->nullable();
            $table->decimal('delivery_lng', 11, 8)->nullable();
            
            // Kalkulasi
            $table->decimal('distance', 8, 2)->nullable(); // km
            $table->decimal('shipping_cost', 10, 2)->nullable(); // ongkir
            $table->decimal('total_price', 10, 2); // total = item_price + shipping_cost
            
            // Pembayaran
            $table->enum('payment_method', ['transfer', 'cod'])->default('transfer');
            $table->string('payment_proof')->nullable(); // bukti transfer
            
            // Status
            $table->enum('status', ['pending', 'paid', 'processing', 'picked_up', 'delivering', 'completed', 'cancelled'])
                ->default('pending');
            
            // Kurir
            $table->foreignId('kurir_id')->nullable()->constrained('users')->onDelete('set null');
            
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};