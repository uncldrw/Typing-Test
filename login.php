<?php require(__DIR__ . "/sections/header.php"); ?>

<div class="login">
    <div class="loginBox">
    <div class="loginTitle">
        <h1>Anmelden</h1>
    </div>
    <form  action="includes/login_incl.php" method="post" class="loginField">
      <div class="loginInput">
          <input name="mailuid" type="text" placeholder="E-Mail/Benutzername">
          <input name="pwd" type="password" placeholder="Passwort">
      </div>
      <button type="submit" name="login-submit">Los Gehts!</button>
    </form>
    </div>
</div>

<?php require(__DIR__ . "/sections/footer.php"); ?>
