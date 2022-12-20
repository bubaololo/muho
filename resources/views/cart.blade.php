@extends('layouts.app')

@section('content')
    <main class="my-8">
        <div class="container">
            <div class="">
                <div class="">
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
                        <table class="" cellspacing="0">
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
                            <div>
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

                        {{--                        <a href="{{ route('checkout') }}" class="px-4 py-1.5 text-white text-sm bg-blue-800 rounded">оформить заказ</a>--}}
                    </div>
                </div>
            </div>

            <div class="row no-gutters">
                <div class="col-md-8">
                    <div class="product-details mr-2">
                        <div class="d-flex flex-row align-items-center"><i class="fa fa-long-arrow-left"></i><span
                                class="ml-2">Continue Shopping</span></div>
                        <hr>
                        <h6 class="mb-0">Shopping cart</h6>
                        <div class="d-flex justify-content-between"><span>You have 4 items in your cart</span>
                            <div class="d-flex flex-row align-items-center"><span class="text-black-50">Sort by:</span>
                                <div class="price ml-2"><span class="mr-1">price</span><i class="fa fa-angle-down"></i>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-3 p-2 items rounded">
                            <div class="d-flex flex-row"><img class="rounded" src="https://i.imgur.com/QRwjbm5.jpg"
                                                              width="40">
                                <div class="ml-2"><span class="font-weight-bold d-block">Iphone 11 pro</span><span
                                        class="spec">256GB, Navy Blue</span></div>
                            </div>
                            <div class="d-flex flex-row align-items-center"><span class="d-block">2</span><span
                                    class="d-block ml-5 font-weight-bold">$900</span><i
                                    class="fa fa-trash-o ml-3 text-black-50"></i></div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-3 p-2 items rounded">
                            <div class="d-flex flex-row"><img class="rounded" src="https://i.imgur.com/GQnIUfs.jpg"
                                                              width="40">
                                <div class="ml-2"><span class="font-weight-bold d-block">One pro 7T</span><span
                                        class="spec">256GB, Navy Blue</span></div>
                            </div>
                            <div class="d-flex flex-row align-items-center"><span class="d-block">2</span><span
                                    class="d-block ml-5 font-weight-bold">$900</span><i
                                    class="fa fa-trash-o ml-3 text-black-50"></i></div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-3 p-2 items rounded">
                            <div class="d-flex flex-row"><img class="rounded" src="https://i.imgur.com/o2fKskJ.jpg"
                                                              width="40">
                                <div class="ml-2"><span class="font-weight-bold d-block">Google pixel 4 XL</span><span
                                        class="spec">256GB, Axe black</span></div>
                            </div>
                            <div class="d-flex flex-row align-items-center"><span class="d-block">1</span><span
                                    class="d-block ml-5 font-weight-bold">$800</span><i
                                    class="fa fa-trash-o ml-3 text-black-50"></i></div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-3 p-2 items rounded">
                            <div class="d-flex flex-row"><img class="rounded" src="https://i.imgur.com/Tja5H1c.jpg"
                                                              width="40">
                                <div class="ml-2"><span
                                        class="font-weight-bold d-block">Samsung galaxy Note 10&nbsp;</span><span
                                        class="spec">256GB, Navy Blue</span></div>
                            </div>
                            <div class="d-flex flex-row align-items-center"><span class="d-block">1</span><span
                                    class="d-block ml-5 font-weight-bold">$999</span><i
                                    class="fa fa-trash-o ml-3 text-black-50"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="payment-info">
                        <div class="d-flex justify-content-between align-items-center"><span>Card details</span><img
                                class="rounded" src="https://i.imgur.com/WU501C8.jpg" width="30"></div>
                        <span class="type d-block mt-3 mb-1">Card type</span><label class="radio"> <input type="radio"
                                                                                                          name="card"
                                                                                                          value="payment"
                                                                                                          checked>
                            <span><img width="30" src="https://img.icons8.com/color/48/000000/mastercard.png"/></span>
                        </label>

                        <label class="radio"> <input type="radio" name="card" value="payment"> <span><img width="30"
                                                                                                          src="https://img.icons8.com/officel/48/000000/visa.png"/></span>
                        </label>

                        <label class="radio"> <input type="radio" name="card" value="payment"> <span><img width="30"
                                                                                                          src="https://img.icons8.com/ultraviolet/48/000000/amex.png"/></span>
                        </label>


                        <label class="radio"> <input type="radio" name="card" value="payment"> <span><img width="30"
                                                                                                          src="https://img.icons8.com/officel/48/000000/paypal.png"/></span>
                        </label>
                        <div><label class="credit-card-label">Name on card</label><input type="text"
                                                                                         class="form-control credit-inputs"
                                                                                         placeholder="Name"></div>
                        <div><label class="credit-card-label">Card number</label><input type="text"
                                                                                        class="form-control credit-inputs"
                                                                                        placeholder="0000 0000 0000 0000">
                        </div>
                        <div class="row">
                            <div class="col-md-6"><label class="credit-card-label">Date</label><input type="text"
                                                                                                      class="form-control credit-inputs"
                                                                                                      placeholder="12/24">
                            </div>
                            <div class="col-md-6"><label class="credit-card-label">CVV</label><input type="text"
                                                                                                     class="form-control credit-inputs"
                                                                                                     placeholder="342">
                            </div>
                        </div>
                        <hr class="line">
                        <div class="d-flex justify-content-between information">
                            <span>Subtotal</span><span>$3000.00</span></div>
                        <div class="d-flex justify-content-between information"><span>Shipping</span><span>$20.00</span>
                        </div>
                        <div class="d-flex justify-content-between information"><span>Total(Incl. taxes)</span><span>$3020.00</span>
                        </div>
                        <button class="btn btn-primary btn-block d-flex justify-content-between mt-3" type="button">
                            <span>$3020.00</span><span>Checkout<i class="fa fa-long-arrow-right ml-1"></i></span>
                        </button>
                    </div>
                </div>
            </div>
            {{--                                                        @foreach ($cartItems as $item)--}}
            {{--                                                            <tr>--}}
            {{--                                                                <td class="hidden pb-4 md:table-cell">--}}
            {{--                                                                    <a href="#">--}}
            {{--                                                                        <img src="{{ asset($item->attributes->image) }}" class="w-20 rounded"--}}
            {{--                                                                             alt="Thumbnail">--}}
            {{--                                                                    </a>--}}
            {{--                                                                </td>--}}
            {{--                                                                <td>--}}
            {{--                                                                    <a href="#">--}}
            {{--                                                                        <p class="mb-2 md:ml-4 text-purple-600 font-bold">{{ $item->name }}</p>--}}

            {{--                                                                    </a>--}}
            {{--                                                                </td>--}}
            {{--                                                                <td class="justify-center mt-6 md:justify-end md:flex">--}}
            {{--                                                                    <div class="h-10 w-28">--}}
            {{--                                                                        <div class="relative flex flex-row w-full h-8">--}}

            {{--                                                                            <form action="{{ route('cart.update') }}" method="POST">--}}
            {{--                                                                                @csrf--}}
            {{--                                                                                <input type="hidden" name="id" value="{{ $item->id}}">--}}
            {{--                                                                                <input type="text" name="quantity" value="{{ $item->quantity }}"--}}
            {{--                                                                                       class="w-16 text-center h-6 text-gray-800 outline-none rounded border border-blue-600"/>--}}
            {{--                                                                                <button--}}
            {{--                                                                                    class="px-4 mt-1 py-1.5 text-sm rounded rounded shadow text-violet-100 bg-violet-500">--}}
            {{--                                                                                    Обновить--}}
            {{--                                                                                </button>--}}
            {{--                                                                            </form>--}}
            {{--                                                                        </div>--}}
            {{--                                                                    </div>--}}
            {{--                                                                </td>--}}
            {{--                                                                <td class="hidden text-right md:table-cell">--}}
            {{--                                            <span class="text-sm font-medium lg:text-base">--}}
            {{--                                                {{ $item->price }} р.--}}
            {{--                                            </span>--}}
            {{--                                                                </td>--}}
            {{--                                                                <td class="hidden text-right md:table-cell">--}}
            {{--                                            <span class="text-sm font-medium lg:text-base">--}}
            {{--                                                {{ $item->attributes->weight }} г.--}}
            {{--                                            </span>--}}
            {{--                                                                </td>--}}
            {{--                                                                <td class="hidden text-right md:table-cell">--}}
            {{--                                                                    <form action="{{ route('cart.remove') }}" method="POST">--}}
            {{--                                                                        @csrf--}}
            {{--                                                                        <input type="hidden" value="{{ $item->id }}" name="id">--}}
            {{--                                                                        <button class="px-4 py-2 text-white bg-red-600 shadow rounded-full">x--}}
            {{--                                                                        </button>--}}
            {{--                                                                    </form>--}}

            {{--                                                                </td>--}}
            {{--                                                            </tr>--}}
            {{--                                                        @endforeach--}}
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
                                                    <p class="mb-1">Корзина</p>
                                                    <p class="mb-0">You have 4 items in your cart</p>
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
                                                                        class="img-fluid rounded-3" alt="Shopping item"
                                                                        style="width: 65px;">
                                                                </div>
                                                                <div class="ms-3">
                                                                    <h5>{{ $item->name }}</h5>
                                                                    <p class="small mb-0">{{ $item->attributes->weight }}</p>
                                                                </div>
                                                            </div>

                                                            @livewire('quantity-handler', ['quantity' => $item->quantity])

                                                            <div class="d-flex flex-row align-items-center">
{{--                                                                <div >--}}
{{--                                                                    <h5 class="fw-normal mb-0 mx-3">{{ $item->quantity }} шт.</h5>--}}
{{--                                                                </div>--}}

                                                                <div style="width: 80px;">
                                                                    <h5 class="mb-0 ">{{ $item->price }} руб.</h5>
                                                                </div>
                                                                <form class="del__form" action="{{ route('cart.remove') }}" method="POST">
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
                                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                                        <h5 class="mb-0">Card details</h5>
                                                        <img
                                                            src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp"
                                                            class="img-fluid rounded-3" style="width: 45px;"
                                                            alt="Avatar">
                                                    </div>

                                                    <p class="small mb-2">Card type</p>
                                                    <a href="#!" type="submit" class="text-white"><i
                                                            class="fab fa-cc-mastercard fa-2x me-2"></i></a>
                                                    <a href="#!" type="submit" class="text-white"><i
                                                            class="fab fa-cc-visa fa-2x me-2"></i></a>
                                                    <a href="#!" type="submit" class="text-white"><i
                                                            class="fab fa-cc-amex fa-2x me-2"></i></a>
                                                    <a href="#!" type="submit" class="text-white"><i
                                                            class="fab fa-cc-paypal fa-2x"></i></a>

                                                    <form class="mt-4">
                                                        <div class="form-outline form-white mb-4">
                                                            <input type="text" id="typeName"
                                                                   class="form-control form-control-lg" siez="17"
                                                                   placeholder="Cardholder's Name"/>
                                                            <label class="form-label" for="typeName">Cardholder's
                                                                Name</label>
                                                        </div>

                                                        <div class="form-outline form-white mb-4">
                                                            <input type="text" id="typeText"
                                                                   class="form-control form-control-lg" siez="17"
                                                                   placeholder="1234 5678 9012 3457" minlength="19"
                                                                   maxlength="19"/>
                                                            <label class="form-label" for="typeText">Card Number</label>
                                                        </div>

                                                        <div class="row mb-4">
                                                            <div class="col-md-6">
                                                                <div class="form-outline form-white">
                                                                    <input type="text" id="typeExp"
                                                                           class="form-control form-control-lg"
                                                                           placeholder="MM/YYYY" size="7" id="exp"
                                                                           minlength="7" maxlength="7"/>
                                                                    <label class="form-label"
                                                                           for="typeExp">Expiration</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-outline form-white">
                                                                    <input type="password" id="typeText"
                                                                           class="form-control form-control-lg"
                                                                           placeholder="&#9679;&#9679;&#9679;" size="1"
                                                                           minlength="3" maxlength="3"/>
                                                                    <label class="form-label" for="typeText">Cvv</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </form>

                                                    <hr class="my-4">

                                                    <div class="d-flex justify-content-between">
                                                        <p class="mb-2">Subtotal</p>
                                                        <p class="mb-2">$4798.00</p>
                                                    </div>

                                                    <div class="d-flex justify-content-between">
                                                        <p class="mb-2">Shipping</p>
                                                        <p class="mb-2">$20.00</p>
                                                    </div>

                                                    <div class="d-flex justify-content-between mb-4">
                                                        <p class="mb-2">Total(Incl. taxes)</p>
                                                        <p class="mb-2">$4818.00</p>
                                                    </div>

                                                    <button type="button" class="btn btn-info btn-block btn-lg">
                                                        <div class="d-flex justify-content-between">
                                                            <span>$4818.00</span>
                                                            <span>Checkout <i
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

