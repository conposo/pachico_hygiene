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


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous"></script>
  <script>
    jQuery('.local_nav a').on('click', function(event) {
        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== '') {
            // Prevent default anchor click behavior
            event.preventDefault();

            // Store hash
            var hash = this.hash;
        }

        jQuery('html,body').animate(
            {
                scrollTop: jQuery(hash).offset().top-66,
            },
            {
                duration: 1750, easing: 'easeOutCubic'
            }
        );
    });
  </script>
@endsection
