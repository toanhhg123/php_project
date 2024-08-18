
<?php
require_once __DIR__ . '/../constants/define.php';
require_once(__DIR__ . '/../service/productService.php');
require_once(__DIR__ . '/../config/config.php');
require_once(__DIR__ . '/AuthSeesion.php');

?>


<?php

class Cart
{

    public int $id;
    public string $user_id;
    public string $created_at;
    public string $updated_at;
    public string $product_id;
    public string $qty;
    public string $image;
    public string $title;
    public string $price;
    public string $metaTitle;
    public int $disCount;
    public ?string $email;
    public ?string $mobile;
    public ?string $country;
    public ?string $province;
    public ?string $zip;
    public ?string $size;
    public ?string $color;


    public int $isOrder;

    // lấy ra tất cả giỏ hàng trong db
    /**
     * @return Cart[]
     */
    public static function findAll($isOrder = 0): array
    {
        global $conn;
        $auth = AuthSession::getInfoAuthecation();
        $sql = "SELECT cart.*, product.image, product.title, product.price, product.metaTitle, product.disCount  from cart 
        INNER JOIN `product` on product_id = product.id  where user_id='{$auth->user_id}' and isOrder={$isOrder}";
        $result = $conn->prepare($sql);
        $result->execute();
        $data = $result->fetchAll(PDO::FETCH_CLASS, 'Cart');
        return $data;
    }

    //lấy ra tất cả danh sách order bên trang admin
    /**
     * @return Cart[]
     */
    public static function findOrderAdmin(): array
    {
        global $conn;
        $auth = AuthSession::getInfoAuthecation();
        $sql = "
        SELECT cart.*, product.image,email,mobile,country,province, product.title, product.price, product.metaTitle, product.disCount  
        from cart 
        INNER JOIN `product` on product_id = product.id 
        INNER JOIN `user` on user.id = user_id  where isOrder=1";
        $result = $conn->prepare($sql);
        $result->execute();
        $data = $result->fetchAll(PDO::FETCH_CLASS, 'Cart');
        return $data;
    }

    // cập nhật thông tin đặt hàng
    public static function updateOrder(): bool
    {
        global $conn;
        $auth = AuthSession::getInfoAuthecation();
        $sql = "
        UPDATE `cart` SET 
           `isOrder`='1' WHERE `user_id`='{$auth->user_id}'
        ";
        $result = $conn->prepare($sql);
        return $result->execute();
    }

    // thêm vào giỏ hàng
    public static function addToCart(int $product_id, int $qty, string $size, string $color): bool
    {
        global $conn;
        $auth = AuthSession::getInfoAuthecation();
        $sql = "INSERT INTO `cart` (`id`, `user_id`, `created_at`, `updated_at`, `product_id`, `qty`, `size`, `color`)
             VALUES (NULL, '{$auth->user_id}', current_timestamp(), current_timestamp(), '{$product_id}', '{$qty}', '{$size}', '{$color}')";
        $result = $conn->prepare($sql);
        return  $result->execute();
    }

    // đểm giỏ hàng của người dùng
    public static function Count(): int
    {
        if (!AuthSession::CheckLogin()) return 0;
        global $conn;
        $auth = AuthSession::getInfoAuthecation();


        $sql = "SELECT COUNT(*) FROM cart where user_id='{$auth->user_id}' and isOrder='0'";
        $res = $conn->query($sql);
        $count = $res->fetchColumn();
        return $count;
    }

    // xoá sản phẩm 
    public static function remove(int $id)
    {
        global $conn;

        $sql = "DELETE FROM `cart` WHERE id={$id}";
        $result = $conn->prepare($sql);
        return  $result->execute();
    }
}
