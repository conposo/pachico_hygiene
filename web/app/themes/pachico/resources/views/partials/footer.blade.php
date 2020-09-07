<footer class="content-info mt-5 bg-light border-top">
  
  <div class="container">
    @php dynamic_sidebar('sidebar-footer') @endphp
    <!-- <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">Our Blog</a> -->
  </div>

  <div class="container d-flex mb-3">
    <a class="brand mt-n1 mr-1 d-inline-block" href="{{ home_url('/') }}">
      <img src="@asset('images/logo-pachico.png')" alt="" class="w-100">
    </a>
    <div class="my-1">
      @if( is_product() )
        {{ woocommerce_breadcrumb([
          'delimiter' => '<span class="mx-1 small text-black-50"><i class="fa fa-chevron-right"></i></span>',
          'wrap_before' => '<span class="mx-1 small text-black-50"><i class="fa fa-chevron-right"></i></span>',
          'wrap_after' => '',
          ]) }}
      @elseif( is_single() )
        <a href="{{ get_permalink( get_option( 'page_for_posts' ) ) }}" class="small text-black-50 text-uppercase" title="">Blog</a>
        <span class="small text-black-50"><i class="fa fa-chevron-right"></i></span>
        <a href="#" class="small text-black-50 text-uppercase" title="You are here. Go to top">{{ get_the_title( is_shop() ? wc_get_page_id('shop') : get_the_ID() ) }}</a>
      @elseif( ! is_front_page() && ! is_home() )
        <span class="small text-black-50"><i class="fa fa-chevron-right"></i></span>
        <a href="#" class="small text-black-50 text-uppercase" title="You are here. Go to top">{{ get_the_title( is_shop() ? wc_get_page_id('shop') : get_the_ID() ) }}</a>
      @endif
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-4">
        @if (has_nav_menu('footer_navigation'))
          {!! wp_nav_menu(['theme_location' => 'footer_navigation', 'menu_class' => '']) !!}
        @endif
        @if (has_nav_menu('social_links'))
          {!! wp_nav_menu(['theme_location' => 'social_links', 'menu_class' => '']) !!}
        @endif
      </div>
      <div class="col-4">
        @if (has_nav_menu('products_categories_navigation'))
          {!! wp_nav_menu(['theme_location' => 'products_categories_navigation', 'menu_class' => '']) !!}
        @endif
      </div>
      <div class="col-2">
      </div>
    </div>
  </div>

  <div class="container">
    <div class="d-flex justify-content-between py-1 small border-top">
      <div class="d-flex">
        <p>Copyright © 2020 PaChico Inc. All rights reserved.</p>
        /
        <a class="mx-1" href="#">Terms & Conditions</a>
        /
        <a class="mx-1" href="#">Privacy policy</a>
        /
        <a class="mx-1" href="#">Sitemap</a>
      </div>
      <div class="language_switcher">
        <i class="fa fa-flag"></i>
      </div>
    </div>
  </div>



</footer>

<script>
  // jQuery(document).ready(function(){
  //   jQuery('.menu-side-navigation a').on('click', function(e) {
  //     e.preventDefault();
  //   })
  // })
</script>

@include('partials.modals.search')
