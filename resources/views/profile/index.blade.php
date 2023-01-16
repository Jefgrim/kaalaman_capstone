@extends('layouts.design')

@section('title')
    {{$userProfile->name}}
@endsection

@section('userProfile')
    <h2>Profile of {{$userProfile->name}}</h2>

    <div class="profileContiner">
        <div class="profilePicture">

        </div>
        <div class="profileInformation">
            <span>Name</span>

        </div>

    </div>
@endsection

