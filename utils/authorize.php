<?php

require_once(__DIR__ . "/../models/AuthSeesion.php");
function authorize(int $role = null)
{
    if (!AuthSession::CheckLogin()) {
        header("Location: login.php?returnUrl={$_SERVER["REQUEST_URI"]}");
    }

    $auth = AuthSession::getInfoAuthecation();
    
    if ($role !== null && $auth->role !== $role)
        header("Location: page404.php");
}
?>