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
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <!-- <script type="text/javascript" src="../JQuery/Chart.js"></script> -->
        <script src="../Bootstrap/js/bootbox.min.js"></script>
        <script src="../Bootstrap/js/bootstrap.min.js"></script>
        <script src="../Bootstrap/js/bootstrap.js"></script>
        <link href="../Bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../CSS/Styles.css" rel="stylesheet">
        <link href="../Bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
        <script type="text/javascript" src="../JS/Fonctions.js"></script>
        <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@3.6.0/dist/chart.min.js"></script> -->
        <script type="text/javascript">
            $
            (
                function()
                {
                    DessinerGraph1();
                    DessinerGraph2();
                }
            );
        </script>
    </head>
    <body>
        <div id="container">
            <div id="divGraph1">
                <canvas id="canvasGraph1"></canvas>
            </div>
            
            <div id="divGraph2">
                <canvas id="canvasGraph2"></canvas>
            </div>
       </div>
    </body>
</html>
