(function($) {
	$(function() {
    $( document ).ready(function() {

      // var $el = $("#menu-container");
      var elHeight = 1080;
      var elWidth = 1920;

      var windowHeight = $(window).height(); // New height
      var windowWidth = $(window).width(); // New width

  		console.log('window - ' + windowWidth + ',' + windowHeight);

      var $wrapper = $("#menu-container");

      // $wrapper.resizable({
      //   resize: doResize
      // });

      function doResize(event, ui) {


            // var $el = $("#menu-container");
            var elHeight = 1080;
            var elWidth = 1920;

            var windowHeight = $(window).height(); // New height
            var windowWidth = $(window).width(); // New width

            console.log('window - ' + windowWidth + ',' + windowHeight);


            var scale, originX, originY;

            scale = Math.min(
              windowWidth / elWidth,
              windowHeight / elHeight
            );

            if(windowWidth > elWidth) {
              originX = elWidth - windowWidth;
            } else {
              originX = windowWidth - elWidth;
            }
            if(windowHeight > elHeight) {
              originY = elHeight - windowHeight;
            } else {
              originY = windowHeight - elHeight;
            }

            console.log('scale - ' + scale);
            console.log('origins - ' + originX/4 + ',' + originY/4);

            $("#menu-container").css('transform', "scale(" + scale + ")" + " translate(" + originX + "px, " + originY + "px)");


      }

      var starterData = {
        size: {
          width: $wrapper.width(),
          height: $wrapper.height()
        }
      }
      doResize(null, starterData);

    });
	});
})(jQuery);
