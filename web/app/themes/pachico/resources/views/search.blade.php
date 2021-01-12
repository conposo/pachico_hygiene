@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (!have_posts())
    <div class="alert alert-warning">
      <!-- {{ __('Sorry, no results were found.', 'sage') }} -->
      @if( $host[0] == 'de' )
        {{ __('Sorry, no results were found.', 'sage') }}
      @else
        {{ __('Съжаляваме, но за вашето търсене няма резултати.', 'sage') }}
      @endif
    </div>
    {!! get_search_form(false) !!}
  @endif

  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-search')
  @endwhile

  {!! get_the_posts_navigation() !!}
@endsection
