/**
 * @file
 * JS for Summer Fun.
 */
(function ($, Backdrop, window, document, undefined) {

  // Show dropdown on hover.
  Backdrop.behaviors.summer_fun_dropdown = {
    attach: function(context, setting) {
      $('.dropdown').once('summer-fun-dropdown', function(){
        // Show dropdown on hover.
        $(this).mouseenter(function(){
          $(this).addClass('open');
        });
        $(this).mouseleave(function(){
          $(this).removeClass('open');
        });
      });
    }
  }

  $(document).ready(function() {

// run Javascript on page load here
console.log("Welcome to the console");

  });
})(jQuery, Backdrop, this, this.document);
