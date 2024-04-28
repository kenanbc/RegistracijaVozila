<?php 
            session_start();
            $voziloID = $_SESSION['voziloID'];
            $vlasnikID = $_SESSION['vlasnikID'];

            unset($_SESSION['voziloID']);
            unset($_SESSION['vlasnikID']);

            $servername = "localhost:3306";
            $usernamedb = "root";
            $passwordb = "1234";
            $dbname = "registracija_vozila";

            $conn = new mysqli($servername, $usernamedb, $passwordb, $dbname);
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }

            $sql = "DELETE FROM vozilo
                    WHERE voziloID = '$voziloID'";

            if ($conn->query($sql) === TRUE) {
              $sqlVlasnikBroj = "SELECT COUNT(*) as broj FROM registracija WHERE vlasnikID = '$vlasnikID'";
              $result = $conn->query($sqlVlasnikBroj);
              $row = $result->fetch_assoc();
              if ($row['broj'] <= 0) {
                  $sqlVlasnik ="DELETE FROM vlasnik WHERE vlasnikID = '$vlasnikID'";
                  if ($conn->query($sqlVlasnik) === TRUE) {
                  }
                  else {
                    $conn->close();
                    echo header("Location: greska.php");
                }
              }
            } 
            else {
                $conn->close();
                echo header("Location: greska.php");
            }
            $conn->close();
        
            $_SESSION['modal'] = 1;
            header("Location: ./odjavaVozila.php");
            
?>