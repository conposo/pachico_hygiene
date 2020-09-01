<header class="banner {{ is_front_page() ? 'home top' : '' }} position-fixed w-100 py-3 shadow-lg">
  <div class="container d-flex justify-content-between">
    <a class="brand position-relative" href="{{ home_url('/') }}">
      <!-- {{ get_bloginfo('name', 'display') }} -->
      <img src="@asset('images/logo-pachico.png')" alt="" class="position-absolute w-100">
    </a>
    <nav class="nav-primary local_nav">
      @if ( is_front_page() && has_nav_menu('home_navigation'))
        {!! wp_nav_menu(['theme_location' => 'home_navigation', 'menu_class' => 'nav']) !!}
      @elseif (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
      @endif
    </nav>
    <div>
      @if (has_nav_menu('side_navigation'))
        {!! wp_nav_menu(['theme_location' => 'side_navigation', 'menu_class' => 'nav']) !!}
      @endif
    </div>
  </div>
</header>

@if( is_front_page() )
<script>
  const $ = jQuery;
  $(window).scroll(function() {
    if($(document).scrollTop() > $(window).height()-150) {
      $('.banner').removeClass('top');
    } else {
      $('.banner').addClass('top');
    }
  });
</script>
@endif