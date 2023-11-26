<?php

namespace App\Http\Controllers;

use App\Models\admin\Bill_detail;
use App\Models\admin\Bills;
use Illuminate\Http\Request;

class BillsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $status = ['Đang xử lý', 'Chuẩn bị', 'Giao hàng', 'Thành công', 'Đã hủy'];
        $data = Bills::all();

        return view('admin.bill.index', compact('data', 'status'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Bill_detail::where('bill_id', '=' ,  $id)->get();
        

        return view('admin.bill.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bills $bills)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $bill = Bills::find($id);

        if($bill->status === 'Đã hủy' || $bill->status === 'Thành công') return  redirect()->back();
        
        if($bill->status === 'Giao hàng') {
            if($request->status === 'Giao hàng') return  redirect()->back();
            if($request->status === 'Đang xử lý') return  redirect()->back();
            if($request->status === 'Chuẩn bị') return  redirect()->back();
        } 
        
        if($bill->status === 'Chuẩn bị') {
            if($request->status === 'Đang xử lý') return  redirect()->back();
            if($request->status === 'Chuẩn bị') return  redirect()->back();
        }
        
        if($bill->status === 'Đang xử lý') {
            if($request->status === 'Đang xử lý') return  redirect()->back();
        }
        
        $bill->status = $request->status;
        $bill->save();

        return redirect()->back()->with('yes', 'Update thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bills $bills)
    {
        //
    }

    public function back() {
        return redirect()->route('bill.index');
    }
}
