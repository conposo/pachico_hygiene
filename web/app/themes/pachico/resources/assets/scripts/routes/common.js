/* eslint-disable */

export default {
  init() {
    // JavaScript to be fired on all pages
    jQuery('.local_nav a').on('click', function(event) {
        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== '') {
            // Prevent default anchor click behavior
            event.preventDefault();
            // Store hash
            var hash = this.hash;
        }

        jQuery('html,body').animate(
            { scrollTop: jQuery(hash).offset().top-66, },
            { duration: 1750, easing: 'easeOutCubic' }
        );
    });
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
