/* Custom JS Created by AMP Think for Parent Theme */

(function($) {
	$(function() {

    function getChromeVersion () {
        var raw = navigator.userAgent.match(/Chrom(e|ium)\/([0-9]+)\./);

        return raw ? parseInt(raw[2], 10) : false;
    }

    var chromeVersion = getChromeVersion();
    console.log('Chrome Version? - ' + chromeVersion );

    if (chromeVersion.toString() == '45') {
      $('body').addClass('chrome-45');
    }
		// else {

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
	    console.log('origins - ' + (originX*3/4) + ',' + (originY*3/4));

	    $("#menu-container").css('transform', "scale(" + scale + ")" + " translate(" + originX*3/4 + "px, " + originY*3/4 + "px)");
		// }

		//
		// $(document).ready(function(){
    //     $("#logo").click(function(){
		// 			console.log('trying to reload');
    //       location.reload(true);
    //     });
    // });
	});
})(jQuery);
