<?php

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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role', ['admin', 'user'])->default('user');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });

        // Mitra Table
        Schema::create('mitra', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('user_id')->constrained('users');
            $table->string('name_mitra');
            $table->string('logo_mitra');
            $table->timestamps();
        });
        
        // Harga Table
        Schema::create('harga', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('user_id')->constrained('users');
            $table->string('harga');
            $table->string('bobot');
            $table->timestamps();
        });
        
        // jenis Table
        Schema::create('jenis', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('user_id')->constrained('users');
            $table->string('jenis');
            $table->string('bobot');
            $table->timestamps();
        });
        
        // ketersediaan Table
        Schema::create('ketersediaan', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('user_id')->constrained('users');
            $table->string('ketersediaan');
            $table->string('bobot');
            $table->timestamps();
        });
        
        // Supplier Table
        // Supplier Table
        Schema::create('supplier', function (Blueprint $table) {
            $table->id();
            $table->string('nama_supplier')->index();
            $table->string('foto_supplier')->nullable();
            $table->string('email');
            $table->string('alamat');
            $table->string('catatantambahan')->nullable();
            $table->foreignId('harga_id')->nullable()->constrained('harga'); 
            $table->foreignId('jenis_id')->nullable()->constrained('jenis'); 
            $table->foreignId('ketersediaan_id')->nullable()->constrained('ketersediaan'); 
            $table->integer('vektor_v')->nullable(); 
            $table->timestamps();
        });        

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('mitra');
        Schema::dropIfExists('harga');
        Schema::dropIfExists('jenis');
        Schema::dropIfExists('ketersediaan');
        Schema::dropIfExists('supplier');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
