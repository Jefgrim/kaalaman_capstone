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
<div class="toast sticky-top" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
    <div class="toast-body">
      A New Comment is posted, click reload page to see the latest comment.
      <div class="mt-2 pt-2 border-top">
        <button type="button" class="btn btn-primary btn-sm" onclick="window.location.reload()">Reload Page</button>
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="toast">Close</button>
      </div>
    </div>
  </div>
<div class="threadContent {{$thread->category}}">
    <div class="avatarTextsContainer">
        <div class="threadUserAvatar">
            @if ($thread->users->image == null)
                <img class="user-icon" src="{{asset("./images/defaultDp.png")}}" width="100" height="100" alt="" style="border-radius: 50%">
            @else
                <img class="user-icon" src="{{asset($thread->users->image)}}" width="100" height="100" alt="" style="border-radius: 50%">
             @endif
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
        @guest
            
        @else
            <div class="thumbsUpDownContainer">
                <div class="threadThumbsUp">
                    <form action="/" method="POST"id="likeThreadId{{$thread->id}}">
                        {{ csrf_field() }}
                        <input type="hidden" name="threadId" value="{{$thread->id}}">
                        <input type="hidden" name="userId" value="{{Auth::id()}}">
                        <input type="hidden" name="status" value="liked">
                        @if(DB::table('likethread')->where('userId','=', Auth::id())->where('threadId','=',$thread->id)->value('status') == "liked")
                            <i class="fa-regular fa-thumbs-up" class="btn" id="like{{$thread->id}}" onclick="likes(); return false" style="color: green"></i>
                            @else
                            <i class="fa-regular fa-thumbs-up" class="btn" id="like{{$thread->id}}" onclick="likes(); return false" style="color: white"></i>
                        @endif
                     </form>
                </div>
                <div class="threadThumbsDown">
                    <form action="/dislike" method="POST"id="dislikeThreadId{{$thread->id}}">
                        {{ csrf_field() }}
                        <input type="hidden" name="threadId" value="{{$thread->id}}">
                        <input type="hidden" name="userId" value="{{Auth::id()}}">
                        <input type="hidden" name="status" value="disliked">
                        @if(DB::table('dislikethread')->where('userId','=', Auth::id())->where('threadId','=',$thread->id)->value('status') == "disliked")
                             <i class="fa-regular fa-thumbs-down" class="btn" id="dislike{{$thread->id}}" onclick="dislikes(); return false" style="color: red"></i>
                            @else
                            <i class="fa-regular fa-thumbs-down" class="btn" id="dislike{{$thread->id}}" onclick="dislikes(); return false" style="color: white"></i>
                        @endif
                       
                    </form>
                </div>
            </div>
            <div class="replyBtnContainer">
                <i class="fa-solid fa-reply" type="button" data-bs-toggle="modal" data-bs-target="#replyModal" id="{{$thread->users->name}}" onclick="replyClick()"></i>
            </div>
        @endguest
    </div>
</div>

