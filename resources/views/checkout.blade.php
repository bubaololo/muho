@extends('layouts.app')

@section('content')
    @push('styles')
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
        <link href="{{ asset('css/checkout.css') }}" rel="stylesheet">
        <link href="{{ asset('css/checkout-media.css') }}" rel="stylesheet">
    @endpush
    {{--<div class="container">--}}
    {{--    <div class="row justify-content-center">--}}
    {{--        <div class="col-md-8">--}}
    {{--            <div class="card">--}}
    {{--                <div class="card-header">{{ __('Dashboard') }}</div>--}}

    {{--                <div class="card-body">--}}
    {{--                    @if (session('status'))--}}
    {{--                        <div class="alert alert-success" role="alert">--}}
    {{--                            {{ session('status') }}--}}
    {{--                        </div>--}}
    {{--                    @endif--}}

    {{--                        <div class="form-group {{$errors->has('region_id')}}">--}}
    {{--                            <label>Region:</label>--}}
    {{--                            {{app('form')->select('region_id', $regions, null, ['class' => 'form-control', 'id' => 'region_id'])}}--}}
    {{--                            {{$errors->first('region_id')}}--}}
    {{--                        </div>--}}
    {{--                        <div class="form-group {{$errors->has('province_id')}}">--}}
    {{--                            <label>Province:</label>--}}
    {{--                            {{app('form')->select('province_id', [], null, ['class' => 'form-control', 'id' => 'province_id'])}}--}}
    {{--                            {{$errors->first('province_id')}}--}}
    {{--                        </div>--}}
    {{--                        <div class="form-group {{$errors->has('city_id')}}">--}}
    {{--                            <label>City:</label>--}}
    {{--                            {{app('form')->select('city_id', [], null, ['class' => 'form-control', 'id' => 'city_id'])}}--}}
    {{--                            {{$errors->first('city_id')}}--}}
    {{--                        </div>--}}
    {{--                        <div class="form-group {{$errors->has('barangay_id')}}">--}}
    {{--                            <label>Barangay:</label>--}}
    {{--                            {{app('form')->select('barangay_id', [], null, ['class' => 'form-control', 'id' => 'barangay_id'])}}--}}
    {{--                            {{$errors->first('barangay_id')}}--}}
    {{--                        </div>--}}
    {{--                        <div class="form-group {{$errors->has('street')}}">--}}
    {{--                            <label>Street:</label>--}}
    {{--                            {{app('form')->text('street', null, ['class' => 'form-control'])}}--}}
    {{--                            {{$errors->first('street')}}--}}
    {{--                        </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--</div>--}}
    <div class="quest">
        <div class="container">
            <div class="quest__header">
                <div class="quest__header_title_wrapper">
                    <div class="quest__header_title">
                        <div class="quest__header_title-text">
                            Вопросник по потребностям
                        </div>
                        <div class="quest__header_title-tag">
                            СОКРАЩЁННЫЙ
                        </div>
                        <div class="quest__header_subtitle">
                            Сокращённый (для первичного знакомства с потребностью)
                        </div>
                    </div>
                </div>
                <div class="quest__header-question">
                    19 вопросов
                </div>
            </div>
        </div>
        <section class="quest__slider">
            <div class="success">
                <img src="img/quest_success.svg" alt="icon" class="quest__success">
                <div class="sucess_text">
                    Ваша анкета отправлена
                </div>
            </div>
            <div class="quest__slider_bar">
                <div class="container">
                    <div class="quest__slider_bar_wrapper">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="quest__slider_wrapper mySwiper">
                    <form enctype="multipart/form-data" method="post" id="quest_form"
                          class="quest__slides swiper-wrapper" onsubmit="send(event)">
                        <!-- ________SLIDE -->
                        <div class="swiper-slide">
                            <div class="quest__slide">
                                <div class="quest__slide_title_wrapper">
                                    <div class="quest__slide_title">
                                        Описание потребности / задачи
                                    </div>
                                </div>
                                <div class="quest__slide_forms_wrapper">

                                    <div class="quest__input">
                                        <label for="story">Ключевые параметры требуемого решения (продукта или
                                            технологии)</label>
                                        <textarea id="quest1" name="quest1" class="quest__textarea"
                                                  placeholder="Мой ответ">
