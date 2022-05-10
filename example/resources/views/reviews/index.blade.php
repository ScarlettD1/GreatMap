@extends('pattern')

@section('navbar-right')
@endsection

@section('content')
    <div class="content">
        <div class="flex">
            <h1 class="ms-auto me-2">Обзор(Оценка) {{$film->title}}
            </h1>
            @if (Auth::check())
                <a class="btn btn-outline-info mb-auto mt-auto me-auto" href="{{ route('reviews.create', $film) }}">
                    Загрузить...
                </a>
            @else
                <a class="btn btn-primary mb-auto mt-auto me-auto disabled">
                    Загрузить...
                </a>
            @endif
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="container my-3">
            <div class="row row-cols-1">
                @foreach($reviews as $rev)
                    <div class="col my-2">
                        <div class="card">
                            <div class="card-body text-dark">
                                <h5 class="card-title">{{$rev->name}}</h5>
                                <p class="card-text">{{$rev->description}}.</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

@endsection
@section('btn')
            <a href="{{route('index')}}" class="text-decoration-none">
                <button class="btn-secondary h-75 rounded-pill mt-2" type="submit" id="FunctionRequest">Главная страница</button>
            </a>
@endsection
