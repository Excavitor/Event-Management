<?php

include '../connection.php';

session_start();

session_unset();

session_destroy();

echo ("<script>
    window.alert('You have just logged Out');
    window.location.href='../../home.html';
    </script>");

?>