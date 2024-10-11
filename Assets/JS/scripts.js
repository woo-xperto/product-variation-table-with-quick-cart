jQuery(document).ready(function () {
  //Variable hover/click option Checkboxes Click
  var quickHoverClick = jQuery('.quick-hover-click input[type="checkbox"]');
  var quickBoxPosition = jQuery(
    '.quick-box-position-click input[type="checkbox"]'
  );
  var quickBoxPositionFieldWrapper = jQuery(".quick-box-position-click");
  var quickAdminAlert = jQuery(".quick-variable-dashboard .alert.adminAlert");
  var quickActivateAlert = jQuery(
    ".quick-variable-dashboard .alert.activateAlert"
  );
  var quickAdminButton = jQuery(".quick-variable-dashboard .buttonload");
  var quickCartIcon = jQuery('.quick-add-to-cart-icon input[type="checkbox"]');
  var quickSelections = jQuery(".quick-selections");
  var quickCarouselAutoplay = jQuery(
    '.quick-carousel-autoplay input[type="checkbox"]'
  );
  var quickTableBorder = jQuery('.quick-table-border input[type="checkbox"]');
  var quickCarouselOnOff = jQuery(
    '.quick-carousel-on-off input[type="checkbox"]'
  );
  var quickTableOnOff = jQuery('.quick-table-on-off input[type="checkbox"]');
  var quickCartExcerpt = jQuery(
    '.quick-box-content-click:nth-child(3) input[type="checkbox"]'
  );

  // Lock Pro Features
  if (quick_ajax_obj.pro_key == "1") {
    jQuery("[name=add-to-cart-text]").prop("disabled", true);
    jQuery("#add-to-cart-text").removeAttr("id");

    jQuery("[name=tooltip-text]").prop("disabled", true);
    jQuery("#tooltip-text").removeAttr("id");

    jQuery("[name=quantity-text-color]").prop("disabled", true);
    jQuery("#quantity-text-color").removeAttr("id");

    jQuery("[name=add-to-cart-bg-hover]").prop("disabled", true);
    jQuery("#add-to-cart-bg-hover").removeAttr("id");

    jQuery("[name=quantity-bg-color-hover]").prop("disabled", true);
    jQuery("#quantity-bg-color-hover").removeAttr("id");

    jQuery("[name=quick-carousel-button-icon-color]").prop("disabled", true);
    jQuery("#quick-carousel-button-icon-color").removeAttr("id");

    jQuery("[name=quick-table-head-bg-color]").prop("disabled", true);
    jQuery("#quick-table-head-bg-color").removeAttr("id");

    jQuery("[name=quick-table-head-text-color]").prop("disabled", true);
    jQuery("#quick-table-head-text-color").removeAttr("id");

    jQuery("[name=quick-table-variable-title-color]").prop("disabled", true);
    jQuery("#quick-table-variable-title-color").removeAttr("id");

    jQuery("[name=quick-carousel-autoplay]").prop("disabled", true);
    jQuery("[name=quick-carousel-autoplay]").prop("checked", false);
    jQuery(".quick-carousel-autoplay").removeClass("quick-carousel-autoplay");

    jQuery("[name=quick-carousel-on-off]").prop("disabled", true);
    jQuery("[name=quick-carousel-on-off]").prop("checked", false);
    jQuery(".quick-carousel-autoplay").removeClass("quick-carousel-on-off");

    jQuery("[name=quick-table-on-off]").prop("disabled", true);
    jQuery("[name=quick-table-on-off]").prop("checked", false);
    jQuery(".quick-table-on-off").removeClass("quick-table-on-off");

    jQuery("[name=quick-table-border]").prop("disabled", true);
    jQuery("[name=quick-table-border]").prop("checked", false);
    jQuery(".quick-table-border").removeClass("quick-table-border");

    jQuery("[name=quick-table-border-color]").prop("disabled", true);
    jQuery("#quick-table-border-color").removeAttr("id");

    jQuery("[name=quick-table-variable-bg-color-odd]").prop("disabled", true);
    jQuery("#quick-table-variable-bg-color-odd").removeAttr("id");

    jQuery("[name=quick-table-variable-bg-color-even]").prop("disabled", true);
    jQuery("#quick-table-variable-bg-color-even").removeAttr("id");

    jQuery("[name=quick-table-variable-hover-color]").prop("disabled", true);
    jQuery("#quick-table-variable-hover-color").removeAttr("id");

    quickCartIcon.prop("disabled", true);
    quickCartIcon.prop("checked", false);
    quickCartIcon.removeAttr("name");

    quickCartExcerpt.prop("disabled", true);
    quickCartExcerpt.prop("checked", false);
    quickCartExcerpt.removeAttr("value");

    // Correct way using variable without template strings
    quickBoxPositionFieldWrapper
      .eq(1)
      .find('input[type="checkbox"]')
      .prop("disabled", true);

    quickBoxPositionFieldWrapper
      .eq(1)
      .find('input[type="checkbox"]')
      .prop("checked", false);
    quickBoxPositionFieldWrapper
      .eq(1)
      .find('input[type="checkbox"]')
      .removeAttr("value");

    quickBoxPositionFieldWrapper
      .eq(2)
      .find('input[type="checkbox"]')
      .prop("disabled", true);

    quickBoxPositionFieldWrapper
      .eq(2)
      .find('input[type="checkbox"]')
      .prop("checked", false);
    quickBoxPositionFieldWrapper
      .eq(2)
      .find('input[type="checkbox"]')
      .removeAttr("value");

    jQuery("input[value|='variable-click']").prop("disabled", true);
    jQuery("input[value|='variable-click']").removeAttr("value");

    quickSelections
      .find("select.quick-carousel-position")
      .prop("disabled", true);
    quickSelections
      .find("select.quick-carousel-position")
      .removeClass("quick-carousel-position");

    quickSelections.find("select.quick-table-position").prop("disabled", true);
    quickSelections
      .find("select.quick-table-position")
      .removeClass("quick-table-position");
  }
  // Lock Pro Features End

  // On click Setting Save button Collect all checked fields Of variable
  quickAdminButton.on("click", function () {
    //Save button Spinner
    quickAdminButton.html(
      '<span><i class="fa fa-refresh fa-spin"></i></span>Loading...'
    );

    //Get Checked Fields Values
    let variableAllChecked = {};

    if (jQuery("input[value|='variable-click']").length) {
      variableAllChecked.hoverClickValue = jQuery(
        '.quick-hover-click input[type="checkbox"]:checked'
      )
        .map(function () {
          return jQuery(this).val();
        })
        .get();
    }

    variableAllChecked.variableDetailsTitle = jQuery(
      '.quick-box-content-click:nth-child(1) input[type="checkbox"]:checked'
    )
      .map(function () {
        return jQuery(this).val();
      })
      .get();

    variableAllChecked.variableDetailsImage = jQuery(
      '.quick-box-content-click:nth-child(2) input[type="checkbox"]:checked'
    )
      .map(function () {
        return jQuery(this).val();
      })
      .get();

    variableAllChecked.cartButtonText = jQuery(
      'input.quick-add-to-cart-text[type="text"]'
    ).val();

    //Popup Colors Check
    variableAllChecked.cartButtonBg = quickSelections
      .find("input#add-to-cart-bg")
      .val();

    variableAllChecked.tooltipBg = quickSelections
      .find("input#tooltip-bg")
      .val();

    variableAllChecked.quantityBg = quickSelections
      .find("input#quantity-bg-color")
      .val();
    variableAllChecked.quantityBorderColor = quickSelections
      .find("input#quantity-border-color")
      .val();
    variableAllChecked.CarouselButtonBg = quickSelections
      .find("input#quick-carousel-button-bg-color")
      .val();

    var quickAdminNonce = jQuery('input[name="quick_admin_nonce"]').val();

    //Store variable Field Settings in DB
    let jsonData = JSON.stringify(variableAllChecked);
    console.log(jsonData);

    jQuery.ajax({
      url: quick_ajax_obj.ajax_url,
      type: "POST",
      data: {
        action: "quickAdminAjaxHandler",
        variable_data: jsonData,
        nonce: quickAdminNonce,
        identifier: "adminSetting",
      },
      success: function (response) {
        quickAdminAlert.fadeIn();

        if (response.trim() === "true") {
          quickAdminAlert.css("background-color", "#4CAF50");

          quickAdminAlert.html(
            "<span class='closebtn'>&times;</span><strong>Success!</strong> Field map saved successfully."
          );
        } else {
          quickAdminAlert.css("background-color", "#f44336");

          quickAdminAlert.html(
            "<span class='closebtn'>&times;</span><strong>Danger!!</strong> Something wrong,try again later."
          );
        }

        jQuery(".quick-variable-dashboard .buttonload span").addClass(
          "quick-hidden"
        );

        quickAdminButton.text("Save");

        setTimeout(function () {
          quickAdminAlert.fadeOut();
        }, 3000);
      },
    });

    //On Click Notification Cross Icon
    quickAdminAlert.on("click", ".closebtn", function () {
      quickAdminAlert.fadeOut();
    });
  });
});
