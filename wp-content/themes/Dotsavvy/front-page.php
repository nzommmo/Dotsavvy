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
            <div class="hero-content text-white md:pt-60 sm:pt-64 pt-72  md:ml-20 ml-4">
                <div class="md:w-1/3 w-1/2">
                <h1 class="md:text-7xl sm:text-5xl text-3xl md:tracking-normal sm:tracking-normal tracking-tight">
                    <?php the_title(); ?>
                </h1>

                </div>
                <div class="pt-3 md:w-1/4 w-1/2 md:text-xl sm:text-xl text-xs ">
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
                    <td id="brand-images" style="padding: 15px; "><img src="<?php echo esc_url($brand_image); ?>" alt="<?php the_title(); ?>" class="w-full pt-3"></td>
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
    
<div class="md:m-16 m-5 mt-10 rounded-md">
<?php
// Query for CTA post type
$cta_query = new WP_Query(array(
    'post_type' => 'cta',
    'posts_per_page' => 2, // Adjust as needed
));

if ($cta_query->have_posts()) :
    while ($cta_query->have_posts()) : $cta_query->the_post(); ?>
        <div class="">

        <div class="cta-section grid md:grid-cols-2 sm:grid-cols-2 ">
            <?php if (has_post_thumbnail()) : ?>
                <div id="test" class="cta-thumbnail rounded-lg pt-5">
                    <?php the_post_thumbnail(); ?>
                </div>
            <?php endif; ?>
            <div class="cta-content md:px-16 md:pt-10 sm:px-8 px-2 rounded-md" id="cta">
               <div id="cta-title" class=" tracking-tighter leading-3  pt-5">
               <h2 class="text-white md:text-7xl sm:text-3xl  "><?php the_title(); ?></h2>

               </div> 
                <div class="cta-text md:py-10 py-5 md:text-base text-xs  text-white">
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


<section>
<div class="relative  mt-10 mb-10">
    <div  class="flex items-center justify-between">
       
        <div class="">
            <div   class="services md:w-1/2 sm:w-1/2 w-2/3  ">
            <?php
            $services_query = new WP_Query(array(
                'post_type' => 'services',
                'posts_per_page' => -1
            ));
            
            if ($services_query->have_posts()) :
                while ($services_query->have_posts()) : $services_query->the_post(); ?>
                    <div class="service md:px-24 md:pt-24 sm:mr-14 mr-5 px-3 py-2 sm:px-10 sm:pt-12 ">
                        <div class="md:w-1/4 w">
                        <h2 class="service-title md:text-7xl sm:text-3xl">
                            <?php the_title(); ?>
                        </h2>
                        </div>
                        <div class="service-content md:w-1/2 md:py-10 sm:py-8">
                            <?php the_content(); ?>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            endif;
            ?>
        <div id="service-items" class="">
        <?php

$service_items_query = new WP_Query(array(
    'post_type' => 'service-items',
    'posts_per_page' => -1 // Display all service items
));

if ($service_items_query->have_posts()) :
    echo '<div class="grid md:grid-cols-3 sm:grid-cols-3 grid-cols-1   sm:gap-3  gap-5 md:pl-0 sm:pl-20 pl-40 md:gap-y-12 sm:gap-y-12">';
    while ($service_items_query->have_posts()) : $service_items_query->the_post(); ?>
        <div class="service-item flex">
            <h2 id="service-item-rounded"  class="service-title  flex border rounded-full md:px-12  md:py-2 sm:px-3 sm:py-2 px-2 tracking-tighter sm:text-xs text-xs md:tracking-normal md:text-base "><?php the_title(); ?></h2>
        </div>
    <?php endwhile;
    echo '</div>';
    wp_reset_postdata();
endif;

        ?>
        </div>

    </div>


            </div>
          
        </div>
</div>  
</section>

<section class="">
    <div class="relative " id="">
        <div class="  pb-5 py-5  px-10 ">
            <h1 class="md:text-7xl text-3xl">Our Work</h1>

        </div>
        <div class="   flex" id="Hunters">
            <div id="Hunters-div"   class="md:w-full  py-5 md:px-20 px-3">
            <div id="Hunters-div-sect" class="flex flex-col lg:gap-52  md:gap-32 sm:gap-36 gap-15 items-center md:text-base text-xs">
            <div id="Hunters-logo"  class="flex flex-col md:mt-10 sm:mt-6">

            </div>
            <div  id="Work-div" class="md:w-full w-3/4">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam provident voluptatem nihil omnis nostrum deleniti unde iure ex sed voluptates corporis molestias repellat, 
            </div>

            </div>

            </div>
<div class="w-1/2 ">
<div id="work-cover" class=" mr-32 mt-12 pb-5  flex items-center ">
                
                <div id="prop" class=" ">

                </div>
                <div id="Hunters-bottle" class=" mt-2 w-1/2">

                </div>
            
            </div>
</div>
            
            <div id="Made" class="mt-7">
              
            </div>
            <div id="shot" class="">
                </div>

            <div id="spray">
                <div id="shalina-logo">
                
                </div>

            </div>

            

        </div>

    </div>
</section>

<section class="">
<div class="relative mt-10 mb-10">
    <div class="flex justify-between">
        <div class="services md:w-1/2 sm:w-3/4 md:p-16 p-5 ">
            <div class="md:w-3/2 w-1/2 ">
                <div class="flex flex-col items-center justify-center">
                <p class="md:text-7xl text-6xl">Our Track Record</p>
            <p class="pt-4">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nihil natus temporibus omnis non enim, in eligendi facilis sit. Labore iste id ab obcaecati aut, quod velit beatae totam suscipit tempora?</p>

                </div>
         
            </div>
        </div>
        <div>
        <div id="stats" class="grid grid-cols-2 gap-5 md:mt-0 sm:mt-10 sm:ml-20">
    <div class="track-card bg-white shadow-lg md:w-72 md:h-52 w-44 h-32 border-t-2 border-black opacity-0 translate-y-10 transition-all duration-500">
        <div class="pt-2 md:my-16 flex flex-col my-5 items-center justify-center">
            <p class="text-4xl text-red-600 font-semibold statistic-number" data-number="20" data-symbol="+">0</p>
            <p>Years Of Experience</p>
        </div>
    </div>
    <div class="track-card bg-white shadow-lg md:w-72 md:h-52 w-44 h-32 border-t-2 border-red-500 opacity-0 translate-y-10 transition-all duration-500">
        <div class="pt-2 flex flex-col md:my-16 sm:my-5 items-center justify-center">
            <p class="text-4xl text-red-600 font-semibold statistic-number" data-number="16">0</p>
            <p>Digital Gurus</p>
        </div>
    </div>
    <div class="track-card shadow-lg bg-white md:w-72 md:h-52 w-44 h-32 border-t-2 border-red-500 opacity-0 translate-y-10 transition-all duration-500">
        <div class="pt-2 flex flex-col md:my-16 my-5 items-center justify-center">
            <p class="text-4xl text-red-600 font-semibold statistic-number" data-number="100" data-symbol="%">0</p>
            <p>Business</p>
        </div>
    </div>
    <div class="track-card shadow-lg bg-white md:w-72 md:h-52 w-44 h-32 border-t-2 border-black opacity-0 translate-y-10 transition-all duration-500">
        <div class="pt-2 flex flex-col md:my-16 my-5 items-center justify-center">
            <p class="text-4xl text-red-600 font-semibold statistic-number" data-number="1000" data-symbol="+">0</p>
            <p>Finished Projects</p>
        </div>
    </div>
</div>
         
        </div>

    </div>

    
</div> 
 </section>
 

<?php 
get_footer();
?>
