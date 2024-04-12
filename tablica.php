<?php

    if(!isset($_POST["tipMotora"])) {
        $brojMotora = null;
        $snaga = null;
        $kubikaza = null;
        $tipMotora = null;
    }else{
        $brojMotora = $_POST["brojMotora"];
        $tipMotora = $_POST["tipMotora"];
        $kubikaza = $_POST["kubikaza"];
        $snaga = $_POST["snagaMotora"];
    }
    $marka = $_POST["marka"]; 
    $model = $_POST["model"]; 
    $godinaProizvodnje = $_POST["godinaProizvodnje"];
    $boja = $_POST["boja"];
    $brojSasije = $_POST["brojSasije"];
    $karoserija = $_POST["karoserija"];
    $vrsta = $_POST["vrsta"];


    if(!isset($_POST["tipMotora"])) {
        $brojMotora = null;
        $snaga = null;
        $kubikaza = null;
        $tipMotora = null;
      }

    $ime = $_POST["ime"];
    $prezime = $_POST["prezime"];
    $jmbg = $_POST["jmbg"];
    $adresa = $_POST["adresa"];
    $grad = $_POST["grad"];
    $kanton = $_POST["kanton"];
    $telefon = $_POST["telefon"];

    session_start();

    $_SESSION['marka'] = $marka;
    $_SESSION['model'] = $model;
    $_SESSION['godinaProizvodnje'] = $godinaProizvodnje;
    $_SESSION['brojMotora'] = $brojMotora;
    $_SESSION['boja'] = $boja;
    $_SESSION['snaga'] = $snaga;
    $_SESSION['brojSasije'] = $brojSasije;
    $_SESSION['kubikaza'] = $kubikaza;
    $_SESSION['tipMotora'] = $tipMotora;
    $_SESSION['karoserija'] = $karoserija;
    $_SESSION['vrsta'] = $vrsta;

    $_SESSION['ime'] = $ime;
    $_SESSION['prezime'] = $prezime;
    $_SESSION['jmbg'] = $jmbg;
    $_SESSION['adresa'] = $adresa;
    $_SESSION['grad'] = $grad;
    $_SESSION['kanton'] = $kanton;
    $_SESSION['telefon'] = $telefon;


?>



<html>
    <head>
        <meta charset="UTF-8">
        <title>Registracija vozila BiH</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <div class="container d-flex justify-content-center align-items-center">
            <div class="col">
                <div class="card my-4 rounded-3 shadow-sm">
                  <div class="card-header py-3 text-center d-flex justify-content-between align-items-center">
                      <button class="btn" onclick="location.href='registracija.html'">
                          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                              <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
                          </svg>
                      </button>
                      <h4 class="my-0 mx-auto">Registracija vozila</h4>
                  </div>
                    <div class="card-body">    
                        <div class="row">
                            <div class="col-md-7 col-lg-12">
                              <h4 class="mb-3 fw-normal">Podaci o registraciji vozila</h4>
                              <form action="./registruj.php" method="post">
                              <div class="row g-3">
                                    <div class="col-sm-6">
                                        <label for="datumRegistracije" class="form-label">Datum registracije</label>
                                        <input type="text" class="form-control" id="datumRegistracije" name="datumRegistracije" placeholder="" value="<?php echo date('d.m.Y'); ?>">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="istekRegistracije" class="form-label">Datum isteka registracije</label>
                                        <input type="text" class="form-control" id="istekRegistracije" name="istekRegistracije" placeholder="" value="<?php echo date('d.m.Y', strtotime('+1 year')); ?>" required>
                                    </div>
                                </div>

                                <div class="row g-3 mt-3">
                                    <div class="col-12 d-flex justify-content-center align-items-center">
                                    <div class="tablica">
                                        <?php
                                            include 'generisanjeTablice.php';
                                            $tablica = generisiTablicu();
                                            echo $tablica;
                                        ?>
                                        <input type="hidden" name="tablica" value="<?php echo htmlspecialchars($tablica); ?>">
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <button class="btn btn-primary btn-lg" style="width: 80%; margin-top: 3%;" type="submit">Registruj vozilo</button>
                                    </div>
                                </div>
                            </form>
                            
                            </div>
                          </div>
                    </div>
                </div>
            </div>
    </body>
</html>