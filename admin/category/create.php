<?php
require_once('../layout/header.php');
require_once('../../models/Category.php');

?>
<?php
$response = null;
$category = new Category();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {

        $category->name = $_POST['name'];
        $category->description = $_POST['description'];
        

        $record = Category::insert($category);
        $response = [
            'type' => 'success',
            'message' => 'add category success'
        ];
    } catch (Exception $th) {
        $response = [
            'type' => 'danger',
            'message' => $th->getMessage()
        ];
    }
}

?>
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Category Settings /</span> Category</h4>
<div class="card mb-4">
    <h5 class="card-header">Profile Details</h5>
    <!-- Account -->

    <hr class="my-0">
    <div class="card-body">
        <form id="formAccountSettings" method="POST">
            <?php if ($response) : ?>
                <div class="<?= "alert alert-" . $response['type'] ?>" role="alert"><?= $response['message'] ?></div>
            <?php endif ?>

            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="firstName" class="form-label">Name</label>
                    <input class="form-control" type="text" id="firstName" name="name" autofocus="">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="firstName" class="form-label">description</label>
                    <input class="form-control" type="text" id="middleName" name="description" autofocus="">
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