<?php
  get_header();
?>
<!--
  =========================================
                SINGLE.PHP
  =========================================

  This page is the default template file for all blog posts
  if you need to make a page for a full theme website it's
  "page.php". All the code is the exact same, but both files
  are for different purposes.

  We need a slightly different loop for this page,
  otherwise it will pull in all the other blog posts.
  The loop will check the database to see if there
  is a blog post which matches the url, then
  the loop will loop through all the content in the
  db.
-->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <?php the_title(); ?> <!-- The blog post title -->
      <?php the_content(); ?> <!-- The blog post text extract -->
      <?php the_permalink(); ?><!-- The blog post link, URL  -->
      <?php the_date(); ?> <!-- Returns the post date -->
      <?php the_time( get_option( 'date_format' ) ); ?> <!-- Fixes the date not being shown on all posts -->

      <!--
        ==============================
          PREVIOUS AND NEXT LINKS
        ==============================

        To be used like the ones from physio123.org
      -->
      <div class="posts clearfix">
          <div class="prev">
            <i class="fa fa-chevron-left"></i>
            <?php previous_post_link('%link');?>
          </div>
          <div class="next"><?php next_post_link('%link'); ?> <i class="fa fa-chevron-right"></i></div>
      </div>

<?php endwhile; else : ?>
  <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

<?php
  get_footer();
?>
