<?php

    if ( !function_exists( 'isLogged' ) ) {
        function isLogged() {
            $CI = &get_instance();
            if ( $CI->session->userdata( 'is_logged' ) ) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }

?>