<?php
include "config.php";
session_start();
if(isset($_POST['submit'])){
    if (isset($_FILES['fileToUpload'])) {
        $errors = array();
        $file_name = $_FILES['fileToUpload']['name'];
        $file_size = $_FILES['fileToUpload']['size'];
        $file_tmp = $_FILES ['fileToUpload']['tmp_name'];
        $file_type = $_FILES['fileToUpload']['type'];
        $file_ext = strtolower(end(explode('.', $file_name)));
        $extention = array("jpg", "jpeg", "png");
    
        if (in_array($file_ext, $extention) == false) {
            $errors[] = "File does not exist.It must be jpg,jpeg and png.";
        }
        if ($file_size > 2097152) {
            $errors[] = "File must be 2 mb";
        }
        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, "postimage/" . $file_name);
        } else {
            print_r($errors);
            die();
        }
    }
    $content = $_POST['content'];
    $title = $_POST['title'];
    $slug = $_POST['slug'];
    $user_id = $_SESSION['id'];
    
    $sql = "INSERT INTO posts(user_id,slug,title,img,content) VALUES ('{$user_id}','{$slug}' ,'{$title}','{$file_name}','{$content}')";
    $result = mysqli_query($conn,$sql) or die("Query unsuccessful");
    header("Location: http://localhost/Blogs_site/post.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add post</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            min-height: 50vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background:url(logo/photo-1668713701571-1d1cbcefe7bd.jpg);
            padding: 30px;

        }
        form{
         border: 2px solid #ffffff;
          padding: 0 40px;
          margin-top: 40px;
          border-radius: 8px;
          width: 50%;
          box-shadow: 4px 4px 8px #e1306c
          -3px -5px 8px #ffffff;
          background: #DADCD0;
          
        }
        input{
            display: flex;
            align-items: center;
            height: 100px;
            width: 100%;
            font-size: 18px;
            margin: 10px 0;
            position: relative;
            border: 1px solid #ffffff;
            backdrop-filter: blur(50px);
            padding-top: 6px;
            padding-left: 10px;
            border-radius: 10px;
        }
        form label{
            color: black;
            font-weight: 400;
            font-size: 18px;
        }
        h2{
            padding: 30px;
            color: black;
            text-align: center;
            font-weight: 700;
        }
        button{
            width: 100px;
  height: 40px;
  margin: 10px auto;
  justify-content: center;
  display: block;
  color: #000000;
  background:#e1306c;
  font-size: 1.5em;
  font-weight: bold;
  margin-top: 30px;
  outline: none;
  border: none;
  border-radius: 5px;
  transition: transform 2s;
  cursor: pointer;
        }
        button:hover{
            background: #e1306c;
            transform: translateY(-5px);
        }
        .form-control{
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 4px;
            font-size: 15px;
        }
        @media only screen and (max-width: 600px) {
  
.form{
    width: 100%;
    margin-top: 0;
}
}

    </style>


</head>

<body>
    <form class="form"  action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
        <h2> Create Post</h2>
        <div class="mb-3">
            <label for="form-control" class="form-label"  > Post title</label>
            <input type="text" class="form-control" name="title" id="form-control" placeholder=" " required>
        </div>
        <div class="mb-3">
            <label for="form-control" class="form-label"  >Slug</label>
            <input type="text" class="form-control" name="slug" id="form-control" placeholder=" "required>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label"  >content</label>
            <textarea class="form-control" name="content" id="form-control" rows="5" required></textarea>
        </div>
        <div>
            <input type="file" name="fileToUpload" id="image">
        </div>
      <button type="submit" name="submit">submit</button>
    </form>
     
</body>

</html>