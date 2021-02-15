<?php
// dd( $about_us );
?>

<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>

<section id="products" class="container d-flex flex-column justify-content-center mb-5">

    <div class="button-group filter-button-group d-flex justify-content-between justify-content-sm-center mb-3 py-3" style="overflow: auto;">
        <!-- <button class="d-inline-block shadow py-1 px-1 px-sm-2 text-uppercase" data-filter="*">всички</button> -->
        @foreach($product_groups as $group)
            <button class="mx-2 d-inline-block shadow py-sm-1 px-1 px-sm-2 text-uppercase" data-filter=".{{ str_replace(' ', '', $group['label']) }}">{{ $group['label'] }}</button>
        @endforeach
    </div>

    <div class="grid products d-flex">
        @foreach($product_groups as $group)
            @if( $group['items'] )
                @php
                $category = $group['category'];
                $category_image_id = $group['category_image'];
                // dd($category);
                $count = 0;
                @endphp
                @foreach($group['items'] as $item)
                    @php
                    $product_image_id = $item['product'];
                    // dd($product_image_id);
                    $count++;
                    @endphp
                    <div class="grid-item {{ str_replace(' ', '', $group['label']) }} mb-2 px-1 px-lg-3">
                        <a href="{!! get_permalink($product_image_id) !!}" class="position-relative d-block">
                            <div class="position-relative">
                                {!! get_the_post_thumbnail($product_image_id, 'full', ['class' => 'w-100 h-auto']) !!}
                                <div class="blurred position-absolute">
                                    {!! get_the_post_thumbnail($product_image_id, 'thumbnail', ['class' => 'w-100 h-auto']) !!}
                                    <span class="product_title position-absolute w-100 text-center">
                                        <span class="d-block text-uppercase small">{{ $group['label'] }}</span>
                                        <span class="text-dark">{!! get_the_title($product_image_id) !!}</span>
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                    @if($count == count($group['items']))
                    <div class="grid-item {{ str_replace(' ', '', $group['label']) }} mb-2 px-1 px-lg-3">
                        <a href="{!! get_term_link($category) !!}" class="position-relative d-block">
                            <div class="position-relative">
                                {!! wp_get_attachment_image($category_image_id, 'thumbnail', '', ['class' => 'w-100 h-auto']) !!}
                                <div class="blurred position-absolute">
                                    {!! wp_get_attachment_image($category_image_id, 'thumbnail', '', ['class' => 'w-100 h-auto']) !!}
                                    <span class="product_title position-absolute w-100 text-center">
                                        <span class="d-block text-uppercase small">{{ $group['label'] }}</span>
                                        @if( $host[0] == 'en' )
                                            <span class="text-dark text-uppercase small">See more</span>
                                        @elseif( $host[0] == 'de' )
                                            <!-- <span class="text-dark text-uppercase small">Mehr sehen</span> -->
                                        @else
                                            <span class="text-dark text-uppercase small">виж повече</span>
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endif
                @endforeach
            @endif
        @endforeach
    </div>

</section>

<style>
</style>

<script>

$(document).ready(function() {
    jQuery('.filter-button-group > button:nth-child(1)').addClass('focus')
});

    var $grid = jQuery('.grid').isotope({
        // options
        filter: '.HORECA',
        itemSelector: '.grid-item',
        layoutMode: 'fitRows'
    });

    // filter items on button click
    jQuery('.filter-button-group').on( 'click', 'button', function() {
        jQuery('.filter-button-group > button').removeClass('focus')
        jQuery(this).addClass('focus')
        var filterValue = jQuery(this).attr('data-filter');
        $grid.isotope({ filter: filterValue });
    });
</script>