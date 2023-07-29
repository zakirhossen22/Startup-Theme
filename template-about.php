<?php

get_header();

/*
Template Name: About Template

*/

?>
        <?php get_template_part( 'template-parts/breadcum'); ?>
    <!-- Navbar End -->


    <!-- Full Screen Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        <input type="text" class="form-control bg-transparent border-primary p-3" placeholder="Type search keyword">
                        <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Full Screen Search End -->


    <!-- About Start -->
   <?php get_template_part('template-parts/about'); ?>
    <!-- About End -->


    <!-- Team Start -->
    <?php get_template_part('template-parts/team'); ?>
    <!-- Team End -->


    <!-- Vendor Start -->
    <?php get_template_part('template-parts/image-carousel'); ?>
    <!-- Vendor End -->
    
<?php get_footer(); ?>