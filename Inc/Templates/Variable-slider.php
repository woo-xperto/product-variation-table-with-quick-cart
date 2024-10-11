<?php
$variableSetting = get_option('variable_all_checked', array());
$quickCarouselAutoplay = isset($variableSetting['quickCarouselAutoplay']) ? $variableSetting['quickCarouselAutoplay'] : 'true';
global $product;
if (isset($product) && $product->is_type("variable"))
{

    //Collect Variable Product details
    $this->quickVariablePopup(); ?>
        <div class="quick-variable-slide" data-autoplay="<?php echo esc_attr($quickCarouselAutoplay); ?>" ><?php
    //$variations = $product->get_children();
    $variations = $product->get_available_variations();
    $attributesName = $product->get_attributes();
    $variationsList = [];
    foreach ($attributesName as $key => $attribute)
    {
        // Access the protected data property to get attribute value
        $reflection = new ReflectionClass($attribute);
        $dataProperty = $reflection->getProperty("data");
        $dataProperty->setAccessible(true);
        $data = $dataProperty->getValue($attribute);

        if (taxonomy_exists($key) && $data["variation"] == "1")
        {
            $taxonomy = get_taxonomy($key);
            $label = str_replace("Product ", "", $taxonomy->label);
            $variationsList[ucfirst($label) ] = "";
        }
        elseif ($key && $data["variation"] == "1")
        {
            $variationsList[ucfirst($key) ] = "";
        }
    }

    $variationData = array();
    foreach ($variations as $var)
    {
        $variation_id = $var['variation_id'];
        $variation = new WC_Product_Variation($variation_id);
        $variation_stock_quantity = $variation->get_stock_quantity();
        $attributes = $variation->get_variation_attributes();
        $index = 0;

        foreach ($attributes as $attr_value)
        {
            $keys = array_keys($variationsList);
            if (isset($keys[$index]))
            {
                $variationsList[$keys[$index]] = $attr_value;
            }
            $index++;
        }

        // Get variation price
        $price_html = $variation->get_price_html();
        // Get variation thumbnail image URL
        $thumbnail_id = $variation->get_image_id();
        $thumbnail_url = wp_get_attachment_image_src($thumbnail_id, "thumbnail");
        $thumbnail_url = $thumbnail_url ? $thumbnail_url[0] : "";
        $variableSetting = get_option("variable_all_checked", []);
        $variableHoverClick = isset($variableSetting["hoverClickValue"][0]) ? $variableSetting["hoverClickValue"][0] : "";
        $variationData = ["name" => $product->get_name(),"product_id" => $product->get_id() , "excerpt" => $product->get_short_description(),"variableClickHover"=>$variableHoverClick,"variationPrice"=> $price_html,"variationId"=>$variation_id,"variationQuantity"=> $variation_stock_quantity];
        
        ?>
            <div class="quick-slide-variable" data-variation="<?php echo esc_attr(wp_json_encode($variationData, true)); ?>" data-variationsList="<?php echo esc_attr(wp_json_encode($variationsList)); ?>">
                <?php if ($thumbnail_url): ?>
                    <img src="<?php echo esc_url($thumbnail_url); ?>" alt="Variation Image">
                <?php endif; ?>
            </div>
        <?php } ?>
    </div>
<?php
}