<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use App\Http\Resources\Comment as CommentResource;
use App\Http\Resources\Article as ArticleResource;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Article $article)
    {
        return response()->json(CommentResource::collection($article->comments),200);
    }
    public function show(Article $article, Comment $comment)
    {
        $comment=$article->comments()->where('id',$comment->id)->firstOrFail();
        return response()->json($comment,200);
    }
    public function store(Request $request, Article $article)
    {
        $request->validate([
            'text'=>'required|string'
        ]);

        $comment = $article->comments()->save(new Comment($request->all()));
        return response()->json($comment,200);
    }
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
