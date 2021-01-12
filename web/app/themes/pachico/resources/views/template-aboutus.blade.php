{{--
  Template Name: About Us Template
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
  @endwhile

  <!-- <div class="pt-3 pt-lg-5 container">
  </div> -->

  <!-- Video -->

  <!-- Section 1 -->
  <!-- Who we are -->
  <!-- <section class="row d-flex my-5 py-2 shadow">
    <figure class="col-lg-5 col-xl-4">
      {!! get_the_post_thumbnail('', 'full', ['class' => 'w-100 h-auto']) !!}
    </figure>
    <div class="col-lg-7">
      @if( $section1['title'] )
      <h1>{!!$section1['title']!!}</h1>
      @endif
      <p>
        {!!$section1['text']!!}
      </p>
    </div>
  </section> -->
  
  <!-- Section 2 -->
  <!-- What we do -->
  <section class="row d-fle mb-5 my-sm-5 py-sm-5">
    <div class="col-lg-7 col-xl-8 mx-auto">
      <h1 class="blue-border-bottom mb-1 pb-0">{!!$section2['title']!!}</h1>
      <div>
        {!!$section2['text']!!}
      </div>
    </div>
  </section>
  
  <!-- Section 3 -->
  <!-- Why choose PaChico -->
  <section class="row d-flex">
    <!-- <div class="col-lg-5 col-xl-4">
    </div> -->
    <div class="col-lg-7 col-xl-8 mx-auto">
      <h1 class="blue-border-bottom mb-1 pb-0">{!!$section3['title']!!}</h1>
      <div>
        {!!$section3['text']!!}
      </div>
    </div>
  </section>
  
  <!-- Section 4 -->
  <!-- Lab -->
  <section class="row d-flex flex-row-reverse my-sm-5 py-5">
    <!-- <div class="col-lg-5 col-xl-4">
    </div> -->
    <div class="col-lg-7 col-xl-8 mx-auto">
      <h1 class="blue-border-bottom mb-1 pb-0">{!!$section4['title']!!}</h1>
      <div>
        {!!$section4['text']!!}
      </div>
    </div>
  </section>

  
  <!-- Popular peroducts / Image Gallery -->
  <section class="my-5">
    <h1 class="mb-n6 text-center">
      @if( $host[0] == 'de' ) Unsere beliebtesten Produkte @else Най-популярните ни продукти @endif
    </h1>
    <!-- products -->
    @php
      $products = $section4['products'];
      //dd( $products );
    @endphp
    @if($products)
      <ul class="products mt-2">
      @foreach($products as $product_id)
        <li class="">
          <a href="{{get_permalink($product_id)}}" class="d-block">
            {!! get_the_post_thumbnail($product_id, 'medium', ['class' => 'w-100 h-auto']) !!}
            <h2>{!! get_the_title($product_id) !!}</h2>
          </a>
        </li>  
      @endforeach
      </ul>
    @else
    @endif
  </section>
  
  
  @if($timeline)
    <section class="my-6">
      <div class="">
        <h2 class="blue-border-bottom mb-3 pb-1">{{$timeline_header}}</h2>
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
