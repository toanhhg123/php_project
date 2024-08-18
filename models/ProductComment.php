<?php
require_once __DIR__ . '/../config/config.php';

class ProductComment
{
  public $id;
  public $product_id;
  public $user_id;
  public $comment;
  public $created_at;
  public $updated_at;
  public $lastName;


  public static function findAllByProductId($productId): array
  {
    global $conn;
    $sql = "
            SELECT pc.*, u.lastName 
            FROM product_comment pc
            JOIN user u ON pc.user_id = u.id
            WHERE pc.product_id = :product_id
            ORDER BY pc.created_at DESC
        ";
    $result = $conn->prepare($sql);
    $result->bindParam(':product_id', $productId, PDO::PARAM_INT);
    $result->execute();
    return $result->fetchAll(PDO::FETCH_CLASS, 'ProductComment');
  }

  public static function findById($id): ?ProductComment
  {
    global $conn;
    $sql = "SELECT * FROM product_comment WHERE id = :id";
    $result = $conn->prepare($sql);
    $result->bindParam(':id', $id, PDO::PARAM_INT);
    $result->execute();
    return $result->fetchObject('ProductComment') ?? null;
  }

  public static function insert(ProductComment $comment): ?ProductComment
  {
    global $conn;
    $sql = "INSERT INTO product_comment (product_id, user_id, comment, created_at, updated_at) 
                VALUES (:product_id, :user_id, :comment, current_timestamp(), current_timestamp())";
    $result = $conn->prepare($sql);
    $result->bindParam(':product_id', $comment->product_id, PDO::PARAM_INT);
    $result->bindParam(':user_id', $comment->user_id, PDO::PARAM_INT);
    $result->bindParam(':comment', $comment->comment, PDO::PARAM_STR);
    $result->execute();
    $comment->id = $conn->lastInsertId();
    return $comment;
  }

  public static function update(ProductComment $comment): bool
  {
    global $conn;
    $sql = "UPDATE product_comment SET 
                comment = :comment, 
                updated_at = current_timestamp() 
                WHERE id = :id";
    $result = $conn->prepare($sql);
    $result->bindParam(':comment', $comment->comment, PDO::PARAM_STR);
    $result->bindParam(':id', $comment->id, PDO::PARAM_INT);
    return $result->execute();
  }

  public static function deleteById($id): bool
  {
    global $conn;
    $sql = "DELETE FROM product_comment WHERE id = :id";
    $result = $conn->prepare($sql);
    $result->bindParam(':id', $id, PDO::PARAM_INT);
    return $result->execute();
  }
}
