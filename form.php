<?php

session_start();

//Vérification du formulaire

if($_SERVER ['REQUEST_METHOD'] === 'POST') {
    $name = isset($_POST['name']) ? trim($_POST['name']) : "";
    $message = isset($_POST['message']) ? trim($_POST['message']) : "";
    $message = $message . "
    ";
    $email = isset($_POST['email']) ? trim($_POST['email']) : "";

    //vérifie que le champ n'est pas vide

    if ($name !== '' || $message !== '' || $email !== '') {
        //Stockage de la session

        $_SESSION['message-nom'] = "Votre nom est " . $name;
        $_SESSION['message-email'] = "Votre email est " . $email;
        $_SESSION['message'] = "Votre message est " . $message;

// Déclaration du nom du fichier dans lequel le message sera sauvegardé
        $fichier = "message.txt";

        // Ouverture du fichier en mode 'a+' (ajout à la fin du fichier, ou création si non existant)
        $fichierOpen = (fopen("$fichier", "a+"));

        // Écriture du message dans le fichier ouvert
        fwrite($fichierOpen, $message);

        // Fermeture du fichier
        fclose($fichierOpen);

// Stockage des informations nom, email, message dans la session pour les récupérer plus tard
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['message'] = $message;
        //redirection vers la meme page

        header('Location: form.php');
        exit();
    } else {

        //Message d'erreur
        $_SESSION['message-nom'] = "Veuillez indiquer votre nom! ";
        $_SESSION['message-email'] = "Votre email est " . $email;
        $_SESSION['message'] = "Votre message est " . $message;
    }

}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulaire PHP</title>
<!-- Le CSS est generer par ia, j'ai juste voulu le rendre un peu agréable à regarder -->
    <style>


        body{
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
    margin: 0;
    padding: 20px;
    }

    h1 {
    text-align: center;
    color: #333;
    }

    form {
    background-color: #fff;
    border-radius: 8px;
    padding: 20px;
    max-width: 400px;
    margin: 0 auto;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    label {
    display: block;
    margin: 10px 0 5px;
    font-weight: bold;
    }

    input[type="text"],
    input[type="email"] {
    width: 100%;
    padding: 10px;
    margin: 5px 0 15px;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-sizing: border-box;
    }

    button {
    width: 100%;
    padding: 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    }

    button:hover {
    background-color: #45a049;
    }

    p {
    text-align: center;
    padding: 10px;
    margin: 10px 0;
    background-color: #ffcccc;
    border: 1px solid #ff0000;
    color: #990000;
    border-radius: 4px;
    }

    .success {
    background-color: #dff0d8;
    border-color: #d0e9c6;
    color: #3c763d;
    }
    </style>
</head>
<body>
<?php
//Affichage du message stocker en session

if(isset($_SESSION['message-nom'])) {
    echo "<p class='success'>" . htmlspecialchars($_SESSION['message-nom']) . "</p>";
    unset($_SESSION['message-nom']);
}
if(isset($_SESSION['message-email'])) {
    echo "<p class='success'>" . htmlspecialchars($_SESSION['message-email']) . "</p>";
    unset($_SESSION['message-email']);
}
if(isset($_SESSION['message'])) {
    echo "<p class='success'>" . htmlspecialchars($_SESSION['message']) . "</p>";
    unset($_SESSION['message']);
}

?>

<form action="form.php" method="post">
    <label for="name">Nom
        <input type="text" id="name" name="name" required>
    </label>
    <label for="message">message
        <input type="text" id="prenom" name="message" required>
    </label>
    <label for="email">Email
        <input type="email" id="email" name="email" required>
    </label>
    <button type="submit">Envoyer</button>
</form>
</body>
</html>