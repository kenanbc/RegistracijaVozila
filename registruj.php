<?php
$servername = "localhost:3306";
$usernamedb = "root";
$passwordb = "1234";
$dbname = "registracija_vozila";

$conn = new mysqli($servername, $usernamedb, $passwordb, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();

$marka = $_SESSION['marka'];
$model = $_SESSION['model'];
$godinaProizvodnje = $_SESSION['godinaProizvodnje'];
$brojMotora = $_SESSION['brojMotora'];
$boja = $_SESSION['boja'];
$snaga = $_SESSION['snaga'];
$brojSasije = $_SESSION['brojSasije'];
$kubikaza = $_SESSION['kubikaza'];
$tipMotora = $_SESSION['tipMotora'];
$karoserija = $_SESSION['karoserija'];
$vrsta = $_SESSION['vrsta'];

if(!isset($_SESSION['brojMotora'])) {
    $brojMotora = null;
    $snaga = null;
    $kubikaza = null;
    $tipMotora = null;
  }

$ime = $_SESSION['ime'];
$prezime = $_SESSION['prezime'];
$jmbg = $_SESSION['jmbg'];
$adresa = $_SESSION['adresa'];
$grad = $_SESSION['grad'];
$kanton = $_SESSION['kanton'];
$telefon = $_SESSION['telefon'];


$tablica = $_POST["tablica"];
$datumRegistracije = $_POST["datumRegistracije"];
$istekRegistracije = $_POST["istekRegistracije"];
$statusRegistracije = "Aktivna";
$uredID = $_COOKIE["user"];


$vozilo = $conn->prepare("INSERT INTO vozilo (brojSasije, marka, model, karoserija, vrsta, boja, godinaProizvodnje, tipMotora, snagaMotora, kubikaza, brojMotora) 
                              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

$vozilo->bind_param("sssssssssss", $brojSasije, $marka, $model, $karoserija, $vrsta, $boja, $godinaProizvodnje, $tipMotora, $snaga, $kubikaza, $brojMotora);

$vozilo->execute();

$voziloID = $vozilo->insert_id;

if ($voziloID) {

    $provjeraVlasnika = "SELECT VlasnikID FROM vlasnik WHERE jmbg = '$jmbg'";
    $result = $conn->query($provjeraVlasnika);
    if ($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $vlasnikID = $row['VlasnikID'];
        
        $registarskaOznaka = $conn->prepare("INSERT INTO registracija (registracijskaOznaka, voziloID, vlasnikID, datumRegistracije, datumistekaRegistracije, statusRegistracije, uredID) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $registarskaOznaka->bind_param("siisssi", $tablica, $voziloID, $vlasnikID, $datumRegistracije, $istekRegistracije, $statusRegistracije, $uredID);

            if ($registarskaOznaka->execute()) {
                $_SESSION['voziloID'] = $voziloID;
                $_SESSION['vlasnikID'] = $vlasnikID;

                $conn->close();
                header("Location: uspjesnoRegistrovano.php");
                exit();
            } else {
                $greska = $registarskaOznaka->error;
            }
    }
    else
    {
        $vlasnik = $conn->prepare("INSERT INTO vlasnik (ime, prezime, jmbg, adresa, grad, kanton, telefon) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $vlasnik->bind_param("sssssss", $ime, $prezime, $jmbg, $adresa, $grad, $kanton, $telefon);

        if ($vlasnik->execute()) {
            $vlasnikID = $vlasnik->insert_id;

            if ($vlasnikID) {
                $registarskaOznaka = $conn->prepare("INSERT INTO registracija (registracijskaOznaka, voziloID, vlasnikID, datumRegistracije, datumistekaRegistracije, statusRegistracije, uredID) VALUES (?, ?, ?, ?, ?, ?, ?)");
                $registarskaOznaka->bind_param("siisssi", $tablica, $voziloID, $vlasnikID, $datumRegistracije, $istekRegistracije, $statusRegistracije, $uredID);

                if ($registarskaOznaka->execute()) {
                    $_SESSION['voziloID'] = $voziloID;
                    $_SESSION['vlasnikID'] = $vlasnikID;

                    $conn->close();
                    header("Location: uspjesnoRegistrovano.php");
                    exit();
                } else {
                    $greska = $registarskaOznaka->error;
                }
                } else {
                    $greska = $vlasnik->error;
                }
            } else {
                $greska = $vlasnik->error;
            }
    }
}else{
    $greska = $vozilo->error;
}

    $conn->close();

if (isset($greska)) {
    header("Location: greska.php");
    exit();
}
