<?php
require_once __DIR__ . '/../config/config.php';

class ListProductImage
{
    public $id;
    public $product_id;
    public $image_url;
    public $created_at;
    public $updated_at;

    public static function findAllByProductId($productId): array
    {
        global $conn;
        $sql = "SELECT * FROM list_product_image WHERE product_id = :product_id";
        $result = $conn->prepare($sql);
        $result->bindParam(':product_id', $productId, PDO::PARAM_INT);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_CLASS, 'ListProductImage');
    }

    public static function findById($id): ?ListProductImage
    {
        global $conn;
        $sql = "SELECT * FROM list_product_image WHERE id = :id";
        $result = $conn->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();
        return $result->fetchObject('ListProductImage') ?? null;
    }

    public static function insert(ListProductImage $image): ?ListProductImage
    {
        global $conn;
        $sql = "INSERT INTO list_product_image (product_id, image_url, created_at, updated_at) 
                VALUES (:product_id, :image_url, current_timestamp(), current_timestamp())";
        $result = $conn->prepare($sql);
        $result->bindParam(':product_id', $image->product_id, PDO::PARAM_INT);
        $result->bindParam(':image_url', $image->image_url, PDO::PARAM_STR);
        $result->execute();
        $image->id = $conn->lastInsertId();
        return $image;
    }

    public static function update(ListProductImage $image): bool
    {
        global $conn;
        $sql = "UPDATE list_product_image SET 
                product_id = :product_id, 
                image_url = :image_url, 
                updated_at = current_timestamp() 
                WHERE id = :id";
        $result = $conn->prepare($sql);
        $result->bindParam(':product_id', $image->product_id, PDO::PARAM_INT);
        $result->bindParam(':image_url', $image->image_url, PDO::PARAM_STR);
        $result->bindParam(':id', $image->id, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function deleteById($id): bool
    {
        global $conn;
        $sql = "DELETE FROM list_product_image WHERE id = :id";
        $result = $conn->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }
}
