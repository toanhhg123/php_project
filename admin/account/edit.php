<?php
require_once('../../models/User.php');

?>
<?php
$id = $_GET["id"] ?? null;
if (!$id) header("Location: /page404.php");
$response = null;

$user = User::findById($id);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $user->firstName = $_POST['firstName'] ?? $user->firstName;
        $user->middleName = $_POST['middleName'] ?? $user->middleName;
        $user->lastName = $_POST['lastName'] ?? $user->lastName;
        $user->mobile = $_POST['mobile'] ?? $user->mobile;
        $user->email = $_POST['email'] ?? $user->email;
        $user->admin = $_POST['admin'] ?? $user->admin;
        $user->intro = $_POST['intro'] ?? $user->intro;
        $user->profile = $_POST['profile'] ?? $user->profile;
        $user->country = $_POST['country'] ?? $user->country;
        $user->province = $_POST['province'] ?? $user->province;
        $user->zip = $_POST['zip'] ?? $user->zip;
        user::updateById($user);
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
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>
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
                    <label for="firstName" class="form-label">ID</label>
                    <input class="form-control" type="text" id="firstName" name="firstName" value="<?= $user->id ?>" readonly autofocus="">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="firstName" class="form-label">First Name</label>
                    <input class="form-control" type="text" id="firstName" name="firstName" value="<?= $user->firstName ?>" autofocus="">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="firstName" class="form-label">Middel Name</label>
                    <input class="form-control" type="text" id="middleName" name="middleName" value="<?= $user->middleName ?>" autofocus="">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="lastName" class="form-label">Last Name</label>
                    <input class="form-control" type="text" name="lastName" id="lastName" value="<?= $user->lastName ?>">
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="phoneNumber">Phone Number</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text">VI (+84)</span>
                        <input type="text" id="phoneNumber" name="mobile" class="form-control" placeholder="202 555 0111" value="<?= $user->mobile ?>">
                    </div>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="email" class="form-label">E-mail</label>
                    <input class="form-control" type="text" id="email" name="email" value="<?= $user->email ?>" placeholder="john.doe@example.com">
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="country">Admin</label>
                    <select id="country" name="admin" class="select2 form-select">
                        <option value="1">Admin</option>
                        <option value="0">User</option>

                    </select>
                </div>

                <div class="mb-3 col-md-6">
                    <label class="form-label" for="country">Intro</label>
                    <textarea id="basic-default-message" name="intro" class="form-control" placeholder="I foodboy hihi!!"><?= $user->intro ?></textarea>
                </div>

                <div class="mb-3 col-md-6">
                    <label class="form-label" for="country">Profile</label>
                    <textarea id="basic-default-message" name="profile" class="form-control" placeholder="Hi, Do you have a moment to talk Joe?">
                        <?= $user->profile ?>
                    </textarea>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="email" class="form-label">Country</label>
                    <input class="form-control" type="text" id="email" name="country" value="<?= $user->country ?>" placeholder="john.doe@example.com">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="email" class="form-label">province</label>
                    <input class="form-control" type="text" id="email" name="province" value="<?= $user->province ?>" placeholder="john.doe@example.com">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="email" class="form-label">zip</label>
                    <input class="form-control" type="text" id="email" name="zip" value="<?= $user->zip ?>" placeholder="john.doe@example.com">
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