<?php

use function PHPSTORM_META\type;

 get_header(); ?>
    <img
        class="img-fluid" 
        src="<?php header_image(); ?>" 
        height="<?php echo get_custom_header()->height; ?>"
        width="<?php echo get_custom_header()->width; ?>"
    >
    <div class="content-area">
        <main>
            <section class="middle-area">
                <div class="container">
                    <div class="row mt-5">
                        <div class="news col-md-9" data-aos="fade-up" data-aos-delay="0">
                            <?php 
                                if (have_posts()):
                                    while (have_posts()): the_post();
                                        get_template_part( 'src/template-parts/content' );
                                    endwhile;
       
                                    bootstrap_the_posts_pagination(); 
                                else:
                            ?>
                                <div class="alert alert-danger" role="alert">There are no posts to display</div>
                            <?php 
                                endif; 
                            ?>        
                        </div>
                        <aside class="sidebar col-md-3 h-100" data-aos="fade-up" data-aos-delay="0">
                            <?php get_sidebar( 'blog' ); ?>
                        </aside>
                    </div>
                </div>
            </section>

            <section class="map" data-aos="fade-up" data-aos-delay="0">Map</section>
        </main>
    </div>
<?php get_footer(); ?>
