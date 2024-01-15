<?php

include "cnx.php";
$rqt = $cnx->prepare("select nomS, avg(travailler.temps) as moyenne
from secteur
inner join rayon on secteur.numS = rayon.numSecteur
inner join travailler on rayon.numR = travailler.codeR
group by nomS");
$rqt->execute();

$data = array();
foreach ( $rqt->fetchAll(PDO::FETCH_ASSOC) as $ligne)
{
    $data[] = $ligne;
}

echo json_encode($data);

?>
