@extends('pattern')

@section('content')
    <div class = 'col-md-2 ms-md-auto'>
        <a href="{{route('edit',$film->id)}}">

            <button class="btn btn-outline-danger">Редактировать</button>
        </a>

        <form action="{{ route('destroy', $film->id) }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-outline-secondary">Удалить</button>
        </form>
    </div>
    <div class="clearfix border p-3 shadow">

        <img class="col-md-6 float-md-end mb-3 ms-md-3 w-50 rounded-3 shadow " src={{$film->img_url}}>

        <h2>{{$film->title}}</h2>

        <h6> {{$film->genre}}</h6>

        <p>
            {{$film->description}}
        </p>
        <p>
            {{$film->producer}}
        </p>
    </div>

@endsection
@section('theme')@endsection
@section('title')Подробно@endsection
@section('btn')
    <a href={{route('index')}} class="text-decoration-none">
        <button class="btn btn-dark rounded-2" type="submit" id="FunctionRequest">Главная страница</button>
    </a>
@endsection
