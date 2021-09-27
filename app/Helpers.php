<?php

namespace MyTheme;

use WP_Error;
use WP_Query;
use WP_Term;

class Helpers {
    /**
     * @param int $posts_per_page
     * @param string $order_by
     * @return WP_Query
     */
    public static function getFeaturedProducts (int $posts_per_page=6, string $order_by='menu_order'): WP_Query {
        $args = array(
            'post_type' => 'product',
            'post_status' => 'publish',
            'posts_per_page' => $posts_per_page,
            'orderby' => $order_by,
            'order' => 'asc',
            'post__in' => wc_get_featured_product_ids(),
        );

        return new WP_Query( $args );
    }


    /**
     * @param string $category
     * @param int $posts_per_page
     * @param string $order_by
     * @return WP_Query
     */
    public static function getCategoryProducts (string $category, int $posts_per_page=6, string $order_by='menu_order'): WP_Query {
        $args = array(
            'post_type' => 'product',
            'post_status' => 'publish',
            'posts_per_page' => $posts_per_page,
            'orderby' => $order_by,
            'order' => 'asc',
            'tax_query' => array(
                array(
                    'taxonomy' => 'product_cat',
                    'field' => 'slug',
                    'terms' => $category, /*category name*/
                    'operator' => 'IN',
                )
            ),
        );

        return new WP_Query( $args );
    }


    /**
     * @param int $product_id
     * @param int $posts_per_page
     * @param string $order_by
     * @return WP_Query
     */
    public static function getRelatedProducts (int $product_id, int $posts_per_page=3, string $order_by='menu_order'): WP_Query {
        $args = array(
            'post_type' => 'product',
            'post_status' => 'publish',
            'posts_per_page' => $posts_per_page,
            'orderby' => $order_by,
            'order' => 'asc',
            'post__in' => wc_get_related_products($product_id, $posts_per_page),
        );

        return new WP_Query( $args );
    }

    /**
     * @param string $order_by
     * @param string $order
     * @param bool $hide_empty
     * @return WP_Term|WP_Error|int
     */
    public static function getCategoriesList (string $order_by='menu-order', string $order='asc', bool $hide_empty=true) {
        $args = array(
            'taxonomy'   => "product_cat",
            'orderby'    => $order_by,
            'order'      => $order,
            'hide_empty' => $hide_empty,
        );
        return get_terms($args);
    }
}