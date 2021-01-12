{{--
  Template Name: Contacts Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    <figure class="">
      {!! get_the_post_thumbnail('', 'full', ['class' => 'w-100 h-auto']) !!}
    </figure>
    <div class="d-flex flex-column align-items-center w-100 mt-md-n6 mb-5 text-center">
      <div class="header_blue m-0 p-4 text-white">
        <h1 class="m-0">{!! App::title() !!}</h1>
      </div>
      <div class="header_blue_light"></div>
    </div>
    <div class="mb-5">
      @include('partials.content-page')
    </div>
  @endwhile

  @php
//dd($sections[0]['group']);
  @endphp

  <div class="row mb-5">
    <div class="col-12 col-md-7 mx-auto">
      <h2 class="blue-border-bottom-fixed mb-0 py-1">{!! $contacts['company_name'] !!}</h2>
    </div>
  </div>

  <div class="row mb-xl-6">
    <div class="col-12">
      <div class="_p-2 _shadow-sm">
        <div class="row mb-lg-3">
          <div class="mb-3 mb-md-0 col-12 col-md-4">
            @include('partials.contacts.group', ['group' => $sections[0]['group']])
          </div>
          <div class="mb-3 mb-md-0 col-12 col-md-4">
            @include('partials.contacts.group', ['group' => $sections[1]['group']])
          </div>
          <div class="mb-3 mb-md-0 col-12 col-md-4">
            @include('partials.contacts.group', ['group' => $sections[2]['group']])
          </div>
        </div>
        <div class="row">
          @if( isset($sections[3]) )
          <div class="mb-3 mb-md-0 col-12 col-md-4">
            @include('partials.contacts.group', ['group' => $sections[3]['group']])
          </div>
          @endif
          @if( isset($sections[4]) )
          <div class="mb-3 mb-md-0 col-12 col-md-4">
            @include('partials.contacts.group', ['group' => $sections[4]['group']])
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>

  <div class="row pt-5 pb-4 shadow-sm _bg-light">
    <div class="col-12 col-md-7 mx-auto">
      {!! do_shortcode('[formidable id=1 title=true]') !!}
    </div>
  </div>

@endsection
