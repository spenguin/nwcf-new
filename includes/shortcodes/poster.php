<?php
/**
 * Display poster
 */

add_shortcode('poster', 'poster' );


function poster( $atts )
{

    ob_start(); ?>
    <div class="home-poster">
        <img src="<?php echo $atts['src']; ?>" alt="New West Comic Fest 2026" />
    </div>
    <?php
    return ob_get_clean();
}