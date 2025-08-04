<?php

function learnwp_customizer( $wp_customize ) {
    // Copyright
    $wp_customize->add_section( 'sec_copyright', array(
        'title' => 'Copyright',
        'description' => 'Please type your copyright message'
    ) );

    $wp_customize->add_setting( 'set_copyright', array(
        'type' => 'theme_mod',
        'default' => 'Copyright X - All Right Reserved',
        'sanitize_callback' => 'esc_attr'
    ) );

    $wp_customize->add_control( 'ctrl_copyright', array(
        'label' => 'Copyright information',
        'description' => 'Copyright X - All Right Reserved',
        'section' => 'sec_copyright',
        'settings' => 'set_copyright',
        'type' => 'text'
    ) );
}

add_action( 'customize_register', 'learnwp_customizer' );