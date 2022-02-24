<?php
/**
* Plugin Name: WC Category Rotator
*
* @package PluginPackage
* @author Kostas Mavrokefalos
* @copyright 2022 Solomon Designs
* @license GPL-2.0-or-later
*
* @wordpress-plugin
* Plugin Name: Woocommerce category rotator
* Description: Displays Woocommerce Categories
* Version: 1.0.0
* Author: Kostas Mavrokefalos
* Author URI: https://solomondesigns.co.uk
* Text Domain: woocommerce-category-rotator
* License: GPL v2 or later
* License URI: http://www.gnu.org/licenses/gpl-2.0.txt
* Update URI: https://example.com/my-plugin/
*/


wp_enqueue_style( 'slider-styles', get_template_directory_uri() . '../../../plugins/woocommerce-category-rotator/styles.css',false,'1.1','all');

wp_enqueue_style( 'slick-styles', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css',false,'1.1','all');

wp_enqueue_script('slickjs', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array(), '1.0.0', 'true' );

wp_enqueue_script('interactions',get_template_directory_uri() . '../../../plugins/woocommerce-category-rotator/interactions.js', array(), '1.0.0', 'true' );
////////////////////////////////

// WooCommerce – display category image on category archive


////////////////////////////


add_shortcode('sd-cat-rot','rotatorFunction');

function rotatorFunction(){
  $term_slug    = 'for-all';
  $taxonomy     = 'product_cat';
  $term_id      = get_term_by( 'slug', $term_slug, $taxonomy )->term_id;
  $thumbnail_id = get_woocommerce_term_meta( $term_id, 'thumbnail_id', true );
  $image        = wp_get_attachment_url( $thumbnail_id );
  ////
  $term_slugb    = 'for-him';
  $term_id_b      = get_term_by( 'slug', $term_slugb, $taxonomy )->term_id;
  $thumbnail_id_b = get_woocommerce_term_meta( $term_id_b, 'thumbnail_id', true );
  $imageb        = wp_get_attachment_url( $thumbnail_id_b );
  ///
  $term_slugc    = 'for-her';
  $term_id_c      = get_term_by( 'slug', $term_slugc, $taxonomy )->term_id;
  $thumbnail_id_c = get_woocommerce_term_meta( $term_id_c, 'thumbnail_id', true );
  $imagec       = wp_get_attachment_url( $thumbnail_id_c );
  ///
  ?>
<!-- -->
<div class="slick-container">
        <div><?php echo '<img src="'.$image.'" alt="" width="250" height="350" />'; ?></div>
        <div><?php echo '<img src="'.$imageb.'" alt="" width="250" height="350" />'; ?></div>
        <div><?php echo '<img src="'.$imagec.'" alt="" width="250" height="350" />'; ?></div>
        </div>
  <?php
}


?>
