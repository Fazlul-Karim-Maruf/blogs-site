<?php
if (isset($_FILES['fileUpload'])) {
    $errors = array();
    $file_name = $_FILES['fileUpload']['name'];
    $file_size = $_FILES['fileUpload']['size'];
    $file_tem = $_FILES['fileUpload']['tmp_name'];
    $file_type = $_FILES['fileUpload']['type'];
    $file_ext = strtolower(end(explode('.', $file_name)));
    $extention = array("jpg", "jpeg", "png");

    if (in_array($file_ext, $extention) == false) {
        $errors[] = "File does not exist.It must be jpg,jpeg and png.";
    }
    if ($file_size > 2097152) {
        $errors[] = "File must be 2 mb";
    }
    if (empty($errors) == true) {
        move_uploaded_file($file_tem, "image/" . $file_name);
    } else {
        print_r($errors);
        die();
    }
}
if (isset($_POST['signup'])) {
    include "config.php";
    $email = $_POST['email'];
    $password = $_POST['pswd'];
    $username = $_POST['uname'];
    $sql = "INSERT INTO users(email,password,username,img) VALUES ('{$email}','{$password}','{$username}','{$file_name}')";
    $result = mysqli_query($conn, $sql);
    header("Location: http://localhost/Blogs_site/index.php");
}

mysqli_close($conn);
?>
