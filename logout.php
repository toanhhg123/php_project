<?php
require_once('./models/AuthSeesion.php');
AuthSession::logout();
header("Location: login.php");
?>