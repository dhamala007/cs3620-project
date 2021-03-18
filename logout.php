<?php
require_once('./session/session.php');
session_start();
$session = new session();
$login_result = $session->logout();
header("Location: login.html");
end();
?>