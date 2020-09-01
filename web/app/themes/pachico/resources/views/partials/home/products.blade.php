<?php

// dd( $about_us );

?>

<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>

<section id="products" class="container vh-100 d-flex flex-column justify-content-center">

    <div class="button-group filter-button-group">
        <button class="d-inline-block shadow-sm border-0 bg-primary text-white rounded py-1 px-2 text-uppercase" data-filter="*">show all</button>
        @foreach($product_groups as $group)
            <button class="d-inline-block shadow-sm border-0 bg-primary text-white rounded py-1 px-2 text-uppercase" data-filter=".{{ str_replace(' ', '', $group['label']) }}">{{ $group['label'] }}</button>
        @endforeach
    </div>

    <div class="grid products d-flex">
        @foreach($product_groups as $group)
            @foreach($group['items'] as $item) 
            <div class="grid-item {{ str_replace(' ', '', $group['label']) }} p-3">
                <div class="position-relative">
                    <img src="{{ $item['product_image'] }}" alt="" class="w-100">
                    <div class="blurred position-absolute">
                        <img src="{{ $item['product_image'] }}" alt="" class="w-100">
                        <span class="product_title position-absolute w-100 text-center">
                            <span class="d-block text-uppercase small">{{ $group['label'] }}</span>
                            <span class="text-dark">{{ $item['product'] }}</span>
                        </span>
                    </div>
                </div>
            </div>
            @endforeach
        @endforeach
    </div>

</section>

<style>
</style>

<script>
    var $grid = jQuery('.grid').isotope({
        // options
        filter: '.HORECA',
        itemSelector: '.grid-item',
        layoutMode: 'fitRows'
    });

    // filter items on button click
    jQuery('.filter-button-group').on( 'click', 'button', function() {
        var filterValue = jQuery(this).attr('data-filter');
        $grid.isotope({ filter: filterValue });
    });
</script>