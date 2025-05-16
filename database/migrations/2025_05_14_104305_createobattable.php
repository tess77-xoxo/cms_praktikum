<?php

use Database\Seeders\ObatSeeder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('obat', function (Blueprint $table) {
            $table->id();
            $table->string('nama_obat');
            $table->string('jenis');
            $table->integer('stok');
            $table->decimal('harga', 10, 2);
            $table->date('expired_date');
            $table->timestamps();
        });
        
        $this->callSeeder();
    }
    /**
     * Jalankan seeder setelah migrasi.
     */
    private function callSeeder(): void
    {
        (new ObatSeeder())->run();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obat');
    }
};

