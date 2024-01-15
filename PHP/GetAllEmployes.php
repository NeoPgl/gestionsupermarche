<?php

include "cnx.php";
$rqt = $cnx->prepare("select numE, prenomE from employe");
$rqt->execute();
echo "<table class='table table-hover'>";
echo "<tr>";
echo "<td>";
echo "<select class='form-control text-center' id='lstEmployes'>";
foreach ( $rqt->fetchAll(PDO::FETCH_ASSOC) as $ligne)
{
    echo "<option value='" . $ligne['numE'] . "'>". $ligne['prenomE'] ."</otpion>" ;
}
echo "</select>";
echo "</td>";
echo "<td><input class='form-control text-center' id='txtDate' type='date'></td>";
echo "<td><input class='form-control text-center' id='txtHeures' type='number'></td>";
echo "<td><input id='btnValider'\n\
 data-toggle='popover' title='Nouveau temps' data-content='Insertion réussie !!!'\n\
 onclick='InsertNewTime()' type='button' value='Valider' class='form-control btn-info'></td>";
echo "</tr>";
echo "</table>";
