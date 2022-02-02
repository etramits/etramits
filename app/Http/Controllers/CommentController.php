<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class CommentController extends Controller
{
  public function create()
  {
    return Inertia::render("ACP/Comments/Create");
  }

  public function store()
  {
    $attributes = Request::validate([
      "content" => ["required"],
      "active" => ["required", "boolean"],
    ]);

    Comment::create($attributes);

    return Redirect::route("acp.comments")->with("success", "Comentari creat.");
  }

  public function edit(Comment $comment)
  { 
    return Inertia::render("ACP/Comments/Edit", [
      "comment" => $comment,
    ]);
  }

  public function update(Comment $comment)
  { 
    $attributes = Request::validate([
      "content" => ["required"],
      "active" => ["required", "boolean"],
    ]);

    // return $attributes;

    $comment->update($attributes);

    return Redirect::back()->with("success", "Comentari actualitzat.");
  }

  public function destroy(Comment $comment)
  { 
    $comment->delete();

    return Redirect::route("acp.comments")->with("success", "Comentari eliminat.");
  }
}
