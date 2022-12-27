@extends('layouts.app')

@section('content')
    <main class="my-8">
        <div class="container">

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

            <section class="h-100 h-custom" style="background-color: #eee;">
                <div class="container py-5 h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col">
                            <div class="card">
                                <div class="card-body p-4">

                                    <div class="row">

                                        <div class="col-lg-7">
                                            <h5 class="mb-3"><a href="#!" class="text-body"><i
                                                        class="fas fa-long-arrow-alt-left me-2"></i>Continue
                                                    shopping</a></h5>
                                            <hr>

                                            <div class="d-flex justify-content-between align-items-center mb-4">
                                                <div>
                                                    @livewire('cart-counter')
                                                </div>

                                            </div>

                                            @foreach ($cartItems as $item)
                                                <div class="card mb-3">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-between">
                                                            <div class="d-flex flex-row align-items-center">
                                                                <div>
                                                                    <img
                                                                        src="{{ asset($item->attributes->image) }}"
                                                                        class="img-fluid rounded-3"
                                                                        alt="Shopping item"
                                                                        style="width: 65px;">
                                                                </div>
                                                                <div class="ms-3">
                                                                    <h5>{{ $item->name }}</h5>
                                                                    <p class="small mb-0">{{ $item->attributes->weight }}</p>
                                                                </div>
                                                            </div>

                                                            @livewire('quantity-handler', ['CartItem' => $item])

                                                            <div class="d-flex flex-row align-items-center">
                                                                <div>
                                                                    <h5 class="fw-normal mb-0 mx-3">{{ $item->quantity }}
                                                                        шт.</h5>
                                                                </div>

                                                                <div style="width: 80px;">
                                                                    <h5 class="mb-0 ">{{ $item->price }}
                                                                        руб.</h5>
                                                                </div>
                                                                <form class="del__form"
                                                                      action="{{ route('cart.remove') }}"
                                                                      method="POST">
                                                                    @csrf
                                                                    <input type="hidden" value="{{ $item->id }}"
                                                                           name="id">
                                                                    <button class="del-button">
                                                                        <i class="icon icon-close"></i>
                                                                    </button>
                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                        <div class="col-lg-5">

                                            <div class="card bg-primary text-white rounded-3">
                                                <div class="card-body">
                                                    <div
                                                        class="d-flex justify-content-between align-items-center mb-4">
                                                        <h5 class="mb-0">Детали заказа</h5>
                                                        <img
                                                            src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp"
                                                            class="img-fluid rounded-3" style="width: 45px;"
                                                            alt="Avatar">
                                                    </div>
                                                    @livewire('delivery-selector')
                                                    {{--                                                    <p class="small mb-2">Card type</p>--}}
                                                    {{--                                                    <a href="#!" type="submit" class="text-white"><i--}}
                                                    {{--                                                            class="fab fa-cc-mastercard fa-2x me-2"></i></a>--}}
                                                    {{--                                                    <a href="#!" type="submit" class="text-white"><i--}}
                                                    {{--                                                            class="fab fa-cc-visa fa-2x me-2"></i></a>--}}
                                                    {{--                                                    <a href="#!" type="submit" class="text-white"><i--}}
                                                    {{--                                                            class="fab fa-cc-amex fa-2x me-2"></i></a>--}}
                                                    {{--                                                    <a href="#!" type="submit" class="text-white"><i--}}
                                                    {{--                                                            class="fab fa-cc-paypal fa-2x"></i></a>--}}

                                                    {{--                                                    <form class="mt-4">--}}
                                                    {{--                                                        <div class="form-outline form-white mb-4">--}}
                                                    {{--                                                            <input type="text" id="typeName"--}}
                                                    {{--                                                                   class="form-control form-control-lg" siez="17"--}}
                                                    {{--                                                                   placeholder="Cardholder's Name"/>--}}
                                                    {{--                                                            <label class="form-label" for="typeName">Cardholder's--}}
                                                    {{--                                                                Name</label>--}}
                                                    {{--                                                        </div>--}}

                                                    {{--                                                        <div class="form-outline form-white mb-4">--}}
                                                    {{--                                                            <input type="text" id="typeText"--}}
                                                    {{--                                                                   class="form-control form-control-lg" siez="17"--}}
                                                    {{--                                                                   placeholder="1234 5678 9012 3457" minlength="19"--}}
                                                    {{--                                                                   maxlength="19"/>--}}
                                                    {{--                                                            <label class="form-label" for="typeText">Card Number</label>--}}
                                                    {{--                                                        </div>--}}

                                                    {{--                                                        <div class="row mb-4">--}}
                                                    {{--                                                            <div class="col-md-6">--}}
                                                    {{--                                                                <div class="form-outline form-white">--}}
                                                    {{--                                                                    <input type="text" id="typeExp"--}}
                                                    {{--                                                                           class="form-control form-control-lg"--}}
                                                    {{--                                                                           placeholder="MM/YYYY" size="7" id="exp"--}}
                                                    {{--                                                                           minlength="7" maxlength="7"/>--}}
                                                    {{--                                                                    <label class="form-label"--}}
                                                    {{--                                                                           for="typeExp">Expiration</label>--}}
                                                    {{--                                                                </div>--}}
                                                    {{--                                                            </div>--}}
                                                    {{--                                                            <div class="col-md-6">--}}
                                                    {{--                                                                <div class="form-outline form-white">--}}
                                                    {{--                                                                    <input type="password" id="typeText"--}}
                                                    {{--                                                                           class="form-control form-control-lg"--}}
                                                    {{--                                                                           placeholder="&#9679;&#9679;&#9679;" size="1"--}}
                                                    {{--                                                                           minlength="3" maxlength="3"/>--}}
                                                    {{--                                                                    <label class="form-label" for="typeText">Cvv</label>--}}
                                                    {{--                                                                </div>--}}
                                                    {{--                                                            </div>--}}
                                                    {{--                                                        </div>--}}

                                                    {{--                                                    </form>--}}

                                                    <hr class="my-4">

                                                    @livewire('cart-total')

                                                    <button type="button" class="btn btn-info btn-block btn-lg">
                                                        <div class="d-flex justify-content-between">
                                                            {{--                                                            <span>$4818.00</span>--}}
                                                            <span>Оформить заказ <i
                                                                    class="fas fa-long-arrow-alt-right ms-2"></i></span>
                                                        </div>
                                                    </button>

                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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

