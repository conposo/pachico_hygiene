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
  <section class="row d-flex">
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
  <section class="row d-flex flex-row-reverse">
    <div class="col-lg-5 col-xl-4">
      <h1>{!!$section2['title']!!}</h1>
      <p>
        {!!$section2['text']!!}
      </p>
    </div>
  </section>
  
  <!-- Section 3 -->
  <!-- Why choose PaChico -->
  <section class="row d-flex">
    <div class="col-lg-5 col-xl-4">
      <h1>{!!$section3['title']!!}</h1>
      <p>
        {!!$section3['text']!!}
      </p>
    </div>
  </section>
  
  <!-- Section 4 -->
  <!-- Lab -->
  <section class="row d-flex flex-row-reverse">
    <div class="col-lg-5 col-xl-4">
      <h1>{!!$section4['title']!!}</h1>
      <p>
        {!!$section4['text']!!}
      </p>
    </div>
  </section>

  
  <!-- Popular peroducts / Image Gallery -->
  <section>
    <h1>Най-популярните ни продукти</h1>
    <!-- products -->
    @php
      $products = $section4['products'];
      //dd( $products );
    @endphp
    @if($products)
      @foreach($products as $product_id)
        <div class="shadow mb-5 p-3">
          <a href="{{get_permalink($product_id)}}" class="d-block">
          {!! get_the_title($product_id) !!}
          {!! get_the_content($product_id) !!}
          </a>
        </div>  
      @endforeach
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
