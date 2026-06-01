<?php
/**
 * Display Tables
 */

add_shortcode( 'tables', 'tables' );

function tables( $atts = [], $content = null, $tag = '' )
{
    $args = [
        'post_type'         => 'product',
        'posts_per_page'    => -1
    ];

    $query = new WP_Query($args);

    ob_start() ?>

        <div class="max-wrapper__narrow">
            <h2>Purchase your Exhibition Space</h2>
            <p>Thank you so much for applying to exhibit at New West Comic Fest 2026. All you need to do now is select the size of table you want and pay for it.</p>
            <ul class="table-list">
            <?php
                if( $query->have_posts()): while( $query->have_posts()): $query->the_post(); 
                    $_productID = get_the_ID();
                    $_product = wc_get_product( $_productID );
                
                ?>
                    <li>
                        <?php the_title();  ?> &dollar;<?php echo $_product->get_regular_price(); ?>
                        <a href="<?php echo site_url(); ?>/cart/?add-to-cart=<?php echo $_productID; ?>" class="btn btn__buy-now">Buy Now</a>
                    </li>

            <?php
                endwhile; endif; wp_reset_postdata();
            ?>
            </ul>
            <p>The Checkout page will take you to Square to complete your payment.</p>
            <p>If you would prefer to use e-Transfer, that's fine. Please send the payment to <a href="mailto:info@weirdspace.com">info@weirdspace.com</a>. Be sure to include your name so I can connect your payment to your application.</p>
        </div>

    <?php $o = ob_get_clean();

    return $o;
    
}