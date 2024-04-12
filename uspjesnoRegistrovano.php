<?php
    session_start();
    if(!isset($_SESSION['voziloID'])){
      $servername = "localhost:3306";
      $usernamedb = "root";
      $passwordb = "1234";
      $dbname = "registracija_vozila";

      $conn = new mysqli($servername, $usernamedb, $passwordb, $dbname);
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      $brojRegistracije = $_SESSION['brojRegistracije'];

      $sql = "SELECT vlasnikID, voziloID 
              FROM registracija 
              WHERE registracijskaOznaka = '$brojRegistracije'";

      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $vlasnikID = $row['vlasnikID'];
          $voziloID = $row['voziloID'];
        }
      }
    }
    else {
      $voziloID = $_SESSION['voziloID'];
      $vlasnikID = $_SESSION['vlasnikID'];
    }
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Registracija vozila BiH</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <div class="container d-flex justify-content-center align-items-center vh-100">
            <div class="col">
                <div class="card my-4 rounded-3 shadow-sm vh-90">
                  <div class="card-header py-3 text-center d-flex justify-content-between align-items-center">
                    <button class="btn p-0" onclick="location.href='index.html'">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
                        </svg>
                    </button>
                    <h4 class="my-0 mx-auto">Uspješna registracija vozila</h4>
                  </div>
                
                    <div class="card-body"> 

                        <table class="table table-striped text-center">
                            <thead class="table-dark">
                              <tr>
                                <th scope="col">Registarska oznaka</th>
                                <th scope="col">Marka</th>
                                <th scope="col">Model</th>
                                <th scope="col">Vrsta</th>
                                <th scope="col">Tip motora</th>
                                <th scope="col">Broj šasije</th>
                                <th scope="col">Godina proizvodnje</th>
                                
                              </tr>
                            </thead>
                            <tbody>
                                <?php 

                                    $servername = "localhost:3306";
                                    $usernamedb = "root";
                                    $passwordb = "1234";
                                    $dbname = "registracija_vozila";

                                    $conn = new mysqli($servername, $usernamedb, $passwordb, $dbname);
                                    if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                    }

                                    $sql = "SELECT v.VoziloID, v.Marka, v.Model, v.Vrsta, v.GodinaProizvodnje, v.BrojSasije, v.tipMotora,  r.registracijskaOznaka
                                            FROM vozilo as v, registracija as r
                                            WHERE v.VoziloID = r.VoziloID AND r.VlasnikID = '$vlasnikID' AND v.voziloID = '$voziloID'";
                                    $result = $conn->query($sql);
                                                                    
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                          echo '
                                                <tr>   
                                                    <th scope="row">'.$row["registracijskaOznaka"].'</th>
                                                    <td>'.$row["Marka"].'</td>
                                                    <td>'.$row["Model"].'</td>
                                                    <td>'.$row["Vrsta"].'</td>
                                                    <td>'.$row["tipMotora"].'</td>
                                                    <td>'.$row["BrojSasije"].'</td>
                                                    <td>'.$row["GodinaProizvodnje"].'</td> 
                                                </tr>';
                                        }
                                      } else {
                                        echo "0 results";
                                      }

                                    $conn->close();
                                ?>
                            </tbody>
                          </table> 
                          <table class="table table-striped text-center">
                                    <thead class="table-dark">
                                      <tr>
                                        <th scope="col">Status</th>
                                        <th scope="col">Datum registracije</th>
                                        <th scope="col">Datum isteka registracije</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                <?php 

                                    $servername = "localhost:3306";
                                    $usernamedb = "root";
                                    $passwordb = "1234";
                                    $dbname = "registracija_vozila";
                                    
                                    $modalID = "4r";
                                    $conn = new mysqli($servername, $usernamedb, $passwordb, $dbname);
                                    if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                    }

                                    $sql = "SELECT datumRegistracije, datumIstekaRegistracije, statusRegistracije
                                            FROM registracija WHERE voziloID = '$voziloID'";
                                    $result = $conn->query($sql);
                                                                    
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                          echo '
                                                <tr>
                                                <th scope="row">'.$row["statusRegistracije"].'</th>
                                                <td>'.$row["datumRegistracije"].'</td>
                                                <td>'.$row["datumIstekaRegistracije"].'</td>
                                                </tr>';
                                        }
                                      } else {
                                        echo "0 results";
                                      }

                                    $conn->close();
                                ?>
                            </tbody>
                                  </table>
                          <br>

                          <table class="table table-striped text-center">
                            <thead class="table-dark">
                              <tr>
                                <th scope="col">Ime</th>
                                <th scope="col">Prezime</th>
                                <th scope="col">JMBG</th>
                                <th scope="col">Adresa</th>
                                <th scope="col">Grad</th>
                                <th scope="col">Kanton</th>
                                <th scope="col">Telefon</th>
                                
                              </tr>
                            </thead>
                            <tbody>
                                <?php 

                                    $servername = "localhost:3306";
                                    $usernamedb = "root";
                                    $passwordb = "1234";
                                    $dbname = "registracija_vozila";

                                    $conn = new mysqli($servername, $usernamedb, $passwordb, $dbname);
                                    if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                    }

                                    $sql = "SELECT ime, prezime, jmbg, adresa, grad, kanton, telefon
                                            FROM vlasnik
                                            WHERE VlasnikID = '$vlasnikID'";
                                    $result = $conn->query($sql);
                                                                    
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                          echo '
                                                <tr>   
                                                    <th scope="row">'.$row["ime"].'</th>
                                                    <th scope="row">'.$row["prezime"].'</th>
                                                    <td>'.$row["jmbg"].'</td>
                                                    <td>'.$row["adresa"].'</td>
                                                    <td>'.$row["grad"].'</td>
                                                    <td>'.$row["kanton"].'</td>
                                                    <td>'.$row["telefon"].'</td> 
                                                </tr>';
                                        }
                                      } else {
                                        echo "0 results";
                                      }
                                    session_unset();
                                    $conn->close();
                                ?>
                            </tbody>
                          </table> 
                          
                    </div>
                </div>
            </div>



            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    </body>
</html>