<? php
#-----------------------------------------------------------------#
# PSIc0h
#-----------------------------------------------------------------#
// -------------------- PSIc0h -------------------- console logging --------------------
function console_log( $data ){
  echo '<script>';
  echo 'console.log('. json_encode( $data ) .')';
  echo '</script>';
}

// -------------------- PSIc0h -------------------- Will remove just SKUs from product pages --------------------
//function psi_remove_product_page_skus($enabled) {
//    if (! is_admin() && is_product()) {
//        return false;
//    } else return $enabled;
// }
//add_filter('wc_product_sku_enabled', 'psi_remove_product_page_skus');

// -------------------- PSIc0h -------------------- Remove product categories and SKUs from product pages --------------------
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

// -------------------- PSIc0h -------------------- Adding image above every product page - MVP --------------------
function psi_image_above_product() {
	global $site_url;
	global $post;
	global $product;
	$site_url = site_url();
	if($post->post_type == 'product' && $post->ID == 4771 && is_product() == true) {
// -------------------- The Professional --------------------
		echo '<div id="psi_product_banner"><img src="'.$site_url.'/wp-content/uploads/2017/06/topbanner_theprofessional.jpg"></div>';
	} elseif ($post->post_type == 'product' && $post->ID == 4892 && is_product() == true) {
// -------------------- The Ace --------------------
		echo '<div id="psi_product_banner"><img src="'.$site_url.'/wp-content/uploads/2017/06/topbanner_theace.jpg"></div>';
// -------- keeping this line here in case I need to revert to background image code rather than a standard image -----
//		echo '<div class="row"><div class="row-bg-wrap"><div class="inner-wrap"><div class="row-bg using-image" id="psi_product_banner" style="background-image: //url(https://hollyandtanager.com/wp-content/uploads/2017/05/theacetop.jpg); background-position: center center; background-repeat: no-repeat;"></div></div></div></div>';
	} elseif ($post->post_type == 'product' && $post->ID == 4976 && is_product() == true) {
// -------------------- The Companion --------------------
		echo '<div id="psi_product_banner"><img src="'.$site_url.'/wp-content/uploads/2017/06/topbanner_thecompanion.jpg"></div>';
	} elseif ($post->post_type == 'product' && $post->ID == 4972 && is_product() == true) {
// -------------------- The Companion Mini  --------------------
		echo '<div id="psi_product_banner"><img src="'.$site_url.'/wp-content/uploads/2017/06/topbanner_companionmini.jpg"></div>';
	} elseif ($post->post_type == 'product' && $post->ID == 4960 && is_product() == true) {
// -------------------- The Champion --------------------
		echo '<div id="psi_product_banner"><img src="'.$site_url.'/wp-content/uploads/2017/06/topbanner_thechampion.jpg"></div>';
	} elseif ($post->post_type == 'product' && $post->ID == 4956 && is_product() == true) {
// -------------------- The Sidekick --------------------
		echo '<div id="psi_product_banner"><img src="'.$site_url.'/wp-content/uploads/2017/06/topbanner_thesidekick.jpg"></div>';
	} elseif ($post->post_type == 'product' && $post->ID == 4939 && is_product() == true) {
// -------------------- The Sidekick Mini --------------------
		echo '<div id="psi_product_banner"><img src="'.$site_url.'/wp-content/uploads/2017/06/topbanner_thesidekickmini.jpg"></div>';
	} elseif ($post->post_type == 'product' && $post->ID == 4999 && is_product() == true) {
// -------------------- The Specialist --------------------
		echo '<div id="psi_product_banner"><img src="'.$site_url.'/wp-content/uploads/2017/06/thespecialisttopbanner_web.jpg"></div>';
	} elseif ($post->post_type == 'product' && $post->ID == 7267 && is_product() == true) {
// -------------------- The Pro A/B --------------------
		echo '<div id="psi_product_banner"><img src="'.$site_url.'/wp-content/uploads/2017/08/pro_2_header.jpg"></div>';
	} else return;
}
add_action('woocommerce_before_main_content','psi_image_above_product');

// -------------------- PSIc0h -------------------- TESTING --------------------
function psi_testing() {
  global $post;
  global $product;
  console_log('---------- TESTING - $post ----------');
  console_log($post);
}
add_action('wp_footer','psi_testing');

// -------------------- PSIc0h -------------------- Holding container for 'product features/interior compartments fit' sections --------------------
function psi_product_features() {
	echo '<div id="psi_product_features"></div>';
}
add_action('woocommerce_share', 'psi_product_features');

// -------------------- PSIc0h -------------------- Main Shop - swatches --------------------
function psi_product_info_shop() {
	global $product;
	if ($product->product_type == 'variable') {
		foreach ($product->get_available_variations() as $key) {
		$psi_product_slug = $product->get_slug();
			foreach ( $key['attributes'] as $attr_name => $attr_value) {
				echo '<a href="/product/'.$psi_product_slug.'?attribute_pa_color='.$attr_value.'"><div class="psi_shop_swatches"><img src="'.$site_url.'/wp-content/uploads/2017/05/psi_swatch_'.$attr_value.'.jpg"></div></a>';
			}
		}
	}
}
add_action( 'woocommerce_after_shop_loop_item', 'psi_product_info_shop' );


// -------------------- PSIc0h -------------------- Remove Additional Information tab on product pages --------------------
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );
function woo_remove_product_tabs( $tabs ) {
    unset( $tabs['additional_information'] );  	// Remove the additional information tab
    return $tabs;
}

// -------------------- PSIc0h -------------------- Enqueueing custom scripts --------------------
function psi_load_scripts() {
	wp_enqueue_script( 'psi_scripts', get_template_directory_uri() . '/js/psi_scripts.js', array( 'jquery' ) );
}
add_action( 'wp_enqueue_scripts', 'psi_load_scripts' );

// -------------------- PSIc0h -------------------- removing related products --------------------
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );


?>
