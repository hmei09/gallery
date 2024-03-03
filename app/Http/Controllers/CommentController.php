<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;


class CommentController extends Controller
{
    public function store(Request $request)
{
    // Validasi request
    $request->validate([
        'id_photo' => 'required',
        'id' => 'required',
        'comment' => 'required',
    ]);

    // Proses menyimpan comment
    $comment = new Comment();
    $comment->id_photo = $request->id_photo;
    $comment->id = $request->id;
    $comment->comment = $request->comment;
    $comment->save();

    return redirect()->back()->with('success', 'Comment Sended.');
}
}
