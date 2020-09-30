<article @php post_class('mb-5') @endphp>
  <header class="position-relative">
    <figure class="mb-0">
      {!! get_the_post_thumbnail(get_the_ID(), 'full', ['class' => 'w-100 h-auto']) !!}
      <caption>
        <span class="small text-uppercase">{!! wp_get_attachment_caption() !!}</span>
      </caption>
    </figure>
    <div class="d-none d-md-block position-absolute w-100 py-2 py-sm-5 border-top" style="overflow:hidden; bottom:0;">
      <div class="container" style="opacity: 0;">
        <div class="row">
          <div class="col-10 col-sm-8 mx-auto">
            <h1 class="entry-title my-2">{!! get_the_title() !!}</h1>
          </div>
        </div>
      </div>
      <div id="bg_blur" class="blurry position-absolute w-100" style="filter: blur(10px); top:0; left:0; bottom:0; background-size: cover; background-position: bottom center;"></div>
    </div>
    <div class="title-wrapper w-100 py-2 py-sm-5 border-top">
      <div class="container">
        <div class="row">
          <div class="col-10 col-sm-8 mx-auto">
            <h1 class="entry-title my-2">{!! get_the_title() !!}</h1>
          </div>
        </div>
      </div>
    </div>
  </header>
  <div class="entry-content container">
    <div class="row">
        <div class="col-10 col-sm-8 mx-auto">
          @php the_content() @endphp
      </div>
    </div>
  </div>
  <footer class="container">
    @if ( is_plugin_active( 'add-to-any/add-to-any.php' ) )
    <div class="position-fixed" style="z-index:9; top: 115px; top: calc( 50% - 72px ); right: 30px; filter: grayscale(50%);">
      {!! do_shortcode('[addtoany]') !!}
    </div>
    <style>
      .addtoany_shortcode > div {
        display: flex;
        flex-direction: column;
      }
    </style>
    @endif
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
  <!-- @ php comments_template('/partials/comments.blade.php') @ endphp -->
</article>

@include('partials.common.blog')

<script>
  jQuery(document).ready(function(){
    const image_src = jQuery('figure img').attr('src')
    jQuery('#bg_blur').css('background-image', 'url('+image_src+')')
  })
</script>