<?php
    require 'connect.php';
    
    session_destroy();
    header("Location: login.html");
    exit();
?>