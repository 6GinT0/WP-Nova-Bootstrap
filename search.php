<?php get_header(); ?>
    <div class="container mt-5">
        <?php 
            while(have_posts()): the_post();
                get_template_part( 'src/template-parts/content', 'search' );
            endwhile;
        ?>
    </div>
<?php get_footer(); ?>
