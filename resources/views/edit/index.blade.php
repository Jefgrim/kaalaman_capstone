@extends('layouts.design')

@section('edit')
<div class="modularEdit">
          
    <div class="expandPostThread"> 
      <div class="postThreadContainer" >
        <form class="postThreadContent" action="{{url('update-data/'.$thread->id) }}"method="post">
          {{ csrf_field() }}
          @method('GET')
          <div class="h2Container">
            <h2 class="thread-post">CREATE A THREAD</h2>
           <a href="/"> <i id="closeBtn" class="fa-regular fa-circle-xmark expandBtn"></i></a>
          </div>

          <div class="category-title" >
            <input
            value="{{$thread->title}}"
              type="text"
              placeholder="Title"
              id="expandedTitleInp"
              class="titleInp"
              name="title"
              required
            />
            <select id="expandedSelectCategory" class="selectCategory"  name="category"  required>
              <option></option>
              <option disabled>Select Category</option>
              <option value="Technology" {{ $thread->category == 'Technology' ? 'selected' : '' }} >Technology</option>
              <option value="E-commerce" {{ $thread->category == 'E-commerce' ? 'selected' : '' }}>E-Commerce</option>
              <option value="Health-Lifestyle" {{ $thread->category == 'Health-Lifestyle' ? 'selected' : '' }}>Health & Lifestyle</option>
              <option value="Games" {{ $thread->category == 'Games' ? 'selected' : '' }}>Games</option>
              <option value="Food-Beverages" {{ $thread->category == 'Food-Beverages' ? 'selected' : '' }}>Food & Beverages</option>
            </select>
          </div>
          <div class="threadInpContainer" >
            <textarea id="expandedThreadInp" class="threadInp" name="threadpost" required maxlength="255">{{$thread->threadpost}}</textarea>
          </div>
          <div class="threadBtnContainer">
            
            
            <button type="submit" id="expandedPostBtn" class="postBtn">Update</button>
          </div>
        </form>
      </div>
      </div>
  </div>
@endsection