<?php

 include 'cnx.php';
$rqt = $cnx->prepare("select numS, nomS from secteur");
$rqt->execute();
echo "<select class='col-md-12 form-control text-center' id='lstSecteurs' onchange='GetAllRayonsBySecteur()'>";
$i = 0;
foreach ( $rqt->fetchAll(PDO::FETCH_ASSOC) as $ligne)
{
    if($i==0)
    {
        echo "<option value='".$ligne['numS']."' selected>".$ligne['nomS']."</option>";
    }
    else
    {
        echo "<option value='".$ligne['numS']."'>".$ligne['nomS']."</option>";
    }
    $i++;
}
echo "</select>";