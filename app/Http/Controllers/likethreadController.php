<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\likethread;
use App\Models\Dislikethread;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class likethreadController extends Controller
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
       
   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
    public function likeThread(Request $request)
    {
        if(likeThread::where('userId','=', Auth::id())->where('threadId','=',$request->threadId)->value('userId')==Auth::id()){
          $likedThreadId =likeThread::where('userId','=', Auth::id())->where('threadId','=',$request->threadId)->value('id');
         
            if(likeThread::where('userId','=', Auth::id())->where('threadId','=',$request->threadId)->value('status') == "liked") {
                likeThread::where('id',$likedThreadId)->update(['status'=>'unlike']);
            }
            else if(likeThread::where('userId','=', Auth::id())->where('threadId','=',$request->threadId)->value('status') == "unlike"){
                likeThread::where('id',$likedThreadId)->update(['status'=>'liked']);
            }

        }else{
            $likeThread= new likeThread;
            $likeThread->userId = Auth::id(); 
            $likeThread->threadId = $request->threadId;
            $likeThread->status =$request->status;
            $likeThread->save();
        }
       
        
    }
}
