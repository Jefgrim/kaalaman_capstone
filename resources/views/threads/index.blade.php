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

@section('latestContent')
    <div class="content-box">
        <img src=".//images/Avatar Users2_1.png" class="avatar">
        <div class="text-container">
            <h3 class="latestTitle">What is the best fast food chicken here?</h3>
            <p class="p-1">By: Dummy Poster 5</p>
        </div>
    </div>
@endsection