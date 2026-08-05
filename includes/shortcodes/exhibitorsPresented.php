<?php
/**
 * Present Exhibitors
 */

add_shortcode('exhibitorsPresented', 'exhibitorsPresented' );


function exhibitorsPresented( $atts )
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
        ob_start();
        ?>
        <div class="exhibitors-presented">
            <!-- <div class="exhibitors-display__count">
                <p><a href="/exhibitors"><span><?php echo count($data); ?></span> Exhibitors</a></p>
            </div> -->
                <div class="exhibitors-presented__list">
                    <?php
                        foreach ( $data as $d ) {
                            echo '<div class="exhibitors-presented__list--exhibitor">' . esc_html( $d->title ) . '</div>';
                        }
                    ?>
                </div>
        </div>
        <?php
    }

    return ob_get_clean();
}