// Permet de récupérer tous les secteurs
function GetAllSecteurs()
{
    $.ajax
    (
        {
            type:"GET",
            url:"../PHP/GetAllSecteurs.php",
            success:function(data)
            {
                $("#divSecteurs").append(data);
                GetAllRayonsBySecteur();
            },
            error:function()
            {
                alert("Erreur de récupération : SECTEURS");
            }
        }
    );
}

// Permet de récupérer tous les rayons d'un secteur en particulier
function GetAllRayonsBySecteur()
{  
    $.ajax
    (
        {
            type:"GET",
            url:"../PHP/GetAllRayonsBySecteur.php",
            data:"idSecteur="+$("#lstSecteurs option:selected").val(),
            success:function(data)
            {
                $("#divNewTemps").empty();
                $("#divTotalHeures").empty();
                $("#divEmployes").empty();
                $("#divRayons").empty();
                $("#divRayons").append(data);
                GetAllEmployesWorkInRayon();
            },
            error:function()
            {
                alert("Erreur de récupération : RAYONS");
            }
        }
    );
    
}

// Permet de récupérer tous les employes
// qui travaillent dans un rayon en particulier
function GetAllEmployesWorkInRayon()
{
    $.ajax
    (
        {
            type:"GET",
            url:"../PHP/GetAllEmployesWorkInRayon.php",
            data:"idRayon="+$("#lstRayons option:selected").val(),
            success:function(data)
            {
                $("#divNewTemps").empty();
                $("#divTotalHeures").empty();
                $("#divEmployes").empty();
                
                $("#divEmployes").append(data);
                GetTotalHeures();
            },
            error:function()
            {
                alert("Erreur de récupération : EMPLOYES");
            }
        }
    );
}

// Permet de récupérer le total d'heures d'un rayon en particulier
function GetTotalHeures()
{
    $.ajax
    (
        {
            type:"GET",
            url:"../PHP/GetTotalHeures.php",
            data:"idRayon="+$("#lstRayons").val(),
            success:function(data)
            {
                $("#divTotalHeures").append(data);
                GetNewTemps();
            },
            error:function()
            {
                alert("Erreur de récupération : HEURES");
            }
        }
    );    
}

function GetNewTemps()
{
$.ajax
    (
        {
            type:"GET",
            url:"../PHP/GetAllEmployes.php",
            success:function(data)
            {
                $("#divNewTemps").empty();
                $("#divNewTemps").append(data);
            },
            error:function()
            {
                alert("Erreur de récupération : NEWTEMPS");
            }
        }
    );    
}

function InsertNewTime()
{
    if($("#txtDate").val()==="")
    {
        bootbox.alert("Saisir une date !!! ");
    }
    else
    {
        if($("#txtHeures").val()==="")
        {
            bootbox.alert("Saisir une heure !!!");
        }
        else
        {
            $.ajax
            (
                {
                    type:"GET",
                    url:"../PHP/InsertNewTime.php",
                    data:"idEmploye="+$('#lstEmployes').val()+"&idRayon="+$('#lstRayons').val()+"&date="+$('#txtDate').val()+"&newTemps="+$('#txtHeures').val(),
                    success:function(data)
                    {
                        bootbox.alert(data);
                        GetAllEmployesWorkInRayon();
                    },
                    error:function()
                    {
                        alert("Erreur de récupération : NEWTEMPS");
                    }
                }
            );     
        }
    }
}

function DessinerGraph1()
{
    $.ajax
    (
        {
            type:"GET",
            url:"../PHP/Graph1.php",
            success:function(data)
            {
                var nomsRayons = [];
                var totalHeures = [];

                var valeurs = $.parseJSON(data);
                for(var i in valeurs)
                {
                    nomsRayons.push(valeurs[i].nomR);
                    totalHeures.push(valeurs[i].Total);
                }

                var chartdata = {
                    labels: nomsRayons,
                    datasets: [
                        {
                            label: 'Total heures par rayon',
                            backgroundColor: '#49e2ff',
                            borderColor: '#46d5f1',
                            hoverBackgroundColor: '#CCCCCC',
                            hoverBorderColor: '#666666',
                            data: totalHeures
                        }
                    ]
                };

                var graphTarget = $("#canvasGraph1");

                    var barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: chartdata
                    });

            },
            error:function()
            {
                alert("Erreur pour le graphique 1");
            }
        }
    );     
}

function DessinerGraph2()
{
    $.ajax
    (
        {
            type:"GET",
            url:"../PHP/Graph2.php",
            success:function(data)
            {
                var nomsSecteurs = [];
                var moyenneHeures = [];

                var valeurs = $.parseJSON(data);
                for(var i in valeurs)
                {
                    nomsSecteurs.push(valeurs[i].nomS);
                    moyenneHeures.push(valeurs[i].moyenne);
                }

                var chartdata = {
                    labels: nomsSecteurs,
                    datasets: [
                        {
                            label: 'Moyenne heures par secteur',
                            backgroundColor: ['#E78A22 ','#7FE722'],
                            borderColor: '#46d5f1',
                            hoverBackgroundColor: '#CCCCCC',
                            hoverBorderColor: '#666666',
                            data: moyenneHeures
                        }
                    ]
                };

                var graphTarget = $("#canvasGraph2");

                    var barGraph = new Chart(graphTarget, {
                        type: 'doughnut',
                        data: chartdata
                    });

            },
            error:function()
            {
                alert("Erreur pour le graphique 1");
            }
        }
    );     
}
