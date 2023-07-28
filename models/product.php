
<?php
require_once __DIR__ . '/../constants/define.php';
require_once(__DIR__ . '/../service/productService.php');
require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '/Pagination.php');

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
     * @return Pagination
     */
    public static function findAll(string $search = "", int $pageIndex = 0, int $pageSize = 8, string $categoryId = null): Pagination
    {
        $skip = $pageIndex * $pageSize;
        global $conn;
        $categoryQuery = $categoryId ? " and category_id = '{$categoryId}'" : "";
        $sql = "SELECT product.* from product join category WHERE category_id = category.id and title like '%{$search}%' {$categoryQuery} limit {$skip},{$pageSize}";
        $result = $conn->prepare($sql);
        $result->execute();
        $products = $result->fetchAll(PDO::FETCH_CLASS, 'Product');


        $totalRow = $conn->query("SELECT count(*) from product where title like '%{$search}%' {$categoryQuery};")->fetchColumn();
        $totalPage = ceil($totalRow / $pageSize);
        return new Pagination($pageIndex, $pageSize, $totalPage, $products);
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

    public static function findById($id): ?Product
    {
        global $conn;
        $sql = "SELECT * from product where id='{$id}'";
        $result = $conn->prepare($sql);
        $result->execute();
        $product = $result->fetchObject('Product');
        return $product ?? null;
    }

    public static function deleteById($id): bool
    {
        global $conn;
        $sql = "delete from  product where id={$id}";
        $result = $conn->prepare($sql);
        return $result->execute();
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

    public static function updateProduct(product  $product)
    {
        global $conn;
        $sql = "UPDATE `product` SET 
        `title`='{$product->title}',
        `metaTitle`='{$product->metaTitle}',
        `slug`='{$product->slug}',
        `summary`='{$product->summary}',
        `sku`='{$product->sku}',
        `price`='{$product->price}',
        `discount`='{$product->discount}',
        `quantity`='{$product->quantity}',
        `createdAt`='{$product->createdAt}',
        `updatedAt`='{$product->updatedAt}',
        `content`='{$product->content}',
        `category_id`='{$product->category_id}' 
        WHERE `id`='{$product->id}'";

        $result = $conn->prepare($sql);
        return $result->execute();
    }

    public static function Count(): int
    {
        global $conn;
        $sql = "SELECT COUNT(*) FROM product where 1";
        $res = $conn->query($sql);
        $count = $res->fetchColumn();
        return $count;
    }
}
