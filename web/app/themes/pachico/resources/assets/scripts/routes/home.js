/* eslint-disable */

export default {
  init() {
    // JavaScript to be fired on the home page
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
    $('.carousel-images').slick({
      'autoplay': true,
      'autoplaySpeed': 3250,
      'arrows': false,
      'fade': true,
    });

    var instance = new TypeIt('.type-it', {
      // strings: ['Front-End', 'Back-End', 'Full-Stack'],
      strings: jQuery('.type-it').data('headings').split(','),
      speed: 100,
      breakLines: false,
      autoStart: false,
      loop: true,
      loopDelay: 1500,
      nextStringDelay: [350, 2000]
    });
  },
};
