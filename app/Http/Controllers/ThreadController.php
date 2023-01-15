<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Thread; //add contact model, since model gets the data from the database
use Illuminate\Support\Facades\Auth;
use App\Events\newThreadPost;

class ThreadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $threads = Thread::with("users")->get();
        $latestPost = Thread::with("users")->get()->last();
        return view('threads.index')->with('threads' , $threads)->with('latestPost', $latestPost);
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
        $thread = new Thread;
        $thread->userId = Auth::id(); 
        $thread->title = $request->title;
        $thread->category = $request->category;
        $thread->threadpost = $request->threadpost;
        $thread->save();

        $username = Auth::user()->name;
        $title = request()->title;
        $category = request()->category;
        $threadpost = request()->threadpost;

        $newThread = [
            'username' => $username,
            'title' => $title,
            'category' => $category,
            'threadpost' => $threadpost
        ];
    
        event(new newThreadPost($newThread));
        return redirect('/');
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
        
        // return $thread;
        if ($thread == null){
            return redirect("/404");
        }
        return view('comments.index')->with('thread' , $thread);
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
