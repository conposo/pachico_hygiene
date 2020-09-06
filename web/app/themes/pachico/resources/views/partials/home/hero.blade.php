<?php

// dd( $hero );

?>
<div class="hero d-flex flex-column mb-5">
    
    <div class="carousel-images w-auto">
        <?php
        array_map(function($image_id){
            // dd($image_id);
            echo "<div>";
            echo wp_get_attachment_image($image_id['image'], 'full', '', ['class' => 'w-auto vh-100']);
            echo "</div>";
        }, $hero['images']);
        ?>
    </div>

    <div class="position-absolute d-flex justify-content-start align-items-center w-100">
        <div class="local_nav container">
            <h1>
                <span class="d-block d-sm-inline">{!! $hero['static_text'] !!}</span>
                <span class="type-it" data-headings="{!! $hero['headings'] !!}"></span>
            </h1>
            <a class="home-down bounce" href="#about"><i class="fa fa-angle-down"></i></a>
        </div>
    </div>

    <svg class="diagonal home-left" width="21%" height="170" viewBox="0 0 100 102" preserveAspectRatio="none"><path d="M0 100 L100 100 L0 10 Z"></path></svg>
    <svg class="diagonal home-right" width="80%" height="170" viewBox="0 0 100 102" preserveAspectRatio="none"><path d="M0 100 L100 100 L100 10 Z"></path></svg>

</div>
