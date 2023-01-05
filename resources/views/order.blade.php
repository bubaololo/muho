@extends('layouts.app')

@section('content')
    <section class="bg-sand padding-large">
        <div class="container">
@foreach($cartItems as $item)
        {{ $item['name'] }} <br>
        {{ $item['attributes']['weight'] }} <br>
        {{ $item['quantity'] }} <br>
            @endforeach
    @foreach($deliveryInfo as $string)
        {{ $string }} <br>

            @endforeach
        </div>
    </section>
@endsection
