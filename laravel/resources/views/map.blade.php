@extends('main')
@section('content')

<!--Map-->
<div class="main background-map container-fluid">
    <div id="map" class="main-map "></div>
    <button class="btn btn-add" onclick="checkHintForm()">Добавить</button>
</div>

<!--Block-->
<div class="container-fluid">
    <div class="row text-center">
        <div class="col-12 upcoming-meetings">
            <h1>Ближайшие встречи</h1>
        </div>
    </div>
</div>

<!--Upcoming meetings-->
<div class="container-fluid padding">
    <div class="row ">
        <div class="col-md-4">
            <div class="card">
                <img src="pictures/img/football.jpg" class="card-img-top" alt="картирка не обнаружена" width="70" height="220">
                <div class="card-body">
                    <h5 class="hirizont-center">Играем в футбол</h5>
                    <div class="meeting">
                        <p class="meet-time">Время:</p>
                        <p class="time"> 17:00</p>
                    </div>
                    <div class="short-description">
                        <p class="short-text">Краткое описание:</p>
                        <p class="text"></p>
                    </div>
                    <div class="hirizont-center">
                        <a href="" class="btn hirizont-center">Присоедениться</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="pictures/img/Volley.jpg" class="card-img-top" alt="картирка не обнаружена" width="70" height="220">
                <div class="card-body">
                    <h5 class="hirizont-center">Воллейбольчик</h5>
                    <div class="meeting">
                        <p class="meet-time">Время:</p>
                        <p class="time">18:30</p>
                    </div>
                    <div class="short-description">
                        <p class="short-text">Краткое описание:</p>
                        <p class="text"></p>
                    </div>
                    <div class="hirizont-center">
                        <a href="" class="btn hirizont-center">Присоедениться</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="pictures/img/chess.jpeg" class="card-img-top" alt="картирка не обнаружена" width="70" height="220">
                <div class="card-body">
                    <h5 class="hirizont-center">Название</h5>
                    <div class="meeting">
                        <p class="meet-time">Время:</p>
                        <p class="time">15:45</p>
                    </div>
                    <div class="short-description">
                        <p class="short-text">Краткое описание:</p>
                        <p class="text"></p>
                    </div>
                    <div class="hirizont-center">
                        <a href="" class="btn hirizont-center">Присоедениться</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
