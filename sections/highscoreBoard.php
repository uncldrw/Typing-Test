<?php
require 'includes/dbh_incl.php';
if (isset($_SESSION['userId'])) {
    $sql = "SELECT * FROM highscore ORDER BY wpm DESC LIMIT 10;";
    $result = mysqli_query($con, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0) {
        ?>
<div class="highscore">
  <table class="highscoreBoard">
    <h2 class="highscoreTitle">Highscore</h2>
    <tr>
      <td><strong>Name</strong></td>
      <td><strong>WPM</strong></td>
      <td><strong>Richtig</strong></td>
      <td><strong>Falsch</strong></td>
    </tr>
    <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
            <td>" . $row["uName"] . "</td>
            <td>" . $row["wpm"] . "</td>
            <td>" . $row["c_words"] . "</td>
            <td>" . $row["f_words"] . "</td>
          </tr>";
        }
    }
} else { ?>

<div class="highscore highscoreLock">
  <table class="highscoreBoard">
      <h1>Melde dich an um die Rangliste zu sehen</h1>
      <i class="fas fa-lock"></i>
<?php
}
?>
  </table>
</div>
