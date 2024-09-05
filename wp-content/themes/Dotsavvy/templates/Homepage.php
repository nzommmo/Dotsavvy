<?php
/*
Template Name: Homepage
*/
get_header(); ?>
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
            <div>
    <img id="menu" src="wp-content/themes/Dotsavvy/assets/images/Rectangle 3 copy 22.png" alt="" class="cursor-pointer">
</div>

<nav id="menu-container" class="hidden">
    <?php
    $menu_name = 'Navbar'; // Replace with your menu slug

    wp_nav_menu(array(
        'menu' => $menu_name,
        'container' => 'div',
        'container_class' => 'ERIC', // Optional: Add a custom class for styling
        'menu_class' => 'your-menu-class', // Optional: Add a custom class for styling
    ));
    ?>
</nav>


</nav>
<script>
document.getElementById('menu').addEventListener('click', function() {
    var menuContainer = document.getElementById('menu-container');
    if (menuContainer.style.display === 'none' || menuContainer.style.display === '') {
        menuContainer.style.display = 'block'; // Show menu
    } else {
        menuContainer.style.display = 'none'; // Hide menu
    }
});
</script>

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
<section id="brands" class="flex items-center justify-center">
    <div class="brand-container">
        <?php
        $args = array(
            'post_type' => 'brand',
            'posts_per_page' => -1,
            'orderby' => 'date',
            'order' => 'ASC',
        );
        $brand_query = new WP_Query($args);
        $counter = 0;
        if ($brand_query->have_posts()) :
            while ($brand_query->have_posts()) : $brand_query->the_post();
                $brand_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
                $delay = $counter * 2; // 2 seconds delay for each image
        ?>
                <div class="brand-item opacity-0" style="--animation-delay: <?php echo esc_attr($delay); ?>s;">
                    <img src="<?php echo esc_url($brand_image); ?>" alt="<?php the_title(); ?>" class="w-full pt-3">
                </div>
        <?php
                $counter++;
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
    </div>
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
            <div class="cta-content lg:px-16 lg:pt-10 sm:px-4 px-2 rounded-md w-full" id="cta">
               <div id="cta-title" class=" tracking-tighter leading-3  pt-2">
               <h2 class="text-white lg:text-6xl md:text-md sm:text-lg  "><?php the_title(); ?></h2>

               </div> 
                <div class="cta-text lg:py-10 py-5 lg:text-md md:text-md sm:text-md text-sm text-white">
                    <p class="text-white ">  <?php the_content(); ?>
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
            <div   class="services lg:w-1/2 md:w-1/2 sm:w-1/2 w-3/5 ">
            <?php
            $services_query = new WP_Query(array(
                'post_type' => 'services',
                'posts_per_page' => -1
            ));
            
            if ($services_query->have_posts()) :
                while ($services_query->have_posts()) : $services_query->the_post(); ?>
                    <div class="service lg:px-24 lg:pt-24 sm:mr-14 mr-5 px-3 py-2 sm:px-10 sm:pt-12 ">
                        <div class="lg:w-1/2 w-full">
                        <h2 class="service-title lg:text-7xl  sm:text-3xl">
                            <?php the_title(); ?>
                        </h2>
                        </div>
                        <div class="service-content lg:w-full  md:py-10 sm:py-8">
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
    echo '<div class="grid lg:grid-cols-3 sm:grid-cols-3 grid-cols-1 lg:mt-0 sm:mt-0 mt-6  sm:gap-1  gap-3 md:pl-20 sm:pl-20 pl-44 lg:gap-y-12 sm:gap-y-6">';
    while ($service_items_query->have_posts()) : $service_items_query->the_post(); ?>
        <div class="service-item flex md:ml-10">
            <h2 id="service-item-rounded"  class="service-title  flex border rounded-full lg:px-12  md:py-2 sm:px-3 sm:py-2 px-2 tracking-tighter sm:text-xs text-xs md:tracking-normal md:text-sm "><?php the_title(); ?></h2>
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
        <div class="flex justify-between" id="Hunters">
            <div id="Hunters-div"   class="md:w-full  py-5 md:px-20 px-3">
            <div id="Hunters-div-sect" class="flex flex-col lg:gap-52  md:gap-32 sm:gap-36 gap-15 items-center md:text-base text-md">
            <div id="Hunters-logo"  class="flex flex-col md:mt-10 sm:mt-6">

            </div>
            <div  id="Work-div" class="md:w-full w-full md:text-lg sm:text-lg  text-xs">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam provident voluptatem nihil omnis nostrum deleniti unde iure ex sed voluptates corporis molestias repellat, 
            </div>

            </div>

            </div>
