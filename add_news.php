<?php 

 $connection = new mysqli('localhost','root','','compass_api') or die ("Database connection failed");

if (isset ($_POST['submit']))
{
    $image = mysqli_real_escape_string($connection,$_POST['name']);
    $title = mysqli_real_escape_string($connection,$_POST['emta']);
    $text = mysqli_real_escape_string($connection,$_POST['fen']);
    
    $sql = "insert into news (title, image, text) VALUES ('$title', '$image', '$text')";
    $query = mysqli_query($connection,$sql);
    
    if (!$query)
    {
        die ('Query FAILED' . mysqli_error());
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Add News Page</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <link rel="shortcut icon" href="compass.jpg">
    </head>
<body>

<h2>Add News Form</h2>

    <form action="add_news.php" method="post">
        <div class="container">
            <label for="name"><b>Link of Image</b></label>
            <input type="name" placeholder="Enter Link of Image" name="name" required>
        
              <label for="emta"><b>Title of News</b></label>
            <input type="emta" placeholder="Enter Title of News" name="emta" required>
            
            <label for="fen"><b>Description</b></label>
            <input type="fen" placeholder="Enter Description of News" name="fen" required>
          
          <button type="submit" name="submit"> Done </button>
            
        </div>
        </form>
</body>
</html>
