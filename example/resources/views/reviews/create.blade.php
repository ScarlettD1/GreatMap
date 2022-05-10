@extends('pattern')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Добавить оценку для {{$film->title}}</h2>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>!!!!</strong> При отправке возникли ошибки.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('reviews.store', $film->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row row-cols-1">
            <div class="col">
                <div class="form-group">
                    <strong>Оценка:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Отлично"
                           value="{{ old('name') }}">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <strong>Комментарии:</strong>
                    <textarea class="form-control" style="height:3em" name="description"
                              placeholder="Текст" >{{ old('description') }}</textarea>
                </div>
            </div>
            <div class="col my-5">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
@section('btn')
    <a href="{{ route('reviews.index', $film->id) }}" class="text-decoration-none">
        <button class="btn-secondary h-75 rounded-pill mt-2" type="submit" id="FunctionRequest">Назад</button>
    </a>
@endsection
