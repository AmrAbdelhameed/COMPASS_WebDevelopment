<?php 

 $connection = new mysqli('localhost','root','','compass_api') or die ("Database connection failed");

if (isset ($_POST['submit']))
{
    $name = mysqli_real_escape_string($connection,$_POST['name']);
    $emta = mysqli_real_escape_string($connection,$_POST['emta']);
    $fen = mysqli_real_escape_string($connection,$_POST['fen']);
    
    $sql_check = "SELECT * FROM workshops";

    $result = mysqli_query($connection , $sql_check) or die ('Query FAILED' . mysqli_error());
    
    $x=0;
    
    while($row = mysqli_fetch_array($result))
          {
     if ($name == $row['name'])
     { 
         $x=1;
     }   
        
        }
    if ($x==1)
    {
       // echo "That email already exists ! Please try again with another.";
    $sql = "UPDATE workshops SET ";
    $sql .= "emta = '$emta', ";
    $sql .= "fen = '$fen' ";
    $sql .= "WHERE name = '$name' ";
        
    $query2 = mysqli_query($connection,$sql);
    
    if (!$query2)
    {
        die ('Query FAILED' . mysqli_error());
    }
    else 
        echo "Done";
    }
    else {
    
    $sql = "insert into workshops (name,emta,fen) values ('$name','$emta','$fen')";
    $query = mysqli_query($connection,$sql);
    
    if (!$query)
    {
        die ('Query FAILED' . mysqli_error());
    }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Add Workshop Page</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <link rel="shortcut icon" href="compass.jpg">
    </head>
<body>

<h2>Add Workshop Form</h2>

    <form action="add_workshop.php" method="post">
        <div class="container">
            <label for="name"><b>Name</b></label>
            <input type="name" placeholder="Enter Name Workshop" name="name" required>
        
              <label for="emta"><b>When</b></label>
            <input type="emta" placeholder="Enter When" name="emta" required>
            
            <label for="fen"><b>Where</b></label>
            <input type="fen" placeholder="Enter Where" name="fen" required>
          
          <button type="submit" name="submit"> Done </button>
            
        </div>
        </form>
</body>
</html>
