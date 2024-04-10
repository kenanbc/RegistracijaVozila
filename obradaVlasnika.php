<?php
session_start();

function getID() {
    if(isset($_POST['vlasnikID'])){
        return $_POST['vlasnikID'];
    } else {
        return null;
    }
}

$vlasnikID = getID();

$_SESSION['vlasnikID'] = $vlasnikID;
$_SESSION['modalSent'] = 1;

header("Location: pregledVlasnika.php");
exit;
?>
