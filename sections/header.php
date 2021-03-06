<?php
session_start();
require 'includes/dbh_incl.php';
$sql = "SELECT * FROM users;";
$result = mysqli_query($con, $sql);
$resultCheck = mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html>
   <head>
      <script src="https://kit.fontawesome.com/a076d05399.js"></script>
      <meta charset="utf-8" />
      <link rel="stylesheet" href="/CSS/colorScheme.css" />
      <link rel="stylesheet" href="/CSS/styles.css" />
      <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
   </head>
   <div>
   <body id="body"onload=fetchWords()>
   <div class="dimming"></div>
      <div class="header">
         <div class="headerTitle">
            <div>
               <h1><a href="index.php">Typing Test v3</a></h1>
               <p>Teste Deine Tippgeschwindigkeit!</p>
            </div>
         </div>
         <div>
            <ul class="navPoints">
               <li><a href="customGame.php">Custom Game</a></li>
               <li><a href="#">Mein Account</a></li>
               <li><a href="#">Anleitung</a></li>
               <li><a href="#">Support</a></li>
            </ul>
         </div>
         <div class="headerRightNav">
            <?php
if (isset($_SESSION['userId'])) {
    $currentUsername = $_SESSION["userUid"]; ?>
            <div class="headerLoginSection">
               <button id="username"><?php echo $currentUsername; ?></button>
               <form action="includes/logout_incl.php" method="post">
                  <button class="btn headerLogoutBtn" type="submit" name="logout-submit">Abmelden</button>
               </form>
            </div>
            <?php
} else {
        ?>
            <p><a href="login.php">Anmelden</a></p>
            <p>|</p>
            <p><a href="signup.php">Registrieren</a></p>
            <?php
    }
?>
         </div>
      </div>