<div class="quick-variable-dashboard">
  <h2><?php echo esc_html('Variable Quick Cart Carousel Setting:','quickvariable'); ?></h2>
 <?php
 $variableSetting = get_option('variable_all_checked', array());
 $variableHoverClick = isset($variableSetting['hoverClickValue'][0]) ? $variableSetting['hoverClickValue'][0] : '';
 $variableTooltipPosition = isset($variableSetting['boxPositionValue'][0]) ? $variableSetting['boxPositionValue'][0] : '';
 $variableDetailsTitle = isset($variableSetting['variableDetailsTitle'][0]) ? $variableSetting['variableDetailsTitle'][0] : '';
 $variableDetailsImage = isset($variableSetting['variableDetailsImage'][0]) ? $variableSetting['variableDetailsImage'][0] : '';
 $variableDetailsExcerpt = isset($variableSetting['variableDetailsExcerpt'][0]) ? $variableSetting['variableDetailsExcerpt'][0] : '';
 $cartButtonText = isset($variableSetting['cartButtonText']) ? $variableSetting['cartButtonText'] : 'Add-to-cart';
 $variableAddToCartIcon = isset($variableSetting['variableAddToCartIcon']) ? $variableSetting['variableAddToCartIcon'] : 'inline-block';
 $cartButtonBg = isset($variableSetting['cartButtonBg']) ? $variableSetting['cartButtonBg'] : '#007cba';
 $cartButtonTextColor = isset($variableSetting['cartButtonTextColor']) ? $variableSetting['cartButtonTextColor'] : '#fff';
 $tooltipBgColor = isset($variableSetting['tooltipBg']) ? $variableSetting['tooltipBg'] : '#000';
 $tooltipTextColor = isset($variableSetting['tooltipTextColor']) ? $variableSetting['tooltipTextColor'] : '#fff';
 $quantityBg = isset($variableSetting['quantityBg']) ? $variableSetting['quantityBg'] : '#007bff';
 $quantityBorderColor = isset($variableSetting['quantityBorderColor']) ? $variableSetting['quantityBorderColor'] : '#ccc';
 $quantityTextColor = isset($variableSetting['quantityTextColor']) ? $variableSetting['quantityTextColor'] : '#fff';
 $quickCarouselAutoplay = isset($variableSetting['quickCarouselAutoplay']) ? $variableSetting['quickCarouselAutoplay'] : 'true';
 $carouselButtonBgColor = isset($variableSetting['CarouselButtonBg']) ? $variableSetting['CarouselButtonBg'] : '#000';
 $carouselButtonIconColor = isset($variableSetting['CarouselButtonIconColor']) ? $variableSetting['CarouselButtonIconColor'] : '#fff';
 $tableHeadBgColor = isset($variableSetting['tableHeadBgColor']) ? $variableSetting['tableHeadBgColor'] : '#007cba';
 $tableHeadTextColor = isset($variableSetting['tableHeadTextColor']) ? $variableSetting['tableHeadTextColor'] : '#fff';
 $tableVariableTitleColor = isset($variableSetting['tableVariableTitleColor']) ? $variableSetting['tableVariableTitleColor'] : '#111111';
 $quickTableBorder = isset($variableSetting['quickTableBorder']) ? $variableSetting['quickTableBorder'] : '0';
 $tableBorderColor = isset($variableSetting['tableBorderColor']) ? $variableSetting['tableBorderColor'] : '#e1e8ed';
 $tableBgColorOdd = isset($variableSetting['tableBgColorOdd']) ? $variableSetting['tableBgColorOdd'] : 'transparent';
 $tableBgColorEven = isset($variableSetting['tableBgColorEven']) ? $variableSetting['tableBgColorEven'] : '#f2f2f2';
 $tableBgColorHover = isset($variableSetting['tableBgColorHover']) ? $variableSetting['tableBgColorHover'] : '#ddd';
 $cartButtonBgHover = isset($variableSetting['cartButtonBgHover']) ? $variableSetting['cartButtonBgHover'] : '#045cb4';
 $plusMinusBgColorHover = isset($variableSetting['quantityBgColorHover']) ? $variableSetting['quantityBgColorHover'] : '#0056b3';
 $quickCarouselOnOff = isset($variableSetting['quickCarouselOnOff']) ? $variableSetting['quickCarouselOnOff'] : '';
 $quickTableOnOff = isset($variableSetting['quickTableOnOff']) ? $variableSetting['quickTableOnOff'] : '';
 $quickCarouselPosition = isset($variableSetting['quickCarouselPosition']) ? $variableSetting['quickCarouselPosition'] : 'woocommerce_after_shop_loop_item';
 $quickTablePosition = isset($variableSetting['quickTablePosition']) ? $variableSetting['quickTablePosition'] : 'woocommerce_after_single_product_summary';
 $license_key = get_option('quick_license_key') ? get_option('quick_license_key') : "Enter Activation Key";
 
 ?>
 <div id="quickAdminTopInnerWrap">
  <div id="quickSwitchesWrapper">

   <!-- Variable Carousel Position Select -->
 <div class="quick-selections">
  <h4><?php echo _e('Variable Carousel Position: <span>(Pro)</span>','quickvariable'); ?></h4>
  <select class="quick-carousel-position">
    <option value="woocommerce_before_shop_loop_item" <?php selected($quickCarouselPosition, 'woocommerce_before_shop_loop_item'); ?>>Product Top</option>
    <option value="woocommerce_after_shop_loop_item" <?php selected($quickCarouselPosition, 'woocommerce_after_shop_loop_item'); ?>>Product Bottom</option>
    <option value="woocommerce_before_shop_loop_item_title" <?php selected($quickCarouselPosition, 'woocommerce_before_shop_loop_item_title'); ?>>Before Title</option>
    <option value="woocommerce_after_shop_loop_item_title" <?php selected($quickCarouselPosition, 'woocommerce_after_shop_loop_item_title'); ?>>After Title</option>
  </select>
