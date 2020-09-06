<?php
// dd( $about_us );
?>

<section id="about" class="d-flex flex-column justify-content-center mb-5">

    <div class="about container d-md-flex">
        <figure class="">{!! wp_get_attachment_image($about_us['image'], 'full', '', ['class' => 'position-relative w-100 h-auto']) !!}</figure>
        <div class="">
            <span class="title d-inline-block mb-3">{!! $about_us['header'] !!}</span>
            {!! $about_us['text'] !!}
            <a href="{!! $about_us['cta'] !!}" class="btn btn-sm btn-outline-primary text-uppercase">{!! $about_us['cta_label'] !!}</a>
        </div>
    </div>

</section>