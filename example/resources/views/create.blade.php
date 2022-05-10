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
    <form action={{route('index')}} method="post" class="needs-validation m-3" id="form_add" enctype="multipart/form-data" name="create">
        @csrf
        <div class="form-group pt-2">
            <label for="name">Введите название</label>
            <input type="text" name="title" placeholder="Название" id="title" class="form-control" required>
        </div>
        <div class="form-group pt-2">
            <label for="elo">Введите жанр</label>
            <input type="text" name="genre" placeholder="жанр" id="genre" class="form-control" required>
        </div>
        <div class="form-group pt-2">
            <label for="info_p">Введите описание</label>
            <textarea type="text" name="description" placeholder="Текст" id="description" class="form-control" required></textarea>
        </div>
        <div class="form-group pt-2">
            <label for="info">Введите имя режиссера</label>
            <textarea type="text" name="producer" placeholder="Имя" id="producer" class="form-control" required></textarea>
        </div>
        <div class="form-group pt-2">
            <label for="info">Введите дату публикации</label>
            <input type="date" name="date_of_public" placeholder="Дата" id="date_of_public" class="form-control" required>
        </div>
        <div class="form-group pt-2">
            <label for="image_url">Изображение</label>
            <input type="file" name="image_url" placeholder="" id="image_url" class="form-control" accept="image/*" required>
        </div>
        <div class="pt-4 pb-3">
            <button class="btn btn-success" type="submit">Создать</button>
        </div>
    </form>

@endsection
@section('theme')<h2 class="px-5 h2 mt-5">Добавление фильма</h2>@endsection
@section('title')Загрузка@endsection
@section('btn')
    <a href="{{route('index')}}" class="text-decoration-none">
        <button class="btn-secondary h-75 rounded-pill mt-2" type="submit" id="FunctionRequest">Главная страница</button>
    </a>
@endsection
