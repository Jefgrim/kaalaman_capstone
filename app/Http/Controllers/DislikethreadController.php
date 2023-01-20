<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dislikethread;
use App\Models\likethread;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use DB;

class DislikethreadController extends Controller
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
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Dislikethread(Request $request)
    {
        if( Dislikethread::where('userId','=', Auth::id())->where('threadId','=',$request->threadId)->value('userId')==Auth::id()){
            $DislikedThread = Dislikethread::where('userId','=', Auth::id())->where('threadId','=',$request->threadId)->value('id');
           
              if( Dislikethread::where('userId','=', Auth::id())->where('threadId','=',$request->threadId)->value('status') == "disliked") {
                Dislikethread::where('id',$DislikedThread)->update(['status'=>'undisliked']);
              }
              else if( Dislikethread::where('userId','=', Auth::id())->where('threadId','=',$request->threadId)->value('status') == "undislike"){
                Dislikethread::where('id',$DislikedThread)->update(['status'=>'disliked']);
                $likedThreadId = DB::table('likethread')->where('threadId', '=', $request->threadId)->where('userId', '=', Auth::id())->value('id');
                if($likedThreadId == null){
                   
                }else{
                    likethread::where('id',$likedThreadId)->update(['status'=>'unlike']);
                }
              }
  
          }else{
              $DislikeThread= new Dislikethread;
              $DislikeThread->userId = Auth::id(); 
              $DislikeThread->threadId = $request->threadId;
              $DislikeThread->status =$request->status;
              $DislikeThread->save();

              $likedThreadId = DB::table('likethread')->where('threadId', '=', $request->threadId)->where('userId', '=', Auth::id())->value('id');
                if($likedThreadId == null){
                   
                }else{
                    likethread::where('id',$likedThreadId)->update(['status'=>'unlike']);
                }
          }
         
    }
}
