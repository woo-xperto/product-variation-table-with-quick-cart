<?php
if ( ! defined( 'ABSPATH' ) ) exit;
class Quickvariables
{
    /**
     * Define Constant.
     *
     * @return void
     * @since 1.0.0
     *
     */
    public function __construct(){
        $variableSetting               = get_option('variable_all_checked', array());
        $quickCarouselPosition         = isset($variableSetting['quickCarouselPosition']) ? $variableSetting['quickCarouselPosition'] : 'woocommerce_after_shop_loop_item';
        $quickTablePosition            = isset($variableSetting['quickTablePosition']) ? $variableSetting['quickTablePosition'] : 'woocommerce_after_single_product_summary';


        add_action( $quickCarouselPosition, [$this,"quick_display_product_variations",]);
        add_action( $quickTablePosition, [ $this,"quick_variables_single_page",]);
    }

    /**
     * Get all variations of the variable products into shop page.
     *
     * @return void
     * @since 1.0.0
     */
    public function quick_display_product_variations()
    {
        require plugin_dir_path(__FILE__) . "/Templates/Variable-slider.php";

    }

    /**
     * Variations Table Single Product Page.
     *
     * @return void
     * @since 1.0.0
     */
    function quick_variables_single_page()
    {
        global $product;

        if (is_product() && $product->is_type('variable')) {
            $term_order = $this->get_product_term_order($product);

            // Localize the script with term order data
            wp_localize_script('frontend-js', 'productTermOrder', $term_order);

            require_once plugin_dir_path(__FILE__) . "/Templates/Variable-single-table.php";
        }
    }

    /**
     * Get the term order for product variations.
     *
     * @param WC_Product $product
     * @return array
     */
    private function get_product_term_order($product)
    {
        $term_order = [];

        $attributes = $product->get_attributes();

        foreach ($attributes as $attribute_name => $attribute) {
            if ($attribute->is_taxonomy()) {
                $terms = wc_get_product_terms($product->get_id(), $attribute_name, ['fields' => 'all']);
                foreach ($terms as $index => $term) {
                    $term_order[$attribute_name][$term->slug] = $index + 1;
                }
            }
        }
        return $term_order;
    }

    /**
     * Variations Slide Popup Product Page.
     *
     * @return void
     * @since 1.0.0
     */
    public function quickVariablePopup()
    {
        require plugin_dir_path(__FILE__) . "/Templates/Variable-popup.php";
    }

}

/**
 * Get all available variations for each term.
 *
 * @param WC_Product_Variable $product The product object.
 * @param string $attribute The attribute to filter variations by.
 * @return array
 * @since 1.0.0
 */
function get_available_variations_by_term($product, $attribute) {
    $available_variations = [];

    if ($product && $product instanceof WC_Product_Variable) {
        $variations = $product->get_available_variations();
        $attribute_terms = wc_get_product_terms($product->get_id(), $attribute, ['fields' => 'all']);

        foreach ($attribute_terms as $term) {
            $term_variations = [];

            foreach ($variations as $variation) {
                $attributes = $variation['attributes'];

                // Match specific attribute or any_* attribute
                if (
                    isset($attributes['attribute_' . $attribute]) &&
                    ($attributes['attribute_' . $attribute] === $term->slug ||
                        strpos($attributes['attribute_' . $attribute], 'any') === 0)
                ) {
                    $term_variations[] = $variation;
                }
            }

            $available_variations[$term->slug] = $term_variations;
        }
    }

    return $available_variations;
}