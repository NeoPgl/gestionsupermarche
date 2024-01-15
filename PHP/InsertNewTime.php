<?php
include "cnx.php";

$rqt = $cnx->prepare("select * from travailler where codeE = ? and codeR = ? and date = ?");
        $rqt->bindValue(1,$_GET['idEmploye']);
        $rqt->bindValue(2,$_GET['idRayon']);
        $rqt->bindValue(3,$_GET['date']);
$rqt->execute();
$ligne = $rqt->fetchAll(PDO::FETCH_ASSOC);
if (count($ligne) === 0)
{
    $rqt = $cnx->prepare("insert into travailler values(?,?,?,?)");
    $rqt->bindValue(1,$_GET['idEmploye']);
    $rqt->bindValue(2,$_GET['idRayon']);
    $rqt->bindValue(3,$_GET['date']);
    $rqt->bindValue(4,$_GET['newTemps']);
    $rqt->execute();
    echo "Nouveau temps inséré !!!";
}
else
{
    echo "Cet employé à déjà travaillé dans ce rayon à cette date !!!";
}
