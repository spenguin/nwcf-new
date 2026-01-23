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
            <p>Sidebar</p>
        <div>
    </div>
<?php
    // get_template_part( 'nav', 'below' );
    // get_footer();