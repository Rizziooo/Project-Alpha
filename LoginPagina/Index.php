<?php
require_once 'db_config.php';

$login_successful = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["login"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];

        // Voer hier de inloglogica uit (bijvoorbeeld controleren in de database)
        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = $conn->query($query);

        if ($result) {
            // Controleer of er overeenkomende gegevens zijn gevonden
            if ($result->num_rows > 0) {
                $login_successful = true;
            }
        } else {
            // Fout bij het uitvoeren van de query, toon een foutmelding
            echo "Fout bij het uitvoeren van de query: " . $conn->error;
        }

        // Als inloggen succesvol is, stuur de gebruiker naar de homepage
        if ($login_successful) {
            header("Location: homepage.html");
            exit();
        } else {
            // Inloggen mislukt, toon een foutmelding
            echo "Inloggen mislukt. Controleer je gebruikersnaam en wachtwoord.";
        }
    } elseif (isset($_POST["register"])) {
        // Registratie logica
        $reg_email = $_POST["reg_email"];
        $reg_username = $_POST["reg_username"];
        $reg_password = $_POST["reg_password"];

        // Voer hier de registratielogica uit (bijvoorbeeld gegevens in de database invoegen)
        // ...

        // Na registratie, stuur de gebruiker naar de homepage
        header("Location: homepage.html");
        exit();
    }
}

$conn->close();
?>