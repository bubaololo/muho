<div class="container px-12 py-8 mx-auto">
    <h3 class="text-2xl font-bold text-purple-700">В наличии</h3>
    <div class="h-1 bg-red-500 w-36"></div>
    <div class="grid grid-cols-1 gap-6 mt-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

            {{--<div class="w-full max-w-sm mx-auto overflow-hidden bg-white rounded-md shadow-md">--}}
            {{--    <img src="{{ $product->image }}" alt="" style="width: 120px;">--}}
            {{--    <div class="flex items-end justify-end w-full bg-cover">--}}

            {{--    </div>--}}
            {{--    <div class="px-5 py-3">--}}
            {{--        <h3 class="text-gray-700 uppercase">{{ $product->name }}</h3>--}}
            {{--        <span class="mt-2 text-gray-500">{{ $product->price }} р.</span>--}}
            {{--        <span class="mt-2 text-gray-500">{{ $product->weight }} г.</span>--}}
            {{--        <form wire:submit.prevent="addToCart({{ $product }})" action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">--}}
            {{--            @csrf--}}
            {{--            <input type="hidden" value="{{ $product->name }}" name="name">--}}
            {{--            <input type="hidden" value="{{ $product->price }}" name="price">--}}
            {{--            <input type="hidden" value="{{ $product->weight }}" name="weight">--}}
            {{--            <input type="hidden" value="{{ $product->image }}" name="image">--}}
            {{--            <input type="hidden" value="1" name="quantity">--}}
            {{--            <button class="px-4 py-1.5 text-white text-sm bg-blue-800 rounded">добавить в корзину</button>--}}
            {{--        </form>--}}
            {{--    </div>--}}
                <section style="background-color: #eee;">
                    <div class="container py-5">
                        @foreach ($products as $product)
                        <div class="row justify-content-center mb-3">
                            <div class="col-md-12 col-xl-10">
                                <div class="card shadow-0 border rounded-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                                                <div class="bg-image hover-zoom ripple rounded ripple-surface">
                                                    <img src="{{ $product->image }}"
                                                            class="w-100" />
                                                    <a href="#!">
                                                        <div class="hover-overlay">
                                                            <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-6 col-xl-6">
                                                <h5>{{ $product->name }}</h5>
                                                <div class="d-flex flex-row">
                                                    <div class="text-danger mb-1 me-2">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <span>{{ $product->weight }} г.</span>
                                                </div>
                                                {{--<div class="mt-1 mb-0 text-muted small">--}}
                                                {{--    <span>100% cotton</span>--}}
                                                {{--    <span class="text-primary"> • </span>--}}
                                                {{--    <span>Light weight</span>--}}
                                                {{--    <span class="text-primary"> • </span>--}}
                                                {{--    <span>Best finish<br /></span>--}}
                                                {{--</div>--}}
                                                {{--<div class="mb-2 text-muted small">--}}
                                                {{--    <span>Unique design</span>--}}
                                                {{--    <span class="text-primary"> • </span>--}}
                                                {{--    <span>For men</span>--}}
                                                {{--    <span class="text-primary"> • </span>--}}
                                                {{--    <span>Casual<br /></span>--}}
                                                {{--</div>--}}
                                                <p class="text-truncate mb-4 mb-md-0">
                                                    {{ $product->description }}
                                                </p>
                                            </div>
                                            <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                                                <div class="d-flex flex-row align-items-center mb-1">
                                                    <h4 class="mb-1 me-1">{{ $product->price }} руб.</h4>
                                                    {{--<span class="text-danger"><s>$20.99</s></span>--}}
                                                </div>
                                                <h6 class="text-success">урожай 2022</h6>
                                                <div class="d-flex flex-column mt-4">
                                                    <a href="/product/{{ $product->id  }}" class="btn btn-primary btn-sm">Подробнее</a>
                                                    <form wire:submit.prevent="addToCart({{ $product }})" action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" value="{{ $product->name }}" name="name">
                                                        <input type="hidden" value="{{ $product->price }}" name="price">
                                                        <input type="hidden" value="{{ $product->weight }}" name="weight">
                                                        <input type="hidden" value="{{ $product->image }}" name="image">
                                                        <input type="hidden" value="1" name="quantity">
                                                        <button class="btn btn-outline-primary btn-sm mt-2" type="button">
                                                            добавить в корзину
                                                        </button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </section>


    </div>
</div>
