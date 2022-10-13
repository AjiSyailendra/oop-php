<div class="table-responsive">
  <table class="table table-striped">
    <hr>
    <thead>
      <tr>
        <th>No</th>
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
          <td><?= $nomor++ ?></td>
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

  <ul class="pagination justify-content-center">
    <li class="page-item">
      <a class="page-link" <?php if ($halaman > 1) {
                              echo "href='?halaman=" . $previous . "'";
                            }  ?>>Previous</a>
    </li>
    <?php
    for ($i = 1; $i <= $total_halaman; $i++) {
    ?>
      <li class="page-item"><a class="page-link" href="?halaman=<?= $i ?>"><?= $i ?></a></li>
    <?php
    }
    ?>
    <li class="page-item">
      <a class="page-link" <?php if ($halaman < $total_halaman) {
                              echo "href='?halaman=" . $next . "'";
                            }  ?>>Next</a>
    </li>
  </ul>
</div>