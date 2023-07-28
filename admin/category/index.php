<?php
require_once('../layout/header.php');
require_once('../../models/Category.php');
?>

<?php
$response = null;
$user = null;
try {
    $categories = Category::findAll();
} catch (Exception $th) {
    $response = [
        'type' => 'danger',
        'message' => $th->getMessage()
    ];
}
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $id = $_POST["id"] ?? null;
        if (!$id)
            header("Location: /page404.php");
        Category::deleteById($id);
        $response = [
            'type' => 'success',
            'message' => "delete product success"
        ];
    } catch (\Throwable $th) {
        $response = [
            'type' => 'danger',
            'message' => $th->getMessage()
        ];
    }
}

?>
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Basic Tables</h4>
<a href="./create.php" class="my-3 btn btn-primary">Add New</a>
<div class="card">
    <h5 class="card-header">Table Accounts</h5>
    <?php if ($response) : ?>
        <div class="<?= "alert alert-" . $response['type'] ?>" role="alert"><?= $response['message'] ?></div>
    <?php endif ?>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>created at</th>
                    <th>update_at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                <?php foreach ($categories as $item) : ?>
                    <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>
                                <?= $item->id ?>
                            </strong></td>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>
                                <?= $item->name ?>
                            </strong></td>
                        <td>
                            <?= $item->created_at ?>
                        </td>
                        <td>
                            <?= $item->updated_at ?>
                        </td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <form method="post">
                                        <input type="text" name="id" value="<?= $item->id ?>" hidden>
                                        <button type="submit" class="dropdown-item"><i class="bx bx-trash me-1"></i>
                                            Delete</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>

            </tbody>
        </table>
    </div>
</div>
<?php
require_once('../layout/footer.php');
?>