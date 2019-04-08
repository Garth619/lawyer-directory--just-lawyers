<?php 

//https://themehybrid.com/weblog/creating-an-add-on-page-with-the-rest-api-part-1


function thapi_get_plugins( $request ) {

    $data = array();

    // Initial query args.
    $query_args = array(
        'post_type'      => 'lawyer',
        'posts_per_page' => -1
    );

    // Check if this is a request for addons of a specific plugin.
    if ( ! empty( $request['addons'] ) ) {

        // If we have the data cached, go ahead and return it.
        if ( $addon_data = get_transient( "th_api_addons_{$request['addons']}" ) ) {

            return $addon_data;
        }

        // Find the parent plugin to see if it exists.
        $parent = get_page_by_title( sanitize_title( $request['addons'] ), 'OBJECT', 'plugin' );

        // If we have a parent plugin, add it as the `MB_MARKDOWN_HASH8d170c03c835f32f6ac41e4e9c989bdfMB_MARKDOWN_HASH` parameter.
        if ( is_object( $parent ) )
            $query_args['post_parent__in'] = array( $parent->ID );
    }

    // Generate a new WP Query.
    $plugins = new \WP_Query( $query_args );

    // If we find some plugins, let's roll.
    if ( $plugins->have_posts() ) {

        while ( $plugins->have_posts() ) {

            $plugins->the_post();

            // If the plugin is for purchase, we're just going to return the primary
            // plugin page for the time being.
            $purchase_url = get_post_meta( pdev_get_plugin_id(), 'edd_download_id', true ) ? pdev_get_plugin_url() : '';

            // Get the author's URL set in their profile.
            $author_url = get_the_author_meta( 'url', pdev_get_plugin_author_id() );

            // Sets up all the data that we want to return for the plugin.
            $data[] = array(

                'title'   => pdev_get_plugin_title(),
                'url'     => pdev_get_plugin_url(),
                'slug'    => get_post()->post_name,
                'excerpt' => pdev_get_plugin_excerpt(),

                'author' => array(
                    'name' => pdev_get_plugin_author(),
                    'url'  => $author_url ? $author_url : pdev_get_plugin_author_url()
                ),

                'meta' => array(
                    'purchase_url'  => $purchase_url,
                    'download_url'  => pdev_get_plugin_download_url(),
                    'rating'        => pdev_get_plugin_rating(),
                    'rating_count'  => pdev_get_plugin_rating_count(),
                    'install_count' => pdev_get_plugin_install_count()
                ),

                'media' => array(
                    'icon'   => array( 'url' => pdev_get_plugin_icon_url( pdev_get_plugin_id(), array( 128, 128 ) ) )
                )
            );
        }

        // If serving up data for an addon plugin, store it as a transient.
        if ( $data && ! empty( $request['addons'] ) ) {

            set_transient( "th_api_addons_{$request['addons']}", $data, DAY_IN_SECONDS );
        }
    }

    return $data ? rest_ensure_response( $data ) : rest_ensure_response( null );
}