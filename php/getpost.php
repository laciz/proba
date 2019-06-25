<?php
/****************************************
Ezt a fáljt arra használjuk,hogy Ajax technológiával kiirjuk a főoldalra a posztokat
 ******************************************/
session_start();

include 'connection.php';


global $con;
$query = "SELECT * from posts  order by post_date desc";
$run_post = mysqli_query($con, $query);

while ($row = mysqli_fetch_array($run_post)) {


    $user_id = $row['user_id'];
    $post_id = $row['post_id'];
    $query_2 = "SELECT * from users where posts='yes' and user_id='$user_id' ";
    $run_user = mysqli_query($con, $query_2);
    $row_user = mysqli_fetch_array($run_user);

    $username = $row_user['username'];
    $content = $row['post_comment'];
    $image = $row['upload_image'];
    $user_image = $row_user['user_image'];
    $post_time = $row['post_date'];

    $_SESSION['post_user_id']=$row_user['user_id'];
    $post_user_id=$_SESSION['post_user_id'];

    echo "
     <div id='maincnt' class=\"container\">
  <div  id='mainrow' class=\"row\">
    <div class=\"col\"> <a href='profile.php?uid=$post_user_id' <p class='usr'>@$username</p></a>
    <img  class='userimg' src='$user_image' width='32px' height='32px'><p class='date'> $post_time</p></div>
    <div class=\"col\"><p class='cnt'>$content</p>
    <img class='imig' src='$image' width='422px' height='422px'></div>
    <div class=\"col\"> </div>
  </div>
</div>
                     
"; }