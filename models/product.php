<?php

require_once __DIR__ . '/../constants/define.php';
require_once(__DIR__ . '/../service/productService.php');
require_once(__DIR__ . '/../config/config.php')
?>

<?php

class Product
{

    public $id;
    public $title;
    public $image;
    public $metaTitle;
    public $slug;
    public $summary;
    public $sku;
    public $price;
    public $discount;
    public $quantity;
    public $createdAt;
    public $updatedAt;
    public $content;
    public $category_id;
    /**
     * @return Product[]
     */
    public static function findAll(): array
    {
        global $conn;
        $sql = "SELECT * from product";
        $result = $conn->prepare($sql);
        $result->execute();
        $products = $result->fetchAll(PDO::FETCH_CLASS, 'Product');

        return $products;
    }

    public static function findBySlug($slug): ?Product
    {
        global $conn;
        $sql = "SELECT * from product where slug='{$slug}'";
        $result = $conn->prepare($sql);
        $result->execute();
        $product = $result->fetchObject('Product');
        return $product ?? null;
    }

    public static function insertProduct($product): ?Product
    {
        global $conn;
        $sql = "INSERT INTO `product` 
        (`id`, `title`, `image`, `metaTitle`, `slug`, `summary`, `sku`, 
        `price`, `discount`, `quantity`, `createdAt`, `updatedAt`, `content`, `category_id`) 
        VALUES (NULL, 
                '{$product->title}', 
                '{$product->image}',
                '{$product->metaTitle}', 
                '{$product->slug}', 
                '{$product->summary}', 
                '{$product->sku}', 
                '{$product->price}', 
                '{$product->discount}', 
                '{$product->quantity}', 
                current_timestamp(), 
                current_timestamp(), 
                '{$product->content}',
                '{$product->category_id}')";
        $result = $conn->prepare($sql);
        $result->execute();
        return $product;
    }
}
