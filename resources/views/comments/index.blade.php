@extends('layouts.design')

@section('title')
    {{$thread->title}}
@endsection

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

@section('threadContent')
<div class="threadNavContainer">
    <div class="backButtonContainer">
        <a href="/thread"><i class="fa-solid fa-circle-left"></i></a>
    </div>
</div>
<div class="threadContent {{$thread->category}}">
    <div class="avatarTextsContainer">
        <div class="threadUserAvatar">
            <img src=".//images/Avatar Users2_1.png">
            <span id="usernamethread{{$thread->id}}">{{$thread->users->name}}</span>
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
            <i class="fa-solid fa-reply" type="button" data-bs-toggle="modal" data-bs-target="#replyModal" id="{{$thread->users->name}}" onclick="replyClick()"></i>
        </div>
    </div>
</div>
@endsection

@section('replyModal')
    <div class="modal fade" id="replyModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark">
            <div class="modal-body rounded-4">
                <h3 class="text-secondary-emphasis" id="modalReplyToTxt"></h3>
                <form action="/thread/comments/{{$thread->threadId}}" method="post">
                    {{ csrf_field() }}
                    <div class="form-floating">
                        <input type="hidden" name="threadId" value="{{$thread->id}}">
                        <input type="hidden" name="replyToId" id="modalReplyToId">
                        <input type="hidden" id="modalReplyTo" name="replyTo">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="comment" maxlength="255"></textarea>
                        <label for="floatingTextarea2">Your Comment</label>
                      </div>
                      <button type="submit" class="btn btn-success mt-3">Submit</button>
                      <button type="reset" class="btn btn-danger mt-3" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                </form>
            </div>
        </div>
        </div>
    </div>
@endsection

@section('commentContent')
    @foreach ($comments as $comment)
        @if ($comment->threadId == $thread->id)
                    <div class="replyContent">
                        <div class="avatarTextsContainer">
                            <div class="replyUserAvatar">
                                <img src=".//images/Avatar Users2_29.png">
                                <span>{{$comment->userscomment->name}}</span>
                            </div>
                            <div class="replyTexts">
                                <div class="repliedTo">
                                    <span>{{$comment->replyTo}} said:</span>
                                        @if ($comment->replyToId == null)
                                        <span>{{$comment->threadcomment->threadpost}}</span>
                                        @else
                                        <span>{{DB::table('comment')->where('id', '=', $comment->replyToId)->value('comment')}}</span>
                                        @endif
                                </div>
                                <div class="reply">
                                    <span>{{$comment->comment}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="replyReaction">
                            <div class="thumbsUpDownContainer">
                                <div class="replyThumbsUp">
                                    <i class="fa-regular fa-thumbs-up" id="likereply9"></i>
                                </div>
                                <div class="replyThumbsUp">
                                    <i class="fa-regular fa-thumbs-down" id="dislikereply9"></i>
                                </div>
                            </div>
                                <div class="replyBtnContainer post5Batch" id="{{$comment->id}}">
                                    <i class="fa-solid fa-reply" type="button" data-bs-toggle="modal" data-bs-target="#replyModal" id="{{$comment->userscomment->name}}" onclick="replyClick()"></i>
                                </div>
                        </div>
                    </div>
            @endif
    @endforeach
@endsection