</div>

  <div class="quick-selections">
    <h4><?php echo _e('Variable Quick Cart Carousel On/Off: <span>(Pro)</span>','quickvariable'); ?></h4>
    <div class="quick-selectors-wrapper">
    <div class="quick-carousel-on-off">
        <label class="switch">
          <input type="checkbox" name="quick-carousel-on-off" <?php if( $quickCarouselOnOff == "true" ): echo esc_attr("checked"); endif; ?>>
          <span class="slider round"></span>
        </label>
      </div>
    </div>
</div>

  <div class="quick-selections">
    <h4><?php echo _e('Variable Quick Cart Carousel Autoplay On/Off: <span>(Pro)</span>','quickvariable'); ?></h4>
    <div class="quick-selectors-wrapper">
    <div class="quick-carousel-autoplay">
        <label class="switch">
          <input type="checkbox" name="quick-carousel-autoplay" <?php if( $quickCarouselAutoplay == "true" ): echo esc_attr("checked"); endif; ?>>
          <span class="slider round"></span>
        </label>
      </div>
    </div>
</div>

<div class="quick-selections">
      <div class="quick-selectors-wrapper">
          <label for="quick-carousel-button-bg-color"><strong> <?php echo esc_html('Carousel Button Background Color:','quickvariable'); ?></strong></label>
          <input id="quick-carousel-button-bg-color" name="quick-carousel-button-bg-color" value="<?php echo esc_attr( $carouselButtonBgColor ); ?>"  data-jscolor="{}">
      </div>
  </div>

  <div class="quick-selections">
      <div class="quick-selectors-wrapper">
          <label for="quick-carousel-button-icon-color"><strong> <?php echo _e('Carousel Button Icon Color: <span>(Pro)</span>','quickvariable'); ?></strong></label>
          <input id="quick-carousel-button-icon-color" name="quick-carousel-button-icon-color" value="<?php echo esc_attr( $carouselButtonIconColor ); ?>"  data-jscolor="{}">
      </div>
  </div>
  <!-- Variable Details Box Show Checkboxes -->
  <div class="quick-selections">
    <h4><?php echo esc_html('Variable Quick Cart Popup Show:','quickvariable'); ?></h4>
    <div class="quick-selectors-wrapper">
      <div class="quick-hover-click">
        <label class="switch">
          <input type="checkbox" value="variable-hover" <?php if($variableHoverClick != "variable-click"): echo esc_attr("checked"); endif; ?>>
          <span class="slider round"></span>
        </label>
        <span><?php echo esc_html('On Hover','quickvariable'); ?></span>
      </div>
      <div class="quick-hover-click">
        <label class="switch">
          <input type="checkbox" value="variable-click" <?php if($variableHoverClick== "variable-click"): echo esc_attr("checked"); endif; ?>>
          <span class="slider round"></span>
        </label>
        <span><?php echo esc_html('On Click','quickvariable'); ?></span> <span class="quickPro">(Pro)</span>
      </div>
    </div>
  </div>
  <!-- Variable Details Box Position Checkboxes -->
  <div class="quick-selections">
    <h4><?php echo esc_html('Variable Quick Cart Popup Position:','quickvariable'); ?></h4>
    <div class="quick-selectors-wrapper">
      <div class="quick-box-position-click">
        <label class="switch">
          <input type="checkbox" value="quick-tooltip-position-center" <?php if($variableTooltipPosition == "quick-tooltip-position-center" || $variableTooltipPosition == "" || empty($variableSetting)): echo esc_attr("checked"); endif; ?>>
          <span class="slider round"></span>
        </label>
        <span><?php echo esc_html('Center','quickvariable'); ?></span>
      </div>

      <div class="quick-box-position-click">
        <label class="switch">
          <input type="checkbox" value="quick-tooltip-position-left" <?php if($variableTooltipPosition == "quick-tooltip-position-left"): echo esc_attr("checked"); endif; ?>>
          <span class="slider round"></span>
        </label>
        <span><?php echo esc_html('Left','quickvariable'); ?></span> <span class="quickPro">(Pro)</span>
      </div>

      <div class="quick-box-position-click">
        <label class="switch">
          <input type="checkbox" value="quick-tooltip-position-right"  <?php if($variableTooltipPosition == "quick-tooltip-position-right"): echo esc_attr("checked"); endif; ?>>
          <span class="slider round"></span>
        </label>
        <span><?php echo esc_html('Right','quickvariable'); ?></span> <span class="quickPro">(Pro)</span>
      </div>
    </div>
  </div>
  <div class="quick-selections">
    <h4><?php echo esc_html('Variable Quick Cart Popup Contents:','quickvariable'); ?></h4>
    <div class="quick-selectors-wrapper">
      <div class="quick-box-content-click">
        <label class="switch">
          <input type="checkbox" value="variable-title-in-box" <?php if( !empty($variableDetailsTitle) || empty($variableSetting) ): echo esc_attr("checked"); endif; ?>>
          <span class="slider round"></span>
        </label>
        <span><?php echo esc_html('Title','quickvariable'); ?></span>
      </div>
      <div class="quick-box-content-click">
        <label class="switch">
          <input type="checkbox" value="variable-image-in-box" <?php if( !empty($variableDetailsImage) || empty($variableSetting) ): echo esc_attr("checked"); endif; ?>>
          <span class="slider round"></span>
        </label>
        <span><?php echo esc_html('Image','quickvariable'); ?></span>
      </div>
      <div class="quick-box-content-click">
        <label class="switch">
          <input type="checkbox" value="variable-excerpt-in-box" <?php if( !empty($variableDetailsExcerpt) ): echo esc_attr("checked"); endif; ?>>
          <span class="slider round"></span>
        </label>
        <span><?php echo esc_html('Excerpt','quickvariable'); ?></span> <span class="quickPro">(Pro)</span>
      </div>
    </div>
  </div>
  <div class="quick-selections">
      <div class="quick-selectors-wrapper">
          <label for="tooltip-bg"><strong><?php echo esc_html('Popup Background Color:','quickvariable'); ?></strong></label>
          <input id="tooltip-bg" name="tooltip-bg" value="<?php echo esc_attr($tooltipBgColor); ?>" data-jscolor="{}">
      </div>
  </div>
  <!-- Quantity Button -->
  <div class="quick-selections">
      <div class="quick-selectors-wrapper">
          <label for="tooltip-text"><strong><?php echo _e('Popup Text Color: <span>(Pro)</span>','quickvariable'); ?></strong></label>
          <input id="tooltip-text" name="tooltip-text" value="<?php echo esc_attr($tooltipTextColor); ?>" data-jscolor="{}">
      </div>
  </div>
