<?php

get_header();

/*
Template Name: Price Template

*/

?>
        <?php get_template_part( 'template-parts/breadcum'); ?>
    </div>
    <!-- Navbar End -->

    <!-- Pricing Plan Start -->
    <?php get_template_part('template-parts/pricing'); ?>
    <!-- Pricing Plan End -->


    <!-- Quote Start -->
    <?php get_template_part('template-parts/quote'); ?>
    <!-- Quote End -->


    <!-- Vendor Start -->
    <?php get_template_part('template-parts/image-carousel'); ?>
    <!-- Vendor End -->
    

<?php get_footer(); ?>