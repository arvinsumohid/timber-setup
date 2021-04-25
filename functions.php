<?php
require_once __DIR__ . '/vendor/autoload.php';

/**
 * Banner ACF Block
 * @see banner()
 * @see banner_block_reder_callback()
*/
add_action( 'acf/init', 'banner' );
function banner() {
    if( !function_exists('acf_register_block') )
        return;

        acf_register_block( array(
            'name'            => 'banner',
            'title'           => __( 'Banner', 'banner-title' ),
            // 'description'     => __( 'A custom example block.', 'banner-description' ),
            'render_callback' => 'banner_block_render_callback',
            'category'        => 'formatting',
            'icon'            => 'admin-comments',
            'keywords'        => array( 'banner','backgroun', 'image', 'content' ),
        ) );
    
}

function banner_block_render_callback( $block, $content = '', $is_preview = false ) {
    $context = Timber::context();

        // Store block values.
        $context['block'] = $block;

        // Store field values.
        $context['fields'] = get_fields();
    
        // Store $is_preview value.
        $context['is_preview'] = $is_preview;
    
        // Render the block.
        Timber::render( 'views/block/banner.twig', $context );
}


function acf_block_editor_style() {
    wp_enqueue_style(
        'app-css',
        get_template_directory_uri() . '/assets/dist/css/app.css'
    );
}

add_action( 'enqueue_block_assets', 'acf_block_editor_style' );