

ymaps.ready(init);

function init() {
    // Подключаем поисковые подсказки к полю ввода.
    var suggestView = new ymaps.SuggestView('suggest'),
        map,
        placemark;

    // При клике по кнопке запускаем верификацию введёных данных.
    $('#address-check').bind('click', function (e) {
        e.preventDefault();
        geocode();
    });

    function geocode() {
        // Забираем запрос из поля ввода.
        var request = $('#suggest').val();
        // Геокодируем введённые данные.
        ymaps.geocode(request).then(function (res) {
            var obj = res.geoObjects.get(0),
                error, hint;

            if (obj) {
                // Об оценке точности ответа геокодера можно прочитать тут: https://tech.yandex.ru/maps/doc/geocoder/desc/reference/precision-docpage/
                switch (obj.properties.get('metaDataProperty.GeocoderMetaData.precision')) {
                    case 'exact':
                        break;
                    case 'number':
                    case 'near':
                    case 'range':
                        error = 'Неточный адрес, требуется уточнение';
                        hint = 'Уточните номер дома';
                        break;
                    case 'street':
                        error = 'Неполный адрес, требуется уточнение';
                        hint = 'Уточните номер дома';
                        break;
                    case 'other':
                    default:
                        error = 'Неточный адрес, требуется уточнение';
                        hint = 'Уточните адрес';
                }
            } else {
                error = 'Адрес не найден';
                hint = 'Уточните адрес';
            }

            // Если геокодер возвращает пустой массив или неточный результат, то показываем ошибку.
            if (error) {
                showError(error);
                showMessage(hint);
            } else {
                showResult(obj);
            }
        }, function (e) {
            console.log(e)
        })

    }

    function showResult(obj) {
        // Удаляем сообщение об ошибке, если найденный адрес совпадает с поисковым запросом.
        $('#suggest').removeClass('input_error');
        $('#notice').css('display', 'none');

        var mapContainer = $('#map'),
            bounds = obj.properties.get('boundedBy'),
            // Рассчитываем видимую область для текущего положения пользователя.
            mapState = ymaps.util.bounds.getCenterAndZoom(
                bounds,
                [mapContainer.width(), mapContainer.height()]
            ),
            // Сохраняем полный адрес для сообщения под картой.
            address = [obj.getCountry(), obj.getAddressLine()].join(', '),
            // Сохраняем укороченный адрес для подписи метки.
            shortAddress = [obj.getThoroughfare(), obj.getPremiseNumber(), obj.getPremise()].join(' ');
        // Убираем контролы с карты.
        mapState.controls = [];
        // Создаём карту.
        createMap(mapState, shortAddress);
        // Выводим сообщение под картой.
        showMessage(address);
    }

    function showError(message) {
        $('#notice').text(message);
        $('#suggest').addClass('input_error');
        $('#notice').css('display', 'block');
        // Удаляем карту.
        if (map) {
            map.destroy();
            map = null;
        }
    }

    // function createMap(state, caption) {
    //     // Если карта еще не была создана, то создадим ее и добавим метку с адресом.
    //     if (!map) {
    //         map = new ymaps.Map('map', state);
    //         placemark = new ymaps.Placemark(
    //             map.getCenter(), {
    //                 iconCaption: caption,
    //                 balloonContent: caption
    //             }, {
    //                 preset: 'islands#redDotIconWithCaption'
    //             });
    //         map.geoObjects.add(placemark);
    //         // Если карта есть, то выставляем новый центр карты и меняем данные и позицию метки в соответствии с найденным адресом.
    //     } else {
    //         map.setCenter(state.center, state.zoom);
    //         placemark.geometry.setCoordinates(state.center);
    //         placemark.properties.set({iconCaption: caption, balloonContent: caption});
    //     }
    // }

    function showMessage(message) {
        $('#messageHeader').text('Данные получены:');
        $('#message').text(message);
    }
}





var swiper = new Swiper(".mySwiper", {
  pagination: {
    el: ".quest__slider_bar_wrapper",
    type: "bullets",
    currentClass: "quest__slider_dot",
    progressbarFillClass: ".swiper-pagination-bullet-active",
  },
    preventClicks: false,
    preventClicksPropagation: false,
    simulateTouch: false,
  navigation: {
    nextEl: ".quest__next",
    prevEl: ".quest__prev",
  },
  effect: "fade",
  allowTouchMove: false,
});

const bar = document.querySelector(".quest__slider_bar_wrapper");
if (bar) {

    const bullets = bar.children;

    bullets[1].classList.add("bullet_next_next");

    function findActiveBullet(collection) {
        for (var i = 0; i < collection.length; i++) {
            if (collection[i].classList.contains("swiper-pagination-bullet-active")) {
                return i;
            }
        }
        return false;
    }

    function removeAdditionClasses(collection) {
        for (var i = 0; i < collection.length; i++) {

            if (collection[i].classList.contains("bullet_next_next")) {
                collection[i].classList.remove("bullet_next_next");
            } else if (collection[i].classList.contains("bullet_checked")) {
                collection[i].classList.remove("bullet_checked");
            }
        }
    }

    function findChecked(collection, currentBullet) {
        for (var i = 0; i < currentBullet; i++) {
            collection[i].classList.add("bullet_checked");
        }
    }

    const target = document.querySelector(".quest__slider_bar_wrapper");

    const observer = new MutationObserver(function (mutations) {
        mutations.forEach(function (mutation) {
            let currentBullet = findActiveBullet(bullets);
            removeAdditionClasses(bullets);
            findChecked(bullets, currentBullet);
            if (bullets[currentBullet + 1] !== undefined) {
                bullets[currentBullet + 1].classList.add("bullet_next_next");
            }
        });
    });

    const config = {attributes: true, childList: true, characterData: true};

    observer.observe(target, config);

    const successMessage = document.querySelector('.quest .success');

}
    // const form = document.getElementById('quest_form');
    // form.addEventListener('submit', function (e) {
    //     e.preventDefault();
    //     console.log(new FormData(form))
    //     fetch("/checkout", {
    //         method: "POST",
    //         headers: {
    //             "Content-Type": "application/json",
    //             Accept: "application/json",
    //             "X-Requested-With": "XMLHttpRequest",
    //             "X-CSRF-TOKEN": document.head.querySelector("meta[name=csrf-token]")
    //                 .content,
    //         },
    //         credentials: "same-origin",
    //         body: new FormData(form),
    //     })
    //         .then((response) => {
    //             return response;
    //         })
    //         .then((data) => {
    //             alert('заказ оформлен');
    //         });
    // });





// function send(event) {
//         event.preventDefault();
//         sendFormData();
//         alert('заказ оформлен');
//   // successMessage.classList.add('active');
// }
// }




