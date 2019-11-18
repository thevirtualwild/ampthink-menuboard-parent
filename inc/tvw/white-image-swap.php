<?php

function add_white_image_swapper() {
	?>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script>
	(function($) {
		$( document ).ready(function() {
      $(".dark-background .display-icon").each( function(){
        var oldsrc = $(this).prop('src');
        var newsrc = oldsrc.split(".png")[0] + '-white.png';
				if (newsrc == 'http://broncos.18.211.236.134.xip.io/wp-content/uploads/sites/3/2019/08/xlogo-505-white.png') {
					newsrc = 'http://broncos.18.211.236.134.xip.io/wp-content/uploads/sites/3/2019/08/logo-505-white.png'
				}
        $(this).attr('src',newsrc);
      });
		});
	})( jQuery );
  </script>

	<?php
}

add_action('wp_footer', 'add_white_image_swapper');

?>
