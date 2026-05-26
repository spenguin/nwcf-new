<?php
/**
 * Template Name: Two Column Template
 */
?>
<?php
get_header(); ?>
    <div class="two-column-wrapper max-wrapper">
        <div class="two-column__main">
            <?php the_content(); ?>
        </div>
        <div class="two-column__sidebar">
            <?php 
                if( $post->post_title == "Apply to Exhibit" ): ?>
                    <div class=" sidebar shadowbox">
                        <h2>Table Info</h2>
                        <p>Half table (3 foot): $40</p>
                        <p>Full table (6 foot): $70</p>

                    </div>

                <?php endif; ?>
        <div>
    </div>
<?php
    // get_template_part( 'nav', 'below' );
    // get_footer();