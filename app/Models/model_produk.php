<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class model_produk extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillabel = [
        'name',
        'id_categories',
        'description',
        'price',
        'stok',
    ];

    public function categories()
    {
        return $this->belongsTo(model_kategori::class, 'id_categories');
    }
}
