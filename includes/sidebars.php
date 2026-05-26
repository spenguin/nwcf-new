<?php

add_action( 'widgets_init', 'applyOnlyCustomSidebar' );

function applyOnlyCustomSidebar()
{
    register_sidebar(
        [
            'name'      => __( 'Apply Only Sidebar' ),
            'id'        => 'apply-only-custom-sidebar',
            'description'   => __( 'Contents of this sidebar appear only on the Apply page' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => "</section>",
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',   
        ]
    );
}