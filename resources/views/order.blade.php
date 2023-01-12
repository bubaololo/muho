@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column justify-content-center align-items-center" id="order-heading">
        <div class="text-uppercase">
            <p>Order detail</p>
        </div>
        <div class="h4">Tuesday, December 08, 2020</div>
        <div class="pt-1">
            <p>Order #12615 is currently<b class="text-dark"> processing</b></p>
        </div>
        <div class="btn close text-white"> &times; </div>
    </div>
    <div class="wrapper bg-white">
        <div class="table-responsive">
            <table class="table table-borderless">
                <thead>
                <tr class="text-uppercase text-muted">
                    <th scope="col">product</th>
                    <th scope="col" class="text-right">total</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">Babyblends: 1meal/day</th>
                    <td class="text-right"><b>$69.86</b></td>
                </tr>
                </tbody>
            </table>
        </div>
        @foreach($products as $product)
        <div class="d-flex justify-content-start align-items-center list py-1">
            <div><b>{{ $product['pivot']['quantity']  }} шт.</b></div>
            <div class="mx-3"> <img src="{{ asset($product['image']) }}" alt="apple" class="rounded-circle" width="30" height="30"> </div>
            <div class="order-item">{{ $product['name']  }}</div>
            <div class="order-item">{{ $product['weight']  }} г.</div>
        </div>
        @endforeach

        <div class="pt-2 border-bottom mb-3"></div>
        <div class="d-flex justify-content-start align-items-center pl-3">
            <div class="text-muted">Payment Method</div>
            <div class="ml-auto"> <img src="https://www.freepnglogos.com/uploads/mastercard-png/mastercard-logo-logok-15.png" alt="" width="30" height="30"> <label>Mastercard ******5342</label> </div>
        </div>
        <div class="d-flex justify-content-start align-items-center py-1 pl-3">
            <div class="text-muted">Shipping</div>
            <div class="ml-auto"> <label>Free</label> </div>
        </div>
        <div class="d-flex justify-content-start align-items-center pb-4 pl-3 border-bottom">
            <div class="text-muted"> <button class="text-white btn">50% Discount</button> </div>
            <div class="ml-auto price"> -$34.94 </div>
        </div>
        <div class="d-flex justify-content-start align-items-center pl-3 py-3 mb-4 border-bottom">
            <div class="text-muted"> Today's Total </div>
            <div class="ml-auto h5"> $34.94 </div>
        </div>
        <div class="row border rounded p-1 my-3">
            <div class="col-md-6 py-3">
                <div class="d-flex flex-column align-items start"> <b>Billing Address</b>
                    <p class="text-justify pt-2">James Thompson, 356 Jonathon Apt.220,</p>
                    <p class="text-justify">New York</p>
                </div>
            </div>
            <div class="col-md-6 py-3">
                <div class="d-flex flex-column align-items start"> <b>Shipping Address</b>
                    <p class="text-justify pt-2">James Thompson, 356 Jonathon Apt.220,</p>
                    <p class="text-justify">New York</p>
                </div>
            </div>
        </div>
        <div class="pl-3 font-weight-bold">Related Subsriptions</div>
        <div class="d-sm-flex justify-content-between rounded my-3 subscriptions">
            <div> <b>#9632</b> </div>
            <div>December 08, 2020</div>
            <div>Status: Processing</div>
            <div> Total: <b> $68.8 for 10 items</b> </div>
        </div>
    </div>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif
        }

        body {
            background-color: #7C4135
        }

        #order-heading {
            background-color: #edf4f7;
            position: relative;
            border-top-left-radius: 25px;
            max-width: 800px;
            padding-top: 20px;
            margin: 30px auto 0px
        }

        #order-heading .text-uppercase {
            font-size: 0.9rem;
            color: #777;
            font-weight: 600
        }

        #order-heading .h4 {
            font-weight: 600
        }

        #order-heading .h4+div p {
            font-size: 0.8rem;
            color: #777
        }

        .close {
            padding: 10px 15px;
            background-color: #777;
            border-radius: 50%;
            position: absolute;
            right: -15px;
            top: -20px
        }

        .wrapper {
            padding: 0px 50px 50px;
            max-width: 800px;
            margin: 0px auto 40px;
            border-bottom-left-radius: 25px;
            border-bottom-right-radius: 25px
        }

        .table th {
            border-top: none
        }

        .table thead tr.text-uppercase th {
            font-size: 0.8rem;
            padding-left: 0px;
            padding-right: 0px
        }

        .table tbody tr th,
        .table tbody tr td {
            font-size: 0.9rem;
            padding-left: 0px;
            padding-right: 0px;
            padding-bottom: 5px
        }

        .table-responsive {
            height: 100px
        }

        .list div b {
            font-size: 0.8rem
        }

        .list .order-item {
            font-weight: 600;
            color: #6db3ec
        }

        .list:hover {
            background-color: #f4f4f4;
            cursor: pointer;
            border-radius: 5px
        }

        label {
            margin-bottom: 0;
            padding: 0;
            font-weight: 900
        }

        button.btn {
            font-size: 0.9rem;
            background-color: #66cdaa
        }

        button.btn:hover {
            background-color: #5cb99a
        }

        .price {
            color: #5cb99a;
            font-weight: 700
        }

        p.text-justify {
            font-size: 0.9rem;
            margin: 0
        }

        .row {
            margin: 0px
        }

        .subscriptions {
            border: 1px solid #ddd;
            border-left: 5px solid #ffa500;
            padding: 10px
        }

        .subscriptions div {
            font-size: 0.9rem
        }

        @media(max-width: 425px) {
            .wrapper {
                padding: 20px
            }

            body {
                font-size: 0.85rem
            }

            .subscriptions div {
                padding-left: 5px
            }

            img+label {
                font-size: 0.75rem
            }
        }
    </style>


@endsection
