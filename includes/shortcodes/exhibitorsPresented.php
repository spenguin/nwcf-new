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
    $pattern    = '/<img.+?src=["\']([^"\']+)["\']/i';

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
                            if( empty( $d->icon ) )
                            {
                                $backgroundStyle = '';
                                $backgroundClass = '';
                            } else {
                                preg_match_all( $pattern, $d->icon, $matches ); //pvd($matches[1]);
                                $backgroundStyle = "background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url('" . $matches[1][0] . "'); background-size:cover;background-position:center;";
                                $backgroundClass = "reverse";
                            
                            }
                            echo '<div class="exhibitors-presented__list--exhibitor ' . $backgroundClass . '" style="' . $backgroundStyle . '">' . esc_html( $d->title ) . '</div>';
                        }
                    ?>
                </div>
        </div>
        <?php
    }

    return ob_get_clean();
}