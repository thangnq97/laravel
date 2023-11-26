<?php

namespace App\Http\Controllers;

use App\Models\admin\Comments;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Comments::all();
        return view('admin.comment.index', compact('data'));
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
    public function show(Comments $comments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comments $comments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comments $comments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment = Comments::find($id);
        $comment->delete();

        return redirect()->route('comment.index')->with('yes', 'Xóa thành công');
    }
}
