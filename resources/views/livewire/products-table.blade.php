<div class="container px-12 py-8 mx-auto">
    <h3 class="text-2xl font-bold text-purple-700">В наличии</h3>
    <div class="h-1 bg-red-500 w-36"></div>
    <div class="grid grid-cols-1 gap-6 mt-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
        @foreach ($products as $product)
            <div class="w-full max-w-sm mx-auto overflow-hidden bg-white rounded-md shadow-md">
                <img src="{{ $product->image }}" alt="" style="width: 120px;">
                <div class="flex items-end justify-end w-full bg-cover">

                </div>
                <div class="px-5 py-3">
                    <h3 class="text-gray-700 uppercase">{{ $product->name }}</h3>
                    <span class="mt-2 text-gray-500">{{ $product->price }} р.</span>
                    <span class="mt-2 text-gray-500">{{ $product->weight }} г.</span>
                    <form wire:submit.prevent="addToCart({{ $product }})" action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $product->name }}" name="name">
                        <input type="hidden" value="{{ $product->price }}" name="price">
                        <input type="hidden" value="{{ $product->weight }}" name="weight">
                        <input type="hidden" value="{{ $product->image }}" name="image">
                        <input type="hidden" value="1" name="quantity">
                        <button class="px-4 py-1.5 text-white text-sm bg-blue-800 rounded">добавить в корзину</button>
                    </form>
                </div>

            </div>
        @endforeach
    </div>
</div>
