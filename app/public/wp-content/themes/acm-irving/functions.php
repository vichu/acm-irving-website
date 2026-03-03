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


// ── Events Custom Post Type ───────────────────────────────────────
function acm_irving_register_events() {
    register_post_type( 'acm_event', [
        'labels' => [
            'name'               => 'Events',
            'singular_name'      => 'Event',
            'add_new'            => 'Add New Event',
            'add_new_item'       => 'Add New Event',
            'edit_item'          => 'Edit Event',
            'new_item'           => 'New Event',
            'view_item'          => 'View Event',
            'search_items'       => 'Search Events',
            'not_found'          => 'No events found',
            'not_found_in_trash' => 'No events found in Trash',
            'menu_name'          => 'Events',
        ],
        'public'        => true,
        'show_in_menu'  => true,
        'menu_icon'     => 'dashicons-calendar-alt',
        'menu_position' => 5,
        'supports'      => [ 'title', 'editor', 'thumbnail' ],
        'has_archive'   => false,
        'rewrite'       => [ 'slug' => 'events' ],
        'show_in_rest'  => true,
    ]);
}
add_action( 'init', 'acm_irving_register_events' );


// ── Event Custom Meta Fields ──────────────────────────────────────
function acm_irving_event_meta_box() {
    add_meta_box(
        'acm_event_details',
        'Event Details',
        'acm_irving_render_event_meta',
        'acm_event',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'acm_irving_event_meta_box' );

function acm_irving_render_event_meta( $post ) {
    wp_nonce_field( 'acm_event_meta', 'acm_event_nonce' );
    $date     = get_post_meta( $post->ID, '_event_date', true );
    $time     = get_post_meta( $post->ID, '_event_time', true );
    $location = get_post_meta( $post->ID, '_event_location', true );
    $rsvp_url = get_post_meta( $post->ID, '_event_rsvp_url', true );
    $ticket   = get_post_meta( $post->ID, '_event_ticket', true );
    ?>
    <style>
        .acm-meta-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; padding: 8px 0; }
        .acm-meta-field { display: flex; flex-direction: column; gap: 6px; }
        .acm-meta-field label { font-weight: 600; font-size: 13px; }
        .acm-meta-field input { padding: 6px 10px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px; }
        .acm-meta-full { grid-column: 1 / -1; }
    </style>
    <div class="acm-meta-grid">
        <div class="acm-meta-field">
            <label for="event_date">📅 Event Date <span style="color:red">*</span></label>
            <input type="date" id="event_date" name="event_date" value="<?php echo esc_attr($date); ?>" required/>
        </div>
        <div class="acm-meta-field">
            <label for="event_time">🕕 Time (e.g. 6:00 – 8:30 PM)</label>
            <input type="text" id="event_time" name="event_time" value="<?php echo esc_attr($time); ?>" placeholder="6:00 – 8:30 PM"/>
        </div>
        <div class="acm-meta-field">
            <label for="event_location">📍 Location</label>
            <input type="text" id="event_location" name="event_location" value="<?php echo esc_attr($location); ?>" placeholder="Irving Convention Center"/>
        </div>
        <div class="acm-meta-field">
            <label for="event_ticket">🎟 Ticket / Entry Info</label>
            <input type="text" id="event_ticket" name="event_ticket" value="<?php echo esc_attr($ticket); ?>" placeholder="Free for Members"/>
        </div>
        <div class="acm-meta-field acm-meta-full">
            <label for="event_rsvp_url">🔗 RSVP / Registration URL</label>
            <input type="url" id="event_rsvp_url" name="event_rsvp_url" value="<?php echo esc_attr($rsvp_url); ?>" placeholder="https://..."/>
        </div>
    </div>
    <?php
}

function acm_irving_save_event_meta( $post_id ) {
    if ( ! isset( $_POST['acm_event_nonce'] ) ) return;
    if ( ! wp_verify_nonce( $_POST['acm_event_nonce'], 'acm_event_meta' ) ) return;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    $fields = [
        '_event_date'     => 'event_date',
        '_event_time'     => 'event_time',
        '_event_location' => 'event_location',
        '_event_rsvp_url' => 'event_rsvp_url',
        '_event_ticket'   => 'event_ticket',
    ];

    foreach ( $fields as $meta_key => $field_name ) {
        if ( isset( $_POST[$field_name] ) ) {
            update_post_meta( $post_id, $meta_key, sanitize_text_field( $_POST[$field_name] ) );
        }
    }
}
add_action( 'save_post_acm_event', 'acm_irving_save_event_meta' );
