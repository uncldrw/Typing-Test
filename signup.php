<?php require(__DIR__ . "/sections/header.php"); ?>
<div class="signup">
    <div class="signupBox">
      <h1>Registrieren</h1>
      <div class="errorHandler">
      <?php
if (isset($_GET['error'])) {
    if ($_GET['error'] == "emptyfields") {
        echo '<p class="signupAlert">Bitte alle Felder ausfüllen!</p>';
    } elseif ($_GET['error'] == "invaliduidmail") {
        echo '<p class="signupAlert">Ungültiger Benutzername und E-mail!</p>';
    } elseif ($_GET['error'] == "invaliduid") {
        echo '<p class="signupAlert">Ungültiger Benutzername!</p>';
    } elseif ($_GET['error'] == "invalidmail") {
        echo '<p class="signupAlert">Ungültige E-mail!</p>';
    } elseif ($_GET['error'] == "passwordcheck") {
        echo '<p class="signupAlert">Passwörter stimmen nicht überein!</p>';
    } elseif ($_GET['error'] == "usertaken") {
        echo '<p class="signupAlert">Benutzername ist schon vergeben!</p>';
    }
} elseif (isset($_GET['signup']) == 'success') {
    echo '<p class="signupSucess">Account wurde Erstellt!</p>';
}
?>
    </div>
      <form action="includes/signup_incl.php" method="post">
          <input type="text" name="uid" placeholder="Benutzername">
          <input type="text" name="mail" placeholder="E-Mail Adresse">
          <input type="password" name="pwd"placeholder="Passwort">
          <input type="password" name="pwd-repeat" placeholder="Passwort Wiederholen">
          <div class="signupContainer">
            <button type="submit" name="signup-submit">Los Gehts!</button>
          </div>
      </form>
    </div>
</div>
<?php require(__DIR__ . "/sections/footer.php"); ?>
