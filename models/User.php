<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/utils/MD5.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/config/config.php');

?>
<?php
class User
{
    public int $id;
    public string $firstName;
    public string $middleName;
    public string $lastName;
    public string $mobile;
    public string $email;
    public string $passwordHash;
    public int $admin;
    public string $registeredAt;
    public string $lastLogin;
    public string $intro;
    public string $profile;


    /**
     * @return User[]
     */
    public static function findAll(): array
    {
        global $conn;
        $sql = "SELECT * from user";
        $result = $conn->prepare($sql);
        $result->execute();
        $data = $result->fetchAll(PDO::FETCH_CLASS, 'User');
        return $data;
    }


    /**
     * @return User
     */
    public static function AddUser(User $user): User
    {
        global $conn;
        $user->passwordHash = createHash($user->passwordHash);
        $sql = "
        INSERT INTO `user`(`firstName`, 
        `middleName`, `lastName`, `mobile`, `email`, 
        `passwordHash`, `admin`,
        `intro`, `profile`) VALUES 
        (
        '{$user->firstName}',
        '{$user->middleName}',
        '{$user->lastName}',
        '{$user->mobile}',
        '{$user->email}',
        '{$user->passwordHash}',
        '{$user->admin}',
        '{$user->intro}',
        '{$user->profile}')
        ";
        $result = $conn->prepare($sql);
        $result->execute();
        if ($result === false)
            throw new Exception("not insert user !!");

        return $user;
    }

    public static function findById($id): User
    {
        global $conn;
        $sql = "SELECT * from user where id='{$id}'";
        $result = $conn->prepare($sql);
        $result->execute();
        $user = $result->fetchObject('User');
        if (!$user) header('Location : 404.php');
        return $user;
    }
}
