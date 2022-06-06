@extends('main')

@section('content')

<!--Entr Form-->
<div class="container enter_form">
    <form class="row justify-content-md-center" method="post" action="#">
        <h2>Вход</h2>
        <div class="mb-3 col-12 col-md-4">
            <label for="formGroupExampleInput" class="form-label">Логин</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Введите логин">
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <label for="exampleInputPassword1" class="form-label">Пароль</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Введите пароль">
        </div>
        <div class="w-100"></div>

        <div class="mb-4 mt-4 col-12 col-md-4 btn_form">
            <a href="#">
                <button class="btn btn-primary">Войти</button>
            </a>
        </div>

    </form>
</div>

@endsection
