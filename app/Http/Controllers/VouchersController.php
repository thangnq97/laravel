<?php

namespace App\Http\Controllers;

use App\Models\admin\Vouchers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VouchersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Vouchers::all();
        return view('admin.voucher.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.voucher.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'discount' => 'required|numeric',
            'expiry' => 'required'
        ]);

        $name = Str::random(5);
        $request->merge(['name' => $name]);
        Vouchers::create($request->all());

        return redirect()->back()->with('yes', 'Thêm mới thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $voucher = Vouchers::find($id);
        return view('admin.voucher.edit', compact('voucher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $voucher = Vouchers::find($id);

        $request->validate([
            'discount' => 'required|numeric',
            'expiry' => 'required'
        ]);

        $voucher->update($request->all());

        return redirect()->back()->with('yes', 'Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $voucher = Vouchers::find($id);
        $voucher->delete();
        return redirect()->route('voucher.index')->with('yes', 'Xóa thành công');
    }
}
