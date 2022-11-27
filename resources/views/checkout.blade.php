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
                    8 вопросов
                </div>
            </div>
                        <div class="address">
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
        </div>

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
                                        Доставка
                                    </div>
                                </div>
                                <div class="quest__slide_forms_wrapper">
                                    <div class="quest__input">
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
                                    <div class="quest__input">
                                        <label for="street">Город, улица, дом</label>
                                        <input type="text" id="street" name="address"  class="quest__textarea"
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
                        {{--                        <!-- ________SLIDE -->--}}
                        {{--                        <div class="swiper-slide">--}}
                        {{--                            <div class="quest__slide">--}}
                        {{--                                <div class="quest__slide_title_wrapper">--}}
                        {{--                                    <div class="quest__slide_title">--}}
                        {{--                                        Известные аналоги--}}
                        {{--                                    </div>--}}
                        {{--                                    <div class="redline"></div>--}}
                        {{--                                </div>--}}
                        {{--                                <div class="quest__slide_forms_wrapper">--}}
                        {{--                                    <div class="quest__input">--}}
                        {{--                                        <label for="story">Российские</label>--}}
                        {{--                                        <textarea id="quest7" name="quest7" class="quest__textarea"--}}
                        {{--                                                  placeholder="Мой ответ">--}}
                        {{--          </textarea>--}}
                        {{--                                    </div>--}}
                        {{--                                    <div class="quest__input">--}}
                        {{--                                        <label for="story">Зарубежные</label>--}}
                        {{--                                        <textarea id="quest8" name="quest8" class="quest__textarea"--}}
                        {{--                                                  placeholder="Мой ответ">--}}
                        {{--          </textarea>--}}
                        {{--                                    </div>--}}
                        {{--                                    <div class="quest__input">--}}
                        {{--                                        <label for="story">Сравнение требуемого решения с аналогами</label>--}}
                        {{--                                        <textarea id="quest9" name="quest9" class="quest__textarea"--}}
                        {{--                                                  placeholder="Мой ответ">--}}
                        {{--          </textarea>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                            <div class="quest__slider_buttons_wrapper">--}}
                        {{--                                <div class="quest__next quest__button">Далее</div>--}}
                        {{--                                <div class="quest__prev quest__button">Назад</div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}

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
                                <input class="quest__button quest__submit_button" type="submit"></input>
                                <div class="quest__prev quest__button">Назад</div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>

    </div>


    @push('scripts')
        <script src="https://api-maps.yandex.ru/2.1/?apikey=13c7547f-2a6d-45df-b5d4-e5d0ab448ddc&lang=ru_RU"
                type="text/javascript"></script>
        <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
        <script src="{{ asset('js/checkout.js') }}"></script>
    @endpush
@endsection
