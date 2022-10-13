<?php
session_start();
include "koneksi.php";
$db = new database();

$dataUsers = $db->tampil_user();
$iduser = $_SESSION['iduser'];
$username = $_SESSION['username'];
$jenis = $_SESSION['type'];

if (!isset($_SESSION['is_login'])) {
  header('Location:login.php');
}

if (isset($_GET['q'])) {
  $db->logout();
  header("Location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Users</title>

  <!-- Datatables -->
  <!-- jQquery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

  <!-- Css -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">

  <!-- JS -->
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
</head>

<body>
  <div class="container" style="margin-top: 2%;">
    <div class="card mx-auto" style="max-width: 90%;">
      <div class="card-header">
        <div class="row">
          <div class="col-sm-11 col-xs-3">
            <h2>Data User</h2>
          </div>
        </div>
      </div>

      <div class="card-body">
        <a href="create_user.php" class="btn btn-primary">Tambah</a>
        <a href="?q=logout" class="btn btn-danger">Keluar</a>
        <div class="table-responsive">
          <table id="table_id" class="table display table-striped">
            <hr>
            <thead>
              <tr>
                <th>Username</th>
                <th>Last Login</th>
                <th>Jenis User</th>
                <th>Cek</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($dataUsers as $row) {
              ?>
                <tr>
                  <td><?= $row['username'] ?></td>
                  <td><?= $row['lastlogin'] ?></td>
                  <?php
                  $cekjenis = $row['type'];
                  if ($cekjenis == "A") {
                    $jenis = "Admin";
                  } else if ($cekjenis == "U") {
                    $jenis = "User";
                  } else {
                    $jenis = "Unknown";
                  }

                  $cekCek = $row['cek'];
                  if ($cekCek == "0") {
                    $cek = "Belum Isi Data";
                  } else if ($cekCek == "1") {
                    $cek = "OK";
                  } else {
                    $cek = "Unknown";
                  }
                  ?>
                  <td><?= $jenis ?></td>
                  <td><?= $cek ?></td>
                  <td>
                    <a href="edit_user.php?iduser=<?= $row['iduser'] ?>" class="btn btn-info">Edit</a>
                    <a href="proses.php?aksi=hapus_user&iduser=<?= $row['iduser'] ?>" class="btn btn-danger" onclick="return confirm('Yakin deck?')">Hapus</a>
                  </td>
                <?php
              }
                ?>
                </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      $('#table_id').DataTable();
    });
  </script>
</body>

</html>