<?php
require_once(__dir__ . '/../utils/MD5.php');
require_once(__dir__ . '/../config/config.php');
require_once(__DIR__ . '/AuthSeesion.php');

?>
<?php
class User
{

    public int $id;
    public ?string $firstName;
    public ?string $middleName;
    public ?string $lastName;
    public string $mobile;
    public string $email;
    public string $passwordHash;
    public int $admin;
    public ?string $registeredAt;
    public ?string $lastLogin;
    public ?string $intro;
    public ?string $profile;
    public ?string  $zip;
    public ?string  $province;
    public ?string  $country;




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
        return $user;
    }

    public static function deleteById(int $id): bool
    {
        global $conn;
        $sql = "DELETE FROM `user` WHERE id={$id}";
        $result = $conn->prepare($sql);
        return $result->execute();
    }

    public static function Update(User $user): ?User
    {
        global $conn;
        $sql = "
            UPDATE `user` SET 
            `firstName`='{$user->firstName}',
            `middleName`='{$user->middleName}',
            `lastName`='{$user->lastName}',
            `mobile`='{$user->mobile}',
            `email`='{$user->email}',
            `admin`='{$user->admin}',
            `intro`='{$user->intro}',
            `profile`='{$user->profile}',
            `country`='{$user->country}',
            `zip`='{$user->zip}',
            `province`='{$user->province}' 
            WHERE `id`='{$user->id}';
        ";
        $result = $conn->prepare($sql);

        return  $result->execute() ? $user : null;
    }

    public static function updateById(User $user): bool
    {
        global $conn;
        $sql = "
            UPDATE `user` SET 
            `firstName`='{$user->firstName}',
            `middleName`='{$user->middleName}',
            `lastName`='{$user->lastName}',
            `mobile`='{$user->mobile}',
            `email`='{$user->email}',
            `admin`='{$user->admin}',
            `intro`='{$user->intro}',
            `profile`='{$user->profile}',
            `country`='{$user->country}',
            `zip`='{$user->zip}',
            `province`='{$user->province}' 
            WHERE `id`='{$user->id}';
        ";

        $result = $conn->prepare($sql);
        return  $result->execute();
    }

    public static function changePassword(string $newPassword): bool
    {
        $auth = AuthSession::getInfoAuthecation();
        global $conn;
        $newPassword = createHash($newPassword);

        $sql = "
            UPDATE `user` SET 
            `passwordHash`='{$newPassword}'
            WHERE `id`='{$auth->user_id}';
        ";
        $result = $conn->prepare($sql);

        return  $result->execute();
    }
}
