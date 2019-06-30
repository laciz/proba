<?php
session_start();
$admin_username="admin";
$admin_pw="vKc4jF_%SG5";

if (isset($_POST['login'])){

$admin=$_POST['usrname'];
$adminpw=$_POST['password'];

if($admin == $admin_username && $adminpw == $admin_pw){
    $_SESSION['usrname']=$admin_username;
    header("Location : admin_home.php");

}else{
    echo "<script>alert('Rossz')</script>";

}



}else{
    echo "noset";
}
?>