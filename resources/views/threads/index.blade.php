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
                <div class="replyBtnContainer">
                    <a href='{{url('/thread/' . $item->id)}}'><i class="fa-solid fa-comment-dots"></i></a>
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
            
            <i id="expandBtn"></i>
        </div>
            
        </form>
    @else
        <form class="postThreadContent" action="/thread" method="post">
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

@section('modular')
@guest

<div class="modular">
  
  <div class="expandPostThreadGuest"> 
    
     <i id="closeBtn" class="fa-regular fa-circle-xmark expandBtn"></i>
    <div class="guestSidebarModular">
     <a class="Log-in" href="{{ route('login') }}">Log-in</a> 
            
     <a class="Register" href="{{ route('register') }}">Register</a>
       
    

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
            <textarea id="expandedThreadInp" class="threadInp" name="threadpost" required></textarea>
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