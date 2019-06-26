<?php
session_start();
include "connection.php";


    $post_id=$_SESSION['post_id'];
    $comment="select * from comments where post_id='$post_id'";
    $run_comment=mysqli_query($con,$comment);



    while($row_comment=mysqli_fetch_array($run_comment)){

        $comment_author=$row_comment['comment_author'];
        $comment_date=$row_comment['date'];
        $comment_content=$row_comment['comment'];


        echo "
         <p>$comment_author</p>
         <p>$comment_content</p>
        ";




    }


