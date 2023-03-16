


@extends('layouts.app')

@section('title', "главная")


@section('content')


<h2>Объявления :: Главная страница</h2>
<div class="table-responsive">
    @if(count($content) > 0)
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">номер</th>
              <th scope="col">название</th>
              <th scope="col">рубрика</th>
              <th scope="col">автор</th>
              <th scope="col">цена в рублях</th>
            </tr>
          </thead>
        <tbody>
          @foreach($content as $bb)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $bb->title }} </td>
              <td><a href="{{ route('rubric_show_bbs',  ['rubric' => $bb->rubric->id] ) }}">{{ $bb->rubric->title}}</a></td>
              <td>{{ $bb->user->name}}</td>
              <td>{{ $bb->price }}</td>
              <td><a href="{{ route('detail', ['bb' => $bb->id]) }}">подробнее</a></td>
            </tr>
          @endforeach
        </tbody>

        </table>
    @endif
</div>
@endsection
