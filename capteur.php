<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // Paramètres de connexion à la base de données
    $host = 'mysql-kacheo.alwaysdata.net'; // ou l'adresse de votre serveur de base de données
    $dbname = 'kacheo_lampe';
    $username = 'kacheo'; // remplacez par votre nom d'utilisateur
    $password = 'ISM_2024'; // remplacez par votre mot de passe

    try {
        // Connexion à la base de données
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        // Configuration de PDO pour afficher les erreurs SQL
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Requête SQL pour récupérer le dernier enregistrement
        $sql = "SELECT * FROM historisque ORDER BY action DESC LIMIT 1";
        $stmt = $pdo->query($sql);

        // Récupération du résultat
        $dernierEnregistrement = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($dernierEnregistrement) {
            // Affichage du dernier enregistrement dans une page HTML
            echo "<h1>Dernier Enregistrement</h1>";
            echo "<table border='1'>";
            echo "<tr>";
            foreach ($dernierEnregistrement as $key => $value) {
                echo "<th>$key</th>";
            }
            echo "</tr><tr>";
            foreach ($dernierEnregistrement as $value) {
                echo "<td>$value</td>";
            }
            echo "</tr>";
            echo "</table>";
        } else {
            echo "Aucun enregistrement trouvé.";
        }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
    ?>
</body>
</html>