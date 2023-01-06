@extends('threads.layout')

@section('content')
    <div class="main-container">
       <div class="left-panel">
            <h3>Categories</h3>
            <div class="categories-checkbox">
                <div class="cc-choices">
                    <input type="checkbox">
                    <label for="">Technology</label>
                </div>
                <div class="cc-choices">
                    <input type="checkbox">
                    <label for="">E-commerce</label>
                </div>
                <div class="cc-choices">
                    <input type="checkbox">
                    <label for="">Health & Lifestyle</label>
                </div>
                <div class="cc-choices">
                    <input type="checkbox">
                    <label for="">Games</label>
                </div>
                <div class="cc-choices">
                    <input type="checkbox">
                    <label for="">Food</label>
                </div>
            </div>
       </div>
       <div class="center-panel">
            <div>
                <h1>SAMPLE POST</h1>
            </div>
            <div>
                <h1>SAMPLE POST</h1>
            </div>
       </div>
       <div class="right-panel">
        @guest
            <div>
                <h1>PLEASE LOGIN</h1>
            </div>
            @else
                <h1>POST A THREAD</h1>
        @endguest
       </div>
    </div>
@endsection