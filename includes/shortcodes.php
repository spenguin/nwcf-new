<?php

namespace Shortcodes;

require_once CORE_SHORTCODE . 'ws_apply_form.php';

\Shortcodes\initialize();

function initialize()
{
    add_shortcode('ws_apply_form', '\ws_apply_form' );
}