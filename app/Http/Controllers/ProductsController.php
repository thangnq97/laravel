<?php

namespace App\Http\Controllers;

use App\Models\admin\Categories;
use App\Models\admin\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Products::all();

        return view('admin.product.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cates = Categories::all();
        return view('admin.product.create', compact('cates'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required|max:255',
            'file' => 'required|image|mimes:jpg,png,gif,jpeg|max:2048',
            'cate_id' => 'required'
        ]);
        
        $image = time(). '.' . $request->file->extension();
        $request->file->move(public_path('assets/img'), $image);
        $request->merge(['image' => $image]);

        Products::create($request->all());

        return redirect()->back()->with('yes', 'Thêm mới thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Products::find($id);
        $cates = Categories::all();

        return view('admin.product.edit', compact('product', 'cates'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Products::find($id);

        $request->validate([
            'name' => 'required',
            'detail' => 'required|max:255',
            'file' => 'image|mimes:jpg,png,gif,jpeg|max:2048',
            'cate_id' => 'required'
        ]);

        $image = $product->image;
        if($request->has('file')) {
            $image = time() . '.' . $request->file->extension();
            $request->file->move(public_path('assets/img'), $image);
            $request->merge(['image' => $image]);
            File::delete($product->image);
        }

        $product->update($request->all());
        return redirect()->back()->with('yes', 'Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Products::find($id);
        File::delete($product->image);
        $product->delete();

        return redirect()->route('product.index')->with('yes', 'Xóa thành công');
    }
}
