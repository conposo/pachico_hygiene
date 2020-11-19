{{--
  Template Name: Export Products Template
--}}

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    
    <?php  
    $args = array(
        'post_type'      => 'product',
        'posts_per_page' => -1,
    );

    $loop = new WP_Query( $args );

    while ( $loop->have_posts() ) : $loop->the_post();
        global $product;
        echo '<div class=product>';
        
        echo '<span class=title>' . get_the_title() . '</span>';
        echo '<span class=content>' . get_the_content() . '</span>';
        // echo get_the_title() . ', ';
        // echo get_the_content() . ', ';
        
        echo '<span class="d-block mb-3"></span>';

        echo '</div>';
        // echo esc_html(get_the_content()).', ';
        // echo '<a class="d-block border-bottom" href="'.get_permalink().'">'.get_the_title().'</a>';
        ?>



        <div id="product-<?php the_ID(); ?>" <?php wc_product_class( 'bg-light my-6', $product ); ?>>

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
                
              </div>
            </div>
          </div>

          <div id="see_more" class="row">

            <div class="col-12 col-sm-6 my-3 my-sm-6">
              <!-- {!! var_dump($product_description) !!} -->
              <div class="no_accordion" id="accordionExample">
                <div class="p-2 shadow">
                  <div class="d-flex justify-content-between align-items-center cursor-pointer text-uppercase small text-black" id="collapse_one"
                    onclick="jQuery('#accordionExample i').addClass('fa-plus'); jQuery('#collapse_one').find('i').removeClass('fa-plus').addClass('fa-minus')"
                    data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    <span class="">Приложение и препоръки</span>
                    <i class="fa fa-minus"></i>
                  </div>
                  <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                    @if($product_description['application'])
                      <div class="bg-light shadow-sm my-2 p-1">
                        <span class="mb-1 d-block text-dark font-weight-bold text-uppercase small">Приложение на продукта:</span>
                        {!! $product_description['application'] !!}
                      </div>
                    @endif
                    @if($product_description['recommendations'])
                      <div class="bg-light shadow-sm my-2 p-1">
                        <span class="mb-1 d-block text-dark font-weight-bold text-uppercase small">Препоръки за употреба:</span>
                        {!! $product_description['recommendations'] !!}
                      </div>
                    @endif
                    @if($product_description['suitable_for'])
                      <div class="bg-light shadow-sm my-2 p-1">
                        <span class="mb-1 d-block text-dark font-weight-bold text-uppercase small">Подходящ за:</span>
                        {!! $product_description['suitable_for'] !!}
                      </div>
                    @endif
                    @if($product_description['packages'])
                      <div class="bg-light shadow-sm my-2 p-1">
                        <span class="mb-1 d-block text-dark font-weight-bold text-uppercase small">Разфасовки:</span>
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
                        <span class="mb-1 d-block text-dark font-weight-bold text-uppercase small">Технически характеристики:</span>
                        {!! $product_description['technical_characteristics'] !!}
                      </div>
                    @endif
                    @if( $product_description['danger_warnings'] )
                      <div class="bg-light shadow-sm my-2 p-1">
                        <span class="mb-1 d-block text-dark font-weight-bold text-uppercase small">Предупреждения за опасност:</span>
                        {!! $product_description['danger_warnings'] !!}
                      </div>
                    @endif
                    @if( $product_description['safety_recommendations'] )
                      <div class="bg-light shadow-sm my-2 p-1">
                        <span class="mb-1 d-block text-dark font-weight-bold text-uppercase small">Препоръки за безопасност:</span>
                        {!! $product_description['safety_recommendations'] !!}
                      </div>
                    @endif
                    @if( $product_description['expiry_date'] )
                      <div class="bg-light shadow-sm my-2 p-1">
                        <span class="mb-1 d-block text-dark font-weight-bold text-uppercase small">Срок на годност:</span>
                        {!! $product_description['expiry_date'] !!}
                      </div>
                    @endif
                    
                  </div>
                </div>
              </div>
            </div>

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



        <?php
    endwhile;

    wp_reset_query();
    ?>
