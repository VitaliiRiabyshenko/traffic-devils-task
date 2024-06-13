<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'bayer_id',
    ];

    public function bayer()
    {
        return $this->belongsTo(User::class, 'bayer_id');
    }
}
