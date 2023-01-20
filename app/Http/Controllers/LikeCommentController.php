<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Models\LikeComment;
use App\Models\DislikeComment;
use DB;

class LikeCommentController extends Controller
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
        //
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

    public function LikeComment(Request $request)
    {
        if(LikeComment::where('userId','=', Auth::id())->where('commentId','=',$request->commentId)->value('userId')==Auth::id()){
          $likedComment =LikeComment::where('userId','=', Auth::id())->where('commentId','=',$request->commentId)->value('id');
         
            if(LikeComment::where('userId','=', Auth::id())->where('commentId','=',$request->commentId)->value('status') == "liked") {
                LikeComment::where('id', $likedComment)->update(['status'=>'unlike']);
            }
            else if(LikeComment::where('userId','=', Auth::id())->where('commentId','=',$request->commentId)->value('status') == "unlike"){
                LikeComment::where('id', $likedComment)->update(['status'=>'liked']);

                $dislikeCommentId = DB::table('dislikecomment')->where('commentId', '=', $request->commentId)->where('userId', '=', Auth::id())->value('id');
                if($dislikeCommentId == null){
                
                } else {
                    DislikeComment::where('id',$dislikeCommentId)->update(['status'=>'undislike']);
                }
            }

        }else{
            $likeComment= new LikeComment;
            $likeComment->userId = Auth::id(); 
            $likeComment->commentId = $request->commentId;
            $likeComment->status =$request->status;
            $likeComment->save();

            $dislikeCommentId = DB::table('dislikecomment')->where('commentId', '=', $request->commentId)->where('userId', '=', Auth::id())->value('id');
            if($dislikeCommentId == null){
                
            } else {
                DislikeComment::where('id',$dislikeCommentId)->update(['status'=>'undislike']);
            }
        }
}
}