<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<div id="adSlider" class="ad" data-ride="carousel-ad">
    <div class="ad-inner">
        <?php
          $adcount = 0;
          foreach ($post_list as $item_id) {
            $adcount += 1;
            $post = get_post($item_id);
            setup_postdata( $post );

            $item_title = get_field(display_title);
            $item_subtitle = get_field(display_subtitle);
            $item_price = get_field(price);

            $carouselitemclass = "carousel-item active";
            // if($count == 1) {
            //   $carouselitemclass = "carousel-item active";
            // }
            ?>
            <div class="<?php echo $carouselitemclass;?>">
              <!-- <img src="..." class="d-block w-100" alt="..."> -->
              <?php the_post_thumbnail(); ?>
            </div>
            <?php
            wp_reset_postdata();
          }
        ?>
    </div>
</div>
