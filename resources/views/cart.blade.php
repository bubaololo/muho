@extends('layouts.app')

@section('content')
    @push('styles')
        <link rel="stylesheet" href={{ asset('css/swiper-bundle.min.css') }}/>
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
                                <div class="card-body p-4">

                                    <div class="row">

                                        <div class="col-lg-7">
                                            <h5 class="mb-3"><a href="#!" class="text-body"><i
                                                            class="fas fa-long-arrow-alt-left me-2"></i>Continue
                                                    shopping</a></h5>
                                            <hr>

                                            <div class="d-flex justify-content-between align-items-center mb-4">
                                                <div>
                                                  Всего товаров: @livewire('cart-counter')
                                                </div>

                                            </div>

                                            @foreach ($cartItems as $item)
                                                <div class="card mb-3">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-between align-items-center">
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
                                                                    <p class="small mb-0">{{ $item->attributes->weight }} гр.</p>
                                                                </div>
                                                            </div>
                                                            <div style="width: 80px;">
                                                                <h5 class="mb-0 ">{{ $item->price }}
                                                                    руб.</h5>
                                                            </div>
                                                            @livewire('quantity-handler', ['CartItem' => $item])

                                                            <div class="d-flex flex-row align-items-center">

                                                                <form class="del__form"
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
                                                            <div class="container">

                                                                <div class="quest__slider_bar_wrapper">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="container">
                                                            <div class="quest__slider_wrapper mySwiper">
                                                                <form enctype="multipart/form-data" method="post" id="quest_form"
                                                                        class="quest__slides swiper-wrapper" action="/checkout">
                                                                @csrf
                                                                <!-- ________SLIDE -->
                                                                    <div class="swiper-slide">
                                                                        <div class="quest__slide">
                                                                            <div class="quest__slide_title_wrapper">
                                                                                <div class="quest__slide_title">
                                                                                    Адрес
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
                                                                    <div class="swiper-slide">
                                                                        <div class="quest__slide">
                                                                            <div class="quest__slide_title_wrapper">
                                                                                <div class="quest__slide_title">
                                                                                    Адрес
                                                                                </div>
                                                                            </div>
                                                                            <div class="quest__slide_forms_wrapper">
                                                                                <div class="quest__input">
                                                                                    <label for="name">Куда отправить ваши грибы</label>
                                                                                    <div class="address">
                                                                                        <div id="header">
                                                                                            <input type="text" id="suggest" class="input" placeholder="Введите адрес">
                                                                                            <button class="btn btn-gray" id="address-check">Проверить</button>
                                                                                        </div>
                                                                                        <p id="notice">Адрес не найден</p>
                                                                                        <div id="map"></div>
                                                                                        <div id="footer">
                                                                                            <div id="messageHeader"></div>
                                                                                            <div id="message"></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="quest__input">
                                                                                    <label for="street">Город, улица, дом</label>
                                                                                    <input type="text" id="street" name="address" class="quest__textarea"
                                                                                            placeholder="г.Москва, ул. Пушкина, д.Колотушкина">
                                                                                </div>

                                                                                <div class="quest__input">
                                                                                    <label for="apartment">Квартира</label>
                                                                                    <input type="text" id="apartment" name="apartment"
                                                                                            class="quest__textarea"
                                                                                            placeholder="56">
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                        <div class="quest__slider_buttons_wrapper">
                                                                            <div class="quest__next quest__button">Вперёд</div>
                                                                            <div class="quest__prev quest__button">Назад</div>
                                                                        </div>
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
                                                        </div>
                                                    </section>
                                            </section>

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
        <script src="{{ asset('js/swiper-bundle.min.js') }}"></script>
        <script src="https://api-maps.yandex.ru/2.1/?apikey=13c7547f-2a6d-45df-b5d4-e5d0ab448ddc&lang=ru_RU"
                type="text/javascript"></script>
        <script src="{{ asset('js/checkout.js') }}"></script>
    @endpush
@endsection

