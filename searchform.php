<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label>
        <span class="screen-reader-text"><?php _e( 'Search for:', 'learn-wp' ); ?></span>
        <div class="input-group">
            <input type="search" class="search-field form-control" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'learn-wp' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
            <button type="submit" class="search-submit btn bg-primary text-light">
                <?php _e( 'Search', 'learn-wp' ); ?>
            </button>
            <input type="hidden" name="post_type" value="post" />
        </div>
    </label>
</form>