(function($) {
	$(function() {

		var $menu_title = $(".title-container .menu-item-title h2");
		var $five_menu_title = $(".five-item-feature-left-menu .menu-item-title h2");
		var $five_menu_description = $(".five-item-feature-left-menu h3");
		var $display_title = $(".allow-resize-title .display-title");
		var $combo_title = $(".combo-title");
		var $featured_display_title = $(".carousel .featured_display_title");

		var $item_text_title = $(".item-text .featured_display_title");

		var $with_item_text_title = $(".quadrant-with-items .item-text .featured_display_title");
		var $with_item_info_title = $(".quadrant-with-items .with-item-info .featured_display_title");
		var $menu_item_list_title = $(".menu-list .menu_item .display-title .title-text");

		$five_menu_title.each(function() {
			var $charCount = $(this).text().length;

			// console.log($charCount);

			if (($charCount >= 15)) {
				$(this).css("font-size", "32px");
			}
		});
		$five_menu_description.each(function() {
			var $charCount = $(this).text().length;

			// console.log($charCount);

			if (($charCount >= 24)) {
				$(this).css("font-size", "26px");
				$(this).css("letter-spacing", "3px");
			}
		});
		$menu_title.each(function() {
			var $charCount = $(this).text().length;

			// console.log($charCount);

			if (($charCount >= 15)) {
				$(this).css("font-size", "32px");
			}
		});
		$display_title.each(function() {
			var $charCount = $(this).text().length;

			// console.log($(this).text() + ' - ' + $charCount);

			if (($charCount >= 20)) {
				$(this).css("font-size", "58px");
				$(this).css("line-height", "52px");
			}
		});

		$featured_display_title.each(function() {
			var $charCount = $(this).text().length;

			// console.log($(this).text() + ' - ' + $charCount);

			if (($charCount >= 20)) {
				$(this).css("font-size", "42px");
				$(this).css("line-height", "40px");
				$(this).css("margin-bottom", "15px;");
			}
		});

		$combo_title.each(function() {
			var $charCount = $(this).text().length;

			// console.log($(this).text() + ' - ' + $charCount);

			if (($charCount >= 20)) {
				$(this).css("font-size", "58px"); // was 58px
				$(this).css("line-height", "56px"); // was 56px
				$(this).css("margin-bottom", "15px;");
			}
		});

		$item_text_title.each(function() {
			var $charCount = $(this).text().length;

			if ($charCount >= 10) {
				$(this).css("font-size", "82px"); // was 58px
				$(this).css("line-height", "120px"); // was 56px
			}
		});
		$with_item_text_title.each(function() {
			var $charCount = $(this).text().length;

			if ($charCount >= 15) {
				$(this).css("font-size", "82px");
				$(this).css("line-height", "70px");
				$(this).css("padding", "20px 0");
			}
		});
		$menu_item_list_title.each(function() {
			var $charCount = $(this).text().length;

			if ($charCount >= 28) {
				$(this).addClass("smaller-text");
			}
		});
		$('.quadrant-with-items .with-item-info .featured_display_title').each(function() {

			var replaced = $(this).html().replace("Large ","Large<br/>");
			$(this).html(replaced);

			// $(this).text(function(i, text) {
			// 	return text.replace("Large ", "Large<br/>");
			// });
		});
		$('.quadrant-with-items .with-item-info .featured_display_title').each(function() {

			var replaced = $(this).html().replace("Souvenir","Souv");
			$(this).html(replaced);

			// $(this).text(function(i, text) {
			// 	return text.replace("Large ", "Large<br/>");
			// });
		});

		if($('#game-info').length){
			if($('#player-container').length){
				$('#text-container').css('max-width', '894px'); // was 968
				if($('.menu-tagline').length) {
					$('.menu-title').css('max-width', '666px') //was 740
				}
			}else{
				$('#text-container').css('max-width', '1162px'); //was 1236
				if($('.menu-tagline').length) {
					$('.menu-title').css('max-width', '974px') //was 1048
				}
			}
		} else {
			if($('#player-container').length){
				$('#text-container').css('max-width', '1434px');
				if($('.menu-tagline').length) {
					$('.menu-title').css('max-width', '888px')
				}
			}else{
				$('#text-container').css('max-width', '1702px');
				$('#text-container').css('padding-right', '10px');
				if($('.menu-tagline').length) {
					$('.menu-title').css('max-width', '1360px')
				}
			}
		}


	});
})(jQuery);
