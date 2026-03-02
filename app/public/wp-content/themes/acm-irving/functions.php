<?php
/**
 * ACM Irving Theme Functions
 */

// ── Enqueue Styles & Scripts ──────────────────────────────────────
function acm_irving_enqueue_assets() {

    // Google Fonts
    wp_enqueue_style(
        'acm-google-fonts',
        'https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,400;0,700;0,900;1,400&family=Source+Sans+3:wght@300;400;500;600;700&display=swap',
        [],
        null
    );

    // CSS Variables (load first — everything depends on these)
    wp_enqueue_style(
        'acm-variables',
        get_template_directory_uri() . '/css/variables.css',
        ['acm-google-fonts'],
        '1.0.0'
    );

    // Typography
    wp_enqueue_style(
        'acm-typography',
        get_template_directory_uri() . '/css/typography.css',
        ['acm-variables'],
        '1.0.0'
    );

    // Layout
    wp_enqueue_style(
        'acm-layout',
        get_template_directory_uri() . '/css/layout.css',
        ['acm-variables'],
        '1.0.0'
    );

    // Buttons
    wp_enqueue_style(
        'acm-buttons',
        get_template_directory_uri() . '/css/buttons.css',
        ['acm-variables'],
        '1.0.0'
    );

    // Header
    wp_enqueue_style(
        'acm-header',
        get_template_directory_uri() . '/css/header.css',
        ['acm-variables'],
        '1.0.0'
    );

    // Footer
    wp_enqueue_style(
        'acm-footer',
        get_template_directory_uri() . '/css/footer.css',
        ['acm-variables'],
        '1.0.0'
    );

    // Responsive (load last)
    wp_enqueue_style(
        'acm-responsive',
        get_template_directory_uri() . '/css/responsive.css',
        ['acm-variables'],
        '1.0.0'
    );

    // Main JS
    wp_enqueue_script(
        'acm-main',
        get_template_directory_uri() . '/js/main.js',
        [],
        '1.0.0',
        true // load in footer
    );
}
add_action( 'wp_enqueue_scripts', 'acm_irving_enqueue_assets' );


// ── Theme Supports ────────────────────────────────────────────────
function acm_irving_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', [
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ]);
    add_theme_support( 'custom-logo', [
        'height'      => 72,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ]);

    // Register navigation menus
    register_nav_menus([
        'primary' => __( 'Primary Navigation', 'acm-irving' ),
        'footer'  => __( 'Footer Navigation', 'acm-irving' ),
    ]);
}
add_action( 'after_setup_theme', 'acm_irving_setup' );