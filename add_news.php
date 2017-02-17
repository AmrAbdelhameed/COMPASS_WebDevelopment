<?php

$connection = new mysqli('localhost','root','','compass_api') or die ("Database connection failed");

if (isset($_POST['upload']))
{
    $target = "images/".basename($_FILES['image']['name']);
    
    $image = $_FILES['image']['name'];
    $title = mysqli_real_escape_string($connection,$_POST['title']);
    $text = mysqli_real_escape_string($connection,$_POST['text']);
    
    $sql = "INSERT INTO news (title, image, text) VALUES ('$title', '$image', '$text')";
    
    $query = mysqli_query($connection,$sql);
    
    if (!$query)
    {
        die ('Query FAILED' . mysqli_error());
    }
    else 
        echo "Done";
    
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload News</title>
    <link rel="shortcut icon" href="compass.jpg">
</head>
<body>
    <div id="content">
<form action="add_news.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="size" value="1000000">
    <div style="text-align: center; margin: 18px 0;">
        <input type="file" name="image" required>
        </div>
     <div style="text-align: center; margin: 18px 0;">
        <input name="title" placeholder="Add Title ..." size="38px" required/>
        </div>
    <div style="text-align: center; margin: 18px 0;">
        <textarea name="text" cols="40" rows="4" placeholder="Say something about this image ..." required></textarea>
        </div>
    <div style="text-align: center; margin: 18px 0;">
        <input type="submit" name="upload" value="Upload Image">
        </div>
</form>
        </div>
</body>
</html>