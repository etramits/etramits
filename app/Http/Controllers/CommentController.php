<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CommentController extends Controller
{
  public function create()
  {
    return Inertia::render("ACP/Comments/Create");
  }

  public function store(Request $request, $id)
  {

    Comment::create([
        'content' => $request->content,
        'user_id' => $request->user_id,
        'article_id' => $id,
        'active' => 0
    ]);

    return Redirect::back()->with('msg', 'Comment sended succefully');
  }

  public function edit(Comment $comment)
  { 
    return Inertia::render("ACP/Comments/Edit", [
      "comment" => $comment,
    ]);
  }

  public function updateState($id)
  {
    $comment = Comment::find($id);

    $comment->update([
      'active' => 1,
    ]);

    return Redirect::back()->with('msg', 'Comment validated succefully');
  }

  public function destroy($id)
  { 

    $comment = Comment::find($id);

    $comment->delete();

    return Redirect::back()->with('msg', 'Comment removed succefully');
  }
}
