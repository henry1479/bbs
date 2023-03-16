


@extends('layouts.app')

@section('title', $title)


@section('content')


<h2>Рубрика :: {{ $title }}</h2>
<a href="{{ route('rubrics_show', ['parentRubric' => $parent->id]) }}">{{ $parent->title}}</a>
<div class="table-responsive">
    @if(count($content) > 0)
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">номер</th>
              <th scope="col">название</th>
              <th scope="col">рубрика</th>
              <th scope="col">цена в рублях</th>
            </tr>
          </thead>
        <tbody>
          @for($i=1; $i<count($content)+1; $i++)
            <tr>
              <td>{{$i}}</td>
              <td>{{ $content[$i-1]->title }} </td>
              <td>{{ $content[$i-1]->rubric->title}}</td>
              <td>{{ $content[$i-1]->price }}</td>
              <td><a href="{{ route('detail', ['bb' => $content[$i-1]->id]) }}">подробнее</a></td>
            </tr>
          @endfor
        </tbody>

        </table>
    @endif
</div>
@endsection
