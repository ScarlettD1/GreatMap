// require('./bootstrap');


var placemarks = [];
var modal = document.getElementById('exampleModal');

var flag = false;

var cause = '';
var description = '';

function showFilter(){
    filter.classList.remove('imshow')
}

function checkHintForm(callback) {
    var form = document.forms.hint_form;

    // var cause_form = form.elements.cause.value;
    // var description_form = form.elements.description.value;
    cause = form.elements.cause.value;
    description = form.elements.description.value;

    // console.log(cause_form);
    // console.log(description_form);
    // modal.classList.remove('show');
    closeModalHint();

    return false;
}

function closeModalHint(){
    modal.classList.remove('show');
    flag = true;
}

function showModalHint(){
    modal.classList.add('show');
    flag = true;
}

function init() {
    var map = new ymaps.Map('map', {
        center: [57.14837674163364, 65.54252831023646],
        zoom: 14
    });

    // var modal = document.getElementById('exampleModal');
    // modal.classList.add('show')
    // modal.style.display = "block";

    map.events.add('click', function (e) {

        var coords = e.get('coords');
        modal.classList.add('show');
        // closeModalHint();
        // checkHintForm(closeModalHint);
        // modal.classList.remove('show');


        // modal.show();
        // document.getElementById('exampleModal').ariaHidden = false;

        if(flag){
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
                        // balloonContent: obj.balloonContent,
                        hintContent: obj.hintContent
                    }
                    , {
                        iconLayout: 'default#image',
                        iconImageHref: 'pictures/markers/Star_16.png',
                        iconImageSize: [30, 30],
                        iconImageOffset: [-20, -20]
                    });
                map.geoObjects.add(placemark);
            });
            flag = false;
        }

        // placemarks.push(
        //     {
        //         latitude: coords[0],
        //         longitude: coords[1],
        //         hintContent: cause
        //     })
        // cause = '';
        // description = '';
        // placemarks.forEach(function (obj) {
        //     var placemark = new ymaps.Placemark([obj.latitude, obj.longitude], {
        //             // balloonContent: obj.balloonContent,
        //             hintContent: obj.hintContent
        //         }
        //         , {
        //             iconLayout: 'default#image',
        //             iconImageHref: 'pictures/markers/Star_16.png',
        //             iconImageSize: [30, 30],
        //             iconImageOffset: [-20, -20]
        //         });
        //     map.geoObjects.add(placemark);
        // });
        // console.log(placemarks);
    });

    map.controls.remove('geolocationControl'); // удаляем геолокацию
    map.controls.remove('searchControl'); // удаляем поиск
    map.controls.remove('trafficControl'); // удаляем контроль трафика
    // map.controls.remove('typeSelector'); // удаляем тип
    map.controls.remove('fullscreenControl'); // удаляем кнопку перехода в полноэкранный режим
    map.controls.remove('zoomControl'); // удаляем контрол зуммирования
    map.controls.remove('rulerControl'); // удаляем контрол правил
    // map.behaviors.disable(['scrollZoom']); // отключаем скролл карты (опционально)
}



ymaps.ready(init);
