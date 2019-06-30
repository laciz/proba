<?php
session_start();
if(!isset($_SESSION['usrname'])){
    header("location : ../index.php");
}

?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <title>VTS közösségi oldal</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Montserrat&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/ec2a35f277.js"></script>

</head>
<body>
 <div class="container">
     <div class="row row-no-gutters">
         <div class="col-xs-6 col-md-4">
             <h3>Adminisztrációs felület</h3>
         </div>
     </div>
     <div class="row row-no-gutters">
         <div class="col-xs-6 col-md-4">
             <h4>Felhasználók</h4>
             <?php
             include '../php/connection.php';
             $user="select * from users";
             $run_user=mysqli_query($con,$user);
             while($row_user=mysqli_fetch_array($run_user)){
                 $id=$row_user['user_id'];
                 $fname=$row_user['f_name'];
                 $lname=$row_user['l_name'];
                 $name=$row_user['username'];

                 echo "
                 
                 <p>id: $id<p>Keresztnév:$fname</p><p>Vezetéknév:$lname</p><p>Felhasználónév:$name</p>
                 <a href='adminhome.php?id=$id'>Törlés</a>
                 
                 ";


             }
             if(isset($_GET['id'])){
                 $id=$_GET['id'];
                 $del="delete from users where user_id='$id'";
                 $run_del=mysqli_query($con,$del);
                 echo "<script>alert('Törölve')</script>";
                 echo "<script>window.location.replace('adminhome.php','_self')</script>";
             }
             ?>
         </div>

         <div class="col-xs-6 col-md-4">
             <h4>Posztok</h4>
             <?php
             include '../php/connection.php';
             $post="select * from posts";
             $run_post=mysqli_query($con,$post);
             while($row_post=mysqli_fetch_array($run_post)){
                 $id=$row_post['post_id'];
                 $user_id=$row_post['user_id'];
                 $content=$row_post['post_comment'];


                 echo "
                 
                 <p>id: $id<p>Felhasználó:$user_id</p><p>Leírás:$content</p>
                 <a href='adminhome.php?id=$id'>Törlés</a>
                  
                 ";

             }
              if(isset($_GET['id'])){
                  $id=$_GET['id'];
                  $del="delete from posts where post_id='$id'";
                  $run_del=mysqli_query($con,$del);
                  echo "<script>alert('Törölve')</script>";
                  echo "<script>window.location.replace('adminhome.php','_self')</script>";
              }
             ?>
         </div>
         <div class="col-xs-6 col-md-4">
             x
         </div>
     </div>
 </div>
</body>
</html>
