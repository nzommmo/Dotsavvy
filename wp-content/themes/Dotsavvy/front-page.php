<?php 
get_header();
?>
<section id="header">
    <div class="relative"> 
        <div class="flex justify-between ml-5 pt-2">
            <div class="">
                <?php
                if(function_exists('the_custom_logo')){
                    $custom_logo_id = get_theme_mod('custom_logo');
                    $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                }
                ?>
                <img src="<?php echo $logo[0]; ?>" alt="logo" class="w-1/2 mb-3 mx-auto logo">
            </div>
            <div>
                <img src="wp-content/themes/Dotsavvy/assets/images/Rectangle 3 copy 22.png" alt="" class="w-1/2">
            </div>
        </div>
    </div>
</section>

<section id="hero" class="bg-cover w-[500px] h-[100px]">
    <div class="container">
        <div class="pt-80 ml-10 w-1/2 text-white">
            <h1 class="text-5xl md:text-7xl pb-1">It Always</h1>
            <h1 class="text-5xl md:text-7xl pb-3">Starts Digital.</h1>
            <p class="text-xl text-wrap text-neutral-700">Award winning digital marketing agency in Kenya and Africa</p>
        </div>
    </div>
</section>

<section id="brands " class="flex items-center justify-center">
    <table class="brand-table ml-5">
        <tr>
            <?php
            $args = array(
                'post_type' => 'brand',
                'posts_per_page' => -1,
                'orderby' => 'date',
                'order' => 'ASC',  // Order by date in ascending order
            );
            $brand_query = new WP_Query($args);
            $counter = 0;
            if ($brand_query->have_posts()) :
                while ($brand_query->have_posts()) : $brand_query->the_post();
                    $brand_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
                    if ($counter % 7 == 0 && $counter != 0) {
                        echo '</tr><tr>'; // Start a new row every 7 images
                    }
            ?>
                    <td style="padding: 15px;"><img src="<?php echo esc_url($brand_image); ?>" alt="<?php the_title(); ?>" class="w-full"></td>
            <?php
                    $counter++;
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </tr>
    </table>
</section>

<?php 
get_footer();
?>