</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="quest__slider_buttons_wrapper">
                                <div class="quest__next quest__button">Вперёд</div>
                            </div>
                        </div>
                        <!-- ________SLIDE -->
                        <div class="swiper-slide">
                            <div class="quest__slide">
                                <div class="quest__slide_title_wrapper">
                                    <div class="quest__slide_title">
                                        Описание потребности / задачи
                                    </div>
                                    <div class="quest__slide_subtitle">
                                        Слова и словосочетания, наиболее полно характеризующие потребность.
                                    </div>
                                    <div class="redline"></div>
                                </div>
                                <div class="quest__slide_forms_wrapper">
                                    <div class="quest__input">
                                        <label for="story">Ключевые параметры требуемого решения (продукта или
                                            технологии)</label>
                                        <textarea id="quest1" name="quest1" class="quest__textarea"
                                                  placeholder="Мой ответ">
                    </textarea>
                                    </div>
                                    <div class="quest__input">
                                        <label for="story">Ограничения по стоимости готового решения</label>
                                        <textarea id="quest2" name="quest2" class="quest__textarea"
                                                  placeholder="Мой ответ">
                    </textarea>
                                    </div>
                                    <div class="quest__input">
                                        <label for="story">Требования к сертификации</label>
                                        <textarea id="quest3" name="quest3" class="quest__textarea"
                                                  placeholder="Мой ответ">
                    </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="quest__slider_buttons_wrapper">
                                <div class="quest__next quest__button">Далее</div>
                                <div class="quest__prev quest__button">Назад</div>
                            </div>
                        </div>
                        <!-- ________SLIDE -->
                        <div class="swiper-slide">
                            <div class="quest__slide">
                                <div class="quest__slide_title_wrapper">
                                    <div class="quest__slide_title">
                                        Условия проекта
                                    </div>
                                    <div class="redline"></div>
                                </div>
                                <div class="quest__slide_forms_wrapper">

                                    <div class="quest__input">
                                        <label for="story">Ограничения по срокам реализации проекта</label>
                                        <textarea id="quest4" name="quest4" class="quest__textarea"
                                                  placeholder="Мой ответ">
</textarea>
                                    </div>
                                    <div class="quest__input">
                                        <label for="story">Особые требования и ограничения по исполнителям</label>
                                        <textarea id="quest5" name="quest5" class="quest__textarea"
                                                  placeholder="Мой ответ">
</textarea>
                                    </div>
                                    <div class="quest__input">
                                        <label for="story">Прочие существенные ограничения</label>
                                        <textarea id="quest6" name="quest6" class="quest__textarea"
                                                  placeholder="Мой ответ">
