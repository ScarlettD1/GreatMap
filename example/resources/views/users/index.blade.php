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
    <div class="container mx-auto w-100 px-5">
    <div class="mx-auto row row-cols-3 mb-5  gx-4 gy-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 row-cols-xl-3 row-cols-xxl-3">
        @foreach($users as $u)
            <a class="list-group-item list-group-item-action"
               href="{{ route('users.films', $u->name) }}">
                <div class="row row-cols-1 row-cols-sm-2 text-black">
                    <div>
                        {{$u->name}}
                    </div>
                    @if (! Auth::user()->friendsWith($u))
                        <form action="{{route('users.befriend', $u->name)}}" method="POST">
                            @csrf
                            <input type="submit" class="btn btn-success" value="Дружить">
                        </form>
                    @else
                        <form action="{{route('users.unfriend', $u->name)}}" method="POST">
                            @csrf
                            <input type="submit" class="btn btn-danger" value="Перестать дружить">
                        </form>
                    @endif
                    <div class="col">
                        <form action="{{route('users.feed', $u->name)}}" method="Get">
                            <input type="submit" class="btn btn-info" value="Лента">
                        </form>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
    </div>

@endsection
@section('theme')<h2 class="px-5 h2 mt-5">Пользователи</h2>@endsection
@section('title')Пользователи@endsection
@section('btn')
    <a href="{{ route('login') }}" class="text-decoration-none">
        <button class="btn-secondary h-75 rounded-pill mt-2" type="submit" id="FunctionRequest">Log in</button>
    </a>
@endsection
