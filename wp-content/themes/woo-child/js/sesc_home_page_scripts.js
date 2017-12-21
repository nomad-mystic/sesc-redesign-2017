/**
 * @author Keith Murphy - nomad - nomadmystics@gmail.com
 * @summary Javascript functions for the home page
 */

/**
 * @author Keith Murphy - nomad - nomadmystics@gmail.com
 * @summary Build the home page slider
 */

var sescBuildHomePageSlider = (function($) {


	// DOM Pieces
	var slides = window.document.querySelectorAll('.sesc-slide-item');
	var slidesParentContainer = window.document.querySelector('.carousel-inner');

	/**
	 * @summary All all initial functions here
	 */
	var init = () => {

		addClasses();
		// keepImgRatio();
	};

	/**
	 * @summary Add classes here
	 */
	var addClasses = function() {

		// Slide 0 needs to have active if the slider is going to function properly
		slides[0].classList.add('active');

	};

	var keepImgRatio = () => {

		// console.log(slidesParentContainer);
		var refContainerWidth = slidesParentContainer.offsetWidth;
		var refContainerHeight = 400;
		var refRatio = refContainerWidth / refContainerHeight

		for (var i =0; i < slides.length; i++) {

			let imgHeight = slides[i].children[0].children[0].offsetHeight;
			let imgWidth = slides[i].children[0].children[0].offsetWidth;

			console.log(slides[1]);
			console.log(slides[i].children[0].children[0].offsetWidth);
			console.log(slides[i].children[0].children[0].offsetHeight);


			if ( (imgW/imgH) < refRatio ) {
				$(this).addClass("portrait");
			} else {
				$(this).addClass("landscape");
			}
		}


	};

	/**
	 * @todo on screen size change keepImgRatio
	 */

	/**
	 * @todo When slide changes keepImgRatio
	 */
	// $('.sesc-home-slider').on('slide.bs.carousel', function () {
	//     keepImgRatio();
	// });

	return {
		init: init
	};


})(jQuery);

sescBuildHomePageSlider.init();