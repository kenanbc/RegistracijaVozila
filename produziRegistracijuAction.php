<?php
$servername = "localhost:3306";
$usernamedb = "root";
$passwordb = "1234";
$dbname = "registracija_vozila";

$conn = new mysqli($servername, $usernamedb, $passwordb, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$brojSasije = $_POST["brojSasije"];
$brojRegistracije = $_POST["brojRegistracije"];
$datumRegistracije = $_POST["datumRegistracije"];
$istekRegistracije = $_POST["istekRegistracije"];
$statusRegistracije = "Aktivna";
$uredID = $_COOKIE["user"];

session_start();

$_SESSION['tablica'] = $brojRegistracije;


$registracija = $conn->prepare("UPDATE registracija
                                SET datumRegistracije = '$datumRegistracije', datumIstekaRegistracije = '$istekRegistracije', uredID = $uredID 
                                WHERE registracijskaOznaka = '$brojRegistracije'");

$registracija->execute();

if ($registracija) {
    header("Location: uspjesnoRegistrovano.php");
}
    $conn->close();

if (isset($greska)) {
    header("Location: greska.php");
    exit();
}
