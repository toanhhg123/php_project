<?php

require_once __DIR__.'/../constants/define.php';
?>
<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<?php
class AuthSession
{
    public static function CheckLogin(): bool
    {
        $isLogin = $_SESSION[SESSION_AUTH] ?? false;
        if (!isset($_SESSION[SESSION_AUTH]))
            $_SESSION[SESSION_AUTH] = $isLogin;
        return $isLogin;
    }

    public static function login(string $username,string $password): bool
    {
        if($username == "admin" && $password == "admin")
        {
            $_SESSION[SESSION_AUTH] = $username;
            return true;
        }
        return false;
        
    }

    public static function logout(string $username,string $password): void
    {
        $_SESSION[SESSION_AUTH] = $username;
    }
}
