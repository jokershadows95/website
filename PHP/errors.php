<?php
        ini_set("log_errors", 1);
        ini_set("error_log", "/logs/php-error.log");
        error_log( date("[Y-m-d H:i:s]"), "Hello, errors!" );
?>