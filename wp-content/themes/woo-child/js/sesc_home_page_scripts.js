/**
* @author Keith Murphy
* @summary Javascript functions for the home page
*/

/**
* @summary Build the home page slider
*/

var sescBuildHomePageSlider = (function() {

    var slides = window.document.querySelectorAll('.sesc-slide-item');

    // Slide 0 needs to have active if the slider is going to function properly
    slides[0].classList.add('active');

});

sescBuildHomePageSlider();
