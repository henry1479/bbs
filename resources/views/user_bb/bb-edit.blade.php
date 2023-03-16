@extends("layouts.app")


@section("title", "Редактирование объявления :: Мои объявления")

@section("content")
<form action="{{ route('bb.update', ['bb'=>$bb->id])}}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="title">Товар</label>
        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $bb->title) }}">
        @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="content">Описание</label>
        <input type="text" name="content" class="form-control @error('content') is-invalid @enderror" value="{{ old('content' ,$bb->content) }}" >
        @error('content')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="price">Цена</label>
        <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price',  $bb->price) }}">
        @error('price')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
            
    </div>
    <input type="submit" class="btn btn-primary" value="Сохранить">
</form>


@endsection