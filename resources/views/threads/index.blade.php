@extends('threads.layout')

@section('threadContent')
    @foreach ($threads as $item)
        <div class="threadContent {{$item->category}}">
            <div class="avatarTextsContainer">
                <div class="threadUserAvatar">
                    <img src=".//images/Avatar Users2_1.png">
                    <span>{{$item->users->name}}</span>
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
                <div class="thumbsUpDownContainer">
                    <div class="threadThumbsUp">
                        <i class="fa-regular fa-thumbs-up" id="likepost5"></i>
                    </div>
                    <div class="threadThumbsDown">
                        <i class="fa-regular fa-thumbs-down" id="dislikepost5"></i>
                    </div>
                </div>
                <div class="replyBtnContainer post5Batch" id="post5">
                    <i class="fa-solid fa-comment-dots"></i>
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
               
            </div>
        </form>
    @else
        <form class="postThreadContent" action="/" method="post">
            {{ csrf_field() }}
            <div class="h2Container">
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
            <textarea id="threadInp" class="threadInp" name="threadpost" required></textarea>
            </div>
            <div class="threadBtnContainer">
            
            <i id="expandBtn" class="fa-solid fa-maximize enlargebtn expandBtn"></i>
            <button type="submit" id="postBtn" class="postBtn">Post</button>
            </div>
      </form>
    @endguest

@endsection

@section('latestContent')
    <div class="content-box">
        <img src=".//images/Avatar Users2_1.png" class="avatar">
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
@endsection


@section('UserIcon')

@guest
<div class="user">
    <div class="userDropDown headerIcons">
        <i class="fa-regular fa-user guestIcon">
            
        </i>
        <div class="guestUser-Section" id="userSection" style="display: none">
            <span>Guest Mode</span>
        </div>
 </div>
     <div class="headerIcon">
     <i class="fa-regular fa-lightbulb headerIcons" id="darkmodeBtn"></i>
    </div>
    
    
  </div>
@else
<div class="user">
    <div class="userDropDown headerIcons">
      <img src="./images/Avatar Users2_20.png" />
      <div class="user-Section" id="userSection" style="display: none">
        <span>{{Auth::user()->name}}</span>
        <button>Account Profile</button>
       
        <button> <a class="lagout" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
             {{ __('Logout') }}
         </a>

         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
             @csrf
         </form></button>
      </div>
    </div>

  
    <div class="headerIcon">
      <i class="fa-regular fa-bell headerIcons" id="notification"></i>
      <i class="fa-regular fa-lightbulb headerIcons" id="darkmodeBtn"></i>
    
    </div>
    
   
  </div>
  @endguest
@endsection