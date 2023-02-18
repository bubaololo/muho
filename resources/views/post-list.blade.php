@extends('layouts.app')
@section('title', 'Статьи о мухоморе')
@section('meta_description', 'Информация о свойствах мухомора и способах его употребления')
@section('content')

    <!-- Styles -->

    <div class="container p-5">

        @foreach($posts as $post)
            <div class="card" style="width: 18rem;">
                @if ( $post['post']->featured_image )
                <img src="{{ $post['imagePath'] }}" class="card-img-top" alt="{{ $post['post']->title }}">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $post['post']->title }}</h5>
                    <p class="card-text">{{ $post['post']->description }}</p>
                    <a href="{{ $post['url']  }}" class="btn btn-primary">Читать</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
