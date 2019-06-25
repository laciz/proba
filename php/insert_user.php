<?php
include 'connection.php';

if (isset($_POST['fname'])){

    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password_1=$_POST['password'];
    $szakirany=$_POST['select'];
    $user_image='default.png';
    $posts='no';
    $recover='lol';
    $cover_image='cover.jpg';


    $password = md5($password_1);
    $query = "INSERT into users (f_name,l_name,username, password, email,szakirany,user_image,posts,recovery_account,reg_date,cover_image)
VALUES ('$fname', '$lname', '$username','$password','$email','$szakirany','$user_image','$posts','$recover',now(),'$cover_image')";
    $result = mysqli_query($con,$query);
    if($result){
        echo "fasy";
    }else{
        echo "noset";
    }

}