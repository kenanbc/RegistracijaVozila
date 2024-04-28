<html>
    <head>
        <meta charset="UTF-8">
        <title>Registracija vozila BiH</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="styles.css">

        <style>
          .disabled-input {
              pointer-events: none;
              background-color: #f4f4f4;
          }
      </style>

        <script>
          function provjeriSelekciju() {
              var selekcija = document.getElementById("vrsta").value;
              var inputPolja = document.querySelectorAll('.form-control');

              for (var i = 0; i < inputPolja.length; i++) {
                  if (selekcija === "Priključno vozilo") {
                      if (inputPolja[i].id === "brojMotora" || inputPolja[i].id === "kubikaza" || inputPolja[i].id === "snagaMotora" || inputPolja[i].id === "tipMotora") {
                          inputPolja[i].readOnly = true;
                          inputPolja[i].classList.add("disabled-input");
                      } else {
                          inputPolja[i].readOnly = false;
                          inputPolja[i].classList.remove("disabled-input");
                      }
                  } else {
                      inputPolja[i].readOnly = false;
                      inputPolja[i].classList.remove("disabled-input");
                  }
              }

              if (selekcija === "Priključno vozilo") {
                    document.getElementById("tipMotora").disabled = true;
                } else {
                    document.getElementById("tipMotora").disabled = false;
                }
          }
        </script>

      </head>
    <body>
      <?php

        if(isset($_COOKIE["user"])){
        ?>
        <div class="container d-flex justify-content-center align-items-center">
            <div class="col">
                <div class="card my-4 rounded-3 shadow-sm">
                  <div class="card-header py-3 text-center d-flex justify-content-between align-items-center">
                      <button class="btn p-0" onclick="location.href='registracijaIzbor.php'">
                          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                              <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
                          </svg>
                      </button>
                      <h4 class="my-0 mx-auto">Registracija vozila</h4>
                  </div>
                    <div class="card-body">    
                        <div class="row">
                            <div class="col-md-7 col-lg-12">
                              <h4 class="mb-3 fw-normal">Podaci o vozilu</h4>
                              <form action="./tablica.php" method="POST">
                                <div class="row g-3">
                                  <div class="col-sm-6">
                                    <label for="marka" class="form-label">Marka</label>
                                    <input type="text" class="form-control" id="marka" name="marka" value="" required maxlength="50">
                                  </div>
                      
                                  <div class="col-sm-6">
                                    <label for="model" class="form-label">Model / Tip</label>
                                    <input type="text" class="form-control" id="model" name="model" value="" required="" maxlength="50">
                                  </div>

                                  <div class="col-12">
                                    <label for="brojSasije" class="form-label">Broj šasije</label>
                                    <div class="input-group has-validation">
                                      <input type="text" class="form-control" id="brojSasije" name="brojSasije" required="" maxlength="17">
                                    </div>
                                  </div>

                                  <div class="col-md-6">
                                    <label for="vrsta" class="form-label">Vrsta</label>
                                    <select class="form-select" id="vrsta" name="vrsta" onchange="provjeriSelekciju()" required="">
                                        <option value="">Odaberi...</option>
                                        <option>Putničko vozilo</option>
                                        <option>Teretno vozilo</option>
                                        <option>Autobus</option>
                                        <option>Motocikl</option>
                                        <option>Priključno vozilo</option>
                                        <option>Traktor</option>
                                    </select>
                                </div>

                                  <div class="col-sm-6">
                                    <label for="boja" class="form-label">Karoserija</label>
                                    <input type="text" class="form-control" id="karoserija" name="karoserija" value="" required="" maxlength="50">
                                  </div>

                                  <div class="col-sm-6">
                                    <label for="tip" class="form-label">Broj motora</label>
                                    <input type="text" class="form-control" id="brojMotora" name="brojMotora" value="" required="" maxlength="10">
                                  </div>


                                  <div class="col-sm-6">
                                    <label for="kubikaza" class="form-label">Radna zapremina motora u ccm</label>
                                    <input type="text" class="form-control" id="kubikaza" name="kubikaza" value="" maxlength="4" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
                                  </div>


                                  <div class="col-sm-6">
                                    <label for="snagaMotora" class="form-label">Snaga motora u kW</label>
                                    <input type="text" class="form-control" id="snagaMotora"  name="snagaMotora" value="" required="" maxlength="4" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
                                  </div>
                                                      
                                  <div class="col-md-6">
                                    <label for="tipMotora" class="form-label">Tip motora</label>
                                    <select class="form-select" id="tipMotora" name="tipMotora" required="">
                                      <option value="">Odaberi...</option>
                                      <option>Dizel</option>
                                      <option>Benzin</option>
                                      <option>Električni</option>
                                      <option>Hibrid</option>
                                    </select>
                                  </div>

                                  <div class="col-sm-6">
                                    <label for="godinaProizvodnje" class="form-label">Godina proizvodnje</label>
                                    <input type="text" class="form-control" id="godinaProizvodnje" name="godinaProizvodnje" value="" required="" maxlength="4" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
                                  </div>

                                  <div class="col-sm-6">
                                    <label for="boja" class="form-label">Boja</label>
                                    <input type="text" class="form-control" id="boja" name="boja"  value="" required="" maxlength="30">
                                  </div>

                                <hr class="mt-4">

                                <h4 class="mb-3 fw-normal">Podaci o vlasniku</h4>
                                <div class="col-sm-6">
                                    <label for="ime" class="form-label">Ime</label>
                                    <input type="text" class="form-control" id="ime" name="ime"  value="" required="" maxlength="20">
                                  </div>
                      
                                  <div class="col-sm-6">
                                    <label for="prezime" class="form-label">Prezime</label>
                                    <input type="text" class="form-control" id="prezime" name="prezime"  value="" required="" maxlength="30">
                                  </div>
                                  
                                  <div class="col-12">
                                    <label for="jmbg" class="form-label">Jedinstveni matični broj građanina (JMBG)</label>
                                    <div class="input-group has-validation">
                                      <input type="text" class="form-control" id="jmbg" name="jmbg" required="" maxlength="13" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
                                    </div>
                                  </div>
                                  
                                  <div class="col-sm-6">
                                    <label for="adresa" class="form-label">Adresa</label>
                                    <input type="text" class="form-control" id="adresa" name="adresa"  value="" required="" maxlength="100">
                                  </div>
                      
                                  <div class="col-sm-6">
                                    <label for="grad" class="form-label">Grad</label>
                                    <input type="text" class="form-control" id="grad" name="grad" value="" required="" maxlength="30">
                                  </div>
                                  
                                  <div class="col-md-6">
                                    <label for="kanton" class="form-label">Kanton</label>
                                    <select class="form-select" id="kanton" name="kanton" name="kanton" required="">
                                      <option value="">Odaberi...</option>
                                      <option>Unsko-sanski</option>
                                      <option>Posavski</option>
                                      <option>Tuzlanski</option>
                                      <option>Zeničko-dobojski</option>
                                      <option>Bosansko-podrinjski</option>
                                      <option>Srednjobosanski</option>
                                      <option>Hercegovačko-neretvanski</option>
                                      <option>Zapadno-hercegovački</option>
                                      <option>Kanton Sarajevo</option>
                                      <option>Kanton 10</option>
                                    </select>
                                  </div>

                                  <div class="col-sm-6">
                                    <label for="telefon" class="form-label">Telefon</label>
                                    <input type="text" class="form-control" id="telefon" name="telefon" value="" required="" maxlength="30" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
                                  </div>
                                  
                                    <center>
                                        <button class="btn btn-primary btn-lg"  style="width: 80%; margin-top: 3%;" type="submit">
                                            Unesi podatke
                                        </button>
                                    </center>
                              </form>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
            <?php } 
        else echo 
        '<div class="container vh-100 d-flex justify-content-center align-items-center">
            <h4>Niste prijavljeni! <a href = "prijava.php" style = "text-decoration: none;">Prijavi se</a></h4>
        </div>';?>
    </body>
</html>