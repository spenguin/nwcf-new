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
        <script>
            jQuery(document).ready(function(){
                jQuery('.btn__popup' ).on( "click", function(){
                    let id = jQuery(this).data('id');
                    jQuery( '.popup').addClass('hidden');
                    jQuery('#' + id).removeClass('hidden');
                })
                jQuery('.popup__close').on("click", function(){
                    let id = jQuery(this).data('id');
                    jQuery('#' + id).addClass('hidden');
                })
            });
        </script>
        <div class="exhibitors-presented">
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
                        
                        }?>
                        <div class="exhibitors-presented__list--exhibitor <?php echo $backgroundClass; ?>" style="<?php echo $backgroundStyle; ?>"><?php echo esc_html( $d->title ); ?>
                            <div class="popup__open"><a href="#" data-id="<?php echo $d->id; ?>" class="btn btn__popup">More</a></div>
                        </div>
                        <div id="<?php echo $d->id; ?>" class="popup hidden"><?php echo $d->content; ?><a href="#" class="popup__close" data-id="<?php echo $d->id; ?>">X</a></div>

                        <?php
                    }
                ?>
            </div>
        </div>
        <?php
    }

    return ob_get_clean();
}