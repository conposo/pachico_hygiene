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
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( 'my-6', $product ); ?>>

	<div class="d-flex shadow-lg my-6 p-3"><!-- above the fold wrapper -->
		<div class="w-50">
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

		<style>
			figure img {
				width: 100%;
			}
		</style>
		<div class="summary entry-summary w-50">
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
			?>
			@if($pictograms)
				<div class="d-flex">
				@foreach($pictograms as $pictogram)
					<div style="width:20px;">{!! $pictogram !!}</div>
				@endforeach
				</div>
			@else
				no pictograms
			@endif
		</div>
	</div>

	<div class="shadow-lg my-6 p-3">
		<div class="shadow-sm p-1">
			<iframe src="https://www.youtube.com/embed/{!! $video !!}" frameborder="0"></iframe>
		</div>
		<div class="shadow-sm p-1">
		@if($files)
			@foreach($files as $file)
				{{ var_dump($file) }}
			@endforeach
		@else
			no added files
		@endif
		</div>
	</div>

	<div class="shadow-lg my-6 p-3">
		<!-- {!! var_dump($product_description) !!} -->

		<div class="no_accordion" id="accordionExample">
			<div class="mb-3">
				<div class="border-bottom d-flex justify-content-between cursor-pointer text-uppercase small text-black" id="collapse_one" onclick="jQuery('i').addClass('fa-plus'); jQuery('#collapse_one').find('i').removeClass('fa-plus').addClass('fa-minus')" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
					<span class="">Application and recommendations</span>
					<i class="fa fa-minus"></i>
				</div>
				<div id="collapseOne" class="collapse show" data-parent="#accordionExample">
					<div class="bg-light shadow-sm my-2 p-1">
						<span class="mb-1 d-block border-bottom text-dark font-weight-bold text-uppercase small">application</span>
						{!! $product_description['application'] !!}
					</div>
					<div class="bg-light shadow-sm my-2 p-1">
						<span class="mb-1 d-block border-bottom text-dark font-weight-bold text-uppercase small">recommendations</span>
						{!! $product_description['recommendations'] !!}
					</div>
					<div class="bg-light shadow-sm my-2 p-1">
						<span class="mb-1 d-block border-bottom text-dark font-weight-bold text-uppercase small">suitable for</span>
						{!! $product_description['suitable_for'] !!}
					</div>
					<div class="bg-light shadow-sm my-2 p-1">
						<span class="mb-1 d-block border-bottom text-dark font-weight-bold text-uppercase small">packages</span>
						{!! $product_description['packages'] !!}
					</div>
				</div>
			</div>
			<div class="mb-3">
				<div class="border-bottom d-flex justify-content-between cursor-pointer text-uppercase small text-black" id="collapse_two" onclick="jQuery('i').addClass('fa-plus'); jQuery('#collapse_two').find('i').removeClass('fa-plus').addClass('fa-minus')" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
					<span class="">Technical data</span>
					<i class="fa fa-plus"></i>
				</div>
				<div id="collapseTwo" class="collapse" data-parent="#accordionExample">
					<div class="bg-light shadow-sm my-2 p-1">
						<span class="mb-1 d-block border-bottom text-dark font-weight-bold text-uppercase small">technical characteristics</span>
						{!! $product_description['technical_characteristics'] !!}
					</div>
					<div class="bg-light shadow-sm my-2 p-1">
						<span class="mb-1 d-block border-bottom text-dark font-weight-bold text-uppercase small">safety</span>
						{!! $product_description['safety_recommendations'] !!}
					</div>
					<div class="bg-light shadow-sm my-2 p-1">
						<span class="mb-1 d-block border-bottom text-dark font-weight-bold text-uppercase small">expiry_date</span>
						{!! $product_description['expiry_date'] !!}
					</div>
					<div class="">
					@if($product_description['pictograms'])
						<div class="d-flex">
						@foreach($product_description['pictograms'] as $pictogram)
							<div class="mr-1" style="width:20px;">{!! $pictogram !!}</div>
						@endforeach
						</div>
					@else
						no pictograms
					@endif
					</div>	
				</div>
			</div>
		</div>

	</div>



	<div class="shadow-lg my-6 p-3" id="make_inquiere">
		<!--  -->
		<h3 class="text-uppercase small">make an inquiry</h3>
		<form action="">
			<input type="text">
			<input type="text">
			<input type="text">
		</form>
	</div>



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
