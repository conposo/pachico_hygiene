{{--
  Template Name: Team Members Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')
    @include('partials.content-page')
  @endwhile

  @if($team_members->have_posts())
    @while ( $team_members->have_posts() ) @php $team_members->the_post(); @endphp
      {{ the_title() }}
      {{ the_content() }}
    @endwhile
  @else
  @endif


  @php
  //dd($team_members);
  wp_reset_postdata();
  @endphp
@endsection
