<?php

namespace Shortcodes;

require_once CORE_SHORTCODE . 'ws_apply_form.php';
require_once CORE_SHORTCODE . 'homeHero.php';
require_once CORE_SHORTCODE . 'exhibitorsScroll.php';
require_once CORE_SHORTCODE . 'tables.php'; 

\Shortcodes\initialize();

function initialize()
{
    add_shortcode('ws_apply_form', '\ws_apply_form' );
    add_shortcode('exhibitorsScroll', '\exhibitorsScroll' );
}