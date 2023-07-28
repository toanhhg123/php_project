<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<?php
require_once __DIR__ . '/../constants/define.php';
require_once __DIR__ . '/User.php';
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../utils/MD5.php';
?>

<?php
class AuthSession
{
    public string $email;
    public int $role;
    public string $name;
    public int $user_id;
    function __construct(string $email, int  $role, string $name, int $user_id)
    {
        $this->email = $email;
        $this->role = $role;
        $this->name = $name;
        $this->user_id = $user_id;
    }

    // kiểm tra đằng nhập của người dùng
    public static function CheckLogin(): bool
    {
        $isLogin = $_SESSION[SESSION_AUTH] ?? false;
        if (!isset($_SESSION[SESSION_AUTH]))
            $_SESSION[SESSION_AUTH] = $isLogin;

        return !$isLogin  ? false : true;
    }
    public static function getInfoAuthecation(): ?AuthSession
    {
        if (!AuthSession::CheckLogin()) return null;
        $auth = $_SESSION[SESSION_AUTH];
        return   new AuthSession($auth['email'], $auth['role'], $auth['name'], $auth["user_id"]);
    }


    public static function login(string $email, string $password): ?AuthSession
    {
        global $conn;
        $hashPash = createHash($password);
        $sql = "SELECT * from user where email='{$email}' and passwordHash='{$hashPash}'";
        $result = $conn->prepare($sql);
        $result->execute();
        $user = $result->fetchObject('User');
        if ($user === false) return null;
        $_SESSION[SESSION_AUTH]["email"] = $user->email;
        $_SESSION[SESSION_AUTH]["role"] = $user->admin;
        $_SESSION[SESSION_AUTH]["name"] = $user->lastName;
        $_SESSION[SESSION_AUTH]["user_id"] = $user->id;
        return new AuthSession($user->email,  $user->admin,  $user->lastName, $user->id);
    }

    public static function register(string $lastName, string $mobile, string $email, string $password): bool
    {
        global $conn;
        $hashPash = createHash($password);
        $sql = "INSERT INTO `user`( `mobile`, `lastName` ,`email`, `passwordHash`) 
        VALUES ('{$mobile}','{$lastName}','{$email}','{$hashPash}');";
        $result = $conn->prepare($sql);
        return $result->execute();
    }

    public static function logout(): void
    {
        $_SESSION[SESSION_AUTH] = false;
    }
}
