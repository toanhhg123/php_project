
<?php
require_once __DIR__ . '/../constants/define.php';
require_once(__DIR__ . '/../service/productService.php');
require_once(__DIR__ . '/../config/config.php')
?>


<?php

class Blog
{

    public int $id;
    public string $image;
    public string $created_at;
    public string $updated_at;
    public string $title;
    public string $content;

    /**
     * @return Blog[]
     */
    public static function findAll(): array
    {
        global $conn;
        $sql = "SELECT * from blog";
        $result = $conn->prepare($sql);
        $result->execute();
        $data = $result->fetchAll(PDO::FETCH_CLASS, 'Blog');
        return $data;
    }

    public static function insert(Blog $blog): ?Blog
    {
        global $conn;
        $sql = "INSERT INTO `blog`(`title`, `content`, `image` ) 
        VALUES 
        ('{$blog->title}',
         '{$blog->content}',
         '{$blog->image}'
         )";
        $result = $conn->prepare($sql);
        $result->execute();
        return $blog;
    }

    public static function deleteById($id): bool
    {
        global $conn;
        $sql = "delete from  blog where id={$id}";
        $result = $conn->prepare($sql);
        return $result->execute();
    }

    public static function findById($id): ?Blog
    {
        global $conn;
        $sql = "SELECT * from blog where id='{$id}'";
        $result = $conn->prepare($sql);
        $result->execute();
        $blog = $result->fetchObject('Blog');
        return $blog ?? null;
    }
}
