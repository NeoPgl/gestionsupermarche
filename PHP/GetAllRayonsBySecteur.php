<?php

include "cnx.php";
$rqt = $cnx->prepare("select numR,nomR from rayon where numSecteur = ?");
$rqt->bindValue(1,$_GET['idSecteur']);
$rqt->execute();
echo "<select class='col-md-12 form-control text-center' id='lstRayons' onchange='GetAllEmployesWorkInRayon()'>";
$i = 0;
foreach ( $rqt->fetchAll(PDO::FETCH_ASSOC) as $ligne)
{
    if($i===0)
    {
        echo "<option value='".$ligne['numR']."' selected>".$ligne['nomR']."</option>";
    }
    else
    {
        echo "<option value='".$ligne['numR']."'>".$ligne['nomR']."</option>";
    }
    $i++;
}
echo "</select>";
