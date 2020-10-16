<?php
   //includen van files voor functies
   include 'database.php';

    // $pdo = new Database('localhost', 'root', '', 'project1', 'utf8');
      
    
    // if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //     $voornaam = $_POST['voornaam'];
    //     $tussenvoegsel = $_POST['tussenvoegsel'];
    //     $achternaam = $_POST['achternaam'];
    //     $usernme = $_POST['gebruikersnaam'];
    //     $email = $_POST['email'];
    //     $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
    //     $pdo->insert($voornaam, $tussenvoegsel, $achternaam, $usernme, $email, $hash);  
    // }
    // else{
    //     echo "error ";
    // }

    $fieldNames = [
        "voornaam",
        "achternaam", 
        "email", 
        "gebruikersnaam", 
        "password"
    ];

    $error = false;

    foreach ($fieldNames as $fields) {
        if (empty(isset($fields))) {
            $error = true;
        }
    }

    if (!$error){
        $_SERVER["REQUEST_METHOD"] == "POST";
            if($_POST['password'] == $_POST['repassword']){
                $voornaam = $_POST['voornaam'];
                $tussenvoegsel = $_POST['tussenvoegsel'];
                $achternaam = $_POST['achternaam'];
                $usernme = $_POST['gebruikersnaam'];
                $email = $_POST['email'];
                $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
                
                $pdo = new Database('localhost', 'root', '', 'project1', 'utf8');
                $pdo->insert($voornaam, $tussenvoegsel, $achternaam, $usernme, $email, $hash);

                
        }
        else{
            echo "username or password does not match";
                }
    }

?>


<html>
    <body>
        <form action="signup.php" method="POST">

                    Voornaam: <input type="text" name="voornaam" required><br>
                    Tussenvoegsel: <input type="text" name="tussenvoegsel" ><br>
                    Achternaam: <input type="text" name="achternaam" required><br>
                    E-mail: <input type="text" name="email" required><br>
                    Gebruikersnaam: <input type="text" name="gebruikersnaam" required><br>
                    Wachtwoord: <input type="password" name="password" required><br>
                    Herhaal wachtwoord: <input type="password" name="repassword" required><br>

                <input value="Create" type="submit">
                <br>
                <input value="Login" type="submit">
        </form>
    </body>
</html>