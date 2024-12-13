<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $table = 'supplier';
    protected $fillable = [
        'nama_supplier', 
        'foto_supplier', 
        'alamat', 
        'email', 
        'catatantambahan', 
        'harga_id', 
        'jenis_id', 
        'ketersediaan_id', 
        'vektor_v'
    ];

    public function harga()
    {
        return $this->belongsTo(Harga::class);
    }

    public function jenis()
    {
        return $this->belongsTo(Jenis::class);
    }

    public function ketersediaan()
    {
        return $this->belongsTo(Ketersediaan::class);
    }
}
