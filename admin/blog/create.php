<?php
try {
    require_once('../layout/header.php');
    require_once('../../models/product.php');
    require_once('../../utils/file.php');
    require_once('../../models/blog.php');
} catch (\Throwable $th) {
    var_dump($th->getMessage());
}


?>
<?php
$response = null;
$blog = new Blog();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $fileName = uploadFile($_FILES['image']);
        if (!$fileName)
            throw new Exception("you have not selected a product photo");
        $blog->title = $_POST["title"];
        $blog->content = $_POST["content"];
        $blog->image = $fileName;
        
        Blog::insert($blog);
        
        $response = [
            'type' => 'success',
            'message' => 'add blog success'
        ];

    } catch (Exception $th) {
        var_dump($th->getMessage());
        $response = [
            'type' => 'danger',
            'message' => $th->getMessage()
        ];
    }
}

?>
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Product Settings /</span> Product</h4>
<div class="card mb-4">
    <h5 class="card-header">Blog</h5>
    <!-- Account -->

    <hr class="my-0">
    <div class="card-body">
        <form method="POST" enctype="multipart/form-data">
            <?php if ($response) : ?>
                <div class="<?= "alert alert-" . $response['type'] ?>" role="alert"><?= $response['message'] ?></div>
            <?php endif ?>

            <div class="row">

                <div class="mb-3 col-md-6">
                    <label for="firstName" class="form-label">title</label>
                    <input class="form-control" type="text" name="title" autofocus="">
                </div>
                
                <div class="mb-3 col-md-6">
                    <label for="firstName" class="form-label">image</label>
                    <input class="form-control" type="file" name="image" value="">
                </div>
                
                <div class="mb-3 col-md-12">
                    <label class="form-label" for="country">content</label>
                    <textarea rows="10" id="basic-default-message" name="content" class="form-control" placeholder="Hi, Do you have a moment to talk Joe?"></textarea>
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
<?php
require_once('../layout/footer.php');
?>