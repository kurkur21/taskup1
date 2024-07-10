<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Support\Str;
use App\Models\model_produk;
use App\Models\model_kategori;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        model_kategori::truncate();
        model_produk::truncate();
        User::truncate();
        Schema::enableForeignKeyConstraints();
        
        User::insert([
            'name' => 'Admin',
            'email' => 'a@a',
            'password' => Hash::make('a'),
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
            'username' => 'admin',
            'updated_at' => now(),
            'created_at' => now()


            
        ]);

        model_kategori::insert([
            ['name' => 'Elektronik', 'updated_at' => now(), 'created_at' => now()],
            ['name' => 'Pakaian Pria', 'updated_at' => now(), 'created_at' => now()],
            ['name' => 'Pakaian Wanita', 'updated_at' => now(), 'created_at' => now()],
            ['name' => 'Peralatan Olahraga', 'updated_at' => now(), 'created_at' => now()],
            ['name' => 'Makanan dan Minuman', 'updated_at' => now(), 'created_at' => now()]
        ]);

        model_produk::insert([
            ['name' => 'Laptop','description' => 'Laptop','price' => 2000000,'stok' => 10, 'updated_at' => now(), 'created_at' => now(), 'id_categories' => 1],
            ['name' => 'TV','description' => 'TV','price' => 1000000,'stok' => 10, 'updated_at' => now(), 'created_at' => now(), 'id_categories' => 1],
            ['name' => 'Kaos','description' => 'Kaos','price' => 50000,'stok' => 10, 'updated_at' => now(), 'created_at' => now(), 'id_categories' => 2],
            ['name' => 'Celana','description' => 'Celana','price' => 100000,'stok' => 10, 'updated_at' => now(), 'created_at' => now(), 'id_categories' => 2],
            ['name' => 'Kaos','description' => 'Kaos','price' => 50000,'stok' => 10, 'updated_at' => now(), 'created_at' => now(), 'id_categories' => 3], 
            ['name' => 'Celana','description' => 'Celana','price' => 100000,'stok' => 10, 'updated_at' => now(), 'created_at' => now(), 'id_categories' => 3],
            ['name' => 'Sepatu','description' => 'Sepatu','price' => 50000,'stok' => 10, 'updated_at' => now(), 'created_at' => now(), 'id_categories' => 4],
            ['name' => 'Tas','description' => 'Tas','price' => 100000,'stok' => 10, 'updated_at' => now(), 'created_at' => now(), 'id_categories' => 4],  
        ]);

    }
}
