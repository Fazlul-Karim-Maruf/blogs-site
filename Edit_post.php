<?php
 
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
            font-size: 15px;
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
        }
        @media only screen and (max-width: 600px) {
  
.form{
    width: 100%;
    margin-top: 0;
}
}
 #form-control{
    font-size: 15px;
 }

    </style>


</head>

<body>
    <?php 
    include "config.php";
    $id = $_GET['id'];
    $sql = "SELECT * FROM posts where id = {$id}";
    $result = mysqli_query($conn,$sql) or die("Query failed");
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){

       
    ?>
    <form class="form"  action="savepost.php" method="POST" enctype="multipart/form-data" autocomplete="off">
        <h2>Edit post</h2>
        <div class="mb-3">
            <label for="form-control" class="form-label"  > Post title</label>
            <input type="text" class="form-control" name="title" id="form-control" value="<?php echo $row['title'] ?>" placeholder=" " required>
        </div>
        <div class="mb-3">
            <label for="form-control" class="form-label"  >Slug</label>
            <input type="text" class="form-control" name="slug" id="form-control" value="<?php echo $row['slug'] ?>" placeholder=" "required>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label"  >Content</label>
            <textarea class="form-control" name="content" id="form-control" rows="5" required> <?php echo $row['content'] ?></textarea>
        </div>
        <div>
            <label for="">Post image</label>
            <input type="file" name="new_image" id="image" >
            <img src="postimage/<?php echo $row['img']; ?>" height="150px">
            <input type="hidden" name="fileToUpload" value="<?php echo $row['img']; ?>">
        </div>
      <button type="submit" name="submit">submit</button>
    </form>
    <?php 
    }
}
?>


 
     
</body>

</html>