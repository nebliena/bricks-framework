<?php
spl_autoload_register(function( $filename ) 
{
    $file_path = explode( '\\', $filename );
    $file_name = '';

    if ( isset( $file_path[ count( $file_path ) - 1 ] ) ) 
    {
        $file_name = strtolower(
            
            $file_path[ count( $file_path ) - 1 ]
        );

        $file_name          = str_ireplace( '_', '-', $file_name );
        $file_name_parts    = explode( '-', $file_name );
        $index              = array_search( 'interface', $file_name_parts );

        if ( false !== $index ) 
        {
            unset( $file_name_parts[ $index ] );

            $file_name = implode( '-', $file_name_parts );
            $file_name = "interface-{$file_name}.php";
        } else {

            $file_name = "class-$file_name.php";
        }
    }

    $fully_qualified_path = trailingslashit(
        
        BRICKS_ROOT_PATH . 'inc'
    );

    $dir = [];


    for ( $i = 1; $i < count( $file_path ) - 1; $i++ ) 
    {

        $dir = strtolower( $file_path[ $i ] );
       
        $fully_qualified_path .= trailingslashit( $dir );
    }

    $fully_qualified_path .= $file_name;

    if ( stream_resolve_include_path($fully_qualified_path) ) 
    {
        
        include_once $fully_qualified_path;
    }
});