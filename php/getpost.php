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


    $comment="select * from comments where post_id=$post_id";
    $run_comment=mysqli_query($con,$comment);




    $_SESSION['post_id']=$post_id;
    echo "
     <div id='maincnt' class=\"container\">
  <div  id='mainrow' class=\"row\">
    <div class=\"col\"> <a href='profile.php?uid=$post_user_id' <p class='usr'>@$username</p></a>
    <img  class='userimg' src='$user_image' width='32px' height='32px'><p class='date'> $post_time</p></div>
    <div class=\"col\"><p class='cnt'>$content</p>
   
    <img class='imig' src='$image' width='522px' height='522px'>
    <form action='comments.php?uid=$post_id' method='post' enctype=\"multipart/form-data\">
        <textarea id='comment' class='form-control' name='comment' rows='2' placeholder=\"Mi jár a fejedben?\">
      
</textarea>

<button type=\"submit\" name='sb' id='cmt' class=\"btn btn-primary btn-sm\">Hozzászólok</button>
</form>
 </div>
    <div id='colaj' class=\"col\"> <a href='single_post.php?postid=$post_id'> </a>
        
 </div>
  </div>
</div>
                     
";
while($row_comment=mysqli_fetch_array($run_comment)){

    $comment_author=$row_comment['comment_author'];
    $comment_date=$row_comment['date'];
    $comment_content=$row_comment['comment'];

    echo "
<div id='cmtcnt' class='container'>


   <div  class='row'>
   <div  id='cmtrow' class='col'>
   <p class='usr'>@$comment_author</p>
<p class='date'> $comment_date</p>
<p class='cnt'> $comment_content</p>
</div>
   
</div>
</div>
          

";
}

}

