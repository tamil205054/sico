<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "sico");
if (isset($_POST['type'])) {
    if ($_POST['type'] == "sign-up") {
        $pin = base64_encode(uniqid("sico"));
        $name = base64_encode($_POST['name']);
        $uname = base64_encode($_POST['uname']);
        $v_id = base64_encode($_POST['v_id']);
        $pass = base64_encode($_POST['pass']);

        $query = "INSERT INTO `sico-log`(`log-pin`, `name`, `user_name`, `vehicle _id`, `password`) 
    VALUES ('" . $pin . "','" . $name . "','" . $uname . "','" . $v_id . "','" . $pass . "');";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo  base64_decode($pin);
        } else {
            echo "error";
        }
    }
    if ($_POST['type'] == "log-in") {
        $name = base64_encode($_POST['name']);
        $pass = base64_encode($_POST['pass']);
        $pin = base64_encode($_POST['pin']);
        $error = 0;
        $message = "";
        $query = "SELECT * FROM `sico-log` where `user_name`='" . $name . "'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) == 1) {
            $query = "SELECT * FROM `sico-log` where `password`='" . $pass . "'";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) == 1) {

                $query = "SELECT * FROM `sico-log` where `log-pin`='" . $pin . "'";
                $result = mysqli_query($conn, $query);
                if (mysqli_num_rows($result) == 1) {

                    $query = "SELECT * FROM `sico-log` where `password`='" . $pass . "' and `user_name`='" . $name . "' ";
                    $result = mysqli_query($conn, $query);
                    if (mysqli_num_rows($result) == 1) {
                        $_SESSION['username'] = $name;
                        $_SESSION['password'] = $pass;
                        echo "success";
                    } else {
                        echo "username password mismatched";
                    }
                } else {
                    echo "invalid pin";
                }
            } else {
                echo "invalid  password";
            }
        } else {
            echo "invalid user name";
        }
    }
}
