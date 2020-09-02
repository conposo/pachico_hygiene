{{--
  Template Name: Jobs Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')
    @include('partials.content-page')
  @endwhile

  @if($jobs->have_posts())
    @while ( $jobs->have_posts() ) @php $jobs->the_post(); @endphp
      {{ the_title() }}
      {{ the_content() }}
    @endwhile
  @else
    <p>В момента няма свободни позиции</p>
    <p>There are no available positions at this moment.</p>
  @endif


  @php
  //dd($jobs);
  wp_reset_postdata();
  @endphp
@endsection
