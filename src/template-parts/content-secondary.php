<article <?php post_class(array('class' => 'secondary card')); ?>>
    <div class="thumbnail">
        <img 
            src="<?php echo get_the_post_thumbnail_url(); ?>" 
            class="rounded object-fit-cover"
            height="200"
            width="100%"
            alt="<?php the_title(); ?>"
        >
    </div>
    <div class="card-body">
        <div class="mb-3">
            <?php 
                $categories = get_the_category();
                    if ( ! empty( $categories ) ) {
                        foreach ( $categories as $category ) {
                            echo '<span class="badge bg-primary">' . esc_html( $category->name ) . '</span> ';
                        }
                    }
            ?>
        </div>
        <h5 class="card-title">
            <?php the_title(); ?>
        </h5>
        <p><?php the_excerpt(); ?></p>
        <a href="<?php the_permalink(); ?>" class="btn bg-primary text-light">See more</a>
    </div>
</article>