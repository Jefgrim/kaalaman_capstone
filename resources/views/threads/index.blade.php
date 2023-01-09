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
        <form class="postThreadContent">
            <div class="h2Container">
            <h2 class="thread-post">CREATE A THREAD</h2>
            <p>Please Login To Create a Thread</p>
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