<script type="text/javascript">
    function likes(){
       let btnId= event.srcElement.parentNode.id
       let likeBtn = document.querySelector(`#${event.srcElement.id}`)
       let dislikeBtnId = `dis${likeBtn.id}`
        let dislikeBtn = document.querySelector(`#${dislikeBtnId}`)
       if(likeBtn.style.color == "green") {
        likeBtn.style.color = "white"
       }else if(likeBtn.style.color == 'white'){
        likeBtn.style.color = "green"
        dislikeBtn.style.color = "white"
       }
     $.ajax({
         type: 'post',
         url: '/',
         data: $(`#${btnId}`).serialize()
         });
     }
    </script>
    
    <script type="text/javascript">
        function dislikes(){
            let btnId= event.srcElement.parentNode.id
            let dislikekeBtn = document.querySelector(`#${event.srcElement.id}`)
            let likeBtnId = `${dislikekeBtn.id}`
            likeBtnId = likeBtnId.toString().replace('dis', "")
            let likeBtn = document.querySelector(`#${likeBtnId}`)
    
            if(dislikekeBtn.style.color == "red") {
                dislikekeBtn.style.color = "white"
            }else if(dislikekeBtn.style.color == 'white'){
                dislikekeBtn.style.color = "red"
                likeBtn.style.color = "white"
            }
         $.ajax({
            type: 'post',
            url: '/dislike',
            data: $(`#${btnId}`).serialize(),
            });
         }
    </script>
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
                                @if ($comment->userscomment->image == null)
                                <img class="user-icon" src="{{asset("./images/defaultDp.png")}}" width="100" height="100" alt="" style="border-radius: 50%">
                                @else
                                <img class="user-icon" src="{{asset($comment->userscomment->image)}}" width="100" height="100" alt="" style="border-radius: 50%">
                                @endif
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
                            @guest
                            
                            @else
                                <div class="thumbsUpDownContainer">
                                    <div class="replyThumbsUp">
                                        <form action="/likecomments" method="POST"id="likeComment{{$comment->id}}">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="commentId" value="{{$comment->id}}">
                                            <input type="hidden" name="userId" value="{{Auth::id()}}">
                                            <input type="hidden" name="status" value="liked">
                                           
                                            @if(DB::table('likecomment')->where('userId','=', Auth::id())->where('commentId','=',$comment->id)->value('status') == "liked")
                                            <i class="fa-regular fa-thumbs-up" class="btn" id="commentlike{{$comment->id}}" onclick="likesComment(); return false" style="color: green"></i>
                                            @else
                                            <i class="fa-regular fa-thumbs-up" class="btn" id="commentlike{{$comment->id}}" onclick="likesComment(); return false" style="color: white"></i>
                                        @endif
                                        </form>
                                    </div>
                                    <div class="replyThumbsUp">
                                        <form action="/dislikecomments" method="POST"id="dislikecomment{{$comment->id}}">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="commentId" value="{{$comment->id}}">
                                            <input type="hidden" name="userId" value="{{Auth::id()}}">
                                            <input type="hidden" name="status" value="dislike">
                                            @if(DB::table('dislikecomment')->where('userId','=', Auth::id())->where('commentId','=',$comment->id)->value('status') == "dislike")
                                             <i class="fa-regular fa-thumbs-down" class="btn" id="commentdislike{{$comment->id}}" onclick="DislikesComment(); return false" style="color: red"></i>
                                             @else
                                             <i class="fa-regular fa-thumbs-down" class="btn" id="commentdislike{{$comment->id}}" onclick="DislikesComment(); return false" style="color: white"></i>
                                            @endif
                                        </form>
                                        
                                    </div>
                                </div>
                                <div class="replyBtnContainer post5Batch" id="{{$comment->id}}">
                                    <i class="fa-solid fa-reply" type="button" data-bs-toggle="modal" data-bs-target="#replyModal" id="{{$comment->userscomment->name}}" onclick="replyClick()"></i>
                                </div>
                            @endguest
                        </div>
                    </div>
             @endif
    @endforeach
    <script type="text/javascript">
        function likesComment(){
           let btnId= event.srcElement.parentNode.id
           let likeBtn = document.querySelector(`#${event.srcElement.id}`)
            let dislikeBtnId = `${likeBtn.id}`
            dislikeBtnId = dislikeBtnId.toString().replace('commentlike', "commentdislike")
                let dislikeBtn = document.querySelector(`#${dislikeBtnId}`)
            if(likeBtn.style.color == "green") {
                likeBtn.style.color = "white"
            }else if(likeBtn.style.color == 'white'){
                likeBtn.style.color = "green"
                dislikeBtn.style.color = "white"
            }
         $.ajax({
                type: 'post',
                url: '/likecomments',
                data: $(`#${btnId}`).serialize(),
                });
         };
        </script>

        <script type="text/javascript">
            function DislikesComment(){
               let btnId= event.srcElement.parentNode.id
               let dislikeBtn = document.querySelector(`#${event.srcElement.id}`)
               let likeBtnId = `${dislikeBtn.id}`
                likeBtnId = likeBtnId.toString().replace('commentdislike', "commentlike")
                let likeBtn = document.querySelector(`#${likeBtnId}`)
                if(dislikeBtn.style.color == "red") {
                    dislikeBtn.style.color = "white"
                }else if(dislikeBtn.style.color == 'white'){
                    dislikeBtn.style.color = "red"
                    likeBtn.style.color = "white"
            }
             $.ajax({
                    type: 'post',
                    url: '/dislikecomments',
                    data: $(`#${btnId}`).serialize(),
                    });
             };
            </script>
@endsection