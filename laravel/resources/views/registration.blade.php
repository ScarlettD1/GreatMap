@extends('main')


@section('content')

<!--Reg Form-->
<div class="container reg_form">
    <form class="row justify-content-md-center" method="post" action="{{ route('register') }}">
        @csrf

        <h2>Регистрация</h2>
        <div class="mb-3 col-12 col-md-4">
            <label for="name" class="form-label">Логин</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Придумайте логин">
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">Ваш email адрес будет использован для уведомлений о встречах</div>
        </div>
        <div class="w-100"></div>

        <div class="mb-3 col-12 col-md-4">
            <label for="password" class="form-label">Пароль</label>
            <input type="password" class="form-control" id="password">
        </div>
        <div class="w-100"></div>

        <div class="mb-3 col-12 col-md-4">
            <label for="password_confirmation" class="form-label">Повторите пароль</label>
            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
        </div>
        <div class="w-100"></div>
        <div class="mb-5 mt-5 col-12 col-md-4 align-content-center">
            <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
        </div>

    </form>
</div>

@endsection
