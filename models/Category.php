
<?php
require_once __DIR__ . '/../constants/define.php';
require_once(__DIR__ . '/../service/productService.php');
require_once(__DIR__ . '/../config/config.php')
?>


<?php

class Category
{

    public int $id;
    public string $name;
    public string $description;
    public string $created_at;
    public string $updated_at;

    /**
     * @return Category[]
     */
    public static function findAll(): array
    {
        global $conn;
        $sql = "SELECT * from category";
        $result = $conn->prepare($sql);
        $result->execute();
        $data = $result->fetchAll(PDO::FETCH_CLASS, 'Category');
        return $data;
    }
}
