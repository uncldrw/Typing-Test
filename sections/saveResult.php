<div class="saveResult">
    <div class="saveResultBox">
        <h1>Speichere dein Ergebnis</h1>
        <?php
        if (isset($_SESSION['userId'])) {
            ?>
        <form action="includes/saveResult_incl.php" method="post">
            <input id="user" type="hidden" name="user">
            <input id="wpm" type="hidden" name="wpm">
            <input id="c_words" type="hidden" name="c_words">
            <input id="f_words" type="hidden" name="f_words">
            <button type="submit" name="confirmSave">speichern</button>
        </form>
        <button class="closeButton">
            schließen
        </button>
        <?php
        } else {
            ?>
        <p>Melde dich an um diese Funktion nutzen zu können</p>
        <button class="closeButton">
            schließen
        </button>
        <?php
        }
        ?>
    </div>
</div>
