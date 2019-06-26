<?php
session_start();
include 'connection.php';


function deletePost(){
  global $con;
    if (isset($_GET['uid'])){
        $post_id=$_GET['postid'];
        $uid=$_GET['uid'];
        $session_user=$_SESSION['email'];
        $session_user_query="SELECT * from users where email='$session_user'";
        $run_session_user=mysqli_query($con,$session_user_query);
        $row_session_user=mysqli_fetch_array($run_session_user);

       $user="SELECT * from users where user_id='$uid'";
       $run_user=mysqli_query($con,$user);
       $row_user=mysqli_fetch_array($run_user);

       if ($row_session_user['user_id']==$row_user['user_id']){


               $delete="delete from posts where post_id='$post_id'";
               $run_delete=mysqli_query($con,$delete);
               echo "<script>alert('Eltávolítottad a bejegyzést')</script>";
               echo "<script>window.open('profile.php?uid=$uid', '_self')</script>";
           }else{
           echo "<script>alert('Csak saját bejegyzéseidet törölheted!')</script>";
           echo "<script>window.open('profile.php?uid=$uid', '_self')</script>";



    }
    }

    }

 deletePost();