@extends("layouts.app")

@section("title", "Добавления объявления :: Мои объявления")

@section("content")



<form action="{{ route('bb.store')}}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="title">Товар</label>
        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title')}}">
        @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="content">Описание</label>
        <input type="text" name="content" class="form-control @error('content') is-invalid @enderror" value="{{ old('title') }}">
        @error('content')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div><div class="mb-3">
        <label for="price">Цена</label>
        <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}">
        @error('price')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <input type="submit" class="btn btn-primary" value="Добавить">
</form>


@endsection