<?php
require_once('../layout/header.php');
require_once('../../models/User.php');
?>

<?php
$response = null;
$user = null;
try {
    $users = User::findAll();
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
        User::deleteById($id);
    } catch (\Throwable $th) {
        $response = [
            'type' => 'danger',
            'message' => $th->getMessage()
        ];
    }
}

?>
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Basic Tables</h4>
<a href="/admin/account/create.php" class="my-3 btn btn-primary">Add New</a>
<div class="card">
    <h5 class="card-header">Table Accounts</h5>
    <?php if ($response): ?>
        <div class="<?= "alert alert-" . $response['type'] ?>" role="alert"><?= $response['message'] ?></div>
    <?php endif ?>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>FullName</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Admin</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>
                                <?= $user->firstName . " " . $user->lastName ?>
                            </strong></td>
                        <td>
                            <?= $user->email ?>
                        </td>
                        <td>
                            <?= $user->mobile ?>
                        </td>
                        <td><span class="badge bg-label-<?= $user->admin ? "success" : "primary" ?> me-1"><?= $user->admin ? "Admin" : "User" ?></span></td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="edit.php?id=<?= $user->id ?>"><i
                                            class="bx bx-edit-alt me-1"></i> Edit</a>
                                    <form method="post">
                                        <input type="text" name="id" value="<?= $user->id ?>" hidden>
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