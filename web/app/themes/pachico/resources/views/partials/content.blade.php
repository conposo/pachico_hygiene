<article @php post_class() @endphp>
  <header>
    <h2 class="entry-title"><a href="{{ get_permalink() }}">{!! get_the_title() !!}</a></h2>
  </header>
  <div class="entry-summary">
    @php the_excerpt() @endphp
  </div>
  <div>
  <a class="btn btn-sm btn-outline-primary" href="{{ get_permalink() }}">
    see more
    <i class="fa fa-chevron-right"></i>
  </a>
  </div>
</article>
