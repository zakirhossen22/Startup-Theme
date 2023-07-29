
<?php

get_header();
?>
        <?php get_template_part( 'template-parts/breadcum'); ?>
    </div>
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


    <!-- Blog Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-8">
                    <!-- Blog Detail Start -->
                    <div class="mb-5">
                        <img class="img-fluid w-100 rounded mb-5" src="<?php the_post_thumbnail_url(); ?>" alt="">
                        <h1 class="mb-4"><?php the_title(); ?></h1>
                        <p><?php the_content(); ?></p>
                    </div>
                    <!-- Blog Detail End -->
    
                    <!-- Comment Form Start -->
                    <div class="bg-light rounded p-5">
                    <?php
                  // If comments are open or we have at least one comment, load up the comment template.
                     if ( comments_open() || get_comments_number() ) :
                        comments_template();
                     endif;
                     ?>
                        <!-- <form>
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control bg-white border-0" placeholder="Your Name" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="email" class="form-control bg-white border-0" placeholder="Your Email" style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <input type="text" class="form-control bg-white border-0" placeholder="Website" style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control bg-white border-0" rows="5" placeholder="Comment"></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Leave Your Comment</button>
                                </div>
                            </div>
                        </form> -->
                    </div>
                    <!-- Comment Form End -->
                </div>
    
                <!-- Sidebar Start -->
                <div class="col-lg-4">
                    
    
                    <!-- Category Start -->
                    <?php 
                    if(is_active_sidebar('sidebar-1')){
                        dynamic_sidebar('sidebar-1');
                    }
                    
                    
                    ?>
                    <!-- Plain Text End -->
                </div>
                <!-- Sidebar End -->
            </div>
        </div>
    </div>
    <!-- Blog End -->


    <!-- Vendor Start -->
    <?php get_template_part('template-parts/image-carousel'); ?>
    <!-- Vendor End -->
    

<?php get_footer(); ?>