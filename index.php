<?php

switch ($_GET['page']) {
  case 'login':
    // echo 'login';
    require_once 'login.php';
    break;
  case 'dashboard':
    echo 'dashboard';
    break;

  default:
    echo '404 Halaman tidak ditemukan.';
    break;
}
