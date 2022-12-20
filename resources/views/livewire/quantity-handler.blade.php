<div>
{{--    <form action="{{ route('cart.update') }}" method="POST">--}}
{{--        @csrf--}}
{{--        <input type="hidden" name="id"--}}
{{--               value="{{ $item->id}}">--}}
{{--        <input type="text" name="quantity"--}}
{{--               value="{{ $item->quantity }}"--}}
{{--               class="w-16 text-center h-6 text-gray-800 outline-none rounded border border-blue-600"/>--}}
{{--        <button--}}
{{--            class="px-4 mt-1 py-1.5 text-sm rounded rounded shadow text-violet-100 bg-violet-500">--}}
{{--            Обновить--}}
{{--        </button>--}}
{{--    </form>--}}
<!-- Quantity -->
    <div class="d-flex" style="max-width: 60px" type="text">
        <button class="btn btn-primary px-3 me-2"
                onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
            -
        </button>

        <div class="form-outline">
            <input id="form1" min="0" name="quantity" value="{{ $CartItem->quantity }}" type="number" class="form-control"/>
            <label class="form-label" for="form1">Количество</label>
        </div>

        <button class="btn btn-primary px-3 ms-2"
                onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
            +
        </button>
    </div>
    <!-- Quantity -->
</div>
