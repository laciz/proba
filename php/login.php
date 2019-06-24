<?php
session_start();
include 'connection.php';

if (isset($_POST['login'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password = md5($password);
    $select_user="SELECT * from users where email='$email' and password='$password'";
    $query=mysqli_query($con,$select_user);
    $check_user=mysqli_num_rows($query);

    if($check_user==1){
        $_SESSION['email']=$email;
        header("Location: home.php");
    }else{
        echo "<script>alert('Hibás adatokat adtál meg..')</script>";
        echo "<script>window.location.replace('../index.php','_self')</script>";

    }
}