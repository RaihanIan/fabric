<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Harga extends Model
{
    use HasFactory;

    protected $table = 'harga';
    protected $primaryKey = 'id';

    protected $fillable = [
        'harga',
        'bobot'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
