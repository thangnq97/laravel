<?php

namespace App\Http\Controllers;

use App\Models\admin\Colors;
use App\Models\admin\Product_variant;
use App\Models\admin\Products;
use App\Models\admin\Sizes;
use Illuminate\Http\Request;

class ProductVariantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Product_variant::all();

        return view('admin.variant.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Products::all();
        $sizes = Sizes::all();
        $colors = Colors::all();

        return view('admin.variant.create', compact('sizes', 'products', 'colors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'color_id' => 'required',
            'size_id' => 'required',
            'price' => 'required',
            'quantity' => 'required',
        ]);

        Product_variant::create($request->all());
        return redirect()->back()->with('yes', 'Thêm mới thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product_variant $product_variant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $variant = Product_variant::find($id);
        $products = Products::all();
        $sizes = Sizes::all();
        $colors = Colors::all();


        return view('admin.variant.edit', compact('variant','sizes', 'products', 'colors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $variant = Product_variant::find($id);

        $request->validate([
            'product_id' => 'required',
            'color_id' => 'required',
            'size_id' => 'required',
            'price' => 'required',
            'quantity' => 'required',
        ]);

        $variant->update($request->all());
        return redirect()->back()->with('yes', 'Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $variant = Product_variant::find($id);
        $variant->delete();

        return redirect()->route('variant.index')->with('yes', 'Xóa thành công');
    }
}
