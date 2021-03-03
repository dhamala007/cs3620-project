<?php
    
    session_start();

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    
    require_once('./session/session.php');
   

    $session = new session();
    $login_result = $session->login($_POST["Username"], $_POST["Password"]);
    if(!$login_result){
        header("Location: login.html?error=true");
        exit();
    }
    else{
        header("Location: dashboard.php");
        exit();
    }
?>  
