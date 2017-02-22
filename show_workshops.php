<!DOCTYPE html>
<html>
<head>
<style>
table {
    width:100%;
}
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;
}
table#t01 tr:nth-child(even) {
    background-color: #eee;
}
table#t01 tr:nth-child(odd) {
   background-color:#fff;
}
table#t01 th {
    background-color: black;
    color: white;
}
</style>
    <title>Workshops</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <link rel="shortcut icon" href="compass.jpg">
</head>
<body>

    <h2 style="color: #000000;">Workshops</h2>

<table id="t01">
  <tr>
    <th>Name</th>
    <th>When</th> 
    <th>Where</th>
  </tr>
  <tr>
    <?php 
     $connection = new mysqli('localhost','root','','compass_api') or die ("Database connection failed");      
    $query = "SELECT * FROM workshops";
    $result = mysqli_query($connection , $query);
                    
    while ($row = mysqli_fetch_assoc($result))
     {
            $s1 = $row['name'];
            $s2 = $row['emta'];
            $s3 = $row['fen'];
            
    print "<tr> <td>";
        echo $s1; 
        print "</td> <td>";
        echo $s2; 
        print "</td> <td>";
        echo $s3; 
  
     }
            
 ?> 
</tr>
    
</table>

</body>
</html>
