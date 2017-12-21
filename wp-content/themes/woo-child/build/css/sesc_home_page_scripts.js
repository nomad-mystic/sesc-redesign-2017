'use strict';

/**
* @author Keith Murphy - nomad - nomadmystics@gmail.com
* @summary Javascript functions for the home page
*/

/**
* @author Keith Murphy - nomad - nomadmystics@gmail.com
* @summary Build the home page slider
*/

var sescBuildHomePageSlider = function ($) {
    var _this = this;

    // DOM Pieces
    var slides = window.document.querySelectorAll('.sesc-slide-item');
    var slidesParentContainer = window.document.querySelector('.carousel-inner');

    /**
    * @summary All all initial functions here
    */
    var init = function init() {

        addClasses();
        changeAtts();
        jqueryFunctions();
        // keepImgRatio();
    };

    /**
    * @summary Add classes here
    */
    var addClasses = function addClasses() {

        // Slide 0 needs to have active if the slider is going to function properly
        slides[0].classList.add('active');
    };

    var keepImgRatio = function keepImgRatio() {

        // console.log(slidesParentContainer);
        var refContainerWidth = slidesParentContainer.offsetWidth;
        var refContainerHeight = 400;
        var refRatio = refContainerWidth / refContainerHeight;

        for (var i = 0; i < slides.length; i++) {

            var imgHeight = slides[i].children[0].children[0].offsetHeight;
            var imgWidth = slides[i].children[0].children[0].offsetWidth;

            console.log(slides[1]);
            console.log(slides[i].children[0].children[0].offsetWidth);
            console.log(slides[i].children[0].children[0].offsetHeight);

            if (imgW / imgH < refRatio) {
                $(_this).addClass("portrait");
            } else {
                $(_this).addClass("landscape");
            }
        }
    };

    /**
    * @todo on screen size change keepImgRatio
    */
    var jqueryFunctions = function() {

        $(".nav a").on("click", function(event) {
            var target = event.currentTarget;
            var windowWidth = window.innerWidth;

            $(".nav").find(".active").removeClass("active");
            $(this).parent().addClass("active");

            console.log(windowWidth);
            if ('767' > windowWidth && target.classList.contains('active')) {

                target.style.backgroundColor = '#245682';
                // target.style.color = '#fffffff';
                target.setAttribute('style', ' #ffffff !important');

            }

       });



        $('.carousel').carousel({
            interval: 4000
        });

        /**
        * @todo When slide changes keepImgRatio
        */
        $('.sesc-home-slider').on('slide.bs.carousel', function () {
            // keepImgRatio();
        });
    }



    var changeAtts = function() {

        var wrapper_div = window.document.getElementById('wrapper');
        var location = window.location.pathname;

        if ('/home-page-redesign/') {

            wrapper.setAttribute('style', 'max-width: 1220px !important');
            // wrapper.style.maxWidth = '1220px !important';

        }

    };


    return {
        init: init
    };

}(jQuery);

sescBuildHomePageSlider.init();
