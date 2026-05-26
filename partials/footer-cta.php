<?php
/**
 * CTA in footer - Home Page only
 */
?>
<div class="footer__cta">
    <p class="footer__cta--call">Stay in the Loop</p>
    <?php echo do_shortcode('[mailerlite_form form_id=1]'); ?>
    <div class="footer__cta--button-wrapper">
        <!-- <a href="<?php echo site_url(); ?>/buy-tickets" class="btn btn__hot-cta">Buy Tickets</a> -->
        <!-- <a href="<?php echo site_url(); ?>/apply-to-exhibit" class="btn btn__cta">Apply for a Table</a> -->
    </div>
</div>