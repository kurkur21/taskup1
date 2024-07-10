<?php

namespace App\Http\Controllers;

use App\Models\model_kategori;
use Illuminate\Http\Request;

class kategoriController extends Controller
{
    public function index()
    {
      $kategori=model_kategori::all();
        return view('kategori', compact('kategori'));
    }

    public function tambah(Request $request){
        
        $product=new model_kategori;
        $product->name=$request->name;
        $product->save();
        return redirect('/kategori');
    }

    public function edit(Request $request){
        $product=model_kategori::findorFail($request->id);
        $product->name=$request->name;
        $product->save();
        return redirect('/kategori');

    }

    public function hapus(Request $request){
        $product=model_kategori::findorFail($request->id);
        $product->delete();
        return redirect('/kategori');
    }

}
