<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "sico");
if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
    $name = $_SESSION['username'];
    $pass = $_SESSION['password'];
    $query = "SELECT * FROM `sico-log` where `password`='" . $pass . "' and `user_name`='" . $name . "' ";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) != 1) {
        header("Location: http://localhost/sico/");
    }
}
