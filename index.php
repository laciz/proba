<?php include('php/insert_user.php') ?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>VTS közösségi oldal</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Montserrat&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/ec2a35f277.js"></script>


</head>
<body>
<script src="js/script.js"></script>
<div class="container">
    <div class="header">
        <div class="header-logo">
            <img  class="logo" src="images/logo.png">
        </div>
        <div class="header-info">
            <h3>Üdvözöllek a VTS diákok közösségi oldalán</h3>
        </div>
        <div class="header-login">
            <button class="log-btn"  onclick="LoginRegister(1)"><i class="fas fa-sign-in-alt"></i>Bejelentkezés</button>
            <button class="reg-btn"  onclick="LoginRegister(2)"><i class="fas fa-user-plus"></i>Regisztráció</button>
        </div>
    </div>
    <div class="main">
        <div class="main-images1">

        </div>
        <div class="main-form">
            <form class="register"  method="post" onsubmit="return formValidation()">
                <h3 id="message">Regisztrálj!</h3>
                <label for="fname">Keresztnév..</label>
                <input type="text" id="fname" name="firstname" placeholder="Your name..">

                <label for="lname">Vezetéknév..</label>
                <input type="text" id="lname" name="lastname" placeholder="Your last name..">

                <label for="username">Felhasználónév..</label>
                <input type="text" id="username" name="username" placeholder="Your last name..">


                <label for="email">Email..</label>
                <input type="text" id="email" name="email" placeholder="Your last name..">

                <label for="password">Jelszó..</label>
                <input type="password" id="password" name="password" placeholder="Your last name..">

                <label for="szak">Szakirány</label>
                <select id="szak" name="szak">
                    <option value="0">Válassz egy szakot</option>
                    <option value="Informatika">Informatika</option>
                    <option value="Menedzsment">Menedzsment</option>
                    <option value="Mechatronika">Mechatronika</option>
                    <option value="Gépészet">Gépészet</option>
                </select>

                <input type="submit" id="sb" name="sb" value="Regisztrálok">
            </form>
            <form  class="login" method="post" action="php/login.php">
                <h3>Jelenetkezz be!</h3>
                <label for="email">Email</label>
                <input type="text" id="email" name="email" placeholder="Email cím">

                <label for="password">Jelszó</label>
                <input type="password" id="password" name="password" placeholder="Jelszó">
                <input type="submit" name="login" value="Bejelentkezés">


            </form>
        </div>
        <div class="main-images2">

        </div>
    </div>
    <div class="footer">
       <i class="fab fa-facebook-square"></i>
        <i class="fab fa-instagram"></i>
        <i class="fab fa-twitter-square"></i>


    </div>
</div>
</body>
</html>