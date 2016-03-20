<?php
$con = mysqli_connect("localhost","root","","gestion");
if(mysqli_connect_errno())
{
    echo "Erreur: Ne peut etablir la connexion a la Base de Donnee";
    exit();
}
?>