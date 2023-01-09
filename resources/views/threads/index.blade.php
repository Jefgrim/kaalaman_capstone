@extends('threads.layout')

@section('threadContent')
    <div class="threadContent Food-Beverages">
        <div class="avatarTextsContainer">
            <div class="threadUserAvatar">
                <img src=".//images/Avatar Users2_1.png">
                <span>Dummy Poster 5</span>
            </div>
            <div class="threadTextsContainer">
                <div class="threadTexts">
                    <span>Food-Beverages</span>
                    <span style="font-size: larger;">What is the best fast food chicken here?</span>
                    <span>My wife and I been debating which fast food chain offers the best tasting chicken. I say KFC and she says Jolibee. What do you think guys? haha!</span>
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
        <form class="postThreadContent">
            <div class="h2Container">
            <h2 class="thread-post">CREATE A THREAD</h2>
            
            </div>
        
            <div class="category-title">
            <input
                type="text"
                placeholder="Title"
                id="titleInp"
                class="titleInp"
                required
            />
        
            <select id="selectCategory" class="selectCategory" required>
                <option value="" selected disabled>Select Category</option>
                <option value="Technology">Technology</option>
                <option value="E-commerce">E-Commerce</option>
                <option value="Health-Lifestyle">Health & Lifestyle</option>
                <option value="Games">Games</option>
                <option value="Food-Beverages">Food & Beverages</option>
            </select>
            </div>
            <div class="threadInpContainer">
            <textarea id="threadInp" class="threadInp" required></textarea>
            </div>
            <div class="threadBtnContainer">
            
            <i id="expandBtn" class="fa-solid fa-maximize enlargebtn expandBtn"></i>
            <button type="button" id="postBtn" class="postBtn">Post</button>
            </div>
      </form>
    @endguest

@endsection

@section('latestContent')
    <div class="content-box">
        <img src=".//images/Avatar Users2_1.png" class="avatar">
        <div class="text-container">
            <h3 class="latestTitle">What is the best fast food chicken here?</h3>
            <p class="p-1">By: Dummy Poster 5</p>
        </div>
    </div>
@endsection


@section('UserIcon')

@guest
@else
<div class="user">
    <div class="userDropDown headerIcons">
      <img src=".//images/Avatar Users2_20.png" />
      <a href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                  {{ __('Logout') }}
                              </a>

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                  @csrf
                              </form>

      <div class="user-Section" id="userSection" style="display: none">
        <span>Current User</span>
        <button>Account Profile</button>
        <button>Settings and Privacy</button>
        <button>Customize</button>
        <button>Help and Support</button>
        <button>Give Feedback</button>
        <button>Display and Accessibility</button>
        <button>log-out</button>
      </div>
    </div>

  
    <div class="headerIcon">
      <i class="fa-regular fa-bell headerIcons" id="notification"></i>
      <i class="fa-regular fa-lightbulb headerIcons" id="darkmodeBtn"></i>
    </div>
    
    {{-- sadasdas --}}
  </div>
  @endguest
@endsection