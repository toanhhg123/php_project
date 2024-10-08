<?php
require_once('../layout/header.php');
require_once('../../models/product.php');
require_once('../../models/ListProductImage.php');
require_once(__DIR__ . '/../../utils/file.php');
require_once(__DIR__ . '/../../models/Category.php');
?>
<?php
$id = $_GET["id"] ?? null;
if (!$id) header("Location: /page404.php");



$response = null;
$product = Product::findById($id);
$categories = Category::findAll();

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["typeForm"] === "delete-file") {
  try {
    ListProductImage::deleteById($_POST["id"]);
  } catch (Exception $th) {
    var_dump($th->getMessage());
    $response = [
      'type' => 'danger',
      'message' => $th->getMessage()
    ];
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["typeForm"] === "upload-file") {
  try {
    $fileName = uploadFile($_FILES['image']);
    if (!$fileName)
      throw new Exception("you have not selected a product photo");

    $product_image = new ListProductImage();
    $product_image->product_id = $id;
    $product_image->image_url = $fileName;

    ListProductImage::insert($product_image);

    $response = [
      'type' => 'success',
      'message' => 'add product image success'
    ];
  } catch (Exception $th) {
    var_dump($th->getMessage());
    $response = [
      'type' => 'danger',
      'message' => $th->getMessage()
    ];
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["typeForm"] === "edit-product") {
  try {
    $product->title = $_POST["title"];
    $product->metaTitle = $_POST["metaTitle"];
    $product->slug = $_POST["slug"];
    $product->summary = $_POST["summary"];
    $product->sku = $_POST["sku"];
    $product->price = $_POST["price"];
    $product->discount = $_POST["discount"];
    $product->quantity = $_POST["quantity"];
    $product->content = $_POST["content"];
    $product->category_id = $_POST["category_id"];
    Product::updateProduct($product);
    return $response = [
      'type' => 'success',
      'message' => 'update product success'
    ];
  } catch (Exception $th) {
    return $response = [
      'type' => 'danger',
      'message' => $th->getMessage()
    ];
  }
}

?>

<?php
$product_images = ListProductImage::findAllByProductId($id);
?>

<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Product Settings /</span> Product</h4>
<div class="card mb-4">
  <h5 class="card-header">Update Product</h5>
  <!-- Account -->

  <hr class="my-0">
  <div class="card-body">
    <form id="formAccountSettings" method="POST" enctype="multipart/form-data">
      <input type="text" name="typeForm" value="edit-product" hidden>
      <?php if ($response) : ?>
        <div class="<?= "alert alert-" . $response['type'] ?>" role="alert"><?= $response['message'] ?></div>
      <?php endif ?>

      <div class="row">
        <div class="mb-3 col-md-6">
          <label for="firstName" class="form-label">title</label>
          <input value="<?= $product->title ?>" class="form-control" type="text" name="title" autofocus="">
        </div>
        <div class="mb-3 col-md-6">
          <label for="metaTitle" class="form-label">meta title</label>
          <input value="<?= $product->metaTitle ?>" class="form-control" type="text" name="metaTitle" id="metaTitle">
        </div>
        <div class="mb-3 col-md-6">
          <label class="form-label" for="phoneNumber">slug</label>
          <div class="input-group input-group-merge">
            <span class="input-group-text">/product/</span>
            <input value="<?= $product->slug ?>" type="text" id="phoneNumber" name="slug" class="form-control" placeholder="name product">
          </div>
        </div>
        <div class="mb-3 col-md-6">
          <label class="form-label">summary</label>
          <input value="<?= $product->summary ?>" class="form-control" type="text" name="summary" placeholder="john.doe@example.com">
        </div>
        <div class="mb-3 col-md-6">
          <label class="form-label">sku</label>
          <input value="<?= $product->sku ?>" type="text" class="form-control" id="sku" name="sku">
        </div>
        <div class="mb-3 col-md-6">
          <label class="form-label">price</label>
          <input value="<?= $product->price ?>" type="number" class="form-control" id="price" name="price">
        </div>
        <div class="mb-3 col-md-6">
          <label class="form-label">discount</label>
          <input value="<?= $product->discount ?>" type="number" class="form-control" id="discount" name="discount">
        </div>
        <div class="mb-3 col-md-6">
          <label class="form-label">quantity</label>
          <input value="<?= $product->quantity ?>" type="number" class="form-control" id="quantity" name="quantity">
        </div>

        <div class="mb-3 col-md-6">
          <label class="form-label" for="country">categories</label>
          <select id="country" name="category_id" class="select2 form-select">
            <?php foreach ($categories as $item) : ?>
              <option value="<?= $item->id ?>"><?= $item->name ?></option>
            <?php endforeach ?>


          </select>
        </div>

        <div class="mb-3 col-md-12">
          <label class="form-label" for="country">content</label>
          <textarea id="basic-default-message" name="content" class="form-control" placeholder="Hi, Do you have a moment to talk Joe?">
                    <?= $product->content ?>
                    </textarea>
        </div>

      </div>
      <div class="mt-2">
        <button type="submit" class="btn btn-primary me-2">Save changes</button>
        <button type="reset" class="btn btn-outline-secondary">Cancel</button>
      </div>
    </form>
  </div>
  <!-- /Account -->
</div>

<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Product Settings /</span> Product Photos</h4>

<div class="container row gap-4" style="flex-wrap: wrap;">
  <?php foreach ($product_images as $item) : ?>
    <div class="card mb-4" style="width: 200px;">
      <img src="<?= "../../files/" . $item->image_url ?>" class="w-full" style="width: 100%; margin-top: 1rem;" />
      <form id="formAddProductPhotos" method="POST" enctype="multipart/form-data">
        <input type="text" name="typeForm" value="delete-file" hidden>
        <input name="id" value="<?= $item->id ?>" hidden>
        <button type="submit" class="btn btn-danger w-full mb-2 mt-2" style="width: 100%;">delete</button>
      </form>
    </div>
  <?php endforeach ?>
</div>

<div class="card mb-4">
  <h5 class="card-header">Add Photos for <?= htmlspecialchars($product->title) ?></h5>
  <hr class="my-0">
  <div class="card-body">
    <form id="formAddProductPhotos" method="POST" enctype="multipart/form-data">
      <input type="text" name="typeForm" value="upload-file" hidden>
      <div class="mb-3 col-md-12">
        <label for="images" class="form-label">Product Images</label>
        <input type="file" class="form-control" name="image" id="images">
        <small class="form-text text-muted">You can upload multiple images at once.</small>
      </div>

      <div class="mt-2">
        <button type="submit" class="btn btn-primary me-2">Upload Images</button>
        <button type="reset" class="btn btn-outline-secondary">Cancel</button>
      </div>
    </form>
  </div>
</div>


<?php

require_once('../layout/footer.php');
?>
