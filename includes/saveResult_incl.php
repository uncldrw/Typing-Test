<?php
if (isset($_POST['confirmSave'])) {
    require 'dbh_incl.php';

    $user = $_POST['user'];
    $wpm = $_POST['wpm'];
    $cwords = $_POST['c_words'];
    $fwords = $_POST['f_words'];

    $sql = "INSERT INTO highscore (uName, wpm, c_words, f_words) VALUES (?,?,?,?)";
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../index.php?error=cantsaveresult");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "ssss", $user, $wpm, $cwords, $fwords);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        header("Location: ../index.php?save=success");
        exit();
    }
} else {
    header("Location: ../index.php?error=cantsaveresult");
    exit();
}
