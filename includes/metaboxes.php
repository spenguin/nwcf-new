<?php

namespace Metaboxes;

\Metaboxes\initialize();

function initialize()
{
    add_action('admin_init', '\Metaboxes\admin_init');
}

/**]
 * Custom Fields in Posts
 */
function admin_init()
{
    add_meta_box('sidebar_content_meta', 'Sidebar Column content', '\Metaboxes\sidebar_content', 'page');
}


function sidebar_content()
{
    global $post;
    $sidebarContent = get_post_meta( $post->ID, 'sidebarContent', TRUE );
    ?>  
    <label for="sidebarContent">Sidebar Content</label>
    <input type="text" name="sidebarContent" value="<?php echo $sidebarContent; ?>" />
    <?php
}