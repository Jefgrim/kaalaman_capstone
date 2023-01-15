@extends('layouts.design')

@section('UserIcon')
    @guest
        <div class="user">
            <div class="userDropDown headerIcons">
                <i class="fa-regular fa-user guestIcon"></i>
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
                <img src={{asset("images/AvatarUsers2_20.png")}} />
                <div class="user-Section" id="userSection" style="display: none">
                    <span>{{Auth::user()->name}}</span>
                    <button>Account Profile</button>
                    <button> 
                        <a class="lagout" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </button>
                </div>
            </div>

            <div class="headerIcon">
                <i class="fa-regular fa-bell headerIcons" id="notification"></i>
                <i class="fa-regular fa-lightbulb headerIcons" id="darkmodeBtn"></i>
            </div>
        </div>
    @endguest
@endsection

@section('commentContent')
<div class="threadNavContainer">
    <div class="backButtonContainer">
        <a href="/thread"><i class="fa-solid fa-circle-left"></i></a>
    </div>
</div>
<div class="threadContent {{$thread->category}}">
    <div class="avatarTextsContainer">
        <div class="threadUserAvatar">
            <img src=".//images/Avatar Users2_1.png">
            <span>{{$thread->users->name}}</span>
        </div>
        <div class="threadTextsContainer">
            <div class="threadTexts">
                <span>{{$thread->category}}</span>
                <span style="font-size: larger;">{{$thread->title}}</span>
                <span>{{$thread->threadpost}}</span>
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
            <i class="fa-solid fa-reply"></i>
        </div>
    </div>
</div>
@endsection