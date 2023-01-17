<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Thread; //add contact model, since model gets the data from the database
use App\Models\Comment; //add contact model, since model gets the data from the database
use App\Models\User; //add contact model, since model gets the data from the database
use Illuminate\Support\Facades\Auth;
use App\Events\newThreadPost;
use DB;

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
        return redirect('/');
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
     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function searchThread(Request $request)
    {
        
        $threads = Thread::with("users")->get();
        $filteredThread = Thread::with("users")->where('title','LIKE','%'.$request->seacrhInput."%")
        ->orWhere('category','LIKE','%'.$request->seacrhInput."%")
        ->orWhere('threadpost','LIKE','%'.$request->seacrhInput."%")->get();
        $latestPost = Thread::with("users")->get()->last();
        if($request->ajax()){
            $output = "";

            // $thread=Thread::where('title','Like','%'.$request->search.'%')
            // ->orWhere('category','Like','%'.$request->search.'%')->get();
    
            // $threads=DB::table('thread')->where('title','LIKE','%'.$request->seacrhInput."%")->get();
            if($filteredThread)
         {
          foreach ($filteredThread  as $key => $thread) 
          {
           $output.=
        '<div class="threadContent '.$thread->category.'">'.
                '<div class="avatarTextsContainer">'.
                    '<div class="threadUserAvatar">'.
                        '<img src=".//images/Avatar Users2_1.png">'.
                        '<span>'.$thread->users->name.'</span>'.
                    '</div>'.
                    '<div class="threadTextsContainer">'.
                        '<div class="threadTexts">'.
                            '<span>'.$thread->category.'</span>'.
                            '<span style="font-size: larger;">'.$thread->title.'</span>'.
                            '<span>'.$thread->threadpost.'</span>'.
                        '</div>'.
                    '</div>'.
                '</div>'.
                '<div class="threadReaction">'.
                    '<div class="thumbsUpDownContainer">'.
                        '<div class="threadThumbsUp">'.
                            '<i class="fa-regular fa-thumbs-up" id="likepost5">'.'</i>'.
                        '</div>'.
                        '<div class="threadThumbsDown">'.
                            '<i class="fa-regular fa-thumbs-down" id="dislikepost5">'.'</i>'.
                        '</div>'.
                    '</div>'.
                    '<div class="replyBtnContainer">'.
                        '<a href="/thread/'.$thread->id.'">'.'<i class="fa-solid fa-comment-dots">'.'</i>'.'</a>'.
                    '</div>'.
                '</div>'.
       '</div>';
         }
        return Response($output);
         }
        }

        return view('threads.index')->with('threads' , $threads)->with('latestPost', $latestPost);
  }
}