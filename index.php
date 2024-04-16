<html>
    <head>
        <meta charset="UTF-8">
        <title>Registracija vozila BiH</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="styles.css">
      </head>
    <body>
    <?php

        if(isset($_COOKIE["user"])){
        ?>
        <header class="p-3 mb-3 border-bottom">
            <div class="container">
              <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <div ><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/Coat_of_arms_of_Bosnia_and_Herzegovina.svg/1200px-Coat_of_arms_of_Bosnia_and_Herzegovina.svg.png" alt="grb BiH" style="width: 35px; height: 40px; margin-right: 20px; opacity: 0.8;"></div>
                
                <div class="col-xl-4 col-sm-2 col-md-3 col-lg-3 col-xxl-5 text-body-secondary">
                    <small>MINISTARSTVO UNUTRAŠNJIH POSLOVA BOSNE I HERCEGOVINE</small>
                </div>
                
                <div class="col-xl-6 col-sm-2 col-md-4 col-lg-5 col-xxl-6 dropdown text-end" style="margin-left: 53px;">

                  <button class="btn btn-signout btn-outline-primary" onclick="signout()">Odjavi se</button>
                </div>
              </div>
            </div>
          </header>
        <div class="container vh-100 d-flex justify-content-center align-items-center">
            <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
                <div class="col">
                  <div class="card mb-4 rounded-3 shadow-sm">
                    <div class="card-header py-3">
                      <h4 class="my-0 fw-normal">Registracija vozila</h4>
                    </div>
                    <div class="card-body">
                        <svg width="250" height="149" viewBox="0 0 552 149" fill="none" xmlns="http://www.w3.org/2000/svg" class="mt-4">
                            <rect x="4" y="4" width="544" height="141" fill="white" stroke="#212529" stroke-width="7"/>
                            <rect x="2" y="5" width="64" height="140" fill="#212529"/>
                            <path d="M116.364 42.1818L129.114 64.2386H129.659L142.545 42.1818H161.432L140.364 77.0909L162.114 112H142.75L129.659 89.7045H129.114L116.023 112H96.7955L118.443 77.0909L97.3409 42.1818H116.364ZM166.682 42.1818H185.534L200.295 71.3977H200.909L215.67 42.1818H234.523L208.989 88.6818V112H192.216V88.6818L166.682 42.1818ZM241.358 112V102.386L275.278 55.8864H241.392V42.1818H296.619V51.7955L262.699 98.2955H296.585V112H241.358ZM339.702 70.6818V83.5H307.384V70.6818H339.702ZM383.619 42.1818V112H366.778V57.9318H366.369L350.756 67.4773V52.8864L367.972 42.1818H383.619ZM399.054 112V99.8636L424.52 77.5682C426.429 75.8409 428.054 74.2614 429.395 72.8295C430.736 71.375 431.759 69.9205 432.463 68.4659C433.168 66.9886 433.52 65.3864 433.52 63.6591C433.52 61.7273 433.099 60.0795 432.259 58.7159C431.418 57.3295 430.259 56.2614 428.781 55.5114C427.304 54.7614 425.611 54.3864 423.702 54.3864C421.77 54.3864 420.077 54.7841 418.622 55.5795C417.168 56.3523 416.031 57.4773 415.213 58.9545C414.418 60.4318 414.02 62.2273 414.02 64.3409H398.031C398.031 59.5909 399.099 55.4886 401.236 52.0341C403.372 48.5795 406.372 45.9205 410.236 44.0568C414.122 42.1705 418.634 41.2273 423.77 41.2273C429.065 41.2273 433.668 42.1136 437.577 43.8864C441.486 45.6591 444.509 48.1364 446.645 51.3182C448.804 54.4773 449.884 58.1477 449.884 62.3295C449.884 64.9886 449.349 67.625 448.281 70.2386C447.213 72.8523 445.293 75.7386 442.52 78.8977C439.77 82.0568 435.861 85.8409 430.793 90.25L422.44 97.9545V98.3977H450.736V112H399.054ZM486.83 112.955C481.511 112.955 476.795 112.045 472.682 110.227C468.591 108.386 465.364 105.852 463 102.625C460.636 99.3977 459.432 95.6818 459.386 91.4773H476.364C476.432 93 476.92 94.3523 477.83 95.5341C478.739 96.6932 479.977 97.6023 481.545 98.2614C483.114 98.9205 484.898 99.25 486.898 99.25C488.898 99.25 490.659 98.8977 492.182 98.1932C493.727 97.4659 494.932 96.4773 495.795 95.2273C496.659 93.9545 497.08 92.5 497.057 90.8636C497.08 89.2273 496.614 87.7727 495.659 86.5C494.705 85.2273 493.352 84.2386 491.602 83.5341C489.875 82.8295 487.83 82.4773 485.466 82.4773H478.682V70.4773H485.466C487.534 70.4773 489.352 70.1364 490.92 69.4545C492.511 68.7727 493.75 67.8182 494.636 66.5909C495.523 65.3409 495.955 63.9091 495.932 62.2955C495.955 60.7273 495.58 59.3523 494.807 58.1705C494.057 56.9659 493 56.0341 491.636 55.375C490.295 54.7159 488.739 54.3864 486.966 54.3864C485.102 54.3864 483.409 54.7159 481.886 55.375C480.386 56.0341 479.193 56.9659 478.307 58.1705C477.42 59.375 476.955 60.7727 476.909 62.3636H460.784C460.83 58.2045 461.989 54.5455 464.261 51.3864C466.534 48.2045 469.625 45.7159 473.534 43.9205C477.466 42.125 481.943 41.2273 486.966 41.2273C491.966 41.2273 496.364 42.1023 500.159 43.8523C503.955 45.6023 506.909 47.9886 509.023 51.0114C511.136 54.0114 512.193 57.4091 512.193 61.2045C512.216 65.1364 510.932 68.375 508.341 70.9205C505.773 73.4659 502.466 75.0341 498.42 75.625V76.1705C503.83 76.8068 507.909 78.5568 510.659 81.4205C513.432 84.2841 514.807 87.8636 514.784 92.1591C514.784 96.2045 513.591 99.7955 511.205 102.932C508.841 106.045 505.545 108.5 501.318 110.295C497.114 112.068 492.284 112.955 486.83 112.955Z" fill="#212529"/>
                            </svg>     
                      <button type="button" class="w-100 btn btn-lg btn-primary" style="margin-top: 17px;" onclick="location.href='registracijaIzbor.php'">Registracija vozila</button>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card mb-4 rounded-3 shadow-sm">
                    <div class="card-header py-3">
                      <h4 class="my-0 fw-normal">Pregled registrovanih vozila</h4>
                    </div>
                    <div class="card-body">
                        <svg xmlns="http://www.w3.org/2000/svg" width="190" height="190" fill="currentColor" class="bi bi-car-front-fill" viewBox="0 0 16 16">
                            <path d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679q.05.242.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.8.8 0 0 0 .381-.404l.792-1.848ZM3 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2m10 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2M6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2zM2.906 5.189a.51.51 0 0 0 .497.731c.91-.073 3.35-.17 4.597-.17s3.688.097 4.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 11.691 3H4.309a.5.5 0 0 0-.447.276L2.906 5.19Z"/>
                          </svg>
                      <button type="button" class="w-100 btn btn-lg btn-primary" onclick="location.href='pregledVozila.php'">Pregled vozila</button>
                    </div>
                  </div>
                </div>
                <div class="col">
                    <div class="card mb-4 rounded-3 shadow-sm">
                      <div class="card-header py-3">
                        <h4 class="my-0 fw-normal">Pregled vlasnika vozila</h4>
                      </div>
                      <div class="card-body">
                        <svg xmlns="http://www.w3.org/2000/svg" width="190" height="190" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                          </svg>
                        <button type="button" class="w-100 btn btn-lg btn-primary" onclick="location.href='pregledVlasnika.php'">Pregled vlasnika vozila</button>
                      </div>
                    </div>
                  </div>
              </div>
        </div>
        <?php 
        } 
        else echo 
        '<div class="container vh-100 d-flex justify-content-center align-items-center">
            <h4>Niste prijavljeni! <a href = "prijava.php" style = "text-decoration: none;">Prijavi se</a></h4>
        </div>';
        ?>

        <script>
          function signout() {
        console.log("Funcija je pozvana");
        document.cookie = "user=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        window.location.href = "./prijava.php";
    }
        </script>
    </body>
</html>