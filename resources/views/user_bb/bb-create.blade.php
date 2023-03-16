@extends("layouts.app")

@section("title", "Добавления объявления :: Мои объявления")

@section("content")



<form action="{{ route('bb.store') }}" method="POST">
    @csrf
    @method('post')
    <div class="mb-3">
        <label for="title">Товар</label>
        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title')}}">
        @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="title">Рубрика</label>
        <select name="rubric_id" class="form-select @error('title') is-invalid @enderror">
            @foreach($rubrics as $rubric)
                <option value="{{ $rubric->id }}">{{ $rubric->title }}</option>
            @endforeach
        <select>
        @error('rubric_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="content">Описание</label>
        <input type="text" name="content" class="form-control @error('content') is-invalid @enderror" value="{{ old('content') }}">
        @error('content')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="content">Адрес</label>
        <input type="text" name="adress" class="form-control @error('content') is-invalid @enderror" value="{{ old('adress') }}">
        @error('adress')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="price">Цена</label>
        <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}">
        @error('price')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <input type="submit" class="btn btn-primary" value="Добавить">
</form>


@endsection