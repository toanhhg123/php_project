
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

    public static function findById($id): ?Category
    {
        global $conn;
        $sql = "SELECT * from category where id='{$id}'";
        $result = $conn->prepare($sql);
        $result->execute();
        $category = $result->fetchObject('Category');
        return $category ?? null;
    }

    public static function deleteById($id): bool
    {
        global $conn;
        $sql = "delete from  category where id={$id}";
        $result = $conn->prepare($sql);
        return $result->execute();
    }

    public static function insert(Category $category): ?Category
    {
        global $conn;
        $sql = "INSERT INTO `category`(`name`, `description`) 
        VALUES 
        ('{$category->name}',
         '{$category->description}')";
        $result = $conn->prepare($sql);
        $result->execute();
        return $category;
    }
}
