<?php
session_start();
include '../php/connection.php';

if (isset($_POST['login'])){
    $username=$_POST['usrname'];
    $password=$_POST['password'];

    $select_user="SELECT * from admin where username='$username' and password='$password'";
    $query=mysqli_query($con,$select_user);
    $check_user=mysqli_num_rows($query);

    if($check_user==1){
        $_SESSION['usrname']=$username;
        header("Location: adminhome.php");
    }else{
        echo "<script>alert('Hibás adatokat adtál meg..')</script>";
        echo "<script>window.location.replace('admin.html','_self')</script>";

    }
}else{
    echo "noset";
}