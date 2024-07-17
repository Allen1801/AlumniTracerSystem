<?php

if(!isset($_SESSION['id'])){
    header("Location: logout.php");
}

if (isset($_SESSION['session-time']) && (time() - $_SESSION['session-time'] > 180)){
    session_unset();
    session_destroy();
    header("Location: logout.php");
    exit();
}

$_SESSION['session-time'] = time();
?>