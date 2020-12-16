<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>

@if( $host[0] == 'de' )
	@php
	$text_make_inquiry = 'MACHE EINE ANFRAGE';
	$text_download_files = 'DATEIEN HERUNTERLADEN';
	$text_application_and_recommendations = 'ANWENDUNG UND EMPFEHLUNGEN';

	$text_product_description_application = 'ANWENDUNG DES PRODUKTS:';
	$text_product_description_recommendations = 'EMPFEHLUNGEN FÜR DEN GEBRAUCH:';
	$text_product_description_suitable_for = 'GEEIGNET FÜR:';
	$text_product_description_packages = 'VERPACKUNGEN:';
	
	$text_product_description_technical_characteristics = 'TECHNISCHE DATEN:';
	$text_product_description_danger_warnings = 'GEFAHRENWARNUNGEN:';
	$text_product_description_safety_recommendations = 'SICHERHEITSEMPFEHLUNGEN:';
	$text_product_description_expiry_date = 'HALTBARKEITSDAUER:';
	@endphp
@else
	@php
	$text_make_inquiry = 'направи запитване';
	$text_download_files = 'изтегли файлове';
	$text_application_and_recommendations = 'Приложение и препоръки';

	$text_product_description_application = 'Приложение на продукта:';
	$text_product_description_recommendations = 'Препоръки за употреба:';
	$text_product_description_suitable_for = 'Подходящ за:';
	$text_product_description_packages = 'Разфасовки:';

	$text_product_description_technical_characteristics = 'Технически характеристики:';
	$text_product_description_danger_warnings = 'Предупреждения за опасност:';
	$text_product_description_safety_recommendations = 'Препоръки за безопасност:';
	$text_product_description_expiry_date = 'Срок на годност:';
	@endphp
