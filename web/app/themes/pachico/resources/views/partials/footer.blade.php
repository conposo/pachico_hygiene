

@if( $host[0] == 'en' )
	$text_terms = 'Terms & Conditions';
	$text_privacy = 'Privacy Policy';
@elseif( $host[0] == 'de' )
	@php
	$text_terms = 'Nutzungsbedingungen';
	$text_privacy = 'Vertraulichkeit';
	@endphp
@else
	@php
  $text_terms = 'Условия за ползване';
  $text_privacy = 'Поверителност';
	@endphp
@endif

<footer class="content-info mt-5 bg-light border-top">
  
  <div class="container">
    @php dynamic_sidebar('sidebar-footer') @endphp
  </div>

  <div class="container d-flex mb-3">
    <a class="brand mt-n1 mr-1 d-inline-block" href="{{ home_url('/') }}">
      <img src="@asset('images/Logotype_PaChiko.png')" alt="" class="w-100">
    </a>
    <div class="my-1">
      @if( is_product() )
        {{ woocommerce_breadcrumb([
          'delimiter' => '<span class="mx-1 small text-black-50"><i class="fa fa-chevron-right"></i></span>',
          'wrap_before' => '<span class="mx-1 small text-black-50"><i class="fa fa-chevron-right"></i></span>',
          'wrap_after' => '',
          ]) }}
      @elseif( is_product_category() )
        @php $category = get_queried_object(); @endphp
        <span class="small text-black-50"><i class="fa fa-chevron-right"></i></span>
        <a href="#" class="small text-black-50 text-uppercase" title="You are here. Go to top">{{ $category->name }}</a>
      @elseif( is_single() )
        <a href="{{ get_permalink( get_option( 'page_for_posts' ) ) }}" class="small text-black-50 text-uppercase" title="">Blog</a>
        <span class="small text-black-50"><i class="fa fa-chevron-right"></i></span>
        <a href="#" class="small text-black-50 text-uppercase" title="You are here. Go to top">{{ get_the_title() }}</a>
      @elseif( ! is_front_page() && ! is_home() )
        <span class="small text-black-50"><i class="fa fa-chevron-right"></i></span>
        <a href="#" class="small text-black-50 text-uppercase" title="You are here. Go to top">{{ get_the_title( is_shop() ? wc_get_page_id('shop') : get_the_ID() ) }}</a>
      @endif
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-4">
        @if (has_nav_menu('footer_navigation'))
          {!! wp_nav_menu(['theme_location' => 'footer_navigation', 'menu_class' => '']) !!}
        @endif
      </div>
      <div class="col-12 col-sm-4">
        @if (has_nav_menu('products_categories_navigation'))
          {!! wp_nav_menu(['theme_location' => 'products_categories_navigation', 'menu_class' => '']) !!}
        @endif
      </div>
      <div class="col-12 col-sm-4">
        @if (has_nav_menu('contacts_navigation'))
          {!! wp_nav_menu(['theme_location' => 'contacts_navigation', 'menu_class' => '_border-bottom mb-2']) !!}
        @endif
      </div>
    </div>
  </div>

  <div class="container">
    <div class="d-flex flex-column flex-sm-row justify-content-between py-1 small border-top">
      <div class="d-flex flex-column flex-sm-row mb-2 mb-sm-0">
        <p class="m-sm-0">Copyright © {{date("Y")}} PaChico Inc. All rights reserved.</p>
        <div>
          <span class="d-none d-sm-inline">|</span>
          <!-- <a class="mr-1" href="#">Terms & Conditions</a> -->
          <a class="mr-1" href="/terms-conditions">{{$text_terms}}</a>
          |
          <a class="mr-1" href="/privacy-policy">{{$text_privacy}}</a>
          <!-- |
          <a class="mr-1" href="#">Sitemap</a> -->
        </div>
      </div>
      <div class="language_switcher">
        @if (has_nav_menu('social_links'))
          {!! wp_nav_menu(['theme_location' => 'social_links', 'menu_class' => 'd-flex']) !!}
        @endif
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