<!-- Add To Cart Button -->
  <div class="quick-selections">
    <h4><?php echo _e('Variable Quick Cart Add To Cart Button Icon: <span>(Pro)</span>','quickvariable'); ?></h4>
    <div class="quick-selectors-wrapper">
    <div class="quick-add-to-cart-icon">
        <label class="switch">
          <input type="checkbox" name="quick-add-to-cart-icon" value="variable-add-to-cart-icon" <?php if($variableAddToCartIcon == "inline-block" || empty($variableSetting)): echo esc_attr("checked"); endif; ?>>
          <span class="slider round"></span>
        </label>
      </div>
    </div>
</div>

<div class="quick-selections">
    <div class="quick-selectors-wrapper">
        <label><strong><?php echo esc_html('Variable Quick Cart Add To cart Button Text:','quickvariable'); ?></strong></label>
        <input type="text" class="quick-add-to-cart-text" value="<?php echo  esc_attr($cartButtonText); ?>">
    </div>
</div>

<div class="quick-selections">
      <div class="quick-selectors-wrapper">
          <label for="add-to-cart-bg"><strong><?php echo esc_html('Add To cart Button Background Color:','quickvariable'); ?></strong></label>
          <input id="add-to-cart-bg" name="add-to-cart-bg" value="<?php echo esc_attr($cartButtonBg); ?>" data-jscolor="{}">
      </div>
  </div>


  <div class="quick-selections">
      <div class="quick-selectors-wrapper">
          <label for="add-to-cart-bg-hover"><strong><?php echo _e('Add To cart Button Background Hover Color: <span>(Pro)</span>','quickvariable'); ?></strong></label>
          <input id="add-to-cart-bg-hover" name="add-to-cart-bg-hover" value="<?php echo esc_attr($cartButtonBgHover); ?>" data-jscolor="{}">
      </div>
  </div>

  <div class="quick-selections">
      <div class="quick-selectors-wrapper">
          <label for="add-to-cart-text"><strong><?php echo _e('Add To cart Button Text Color: <span>(Pro)</span>','quickvariable'); ?></strong></label>
          <input id="add-to-cart-text" name="add-to-cart-text" value="<?php echo esc_attr($cartButtonTextColor); ?>" data-jscolor="{}">
      </div>
  </div>

  <div class="quick-selections">
      <div class="quick-selectors-wrapper">
          <label for="quantity-bg-color"><strong><?php echo esc_html('Quantity plus minus button Background color:','quickvariable'); ?></strong></label>
          <input id="quantity-bg-color" name="quantity-bg-color" value="<?php echo esc_attr($quantityBg); ?>" data-jscolor="{}">
      </div>
  </div>

  <div class="quick-selections">
      <div class="quick-selectors-wrapper">
          <label for="quantity-bg-color-hover"><strong><?php echo _e('Quantity plus minus button Background  Hover color: <span>(Pro)</span>','quickvariable'); ?></strong></label>
          <input id="quantity-bg-color-hover" name="quantity-bg-color-hover" value="<?php echo esc_attr($plusMinusBgColorHover); ?>" data-jscolor="{}">
      </div>
  </div>

  <div class="quick-selections">
      <div class="quick-selectors-wrapper">
          <label for="quantity-text-color"><strong> <?php echo _e('Quantity plus minus button Text color: <span>(Pro)</span>','quickvariable'); ?></strong></label>
          <input id="quantity-text-color" name="quantity-text-color" value="<?php echo esc_attr($quantityTextColor); ?>"  data-jscolor="{}">
      </div>
  </div>

  <div class="quick-selections">
      <div class="quick-selectors-wrapper">
          <label for="quantity-border-color"><strong> <?php echo _e('Quantity border color:','quickvariable'); ?></strong></label>
          <input id="quantity-border-color" name="quantity-border-color" value="<?php echo esc_attr( $quantityBorderColor ); ?>"  data-jscolor="{}">
      </div>
  </div>


