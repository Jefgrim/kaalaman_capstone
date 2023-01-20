<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Models\DislikeComment;
use App\Models\LikeComment;
use DB;
class DislikeCommentController extends Controller
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

    public function dislikeComment(Request $request)
    {
        if(dislikecomment::where('userId','=', Auth::id())->where('commentId','=',$request->commentId)->value('userId')==Auth::id()){
          $dislikedComment =dislikecomment::where('userId','=', Auth::id())->where('commentId','=',$request->commentId)->value('id');
         
            if(dislikecomment::where('userId','=', Auth::id())->where('commentId','=',$request->commentId)->value('status') == "dislike") {
                dislikecomment::where('id',  $dislikedComment )->update(['status'=>'undislike']);
            }
            else if(dislikecomment::where('userId','=', Auth::id())->where('commentId','=',$request->commentId)->value('status') == "undislike"){
                dislikecomment::where('id',  $dislikedComment )->update(['status'=>'dislike']);
                $likedCommentId = DB::table('likecomment')->where('commentId', '=', $request->commentId)->where('userId', '=', Auth::id())->value('id');
                if($likedCommentId == null){
                   
                }else{
                    LikeComment::where('id',$likedCommentId)->update(['status'=>'unlike']);
                }
            }

        }else{
            $dislikecomment= new dislikecomment;
            $dislikecomment->userId = Auth::id(); 
            $dislikecomment->commentId = $request->commentId;
            $dislikecomment->status =$request->status;
            $dislikecomment->save();

            $likedCommentId = DB::table('likecomment')->where('commentId', '=', $request->commentId)->where('userId', '=', Auth::id())->value('id');
            if($likedCommentId == null){
               
            }else{
                LikeComment::where('id',$likedCommentId)->update(['status'=>'unlike']);
            }
        }
}
}