<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Проект_2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="../css/app.css" rel="stylesheet">
</head>
<body>


<!--Header-->
<div class="header-color container-fluid header-for-css">
    <header class="row items-header">
        <div class="col-3">
            <a href="/map/" class="links-decoration">
                <img src="../pictures/img/logo.png" width="40" height="40">
                <span class="logo-text">Great Meet</span>
            </a>
        </div>
        <div class="col-4 text-center">
            <a href="/map/" class="px-2 links-decoration">Встречи</a>
            <a href="/support/" class="px-4  links-decoration">Поддержка</a>
        </div>
        <div class="col-2 text-end">
            <span id="time_date" class="hours">
            </span>
            <span id="time_hour" class="hours">
            </span>
            :
            <span id="time_minutes" class="minutes">
            </span>
        </div>
        <div class="col-3 text-end">
            @if (Auth::check())
            <a href="/entrance/" class="tst">
                <button class="btn">{{Auth::user()}}</button>
            </a>
             @else
            <a href="/entrance/" class="tst">
                <button class="btn">Войти</button>
            </a>
            <a href="/registration/" class="tst">
                <button class="btn">Зарегистрироваться</button>
            </a>
            @endif
        </div>
    </header>
</div>

@yield('content')

<!--Footer-->
<div class="footer-color container-fluid footer-for-css">
    <div class="row footer-first items-header">
        <div class="col-4 row-item-footer-right">
        </div>
        <div class="col-4 row-item-header">
            <a href="/map/" class="links-decoration">
                <img src="../pictures/img/logo.png" width="40" height="40">
                <span class="logo-text">great meet</span>
            </a>
        </div>
        <div class="col-4 row-item-footer-left">
        </div>
    </div>
    <hr>
    <div class="row networks text-center">
        <div class="col-12 social text-center">
            <a class="links" href="https://twitter.com">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter"
                     viewBox="0 0 16 16">
                    <path
                        d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                </svg>
            </a>
            <a class="links" href="https://www.youtube.com">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-youtube"
                     viewBox="0 0 16 16">
                    <path
                        d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z"/>
                </svg>
            </a>
            <a class="links" href="https://www.google.ru">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-google"
                     viewBox="0 0 16 16">
                    <path
                        d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z"/>
                </svg>
            </a>
        </div>
    </div>
    <div class="row text-center">
        <div class="col-12">
            <p class="copyrigt">© 2022 great meet</p>
        </div>
    </div>

</div>

<!--yandexMap-->
<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=5127ede8-ca9d-4c4b-8d84-92ad690c4b07"></script>
<script src="../js/app.js"></script>
<!--boot5-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
</html>
