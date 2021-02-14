
@if( $host[0] == 'en' )
	@php
	$text_modal_title = 'Search';
	@endphp
@elseif( $host[0] == 'de' )
	@php
	$text_modal_title = 'Suche auf unserer Internetseite';
	@endphp
@else
	@php
	$text_modal_title = 'Търсете в сайта';
	@endphp
@endif

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content border-0 rounded-0 bg-white">
      <div class="modal-header rounded-0" style="background-color: #006daf;">
        <h5 class="modal-title text-white" id="exampleModalLabel">{{$text_modal_title}}</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body pb-5">
        <div class="search d-flex justify-content-center py-5">
          {!! get_search_form(false) !!}
        </div>
        <div class="d-none see_here -d-flex justify-content-center">
          <a class="btn btn-white btn-sm" href="http://localhost/clients/pachico/hygiene/web/contact-us/">
          <span class="d-block text-center">
            <i style="font-size: 24px;" class="far fa-address-book"></i>
          </span>
          Contact Us</a>
          <a class="mx-3 btn btn-white btn-sm" href="http://localhost/clients/pachico/hygiene/web/faq/">
          <span class="d-block text-center">
            <i style="font-size: 24px;" class="far fa-question-circle"></i>
          </span>
          FAQ</a>
          <a class="btn btn-white btn-sm" href="http://localhost/clients/pachico/hygiene/web/about-us/" aria-current="page">
          <span class="d-block text-center">
            <i style="font-size: 24px;" class="far fa-building"></i>
          </span>
          About Us</a>
        </div>
      </div>
      <!-- <div class="modal-footer">
        <div class="w-100 d-flex justify-content-between small">
          <div class="d-flex">
            <p class="m-0">Copyright © 2020 PaChico Inc. All rights reserved.</p>
            /
            <a class="mx-1" href="#">Terms & Conditions</a>
            /
            <a class="mx-1" href="#">Privacy policy</a>
            /
            <a class="mx-1" href="#">Sitemap</a>
          </div>
        </div>
      </div> -->
    </div>
  </div>
</div>