<?php

include "cnx.php";
$rqt = $cnx->prepare("select nomR, SUM(temps) as Total
from rayon
inner join travailler on rayon.numR = travailler.codeR
GROUP by nomR");
$rqt->execute();

$data = array();
foreach ( $rqt->fetchAll(PDO::FETCH_ASSOC) as $ligne)
{
    $data[] = $ligne;
}

echo json_encode($data);

?>  
