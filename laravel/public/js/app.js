// require('./bootstrap');

var placemarks = [];
//Модальное окно
var modal = document.getElementById('exampleModal');
var selectedlabel = document.getElementById('selectedMarker')
var shirota = document.getElementById('shirotaStreet');

var titleForLabel = document.getElementById('selectedMarkerTitle');
var categoryForTheLabel = document.getElementById('categoryForTheSelectedLabel');
var nowPeopleID = document.getElementById('nowPeopleID');
var needPeopleID = document.getElementById('needPeopleID');
var timeForTheLabel = document.getElementById('timeForTheSelectedLabel');
var shirotaForLabel = document.getElementById('shirotaForTheSelectedLabel');
var descriptionForTheLabel = document.getElementById('descriptionForTheSelectedLabel');




var dolgota = document.getElementById('dolgota');
var disconnecting = document.getElementById('disconnect');
var join = document.getElementById('join');

var map;



var joinjs = document.getElementById('joinjs');
var disconnectingjs = document.getElementById('disconnecting');

var button_for_place = document.getElementById("indicate-the-place");

var placemark;
var countPeople1 = document.getElementById("nowPeopleID");
var countPeople2 = document.getElementById("needPeopleID");

var flagOnActive = true;
var activePlacemark;
var newPlacemark;
var countActive = 0;

var flag = false;

var cause = '';

function showFilter() {
    filter.classList.remove('imshow')
}

function checkParams() {
    var titleCheck = document.getElementById("title").value;
    var recipient_countCheck = document.getElementById("recipient-count").value;
    var man_neededCheck = document.getElementById("man-needed").value;
    var recipient_dateCheck = document.getElementById("recipient-date").value;
    var message_textCheck = document.getElementById("message-text").value;


    if (titleCheck.length !== 0 && recipient_countCheck !== 0 && man_neededCheck !== 0 && recipient_dateCheck.length !== 0 && message_textCheck.length !== 0) {
        button_for_place.disabled = false;
    }
}

function removeFilter() {
    filter.classList.add('imshow')
}

// Отображение точек с таблицы meetings
function showPlaces(places) {
    places.forEach(element => {
        var placemark = new ymaps.Placemark(element.coordinates.split(','), {
                hintContent: cause
            }
            , {
                iconLayout: 'default#image',
                iconImageHref: '../pictures/markers/blue-icon.png',
                iconImageSize: [30, 30],
                iconImageOffset: [-20, -20]
            });
        map.geoObjects.add(placemark);
    })
}

function getPlaces() {
    var form = document.forms.hint_form;
// var cause_form = form.elements.cause.value;
// var description_form = form.elements.description.value;
    token = form.elements._token.value;
    fetch('/meetings_pins', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': token
        },
    }).then(r => {
        r.json().then(showPlaces)
    });
}

document.addEventListener("DOMContentLoaded", function () {
    getPlaces()
});

