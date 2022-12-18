@extends('layouts.app')

@section('title', $bb->title)

@section('content')
    <span>Название: </span>
    <h3>{{$bb->title}}</h3>
    <span>Описание: </span>
    <p>{{$bb->content}}</p>
    <span>Цена: </span>
    <p>{{$bb->price}} рублей</p>
    <p><a href="{{ route('index')}}">На главную</a></p>
@endsection