</div>
<!-- Pro Authentication Form Wrapper -->
 <div id="quickAuthenticateWrapper">
  </div>
</div>

<div id="quickVariableDesignWrap">
  <h2><?php echo esc_html('Variable Quick Cart Table Setting:','quickvariable'); ?></h2>

  <!-- Variable Table Position Select -->
<div class="quick-selections">
  <h4><?php echo _e('Variable Table Position: <span>(Pro)</span>','quickvariable'); ?></h4>
    <select class="quick-table-position">
      <option value="woocommerce_before_single_product_summary" <?php selected($quickTablePosition, 'woocommerce_before_single_product_summary'); ?>>Before Product Summary</option>
      <option value="woocommerce_after_single_product_summary" <?php selected($quickTablePosition, 'woocommerce_after_single_product_summary'); ?>>After Product Summary</option>
      <option value="woocommerce_after_single_product" <?php selected($quickTablePosition, 'woocommerce_after_single_product'); ?>>After Product Details</option>
    </select>
</div>

<div class="quick-selections">
    <h4><?php echo _e('Variable Quick Cart Table On/Off: <span>(Pro)</span>','quickvariable'); ?></h4>
    <div class="quick-selectors-wrapper">
    <div class="quick-table-on-off">
        <label class="switch">
          <input type="checkbox" name="quick-table-on-off" <?php if( $quickTableOnOff == "true" ): echo esc_attr("checked"); endif; ?>>
          <span class="slider round"></span>
        </label>
      </div>
    </div>
