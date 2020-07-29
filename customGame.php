<?php require(__DIR__ . "/sections/header.php"); ?>
<h1>Gebe deine 3 Themen an</h1>
<p class="desc">Diese 3 Wörter bestimmen deinen Wortschatz</p>
<div class="customInput">
    <div>
        <p>Wort 1</p>
        <input type="text">
    </div>
    <div>
        <p>Wort 2</p>
        <input type="text">
    </div>
    <div>
        <p>Wort 3</p>
        <input type="text">
    </div>
</div>
<h1>ANSI Modus</h1>
<p class="desc">Keine Umlaute</p>
<div class="withTime">
        <div>
            <p>Ja</p>
            <input type="radio" name="withU">
        </div>
        <div>
            <p>Nein</p>
            <input type="radio" name="withU">
        </div>
    </div>
</div>
<h1>Groß- und Kleinschreibung beachten?</h1>
<div class="withTime">
        <div>
            <p>Ja</p>
            <input type="radio" name="withSize">
        </div>
        <div>
            <p>Nein</p>
            <input type="radio" name="withSize">
        </div>
    </div>
</div>
<div>
<h1>Möchtest du auf Zeit spielen?</h1>
<p class="desc">Übe mit oder Ohne Zeit (Bei Nein läuft der Test unbegrenzt)</p>
    <div class="withTime">
        <div>
            <p>Ja</p>
            <input type="radio" name="withTime" onclick=yesTime()>
        </div>
        <div>
            <p>Nein</p>
            <input type="radio" name="withTime" onclick=noTime()>
        </div>
    </div>
</div>
<div id="setTimeDiv" class="settime" style="display:none">
    <h1>Wie lange soll der Test ablaufen?</h1>
    <p class="desc">Gebe deine Zeit in Minuten ein</p>
    <div class="timeSet">
        <input type="number" placeholder="minuten" min="0" max="255">
    </div>
</div>
<h2>Bist du Fertig?</h2>
<div class="submitBtn">
    <input type="submit" value="Test Starten">
</div>
<?php require(__DIR__ . "/sections/footer.php"); ?>
  </body>
  <script src="JS/customgame.js"></script>
</html>