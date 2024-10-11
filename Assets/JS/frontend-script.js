jQuery(document).ready(function () {
  // Variable slide/slick script
  var $tooltip = jQuery(".quick-variable-tooltip");
  var maxQuantity;
  var variationData;
  let autoPlay = jQuery(".quick-variable-slide").data("autoplay");

  jQuery(".quick-variable-slide").slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: autoPlay,
    autoplaySpeed: 2000,
    arrows: true,
    prevArrow:
      '<button type="button" class="slick-custom-arrow slick-prev"><i class="fa fa-angle-left" aria-hidden="true"></i></button>',
    nextArrow:
      '<button type="button" class="slick-custom-arrow slick-next"><i class="fa fa-angle-right" aria-hidden="true"></i></button>',
  });

  // Variable Tooltip script
  // Tooltip Hide
  jQuery(window).on("click", function (e) {
    if (
      !jQuery(e.target).closest($tooltip).length &&
      !jQuery(e.target).closest(".quick-slide-variable").length
    ) {
      $tooltip.addClass("quick-hidden");
    }
  });
  jQuery(".quick-variable-tooltip .closebtn").on("click", function () {
    $tooltip.addClass("quick-hidden");
  });

  //Variable Carousel
  jQuery(".quick-slide-variable").each(function () {
    var $this = jQuery(this);
    variationData = JSON.parse($this.attr("data-variation"));
    let hoverClick = variationData.variableClickHover;

    if (hoverClick === "variable-click") {
      $this.off("click touchstart").on("click touchstart", function (e) {
        e.preventDefault();
        quickVariableDetails($this);
      });
    } else {
      if (!("ontouchstart" in window)) {
        $this.off("mouseenter").on("mouseenter", function () {
          quickVariableDetails($this);
        });
      } else {
        $this.off("touchstart").on("touchstart", function () {
          quickVariableDetails($this);
        });
      }
    }

    function quickVariableDetails($element) {
      variationData = JSON.parse($element.attr("data-variation"));
      maxQuantity = variationData.variationQuantity;
      let cartButton = jQuery(".quick-variable-tooltip .quick-add-to-cart");
      let stockNotification = jQuery(
        ".quick-variable-tooltip .quick-cart-notification"
      );
      let toolTip = jQuery(".quick-variable-tooltip");

      if (maxQuantity < 1) {
        cartButton.addClass("quick-hidden");
        stockNotification.removeClass("quick-hidden");
        stockNotification.text("Out Of Stock");
      } else {
        cartButton.removeClass("quick-hidden");
        stockNotification.addClass("quick-hidden");
        stockNotification.text(" ");
      }
      const quickVariableImage = $element.find("img").attr("src");
      const variations = JSON.parse($element.attr("data-variationsList"));
      let variationsOutput = "";
      Object.entries(variations).forEach(([key, value]) => {
        variationsOutput += `<p><strong>${key}:</strong> ${value}</p>`;
      });

      toolTip.attr("data-productId", variationData.product_id);

      toolTip.attr("data-variationId", variationData.variationId);

      toolTip.find("input.quick-quantity-input").attr("data-max", maxQuantity);

      toolTip.find("h4").text(variationData.name);
      toolTip.find("p.variable-short-desc").text(variationData.excerpt);
      toolTip.find("img").attr("src", quickVariableImage);
      toolTip
        .find("span#variable-product-price")
        .html(variationData.variationPrice);
      toolTip.find("div#variable-product-variations").html(variationsOutput);
      $element
        .closest(".quick-variable-slide")
        .siblings($tooltip)
        .removeClass("quick-hidden");
    }
  });

  //  Variable Quantity Button Script
  jQuery(".quick-quantity-decrease").on("click", function () {
    let currentValue = parseInt(
      jQuery(this).siblings(".quick-quantity-input").val(),
      10
    );

    if (currentValue > 1) {
      // Prevent going below 1
      jQuery(this)
        .siblings(".quick-quantity-input")
        .val(currentValue - 1);
      jQuery(".quick-cart-notification").text("");
    }
  });

  jQuery(".quick-quantity-increase").on("click", function () {
    maxQuantity = jQuery(this)
      .siblings(".quick-quantity-input")
      .attr("data-max");
    let currentValue = parseInt(
      jQuery(this).siblings(".quick-quantity-input").val(),
      10
    );

    if (currentValue < maxQuantity) {
      // Prevent exceeding max limit
      jQuery(this)
        .siblings(".quick-quantity-input")
        .val(currentValue + 1);
      jQuery(".quick-cart-notification").text("");
    }
  });

  jQuery(".quick-quantity-input").on("input", function () {
    maxQuantity = jQuery(this).attr("data-max");
    let inputValue = parseInt(jQuery(this).val());
    let quantityNotification = jQuery(this)
      .closest(".quick-quantity-container")
      .siblings(".quick-cart-notification");
    if (isNaN(inputValue) || inputValue < 1) {
      jQuery(this).val(1);
      quantityNotification.text("Quantity cannot be less than 1.");
      quantityNotification.removeClass("quick-hidden");
    } else if (inputValue > maxQuantity) {
      jQuery(this).val(maxQuantity);
      quantityNotification.text(`Quantity cannot exceed ${maxQuantity}.`);
      quantityNotification.removeClass("quick-hidden");
    } else {
      quantityNotification.addClass("quick-hidden");
    }
  });

  // Variable Product Add-to-cart
  var productId;
  var variationId;
  var $quantity;
  var price;
  jQuery(".quick-add-to-cart").on("click", function () {
    var $button = jQuery(this);
    var quickVariableNonce = jQuery('input[name="quick_variable_nonce"]').val();
    if ($button.attr("data-action")) {
      productId = jQuery(".quick-variable-tooltip").data("productid");
      variationId = jQuery(".quick-variable-tooltip").attr("data-variationId");
      $quantity = parseInt(jQuery("#quantity").val(), 10);
      price = jQuery("#variable-product-price").text();
    } else {
      var $tr = $button.closest("tr");
      productId = $button.data("productid");
      variationId = $button.attr("data-variationId");
      // Find all <td> elements within the <tr>, excluding the first and last <td>
      $quantity = $tr.find("input").val();
    }

    // Prepare the data to send
    const data = {
      action: "quick_add_to_cart",
      product_id: productId,
      quantity: $quantity,
      variation_id: variationId,
      variable_nonce: quickVariableNonce,
    };

    // Send the AJAX request
    jQuery.post(quick_front_ajax_obj.ajax_url, data, function (response) {
      if (response.success) {
        // Redirect to cart page
        window.location.href = quick_front_ajax_obj.siteUrl + "/cart/";
      } else {
        $button
          .closest("tr")
          .find(".quick-cart-notification")
          .text("There was an error adding the product to the cart.");
      }
    });
  });
});
