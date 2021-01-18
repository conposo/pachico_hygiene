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
      @if( $host[0] == 'en' )
        See more
      @elseif( $host[0] == 'de' )
        Mehr sehen
      @else
        Виж повече
      @endif
      <i class="fa fa-chevron-right"></i>
    </a>
  </div>
  <span class="position-absolute text-uppercase small" style="top: 15px; right: 5px;">
    @if( get_post_type() == 'product' )
      @if( $host[0] == 'en' )
        product
      @elseif( $host[0] == 'de' )
        Produkt
      @else
        продукт
      @endif
      <i class="fas fa-store"></i>
    @else
      @if( $host[0] == 'en' )
        Blog post
      @elseif( $host[0] == 'de' )
        Von dem Blog
      @else
        от блога
      @endif
      <i class="fas fa-bookmark" style="font-size: 14px;"></i>
    @endif
  </span>
</article>