function createPlace() {
    event.preventDefault();
    flag = true;
// console.log('sss');

    modal.classList.remove('show');
    map.events.add('click', function ggwp(e) {
        if (flag) {
            e.preventDefault();
            var coords = e.get('coords');
            document.getElementById('coord').value = coords;
// shirota.innerText = getAddress(coords);
// dolgota.innerText = coords[1];
            getAddress(coords);

            modal.classList.add('show');

            const iPlacemarkId = placemarks.push(
                {
                    latitude: coords[0],
                    longitude: coords[1],
                    hintContent: cause
                })

            var title = document.getElementById('title');
            var recipient_count = document.getElementById('recipient-count');
            var man_needed = document.getElementById('man-needed');
            var description = document.getElementById('message-text');
            var recipient_date = document.getElementById('recipient-date');
            var place = document.getElementById('shirotaStreet');



            cause = '';
            placemark = new ymaps.Placemark([coords[0], coords[1]],
                {
                    titlePlacemark: title.value,
                    recipient_countPlacemark:recipient_count.value,
                    man_neededPlacemark:man_needed.value,
                    recipient_datePlacemark:recipient_date.value,
                    placePlaxemark:place.value,
                    descriptionPlacemark:description.value
                }
                // {
                //     balloonContentBody: [
                //         '<div class="selectedMarker">',
                //             '<div>Категория: спорт</div>',
                //             '<div>' + title.value + '</div>',
                //             '<div>Количество человек:' + recipient_count.value + ':' + man_needed.value +'</div>',
                //             '<div>Дата и время:' + recipient_date.value + '</div>',
                //             '<div>Местоположение:' + place.value + '</div>',
                //             '<div>Описание:</div>',
                //             '<div>'+ description.value + '</div>',
                //             '<button id="joinjs" class="btn" onClick="participate()">Присоединиться</button>',
                //             '<button id="disconnectjs" class="btn imshow" onClick="cancelParticipation()">Отсоедениться</button>',
                //         '</div>'
                //     ].join('')
                // }
                , {
                    iconLayout: 'default#image',
                    iconImageHref: '../pictures/markers/blue-icon.png',
                    iconImageSize: [30, 30],
                    iconImageOffset: [-20, -20]
                });

// map.geoObjects.add(placemark);

// Подпишемся на событие клика по коллекции.
            placemark.events
                .add('click', function (e) {
// Получим ссылку на геообъект, по которому кликнул пользователь.
                    var targetCoords = e.get('target').geometry.getCoordinates();
                    getAddressLabel(targetCoords, e);
                    document.getElementById('coord').value = targetCoords;

                    activePlacemark = e.get('target');
                    if (flagOnActive) {
                        activePlacemark.options.set('iconImageHref', '../pictures/markers/gold_icon24.png');

                        flagOnActive = false;
                        if (countActive !== 0)
                            newPlacemark.options.set('iconImageHref', '../pictures/markers/blue-icon.png');
                        newPlacemark = activePlacemark;
                        countActive++;

                    } else {
                        newPlacemark.options.set('iconImageHref', '../pictures/markers/blue-icon.png');
                        activePlacemark.options.set('iconImageHref', '../pictures/markers/gold_icon24.png');
                        newPlacemark = activePlacemark;
                        flagOnActive = true;
                    }
// activePlacemark = e.get('target');
// activePlacemark.options.set('iconImageHref', 'pictures/markers/blue-icon.png');

// e.get('target').options.change()

                    selectedlabel.classList.remove('imshow');
                    join.classList.remove('imshow');
                    disconnecting.classList.add('imshow');

                });
        }
        flag = false;
    });

    return true;
}

function AddMark() {
    map.geoObjects.add(placemark);

    // title = document.getElementById('title');
    // recipient_count = document.getElementById('recipient-count');
    // description = document.getElementById('message-text');

    // console.log(description1.value);
    document.getElementById("hint_form").reset();
    document.getElementById("shirotaStreet").innerHTML = "";
    modal.classList.add('imshow');
    button_for_place.disabled = true;

}

function participate(){
    countPeople1.innerHTML = Number(countPeople1.textContent) + 1;
    countPeople2.innerText = Number(countPeople2.textContent) - 1;
    join.classList.add('imshow');
    disconnecting.classList.remove('imshow');

    // joinjs.classList.add('imshow');
    // disconnectingjs.classList.remove('imshow');
}

function cancelParticipation(){
    countPeople1.innerHTML = Number(countPeople1.textContent) - 1;
    countPeople2.innerText = Number(countPeople2.textContent) + 1;
    join.classList.remove('imshow');
    disconnecting.classList.add('imshow');

    // joinjs.classList.remove('imshow');
    // disconnectingjs.classList.add('imshow');
}

function getAddress(coords) {
    ymaps.geocode(coords).then(function (res) {
        var firstGeoObject = res.geoObjects.get(0);
        [
// Название населенного пункта или вышестоящее административно-территориальное образование.
            firstGeoObject.getLocalities().length ? firstGeoObject.getLocalities() : firstGeoObject.getAdministrativeAreas(),
// Получаем путь до топонима, если метод вернул null, запрашиваем наименование здания.
            firstGeoObject.getThoroughfare() || firstGeoObject.getPremise()
        ].filter(Boolean).join(', ')
        shirota.innerText = firstGeoObject.getAddressLine();
// return firstGeoObject.getAddressLine();
    });
}

function getAddressLabel(target, e) {
    ymaps.geocode(target).then(function (res) {
        var secondGeoObject = res.geoObjects.get(0);
        [
// Название населенного пункта или вышестоящее административно-территориальное образование.
            secondGeoObject.getLocalities().length ? secondGeoObject.getLocalities() : secondGeoObject.getAdministrativeAreas(),
// Получаем путь до топонима, если метод вернул null, запрашиваем наименование здания.
            secondGeoObject.getThoroughfare() || secondGeoObject.getPremise()
        ].filter(Boolean).join(', ')
        shirotaForLabel.innerText = secondGeoObject.getAddressLine();
        var placemark = e.get('target');
        titleForLabel.innerText = placemark.properties.get('titlePlacemark');
        // categoryForTheLabel.innerText = placemark.properties.get('titlePlacemark');
        nowPeopleID.innerText = placemark.properties.get('recipient_countPlacemark');
        needPeopleID.innerText = placemark.properties.get('man_neededPlacemark');
        timeForTheLabel.innerText = placemark.properties.get('recipient_datePlacemark');
        descriptionForTheLabel.innerText = placemark.properties.get('descriptionPlacemark');




// return firstGeoObject.getAddressLine();
    });
}

