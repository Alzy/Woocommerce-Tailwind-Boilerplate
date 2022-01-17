<?php


use MyTheme\AutoLoader;
use MyTheme\Component;


/*
 * Set up our auto loading class and mapping our namespace to the app directory.
 *
 * The autoloader follows PSR4 autoloading standards so, provided StudlyCaps are used for class, file, and directory
 * names, any class placed within the app directory will be autoloaded.
 *
 * i.e; If a class named SomeClass is stored in app/SomeDir/SomeClass.php, there is no need to include/require that file
 * as the autoloader will handle that for you.
 */
require get_stylesheet_directory() . '/app/AutoLoader.php';
$loader = new AutoLoader();
$loader->register();
$loader->addNamespace( 'MyTheme', get_stylesheet_directory() . '/app' );

Component::$components_dir = get_stylesheet_directory() . '/templates/components';

require get_stylesheet_directory() . '/includes/scripts-and-styles.php';


/**
 * Declare Woocommerce Support
 */
function add_woocommerce_support() {
    add_theme_support( 'woocommerce', array(
        'thumbnail_image_width' => 480,
        'single_image_width'    => 800,

        'product_grid'          => array(
            'default_rows'    => 3,
            'min_rows'        => 2,
            'max_rows'        => 8,
            'default_columns' => 3,
            'min_columns'     => 2,
            'max_columns'     => 5,
        ),
    ) );
}
add_action( 'after_setup_theme', 'add_woocommerce_support' );
add_filter( 'woocommerce_enqueue_styles', '__return_false' );

require get_stylesheet_directory() . '/includes/product-page-ajax-add-to-cart.php';