<div class="   ">
<div id="work-cover" class=" mt-12 mb-6  flex items-center ">
                
                <div id="prop" class=" ">

                </div>
                <div class="carousel-container md:ml-4 sm:ml-4  ml-4">
    <div class="carousel">
        <div class="carousel-slides">
            <?php
            // Query to get carousel posts
            $args = array(
                'post_type' => 'carousel',
                'posts_per_page' => -1,
                'orderby' => 'date',
                'order' => 'ASC'
            );
            $carousel_query = new WP_Query($args);

            if ($carousel_query->have_posts()) :
                while ($carousel_query->have_posts()) : $carousel_query->the_post();
                    $image = get_the_post_thumbnail_url(get_the_ID(), 'full'); // Get the featured image
            ?>
                    <div class="carousel-slide md:mt-20">
                        <img src="<?php echo esc_url($image); ?>" alt="<?php the_title(); ?>">
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
        <!--
        <a class="carousel-prev" onclick="moveSlide(-1)">&#10094;</a>
        <a class="carousel-next" onclick="moveSlide(1)">&#10095;</a>
        -->
    </div>
</div>
            

            </div>
</div>
            
           

      

    </div>
</section>

<section class="">
<div class="relative mt-10 mb-10">
    <div class="flex justify-between">
        <div class="services lg:w-1/2 sm:w-3/4 md:p-16 p-5 ">
            <div class="md:w-3/2 sm:w-1/2  w-1/3">
                <div class="flex flex-col items-center justify-center">
                <p class="md:text-7xl sm:text-5xl">Our Track Record</p>
            <p class="pt-4 md:text-xl sm:text-lg  text-xs">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nihil natus temporibus omnis non enim, in eligendi facilis sit. Labore iste id ab obcaecati aut, quod velit beatae totam suscipit tempora?</p>

                </div>
         
            </div>
        </div>
        <div>
        <div id="stats" class="grid grid-cols-2  md:gap-5 sm:gap-5 gap-3 md:mt-10 sm:mt-10 sm:ml-20 ml-6 text-xs">
    <div class="track-card bg-white shadow-lg lg:w-72 lg:h-52 sm:w-44 sm:h-32 w-24 border-t-2 border-black opacity-0 translate-y-10 transition-all duration-500">
        <div class="pt-2 lg:my-16 flex flex-col my-5 items-center justify-center">
            <p class="text-4xl text-red-600 font-semibold statistic-number" data-number="20" data-symbol="+">0</p>
            <p>Years Of Experience</p>
        </div>
    </div>
    <div class="track-card bg-white shadow-lg lg:w-72 lg:h-52 sm:w-44 sm:h-32 w-28 border-t-2 border-red-500 opacity-0 translate-y-10 transition-all duration-500">
        <div class="pt-2 flex flex-col lg:my-16 sm:my-5 items-center justify-center">
            <p class="text-4xl text-red-600 font-semibold statistic-number" data-number="16">0</p>
            <p>Digital Gurus</p>
        </div>
    </div>
    <div class="track-card shadow-lg bg-white lg:w-72 lg:h-52 sm:w-44 sm:h-32 w-28  border-t-2 border-red-500 opacity-0 translate-y-10 transition-all duration-500">
        <div class="pt-2 flex flex-col lg:my-16 my-5 items-center justify-center">
            <p class="text-4xl text-red-600 font-semibold statistic-number" data-number="100" data-symbol="%">0</p>
            <p>Business</p>
        </div>
    </div>
    <div class="track-card shadow-lg bg-white lg:w-72 lg:h-52 sm:w-44 sm:h-32 w-28 border-t-2 border-black opacity-0 translate-y-10 transition-all duration-500">
        <div class="pt-2 flex flex-col lg:my-16 my-5 items-center justify-center">
            <p class="text-4xl text-red-600 font-semibold statistic-number" data-number="1000" data-symbol="+">0</p>
            <p>Finished Projects</p>
        </div>
    </div>
</div>
         
        </div>

    </div>

    
</div> 
 </section>

