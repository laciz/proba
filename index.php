<?php include('php/insert_user.php') ?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>VTS közösségi oldal</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Montserrat&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/ec2a35f277.js"></script>


</head>
<body>
<script src="js/script.js"></script>
<div class="container">
    <div class="row row-no-gutters">
        <div class="col-xs-6 col-md-4">
            <img  class="logo" width="100" height="100" src="images/logo.png">
        </div>
        <div  id="titl" class="col-xs-6 col-md-4">

        <h3 id="til">x</h3>
        </div>
        <div class="col-xs-6 col-md-4">
            <br>
            <button  type="button" class="btn btn-outline-primary"  onclick="LoginRegister(1)"><i class="fas fa-sign-in-alt"></i>Bejelentkezés</button>
            <button type="button" class="btn btn-outline-primary"  onclick="LoginRegister(2)"><i class="fas fa-user-plus"></i>Regisztráció</button>
        </div>
    </div>

    <div class="row row-no-gutters">

        <div class="col-xs-6">

            <img src="images/img1.jpg" width="650px" height="550px">

        </div>
        <div class="col-xs-6 col-md-4">
            <form class="register"  method="post" onsubmit="return formValidation()">
                <h3 >Csatlakozz</h3>
                <label for="fname">Keresztnév..</label>
                <input type="text"  class="form-control" id="fname" name="firstname" placeholder="A keresztneved..">

                <label for="lname">Vezetéknév..</label>
                <input class="form-control" type="text" id="lname" name="lastname" placeholder="A vezetékneved">

                <label for="username">Felhasználónév..</label>
                <input class="form-control" type="text" id="username" name="username" placeholder="A felhasználóneved">


                <label for="email">VTS Email felhasználónév</label>
                <input class="form-control mb-4" type="text" id="email" name="email" placeholder="@vts.su.ac.rs">

                <label for="password">Jelszó..</label>
                <input class="form-control"  type="password" id="password" name="password" placeholder="Jelszó">

                <label for="szak">Szakirány</label>
                <select class="form-control form-control-sm" id="szak" name="szak">
                    <option value="0">Válassz egy szakot</option>
                    <option value="Informatika">Informatika</option>
                    <option value="Menedzsment">Menedzsment</option>
                    <option value="Mechatronika">Mechatronika</option>
                    <option value="Gépészet">Gépészet</option>
                </select>
       <br>
                <input  class="btn btn-primary btn-lg btn-block" type="submit" id="sb" name="sb" value="Regisztrálok">
            </form>
            <form  class="login" method="post" action="php/login.php">
                <h3>Bejelentkezés</h3>
                <label for="email">Email</label>
                <input  class="form-control" type="text" id="email" name="email" placeholder="Email cím">

                <label for="password">Jelszó</label>
                <input class="form-control" type="password" id="password" name="password" placeholder="Jelszó"><br>
                <input  class="btn btn-primary" type="submit" name="login" value="Bejelentkezés" >


            </form></div>


</div>

    <div  id="cl" class="col-sm">
        <?php
        $query="select count(username) as 'usr' from users";
        $query2="select count(post_id) as 'pst' from posts";
        $run=mysqli_query($con,$query);
        $row=mysqli_fetch_array($run);
        $run2=mysqli_query($con,$query2);
        $row2=mysqli_fetch_array($run2);
        ?>
        <table>
        <tr>
            <td><h6> <?php echo $row['usr'];?> Regisztrált felhasználó</h6></td>
        </tr>
        <tr>
            <td><h6> <?php echo $row2['pst'];?> Bejegyzés</h6></td>
        </tr>
        </table>
        <script>
            var myJSON = '{"name":"VTS közösségi", "author":"Valentin es Zoltan", "city":"Szabadka"}';
            var myObj = JSON.parse(myJSON);
            document.getElementById("til").innerText = myObj.name;
        </script>
        <table class="tbl">
            <tr>
                <td><i class="fab fa-facebook-square"></i></td>
                <td><i class="fab fa-instagram"></i></td>
                <td><i class="fab fa-twitter-square"></i></td>
            </tr>
        </table>

    </div>


</body>
</html>