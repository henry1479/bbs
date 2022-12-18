


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
              <th scope="col">цена в рублях</th>
            </tr>
          </thead>
        <tbody>
          @for($i=1; $i<count($content)+1; $i++)
            <tr>
              <td>{{$i}}</td>
              <td>{{ $content[$i-1]->title }} </td>
              <td>{{ $content[$i-1]->price }}</td>
              <td><a href="{{ route('detail', ['bb' => $content[$i-1]->id]) }}">подробнее</a></td>
            </tr>
          @endfor
        </tbody>

        </table>
    @endif
</div>
@endsection
