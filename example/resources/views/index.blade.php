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
            @foreach($films as $film)
            <div class="col">
                <div class="card {{$film->trashed() ? 'deleted' : ""}} bg-dark bg-gradient border-secondary h-100 " data-bs-toggle="{{$film->trashed() ? ' ' : "modal"}}" data-bs-target="#myModal{{$film->id}}">
                    <div class="card-header bg-gradient bg-dark"> {{$film->genre}} </div>
                    <div class="card-body text-center">
                        <img src="{{$film->image_url}}" class=" img-fluid card-img h-auto mb-1" alt="{{$film->title}}">
                        <h2 class="card-title h-auto ">{{$film->title}}</h2>

                        <div class="card-text mt-5">
                            {{$film->description}}
                        </div>
                    </div>
                    @if(Auth::user()->is_admin ?? null)
                        @if($film->trashed() ?? null)
                            <div class="row mx-auto">
                                <form action="{{route('films.restore', $film->id)}}" class="w-50" method="post">
                                    @csrf
                                    <input type="text" hidden name="return_url" value="{{Request::url()}}">
                                    <input class="btn btn-success m-2" type="submit" name="restore"
                                           value="Восстановить"/>
                                </form>
                                <form action="{{route('films.purge', $film->id)}}" class="w-50" method="post">
                                    @csrf
                                    <input type="text" hidden name="return_url" value="{{Request::url()}}">
                                    <input class="btn btn-danger m-2" type="submit" name="purge" value="Удалить"/>
                                </form>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
            <!-- Modal -->
                <div class="modal fade" id="myModal{{$film->id}}" tabindex="-1" aria-labelledby="ModalJW" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="ModalJW">{{$film->title}}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Director: {{$film->producer}}<br> Release date: {{$film->date_of_public}}</p>
                                <a class="btn mx-auto btn-outline-success" href="{{route('reviews.index', $film->id)}}">Оценка фильма</a>
                            </div>
                            <div class="modal-footer">
                                @if (Gate::allows('modify-object', $film))
                                    <input type="text" hidden name="return_url" value="{{Request::url()}}">
                                    <a href="{{route('edit',$film->id)}}">
                                        <button type="button" class="btn btn-outline-primary">Edit</button>
                                    </a>
                                    <form action="{{ route('destroy', $film->id) }}" method="POST">
                                        @csrf
                                        <input type="text" hidden name="return_url" value="{{Request::url()}}">
                                        @method('delete')
                                        <button type="submit" class="btn btn-outline-danger">Удалить</button>
                                    </form>
                                @endif
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
@section('theme')
    <h2 class="px-5 h2 mt-5">Фильмы
        @if (! is_null($user))
            (для пользователя {{$user->name}})
        @endif
    </h2>
@endsection
@section('title')Фильмы@endsection
@section('btn')
    @if (Auth::check())
    <a href="{{route('create')}}" class="text-decoration-none">
        <button class="btn-secondary h-75 rounded-pill mt-2" type="submit" id="FunctionRequest">Загрузить</button>
    </a>
    @else
            <button class="btn-dark h-75 rounded-pill mt-2 disabled" >Загрузить</button>
    @endif
@endsection
