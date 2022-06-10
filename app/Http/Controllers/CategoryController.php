<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function __construct()
    {
    $this->middleware('auth');
    }

public function index()
{
    $categories = Category::paginate(10);

    return view('dashboard.category.index',[
        'categories' => $categories
    ]);
}

public function create(){
    return view('dashboard.category.create');
}

public function store(Request $request)
{
    $request->validate([
        'nama' => 'required'
    ]);

    $category = new Category;

    $category->nama = $request->get('nama');
    $category->slug = SlugService::createSlug(Category::class,'slug',$request->nama);

    $category->save();

    return redirect()->route('category.index')->with('success','category Ditambahkan');
}

public function delete($id){
    $category = Category::where('id', $id)->first();

    Category::find($category->id)->delete();

    return redirect()->route('category.index')->with('success','Category berhasil dihapus');
}
}
