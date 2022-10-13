<?php
date_default_timezone_set("Asia/Jakarta");
class database
{
  var $host = "localhost";
  var $username = "root";
  var $password = "";
  var $db = "latihan_cms";

  function __construct()
  {
    $this->koneksi = mysqli_connect(
      $this->host,
      $this->username,
      $this->password,
      $this->db
    );

    if (!$this->koneksi) {
      echo "koneksi gagal";
    }
  }

  function input_user($username, $password, $tipe)
  {
    $hariIni = date("Y-m-d H:i:s");
    $password_hash = md5($password);
    mysqli_query(
      $this->koneksi,
      "INSERT into users (username,password,register,type,cek)
     values ('$username','$password_hash','$hariIni','$tipe','0')"
    );
  }

  function tampil_user()
  {
    $hasil = [];
    $data = mysqli_query($this->koneksi, "SELECT * FROM users");
    while ($row = mysqli_fetch_array($data)) {
      $hasil[] = $row;
    }
    return $hasil;
  }

  function edit_user($iduser, $username, $tipe, $cek)
  {
    mysqli_query(
      $this->koneksi,
      "UPDATE users SET username='$username',type='$tipe',cek='$cek' where iduser='$iduser'"
    );
  }

  function hapus_user($iduser)
  {
    mysqli_query(
      $this->koneksi,
      "DELETE FROM users where iduser='$iduser'"
    );
  }

  function update_lastlogin($iduser)
  {
    $hariini = date('Y-m-d H:i:s');
    $query = mysqli_query(
      $this->koneksi,
      "UPDATE users set lastlogin='$hariini' where iduser='$iduser'"
    );
    return $query;
  }

  function login($username, $password)
  {
    $password_convert = md5($password);
    $query = mysqli_query(
      $this->koneksi,
      "SELECT * FROM users WHERE username='$username' and password='$password_convert'"
    );
    $dataUser = $query->fetch_array();
    $jumlah = $query->num_rows;

    if ($jumlah == 1) {
      setcookie('username', $username, time() + (60 * 60 * 24 * 5), '/');
      setcookie('iduser', $dataUser['iduser'], time() + (60 * 60 * 24 * 5), '/');
      $_SESSION['username'] = $username;
      $_SESSION['iduser'] = $dataUser['iduser'];
      $_SESSION['type'] = $dataUser['type'];
      $_SESSION['is_login'] = true;

      $this->update_lastlogin($dataUser['iduser']);
      // return $_SESSION;
      return TRUE;
    } else {
      return FALSE;
    }
  }

  function logout()
  {
    $_SESSION['is_login'] = FALSE;
    session_start();
    session_unset();
    session_destroy();
    setcookie('username', '', 0, '/');
    setcookie('iduser', '', 0, '/');
    session_destroy();
  }

  function ambil_data_user($iduser)
  {
    $data = mysqli_query($this->koneksi, "SELECT * FROM users where iduser='$iduser'");
    return $data->fetch_array();
  }


  function tampil_users_paging($awal, $batas)
  {
    $hasil = [];
    $data = mysqli_query($this->koneksi, "SELECT * FROM users ORDER BY lastlogin DESC LIMIT $awal, $batas");
    while ($row = mysqli_fetch_array($data)) {
      $hasil[] = $row;
    }
    $jml = $data->num_rows;
    if ($jml != 0) {
      return $hasil;
    }
  }
  function ambil_data_user_()
  {
    $hasil = [];
    $data = mysqli_query($this->koneksi, "SELECT * FROM users");
    while ($row = mysqli_fetch_array($data)) {
      $hasil[] = $row;
    }
    $jml = $data->num_rows;
    return $jml;
    // if ($jml != 0) {
    //   return $hasil;
    // }
  }
}
