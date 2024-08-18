<?php
require_once('../layout/header.php');
require_once('../../models/blog.php');
?>

<?php
$response = null;
$user = null;
try {
    $blogs = Blog::findAll();
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
        if (!$id) header("Location: /page404.php");
        Blog::deleteById($id);
        header("Refresh:0");
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
    <h5 class="card-header">Table blogs</h5>
    <?php if ($response) : ?>
        <div class="<?= "alert alert-" . $response['type'] ?>" role="alert"><?= $response['message'] ?></div>
    <?php endif ?>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>title</th>
                    <th>image</th>
                    <th>created at</th>
                    <th>update_at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                <?php foreach ($blogs as $item) : ?>
                    <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?= $item->id ?></strong></td>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?= $item->title ?></strong></td>
                        <td>
                            <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="" data-bs-original-title="<?= $item->title ?>">
                                    <img src="../../files/<?= $item->image ?>" alt="Avatar" class="rounded-circle">
                                </li>
                            </ul>
                        </td>
                        <td><?= $item->created_at ?></td>
                        <td>
                            <?= $item->updated_at ?>
                        </td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <!-- <a class="dropdown-item" href="/admin/account/edit.php?id=<?= $item->id ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a> -->
                                    <form method="post">
                                        <input type="text" name="id" value="<?= $item->id ?>" hidden>
                                        <button type="submit" class="dropdown-item"><i class="bx bx-trash me-1"></i> Delete</button>
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