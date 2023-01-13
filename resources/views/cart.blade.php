@extends('layouts.app')

@section('content')
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/swiper-bundle.min.css') }}"/>
        <link href="{{ asset('css/checkout.css') }}" rel="stylesheet">
        <link href="{{ asset('css/checkout-media.css') }}" rel="stylesheet">
    @endpush
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

            <section class="h-100 h-custom">
                <div class="container py-5 h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col">
                            <div class="card">


                                    <div class="row">

                                        <div class="col-lg-7">
                                            <h5 class="mb-3"><a href="#!" class="text-body"><i
                                                            class="fas fa-long-arrow-alt-left me-2"></i>Ваши товары</a></h5>
                                            <hr>

                                            <div class="d-flex justify-content-between align-items-center mb-4">
                                                <div>
                                                    @livewire('cart-counter')
                                                </div>

                                            </div>

                                            @foreach ($cartItems as $item)
                                                <div class="card mb-3">
                                                    <div class="card-body">
                                                        <div class="cart-item__inner">

                                                            <a href="/product/{{ $item->id }}" class="cart-item__img">
                                                                <img src="{{ asset($item->attributes->image) }}"
                                                                        class="rounded-3"
                                                                        alt="Мухомор">
                                                            </a>
                                                            <a href="/product/{{ $item->id }}" class="cart-item__info">
                                                                <h5>{{ $item->name }}</h5>
                                                                <p class="mb-0">{{ $item->attributes->weight }} гр.</p>
                                                            </a>


                                                                <h5 class="mb-0 cart-item__price">{{ $item->price }}
                                                                    руб.</h5>

                                                            @livewire('quantity-handler', ['CartItem' => $item])

                                                            <form class="cart-item__del"
                                                                    action="{{ route('cart.remove') }}"
                                                                    method="POST">
                                                                @csrf
                                                                <input type="hidden" value="{{ $item->id }}"
                                                                        name="id">
                                                                <button class="del-button">

                                                                </button>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <form
                                                    action="{{ route('cart.clear') }}"
                                                    method="POST">
                                                @csrf
                                                <input type=submit class="btn btn-outline-secondary btn-sm" value="очистить корзину">
                                            </form>


                                        </div>
                                        <div class="col-lg-5">
                                            <section class="checkout__slider">
                                                <div class="quest">
                                                    {{--                                                    <div class="container">--}}
                                                    {{--                                                        <div class="quest__header">--}}
                                                    {{--                                                            <div class="quest__header_title_wrapper">--}}
                                                    {{--                                                                <div class="quest__header_title">--}}
                                                    {{--                                                                    <div class="quest__header_title-text">--}}
                                                    {{--                                                                        Вопросник по потребностям--}}
                                                    {{--                                                                    </div>--}}
                                                    {{--                                                                    <div class="quest__header_title-tag">--}}
                                                    {{--                                                                        СОКРАЩЁННЫЙ--}}
                                                    {{--                                                                    </div>--}}
                                                    {{--                                                                    <div class="quest__header_subtitle">--}}
                                                    {{--                                                                        Сокращённый (для первичного знакомства с потребностью)--}}
                                                    {{--                                                                    </div>--}}
                                                    {{--                                                                </div>--}}
                                                    {{--                                                            </div>--}}
                                                    {{--                                                            <div class="quest__header-question">--}}
                                                    {{--                                                                8 вопросов--}}
                                                    {{--                                                            </div>--}}
                                                    {{--                                                        </div>--}}

                                                    {{--                                                    </div>--}}

                                                    <section class="quest__slider">
                                                        <div class="success">
                                                            <img src="img/quest_success.svg" alt="icon" class="quest__success">
                                                            <div class="sucess_text">
                                                                Ваш заказ оформлен!
                                                            </div>
                                                        </div>
                                                        @if ($errors->any())
                                                            <div class="alert alert-danger">
                                                                <ul>
                                                                    @foreach ($errors->all() as $error)
                                                                        <li>{{ $error }}</li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        @endif
                                                        <div class="quest__slider_bar">


                                                                <div class="quest__slider_bar_wrapper">
                                                                </div>

                                                        </div>

                                                            <div class="quest__slider_wrapper mySwiper">
                                                                <form enctype="multipart/form-data" method="post" id="quest_form"
                                                                        class="quest__slides swiper-wrapper" action="/checkout">
                                                                @csrf
                                                                <!-- ________SLIDE -->
                                                                    <div class="swiper-slide">
                                                                        <div class="quest__slide">
                                                                            <div class="quest__slide_title_wrapper">
                                                                                <div class="quest__slide_title">
                                                                                    Оформить заказ
                                                                                </div>
                                                                            </div>

                                                                            @livewire('delivery-selector')

                                                                            <hr class="my-4">

                                                                            @livewire('cart-total')

                                                                        </div>
                                                                        <div class="quest__slider_buttons_wrapper">
                                                                            <div class="quest__next quest__button">Вперёд</div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- ________SLIDE -->
                                                                    <div class="swiper-slide address-slide">
                                                                        <div class="quest__slide">
                                                                            <div class="quest__slide_title_wrapper">
                                                                                <div class="quest__slide_title">
                                                                                    Адрес
                                                                                    @isset($credentials) <span class="badge badge-info cart-badge">данные взяты из <a href="/home">профиля</a> </span>@endisset
                                                                                </div>

                                                                            </div>
                                                                            <div class="quest__slide_forms_wrapper">
                                                                                <div class="quest__input">
                                                                                    <label for="name">Куда отправить ваши грибы</label>
                                                                                    <p>Город, улица, дом</p>
                                                                                    <div class="address">
                                                                                        <div id="header">
                                                                                            <label for="suggest"> Начните вводить ваш адрес в поле</label>
                                                                                            <div class="address-input">
                                                                                            <input type="text" id="suggest" name="address" class="w-100" value="@isset($credentials['address']) {{ $credentials['address'] }} @endisset" placeholder="Введите адрес">
                                                                                                <div class="btn btn-gray" id="button">
                                                                                                    <img src="{{ asset('/images/icons/refresh.svg')  }}" alt="" class="refresh-icon"></div>
                                                                                            </div>
                                                                                        </div>
                                                                                        @if( empty($credentials['address']) )



                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                                <p id="notice"></p>
                                                                                <div id="footer">
                                                                                    <div id="messageHeader"></div>
                                                                                    <div id="message"></div>
                                                                                </div>
                                                                                <div class="quest__input">
                                                                                    <label for="apartment">Квартира</label>
                                                                                    <input type="text" id="apartment" name="apartment"
                                                                                            class="quest__textarea" value="@isset($credentials['apartment']) {{ $credentials['apartment'] }} @endisset"
                                                                                            placeholder="56">
                                                                                </div>

                                                                                <div class="quest__input">
                                                                                    <label for="street">Комментарий</label>
                                                                                    <input type="text" id="comment" name="comment" class="quest__textarea"
                                                                                            value="@isset($credentials['comment']) {{ $credentials['comment'] }} @endisset"   placeholder="любые уточнения">
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                        <div class="quest__slider_buttons_wrapper">
                                                                            <div class="quest__next quest__button">Вперёд</div>
                                                                            <div class="quest__prev quest__button">Назад</div>
                                                                        </div>
                                                                        <div id="map"></div>
                                                                        <div class="map-mask"></div>
                                                                    </div>
                                                                    <!-- ________SLIDE -->
                                                                    <div class="swiper-slide">
                                                                        <div class="quest__slide">
                                                                            <div class="quest__slide_title_wrapper">
                                                                                <div class="quest__slide_title">
                                                                                    Персональные данные
                                                                                </div>
                                                                                <div class="quest__slide_subtitle">
                                                                                    Данные необходимые для доставки
                                                                                </div>
                                                                                <div class="redline"></div>
                                                                            </div>
                                                                            <div class="quest__slide_forms_wrapper">
                                                                                <div class="quest__input">
                                                                                    <label for="name">Имя</label>
                                                                                    <input type="text" id="name" name="name" class="quest__textarea"
                                                                                            value="@isset($credentials['name']) {{ $credentials['name'] }} @endisset"    placeholder="Иван">
                                                                                </div>
                                                                                <div class="quest__input">
                                                                                    <label for="surname">Фамилия</label>
                                                                                    <input type="text" id="surname" name="surname" class="quest__textarea"
                                                                                            value="@isset($credentials['surname']) {{ $credentials['surname'] }} @endisset"    placeholder="Иванов">

                                                                                </div>
                                                                                <div class="quest__input">
                                                                                    <label for="middle_name">Отчество</label>
                                                                                    <input type="text" id="middle_name" name="middle_name"
                                                                                            class="quest__textarea"
                                                                                            value="@isset($credentials['middle_name']) {{ $credentials['middle_name'] }} @endisset"   placeholder="Иванович">
                                                                                </div>
                                                                                <div class="quest__input">
                                                                                    <label for="middle_name">Телефон</label>
                                                                                    <input type="tel" id="tel" name="telephone"
                                                                                            class="quest__textarea"
                                                                                            value="@isset($credentials['tel']) {{ $credentials['tel'] }} @endisset"   placeholder="89000000000">
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
                                                                                    Оплата
                                                                                </div>
                                                                                <div class="redline"></div>
                                                                            </div>
                                                                            <div class="quest__slide_forms_wrapper">

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

                                                                            </div>
                                                                        </div>
                                                                        <div class="quest__slider_buttons_wrapper">
                                                                            <input class="quest__button quest__submit_button" type="submit">
                                                                            <div class="quest__prev quest__button">Назад</div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>

                                                    </section>
                                            </section>
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
        <script src="{{ asset('js/swiper-bundle.min.js') }}"></script>
        @if( empty($credentials['address']) )
        <script src="https://api-maps.yandex.ru/2.1/?apikey=13c7547f-2a6d-45df-b5d4-e5d0ab448ddc&lang=ru_RU" type="text/javascript"></script>
        <script>
          ymaps.ready(init);

          function init() {
            // Подключаем поисковые подсказки к полю ввода.
            var suggestView = new ymaps.SuggestView('suggest'),
                map,
                placemark;

            // При клике по кнопке запускаем верификацию введёных данных.
            $('#button').bind('click', function(e) {
              geocode();
            });

            document.getElementById('suggest').addEventListener('blur', () => {
              geocode();
            })

            let refreshBtn = document.getElementById('button');

            function disableRefreshBtn() {
              refreshBtn.style.display = 'none';
            }
            function enableRefreshBtn() {
              refreshBtn.style.display = 'block';
            }

            function geocode() {
              // Забираем запрос из поля ввода.
              var request = $('#suggest').val();
              // Геокодируем введённые данные.
              ymaps.geocode(request).then(function(res) {
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
              }, function(e) {
                console.log(e)
              })

            }

            function showResult(obj) {
              // Удаляем сообщение об ошибке, если найденный адрес совпадает с поисковым запросом.
              $('#suggest').removeClass('input_error');
              $('#notice').css('display', 'none');
              disableRefreshBtn();

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
              showFullMessage(address);
            }

            function showError(message) {
              $('#messageHeader').text('');
              $('#notice').text(message);
              $('#suggest').addClass('input_error');
              $('#notice').css('display', 'block');
              // Удаляем карту.
              if (map) {
                map.destroy();
                map = null;
              }
              enableRefreshBtn();
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
              $('#message').text(message);
            }
            function showFullMessage(message) {
              $('#messageHeader').text('Данные получены:');
              $('#message').text(message);
            }
          }
        </script>
          @endif
        <script src="{{ asset('js/checkout.js') }}"></script>
        @if( empty($credentials) )
        <script>
          let inputs = document.querySelectorAll('input[type=text]');
          inputs.forEach((input) => {

            if (input.name) {
              if(localStorage.getItem(input.name)) {
                input.value = localStorage.getItem(input.name);
              }
            }

            input.addEventListener('blur', (input) => {

              localStorage.setItem(input.target.name, input.target.value);
            })
          })
        </script>
        @endif
    @endpush
@endsection

