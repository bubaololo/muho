@extends('layouts.app')

@section('content')
    <main class="my-8">
        <div class="container px-6 mx-auto">
            <div class="flex justify-center my-6">
                <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
                    @if ($message = Session::get('success'))
                        <div class="p-4 mb-3 bg-green-400 rounded">
                            <p class="text-green-800">{{ $message }}</p>
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <h3 class="text-3xl font-bold">Корзина</h3>
                    <div class="flex-1">
                        <table class="w-full text-sm lg:text-base" cellspacing="0">
                            <thead>
                            <tr class="h-12 uppercase">
                                <th class="hidden md:table-cell"></th>
                                <th class="text-left">Название</th>
                                <th class="pl-5 text-left lg:text-right lg:pl-0">
                                    <span class="lg:hidden" title="Quantity">Кол-во</span>
                                    <span class="hidden lg:inline">Количество</span>
                                </th>
                                <th class="hidden text-right md:table-cell"> цена</th>
                                <th class="hidden text-right md:table-cell"> вес</th>
                                <th class="hidden text-right md:table-cell"> Удалить</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($cartItems as $item)
                                <tr>
                                    <td class="hidden pb-4 md:table-cell">
                                        <a href="#">
                                            <img src="{{ asset($item->attributes->image) }}" class="w-20 rounded"
                                                 alt="Thumbnail">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#">
                                            <p class="mb-2 md:ml-4 text-purple-600 font-bold">{{ $item->name }}</p>

                                        </a>
                                    </td>
                                    <td class="justify-center mt-6 md:justify-end md:flex">
                                        <div class="h-10 w-28">
                                            <div class="relative flex flex-row w-full h-8">

                                                <form action="{{ route('cart.update') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $item->id}}">
                                                    <input type="text" name="quantity" value="{{ $item->quantity }}"
                                                           class="w-16 text-center h-6 text-gray-800 outline-none rounded border border-blue-600"/>
                                                    <button
                                                        class="px-4 mt-1 py-1.5 text-sm rounded rounded shadow text-violet-100 bg-violet-500">
                                                        Обновить
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="hidden text-right md:table-cell">
                                <span class="text-sm font-medium lg:text-base">
                                    {{ $item->price }} р.
                                </span>
                                    </td>
                                    <td class="hidden text-right md:table-cell">
                                <span class="text-sm font-medium lg:text-base">
                                    {{ $item->attributes->weight }} г.
                                </span>
                                    </td>
                                    <td class="hidden text-right md:table-cell">
                                        <form action="{{ route('cart.remove') }}" method="POST">
                                            @csrf
                                            <input type="hidden" value="{{ $item->id }}" name="id">
                                            <button class="px-4 py-2 text-white bg-red-600 shadow rounded-full">x
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        <div>
                            Total: {{ Cart::getTotal() }} руб.
                        </div>
                        <div>
                            <form action="{{ route('cart.clear') }}" method="POST">
                                @csrf
                                <button class="btn">Очистить
                                    корзину
                                </button>
                            </form>
                        </div>
                        <form enctype="multipart/form-data" method="post" id="quest_form"
                              class="quest__slides swiper-wrapper" action="/checkout">
                            @csrf
                            <div >
                                <label for="name">Способ доставки</label>
                                <fieldset>
                                    <legend>Выберите один из доступных способов доставки:</legend>

                                    <div>
                                        <input type="radio" id="sdek" name="delivery" value="sdek"
                                               checked>
                                        <label for="sdek">Сдэк</label>
                                    </div>

                                    <div>
                                        <input type="radio" id="avito" name="delivery" value="avito">
                                        <label for="avito">Авито</label>
                                    </div>

                                    <div>
                                        <input type="radio" id="post" name="delivery" value="post">
                                        <label for="post">Почта</label>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="address">
                                <div id="header">
                                    <input type="text" id="suggest" class="input" placeholder="Введите адрес">
                                    <button type="submit" class="btn btn-light" id="button">Проверить</button>
                                </div>
                                <p id="notice">Адрес не найден</p>
                                <div id="map"></div>
                                <div id="footer">
                                    <div id="messageHeader"></div>
                                    <div id="message"></div>
                                </div>
                            </div>


                            <div class="quest__input">
                                <label for="apartment">Квартира</label>
                                <input type="text" id="apartment" name="apartment"
                                       class="quest__textarea"
                                       placeholder="56">
                            </div>

                            <div class="quest__input">
                                <label for="name">Фамилия</label>
                                <input type="text" id="name" name="name" class="quest__textarea"
                                       placeholder="Иванов">
                            </div>
                            <div class="quest__input">
                                <label for="surname">Имя</label>
                                <input type="text" id="surname" name="surname" class="quest__textarea"
                                       placeholder="Иван">

                            </div>
                            <div class="quest__input">
                                <label for="middle_name">Отчество</label>
                                <input type="text" id="middle_name" name="middle_name"
                                       class="quest__textarea"
                                       placeholder="Иванович">
                            </div>
                            <div class="quest__input">
                                <label for="middle_name">Телефон</label>
                                <input type="tel" id="tel" name="telephone"
                                       class="quest__textarea"
                                       placeholder="89000000000">
                            </div>

                            <div class="quest__input">
                                <label for="name">Способ оплаты</label>
                                <fieldset>
                                    <legend>Выберите один из доступных способов оплаты:</legend>

                                    <div>
                                        <input type="radio" id="p2p" name="pay" value="p2p"
                                               checked>
                                        <label for="p2p">перевод с карты на карту</label>
                                    </div>

                                    <div>
                                        <input type="radio" id="qiwi" name="pay" value="qiwi">
                                        <label for="qiwi">qiwi</label>
                                    </div>

                                    <div>
                                        <input type="radio" id="visa" name="pay" value="visa">
                                        <label for="visa">Visa</label>
                                    </div>
                                </fieldset>
                            </div>
                            <button class="btn btn-primary" type="submit">оформить заказ</button>
                        </form>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">@</span>
                            <input type="text" class="form-control" placeholder="Username" aria-label="Username"
                                   aria-describedby="basic-addon1">
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Recipient's username"
                                   aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <span class="input-group-text" id="basic-addon2">@example.com</span>
                        </div>

                        <label for="basic-url" class="form-label">Your vanity URL</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon3">https://example.com/users/</span>
                            <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text">$</span>
                            <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                            <span class="input-group-text">.00</span>
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Username" aria-label="Username">
                            <span class="input-group-text">@</span>
                            <input type="text" class="form-control" placeholder="Server" aria-label="Server">
                        </div>

                        <div class="input-group">
                            <span class="input-group-text">With textarea</span>
                            <textarea class="form-control" aria-label="With textarea"></textarea>
                        </div>
                        {{--                        <a href="{{ route('checkout') }}" class="px-4 py-1.5 text-white text-sm bg-blue-800 rounded">оформить заказ</a>--}}

                    </div>

                </div>
            </div>

        </div>


    </main>
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

    @endpush
@endsection

