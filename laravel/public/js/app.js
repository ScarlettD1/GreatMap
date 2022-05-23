// require('./bootstrap');

var placemarks = [];
//Модальное окно
var modal = document.getElementById('exampleModal');
var selectedlabel = document.getElementById('selectedMarker')
var shirota = document.getElementById('shirotaStreet');
var shirotaForLabel = document.getElementById('shirotaForTheSelectedLabel');
var dolgota = document.getElementById('dolgota');
var map;

var flagOnActive = true;
var activePlacemark;
var newPlacemark;
var countActive = 0;

var flag = false;

var cause = '';
var description = '';

function showFilter(){
    filter.classList.remove('imshow')
}

function removeFilter(){
    filter.classList.add('imshow')

}

function createPlace(){
    event.preventDefault();
    flag = true;
    // console.log('sss');
    if(flag){
        modal.classList.remove('show');
        map.events.add('click', function (e) {
            e.preventDefault();
            var coords = e.get('coords');
            // console.log('click');
            // shirota.innerText = getAddress(coords);
            // dolgota.innerText = coords[1];
            getAddress(coords);

            modal.classList.add('show');

            placemarks.push(
                {
                    latitude: coords[0],
                    longitude: coords[1],
                    hintContent: cause
                })

            cause = '';
            description = '';
            placemarks.forEach(function (obj) {
                var placemark = new ymaps.Placemark([obj.latitude, obj.longitude], {
                        // balloonContent: getAddress(coords),
                        hintContent: obj.hintContent
                    }
                    , {
                        iconLayout: 'default#image',
                        iconImageHref: '../pictures/markers/blue-icon.png',
                        iconImageSize: [30, 30],
                        iconImageOffset: [-20, -20]
                    });
                map.geoObjects.add(placemark);
                // Подпишемся на событие клика по коллекции.
                placemark.events
                    .add('click', function (e) {
                        // Получим ссылку на геообъект, по которому кликнул пользователь.
                        var targetCoords = e.get('target').geometry.getCoordinates();
                        getAddressLabel(targetCoords);




                        activePlacemark = e.get('target');
                        if (flagOnActive){
                            activePlacemark.options.set('iconImageHref', '../pictures/markers/gold_icon24.png');

                            flagOnActive = false;
                            if(countActive !== 0)
                                newPlacemark.options.set('iconImageHref', '../pictures/markers/blue-icon.png');
                            newPlacemark = activePlacemark;
                            countActive++;

                        }
                        else{
                            newPlacemark.options.set('iconImageHref', '../pictures/markers/blue-icon.png');
                            activePlacemark.options.set('iconImageHref', '../pictures/markers/gold_icon24.png');
                            newPlacemark = activePlacemark;
                            flagOnActive = true;
                        }
                        // activePlacemark = e.get('target');
                        // activePlacemark.options.set('iconImageHref', 'pictures/markers/blue-icon.png');

                        // e.get('target').options.change()
                        // console.log(target.geometry.getCoordinates());


                        selectedlabel.classList.remove('imshow');
                        // console.log("Нажата");
                    });
            });
            // console.log(placemarks);
        });
        flag = false;
        // console.log('fff');
    } else {
        alert('f');
    }
    return true;
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
        // console.log(firstGeoObject.getAddressLine())
    });
}

function getAddressLabel(target) {
    ymaps.geocode(target).then(function (res) {
        var secondGeoObject = res.geoObjects.get(0);
        [
            // Название населенного пункта или вышестоящее административно-территориальное образование.
            secondGeoObject.getLocalities().length ? secondGeoObject.getLocalities() : secondGeoObject.getAdministrativeAreas(),
            // Получаем путь до топонима, если метод вернул null, запрашиваем наименование здания.
            secondGeoObject.getThoroughfare() || secondGeoObject.getPremise()
        ].filter(Boolean).join(', ')
        shirotaForLabel.innerText = secondGeoObject.getAddressLine();
        // return firstGeoObject.getAddressLine();
        // console.log(firstGeoObject.getAddressLine())
    });
}


function checkHintForm() {
    event.preventDefault();
    var form = document.forms.hint_form;

    // var cause_form = form.elements.cause.value;
    // var description_form = form.elements.description.value;
    cause = form.elements.list1.value;
    description = form.elements.countPeople.value;

    closeModalHintAlways();

    return false;
}

function closeModalHintAlways(){
    modal.classList.add('imshow');
    flag = false;
    // console.log(flag);
}

function closeSelectedLabelAlways(){
    selectedlabel.classList.add('imshow');
}

function showModalHint(){
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
    //     .add('mouseenter', function (e) {
    //         // Ссылку на объект, вызвавший событие,
    //         // можно получить из поля 'target'.
    //         e.get('target').options.set('pictures/markers/blue-icon.png', 'pictures/markers/gold_icon24.png');
    //     })
    //     .add('mouseleave', function (e) {
    //         e.get('target').options.unset('pictures/markers/blue-icon.png');
    //     });


    map.controls.remove('geolocationControl'); // удаляем геолокацию
    map.controls.remove('searchControl'); // удаляем поиск
    map.controls.remove('trafficControl'); // удаляем контроль трафика
    map.controls.remove('typeSelector'); // удаляем тип
    map.controls.remove('fullscreenControl'); // удаляем кнопку перехода в полноэкранный режим
    map.controls.remove('zoomControl'); // удаляем контрол зуммирования
    map.controls.remove('rulerControl'); // удаляем контрол правил
    // map.behaviors.disable(['scrollZoom']); // отключаем скролл карты (опционально)
}



ymaps.ready(init);
