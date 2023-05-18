<?php

require_once(__DIR__ . "/../models/AuthSeesion.php");
function authorize(int $role = null, string $urlAuthen = null,string $urlNotFound = 'page404.php')
{
    $urlAuthen = $urlAuthen ?? "login.php?returnUrl={$_SERVER["REQUEST_URI"]}";
    if (!AuthSession::CheckLogin()) {
        header("Location: ".$urlAuthen);
        return;
    }

    $auth = AuthSession::getInfoAuthecation();
    if ($role !== null && $auth->role !== $role)
        header("Location: ".$urlNotFound); 
   
}
?>