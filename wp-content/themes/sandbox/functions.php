<?php
  /*
    ===========================================
          ENABLES WORDPRESS FEATURED IMAGES
    ===========================================
  */
  add_theme_support( 'post-thumbnails' );

  function create_posttype() {

    register_post_type( 'book',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Books' ),
                'singular_name' => __( 'Book' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'book'),
            'show_in_rest' => true,
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );
add_action('init', 'create_book_taxonomy', 0);

function create_book_taxonomy(){
      $labels = array(
        'name' => _x( 'Book Genre', 'taxonomy general name' ),
        'singular_name' => _x( 'Book Genre', 'taxonomy singular name' ),
        'search_items' => __("Search Book Genre"),
        'all_items' => __("All Book Genre"),
        'parent_item' => __( "Parent Book Genre" ),
        'parent_item_colon' => __( "Parent Book Genre:" ),
        'edit_item' => __( "Edit Book Genre" ),
        'update_item' => __( "Update Book Genre" ),
        'add_new_item' => __( "Add new Book Genre" ),
        'new_item_name' => __( "New Book Genre name" ),
        'menu_name' => __( 'Book Genre' ),
      );

      register_taxonomy('book_genre', array('book'),array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'book-genre' ),
      ));
  }

  function misha_my_load_more_scripts() {

  	$wp_query = $_SESSION['query'];
  	// In most cases it is already included on the page and this line can be removed
  	wp_enqueue_script('jquery');

  	// register our main script but do not enqueue it yet
  	wp_register_script( 'my_loadmore', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery') );

  	// now the most interesting part
  	// we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
  	// you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
  	wp_localize_script( 'my_loadmore', 'misha_loadmore_params', array(
  		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
  		'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
  		'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
  		'max_page' => $wp_query->max_num_pages
  	) );

   	wp_enqueue_script( 'my_loadmore' );
  }

  add_action( 'wp_enqueue_scripts', 'misha_my_load_more_scripts' );


  function misha_loadmore_ajax_handler(){

    	// prepare our arguments for the query
    	$args = json_decode( stripslashes( $_POST['query'] ), true );
    	$args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
    	$args['post_status'] = 'publish';

    	// it is always better to use WP_Query but not here
    	query_posts( $args );

    	if( have_posts() ) :

    		// run the loop
    		while( have_posts() ): the_post();
    			// look into your theme code how the posts are inserted, but you can use your own HTML of course
    			// do you remember? - my example is adapted for Twenty Seventeen theme
    			get_template_part( 'template-parts/book/content', get_post_format() );
    			// for the test purposes comment the line above and uncomment the below one
    			// the_title();


    		endwhile;

    	endif;
    	die; // here we exit the script and even no wp_reset_query() required!
    }


add_action('wp_ajax_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}


?>
