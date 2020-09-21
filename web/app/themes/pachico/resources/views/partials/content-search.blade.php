<article @php post_class('mb-3 pt-3 border-top') @endphp>
  <header>
    <h2 class="entry-title">{!! get_the_title() !!}</h2>
    <!-- @ if (get_post_type() === 'post') -->
      <!-- @ include('partials/entry-meta') -->
    <!-- @ endif -->
  </header>
  <div class="entry-summary">
    @php the_excerpt() @endphp
  </div>
  <div class="see-more">
    <a class="text-uppercase btn btn-outline-primary btn-sm" href="{{ get_permalink() }}">
      виж повече
      <i class="fa fa-chevron-right"></i>
    </a>
  </div>
</article>
