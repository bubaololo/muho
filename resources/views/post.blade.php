@extends('layouts.app')

@section('content')
@section('title',  $post->title )
@section('meta_description', $post->description)
<!-- Styles -->
<style>


    h1 {
        font-size: 48px;
    }

    blockquote {
        font-style: italic;
    }

    .hero img {
        width: 50%;
    }

    .wrapper {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px 3%;
        background-color: #fff;
    }

</style>


<div class="wrapper">
    <div class="hero">
        @if ( $post->featured_image )
            <img src="{{ $imagePath }}">
        @endif
    </div>
    <h1>{{ $post->title }}</h1>
    <div class="content">
        {!! $post->content !!}
    </div>
</div>
</section>
@endsection
