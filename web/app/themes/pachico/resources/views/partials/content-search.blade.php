<article @php post_class('position-relative mb-2 pt-1 border-top') @endphp>
@php
// var_dump( get_post_type() );
@endphp
  <header>
    <h2 class="entry-title ml-0">{!! get_the_title() !!}</h2>
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
  <span class="position-absolute text-uppercase small" style="top: 15px; right: 5px;">
    @if( get_post_type() == 'product' )
      продукт
      <i class="fas fa-store"></i>
    @else
      от блога
      <i class="fas fa-bookmark" style="font-size: 14px;"></i>
    @endif
  </span>
</article>
