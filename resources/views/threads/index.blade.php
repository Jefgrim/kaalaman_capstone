@extends('threads.layout')

@section('threadContent')
<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
    <div class="toast-body sticky-top">
      A New Thread is posted, click reload page to see the latest thread.
      <div class="mt-2 pt-2 border-top">
        <button type="button" class="btn btn-primary btn-sm" onclick="window.location.reload()">Reload Page</button>
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="toast">Close</button>
      </div>
    </div>
  </div>
    @foreach ($threads as $item)
        <div class="threadContent {{$item->category}}">
            <div class="avatarTextsContainer">
                <div class="threadUserAvatar">
                    @if ($item->users->image == null)
                      <img class="user-icon" src="{{asset("./images/defaultDp.png")}}" width="100" height="100" alt="" style="border-radius: 100%">
                     @else
                      <img class="user-icon" src="{{asset($item->users->image)}}" width="100" height="100" style="border-radius: 100%" alt="">
                     @endif
                    <span><a href="/profile/{{$item->users->id}}">{{$item->users->name}}</a></span>
                </div>
                <div class="threadTextsContainer">
                    <div class="threadTexts">
                        <span>{{$item->category}}</span>
                        <span style="font-size: larger;">{{$item->title}}</span>
                        <span>{{$item->threadpost}}</span>
                    </div>
                </div>
            </div>
            <div class="threadReaction">
                @guest
                
                @else
                    <div class="thumbsUpDownContainer">
                        <div class="threadThumbsUp">
                            <form action="/" method="POST"id="likeThreadId{{$item->id}}">
                                {{ csrf_field() }}
                                <input type="hidden" name="threadId" value="{{$item->id}}">
                                <input type="hidden" name="userId" value="{{Auth::id()}}">
                                <input type="hidden" name="status" value="liked">
                                @if(DB::table('likethread')->where('userId','=', Auth::id())->where('threadId','=',$item->id)->value('status') == "liked")
                                    <i class="fa-regular fa-thumbs-up" class="btn" id="like{{$item->id}}" onclick="likes(); return false" style="color: green"></i>
                                    @else
                                    <i class="fa-regular fa-thumbs-up" class="btn" id="like{{$item->id}}" onclick="likes(); return false" style="color: white"></i>
                                @endif
                             </form>
                        </div>
                        
                        <div class="threadThumbsDown">
                            <form action="/dislike" method="POST"id="dislikeThreadId{{$item->id}}">
                                {{ csrf_field() }}
                                <input type="hidden" name="threadId" value="{{$item->id}}">
                                <input type="hidden" name="userId" value="{{Auth::id()}}">
                                <input type="hidden" name="status" value="disliked">
                                @if(DB::table('dislikethread')->where('userId','=', Auth::id())->where('threadId','=',$item->id)->value('status') == "disliked")
                                     <i class="fa-regular fa-thumbs-down" class="btn" id="dislike{{$item->id}}" onclick="dislikes(); return false" style="color: red"></i>
                                    @else
                                    <i class="fa-regular fa-thumbs-down" class="btn" id="dislike{{$item->id}}" onclick="dislikes(); return false" style="color: white"></i>
                                @endif
                            </form>
                        </div>
                    </div>
                @endguest
                <div class="replyBtnContainer">
                    <a href='{{url('/thread/comments/'.$item->id)}}'><i class="fa-solid fa-comment-dots"></i></a>
                    <a href='{{url('edit/'.$item->id)}}'><i class="fa-solid fa-pen"></i></a>
                </div>
                
            </div>
        </div>
 @endforeach
@endsection

@section('postThreadContent')
    @guest
        <form class="guestPostThreadContent">
            <div class="h2Container">
            <h2 class="guestthread-post">Log-in  or Register Below</h2>
           
        </div>
        <div class="guestSidebar">
                 
            <a class="Log-in" href="{{ route('login') }}">Log-in</a> 
               
            <a class="Register" href="{{ route('register') }}">Register</a>
            
            <i id="expandBtn" ></i>
        </div>
            
        </form>
    @else
        <form class="postThreadContent" action="/thread" method="post">
            {{ csrf_field() }}
            {{-- <div class="h2Container">
            <h2 class="thread-post">CREATE A THREAD</h2>
            
            </div>

            <div class="category-title">
            <input
                type="text"
                placeholder="Title"
                id="titleInp"
                class="titleInp"
                name="title"
                required
            />

            <select id="selectCategory" class="selectCategory" name="category" required>
                <option value="" selected disabled>Select Category</option>
                <option value="Technology">Technology</option>
                <option value="E-commerce">E-Commerce</option>
                <option value="Health-Lifestyle">Health & Lifestyle</option>
                <option value="Games">Games</option>
                <option value="Food-Beverages">Food & Beverages</option>
            </select>
            </div>
            <div class="threadInpContainer">
            <textarea id="threadInp" class="threadInp" name="threadpost" required maxlength="255"></textarea>
            </div>
            <div class="threadBtnContainer">
                <div class="expandbutton">
                    <i id="expandBtn" class="fa-solid fa-plus enlargebtn expandBtn"></i>
                </div>

                <div class="postbutton">
                    <button type="submit" id="postBtn" class="postBtn">Post</button>
                </div>
             --}}
            
            {{-- </div> --}}
      </form>
    @endguest

