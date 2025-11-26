<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Ganti dengan daftar status yang lengkap
        DB::statement("ALTER TABLE orders MODIFY status ENUM(
            'pending',
            'assigned',
            'picked_up',
            'delivering',
            'completed',
            'cancelled'
        ) NOT NULL DEFAULT 'pending'");
    }

    public function down()
    {
        // Kembalikan ke versi sebelumnya jika perlu
        DB::statement("ALTER TABLE orders MODIFY status ENUM(
            'pending',
            'processing',
            'completed',
            'cancelled'
        ) NOT NULL DEFAULT 'pending'");
    }
};