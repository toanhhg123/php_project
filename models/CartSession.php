<?php
require_once 'constants/define.php';
require_once 'models/product.php';
?>
<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<?php
class CartSession
{
    public int $id;
    public Product $product;
    public int $qty;
    public function __construct(Product $product, int $qty)
    {
        $carts = CartSession::findAll();
        $this->id = ($carts && count($carts) > 0) ? (int)end($carts)->id + 1 : 1;
        $this->product = $product;
        $this->qty = $qty;
    }

    /**
     * @return CartSession[]
     */
    public static function findAll(): array
    {
        $data = $_SESSION[SESSION_CARTS] ?? [];
        if (!isset($_SESSION[SESSION_CARTS]))
            $_SESSION[SESSION_CARTS] = $data;
        return unserialize(serialize($_SESSION[SESSION_CARTS]));
    }

    public static  function lenCart(): int
    {
        $data = $_SESSION[SESSION_CARTS] ?? [];
        if (!isset($_SESSION[SESSION_CARTS]))
            $_SESSION[SESSION_CARTS] = $data;
        return count($data);
    }

    public static function findByProductId(int $id): ?CartSession
    {
        $arr = CartSession::findAll();
        $mapData = array_map(function (CartSession $data) {
            return $data->product->id;
        }, $arr);
        $key = array_search($id, $mapData);
        return $key > -1  ? $arr[$key] : null;
    }

    public static function findById(int $id): ?CartSession
    {
        $arr = CartSession::findAll();
        $key = array_search($id, array_column($arr, 'id'));
        return $arr[$key] ?? null;
    }

    public static function addToCartSession(Product $product, $qty): CartSession
    {
        $cartSeCartSession = CartSession::findByProductId($product->id);
        if ($cartSeCartSession) {
            $arr = CartSession::findAll();
            $mapData = array_map(function (CartSession $data) use ($product, $qty) {
                if ($data->product->id == $product->id) $data->qty += $qty;
                return $data;
            }, $arr);
            $_SESSION[SESSION_CARTS] = unserialize(serialize($mapData));
        } else {
            $cartSeCartSession = new CartSession($product, $qty);
            $carts = CartSession::findAll();
            $carts = [...$carts, $cartSeCartSession];
            $_SESSION[SESSION_CARTS] = unserialize(serialize($carts));
        }
        return  $cartSeCartSession;
    }
}

?>