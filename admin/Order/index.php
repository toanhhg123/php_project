<?php
require_once __DIR__ . '/../../models/Cart.php';
?>
<?php
$response = null;
$orders = [];
try {
    $orders = Cart::findOrderAdmin();
} catch (Exception $th) {
    $response = [
        'type' => 'danger',
        'message' => $th->getMessage()
    ];
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $id = $_POST['id'];
        Cart::remove($id);
        $response = [
            'type' => 'success',
            'message' => 'add product success'
        ];
        header('Refresh: 1');
    } catch (Exception $th) {
        $response = [
            'type' => 'danger',
            'message' => $th->getMessage()
        ];
    }
}
?>


<?php
require_once('../layout/header.php');
?>

<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Basic Tables</h4>
<div class="card">
    <h5 class="card-header">Table Product</h5>

    <?php if ($response): ?>
        <div class="<?= "alert alert-" . $response['type'] ?>" role="alert"><?= $response['message'] ?></div>
    <?php endif ?>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>image</th>
                    <th>email</th>
                    <th>mobile</th>
                    <th>country</th>
                    <th>Province</th>
                    <th>Size</th>
                    <th>Color</th>
                    <th>price</th>
                    <th>quantity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                <?php foreach ($orders as $item): ?>
                    <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>
                                <?= $item->title ?>
                            </strong></td>
                        <td>
                            <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                    class="avatar avatar-xs pull-up" title="" data-bs-original-title="<?= $item->title ?>">
                                    <img src="../../files/<?= $item->image ?>" alt="Avatar" class="rounded-circle">
                                </li>
                            </ul>
                        </td>
                        <td><span class="badge bg-label-primary me-1">
                                <?= $item->email ?>
                            </span></td>

                        <td><span class="badge bg-label-primary me-1">
                                <?= $item->mobile ?>
                            </span></td>
                        <td><span class="badge bg-label-primary me-1">
                                <?= $item->country ?>
                            </span></td>
                        <td><span class="badge bg-label-primary me-1">
                                <?= $item->province ?>
                            </span></td>
                         <td><span class="badge bg-label-primary me-1">
                                <?= $item->size ?>
                            </span></td>
                             <td><span class="badge bg-label-primary me-1">
                                <?= $item->color ?>
                            </span></td>
                        <td><span class="badge bg-label-primary me-1">
                                <?= $item->price . "$" ?>
                            </span></td>

                        <td><span class="badge bg-label-success me-1">
                                <?= $item->qty ?>
                            </span></td>

                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                <div class="dropdown-menu">
                                    <!-- <a class="dropdown-item" href="edit.php?id=<?= $item->id ?>"><i
                                            class="bx bx-edit-alt me-1"></i> Edit</a> -->
                                    <form action="" method="post">
                                        <input type="text" name="id" value="<?= $item->id ?>" id="" hidden>
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
