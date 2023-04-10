<?php
require_once('../layout/header.php');
require_once('../../models/User.php');

?>
<?php
$response = null;
$user = new User();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {

        $user->firstName = $_POST['firstName'];
        $user->middleName = $_POST['middleName'];
        $user->lastName = $_POST['lastName'];
        $user->mobile = $_POST['mobile'];
        $user->email = $_POST['email'];
        $user->passwordHash = $_POST['password'];
        $user->admin = $_POST['admin'];
        $user->intro = $_POST['intro'];
        $user->profile = $_POST['profile'];

        $newUser = User::AddUser($user);
        $response = [
            'type' => 'success',
            'message' => 'add user success'
        ];
    } catch (Exception $th) {
        $response = [
            'type' => 'danger',
            'message' => $th->getMessage()
        ];
    }
}

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
                    <label for="firstName" class="form-label">First Name</label>
                    <input class="form-control" type="text" id="firstName" name="firstName" autofocus="">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="firstName" class="form-label">Middel Name</label>
                    <input class="form-control" type="text" id="middleName" name="middleName" autofocus="">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="lastName" class="form-label">Last Name</label>
                    <input class="form-control" type="text" name="lastName" id="lastName">
                </div>
                <div class="mb-3 col-md-6">
                    <label class="form-label" for="phoneNumber">Phone Number</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text">VI (+84)</span>
                        <input type="text" id="phoneNumber" name="mobile" class="form-control" placeholder="202 555 0111">
                    </div>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="email" class="form-label">E-mail</label>
                    <input class="form-control" type="text" id="email" name="email" placeholder="john.doe@example.com">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>


                <div class="mb-3 col-md-6">
                    <label class="form-label" for="country">Admin</label>
                    <select id="country" name="admin" class="select2 form-select">
                        <option value="">Select</option>
                        <option value="1">Admin</option>
                        <option value="0">User</option>

                    </select>
                </div>

                <div class="mb-3 col-md-6">
                    <label class="form-label" for="country">Intro</label>
                    <textarea id="basic-default-message" name="intro" class="form-control" placeholder="I foodboy hihi!!"></textarea>
                </div>

                <div class="mb-3 col-md-6">
                    <label class="form-label" for="country">Profile</label>
                    <textarea id="basic-default-message" name="profile" class="form-control" placeholder="Hi, Do you have a moment to talk Joe?"></textarea>
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