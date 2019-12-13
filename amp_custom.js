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

		// var menuContainer = $('.menu-container');
		// console.log('menucontainer - ' + menuContainer.height());

		$('.menu-list').each(function() {
			listheight = $(this).height()
			console.log('list height - ' + listheight);

			var innerheight = 0;
			$(this).children('.menu-section').each(function() {
				var sectionheight = $(this).height()
				console.log('seciton height - ' + sectionheight);
				innerheight += sectionheight;
			});

			var currentFontstring = $(this).css('font-size');
			var currentFont = currentFontstring.split('px')[0];

			console.log('check - ' + (innerheight > listheight));

			while (innerheight > listheight) {

				console.log('current - ' + currentFont);
				var newFont = currentFont - 1;
				console.log('newfont - ' + newFont);

				var newFontString = newFont + 'px';
				$(this).css('font-size', newFontString);
				console.log($(this).css('font-size'));

				innerheight = 0;
				$(this).children('.menu-section').each(function() {
					var sectionheight = $(this).height()
					innerheight += sectionheight;
				});
				currentFont = newFont;

				console.log('check - ' + (innerheight > listheight));
			}
		});


		// var windowPerc = windowHeight * .89;
		//
		// var menuHeight = $('.portable-menu-container .menu-list').height();
		// console.log(menuHeight);
		//
		// var currentFontstring = $('.portable-menu-container .menu-list ul li.menu_item').css('font-size');
		// var currentFont = currentFontstring.split('px')[0];
		//
		// console.log('check - ' + (menuHeight > windowPerc));
		//
		// while (menuHeight > windowPerc) {
		//
		// 	var newFont = currentFont - 0.3;
		// 	console.log('newfont - ' + currentFont);
		//
		// 	var newFontString = newFont + 'px';
		// 	$('.portable-menu-container .menu-list ul li.menu_item').css('font-size', newFontString);
		//
		// 	menuHeight = $('.portable-menu-container .menu-list').height();
		// 	currentFont = newFont;
		// }

	});
})(jQuery);
