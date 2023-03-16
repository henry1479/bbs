@extends('layouts.app')


@section('title', $bb->title)
@dump($bb->user)
@section('content')
    <span>Название: </span>
    <h3>{{$bb->title}}</h3>
    <span>Описание: </span>
    <p>{{$bb->content}}</p>
    <span>Цена: </span>
    <p>{{$bb->price}} рублей</p>
    <span>Автор:</span>
    <p>
        {{$bb->user->name}}
        <a href="{{ route('message.create', ['user' => $bb->user]) }}"> Написать автору</a>
    </p>
    <p><a href="{{ route('index')}}">На главную</a></p>
@endsection

