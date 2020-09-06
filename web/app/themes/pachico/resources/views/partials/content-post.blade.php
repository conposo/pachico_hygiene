<article @php post_class('position-relative mb-3') @endphp>
    <header>
      <figure class="mb-0">
        {!! get_the_post_thumbnail(get_the_ID(), 'full', ['class' => 'w-100 h-auto']) !!}
        <caption>
          <span class="small text-uppercase">{!! wp_get_attachment_caption() !!}</span>
        </caption>
      </figure>
      <h1 class="entry-title">{!! get_the_title() !!}</h1>
    </header>
    <div class="entry-content">
      @php the_excerpt() @endphp
    </div>
    <footer>
      {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
    </footer>
  <a href="{{get_permalink()}}" class="position-absolute w-100 h-100" style="top: 0;">
  </a>
</article>