</div>

  <div class="quick-selections">
    <h4><?php echo _e('Variable Quick Cart Table Border Hide/Show: <span>(Pro)</span>','quickvariable'); ?></h4>
    <div class="quick-selectors-wrapper">
    <div class="quick-table-border">
        <label class="switch">
          <input type="checkbox" name="quick-table-border" <?php if( $quickTableBorder == "true" ): echo esc_attr("checked"); endif; ?>>
          <span class="slider round"></span>
        </label>
      </div>
    </div>
</div>

  <div class="quick-selections">
      <div class="quick-selectors-wrapper">
          <label for="quick-table-head-bg-color"><strong> <?php echo _e('Table Head Bg Color: <span>(Pro)</span>','quickvariable'); ?></strong></label>
          <input id="quick-table-head-bg-color" name="quick-table-head-bg-color" value="<?php echo esc_attr( $tableHeadBgColor ); ?>"  data-jscolor="{}">
      </div>
  </div>

  <div class="quick-selections">
      <div class="quick-selectors-wrapper">
          <label for="quick-table-head-text-color"><strong> <?php echo _e('Table Head Text Color: <span>(Pro)</span>','quickvariable'); ?></strong></label>
          <input id="quick-table-head-text-color" name="quick-table-head-text-color" value="<?php echo esc_attr( $tableHeadTextColor ); ?>"  data-jscolor="{}">
      </div>
  </div>

  <div class="quick-selections">
      <div class="quick-selectors-wrapper">
          <label for="quick-table-border-color"><strong> <?php echo _e('Table Border Color: <span>(Pro)</span>','quickvariable'); ?></strong></label>
          <input id="quick-table-border-color" name="quick-table-border-color" value="<?php echo esc_attr( $tableBorderColor ); ?>"  data-jscolor="{}">
      </div>
  </div>

  <div class="quick-selections">
      <div class="quick-selectors-wrapper">
          <label for="quick-table-variable-title-color"><strong> <?php echo _e('Table Variable Title Color: <span>(Pro)</span>','quickvariable'); ?></strong></label>
          <input id="quick-table-variable-title-color" name="quick-table-variable-title-color" value="<?php echo esc_attr( $tableVariableTitleColor ); ?>"  data-jscolor="{}">
      </div>
  </div>

  <div class="quick-selections">
      <div class="quick-selectors-wrapper">
          <label for="quick-table-variable-bg-color-odd"><strong> <?php echo _e('Variation Table Background Color(Odd): <span>(Pro)</span>','quickvariable'); ?></strong></label>
          <input id="quick-table-variable-bg-color-odd" name="quick-table-variable-bg-color-odd" value="<?php echo esc_attr( $tableBgColorOdd ); ?>"  data-jscolor="{}">
      </div>
  </div>

  <div class="quick-selections">
      <div class="quick-selectors-wrapper">
          <label for="quick-table-variable-bg-color-even"><strong> <?php echo _e('Variation Table Background Color(Even): <span>(Pro)</span>','quickvariable'); ?></strong></label>
          <input id="quick-table-variable-bg-color-even" name="quick-table-variable-bg-color-even" value="<?php echo esc_attr( $tableBgColorEven ); ?>"  data-jscolor="{}">
      </div>
  </div>

  <div class="quick-selections">
      <div class="quick-selectors-wrapper">
          <label for="quick-table-variable-hover-color"><strong> <?php echo _e('Variation Table Background Color Hover: <span>(Pro)</span>','quickvariable'); ?></strong></label>
          <input id="quick-table-variable-hover-color" name="quick-table-variable-hover-color" value="<?php echo esc_attr( $tableBgColorHover ); ?>"  data-jscolor="{}">
      </div>
  </div>
</div>
<?php wp_nonce_field( 'quick_admin_nonce_action', 'quick_admin_nonce' ); ?>

  <!-- save Button -->
  <button class="buttonload">
   <?php echo esc_html('Save','quickvariable'); ?>
  </button>

  <!-- Notification -->
  <div class="alert adminAlert quick-hidden">
  </div>
</div>