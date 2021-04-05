<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='css/crud2.css' type='text/css' media='screen' title='default' charset='utf-8' />
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <title>Dashboard</title>
</head>
<body>
    <?php
        require_once('navbar.php');
    ?>
    <div class="col-sm-6">
        <h4>Bienvenue <?php echo $_SESSION['firstname']?>!</h4>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h2>Dashboard</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 nombreFruits">
                
            </div>
        </div>
        
        <script type="text/javascript">
            let backendurl='http://localhost/imangermieux/IDAW-projet/backend/'
            window.onload = function () {

                fetch(backendurl + "dashboard.php").then( 
                    res => res.json()
                )
                .then(res=> {
                    let dataPointsArray = []
                    for(const [key,value] of Object.entries(res)){
                        dataPointsArray.push({label: key, y: value})
                    }
                    var chart = new CanvasJS.Chart("chartContainer", {
                    title:{
                        text: "Calories cette semaine"              
                    },
                    data: [              
                        {
                            // Change type to "doughnut", "line", "splineArea", etc.
                            type: "column",
                            dataPoints:dataPointsArray
                            }
                        ]
                    });
                    chart.render();
                    })
            }
        </script>
        <div id="chartContainer" style="height: 300px; width: 100%;"></div>
    </div>
</body>
</html>

<script>
     fetch(backendurl + "dashboardFruits.php").then( 
                    res => res.json()
                )
                .then(res=> {
                    $( ".nombreFruits" ).append( "<h4>Nombre de fruits par semaine : " + res + "</h4>" );
                })
    
</script>