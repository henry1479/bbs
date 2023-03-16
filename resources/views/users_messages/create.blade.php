@extends("layouts.app")

@section("title", "Сообщение :: Написать сообщение $user->name ")



@section("content")
@if(session("success"))
<div class="alert alert-success alert-dismissible fade show" data-dismiss="alert" role="alert">
  {{ session("success")}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

@endif
<x-chat :firstUserId="Auth::user()->id" :secondUserId="$user->id"/>
<form action="{{ route('message.send') }}" method="POST">
    @csrf
    <div class="mb-3 mt-3">
        <p>Кому: {{ $user->name }}
        <input type="hidden" value={{ $user->id }} name="to_user_id" />
    </div>
    <div class="mb-3">
        <label for="content">Текст</label>
        <textarea class="form-control @error('content') is-invalid @enderror" id="exampleFormControlTextarea1" name="content" rows="3"></textarea>
        @error('content')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    <input type="submit" class="btn btn-success mt-4" value="Отправить"/>
</form>



@if(session("fail"))
    <div class="invalid-feedback"> {{ session('fail') }} </div>
@endif




@endsection