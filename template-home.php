<?php get_header();  
/*

Template Name: Home Template

*/

?>
<?php $options = get_option( 'my_framework' ); ?>
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php
                $args = array(
                    'post_type'=> 'sliders',
                    'posts_per_page' => 3
                );
                $query = new WP_Query($args);
                $i = 0;
                if($query-> have_posts()){
                    while($query -> have_posts()){
                        $query-> the_post();
                        $i++;
                        ?>
                         <div class="carousel-item <?php if($i== 1) {echo 'active';} ?>">
                        <img class="w-100" src="<?php the_post_thumbnail_url();  ?>" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 900px;">
                                <h5 class="text-white text-uppercase mb-3 animated slideInDown"><?php the_field('slider_sub_title'); ?></h5>
                                <h1 class="display-1 text-white mb-md-4 animated zoomIn"><?php the_title(); ?></h1>
                                <a href="<?php the_field('slider_btn1_url'); ?>" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft"><?php the_field('slider_btn1_text'); ?></a>
                                <a href="<?php the_field('slider_btn2_url'); ?>" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight"><?php the_field('slider_btn2_text'); ?></a>
                            </div>
                        </div>
                    </div>
                        <?php
                    }
                }
                ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Navbar & Carousel End -->

    <!-- Facts Start -->
    <div class="container-fluid facts py-5 pt-lg-0">
        <div class="container py-5 pt-lg-0">
            <div class="row gx-0">
                <?php
                $counters = $options['counter_sec']; 
                $i = 0;
                foreach($counters as $counter){
                $i++;

                ?>
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.1s">
                    <div class="<?php if(($i % 2) ==0) {echo 'bg-light shadow d-flex align-items-center justify-content-center p-4';} else{echo 'bg-primary shadow d-flex align-items-center justify-content-center p-4';} ?> " style="height: 150px;">
                        <div class="<?php  if(($i % 2) ==0) {echo 'bg-primary';} else{echo 'bg-white';} ?> d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
                        <i class=" fa <?php echo $counter['counter_icon']; ?> <?php if(($i % 2) ==0) {echo 'text-white';} else{echo 'text-primary';} ?>"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="<?php if(($i % 2) ==0) {echo 'text-primary mb-0';} else{echo 'text-white mb-0';} ?>"><?php echo $counter['counter_title']; ?></h5>

                            <h1 class="<?php if(($i % 2) ==0) {echo 'text-primary mb-0';} else{echo 'text-white mb-0';} ?>" data-toggle="counter-up"><?php echo $counter['counter_number']; ?></h1>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <!-- Facts Start -->


    <!-- About Start -->
   <?php get_template_part('template-parts/about'); ?>
    <!-- About End -->


    <!-- choose Start -->
    <?php get_template_part('template-parts/choose'); ?>
    
    <!-- Features Start -->


    <!-- Service Start -->
    <?php get_template_part('template-parts/service'); ?>
    <!-- Service End -->


    <!-- Pricing Plan Start -->
    <?php get_template_part('template-parts/pricing'); ?>
    <!-- Pricing Plan End -->


    <!-- Quote Start -->
    <?php get_template_part('template-parts/quote'); ?>
    <!-- Quote End -->


    <!-- Testimonial Start -->
    <?php get_template_part('template-parts/testimonial'); ?>
    
    <!-- Testimonial End -->


    <!-- Team Start -->
    <?php get_template_part('template-parts/team'); ?>
    
    <!-- Team End -->


    <!-- Blog Start -->
    <?php get_template_part('template-parts/blog'); ?>
    
    <!-- Blog Start -->


    <!-- Vendor Start -->
    <?php get_template_part('template-parts/image-carousel'); ?>
    <!-- Vendor End -->
<?php get_footer(); ?>