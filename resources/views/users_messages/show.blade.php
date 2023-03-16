@extends('layouts.app')

@php use App\Models\User @endphp



@section('content')
<div class="mb-2"> 
@forelse($messages as $message)
    <p>{{ User::find($message->from_user_id )->name}}</p>
    <a class="btn btn-primary" href="{{ route('message.create',['user'=>$message->from_user_id])}}">Ответить {{ User::find($message->from_user_id)->name }}</a>
@empty
    <h3>Сообщений пока нет</h3>
@endforelse
</div>

@endsection('content')



