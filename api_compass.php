<?php

$connection = mysqli_connect('localhost','root','','compass_api');

if (mysqli_connect_errno())
{
    die ("error in connection:".mysqli_connect_error());
    return;
}
    $query_news = "SELECT * FROM news";
    $query_workshops = "SELECT * FROM workshops";
    $result = mysqli_query($connection , $query_news);
    $result2 = mysqli_query($connection , $query_workshops);
    if (!$result || !$result2)
    {
        die ('Query FAILED' . mysqli_error()); 
    }

 while ($row = mysqli_fetch_assoc($result)) {
    $output[]=$row;
}
while ($row2 = mysqli_fetch_assoc($result2)) {
    $output2[]=$row2;
}

print (json_encode(array('News'=>$output, 'Workshops'=>$output2)));

mysqli_free_result($result);
mysqli_close($connection);

?>
