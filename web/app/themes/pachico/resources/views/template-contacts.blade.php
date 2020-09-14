{{--
  Template Name: Contacts Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')
    @include('partials.content-page')
  @endwhile

  <!-- embeded map -->

  <div class="row mb-3">
    <div class="col-7 mx-auto">
      <h2 class="blue-border-bottom mb-0 py-1">{!! $contacts['company_name'] !!}</h2>
      <div class="p-2 shadow-sm">
        <p class="mb-0">{!! $contacts['city'] !!}</p>
        <p class="mb-0"><a href="tel:{!! str_replace(' ', '', $contacts['phone']) !!}">{!! $contacts['phone'] !!}</a></p>
        <p class="mb-0"><a href="mailto:{!! $contacts['email'] !!}">{!! $contacts['email'] !!}</a></p>
      </div>
    </div>
  </div>

  <div class="row mb-3">
    <div class="col-7 mx-auto">
      {!! $iframe_embeded_map !!}
    </div>
  </div>

  <div class="row">
    <div class="col-7 mx-auto">
      {!! do_shortcode('[formidable id=1 title=true]') !!}
    </div>
  </div>

@endsection
