<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Resources\Comment as CommentResource;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        return Comment::all();
    }
    public function show(Comment $comment)
    {
        return response()->json(new CommentResource($comment),200);
    }
    public function store(Request $request)
    {
        return Comment::create($request->all());}
    public function update(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->update($request->all());
        return $comment;
    }
    public function delete(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return 204;}
}