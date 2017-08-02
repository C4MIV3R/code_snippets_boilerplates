/*
* PSIc0h custom scripts for H&T Website
* Author: Cam Iverson
* License: MIT
*/

jQuery('document').ready( function() {
  // --- PSIc0h --- moving product features from description to below add-to-cart button
    var prepend_element = jQuery('#psi_product_features_interior');
    jQuery('#psi_product_features').prepend(prepend_element);

  // --- PSIc0h --- on hover fade 1st div out and fade 2nd div out, when hover stops, fade 2nd div out and fade 1st in
  // --- Works for whatever is named with the specific classes (psi_flip_wrapper is parent of both psi_flip_box_front and psi_flip_box_back)
  // --- maybe need to move this out of the document.ready... but later
  function psi_fade_product_images() {
  var psi_target_front;
  var psi_target_back;
    jQuery('.psi_flip_wrapper').hover(function() {
      psi_target_front = jQuery(this).find('.psi_flip_box_front');
      psi_target_back = jQuery(this).find('.psi_flip_box_back');
      jQuery(psi_target_front).fadeOut(300);
      jQuery(psi_target_back).fadeIn(300);
    }, function() {
        jQuery(psi_target_back).fadeOut(300);
        jQuery(psi_target_front).fadeIn(300);
    });
  }
  psi_fade_product_images();

// end document.ready
});
