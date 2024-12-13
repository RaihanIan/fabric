<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ketersediaan extends Model
{
    use HasFactory;

    protected $table = 'ketersediaan';
    protected $primaryKey = 'id';

    protected $fillable = [
        'ketersediaan',
        'bobot'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
