<?php

$con = mysqli_connect("localhost","root", "", "webshop");


if (!$con)
{
  die('Could not connect: ' . mysql_error());
}

//mysql_select_db("webshop", $con);


$query = "SELECT * FROM `comments` ";


$comments = mysqli_query($con, $query  );


echo "<h1> User comments: </h1>";


while($row = mysqli_fetch_array($comments, MYSQL_ASSOC))
{

$comment = $row['comment'];
$timestamp = $row['id'];

echo "  <div style='margin:30px 0px;'>
      Comment: $comment<br />
      Timestamp: $timestamp
    </div>
  ";

}

mysqli_close($con);
?>