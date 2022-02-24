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

  $term_slugs   = array('for-all', 'for-her', 'for-him','blouse-shirts-for-her', 'coats', 'dresses');
  $taxonomy     = "product_cat";

?>
<div class="slick-container">
  <?
  foreach ( $term_slugs as $term_slug ):
      $term   = get_term_by( 'slug', $term_slug, $taxonomy );
      if( $term ):
          $term_link   = get_term_link( $term, $taxonomy );
          $thumb_id    = get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true );
          $img_src     = wp_get_attachment_url( $thumb_id );
  ///
  ?>
<!-- -->

          <div>


            <a href="<?php echo $term_link; ?>"><?php echo $term->name; ?>  <img src="<?php echo $img_src; ?>" alt="" width="30%" /></a>


          </div>

        <?php endif;endforeach;
        ?>

      </div>
<?php }
?>
