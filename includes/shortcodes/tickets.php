<?php
/**
 * Display Ticket purchase
 */

add_shortcode( 'tickets', 'tickets' );

function tickets( $atts = [], $content = null, $tag = '' )
{
$args = [
    'post_status'    => 'publish',
    'limit'     => -1, // Use -1 to get all products, or set a specific number
    'category'  => ['tickets'], // Pass tag slug(s) as an array
];

$products = wc_get_products( $args );

    ob_start() ?>

        <div class="max-wrapper__narrow">
            <h2>Purchase your New West Comic Fest 2026 Ticket</h2>

            <ul class="table-list">
                <?php
                    foreach( $products as $product ): ?>
                        <li style="font-size: 2rem;">
                            <?php echo $product->name; ?> 
                            <?php if( $product->sale_price ): ?>
                                &dollar;<span class="strikeout" style="text-decoration: line-through;"><?php echo $product->regular_price; ?></span> 
                                <span style="font-weight:bold; color: red; ">&dollar;<?php echo $product->sale_price; ?></span>
                            <?php else: ?>
                                &dollar;<?php echo $product->regular_price; ?></span> 
                            <?php endif; ?>
                            <a href="<?php echo site_url(); ?>/cart/?add-to-cart=<?php echo $product->get_id(); ?>" class="btn btn__buy-now">Buy Now</a>
                        </li>
                    <?php endforeach;
                ?>
            </ul>
            <p>The Checkout page will take you to Square to complete your payment.</p>
            <p>If you would prefer to use e-Transfer, that's fine. Please send the payment to <a href="mailto:info@weirdspace.com">info@weirdspace.com</a>. Be sure to include your name so I can connect your payment when you come to the event.</p>
        </div>

    <?php $o = ob_get_clean();

    return $o;
    
}