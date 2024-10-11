<?php
global $product;
if (isset($product) && $product->is_type("variable"))
{ ?>
<table id="quick-variable-table">
<tr>
<th>Image</th>
<?php
    $variations = $product->get_available_variations();
    $attributes = $product->get_attributes();

    foreach ($attributes as $key => $attribute)
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
            echo "<th>" . esc_html(ucfirst($label)) . "</th>";
        }
        elseif ($key && $data["variation"] == "1")
        {
            echo "<th>" . esc_html(ucfirst($key)) . "</th>";
        }
    }
}
?>
<th>Price</th>
<th>Quantity</th>
<th>Action</th>
</tr>

<?php foreach ($variations as $var)
{
    $variation_id = $var['variation_id']; 
    $variation = new WC_Product_Variation($variation_id);

    $variation_stock_quantity = $variation->get_stock_quantity();
    $attributes = $variation->get_variation_attributes();

    // Get variation thumbnail image URL
    $thumbnail_id = $variation->get_image_id();
    $thumbnail_url = wp_get_attachment_image_src($thumbnail_id, "thumbnail");
    $thumbnail_url = $thumbnail_url ? $thumbnail_url[0] : "";
?>
<tr>
<td><img src="<?php echo esc_url($thumbnail_url); ?>" alt=""/></td><?php foreach ($attributes as $attribute)
    {
        // Convert to array
        if (!is_array($attribute))
        {
            $attribute = ["value" => $attribute];
        }

        foreach ($attribute as $key => $value)
        {
            echo "<td class='quick-variable-title'>" . esc_html(htmlspecialchars($value)) . "</td>";
        }
    } ?>
<td class='quick-variable-title'><?php echo _e($variation->get_price_html()); ?></td>
<td> <!-- Quantity -->
<div class="quick-quantity-container">
    <button class="quick-quantity-decrease" id="decrease">-</button>
    <input type="text" id="quantity" autocomplete="off" class="quick-quantity-input" value="1" data-max="<?php echo esc_attr($variation_stock_quantity); ?>">
    <button class="quick-quantity-increase" id="increase">+</button>
</div>
<div class="quick-cart-notification quick-hidden"></div>
</td>
<td class="stock-notification"><?php if ($variation_stock_quantity > 0)
    { ?>
  <button class="quick-add-to-cart" data-productId="<?php echo esc_attr($product->get_id()); ?>" data-variationId="<?php echo esc_attr($variation_id); ?>"><i class="fa fa-cart-plus" aria-hidden="true"></i>Add-to-cart</button>
  <?php
    }
    else
    {
        echo "<p>Out Of Stock</p>";
    } ?>
</td>
</tr>
<?php
} ?>
</table>
