<?php
include "config.php";
if(empty($_FILES['fileToUpload']['name'])){
    $file_name = $_POST['fileToUpload'];
}else{
    $error[] = array();
    $file_name =$_FILES['new_image']['name'];
    $file_tmp = $_FILES['new-image']['tmp_name'];
    $file_size =$_FILES['new-image']['size'];
    $file_type =$_FILES['new-image']['type'];
     $file_ext = strtolower(end(explode(".", $file_name)));
     $extention = array("jpg" , "png", "jepg");
    if(in_array($file_ext ,$extention)===false){
  $error[] ="This extension file not allowed, Please choose a JPG or PNG file.";
    }
    if($file_size > 2097152){
        $error[] = "This file must be 2 mb or lower";
    }
    if(empty($error)== true){
        move_uploaded_file($file_tmp, "postimage/" . $file_name);
    }else{
        print_r($error);
        die();
    }
}
$id = $_POST['id'];
$newtitle = $_POST['title'];
$newslug = $_POST['slug'];
$newcontent = $_POST['content'];
 

$sql = "UPDATE posts SET  slug = {$newslug},title ={$newtitle}, img ={$file_name},content ={$newcontent} WHERE id ={'$id'}";
$result = mysqli_query($conn,$sql);
if($result){
  
    header("Location: http://localhost/Blogs_site/post.php");
  
}else{
    die ("Query failed");
}



?>