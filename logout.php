<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('./session/session.php');
session_start();
$session = new session();
$login_result = $session->logout();
header("Location: login.html");
end();
?>
