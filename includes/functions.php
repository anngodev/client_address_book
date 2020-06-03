<?php
// FUNCTIONS.php

// Clean the form data to prevent injections

/*
   Built in functions used:
   trim()
   stripslashes()
   htmlspecialchars()
   strip_tags()
   str_replace()
*/

function validateFormData($formData) {
    $formData = trim( stripslashes( htmlspecialchars( strip_tags( str_replace( array( "(", ")" ), "", $formData ) ), ENT_QOUTES ) ) );
    return $formData;
}

?>