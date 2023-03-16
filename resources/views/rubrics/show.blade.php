



@extends('layouts.app')

@section('title',  $title)
@section('content')



<h2>Рубрики:: {{ $title }}</h2>
<div class="table-responsive">
    <a href="{{ route('rubrics_index')}}">К основным рубрикам</a>
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
              <td><a href="{{ route('rubric_show_bbs',  ['rubric' => $rubrics[$i-1]->id] ) }}">{{ __("Объявления") }}</a></td>
            </tr>
          @endfor
        </tbody>

        </table>
    @endif
</div>
@endsection