function checkHintForm() {
    event.preventDefault();
    var form = document.forms.hint_form;
// var cause_form = form.elements.cause.value;
// var description_form = form.elements.description.value;
    tag = form.elements.list1.value;
    countPeople = form.elements.countPeople.value;
    description = form.elements.description.value;
    coord = form.elements.coord.value;
    meeting_time = form.elements.meeting_time.value;
    title = form.elements.title_event.value;
    token = form.elements._token.value;
    haveCount = form.elements.have_count_people.value;
    data = {
        "title_event": title,
        "meeting_time": meeting_time,
        "description": description,
        "list1": tag,
        "countPeople": countPeople,
        "coord": coord,
        "have_count_people": haveCount
    };
    console.log(JSON.stringify(data));
    fetch('/create', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': token
        },
        body: JSON.stringify(data)
    });

    closeModalHintAlways();

    return false;
}

function closeModalHintAlways() {
    modal.classList.add('imshow');
    flag = false;
}

function closeSelectedLabelAlways() {
    selectedlabel.classList.add('imshow');
}

function showModalHint() {
    modal.classList.remove('imshow');
    flag = false;
}

function init() {
    map = new ymaps.Map('map', {
        center: [57.14837674163364, 65.54252831023646],
        zoom: 14,
        controls: ['geolocationControl']
    }, {
        searchControlProvider: 'yandex#search'
    });
    var myPlacemark = new ymaps.Placemark([55.76, 37.64], {
// Хинт показывается при наведении мышкой на иконку метки.
        hintContent: 'Содержимое всплывающей подсказки',
// Балун откроется при клике по метке.
        balloonContent: 'Содержимое балуна'
    });
    geolocation.get({
        provider: 'yandex',
        mapStateAutoApply: true
    }).then(function (result) {
// Красным цветом пометим положение, вычисленное через ip.
        result.geoObjects.options.set('preset', 'islands#redCircleIcon');
        result.geoObjects.get(0).properties.set({
            balloonContentBody: 'Мое местоположение'
        });
        myMap.geoObjects.add(result.geoObjects);
    });

// placemarks.events
// .add('mouseenter', function (e) {
// // Ссылку на объект, вызвавший событие,
// // можно получить из поля 'target'.
// e.get('target').options.set('pictures/markers/blue-icon.png', 'pictures/markers/gold_icon24.png');
// })
// .add('mouseleave', function (e) {
// e.get('target').options.unset('pictures/markers/blue-icon.png');
// });

    map.controls.remove('geolocationControl'); // удаляем геолокацию
    map.controls.remove('searchControl'); // удаляем поиск
    map.controls.remove('trafficControl'); // удаляем контроль трафика
    map.controls.remove('typeSelector'); // удаляем тип
    map.controls.remove('fullscreenControl'); // удаляем кнопку перехода в полноэкранный режим
    map.controls.remove('zoomControl'); // удаляем контрол зуммирования
    map.controls.remove('rulerControl'); // удаляем контрол правил
// map.behaviors.disable(['scrollZoom']); // отключаем скролл карты (опционально)
}

let date = new Date();

ymaps.ready(init);
var thisDate = date.getDate();
if (thisDate < 10) {
    thisDate++;
    thisDate = "0" + thisDate;
}
var thisMonth = date.getMonth();
if (thisMonth < 10) {
    thisMonth++;
    thisMonth = "0" + thisMonth;
}
var thisHour = date.getHours();
if (thisHour < 10) {
    thisHour = "0" + thisHour;
}
var thisMinutes = date.getMinutes();
if (thisMinutes < 10) {
    thisMinutes = "0" + thisMinutes;
}
document.getElementById('time_hour').innerHTML = thisHour;
document.getElementById('time_minutes').innerHTML = thisMinutes;
document.getElementById('time_date').innerHTML
    = thisDate + "." + thisMonth + "." + date.getFullYear() + " ";
