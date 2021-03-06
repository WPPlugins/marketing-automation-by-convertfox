<?php
add_action( 'wp_head', array('InsertConvertFox', 'insert_tracker' ));

Class InsertConvertFox {
    /**
    * Adds the Javascript necessary to start tracking via ConvertFox.
    * this gets added to the <head> section usually.
    *
    * @return [type] [description]
    */
    function insert_tracker() {
        $settings = (array) get_option( 'convertfox_settings' );
        if ( $settings['is_enabled'] ) {
            if ( isset($settings['project_id']) && $settings['project_id'] != "" ) {
                require_once dirname(__FILE__) . '/convertfoxjs.php';
            } else {
                echo '<!-- ConvertFox: Set your project ID to begin tracking -->';
            }
        }
    }
}
?>