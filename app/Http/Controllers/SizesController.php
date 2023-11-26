<?php

namespace App\Http\Controllers;

use App\Models\admin\Sizes;
use Illuminate\Http\Request;

class SizesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Sizes::all();
        return view('admin.size.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.size.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Sizes::create($request->all());

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
        $size = Sizes::find($id);
        return view('admin.size.edit', compact('size'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $size = Sizes::find($id);

        $request->validate([
            'name' => 'required',
        ]);

        $size->update($request->all());

        return redirect()->back()->with('yes', 'Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $size = Sizes::find($id);
        $size->delete();
        return redirect()->route('size.index')->with('yes', 'Xóa thành công');
    }
}
