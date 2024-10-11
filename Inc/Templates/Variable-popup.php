<?php
$variableSetting = get_option("variable_all_checked", []);
$tooltipPosition = isset($variableSetting["boxPositionValue"][0]) ? $variableSetting["boxPositionValue"][0] : "";
$variableDetailsTitle = isset($variableSetting["variableDetailsTitle"][0]) ? $variableSetting["variableDetailsTitle"][0] : "";
$variableDetailsImage = isset($variableSetting["variableDetailsImage"][0]) ? $variableSetting["variableDetailsImage"][0] : "";
$variableDetailsExcerpt = isset($variableSetting["variableDetailsExcerpt"][0]) ? $variableSetting["variableDetailsExcerpt"][0] : "";
$cartButtonText = isset($variableSetting['cartButtonText']) ? $variableSetting['cartButtonText'] : 'Add-to-cart';
$variableAddToCartIcon = isset($variableSetting['variableAddToCartIcon']) ? $variableSetting['variableAddToCartIcon'] : '';

?>

<div class="quick-variable-tooltip tooltiptext quick-hidden <?php if ($tooltipPosition != "quick-tooltip-position-center")
{
    echo esc_attr($tooltipPosition);
} ?>">
<p><span class='closebtn'>&times;</span></p>
<img src="" alt="" class="variableThumb <?php if (empty($variableDetailsImage) && !empty($variableSetting)):
    echo esc_attr("quick-hidden");
endif; ?>"/>
<div id="quick-product-details">
    <div id="quick-product-content">
 <h4 class="<?php if (empty($variableDetailsTitle)  && !empty($variableSetting)):
    echo "quick-hidden";
endif; ?>"></h4>
 <p class="variable-short-desc <?php if (empty($variableDetailsExcerpt)  && !empty($variableSetting)):
    echo esc_attr("quick-hidden");
endif; ?>"></p>
 <p><strong><?php echo esc_html("Price:","quick-variable"); ?> </strong><span id="variable-product-price"></span></p>
 <div id="variable-product-variations"></div>
</div>
 <!-- Quantity -->
 <div class="quick-quantity-container">
     <button class="quick-quantity-decrease" id="decrease"><?php echo esc_html("-","quick-variable"); ?></button>
     <input type="text" autocomplete="off" id="quantity" class="quick-quantity-input" value="1" data-max="">
     <button class="quick-quantity-increase" id="increase"><?php echo esc_html("+","quick-variable"); ?></button>
     <button class="quick-add-to-cart" data-action="variable-product-btn"><i class="fa fa-cart-plus" aria-hidden="true"></i><?php echo esc_html($cartButtonText); ?></button>
     <?php wp_nonce_field( 'quick_variable_nonce_action', 'quick_variable_nonce' ); ?>
 </div>
 <div class="quick-cart-notification quick-hidden" id="notification"></div>
</div>
</div>