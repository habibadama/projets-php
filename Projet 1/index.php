<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "gestion_stock_produits";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Erreur de connexion à la base de données : " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST["id"];
        $nomProduit = $_POST["nomProduit"];
        $prixProduit = $_POST["prixProduit"];
        $quantiteProduit = $_POST["quantiteProduit"];

        $sql = "INSERT INTO produits (id, nomProduit, prixProduit, quantiteProduit) VALUES ($id, '$nomProduit', $prixProduit, $quantiteProduit)";

        if ($conn->query($sql) === TRUE) {
            echo "Produit enregistré avec succès.";
        } else {
            echo "Erreur : " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application de gestion de stock de produit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="container">
<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <h2 class="text-center my-4">Gestion de produits dans un magasin</h2>
        <div class="mb-3">
            <label class="form-label" for="id">Identifiant</label>
            <input type="number" class="form-control" name="id" id="id">
        </div>
        <div class="mb-3">
            <label class="form-label" for="nomProduit">Nom Produit</label>
            <input type="text" class="form-control" name="nomProduit" id="nomProduit">
        </div>
        <div class="mb-3">
            <label class="form-label" for="prixProduit">Prix unitaire</label>
            <input type="number" class="form-control" name="prixProduit" id="prixProduit">
        </div>
        <div class="mb-3">
            <label class="form-label" for="quantiteProduit">Quantités</label>
            <input type="number" class="form-control" name="quantiteProduit" id="quantiteProduit">
        </div>
        <input type="submit" class="btn btn-primary" value="Ajouter">
        <ul class="mt-4">
            <li><a href="index2.php">Enregistrer dans la base de données les produits pris dans le stock</a></li>
            <li><a href="index3.php">Vérifier la quantité des produits disponibles en stock.</a></li>
        </ul>
    </form>
</body>

</html>