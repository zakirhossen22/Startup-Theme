<?php

get_header();

?>
        <?php get_template_part( 'template-parts/breadcum'); ?>
    </div>
    <!-- Navbar End -->


    <!-- Blog Start -->
    <div class="container-fluid py-5 wow fadeInUp zakir" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <!-- Blog list Start -->
                <div class="col-lg-8">
                    <div class="row g-5">
                    <?php
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 10
                );
                $query = new WP_Query($args);
                while($query->have_posts()){
                    $query-> the_post();

                    $author_id = get_the_author_meta( 'ID' );
                   $author_name = get_the_author_meta( 'display_name', $author_id );
                   $post_date = get_the_date( 'j F, Y' );
                   $cats = get_the_category();
                    ?>
                    <div class="col-lg-6 wow slideInUp" data-wow-delay="0.3s">
                    <div class="blog-item bg-light rounded overflow-hidden">
                        <div class="blog-img position-relative overflow-hidden">
                            <img class="img-fluid" src="<?php the_post_thumbnail_url(); ?>" alt="">
                            <a class="position-absolute top-0 start-0 bg-primary text-white rounded-end mt-5 py-2 px-4" href="<?php echo get_category_link( $cats[0]->term_id); ?>"><?php echo $cats[0]->name; ?></a>
                        </div>
                        <div class="p-4">
                            <div class="d-flex mb-3">
                                <small class="me-3"><i class="far fa-user text-primary me-2"></i><?php echo $author_name; ?></small>
                                <small><i class="far fa-calendar-alt text-primary me-2"></i><?php echo $post_date;?></small>
                            </div>
                            <h4 class="mb-3"><?php the_title(); ?></h4>
                            <p><?php the_excerpt(); ?></p>
                            <a class="text-uppercase" href="<?php the_permalink(); ?>">Read More <i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
                        <div class="col-12 wow slideInUp" data-wow-delay="0.1s">
                            <nav aria-label="Page navigation">
                              <ul class="pagination pagination-lg m-0">
                                <li class="page-item disabled">
                                  <a class="page-link rounded-0" href="#" aria-label="Previous">
                                    <span aria-hidden="true"><i class="bi bi-arrow-left"></i></span>
                                  </a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                  <a class="page-link rounded-0" href="#" aria-label="Next">
                                    <span aria-hidden="true"><i class="bi bi-arrow-right"></i></span>
                                  </a>
                                </li>
                              </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- Blog list End -->
    
                <!-- Sidebar Start -->
                <div class="col-lg-4">
                  
    
                    <!-- Category Start -->
                    <?php
                    if(is_active_sidebar('sidebar-1')){
                        dynamic_sidebar('sidebar-1');
                    }
                    
                    ?>
                    <!-- Category End -->
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