jQuery(document).ready(function($) {


    $(".home-page-carousel").bxSlider({
        pager: false,
        auto: true

    });


    $('#search-toggle').click(function() {

        $(".top-search").toggleClass('visible');

    });

});