<?php
function generisiTablicu() {
    $slova = ['A', 'E', 'J', 'K', 'M', 'O', 'T'];
    $brojevi = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];

   
   do{

    $prvoSlovo = $slova[array_rand($slova)];
    
    $dvaBroja = '';
    for ($i = 0; $i < 2; $i++) {
        $dvaBroja .= $brojevi[array_rand($brojevi)];
    }

    $treceSlovo = $slova[array_rand($slova)];

    $triBroja = '';
    for ($i = 0; $i < 3; $i++) {
        $triBroja .= $brojevi[array_rand($brojevi)];
    }

    $nasumicniText = $prvoSlovo . $dvaBroja . '-' . $treceSlovo . '-' . $triBroja;

    } while(provjeraTablice($nasumicniText));

    return $nasumicniText;
}

    function provjeraTablice($generisanaTablica){
        $servername = "localhost:3306";
        $usernamedb = "root";
        $passwordb = "1234";
        $dbname = "registracija_vozila";
    
        $conn = new mysqli($servername, $usernamedb, $passwordb, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    
        $sql = "SELECT registracijskaOznaka FROM registracija WHERE registracijskaOznaka = BINARY '$generisanaTablica'";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            $conn->close();
            return 1;
        } else {
            $conn->close();
            return 0;
        }
    }

?>