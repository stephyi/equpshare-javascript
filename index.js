var $status = $('.paging-info');
var $slickElement = $('.slideshow');

// THIS COUNTS AND DISPLAYS THE DYNAMIC SLIDE COUNT
$slickElement.on('init reInit afterChange', function(event, slick, currentSlide, nextSlide) {
    //currentSlide is undefined on init -- set it to 0 in this case (currentSlide is 0 based)
    var i = (currentSlide ? currentSlide : 0) + 1;
    $status.text(i + ' of ' + slick.slideCount);
});

// SLICK SLIDER FUNCTION
$slickElement.slick({
    slide: '.content-wrapper',
    autoplay: false,
    arrows: false, // important for custom navigation
    dots: false
});

// CREATES THE CUSTOM SLIDER NAVIGATION CLICK FUNCTIONS
$('.slick-prev').click(function() {
    $slickElement.slick('slickPrev');
})

$('.slick-next').click(function() {
    $slickElement.slick('slickNext');
})