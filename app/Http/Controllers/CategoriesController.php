<?php

namespace App\Http\Controllers;

use App\Models\admin\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Categories::all();
        return view('admin.category.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Categories::create($request->all());

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
        $cate = Categories::find($id);
        return view('admin.category.edit', compact('cate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cate = Categories::find($id);

        $request->validate([
            'name' => 'required',
        ]);

        $cate->update($request->all());

        return redirect()->back()->with('yes', 'Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categories = Categories::find($id);
        $categories->delete();
        return redirect()->route('category.index')->with('yes', 'Xóa thành công');
    }
}
