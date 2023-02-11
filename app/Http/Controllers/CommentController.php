<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Thread; //add contact model, since model gets the data from the database
use App\Models\Comment; //add contact model, since model gets the data from the database
use App\Models\User; //add contact model, since model gets the data from the database
use Illuminate\Support\Facades\Auth;
use App\Events\newReplyPost;
use DB;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        $comment = new Comment;
        $comment->userId = Auth::id(); 
        $comment->threadId = $request->threadId;
        $comment->replyTo = $request->replyTo;
        $comment->replyToId = $request->replyToId;
        $comment->comment = $request->comment;
        $comment->save();
        event(new newReplyPost("newReply"));
        return redirect('/thread/comments/' . $request->threadId);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $thread = Thread::with("users")->find($id);
        $comments = Comment::with('threadcomment')->with('userscomment')->get();
        $users = User::get();
        $replyToId = "";
        if ($thread == null){
            return redirect("/404");
        }
        return view('comments.index')->with('thread' , $thread)->with('comments', $comments)->with('users', $users)->with('replyToId', $replyToId);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userId = auth()->user()->id;
        $comments= comment::where('id', $id)->where('userId', $userId)->first();;

        if(!$comments){
            return view('404.index');
            // error thread not found
        }
     
        return view("editComment.index",compact('comments'));

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
