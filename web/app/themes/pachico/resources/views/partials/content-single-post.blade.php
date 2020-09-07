<article @php post_class('mb-5') @endphp>
  <header class="position-relative">
    <figure class="mb-0">
      {!! get_the_post_thumbnail(get_the_ID(), 'full', ['class' => 'w-100 h-auto']) !!}
      <caption>
        <span class="small text-uppercase">{!! wp_get_attachment_caption() !!}</span>
      </caption>
    </figure>
    <div class="position-absolute w-100 py-5 border-top" style="bottom: 0; background: rgb(255,255,255);
      background: linear-gradient(0deg, rgba(255,255,255,1) 0%, rgba(255,255,255,0.22032563025210083) 100%);">
      <div class="container">
        <div class="row">
          <div class="col-2">
          </div>
          <div class="col-8">
            <h1 class="entry-title">{!! get_the_title() !!}</h1>
          </div>
        </div>
      </div>
    </div>
  </header>
  <div class="entry-content container">
    <div class="row">
      <div class="col-2">
      </div>
      <div class="col-8">
        @php the_content() @endphp
      </div>
    </div>
  </div>
  <footer class="container">
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
  <!-- @ php comments_template('/partials/comments.blade.php') @ endphp -->
</article>

@include('partials.common.blog')
