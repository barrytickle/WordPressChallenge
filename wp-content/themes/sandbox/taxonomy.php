<?php
  get_header();

?>
<!--
  =========================================
                INDEX.PHP
  =========================================
  The fallback page for wordpress, by default wordpress will use
  this template for everything, this will be the homepage
  of the blog where all the blog posts are generated.
-->

<h1>taxonomy</h1>
<?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );?>
<?php
  $wp_query = new WP_Query(array('post_type'=>'book','post_status'=>'publish', 'posts_per_page'=>8, 'tax_query' => array( array( 'taxonomy' => 'book_genre', 'field' => 'slug', 'terms' => $term->slug ), ), 'paged' => 1));
  $_SESSION['query'] = $wp_query;
?>
<section class="cards-wrapper">
  <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
    <?php get_template_part( 'template-parts/book/content', get_post_format() ); ?>
  <?php endwhile; ?>
</section>


<?php
if (  $wp_query->max_num_pages > 1 ):
	echo '<div class="misha_loadmore">More books</div>'; // you can use <a> as well
endif;
?>

<?php
  get_footer();
?>
