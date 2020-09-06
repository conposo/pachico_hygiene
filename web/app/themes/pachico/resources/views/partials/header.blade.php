<header class="banner {{ is_front_page() ? 'home top position-fixed' : '' }} w-100 py-1 py-lg-3 shadow-lg">
  <div class="container d-flex justify-content-between">
    <a class="brand position-relative" href="{{ home_url('/') }}">
      <!-- {{ get_bloginfo('name', 'display') }} -->
      <img src="@asset('images/logo-pachico.png')" alt="" class="position-absolute w-100">
    </a>
    <nav id="nav_primary" class="nav-primary local_nav d-none d-lg-flex align-items-center">
      @if ( is_front_page() && has_nav_menu('home_navigation'))
      {!! wp_nav_menu(['theme_location' => 'home_navigation', 'menu_class' => 'nav', 'container_class' => '', 'items_wrap' => '<ul id="%1$s" class="%2$s d-flex flex-column">%3$s</ul>']) !!}
        <!-- <div id="wp_nav_menu" class="">
        </div> -->
      @elseif (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
      @endif
    </nav>
    <div class="d-flex align-items-center">
      @if (has_nav_menu('side_navigation'))
        {!! wp_nav_menu(['theme_location' => 'side_navigation', 'menu_class' => 'nav d-flex justify-content-end']) !!}
      @endif
      <span id="open_nav_primary" class="d-lg-none py-1 px-2 text-white"><i style="width:14px; text-align:center;" class="fas fa-bars"></i></span>
    </div>
  </div>
</header>


<script>
const $ = jQuery;
$(document).ready(function() {
  $('#open_nav_primary, .menu-item').on('click', function() {
    $('#open_nav_primary i').toggleClass('fa-times').toggleClass('fa-bars')
    const classes =  $('#open_nav_primary').attr('class').split(' ')
    const has_class = classes.find(element => element == 'opened')
    if( has_class ) {
      $('#open_nav_primary').removeClass('opened')
      $('#open_nav_primary').find('i').removeClass('fa-times').addClass('fa-bars')
      $('#nav_primary').removeClass('d-flex').addClass('d-none')
    } else {
      $('#open_nav_primary').addClass('opened')
      $('#open_nav_primary').find('i').removeClass('fa-bars').addClass('fa-times')
      $('#nav_primary').removeClass('d-none').addClass('d-flex')
    }
  })
})
</script>

@if( is_front_page() )
<script>
  $(window).scroll(function() {
    if($(document).scrollTop() > $(window).height()-150) {
      $('.banner').removeClass('top');
    } else {
      $('.banner').addClass('top');
    }
  });
</script>
@endif