<?php
session_start();

function getID() {
    if(isset($_POST['voziloID'])){
        return $_POST['voziloID'];
    } else {
        return null;
    }
}

$voziloID = getID();

$_SESSION['voziloID'] = $voziloID;
$_SESSION['modalSent'] = 1;

header("Location: pregledVozila.php");
exit;
?>
