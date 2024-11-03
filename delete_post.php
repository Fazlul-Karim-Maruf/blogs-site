<?php
include "config.php";
$id = $_GET['id'];
$sql = "DELETE FROM posts WHERE id = {$id}";
$result = mysqli_query($conn,$sql) or die("Querry failed");
echo '<script>
 window.location.href="post.php";
        alert("post deleted")
</script>

';
header("Location: http://localhost/Blogs_site/post.php");
 

 



?>