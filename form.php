<?php

session_start()

//Vérification du formulaire

if($_SESSION['REQUEST_METHOD'] === 'POST') {
    $name = isset($_POST['name']) ? trim($_POST['name']) : "";

    //vérifie que le champ n'est pas vide

    if ($name !== '') {
        //Stockage de la session

        $_SESSION[""]
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
</head>
<body>
<form action="form.php" method="post">
    <label for="name">Nom
        <input type="text" id="name" name="name" required>
    </label>
    <label for="prenom">Prénom
        <input type="text" id="prenom" name="prenom" required>
    </label>
    <label for="email">Email
        <input type="email" id="email" name="email" required>
    </label>
    <button type="submit">Envoyer</button>
</form>
</body>
</html>
