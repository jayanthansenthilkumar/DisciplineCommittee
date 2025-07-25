<?php
session_start();
if (isset($_SESSION['fid'])) {
    $fid = $_SESSION['fid'];
}
if (!isset($_SESSION['login_user'])) {
    header("Location: index.php");
    exit;
}
