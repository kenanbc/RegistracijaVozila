<?php
session_start();

if(isset($_SESSION['vlasnikID'])){
    $modalniID = $_SESSION['vlasnikID'];
} else {
    $modalniID = 1;
}

?>


<html>
    <head>
        <meta charset="UTF-8">
        <title>Registracija vozila BiH</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="styles.css">

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container d-flex justify-content-center align-items-center">
            <div class="col">
                <div class="card my-4 rounded-3 shadow-sm vh-90">
                  <div class="card-header py-3 text-center d-flex justify-content-between align-items-center">
                    <button class="btn" onclick="location.href='index.html'">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
                        </svg>
                    </button>
                    <h4 class="my-0 mx-auto">Pregled vlasnika vozila</h4>
                  </div>
                
                    <div class="card-body"> 

                      <div class="input-group rounded mb-4 col-6" style="width: auto;">
                      <input type="search" class="form-control rounded" id="searchInput" placeholder="Pretraga po matičnom broju" />
                        <span class="input-group-text border-0" id="search-addon">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                          </svg>
                        </span>
                      </div>

                      <table class="table table-striped text-center">
                            <thead class="table-dark">
                              <tr>
                                <th scope="col">Proširi</th>
                                <th scope="col">Prezme</th>
                                <th scope="col">Ime</th>
                                <th scope="col">JMBG</th>
                                <th scope="col">Adresa</th>
                                <th scope="col">Grad</th>
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

                                    $sql = "SELECT VlasnikID, ime, prezime, jmbg, adresa, grad, telefon
                                            FROM vlasnik";
                                    $result = $conn->query($sql);
                                                                    
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                          echo '
                                                <tr>
                                                <th scope="row">
                                                <form action="obradaVlasnika.php" method="post">
                                                    <input type="hidden" name="vlasnikID" value="'.$row["VlasnikID"].'">
                                                    <button class="btn" type="submit">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </th>
                                            
                                            <th>'.$row["prezime"].'</th>
                                            <th>'.$row["ime"].'</th>
                                            <td>'.$row["jmbg"].'</td>
                                            <td>'.$row["adresa"].'</td>
                                            <td>'.$row["grad"].'</td>
                                            <td>'.$row["telefon"].'</td> </tr>';
                                        }
                                      } else {
                                        echo "0";
                                    }

                                    $conn->close();
                                ?>
                            </tbody>
                          </table>
                          <div id="noResultsMessage" style="display: none;"><p>Nema rezultata</p></div>
           

                          <div class="modal fade modal-vertical-centered" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                              <div class="modal-content">
                                <div class="modal-header text-center d-block">
                                  <h5 class="modal-title" id="exampleModalLabel">Pregled informacija</h5>
                                </div>
                                <div class="modal-body">
                                <table class="table table-striped text-center mb-5">
                            <thead class="table-dark">
                              <tr>
                                <th scope="col">Prezme</th>
                                <th scope="col">Ime</th>
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

                                      if(isset($_SESSION['vlasnikID'])) {
                                        $modalniID = $_SESSION['vlasnikID'];
                                      }

                                    $sql = "SELECT DISTINCT v.VlasnikID, v.ime, v.prezime, v.jmbg, v.adresa, v.grad, v.kanton, v.telefon
                                            FROM vlasnik as v, registracija as r
                                            where v.VlasnikID = r.VlasnikID AND r.VlasnikID =  '$modalniID'";
                                    
                                    
                                    $result = $conn->query($sql);
                                                                    
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                          echo '
                                                <tr>
                                                <th scope="row">'.$row["prezime"].'</th>
                                                <th scope="row">'.$row["ime"].'</th>
                                                <td>'.$row["jmbg"].'</td>
                                                <td>'.$row["adresa"].'</td>
                                                <td>'.$row["grad"].'</td>
                                                <td>'.$row["kanton"].'</td>
                                                <td>'.$row["telefon"].'</td> </tr>';
                                        }
                                      } else {
                                        echo "0 results";
                                      }

                                    $conn->close();
                                ?>
                            </tbody>
                          </table>
                          
                          <table class="table table-striped text-center mb-5">
                                    <thead class="table-dark">
                                      <tr>
                                        <th scope="col">Registarska oznaka</th>
                                        <th scope="col">Marka</th>
                                        <th scope="col">Model</th>
                                        <th scope="col">Godina proizvodnje</th>
                                        <th scope="col">Tip</th>
                                        <th scope="col">Broj šasije</th>
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

                                    $sql = "SELECT v.VoziloID, v.Marka, v.Model, v.karoserija, v.GodinaProizvodnje, v.BrojSasije, r.registracijskaOznaka
                                            FROM vozilo as v, registracija as r
                                            WHERE v.VoziloID = r.VoziloID AND r.vlasnikID = $modalniID";
                                    $result = $conn->query($sql);
                                                                    
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                          echo '
                                                <tr>
                                                <th scope="row">'.$row["registracijskaOznaka"].'</th>
                                                <td>'.$row["Marka"].'</td>
                                                <td>'.$row["Model"].'</td>
                                                <td>'.$row["GodinaProizvodnje"].'</td>    
                                                <td>'.$row["karoserija"].'</td>
                                                <td>'.$row["BrojSasije"].'</td> </tr>';
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
                                  
                                    $conn = new mysqli($servername, $usernamedb, $passwordb, $dbname);
                                    if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                    }

                                    $sql = "SELECT datumRegistracije, datumIstekaRegistracije, statusRegistracije
                                            FROM registracija WHERE vlasnikID = $modalniID";
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

                                 
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="deleteSession()">Zatvori</button>
                                </div>
                              </div>
                            </div>
                          </div>
                    </div>
                </div>
            </div>

            

            <script>
              $(document).ready(function() {
                    console.log("jQuery is working!");
                });


                document.querySelector('.form-control').addEventListener('input', function() {
                var searchText = this.value.toLowerCase();
                document.querySelectorAll('tbody tr').forEach(function(row) {
                    var tablica = row.querySelector('td:nth-child(4)');
                    if (tablica) {
                        var tablicaText = tablica.textContent.toLowerCase();
                        if (tablicaText.startsWith(searchText)) {
                            row.style.display = '';
                        } else {
                            row.style.display = 'none';
                        }
                    }
                });
            });



          document.addEventListener("DOMContentLoaded", function() {
        var tableRows = document.querySelectorAll('.table tbody tr');
        var noResultsMessage = document.getElementById('noResultsMessage');

        if (tableRows.length === 0) {
            // Skrivamo tabelu
            document.querySelector('.table').style.display = 'none';
            // Prikažemo poruku "Nema rezultata"
            noResultsMessage.style.display = 'block';
        } else {
            // Sakrijemo poruku "Nema rezultata"
            noResultsMessage.style.display = 'none';
        }
    });

    $(document).ready(function() {
            <?php if(isset($_SESSION['modalSent']) && $_SESSION['modalSent']) { ?>
                $('#exampleModal').modal('show');
                
            <?php 
                unset($_SESSION['modalSent']);
            } ?>
 
            function openModal() {
                $('#exampleModal').modal('show');
                
            }

            <?php if(isset($_SESSION['vlasnikID'])) { ?>
                openModal();
            <?php } ?>
        });

        function deleteSession(){
          <?php 
            session_unset();
            ?>
        }

        // window.onbeforeunload.deleteSession();
        
            </script>
    </body>
</html>