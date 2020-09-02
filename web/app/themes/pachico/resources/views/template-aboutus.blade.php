{{--
  Template Name: About Us Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')
    @include('partials.content-page')
  @endwhile

  <!-- Video -->
  <!-- Who we are -->
  <!-- What we do -->
  <!-- Image Gallery -->

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
