<article @php post_class('position-relative mb-3 mb-sm-5 shadow-lg p-2') @endphp>
    <header class="position-relative mb-3 mb-sm-5">
      <figure class="mb-0" style="max-height: 450px; overflow: hidden;">
        {!! get_the_post_thumbnail(get_the_ID(), 'full', ['class' => 'w-100 h-auto']) !!}
        <caption>
          <span class="small text-uppercase bg-white pl-1 position-absolute" style="top: 0;right: 0;">{!! the_post_thumbnail_caption() !!}</span>
        </caption>
      </figure>
      <div class="position-absolute w-100 py-5 px-3 border-top" style="bottom: 0; background: rgb(255,255,255);
        background: linear-gradient(0deg, rgba(255,255,255,1) 0%, rgba(255,255,255,0.22032563025210083) 100%);">
          <h1 class="entry-title">{!! get_the_title() !!}</h1>
      </div>
    </header>
    <div class="entry-content px-3">
      @php the_excerpt() @endphp
    </div>
    <footer>
      {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
    </footer>

    <a href="{{get_permalink()}}" class="position-absolute w-100 h-100" style="top: 0;">
    </a>

</article>
