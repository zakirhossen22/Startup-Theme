<?php

get_header();

/*
Template Name: Contact Template

*/

?>
        <?php get_template_part( 'template-parts/breadcum'); ?>
        <?php $options = get_option( 'my_framework' ); ?>
    <!-- Navbar End -->
>

    <!-- Contact Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase"><?php echo $options['cont_section_title']; ?></h5>
                <h1 class="mb-0"><?php echo $options['cont_section_des']; ?></h1>
            </div>
            <div class="row g-5 mb-5">
                <?php
                $contacts = $options['contacts_repeater'];
                foreach($contacts as $contact){
                ?>
                <div class="col-lg-4">
                    <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.1s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                            <i class="fa <?php echo $contact['cont_infos_icon']; ?> text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2"><?php echo $contact['cont_infos_title']; ?></h5>
                            <h4 class="text-primary mb-0"><?php echo $contact['cont_infos_text']; ?></h4>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
            <div class="row g-5">
                <div class="col-lg-6 wow slideInUp" data-wow-delay="0.3s">
                    <form action="https://formsubmit.co/zakirhossenbdt@gmail.com" method="POST">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <input type="text" class="form-control border-0 bg-light px-4" placeholder="Your Name" style="height: 55px;">
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="form-control border-0 bg-light px-4" placeholder="Your Email" style="height: 55px;">
                            </div>
                            <div class="col-12">
                                <input type="text" class="form-control border-0 bg-light px-4" placeholder="Subject" style="height: 55px;">
                            </div>
                            <div class="col-12">
                                <textarea class="form-control border-0 bg-light px-4 py-3" rows="4" placeholder="Message"></textarea>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 wow slideInUp" data-wow-delay="0.6s">
                    <?php $maps = $options['google_map']; ?>
                    <iframe src="https://maps.google.com/maps?q=<?php echo $maps['latitude'];?>,
                        <?php echo $maps['longitude'];?>&z=15&output=embed" style="width:100%;height:100%;"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


    <!-- Vendor Start -->
    <?php get_template_part('template-parts/image-carousel'); ?>
    <!-- Vendor End -->
    
<?php get_footer(); ?>