@endif
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( 'my-6', $product ); ?>>

	<style>
		div#product-<?php the_ID(); ?> ul.products {
			display: flex;
			flex-wrap: wrap;
			list-style: none;
			padding: 0;
		}
	</style>
	<div class="row my-3 my-sm-6 p-3"><!-- above the fold wrapper -->
		<div class="col-12 col-sm-6">
			<?php
			/**
			 * Hook: woocommerce_before_single_product_summary.
			 *
			 * @hooked woocommerce_show_product_sale_flash - 10
			 * @hooked woocommerce_show_product_images - 20
			 */
			do_action( 'woocommerce_before_single_product_summary' );
			?>
		</div>

		<div class="summary entry-summary col-12 col-sm-6 d-flex flex-column justify-content-between">
			<div class="d-flex flex-column flex-fill justify-content-between">
				<div class="local_nav d-flex flex-column flex-fill justify-content-center mb-3 mb-sm-0">
					<?php
					/**
					 * Hook: woocommerce_single_product_summary.
					 *
					 * @hooked woocommerce_template_single_title - 5
					 * @hooked woocommerce_template_single_rating - 10
					 * @hooked woocommerce_template_single_price - 10
					 * @hooked woocommerce_template_single_excerpt - 20
					 * @hooked woocommerce_template_single_add_to_cart - 30
					 * @hooked woocommerce_template_single_meta - 40
					 * @hooked woocommerce_template_single_sharing - 50
					 * @hooked WC_Structured_Data::generate_product_data() - 60
					 */
					do_action( 'woocommerce_single_product_summary' );
					// <a href="#see_more" class="see_more"> виж повече <i class="fas fa-chevron-right"></i> </a>
					?>
				</div>
				@if($pictograms)
					<div class="d-flex mb-3 p-1">
					@foreach($pictograms as $pictogram)
						<div class="mr-2" style="width:25px;">{!! $pictogram !!}</div>
					@endforeach
					</div>
				@else
					<!-- no pictograms -->
				@endif
			</div>
			<div id="cta_make_inquiry" class="local_nav position-relative">
				<a href="#make_inquiry" class="position-absolute w-100 btn btn-sm btn-outline-dark text-uppercase rounded-0">{{$text_make_inquiry}}</a>
			</div>
		</div>
	</div>

	<div id="see_more" class="row">

		<div class="col-12 col-sm-6 d-flex my-3 my-sm-6">
			<div class="w-100 p-2 shadow-lg">
				<div class="mb-2">
					<iframe src="https://www.youtube.com/embed/{!! $video !!}" frameborder="0"></iframe>
				</div>
				@if($files)
					<div class="">
					<spam class="d-block text-uppercase small">
					{{$text_download_files}}
					</spam>
					@foreach($files as $file)
						@php
						$file = $file['file'];
						@endphp
						@if($file['mime_type'] == "application/pdf")
							<a href="{{ $file['url'] }}" download="{{ $file['title'] }}">{{ $file['title'] }}</a>
						@endif
					@endforeach
					</div>
				@else
					<!-- no added files -->
				@endif
			</div>
		</div>

		<div class="col-12 col-sm-6 my-3 my-sm-6">
			<!-- {!! var_dump($product_description) !!} -->
			<div class="no_accordion" id="accordionExample">
				<div class="p-2 shadow">
					<div class="d-flex justify-content-between align-items-center cursor-pointer text-uppercase small text-black" id="collapse_one"
						onclick="jQuery('#accordionExample i').addClass('fa-plus'); jQuery('#collapse_one').find('i').removeClass('fa-plus').addClass('fa-minus')"
						data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
							<span class="">{{$text_application_and_recommendations}}</span>
						<i class="fa fa-minus"></i>
					</div>
					<div id="collapseOne" class="collapse show" data-parent="#accordionExample">
						@if($product_description['application'])
							<div class="bg-light shadow-sm my-2 p-1">
								<span class="mb-1 d-block text-dark font-weight-bold text-uppercase small">{{$text_product_description_application}}</span>
								{!! $product_description['application'] !!}
							</div>
						@endif
						@if($product_description['recommendations'])
							<div class="bg-light shadow-sm my-2 p-1">
								<span class="mb-1 d-block text-dark font-weight-bold text-uppercase small">{{$text_product_description_recommendations}}</span>
								{!! $product_description['recommendations'] !!}
							</div>
						@endif
						@if($product_description['suitable_for'])
							<div class="bg-light shadow-sm my-2 p-1">
								<span class="mb-1 d-block text-dark font-weight-bold text-uppercase small">{{$text_product_description_suitable_for}}</span>
								{!! $product_description['suitable_for'] !!}
							</div>
						@endif
						@if($product_description['packages'])
							<div class="bg-light shadow-sm my-2 p-1">
								<span class="mb-1 d-block text-dark font-weight-bold text-uppercase small">{{$text_product_description_packages}}</span>
								{!! $product_description['packages'] !!}
							</div>
						@endif
					</div>
				</div>
				<div class="p-2 shadow">
					<div class="d-flex justify-content-between align-items-center cursor-pointer text-uppercase small text-black" id="collapse_two"
					onclick="jQuery('#accordionExample i').addClass('fa-plus'); jQuery('#collapse_two').find('i').removeClass('fa-plus').addClass('fa-minus')"
					data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
						<span class="">Технически данни</span>
						<i class="fa fa-plus"></i>
					</div>
					<div id="collapseTwo" class="collapse" data-parent="#accordionExample">
						@if( $product_description['technical_characteristics'] )
							<div class="bg-light shadow-sm my-2 p-1">
								<span class="mb-1 d-block text-dark font-weight-bold text-uppercase small">{{$text_product_description_technical_characteristics}}</span>
								{!! $product_description['technical_characteristics'] !!}
							</div>
						@endif
						@if( $product_description['danger_warnings'] )
							<div class="bg-light shadow-sm my-2 p-1">
								<span class="mb-1 d-block text-dark font-weight-bold text-uppercase small">{{$text_product_description_danger_warnings}}</span>
								{!! $product_description['danger_warnings'] !!}
							</div>
						@endif
						@if( $product_description['safety_recommendations'] )
							<div class="bg-light shadow-sm my-2 p-1">
								<span class="mb-1 d-block text-dark font-weight-bold text-uppercase small">{{$text_product_description_safety_recommendations}}</span>
								{!! $product_description['safety_recommendations'] !!}
							</div>
						@endif
						@if( $product_description['expiry_date'] )
							<div class="bg-light shadow-sm my-2 p-1">
								<span class="mb-1 d-block text-dark font-weight-bold text-uppercase small">{{$text_product_description_expiry_date}}</span>
								{!! $product_description['expiry_date'] !!}
							</div>
						@endif
						<div class="">
						@if($product_description['pictograms'])
							<div class="d-flex">
							@foreach($product_description['pictograms'] as $pictogram)
								<div class="mr-1" style="width:20px;">{!! $pictogram !!}</div>
							@endforeach
							</div>
						@else
							<!-- no pictograms -->
						@endif
						</div>	
					</div>
				</div>
			</div>
		</div>

	</div>


	<div id="make_inquiry" class="position-relative shadow-lg my-3 px-1 pt-5 px-sm-3">
		<h3 class="position-absolute w-100 py-1 px-2 text-uppercase small" style="border-bottom: 1px solid #bfc3c8;">{{$text_make_inquiry}}</h3>
		{!! do_shortcode('[formidable id=2]') !!}
		<img src="@asset('images/logo-pachico.png')" class="position-absolute">
	</div>

	<script>
		jQuery(document).ready(function(){
			hidden_input_id = jQuery('.frm_fields_container > div+input[type=hidden]').attr('id');
			jQuery('input#'+hidden_input_id).val('<a href="{{get_permalink()}}" target="_blank">'+jQuery('h1').text()+'</a>')
		})
	</script>


	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	?>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
