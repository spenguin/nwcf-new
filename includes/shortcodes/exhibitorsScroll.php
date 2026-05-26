<?php
/**
 * Render Exhibitors scroll
 * 
 */


function exhibitorsScroll( $atts )
{

    $url        = "https://bccomicfest.dev.weirdspace.xyz/wp-json/exhibitors-api/v1/fetch-exhibitors";

    $url    = add_query_arg( [
        'event' => $atts['event']
    ], $url );

    $response   = wp_remote_get( $url ); //pvd($response);
    if( is_wp_error( $response ) )
    {
        return; // Handle the error (e.g., connection issue)
    }
    $body       = wp_remote_retrieve_body( $response );
    $data       = json_decode( $body ); //pvd($data);

    $o = [];
    if ( ! empty( $data ) ) {
        foreach ( $data as $d ) {
            $o[]    = '<div class="exhibitor">' . esc_html( $d->title ) . '</div>';
        }
    }

    return join(' ', $o);
}