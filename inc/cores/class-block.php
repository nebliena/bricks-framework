<?php
namespace Bricks\Cores;

class Block {

    public function jsDependencies()
    {
        $dependencies = array( 
            'wp-blocks', 
            'wp-i18n', 
            'wp-element', 
            'wp-editor' 
        );

        return $dependencies;
    }

    function blockCategories($categories) 
    {
        $category_slugs = wp_list_pluck( $categories, 'slug' );

        return in_array( 'bricks-f-layout', $category_slugs, true ) ? $categories : array_merge(
            $categories,
            array(

                array(

                    'slug'  => 'bricks-f-layout',
                    'title' => __( 'Bricks Layouts', 'bricks-f' ),
                    'icon'  => null,
                ),
            )
        );
    }
}