{{--
  Template Name: About Us Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')
    @include('partials.content-page')
  @endwhile

  <!-- <div class="pt-3 pt-lg-5 container">
  </div> -->

  <!-- Video -->

  <!-- Section 1 -->
  <!-- Who we are -->
  <section class="row d-flex my-5 py-2 shadow">
    <figure class="col-lg-5 col-xl-4">
      {!! get_the_post_thumbnail('', 'full', ['class' => 'w-100 h-auto']) !!}
    </figure>
    <div class="col-lg-7">
      <h1>{!!$section1['title']!!}</h1>
      <p>
        {!!$section1['text']!!}
      </p>
    </div>
  </section>
  
  <!-- Section 2 -->
  <!-- What we do -->
  <section class="row d-flex flex-row-reverse my-5">
    <!-- <div class="col-lg-5 col-xl-4">
    </div> -->
    <div class="col-lg-7 col-xl-8 mx-auto">
      <h1>{!!$section2['title']!!}</h1>
      <p>
        {!!$section2['text']!!}
      </p>
    </div>
  </section>
  
  <!-- Section 3 -->
  <!-- Why choose PaChico -->
  <section class="row d-flex">
    <!-- <div class="col-lg-5 col-xl-4">
    </div> -->
    <div class="col-lg-7 col-xl-8 mx-auto my-5">
      <h1>{!!$section3['title']!!}</h1>
      <p>
        {!!$section3['text']!!}
      </p>
    </div>
  </section>
  
  <!-- Section 4 -->
  <!-- Lab -->
  <section class="row d-flex flex-row-reverse my-5">
    <!-- <div class="col-lg-5 col-xl-4">
    </div> -->
    <div class="col-lg-7 col-xl-8 mx-auto">
      <h1>{!!$section4['title']!!}</h1>
      <p>
        {!!$section4['text']!!}
      </p>
    </div>
  </section>

  
  <!-- Popular peroducts / Image Gallery -->
  <section class="my-5">
    <h1>Най-популярните ни продукти</h1>
    <!-- products -->
    @php
      $products = $section4['products'];
      //dd( $products );
    @endphp
    @if($products)
      <div class="row">
      @foreach($products as $product_id)
        <div class="col-6 col-sm-3 shadow mb-5 p-3">
          <figure class="mb-0" style="max-height: 450px; overflow: hidden;">
            {!! get_the_post_thumbnail($product_id, 'thumbnail', ['class' => 'w-100 h-auto']) !!}
            <caption>
              <span class="small text-uppercase bg-white pl-1 position-absolute" style="top: 0;right: 0;">{!! the_post_thumbnail_caption() !!}</span>
            </caption>
          </figure>
          <a href="{{get_permalink($product_id)}}" class="d-block">
          {!! get_the_title($product_id) !!}
          {!! get_the_content($product_id) !!}
          </a>
        </div>  
      @endforeach
      </div>
    @else
    @endif
  </section>
  
  
  @if($timeline)
    <section>
      <div class="">
        <h1>{{$timeline_header}}</h1>
        <p>{{$timeline_intorduction}}</p>
      </div>
      @foreach($timeline as $group)
        @php $z = 0; @endphp
        <div class="shadow mb-5 p-3">
          <h2>{!!$group['year__date']!!}</h2>
          <p>{!!$group['text']!!}</p>
        </div>
      @endforeach
    </section>
  @else
  @endif

  <!-- We think about your health -->

  <!-- Our standrarts -->
  
  @php
  //dd(5);
  @endphp
@endsection