@endsection

@section('latestContent')
    <div class="content-box">
        <div class="text-container">
            @if ($latestPost == NULL)
            @else
            <h3 class="latestTitle">{{$latestPost->title}}</h3>
            @endif
            @if ($latestPost == NULL)
            @else
            <p class="p-1">By: {{$latestPost->users->name}}</p>
            @endif
        </div>
    </div>
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
        <div class="toast-body">
          A New Thread is posted, click reload page to see the latest thread.
          <div class="mt-2 pt-2 border-top">
            <button type="button" class="btn btn-primary btn-sm" onclick="window.location.reload()">Reload Page</button>
            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="toast">Close</button>
          </div>
        </div>
      </div>
@endsection

@section('modular')
@guest

<div class="modular">
  
  <div class="expandPostThreadGuest"> 
    
     <i id="closeBtn" class="fa-regular fa-circle-xmark expandBtn"></i>
    <div class="guestSidebarModular">
     <a class="Log-in" href="{{ route('login') }}">Log-in</a> 
            
     <a class="Register" href="{{ route('register') }}">Register</a>
       
    
     <i id="notification"></i>
    </div>
    </div>
</div>
          
            

@else
<div class="modular">
          
    <div class="expandPostThread"> 
      <div class="postThreadContainer" >
        <form class="postThreadContent" action="/thread" method="post">
          {{ csrf_field() }}
          <div class="h2Container">
            <h2 class="thread-post">CREATE A THREAD</h2>
            <i id="closeBtn" class="fa-regular fa-circle-xmark expandBtn"></i>
          </div>

          <div class="category-title">
            <input
              type="text"
              placeholder="Title"
              id="expandedTitleInp"
              class="titleInp"
              name="title"
              required
            />
            <select id="expandedSelectCategory" class="selectCategory"  name="category" required>
              <option value=""selected disabled>Select Category</option>
              <option value="Technology">Technology</option>
              <option value="E-commerce">E-Commerce</option>
              <option value="Health-Lifestyle">Health & Lifestyle</option>
              <option value="Games">Games</option>
              <option value="Food-Beverages">Food & Beverages</option>
            </select>
          </div>
          <div class="threadInpContainer">
            <textarea id="expandedThreadInp" class="threadInp" name="threadpost" required maxlength="255"></textarea>
          </div>
          <div class="threadBtnContainer">
            
            
            <button type="submit" id="expandedPostBtn" class="postBtn">Post</button>
          </div>
        </form>
      </div>
      </div>
  </div>
@endguest
@endsection

@section('notificationSection')

<div class="notificationContainer">
         <div class="notifContent">
            <div class="notifPicture"> picture</div>
            <div class="notifReaction"> Like </div>
            <div class="notifComment"> comment </div>
        </div>
    <div class="notifContent">
        <div class="notifPicture"> picture</div>
        <div class="notifReaction"> Like </div>
        <div class="notifComment"> comment </div>
    </div>
            <div class="notifContent">
                <div class="notifPicture"> picture</div>
                <div class="notifReaction"> Like </div>
                <div class="notifComment"> comment </div>
            </div>
</div>

@endsection

@section('hidePostThreadBtn')
@guest
<div ></div>
@else
<div class="hidePostThreadBtn"><i class="fa-solid fa-pen-to-square"></i></div>
@endguest
@endsection

@section('writethread')
@guest
@else
<div class="writethread">
    <button class="writethreadbtn" id="expandBtn">Write a thread</button>
    <i class="fa-regular fa-pen-to-square text-light fs-1 write-icon"></i>
</div>
@endguest

@endsection