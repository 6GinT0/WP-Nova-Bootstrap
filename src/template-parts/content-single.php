<article id="post-<?php the_ID(); ?>" <?php post_class(array('class' => 'featured mb-3')); ?>>
    <div class="thumbnail">
        <img 
            src="<?php echo get_the_post_thumbnail_url(); ?>" 
            class="rounded object-fit-cover"
            height="250"
            width="100%"
            alt="<?php the_title(); ?>"
        >
    </div>
    <div class="mb-3">
        <span> Published: <?php echo get_the_date(); ?> by <?php the_author_posts_link(); ?> | </span>
        <?php 
            $categories = get_the_category();
            
            if ( ! empty( $categories ) ) {
                foreach ( $categories as $category ) {
                    echo '<span class="badge bg-primary">' . esc_html( $category->name ) . '</span> ';
                }
            }
        ?>
    </div>
    <h1>
        <?php the_title(); ?>
    </h1>
    <div>
        <?php the_content(); ?>
    </div>
</article>