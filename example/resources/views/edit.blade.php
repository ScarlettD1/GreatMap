@extends('pattern')

@section('content')
{{--    @if ($errors->any())--}}
{{--        <div class="alert alert-danger">--}}
{{--            <ul>--}}
{{--                @foreach ($errors->all() as $error)--}}
{{--                    <li>{{ $error }}</li>--}}
{{--                @endforeach--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    @endif--}}
    <form action="{{route('update', $film->id)}}" method="post" id="form_add" enctype="multipart/form-data" name="create">
        @csrf
        <div class="form-group pt-2">
            <label for="title">Введите название</label>
            <input type="text" name="title" value="{{$film->title}}" placeholder="Название" id="title" class="form-control">
        </div>
        <div class="form-group pt-2">
            <label for="genre">Введите жанр</label>
            <input type="text" name="genre" value="{{$film->genre}}" placeholder="Жанр" id="genre" class="form-control">
        </div>
        <div class="form-group pt-2">
            <label for="description">Введите описание</label>
            <textarea type="text" name="description" placeholder="Текст" id="description" class="form-control">{{$film->description}}</textarea>
        </div>
        <div class="form-group pt-2">
            <label for="producer">Введите имя режиссера</label>
            <textarea type="text" name="producer" placeholder="Имя" id="producer" class="form-control">{{$film->producer}}</textarea>
        </div>
        <div class="form-group pt-2">
            <label for="date_of_public">Введите дату выхода</label>
            <input type="date" name="date_of_public" placeholder="Дата" id="date_of_public" class="form-control">{{$film->date_of_public}}
        </div>
        <div class="form-group pt-2">
            <label for="image_url">Изображение</label>
            <p>Выбрано изображение: {{$film->image_url}}"</p>
            <input type="file" name="image_url" placeholder="" id="image_url" class="form-control" accept="image/*">
        </div>
        <div class="pt-4 pb-3">
            <button class="btn btn-success" type="submit">Обновить</button>
        </div>
    </form>

@endsection
@section('theme')<h2 class="px-5 h2 mt-5">Редактирование данных</h2>@endsection
@section('title')Редактирование@endsection
@section('btn')
    <a href="{{route('index')}}" class="text-decoration-none">
        <button class="btn-secondary h-75 rounded-pill mt-2" type="submit" id="FunctionRequest">Главная страница</button>
    </a>
@endsection
