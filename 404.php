<?php get_header(); ?>
<div class="text-dark">
    <div class="d-flex align-items-center justify-content-center px-2" style="min-height: 75vh;">
        <div class="text-center">
            <h1 class="display-1 fw-bold">404</h1>
            <p class="fs-2 fw-medium mt-4"><?php _e( 'Oops! Page not found', 'learn-wp' ); ?></p>
            <p class="mt-4 mb-5">
                <?php _e( "The page you're looking for doesn't exist or has been moved.", 'learn-wp' ); ?>
            </p>
            <a href="<?php echo home_url(); ?>" class="btn btn-light fw-semibold rounded-pill px-4 py-2 custom-btn">
                <?php _e( 'Go Home', 'learn-wp' ); ?>
            </a>
        </div>
    </div>
</div>
<?php get_footer(); ?>