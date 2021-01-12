{{--
The Template for displaying product archives, including the main shop page which is a post type archive

This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.

HOWEVER, on occasion WooCommerce will need to update template files and you
(the theme developer) will need to copy the new files to your theme to
maintain compatibility. We try to do this as little as possible, but it does
happen. When this occurs the version of the template file will be bumped and
the readme will list any important changes.

@see https://docs.woocommerce.com/document/template-structure/
@package WooCommerce/Templates
@version 3.4.0
--}}

@extends('layouts.app')

@section('content')
  @php
    do_action('get_header', 'shop');
    do_action('woocommerce_before_main_content');
  @endphp

  @if( !is_shop() && $category = get_queried_object() )
    @php
      $category_term_id = $category->term_id;
      // dd($category);
      $thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
      $image_url = wp_get_attachment_image_src( $thumbnail_id, 'full' );
    @endphp
    <div id="categpry_header" class="position-absolute w-100">
      <img class="w-100" src="{{ $image_url[0] }}" alt="" srcset="">
    </div>
  @endif

  <header class="woocommerce-products-header my-6 pt-3 pb-4 text-center">
    <div class="d-inline-flex flex-column">
      <div class="header_blue d-inline-flex flex-column py-4 px-sm-4 text-white">
        @if(apply_filters('woocommerce_show_page_title', true))
          <h1 class="woocommerce-products-header__title page-title mb-3">{!! woocommerce_page_title(false) !!}</h1>
        @endif
        @php
          do_action('woocommerce_archive_description');
        @endphp
      </div>
      <div class="_mx-auto header_blue_light d-inline-flex"></div>
    </div>
  </header>

  <!-- print categories -->

  <!-- <figure class="mb-0" style="max-height: 450px; overflow: hidden;">
    {!! get_the_post_thumbnail(wc_get_page_id('shop'), 'full', ['class' => 'w-100 h-auto']) !!}
    <caption>
      <span class="small text-uppercase bg-white pl-1 position-absolute" style="top: 0;right: 0;">{!! the_post_thumbnail_caption() !!}</span>
    </caption>
  </figure> -->

  @if( !is_shop() && woocommerce_product_loop() )
    @php
      do_action('woocommerce_before_shop_loop');
      woocommerce_product_loop_start();
    @endphp

    @if(wc_get_loop_prop('total'))
      @while(have_posts())
        @php
          the_post();
          do_action('woocommerce_shop_loop');
          wc_get_template_part('content', 'product');
        @endphp
      @endwhile
    @endif

    <script>
    $(document).ready(function() {
      $('.products li a').mousedown(function() {
        $(this).addClass('pressed')
      })
      $('.products li a').mouseup(function() {
        $(this).removeClass('pressed')
      })

      $('.products li').each(function() {
        _a = $(this).find('a:first-child')
        _image = $(this).find('img')
        _image.clone().insertAfter(_a)
      });
    });
    </script>

    @php
      woocommerce_product_loop_end();
      do_action('woocommerce_after_shop_loop');
    @endphp
  @else
    @php
      // do_action('woocommerce_no_products_found');
    @endphp
  @endif

  <div class="mt-6 d-flex flex-wrap justify-content-between">
    @foreach( $categories as $cat )
      @php
      $thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
      $image = wp_get_attachment_image_src( $thumbnail_id, 'medium' );
      @endphp
      <div class="card-category position-relative mb-6 @if( isset($category_term_id) && $category_term_id == $cat->term_id ) disabled @endif" style="background-image: url({{$image[0]}}); background-size: cover; background-position: center;">
        <a
          @if( is_shop() || (isset($category_term_id) && $category_term_id != $cat->term_id) )
            href="{{get_term_link($cat->term_id)}}"
          @else
            href="#"
          @endif
          class="position-relative d-flex justify-content-start align-items-end p-1 p-sm-2 w-100 h-100 text-white">
          <span class="cat_name">{{$cat->name}}</span>
          @if( isset($category_term_id) && $category_term_id == $cat->term_id )
            <span class="show_in_hover position-absolute">
              <i class="fas fa-arrow-up position-absolute"></i>
              В момента сте тук. Нагоре?
            </span>
          @endif  
          <!-- <span>{{$cat->description}}</span> -->
        </a>
        <div class="arrow-go position-absolute text-white">
          <i class="fas fa-arrow-right"></i>
        </div>
      </div>
    @endforeach
  </div>

  @php
    do_action('woocommerce_after_main_content');
    do_action('get_sidebar', 'shop');
    do_action('get_footer', 'shop');
  @endphp
@endsection