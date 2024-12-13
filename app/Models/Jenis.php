<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    use HasFactory;

    protected $table = 'jenis';
    protected $primaryKey = 'id';

    protected $fillable = [
        'jenis',
        'bobot'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
