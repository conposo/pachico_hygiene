@if( is_product_category() )
  @php
    $category = get_queried_object();
  @endphp
  <div id="category_main_header" class="d-none d-lg-block h5 m-0 position-fixed w-100 py-2 text-center text-uppercase text-white">
    <span>
      {{ $category->name }}
    </span>
  </div>
@endif
@if( is_product() )
  <div id="category_main_header" class="d-none d-lg-block h5 m-0 position-fixed w-100 py-2 text-center text-uppercase text-white">
    <span>
      {{ get_the_title() }}
    </span>
  </div>
@endif

<div id="margin-top"></div>

<header class="banner {{ is_front_page() ? 'home top' : '' }} position-fixed w-100 py-1 py-lg-3 shadow-lg" style="top:0;">
  <div class="container d-flex justify-content-between">
    <a class="brand position-relative" href="{{ home_url('/') }}">
      <span class="logo position-absolute d-block w-100"
        style="top:0; left:0; background-image: url(@asset('images/Logotype.png')); background-position: center; background-size: 100% auto; background-repeat: no-repeat; height: 40px;">
      </span>
      <!-- <img src="@asset('images/logotype.png')" alt="" class="position-absolute w-100"> -->
      <!-- <img src="@asset('images/Logotype_PaChiko.png')" alt="" class="position-absolute w-100"> -->
    </a>
    <nav id="nav_primary" class="nav-primary local_nav d-none d-lg-flex align-items-center mx-auto">
      @if ( is_front_page() && has_nav_menu('home_navigation'))
      {!! wp_nav_menu(['theme_location' => 'home_navigation', 'menu_class' => 'nav', 'container_class' => '', 'items_wrap' => '<ul id="%1$s" class="%2$s d-flex flex-column flex-sm-row">%3$s</ul>']) !!}
        <!-- <div id="wp_nav_menu" class="">
        </div> -->
      @elseif (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'items_wrap' => '<ul id="%1$s" class="%2$s d-flex flex-column flex-sm-row">%3$s</ul>']) !!}
      @endif
    </nav>
    <div class="d-flex justify-content-end align-items-center">
      @if (has_nav_menu('language_switcher'))
        {!! wp_nav_menu(['theme_location' => 'language_switcher', 'container_class' => 'menu-languages-container d-none d-md-block', 'menu_class' => 'nav d-flex']) !!}
      @endif
      @if (has_nav_menu('side_navigation'))
        {!! wp_nav_menu(['theme_location' => 'side_navigation', 'menu_class' => 'nav d-flex justify-content-end']) !!}
      @endif
      <span id="open_nav_primary" class="d-lg-none py-1 px-2 text-white"><i style="width:14px; text-align:center;" class="fas fa-bars"></i></span>
    </div>
  </div>
</header>

<!-- {{get_post_type() == 'post'}} -->
<script>
const $ = jQuery;
$(document).ready(function() {
  @if( ! is_front_page() )
    $('#margin-top').height( $('header.banner').height() + @if(get_post_type() != 'post') 45 @else 15 @endif );
  @endif

  $('#open_nav_primary, .menu-item').on('click', function() {
    $('#open_nav_primary i').toggleClass('fa-times').toggleClass('fa-bars')
    const classes =  $('#open_nav_primary').attr('class').split(' ')
    const has_class = classes.find(element => element == 'opened')
    if( has_class ) {
      $('#open_nav_primary').removeClass('opened')
      $('#open_nav_primary').find('i').removeClass('fa-times').addClass('fa-bars')
      $('#nav_primary').removeClass('d-flex').addClass('d-none')
      $('.menu-languages-container').removeClass('d-block').addClass('d-none')
    } else {
      $('#open_nav_primary').addClass('opened')
      $('#open_nav_primary').find('i').removeClass('fa-bars').addClass('fa-times')
      $('#nav_primary').removeClass('d-none').addClass('d-flex')
      $('.menu-languages-container').removeClass('d-none').addClass('d-block')
    }
  })

  jQuery('.banner').hover(
    function(){
      jQuery('#category_main_header').removeClass('shown')
      jQuery('.banner').removeClass('hidden0');
    },
    function(){
    },
  )
})



$(document).ready(function() {
  window.onscroll = function(e) {
      // console.log(this.oldScroll > this.scrollY);
      let up = this.oldScroll > this.scrollY;
      // if(up) {
      //   console.log('going Up');
      // } else {
      //   console.log('going Down');
      // }

      @if( is_product_category() || is_product() )
        if( up ) {
          jQuery('a.brand').removeClass('fade_img_show_logo');
          jQuery('.banner').removeClass('collapse_header');
          jQuery('#category_main_header').removeClass('shown')
          jQuery('.banner').removeClass('hidden0');
        } else if( this.scrollY > jQuery('.woocommerce-products-header').height() ) {
          jQuery('a.brand').addClass('fade_img_show_logo');
          jQuery('.banner').addClass('collapse_header');
          jQuery('#category_main_header').addClass('shown')
          jQuery('.banner').addClass('hidden0');
        }
      @else
        if( up ) {
          jQuery('a.brand').removeClass('fade_img_show_logo');
          jQuery('.banner').removeClass('collapse_header');
        } else {
          jQuery('a.brand').addClass('fade_img_show_logo');
          jQuery('.banner').addClass('collapse_header');
        }
      @endif
      this.oldScroll = this.scrollY;
  }
});
</script>

@if( is_front_page() )
  <script>
    // var $_ = jQuery('a.brand img')
    // jQuery($_).clone()
    // .insertAfter('header.banner')
    // .css({
    //   position: 'absolute',
    //   top: $_.offset().top,
    //   left: $_.offset().left,
    //   width: $_.width(),
    //   height: $_.height(),
    //   zIndex: 9999,
    // }).removeClass('w-100');
  $(window).scroll(function() {
    if($(document).scrollTop() > $(window).height()-150) {
      $('.banner').removeClass('top');
    } else {
      $('.banner').addClass('top');
    }
  });
  </script>
@endif