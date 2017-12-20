/**
 * @author Keith Murphy
 * @summary Javascript functions for the home page
 */

/**
 * @summary Build the home page slider
 */

var sescBuildHomePageSlider = (() => {


	// var computedStyle = document.defaultView.getComputedStyle(liItems[i].childNodes[0], null);
	// imageWidth = computedStyle.width;

	var sescFunctions = {
		slider: function(ul, imageWidth, imageNumber) {
			var currentImage = 0;
			this.animate({
				delay:17,
				duration: 3000,
				delta: function(p) { return Math.max(0, -1 + 2 * p) },
				step: function(delta) {
					ul.style.left = '-' + parseInt(currentImage * imageWidth + delta * imageWidth) + 'px';
				},
				callback: function() {
					currentImage++;
					// if it doesn’t slied to the last image, keep sliding
					if (currentImage < imageNumber - 1) {
						sescFunctions.slider(ul);
					}
					// if current image it’s the last one, it slides back to the first one
					else {
						var leftPosition = (imageNumber - 1) * imageWidth;
						// after 2 seconds, call the goBack function to slide to the first image
						setTimeout(function(){sescFunctions.goBack(leftPosition, currentImage)},2000);
						setTimeout(function(){sescFunctions.slider(ul)}, 4000);
					}
				}
			});
		},
		init: function() {
			// ul = document.getElementById('image_slider');
			// li_tems = ul.children;
			// imageNumber = liItems.length;
			// imageWidth = liItems[0].children[0].offsetWidth;
			// // set ul’s width as the total width of all images in image slider.
			// ul.style.width = parseInt(imageWidth * imageNumber) + 'px';
			// this.slider(ul);
			var ul;
			var liItems;
			var imageWidth;
			var imageNumber;
			var prev, next;
			var sliderWidth = 0;
			var currentPostion = 0;

			var ul = document.getElementById('image_slider');
			console.log(ul);
			var liItems = ul.children;

			for (var i = 0; i < liItems.length; i++) {
				// nodeType == 1 means the node is an element.
				// in this way it's a cross-browser way.
				//if (li_items[i].nodeType == 1){
				//clietWidth and width???
				imageWidth = liItems[i].childNodes[0].clientWidth;
				sliderWidth += imageWidth;
				imageNumber++;
			}
			//
			ul.style.width = parseInt(sliderWidth) + 'px';
			this.slider(ul, imageWidth, imageNumber);
		},
		goBack: function(leftPosition, currentImage) {
			currentImage = 0;
			var id = setInterval(function() {
				if (leftPosition >= 0) {
					ul.style.left = '-' + parseInt(leftPosition) + 'px';
					leftPosition -= imageWidth / 10;
				}
				else {
					clearInterval(id);
				}
			}, 17);
		},
		//generic animate function
		animate: function(opts) {
			var start = new Date;
			var id = setInterval(function(){
				var timePassed = new Date - start;
				var progress = timePassed / opts.duration
				if(progress > 1){
					progress = 1;
				}
				var delta = opts.delta(progress);
				opts.step(delta);
				if (progress == 1){
					clearInterval(id);
					opts.callback();
				}
			}, opts.dalay || 17);
		},
		slideTo: function(imageToGo) {

			var direction;
			var numOfImageToGo = Math.abs(imageToGo - currentImage);
			// slide toward left

			direction = currentImage > imageToGo ? 1 : -1;
			currentPostion = -1 * currentImage * imageWidth;
			var opts = {
				duration:1000,
				delta:function(p){return p;},
				step:function(delta){
					ul.style.left = parseInt(currentPostion + direction * delta * imageWidth * numOfImageToGo) + 'px';
				},
				callback: function() { currentImage = imageToGo; }
			};
			this.animate(opts);
		}



	}; // end functions


	return {
		sescFunctions: sescFunctions
	}

})();

sescBuildHomePageSlider.sescFunctions.init();
// sescBuildHomePageSlider.sescFunctions.init();