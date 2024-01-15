<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Gestion Supermarche</title>
        <script type="text/javascript" src="../JQuery/JQuery 3.5.1.js"></script>
        <script src="../Bootstrap/js/bootbox.min.js"></script>
        <script src="../Bootstrap/js/bootstrap.min.js"></script>
        <script src="../Bootstrap/js/bootstrap.js"></script>
        <link href="../Bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../CSS/Styles.css" rel="stylesheet">
        <link href="../Bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
        <script type="text/javascript" src="../JS/Fonctions.js"></script>
        
        <script type="text/javascript">
            $
            (
                function()
                {
                    // Pour remplir un SELECT
                    // Avec tous les secteurs
                    GetAllSecteurs();
                }
            );
        </script>
    </head>
    <body>
        <label class='form-control text-center btn-success'>Liste des secteurs</label><br>
        <div class="col-md-12" id="divSecteurs"></div><br><br>
        <label class='form-control text-center btn-success'>Liste des rayons</label><br>
        <div class="col-md-12" id="divRayons"></div><br><br>
        <table class= "table table-hover">
            <tr>
                <td>
                    <label class='form-control text-center btn-success'>Liste des employes</label>
                    <div id="divEmployes"></div>
                </td>
                <td>
                    <label class='form-control text-center btn-success'>Nombre d'heures total</label>
                    <div id="divTotalHeures"></div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label class='form-control text-center btn-success'>Ajouter un nouveau temps</label>
                    <div class="col-md-12" id="divNewTemps"></div>
                </td>
            </tr>
        </table>
    </body>
</html>
