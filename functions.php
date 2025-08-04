<?php

// Customizer
require get_template_directory() . '/src/includes/customizer.php';

// TGM Plugin Activation
require_once get_template_directory() . '/src/includes/class-tgm-plugin-activation.php';
require_once get_template_directory() . '/src/includes/required-plugins.php';


add_action( 'wp_enqueue_scripts', 'load_theme_scripts' );
function load_theme_scripts() {
    // CSS Files
    wp_enqueue_style( 'template-style', get_template_directory_uri() . '/src/css/template.css' );
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css');
    wp_enqueue_style('bootstrap-icons-css', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css');
    wp_enqueue_style('aos-css', 'https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css');
    wp_enqueue_style('glightbox-css', 'https://cdnjs.cloudflare.com/ajax/libs/glightbox/3.3.1/css/glightbox.min.css');
    wp_enqueue_style('swiper-css', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.css');


    // JavaScript Files
    wp_enqueue_script( 'theme-js', get_template_directory_uri() . '/src/js/theme.js');
    wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/src/js/custom.js', array(), false, true);
    wp_enqueue_script( 'bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js', array(), false, true);
    wp_enqueue_script( 'popper-js', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js', array(), false, true);
    wp_enqueue_script( 'aos-js', 'https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js', array(), false, true);
    wp_enqueue_script( 'gsap-js', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.13.0/gsap.min.js', array(), false, true);
    wp_enqueue_script( 'glightbox-js', 'https://cdnjs.cloudflare.com/ajax/libs/glightbox/3.3.1/js/glightbox.min.js', array(), false, true);
    wp_enqueue_script( 'swiper-js', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.js', array(), false, true);
    wp_enqueue_script( 'isotope-js', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js', array(), false, true);
    wp_enqueue_script( 'imagesloaded-js', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/5.0.0/imagesloaded.pkgd.min.js', array(), false, true);
    wp_enqueue_script( 'purecounter-js', 'https://cdn.jsdelivr.net/npm/@srexi/purecounterjs@1.5.0/dist/purecounter_vanilla.min.js', array(), false, true);
}

add_action( 'wp_head', 'learnwp_load_fonts' ); 
function learnwp_load_fonts() { 
    ?> 
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&amp;display=swap" rel="stylesheet">
    <?php
}

add_action( 'after_setup_theme', 'learwp_config', 0 );
function learwp_config() {
    // Registrar menú
    register_nav_menus(
        array(
            'main_menu' => __( 'Header', 'learn-wp' ),
            'footer_menu' => __( 'Footer', 'learn-wp' )
        )
    );

    $args = array(
        'height' => 225,
        'width' => 1920
    );
    add_theme_support( 'custom-header', $args );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'custom-logo', array(
        'height' => 110,
        'width' => 200
    ));

    $textdomain = 'learn-wp';
    load_theme_textdomain($textdomain, get_stylesheet_directory() . '/languages');
    load_theme_textdomain($textdomain, get_template_directory() . '/languages');
}

add_action( 'widgets_init', 'learnwp_sidebars' );
function learnwp_sidebars() {
    register_sidebar(array(
        'name' => __( 'Home Page Sidebar', 'learn-wp' ),
        'id' => 'sidebar-1',
        'description' => __( 'Este es el sidebar del inicio. Añada los widges que desee.', 'learn-wp' ),
        'before_widget' => '<div class="widget-wrapper">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>'
    ));

    register_sidebar(array(
        'name' => __('Blog Sidebar', 'learn-wp'),
        'id' => 'sidebar-2',
        'description' => __( 'Este es el sidebar del blog. Añada los widges que desee.', 'learn-wp' ),
        'before_widget' => '<div class="widget-wrapper">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>'
    ));

    register_sidebar(array(
        'name' => __( 'Social Icons', 'learn-wp' ),
        'id' => 'social-media',
        'description' => __( 'Social icons widgets', 'learn-wp' ),
        'before_widget' => '<div class="widget-wrapper">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>'
    ));
}

function bootstrap_the_posts_pagination() {
    $links = paginate_links([
        'mid_size'  => 2,
        'type'      => 'array',
    ]);

    if (is_array($links)) {
        echo '<nav aria-label="Page navigation">';
        echo '<ul class="pagination justify-content-center">';

        foreach ($links as $link) {
            if (strpos($link, 'current') !== false) {
                echo '<li class="page-item active" aria-current="page">' . str_replace('page-numbers', 'page-link', $link) . '</li>';
            } elseif (strpos($link, 'dots') !== false) {
                echo '<li class="page-item disabled">' . str_replace('page-numbers', 'page-link', $link) . '</li>';
            } else {
                echo '<li class="page-item">' . str_replace('page-numbers', 'page-link', $link) . '</li>';
            }
        }

        echo '</ul>';
        echo '</nav>';
    }
}

include_once get_template_directory() . '/src/class/class-bootstrap-walker.php';