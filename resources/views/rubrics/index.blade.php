

@extends('layouts.app')

@section('title', "рубрики")

@section('content')


<h2>Рубрики:: Главная страница</h2>
<div class="table-responsive">
    @if(count($rubrics) > 0)
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">номер</th>
              <th scope="col">название</th>
            </tr>
          </thead>
        <tbody>
          @for($i=1; $i<count($rubrics)+1; $i++)
            <tr>
              <td>{{$i}}</td>
              <td>{{ $rubrics[$i-1]->title }} </td>
              <td><a href="{{ route('rubrics_show',['parentRubric' => $rubrics[$i-1]->id]) }}">{{ __("Вложенные рубрики") }}</a></td>
            </tr>
          @endfor
        </tbody>

        </table>
    @endif
</div>
@endsection
