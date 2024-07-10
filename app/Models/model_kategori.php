<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class model_kategori extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillabel = ['name'];

    public function product()
    {
        return $this->hasMany(model_produk::class);
    }
}


