<?php
require_once './models/AuthSeesion.php';
?>

<?php
$returnUrl = $_GET['returnUrl'] ?? "/php/admin";
?>

<!-- handle Login -->
<?php

if (AuthSession::CheckLogin()) {
  header('Location: ' . $returnUrl);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = $_POST['password'];
  if (AuthSession::login($username, $password))
    header('Location: ' . $returnUrl);
}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <link href="authAssets/css/bootstrap.min.css" rel="stylesheet">
  <link href="authAssets/css/font-awesome.min.css" rel="stylesheet">
  <link href="authAssets/css/style.css" rel="stylesheet">

  <title>Login</title>
</head>

<body>
  <section class="form-01-main">
    <div class="form-cover">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <form method="post" class="form-sub-main">
              <div class="_main_head_as">
                <a href="#">
                  <img src="authAssets/images/vector.png">
                </a>
              </div>
              <div class="form-group">
                <input id="email" name="username" class="form-control _ge_de_ol" type="text" placeholder="username" required="" aria-required="true">
              </div>

              <div class="form-group">
                <input id="password" type="password" class="form-control" name="password" placeholder="********" required="required">
                <i toggle="#password" class="fa fa-fw fa-eye toggle-password field-icon"></i>
              </div>

              <div class="form-group">
                <div class="check_box_main">
                  <a href="#" class="pas-text">Forgot Password</a>
                </div>
              </div>

              <div class="form-group">
                <div class="btn_uy">
                  <button role="button" type="submit"><span>Login</span></button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html>