<?php
/**
 * Render Application Form
 * 
 */

function ws_apply_form( $atts = [], $content = null, $tag = '' )
{

    if( isset($_POST['submit'] ) )
    {
        $previous = $_POST['previous-exhibitor'];
        if( 0 == $previous )
        {
            // redirect to Google form
            wp_redirect( 'https://docs.google.com/forms/d/e/1FAIpQLScxkNeF8FwcUV0CF_0yvUNqHXQRsCKdN2SMl22mCXpStVyoSg/viewform?usp=publish-editor' );
            exit;
        } else {
            $o = "Cool. I have your details already.";
        }
    } else {
        $o      = <<<EOD
            <form action="/apply-to-exhibit" method="post">
                <label for="name">Your name:</label>
                <input type="text" name="exhibitor_name" placeholder="Your name" required/>
                <label for="email">Your email:</label>
                <input type="email" name="email" placeholder="Your email address" required />
                <label for="previous-exhibitor">Have you exhibited at NWCF before?</label>
                <input type="radio" name="previous-exhibitor" value="1" required>Yes
                <input type="radio" name="previous-exhibitor" value="0">No
                <input type="submit" value="Submit" name="submit" />
            </form>
        EOD;
    }

    return $o;
} 