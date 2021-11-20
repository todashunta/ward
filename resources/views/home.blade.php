@extends('layouts.header')
@section('title', 'create')

@section('script', "js/home.js")
@section('css', "css/home.css")
@section('content')
<div id="app">
    <div class="main">
        <div class="num">@{{ num }}</div>
        <div class="word">@{{ word }}</div>
        <div class="mean">@{{ mean }}</div>
    </div>
    <div class="play">
        <div @@click="shuffle"><img src="image/play/shuffle.svg" alt="shuffle"></div>
        <div @@click="leftSkip"><img src="image/play/left-skip.svg" alt="left"></div>
        <div @@click="start"><img src="image/play/start.svg" alt="start"></div>
        <div @@click="rightSkip"><img src="image/play/right-skip.svg" alt="right"></div>
        <div @@click="repeat"><img src="image/play/repeat.svg" alt="repeat"></div>
    </div>
</div>
@endsection