<?php
    session_start();
    session_destroy();
    echo 'You have been logged out. You will be redirected to the login page';
?>