</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="quest__slider_buttons_wrapper">
                                <div class="quest__next quest__button">Далее</div>
                                <div class="quest__prev quest__button">Назад</div>
                            </div>
                        </div>
                        <!-- ________SLIDE -->
                        <div class="swiper-slide">
                            <div class="quest__slide">
                                <div class="quest__slide_title_wrapper">
                                    <div class="quest__slide_title">
                                        Известные аналоги
                                    </div>
                                    <div class="redline"></div>
                                </div>
                                <div class="quest__slide_forms_wrapper">
                                    <div class="quest__input">
                                        <label for="story">Российские</label>
                                        <textarea id="quest7" name="quest7" class="quest__textarea"
                                                  placeholder="Мой ответ">
          </textarea>
                                    </div>
                                    <div class="quest__input">
                                        <label for="story">Зарубежные</label>
                                        <textarea id="quest8" name="quest8" class="quest__textarea"
                                                  placeholder="Мой ответ">
          </textarea>
                                    </div>
                                    <div class="quest__input">
                                        <label for="story">Сравнение требуемого решения с аналогами</label>
                                        <textarea id="quest9" name="quest9" class="quest__textarea"
                                                  placeholder="Мой ответ">
          </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="quest__slider_buttons_wrapper">
                                <div class="quest__next quest__button">Далее</div>
                                <div class="quest__prev quest__button">Назад</div>
                            </div>
                        </div>
                        <!-- ________SLIDE -->
                        <div class="swiper-slide">
                            <div class="quest__slide">
                                <div class="quest__slide_title_wrapper">
                                    <div class="quest__slide_title">
                                        История самостоятельной проработки вопроса
                                    </div>
                                    <div class="redline"></div>
                                </div>
                                <div class="quest__slide_forms_wrapper">
                                    <div class="quest__input">
                                        <label for="story">История (если существует) взаимодействия с
                                            исполнителями</label>
                                        <textarea id="quest10" name="quest10" class="quest__textarea"
                                                  placeholder="Мой ответ">
          </textarea>
                                    </div>
                                    <div class="quest__input">
                                        <label for="story">Достигнутые результаты и ограничения</label>
                                        <textarea id="quest11" name="quest11" class="quest__textarea"
                                                  placeholder="Мой ответ">
          </textarea>
                                    </div>
                                    <div class="quest__input">
                                        <label for="story">Потенциальные исполнители</label>
                                        <textarea id="quest12" name="quest12" class="quest__textarea"
                                                  placeholder="Мой ответ">
          </textarea>
                                    </div>
                                    <div class="quest__input">
                                        <label for="story">Используемые ранее зарубежные аналоги</label>
                                        <textarea id="quest13" name="quest13" class="quest__textarea"
                                                  placeholder="Мой ответ">
          </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="quest__slider_buttons_wrapper">
                                <div class="quest__next quest__button">Далее</div>
                                <div class="quest__prev quest__button">Назад</div>
                            </div>
                        </div>
                        <!-- ________SLIDE -->
                        <div class="swiper-slide">
                            <div class="quest__slide">
                                <div class="quest__slide_title_wrapper">
                                    <div class="quest__slide_title">
                                        Рынок
                                    </div>
                                    <div class="redline"></div>
                                </div>
                                <div class="quest__slide_forms_wrapper">

                                    <div class="quest__input">
                                        <label for="story">Конечные пользователи</label>
                                        <textarea id="quest14" name="quest14" class="quest__textarea"
                                                  placeholder="Мой ответ">
                              </textarea>
                                    </div>
                                    <div class="quest__input">
                                        <label for="story">Объём рынка</label>
                                        <textarea id="quest15" name="quest15" class="quest__textarea"
                                                  placeholder="Мой ответ">
                              </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="quest__slider_buttons_wrapper">
                                <div class="quest__next quest__button">Далее</div>
                                <div class="quest__prev quest__button">Назад</div>
                            </div>
                        </div>
                        <!-- ________SLIDE -->
                        <div class="swiper-slide">
                            <div class="quest__slide">
                                <div class="quest__slide_title_wrapper">
                                    <div class="quest__slide_title">
                                        Контакты
                                    </div>
                                    <div class="redline"></div>
                                </div>
                                <div class="quest__slide_forms_wrapper">

                                    <div class="quest__input">
                                        <label for="story">Заказчик проекта (общие вопросы)</label>
                                        <textarea id="quest16" name="quest16" class="quest__textarea"
                                                  placeholder="Мой ответ">
                              </textarea>
                                    </div>
                                    <div class="quest__input">
                                        <label for="story">Инициатор запроса (технические вопросы)</label>
                                        <textarea id="quest17" name="quest17" class="quest__textarea"
                                                  placeholder="Мой ответ">
                              </textarea>
                                    </div>
                                    <div class="quest__input">
                                        <label for="story">Потенциальные исполнители</label>
                                        <textarea id="quest18" name="quest18" class="quest__textarea"
                                                  placeholder="Мой ответ">
                              </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="quest__slider_buttons_wrapper">
                                <input class="quest__button quest__submit_button" type="submit"></input>
                                <div class="quest__prev quest__button">Назад</div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>

    </div>

    <div class="adress">
        {{--                            <div id="map" style="width: 600px; height: 400px"></div>--}}
        <div id="header">
            <input type="text" id="suggest" class="input" placeholder="Введите адрес">
            <button type="submit" id="button">Проверить</button>
        </div>
        <p id="notice">Адрес не найден</p>
        <div id="map"></div>
        <div id="footer">
            <div id="messageHeader"></div>
            <div id="message"></div>
        </div>
    </div>
    @push('scripts')
        <script src="https://api-maps.yandex.ru/2.1/?apikey=13c7547f-2a6d-45df-b5d4-e5d0ab448ddc&lang=ru_RU"
                type="text/javascript"></script>
        <script type="text/javascript">
            // Функция ymaps.ready() будет вызвана, когда
            // загрузятся все компоненты API, а также когда будет готово DOM-дерево.
            ymaps.ready(init);

            function init() {
                // Создание карты.
                var myMap = new ymaps.Map("map", {
                    // Координаты центра карты.
                    // Порядок по умолчанию: «широта, долгота».
                    // Чтобы не определять координаты центра карты вручную,
                    // воспользуйтесь инструментом Определение координат.
                    center: [55.76, 37.64],
                    // Уровень масштабирования. Допустимые значения:
                    // от 0 (весь мир) до 19.
                    zoom: 7
                });
            }
        </script>
        <script>
            ymaps.ready(init);

            function init() {
                // Подключаем поисковые подсказки к полю ввода.
                var suggestView = new ymaps.SuggestView('suggest'),
                    map,
                    placemark;

                // При клике по кнопке запускаем верификацию введёных данных.
                $('#button').bind('click', function (e) {
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

                function createMap(state, caption) {
                    // Если карта еще не была создана, то создадим ее и добавим метку с адресом.
                    if (!map) {
                        map = new ymaps.Map('map', state);
                        placemark = new ymaps.Placemark(
                            map.getCenter(), {
                                iconCaption: caption,
                                balloonContent: caption
                            }, {
                                preset: 'islands#redDotIconWithCaption'
                            });
                        map.geoObjects.add(placemark);
                        // Если карта есть, то выставляем новый центр карты и меняем данные и позицию метки в соответствии с найденным адресом.
                    } else {
                        map.setCenter(state.center, state.zoom);
                        placemark.geometry.setCoordinates(state.center);
                        placemark.properties.set({iconCaption: caption, balloonContent: caption});
                    }
                }

                function showMessage(message) {
                    $('#messageHeader').text('Данные получены:');
                    $('#message').text(message);
                }
            }
        </script>
        <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
        <script src="{{ asset('js/checkout.js') }}"></script>
    @endpush
@endsection
