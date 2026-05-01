<?php
$conn = mysqli_connect("127.0.0.1", "root", "", "insea_site", 3307);

if (!$conn) {
    die("Erreur : " . mysqli_connect_error());
}

echo "Connexion OK ✅";
?>