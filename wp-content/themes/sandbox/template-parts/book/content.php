<div class="card-grid-space">
  <a class="card" href="<?php the_permalink(); ?>" style="--bg-img: url(<?php echo get_the_post_thumbnail_url(); ?>)">
    <div>
      <h1><?php the_title(); ?></h1>
      <div class="date"><?php the_time( get_option( 'date_format' ) ); ?></div>
      <div class="tags">
        <?php $term = get_the_terms($post->ID, 'book_genre');?>
        <div class="tag"><?php echo $term[0]->name; ?></div>
      </div>
    </div>
  </a>
</div>
