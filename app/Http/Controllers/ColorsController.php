<?php

namespace App\Http\Controllers;

use App\Models\admin\Colors;
use Illuminate\Http\Request;

class ColorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Colors::all();
        return view('admin.color.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.color.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Colors::create($request->all());

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
        $color = Colors::find($id);
        return view('admin.color.edit', compact('color'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $color = Colors::find($id);

        $request->validate([
            'name' => 'required',
        ]);

        $color->update($request->all());

        return redirect()->back()->with('yes', 'Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $color = Colors::find($id);
        $color->delete();
        return redirect()->route('color.index')->with('yes', 'Xóa thành công');
    }
}
