<?php get_header(); ?>
    <div class="container mt-5">
        <?php 
            while(have_posts()): the_post();
                get_template_part( 'src/template-parts/content', 'single' );

                if( comments_open() || get_comments_number()):
                    comments_template();
                endif;
            endwhile;
        ?>
    </div>
<?php get_footer(); ?>
