<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Article;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        return Inertia::render('Comments/Index', [
            "comments" => Comment::orderBy('id', 'DESC')
            ->where('active', 0)
            ->get()
            ->map(fn ($comment) => [
                'id' => $comment->id,
                'user_id' => $comment->user_id,
                'article_id' => $comment->article_id,
                'content' => $comment->content,
                'created_at' => date("Y-m-d",strtotime($comment->created_at)),
            ])
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {   

        error_log($id);
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'content' => 'required',
        ]);
        
        if ($validator->fails()) {
            error_log($validator->errors());
        }


        Comment::create([
            'user_id' => $request->user_id,
            'content' => $request->content,
            'article_id' => $id,
            'active' => 0
        ]);

        return Redirect::back()->with('msg', 'Comment sended succefully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comment = Comment::find($id);

        $comment->update([
          'active' => 1,
        ]);

        return Redirect::back()->with('msg', 'Comment validated succefully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Comment::where('id', $id)->delete();

        return Redirect::back()->with('success', 'Comment deleted.');
    }
}
