<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

Route::get('/testclient/redirect', function (Request $request) {
    $request->session()->put('state', $state = Str::random(40));

    $query = http_build_query([
        'client_id' => '7',
        'redirect_uri' => 'http://localhost:8001/testclient/auth/callback',
        'response_type' => 'code',
        'scope' => '',
        'state' => $state,
    ]);

    return redirect('http://localhost:8000/oauth/authorize?' . $query);
});


Route::get('/testclient/', function (Request $request) {
    return "Войти в клиента используя приложение Laravel из ЛР4: <a href='/testclient/redirect'>Кнопочка или ссылочка</a>";
});

Route::get('/testclient/auth/callback', function (Request $request) {
    echo "Код:" . $request['code'] . "
    Состояние:" . $request['state'];

    echo "Для завершения авторизации сервер превратил код в токен, используя client_secret";

    // Превращаем код в токен
    $state = $request->session()->pull('state');

    throw_unless(
        strlen($state) > 0 && $state === $request->state,
        InvalidArgumentException::class
    );

    $response = Http::asForm()->post('http://localhost:8000/oauth/token', [
        'grant_type' => 'authorization_code',
        'client_id' => '7',
        'client_secret' => 'ix7FQc8v82mzEhOm2Pu7imn3Hr06CBrFovVHAWgn',
        'redirect_uri' => 'http://localhost:8001/testclient/auth/callback',
        'code' => $request->code,
    ]);

    echo "А тут вам говорят что авторизация прошла успешно. Клиент получил JSON ниже, в нем есть token, с которым клиент теперь может делать действия ЛР3-5 от вашего имени.";
    return $response->json();
});
