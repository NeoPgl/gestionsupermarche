<?php

include "cnx.php";
$rqt = $cnx->prepare("select prenomE, date, temps from employe, travailler, rayon where numE = codeE "
        . "and codeR = numR and codeR = ?");
$rqt->bindValue(1,$_GET['idRayon']);
$rqt->execute();
echo "<table class='table table-hover'>";
foreach ( $rqt->fetchAll(PDO::FETCH_ASSOC) as $ligne)
{
    echo "<tr>";
    echo "<td>".$ligne['prenomE']."</td>";
    echo "<td>".$ligne['date']."</td>";
    echo "<td>".$ligne['temps']."</td>";
    echo "</tr>";
}
echo "</table>";

