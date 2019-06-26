<?php
session_start();
include 'connection.php';

if (isset($_POST['sb'])){
    global $post_id;
    $user_email=$_SESSION['email'];
    $getuser="SELECT * from users where email='$user_email'";
    $run_user=mysqli_query($con,$getuser);
    $row_user=mysqli_fetch_array($run_user);

    $user_id=$row_user['user_id'];
     $post_id=$_GET['uid'];
    $author=$row_user['username'];

    $comment=$_POST['comment'];

    $comments="INSERT into comments (post_id,user_id,comment,comment_author,date)
    values ('$post_id','$user_id','$comment','$author',now()) ";

   $run_comments=mysqli_query($con,$comments);

    echo "<script>alert('Hozzászóltál!')</script>";
    echo "<script>window.open('home.php', '_self')</script>";





}

