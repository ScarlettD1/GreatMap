@extends('main')

@section('content')

<!--Entr Form-->
<div class="container enter_form">
    <form class="row justify-content-md-center" method="post" action="{{ route('login') }}">
        @csrf

        <h2>Вход</h2>
        <div class="mb-3 col-12 col-md-4">
            <label for="formGroupExampleInput" class="form-label">Email</label>
            <input name="email" type="text" class="form-control" id="formGroupExampleInput" placeholder="Email">
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <label for="exampleInputPassword1" class="form-label">Пароль</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Введите пароль">
        </div>
        <div class="w-100"></div>

        <div class="mb-4 mt-4 col-12 col-md-4 btn_form">
            <a href="#">
                <button class="btn btn-primary">Войти</button>
            </a>
        </div>
    </form>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>

@endsection
