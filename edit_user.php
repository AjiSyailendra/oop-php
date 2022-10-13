<center>
  <h1>CRUD OOP PHP</h1>
  <h2>Tambah Data User</h2>
  <form action="proses.php?aksi=edit_user" method="post">
    <?php
    include "koneksi.php";
    $db = new database();
    $iduser = $_GET['iduser'];
    if (!is_null($iduser)) {
      $data_user = $db->ambil_data_user($iduser);
    } else {
      header("Location:tampil_user.php");
    }
    ?>
    <input type="hidden" name="iduser" value="<?= $iduser ?>">
    <table>
      <tr>
        <td>Username</td>
        <td><input type="text" value="<?= $data_user['username']; ?>" name="username"></td>
      </tr>
      <tr>
        <td>Type</td>
        <td>
          <select name="tipe">
            <?php $tipe = $data_user['type'] ?>
            <option value="A" <?php if ($tipe == "A") {
                                echo "selected";
                              } ?>>Admin</option>
            <option value="U" <?php if ($tipe == "U") {
                                echo "selected";
                              } ?>>User</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>Cek</td>
        <td>
          <select name="cek">
            <?php $tipe = $data_user['cek'] ?>
            <option value="0" <?php if ($tipe == "0") {
                                echo "selected";
                              } ?>>Isi Data</option>
            <option value="1" <?php if ($tipe == "1") {
                                echo "selected";
                              } ?>>Lengkap</option>
            <option value="-" <?php if ($tipe == "-") {
                                echo "selected";
                              } ?>>Blokir</option>
          </select>
        </td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" value="Update"></td>
      </tr>
    </table>
  </form>
</center>