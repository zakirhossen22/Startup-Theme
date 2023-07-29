<?php
require_once('inc/codestar-framework/codestar-framework.php');

require_once('inc/widgets.php');
require_once('inc/class-tgm-plugin-activation.php');
require_once('inc/startup-activation.php');
require_once('inc/demo-data.php');
require_once('inc/sidebar.php');
require_once('inc/codestar.php');

function startup_setup(){


       add_theme_support( 'title-tag' );
       add_theme_support( 'post-thumbnails',array(
              'sliders','testimonials','team','post'
       ) );
       register_nav_menus(array(
              'primary-menu'=> __('Primary menu', 'startup'),
              'footer-1-menu'=> __('Footer 1 Menu', 'startup'),
              'footer-2-menu'=> __('Footer 2 Menu', 'startup')
       ));
       
}
add_action( 'after_setup_theme', 'startup_setup');


// ---enque-style-function-here----//
function startup_assets() {
    wp_enqueue_style( 'theme-css', get_stylesheet_uri() );
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '1.0.0', 'all' );
    wp_enqueue_style('main-css', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0.0', 'all' );
    wp_enqueue_style('animate-css', get_template_directory_uri() . '/assets/css/animate.min.css', array(), '1.0.0', 'all' );
    wp_enqueue_style('owl-css', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', array(), '1.0.0', 'all' );
    wp_enqueue_style('font-css', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '1.0.0', 'all' );
    wp_enqueue_style('favicon', get_template_directory_uri() . '/assets/img/favicon.ico', array(), '1.0.0', 'all' );
    wp_enqueue_style('nunito', 'https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap', array(), '1.0.0', 'all' );
    wp_enqueue_style('gstatic', 'https://fonts.gstatic.com', array(), '1.0.0', 'all' );
    wp_enqueue_style('fonts', 'https://fonts.googleapis.com', array(), '1.0.0', 'all' );

    wp_enqueue_script('min', get_template_directory_uri() . '/assets/js/jquery-3.4.1.min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script('wow', get_template_directory_uri() . '/assets/js/wow.min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script('waypoints', get_template_directory_uri() . '/assets/js/waypoints.min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script('counterup', get_template_directory_uri() . '/assets/js/counterup.min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script('owl', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.0', true );    
}
add_action('wp_enqueue_scripts', 'startup_assets' );




// ----jason-file-function----//

 
function startup_jason( $path ) {
    
    // update path
    $path = get_stylesheet_directory() . '/startup-jason';
    // return
    return $path;
    
}
add_filter('startup/settings/save_json', 'startup_jason');


function example_theme_support() {
    remove_theme_support( 'widgets-block-editor' );
}
add_action( 'after_setup_theme', 'example_theme_support' );


// comments-function---//
function mytheme_comment($comment, $args, $depth) {
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }?>
    <<?php echo $tag; ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID() ?>"><?php 
    if ( 'div' != $args['style'] ) { ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body"><?php
    } ?>
        <div class="comment-author vcard"><?php 
            if ( $args['avatar_size'] != 0 ) {
                echo get_avatar( $comment, $args['avatar_size'] ); 
            } 
             ?>
        </div><?php 
        ?>
         
        <div class="comment-meta commentmetadata">
            <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>"><?php
            printf( __( '<h3 class="fn">%s</h3>' ), get_comment_author_link() );
                /* translators: 1: date, 2: time */
               
                printf( 
                    __('%1$s at %2$s'), 
                    get_comment_date(),  
                    get_comment_time() 
                ); ?>
            </a><?php 
            edit_comment_link( __( '(Edit)' ), '  ', '' ); ?>
        </div>
 
        <?php comment_text(); ?>
 
        <div class="reply"><?php 
                comment_reply_link( 
                    array_merge( 
                        $args, 
                        array( 
                            'add_below' => $add_below, 
                            'depth'     => $depth, 
                            'max_depth' => $args['max_depth'] 
                        ) 
                    ) 
                ); ?>
        </div><?php 
    if ( 'div' != $args['style'] ) : ?>
        </div><?php 
    endif;
}

function move_comment_field( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}
add_filter( 'comment_form_fields', 'move_comment_field' );



function tu_comment_form_hide_cookies_consent( $fields ) {
	unset( $fields['cookies'] );
	return $fields;
}
add_filter( 'comment_form_default_fields', 'tu_comment_form_hide_cookies_consent' );




// the ajax function
add_action('wp_ajax_data_fetch' , 'data_fetch');
add_action('wp_ajax_nopriv_data_fetch','data_fetch');
function data_fetch(){

    $the_query = new WP_Query( array( 'posts_per_page' => 5, 's' => esc_attr( $_POST['keyword'] ), 'post_type' => 'post' ) );
    if( $the_query->have_posts() ) :
        while( $the_query->have_posts() ): $the_query->the_post(); ?>

            <a href="<?php echo esc_url( post_permalink() ); ?>"><?php the_title();?></a>

        <?php endwhile;
		wp_reset_postdata();  
	else: 
		echo '<h3>No Results Found</h3>';
    endif;

    die();
}
// add the ajax fetch js
add_action( 'wp_footer', 'ajax_fetch' );
function ajax_fetch() {
?>
<script type="text/javascript">
function fetchResults(){
	var keyword = jQuery('#searchInput').val();
	if(keyword == ""){
		jQuery('#datafetch').html("");
	} else {
		jQuery.ajax({
			url: '<?php echo admin_url('admin-ajax.php'); ?>',
			type: 'post',
			data: { action: 'data_fetch', keyword: keyword  },
			success: function(data) {
				jQuery('#datafetch').html( data );
			}
		});
	}
    

}
</script>

<?php
}

