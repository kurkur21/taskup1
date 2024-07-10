<?php

namespace App\Http\Controllers;

use App\Models\model_kategori;
use App\Models\model_produk;
use Illuminate\Http\Request;

class produkController extends Controller
{
    public function index(){
        $product=model_produk::all();
        $category=model_kategori::all();

        return view('produk',compact('product','category'));

        
    }

    public function hapus(Request $request){
        $product=model_produk::findorFail($request->id);

        $product->delete();
        return redirect('/dashboard');
    }

    public function edit(Request $request){
        $product=model_produk::findorFail($request->id);
        $product->name=$request->name;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->stok=$request->stok;
        $product->id_categories=$request->categories_id;

        $product->save();
        return redirect('/dashboard');
    }

    public function tambah(Request $request){
        $product=new model_produk;
        $product->name=$request->name;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->stok=$request->stok;
        $product->id_categories=$request->categories_id;
        $product->save();
        return redirect('/dashboard');
    }
}
