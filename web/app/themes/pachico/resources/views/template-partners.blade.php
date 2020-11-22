{{--
  Template Name: Partners Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    <figure class="">
      {!! get_the_post_thumbnail('', 'full', ['class' => 'w-100 h-auto']) !!}
    </figure>
    <div class="d-flex flex-column align-items-center w-100 mt-n6 mb-5 text-center">
      <div class="header_blue m-0 p-4 text-white">
        <h1 class="m-0">{!! App::title() !!}</h1>
      </div>
      <div class="header_blue_light"></div>
    </div>
    <div class="mb-5">
      @include('partials.content-page')
    </div>
    <div class="d-flex flex-wrap py-5">
      @foreach($partners as $partner)
        @php
        $_partner = $partner['partner'];
        @endphp
        <figure class="col-12 col-sm-6 col-md-4 col-lg-3 wp-block-image  flex-column p-2 align-items-center d-flex justify-content-center">
          <a class="card text-dark" href="{{ $_partner['url'] }}" target="_blank" style="text-decoration:none;">
            {!! wp_get_attachment_image( $_partner['logo'], 'full', false , ['class' => 'w-100 h-auto'] ) !!}
            <figcaption class="mb-0 py-2 text-center">{{ $_partner['text'] }}</figcaption>
          </a>
        </figure>
      @endforeach
    </div>
  @endwhile

@endsection
