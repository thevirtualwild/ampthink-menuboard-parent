<div id="page" class="site">
	<header>
		<div class="header-wrap">
      <div class="header-inner" style="background: url('<?php echo the_field('header_background', 'options'); ?>');">

        <div id="logo">
          <img src="<?php echo the_field('brand_logo', 'options'); ?>">
				</div>

				<div id="text-container">
					<?php $showtagline = get_field('show_menu_tagline'); ?>
					<?php if($showtagline): ?>
						<?php $tagline = get_field('menu_tagline'); ?>
						<?php if ($tagline) : ?>
						<div class="menu-tagline">
							<h2><?php the_field('menu_tagline'); ?></h2>
						</div>
						<?php endif; ?>
					<?php endif; ?>
					<div class="menu-title">
						<h1><?php echo $menu_title; ?></h1>
					</div>
				</div>

				<?php $show_player = get_field('show_player');
					$mascot_image = get_field('mascot_image', 'options');
					if ($show_player && $mascot_image) : ?>
						<div id="player-container">
							<img src="<?php echo $mascot_image; ?>">
						</div>
					<?php endif; ?>

				<?php $show_gameinfo = get_field('show_gameinfo');
					$game_info_url = get_field('game_info_url', 'options');
				if ($show_gameinfo && $game_info_url) :
					add_game_info();
        endif; ?>
			</div>
		</div>
	</header> <!--end header-->

	<div id="content" class="site-content">
