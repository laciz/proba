
<?php include 'connection.php';
include 'functions.php';

session_start();

?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Title</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="https://kit.fontawesome.com/ec2a35f277.js"></script>
    <script src="../js/script.js"></script>

</head>
<body onload="loadData()">
<div  id="contain" class="container">
    <div  id="frontrow" class="row row-no-gutters">
        <div id="frontdivcol1" class="col-xs-6 col-md-4">
            <?php
            if (isset($_SESSION['email'])){
                Header("Content-type: text/html; charset=utf-8");
                $user=$_SESSION['email'];
                $get_user="SELECT * from users where email='$user'";
                $run_user=mysqli_query($con,$get_user);
                $row=mysqli_fetch_array($run_user);

                $user_name=$row['username'];
                $user_id=$row['user_id'];
                $first_name=$row['l_name'];
            }else{

                Header("Location:../index.php");
            }



            ?>
            <img  class="userimg" width="45px" height="45px" src="<?php echo $row['user_image'];?>">
            <a  href="profile.php?<?php echo "uid=$user_id"?>"><b>Üdv, </b><?php echo ''.$row['l_name'].'';?></a>
        </div>
        <div id="frontdiv" class="col-xs-6 col-md-4">
            <a class="mainmenu" href="home.php"><i class="fas fa-home"></i>Kezdőlap</a>
            <a href="profile.php?<?php echo "uid=$user_id"?>"><i class="fas fa-user-circle"></i>Fiók</a>
            <a href="home.php"><i class="fas fa-blog"></i>Bejegyzések</a>

        </div>
        <div  id="frontdivcol" class="col-xs-6 col-md-4">

            <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Kijelentkezés</a>
        </div>
    </div>
    <br>
    <br>
    <div class="row row-no-gutters">
        <div class="col-xs-6 col-md-4">
            </div>
        <div class="col-xs-6 col-md-4"> <form action="home.php?id=<?php echo $row['user_id'];?>" method="post" id="f" enctype="multipart/form-data">
                <textarea class="form-control"  id="content" rows="3" name="content" placeholder="Mi jár a fejedben?"></textarea><br>
                <!--<label class="label label-success" id="upload_image_button">-->
                    <input  type="file"  name="image" class="inputfile"  id="inputfil" size="12">

               <!-- </label>-->
                <button id="btnpost"  class="btn btn-primary" name="sub" onmouseover="commentsAjax()" >Küldés</button>
                <?php
                insertPost();

                ?>
            </form>



    </div>

</div>
    <div  id="ajaxdiv" class="row row-no-gutters"></div>

    <script>

        function loadData() {
          var xmlhttp;
          if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
              xmlhttp = new XMLHttpRequest();
          }

          xmlhttp.onreadystatechange = function () {
              console.log(xmlhttp.readyState);

              if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                  document.getElementById("ajaxdiv").innerHTML = xmlhttp.responseText;
              }
          }
          xmlhttp.open("GET", "getpost.php", true);
          xmlhttp.send();
      }
  </script>

</div>
</body>
</html>