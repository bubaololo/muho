@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <div class="form-group {{$errors->has('region_id')}}">
                            <label>Region:</label>
                            {{app('form')->select('region_id', $regions, null, ['class' => 'form-control', 'id' => 'region_id'])}}
                            {{$errors->first('region_id')}}
                        </div>
                        <div class="form-group {{$errors->has('province_id')}}">
                            <label>Province:</label>
                            {{app('form')->select('province_id', [], null, ['class' => 'form-control', 'id' => 'province_id'])}}
                            {{$errors->first('province_id')}}
                        </div>
                        <div class="form-group {{$errors->has('city_id')}}">
                            <label>City:</label>
                            {{app('form')->select('city_id', [], null, ['class' => 'form-control', 'id' => 'city_id'])}}
                            {{$errors->first('city_id')}}
                        </div>
                        <div class="form-group {{$errors->has('barangay_id')}}">
                            <label>Barangay:</label>
                            {{app('form')->select('barangay_id', [], null, ['class' => 'form-control', 'id' => 'barangay_id'])}}
                            {{$errors->first('barangay_id')}}
                        </div>
                        <div class="form-group {{$errors->has('street')}}">
                            <label>Street:</label>
                            {{app('form')->text('street', null, ['class' => 'form-control'])}}
                            {{$errors->first('street')}}
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
