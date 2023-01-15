@extends('layouts.design')

@section('title')
    {{$userProfile->name}}
@endsection

@section('userProfile')
    <h2>Profile of {{$userProfile->name}}</h2>
@endsection

