<?php

include "cnx.php";
$rqt = $cnx->prepare("select sum(temps) as total from employe, travailler, rayon where numE = codeE "
        . "and codeR = numR and codeR = ?");
$rqt->bindValue(1,$_GET['idRayon']);
$rqt->execute();
$total = $rqt->fetchAll(PDO::FETCH_ASSOC);
echo "<p>".$total[0]['total']."</p>";