<section>
<div class="relative">
        <div id="form" class="flex items-center justify-center">
            <div class="">
                <!-- Check if the form was submitted and show the success message -->
                <?php if (isset($_GET['submitted']) && $_GET['submitted'] == 'true') : ?>
                    <div id="successMessage" class="bg-green-500 text-white p-4 rounded-md mb-5">
                        Thank you! Your message has been sent.
                    </div>
                <?php endif; ?>

                <h1 class="text-white sm:text-3xl text-lg">How can we help?</h1>
                <form id="contactForm" action="<?php echo admin_url('admin-post.php'); ?>" method="post" class="pt-5 flex flex-col w-full">
                    <input type="hidden" name="action" value="submit_form">
                    <div class="flex gap-6 justify-between">
                        <input type="text" name="name" class="w-1/2 md:full sm:full bg-transparent p-1 border border-neutral-500 rounded-md text-white" placeholder="Name" required>
                        <input type="text" name="phone" class="w-1/2 md:full sm:full bg-transparent p-1 border border-neutral-500 rounded-md" placeholder="Phone" required>
                    </div>
                    <div class="mt-5">
                        <input type="email" name="email" class="w-full bg-transparent p-1 border border-neutral-500 rounded-md" placeholder="Email" required>
                    </div>
                    <div class="mt-8 text-white">
                        <h1 class="text-3xl">I'm interested in...</h1>
                        <div class="mt-3 flex flex-wrap md:gap-8 sm:gap-5 gap-3 text-xs">
                            <button type="button" class="interest-button" data-value="UI/UX">UI/UX</button>
                            <button type="button" class="interest-button" data-value="Mobile App Design">Mobile App Design</button>
                            <button type="button" class="interest-button" data-value="Email Marketing">Email Marketing</button>
                            <button type="button" class="interest-button" data-value="Social Media Mgt">Social Media Mgt</button>
                        </div>
                        <input type="hidden" name="interest" id="interestField" value="">
                        <div class="flex mt-5">
                            <input type="text" name="other" class="w-1/2 bg-transparent p-1 border border-neutral-500 rounded-md" placeholder="Other. Type Here">
                            <button class="bg-red-500 px-8 py-1 rounded-sm" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const buttons = document.querySelectorAll('.interest-button');
        const interestField = document.getElementById('interestField');

        buttons.forEach(button => {
            button.addEventListener('click', () => {
                // Remove active class from all buttons
                buttons.forEach(btn => btn.classList.remove('active'));
                
                // Add active class to clicked button
                button.classList.add('active');
                
                // Set value of hidden field
                interestField.value = button.getAttribute('data-value');
            });
        });

        // Automatically hide the success message after 3 seconds
        const successMessage = document.getElementById('successMessage');
        if (successMessage) {
            setTimeout(() => {
                successMessage.style.display = 'none';

                // Remove 'submitted' query parameter from URL
                const url = new URL(window.location.href);
                url.searchParams.delete('submitted');
                window.history.replaceState({}, document.title, url.toString());
            }, 3000); // 3000ms = 3 seconds
        }
    });
</script>

<style>
    .interest-button {
        background-color: transparent;
        border: 1px solid #ccc;
        border-radius: 12px;
        padding: 5px 15px;
        color: #fff;
        cursor: pointer;
    }

    .interest-button.active {
        background-color: #f00; /* Change to the color you prefer */
        border-color: #f00;
    }
</style>

            </div>

        </div>

    </div>
</section>

<section>
    <div class="relative mt-10">
        <div class="flex items-center justify-center fade-in-up">
            <h1 class="sm:text-4xl md:text-6xl">News & Blogs</h1>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 sm:grid-cols-3 gap-5 md:gap-12 sm:gap-6 md:m-16 sm:m-8 sm:text-sm">
            <?php
            // Query to fetch the latest 3 posts
            $recent_posts = new WP_Query(array(
                'posts_per_page' => 3, // Number of posts to display
                'orderby' => 'date',
                'order' => 'ASC'
            ));

            if ($recent_posts->have_posts()) :
                while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
                    <div class="flex flex-col fade-in-up">
                        <p class="opacity-50"><?php echo get_the_date(); ?></p>
                        <p class="md:text-2xl text-xl mt-1"><?php the_title(); ?></p>
                        <p class="md:mt-6 mt-4"><?php the_excerpt(); ?></p>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            else : ?>
                <p><?php esc_html_e('No posts found.'); ?></p>
            <?php endif; ?>
        </div>
    </div>
</section>

<section>
    <div class="relative">
        <div class="grid grid-cols-2 text-white">
            <div class="bg-red-500 flex items-center justify-center">
                <div class="flex sm:p-12 md:p-16 flex-col items- justify-center">
                    <div class="sm:w-3/2 md:w-3/2">
                    
                    <h1 class="sm:text-3xl md:text-6xl">We would love to hear from you</h1>
                    <div class="md:w-2/3">
                    <p class="mt-5">Feel free to reach out if you want to collaborate with us, simply have a chat.</p>
                    </div>
                    
                    <p class="py-5">Become a client</p>
                

                    </div>
          
                </div>
                
            </div>
            <div class="bg-black flex flex-col items-center justify-center">
                <div>
                    <ul>
                    <li>Dotsavvy Limited</li>
                    <li>Suite 25 ,Lower Duplex Apartments</li>
                    <li>Upper Hill Road,Upper Hill</li>
                    <li>Nairobi, Kenya</li>
                    </ul>
                    <div class="mt-5">
                    <ul>
                    <li>Email: info@dotsavvyafrica.com</li>
                        <li>Phone: +254208077108/9</li>
                    </ul>
                </div>
                </div>
                
            </div>

        </div>

    </div>
</section>



<?php get_footer(); ?>
