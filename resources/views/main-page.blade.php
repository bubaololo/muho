@extends('layouts.app')
@section('title', 'Сибирские мухоморы')
@section('meta_description', 'Купить красный мухомор')
@section('content')


    <section id="billboard">

        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="hero">
                        <div class="hero-content" data-aos="fade-right">
                            <h2 class="hero-title">Сибирские мухоморы</h2>
                            <p class="hero__text">Грибы собраны в экологически чистой северной части Омской области, в конце сентября-начале октября 2022 года. Ценители знают что западная сибирь - одно из 2-х мест в мире, наряду с прибалтикой, где растут самые сильные по содержанию мускарина мухоморы.</p>
                        </div>
                        <picture class="hero-img">
                            <source type="image/avif" srcset="images/tmpimg/muhomor@1x.avif 1x, images/tmpimg/muhomor@2x.avif 2x">
                            <img class="picture" src="images/tmpimg/muhomor_fallback.png" srcset="images/tmpimg/muhomor_fallback.png 2x" alt="Мухомор" width="700" height="700">
                        </picture>
                    </div>
                </div>
            </div>
        </div>

    </section>

    {{--<section id="client-holder" data-aos="fade-up">--}}

    {{--</section>--}}

    <section class="packaging">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="section-header align-center" data-aos="fade-up">
                        <div class="title">
                            <span>товары в наличии</span>
                        </div>
                        <h2 class="section-title">Доступные фасовки</h2>
                    </div>

                    @livewire('main-page-goods')

                </div><!--inner-content-->
            </div>

            <div class="row">
                <div class="col-md-12">

                    {{--                <div class="btn-wrap align-right ">--}}
                    {{--                    <a href="#" class="btn-accent-arrow">View all products <i class="icon icon-ns-arrow-right"></i></a>--}}
                    {{--                </div>--}}

                </div>
            </div>
        </div>
    </section>

    <section id="best-selling">

        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="row">

                        <div class="col-md-6">
                            <figure class="products-thumb" data-aos="fade-right">
                                <img src="images/dry1.png" alt="amanita" class="single-image">
                            </figure>
                        </div>

                        <div class="col-md-6">
                            <div class="product-entry" data-aos="fade-left">
                                <h2 class="section-title divider">Для тех кто хочет попробовать в первый раз</h2>

                                <div class="products-content">
                                    <div class="author-name">Шляпки целые, в вакууме</div>
                                    <h3 class="item-title">20г.</h3>
                                    <p>Правильно высушенные целые шляпки октябрьских мухоморов. Вы сами можете увидеть какого качества используются грибы. Оставляют выбор того, как именно вы будете их употреблять.</p>
                                    <div class="item-price">2500 р.</div>
                                    <div class="btn-wrap">

                                        <a href="cart/1" class="btn-accent-arrow gradient">купить сейчас <i
                                                    class="icon icon-ns-arrow-right"></i></a>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <!-- / row -->

                </div>

            </div>
        </div>
    </section>





@endsection
