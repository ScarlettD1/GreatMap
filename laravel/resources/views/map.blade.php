@extends('main')

@section('content')


<!--Map-->
<div class="main background-map container-fluid">
    <div id="map" class="main-map ">
        <button class="btn btn-add" onclick="showModalHint()">Добавить</button>
        <button class="btn filter-add" onclick="showFilter()">Фильтр</button>
        <!--Input event form-->
        <div id="exampleModal" class="add-meet imshow" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Добавление события</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="closeModalHintAlways()" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="hint_form" name="hint_form" onsubmit="return checkHintForm(this)" method="post">
                        <div class="mb-3 col-12 ">
                            <label for="title" class="col-form-label">Название:</label>
                            <input type="text" class="form-control" name="title-event" id="title"></input>
                        </div>
                        <div class="mb-3 col-12 ">
                            <label for="recipient-name" class="col-form-label">Категория встречи:</label>
                            <p><select name="list1" id="recipient-name">
                                    <option>Спорт</option>
                                    <option>Настольные игры</option>
                                    <option>Прогулка</option>
                                    <option>Концерт</option>

                                </select></p>

                            <!--<input type="text" name="cause" class="form-control" id="recipient-name">-->
                        </div>
                        <div class="mb-3 col-12 ">
                            <button class="btn form-control" onclick="createPlace()">Указать место на карте</button>
                        </div>
                        <div class="mb-3 col-12 ">
                            <label id="shirota" class="col-form-label">Местоположение:</label>
                            <label id="shirotaStreet">dolgota</label>
                        </div>
                        <div class="mb-3 col-12 ">
                            <label for="recipient-count" class="col-form-label">Количество человек:</label>
                            <input type="number" name="countPeople" class="form-control" id="recipient-count">
                        </div>
                        <div class="mb-3 col-12 ">
                            <label for="recipient-date" class="col-form-label">Время:</label>
                            <input type="time" name="date" class="form-control" id="recipient-date">
                        </div>
                        <div class="mb-3 col-12 ">
                            <label for="message-text" class="col-form-label">Описание:</label>
                            <textarea class="form-control" name="description" id="message-text"></textarea>
                        </div>
                        <div class="mb-3 modal-footer">
                            <button type="submit"  class="btn">Добавить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--Filter-->
        <div id="filter" class="filter container-fluid imshow">
            <div class="row items-header justify-content-around">
                <form style="display: inline-flex">
                    <div class="col-1 pad-filter">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="removeFilter()" aria-label="Close" style="width: 30px; height: 30px;"></button>
                    </div>
                    <div class="col-3 pad-filter">
                        <input type="text" class="form-control" placeholder="Категория">
                    </div>
                    <div class="col-3 pad-filter">
                        <input type="text" class="form-control" placeholder="Количество людей">
                    </div>
                    <div class="col-3 pad-filter">
                        <input type="text" class="form-control" placeholder="Время">
                    </div>
                    <div class="col-2 row-item-header-b1">
                        <button type="submit" class="btn" onclick="removeFilter()">Применить</button>
                    </div>
                </form>
            </div>
        </div>
        <!--Click marker-->
        <div id="selectedMarker" class="selectedMarker imshow">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="selectedMarker-title" id="selectedMarkerTitle">Футбол</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="closeSelectedLabelAlways()" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 col-12 selectedMarkerform">
                        <label id="categoryForTheLabel" class="categoryForTheLabel titltLabel">Категория:</label>
                        <label id="categoryForTheSelectedLabel" class="categoryForTheSelectedLabel">Спорт</label>
                    </div>
                    <div class="mb-3 col-12 selectedMarkerform">
                        <label id="countPeopleForTheLabel" class="countPeopleForTheLabel titltLabel">Количество человек:</label>
                        <label id="countPeopleForTheSelectedLabel" class="countPeopleForTheSelectedLabel">5/10</label>
                    </div>
                    <div class="mb-3 col-12 selectedMarkerform">
                        <label id="timeForTheLabel" class="timeForTheLabel titltLabel">Время:</label>
                        <label id="timeForTheSelectedLabel" class="timeForTheSelectedLabel">14:20</label>
                    </div>
                    <div class="mb-3 col-12 selectedMarkerform">
                        <label id="shirotaForTheLabel" class="shirotaForTheLabel titltLabel">Местоположение:</label>
                        <label id="shirotaForTheSelectedLabel"> </label>
                    </div>
                    <div class="mb-3 col-12 selectedMarkerform">
                        <label id="descriptionForTheLabel" class="descriptionForTheLabel titltLabel">Описание:</label>
                        <label id="descriptionForTheSelectedLabel" class="descriptionForTheSelectedLabel">Собираемся играть в футбол, все необходимое для игры есть. От вас форма и запас хорошего настроения.</label>
                    </div>
                    <div class="mb-3 modal-footer selectedMarkerformbtn">
                        <button class="btn">Присоединиться</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
