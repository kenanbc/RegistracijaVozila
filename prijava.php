
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registracija vozila BiH</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <?php
            if(!isset($_COOKIE["user"])){
        ?>
        <div class="container-fluid d-flex justify-content-center align-items-center vh-100">
            <div class="container col-xl-10 col-xxl-10 px-4 py-5">
                <div class="row align-items-center g-lg-5 py-5">
                    <div class="col-md-10 mx-auto col-lg-5">
                        <form class="p-4 p-md-5 border rounded-3 bg-body-tertiary" method="post" action="./prijava.php">
                            <div class="row">
                                <div class="col-2"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d4/Coat_of_arms_of_Bosnia_and_Herzegovina.svg/1200px-Coat_of_arms_of_Bosnia_and_Herzegovina.svg.png" alt="grb BiH" style="width: 45px; height: 50px;"></div>
                            <div class="col-10 text-center text-body-secondary">
                                <small>MINISTARSTVO UNUTRAŠNJIH POSLOVA<br>BOSNE I HERCEGOVINE</small>
                            </div>
                        </div>
                            <hr class="my-4">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="username" name="username" required maxlength="50">
                                <label for="floatingInput">Korisničko ime</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="password" name="password" required maxlength="50">
                                <label for="floatingPassword">Lozinka</label>
                            </div>
                            <button class="w-100 btn btn-lg btn-primary" type="submit">Prijava</button>
                            <hr class="my-4">
                            <?php
                                if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['username']) && !empty($_POST['password'])) {
                                    $servername = "localhost:3306";
                                    $usernamedb = "root";
                                    $passwordb = "1234";
                                    $dbname = "registracija_vozila";
                                    
                                    $conn = new mysqli($servername, $usernamedb, $passwordb, $dbname);
                                    
                                    if ($conn->connect_error) {
                                        die("Connection failed: " . $conn->connect_error);
                                    }
                                    
                                    $username = $_POST['username'];
                                    $password = $_POST['password'];
                                    
                                    $sql = "SELECT korisnickoIme, lozinka FROM podacizaprijavu WHERE korisnickoIme = BINARY '$username' AND lozinka = BINARY '$password'";
                                    $result = $conn->query($sql);
                                    
                                    if ($result->num_rows > 0) {
                                        $sqlUredID = "SELECT uredID FROM uposlenik WHERE korisnicko_ime = BINARY '$username'";
                                        $result = $conn->query($sqlUredID);
                                        while($row = $result->fetch_assoc()){
                                            $cookie_value = $row['uredID'];
                                        }
                                        $cookie_name = "user";
                                        setcookie($cookie_name, $cookie_value, time() + (86400), "/");
                                        header("Location: index.php");
                                        exit();
                                    } else {
                                        echo "<p class='d-inline-block' style='color:red; margin-left: 15%;' >Pogrešno korisničko ime ili lozinka!</p>";
                                    }
                                    $conn->close();
                                }
                                ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php } 
        else echo 
        '<div class="container vh-100 d-flex justify-content-center align-items-center">
            <h4>Već ste prijavljeni na sistem! <a href = "./index.php" style = "text-decoration: none;">Nastavi</a></h4>
        </div>';?>
    </body>
</html>