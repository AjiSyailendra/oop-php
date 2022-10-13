<center>
  <h1>CRUD OOP PHP</h1>
  <h2>Tambah Data User</h2>
  <form action="proses.php?aksi=tambah_user" method="post">
    <table>
      <tr>
        <td>Username</td>
        <td><input type="text" name="username"></td>
      </tr>
      <tr>
        <td>Password</td>
        <td><input type="password" name="password"></td>
      </tr>
      <tr>
        <td>Type</td>
        <td>
          <select name="tipe">
            <option value="A">Admin</option>
            <option value="U">User</option>
          </select>
        </td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" value="Simpan"></td>
      </tr>
    </table>
  </form>
</center>