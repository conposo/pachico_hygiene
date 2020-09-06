@extends('layouts.app')

@section('content')
  <!-- @ while(have_posts()) @php the_post() @endphp -->
    <!-- @ include('partials.page-header') -->
    <!-- @ include('partials.content-page') -->
  <!-- @ endwhile -->

  <!-- HERO -->
  @include('partials.home.hero')
  
  <!-- about us -->
  @include('partials.home.about')
  
  <!-- products -->
  @include('partials.home.products')

  <!-- news -->

  <!-- contacts -->

  <script>
  </script>
@endsection
