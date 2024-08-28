<?php 
get_header();
?>
<section id="header">
    <div class="relative"> 
        <div id="header-content" class="flex justify-between  pt-2">
            <div class="">
                <?php
                if(function_exists('the_custom_logo')){
                    $custom_logo_id = get_theme_mod('custom_logo');
                    $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                }
                ?>
                <img id="logo" src="<?php echo $logo[0]; ?>" alt="logo" class="">
            </div>
            <div class="">
                <img id="menu" src="wp-content/themes/Dotsavvy/assets/images/Rectangle 3 copy 22.png" alt="" class="">
            </div>
        </div>
    </div>
</section>

<section class="">
<?php
$hero_query = new WP_Query(array('post_type' => 'hero_section', 'posts_per_page' => 1));
if ($hero_query->have_posts()) :
    while ($hero_query->have_posts()) : $hero_query->the_post();
        $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
        ?>
        <div id="hero" class="hero-section" style="background-image: url('<?php echo esc_url($thumbnail_url); ?>'); background-size: cover; background-position: center;">
            <div class="hero-conten text-white pt-80 md:ml-20 ml-10">
                <div class="md:w-1/3 w-1/2">
                <h1 class="md:text-7xl text-7xl ">
                    <?php the_title(); ?>
                </h1>

                </div>
                <div class="pt-3 md:w-1/4 w-1/2 md:text-xl text-xl">
                <p class="text-xl"><?php the_content(); ?>
                </p>
                </div>
            </div>
        </div>
        <?php
    endwhile;
    wp_reset_postdata();
endif;
?>

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
                    <td id="brand-images" style="padding: 15px;"><img src="<?php echo esc_url($brand_image); ?>" alt="<?php the_title(); ?>" class="w-full"></td>
            <?php
                    $counter++;
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </tr>
    </table>
</section>

<section>
    
<div class="m-16 mt-10 rounded-md">
<?php
// Query for CTA post type
$cta_query = new WP_Query(array(
    'post_type' => 'cta',
    'posts_per_page' => 1, // Adjust as needed
));

if ($cta_query->have_posts()) :
    while ($cta_query->have_posts()) : $cta_query->the_post(); ?>
        <div class="">

        <div class="cta-section grid md:grid-cols-2 ">
            <?php if (has_post_thumbnail()) : ?>
                <div class="cta-thumbnail rounded-lg">
                    <?php the_post_thumbnail(); ?>
                </div>
            <?php endif; ?>
            <div class="cta-content px-16 pt-10 rounded-md" id="cta">
               <div class=" tracking-tighter leading-3">
               <h2 class="text-white text-8xl"><?php the_title(); ?></h2>

               </div> 
                <div class="cta-text py-10  text-white">
                    <p class="text-white">  <?php the_content(); ?>
                    </p>
                </div>
            </div>
        </div>
        </div>

    <?php endwhile;
    wp_reset_postdata();
endif;
?>
</div>
</section>



<?php 
get_footer();
?>
