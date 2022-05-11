@section('content')

<!--Form-->
<div class="container reg_form">
    <form class="row justify-content-md-center" method="post" action="#">
        <h2>Регистрация</h2>
        <div class="mb-3 col-12 col-md-4">
            <label for="formGroupExampleInput" class="form-label">Логин</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Придумайте логин">
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">Ваш email адрес будет использован для уведомлений о встречах</div>
        </div>
        <div class="w-100"></div>

        <div class="mb-3 col-12 col-md-4">
            <label for="exampleInputPassword1" class="form-label">Пароль</label>
            <input type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="w-100"></div>

        <div class="mb-3 col-12 col-md-4">
            <label for="exampleInputPassword2" class="form-label">Повторите пароль</label>
            <input type="password" class="form-control" id="exampleInputPassword2">
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <button type="submit" class="btn btn-primary">Зарегестрироваться</button>
            <a href="#">
                <button class="btn btn-primary">Войти</button>
            </a>
        </div>

    </form>
</div>

@endsection
