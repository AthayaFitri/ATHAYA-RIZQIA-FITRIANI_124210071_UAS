<?php
    session_start();
    session_destroy();
    setcookie('id', '', time()-(60*60*2));
    setcookie('key', '', time()-(60*60*2));
    header("Location: login.php");
?>