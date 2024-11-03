

<?php
session_start();

if (isset($_POST['login'])) {
    include "config.php";
    $email = $_POST['email'];
    $password = $_POST['pswd'];
    $sql = "SELECT * FROM users WHERE email = '{$email}' and password='{$password}'";
    $result = mysqli_query($conn, $sql) or die("query failed");
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo $row;

            $_SESSION['username'] = $row["username"];
            $_SESSION['id'] = $row["id"];
            $_SESSION['image'] = $row["img"];
              
            header("Location: http://localhost/Blogs_site/post.php ?>");
        }
    } else {
        echo '<script>  
        window.location.href="index.php";
        alert("Email or password not matched")
        </script>';
    }
}
