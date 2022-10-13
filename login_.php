<?php
session_start();
include "koneksi.php";
$db = new database();

// if (isset($_SESSION) and $_SESSION["is_login"] == 1) {
//   // header("Location:tampil_user.php");
//   // die;
//   echo "<script>document.location.href='http://localhost/sekolah/oop/tampil_user.php'</script>";
// }

if ($_SESSION["is_login"]) {
  header("Location:tampil_user.php");
  // die;
  // echo "<script>document.location.href='http://localhost/sekolah/oop/tampil_user.php'</script>";
}

if (isset($_REQUEST['login'])) {
  // $username = $_POST['username'];
  // $username = $_POST['password'];
  extract($_REQUEST);
  $login = $db->login($username, $password);
  if ($login) {
    // $_SESSION = $login;
    // echo "<script>document.location.href='http://localhost/sekolah/oop/tampil_user.php'</script>";
    // $query_string = http_build_query($login) . "\n";
    // header("Location:tampil_user.php?" . $query_string);
    header("Location:tampil_user.php");
  } else {
    // echo "<script>document.location.href='http://localhost/sekolah/oop/tampil_user.php'</script>";
    header("Location:login.php?pesan=gagal");
  }
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
  <div class="container" style="margin-top: 5%;">
    <div class="card mx-auto" style="max-width: 620px;">
      <div class="card-header">
        <h2>Login</h2>
      </div>

      <div class="card-body">
        <?php
        if (isset($_GET['pesan'])) {
          if ($_GET["pesan"] == "gagal") {
            echo "<div class='alert alert-danger'>Username atau Password tidak sesuai</div>";
          }
        }
        ?>

        <div class="row">
          <div class="col-sm">
            <form id="login_form" method="POST">

              <div class="form-group row justify-content-md-center">
                <label for="username" class="col-sm-2 col-form-label">Username</label>
                <div class="col-6 col-sm-4">
                  <div id="error_mag" align="center">
                    <input type="text" class="form-control" id="username" name="username" autocomplete="off" required>
                  </div>
                </div>
              </div>

              <div class="form-group row justify-content-md-center mt-3">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-6 col-sm-4">
                  <div id="error_mag" align="center">
                    <input type="password" class="form-control" id="password" name="password" required>
                  </div>
                </div>
              </div>

              <div align="center">
                <button class="btn btn-primary mt-3" type="submit" name="login">Login</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>