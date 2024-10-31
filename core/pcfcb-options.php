<?php

add_action('admin_init', 'pcfcb_options');

function pcfcb_options(){
/********************************************************Settings Setup**************************************************************************/
    /* Settings Setup */
    add_settings_section(
        'general_settings_section', 'PCF Countdown Options', 'pcfcb_options_cb', 'general'
    );


/********************************************************Date Settings**************************************************************************/
    /* Date Settings */
    add_settings_field(
        'pcfcb_day',
        'Day (1-31)',
        'pcfcb_day_cb',
        'general',
        'general_settings_section',
        array('The day part of the date you want to count down to.')
    );
    register_setting('general', 'pcfcb_day', 'pcfcb_validate');
    
    add_settings_field(
        'pcfcb_month',
        'Month (1-12)',
        'pcfcb_month_cb',
        'general',
        'general_settings_section',
        array('The month part of the date you want to count down to.')
    );
    register_setting('general', 'pcfcb_month', 'pcfcb_validate');
    
/********************************************************Name Settings Callback**************************************************************************/
    add_settings_field(
        'pcfcb_name',
        'Your Name (will appear in the countdown)',
        'pcfcb_name_cb',
        'general',
        'general_settings_section',
        array('Your name for use in the output.')
    );
    register_setting('general', 'pcfcb_name');
}

/********************************************************Options Callback**************************************************************************/
/* Options Callback */
function pcfcb_options_cb(){
    echo '<p>Change the date to countdown to.</p>';
}


/********************************************************Date Callbacks**************************************************************************/
/* Date Callbacks */
function pcfcb_day_cb(){
    $html = "<label for='pcfcb_day'>" . $args[0] . "</label>";
    $html .= "<input type='number' min='1' max='31' id='pcfcb_day' name='pcfcb_day' value='" . get_option('pcfcb_day') . "'>";
    
    echo $html;
}
function pcfcb_month_cb(){
    $html = "<label for='pcfcb_month'>" . $args[0] . "</label>";
    $html .= "<input type='number' min='1' max='12' id='pcfcb_month' name='pcfcb_month' value='" . get_option('pcfcb_month') . "'>";
    
    echo $html;
}
function pcfcb_name_cb(){
    $html = "<label for='pcfcb_name'>" . $args[0] . "</label>";
    $html .= "<input type='text' id='pcfcb_name' name='pcfcb_name' value='" . get_option('pcfcb_name') . "'>";
    
    echo $html;
}

/********************************************************Validate Input**************************************************************************/

function pcfcb_validate($input){
    if(strpos($input, '0') === 0){
        $output = ltrim($input, '0');
    }
    else{
        $output = $input;
    }
    return $output;
}

?>