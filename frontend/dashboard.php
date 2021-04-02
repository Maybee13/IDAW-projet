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
            <div class="col-sm-6">
                <?php
                    $conn= mysqli_connect("localhost", "root", "", "imangermieux");
                    if($conn == false){
                        die("ERROR: Could not connect. " . mysqli_connect_error());
                    }
                    $login=$_SESSION['login'];
                    $sqlfruit=mysqli_query($conn,"SELECT SUM(to_contain.QUANTITY) FROM food JOIN to_contain ON food.ID_FOOD=to_contain.FOOD_ID JOIN meal ON to_contain.ID_MEAL=meal.ID_MEAL WHERE meal.login='$login' AND (food.TYPE_='fruits' OR food.TYPE_='legumes') AND meal.DATE > (NOW() - INTERVAL 1 WEEK)");
                    $resultfruit=mysqli_fetch_all($sqlfruit);
                    $nombrefruit=$resultfruit[0][0];
                    echo "<h4>Fruits et légumes par semaine : $nombrefruit</h4>"
                ?>
            </div>
        </div>
        <!--<div class="row">
            <div class="col-sm-6">
                <h4>Calories</h4>
            </div>
        </div>-->
        <?php
            $conn= mysqli_connect("localhost", "root", "", "imangermieux");
            if($conn == false){
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }
            $login=$_SESSION['login'];
            $sqlcal=mysqli_query($conn,"SELECT SUM(to_provide.RATIO), meal.DATE FROM to_provide JOIN nutrient_intake ON nutrient_intake.NUTRIENT_ID=to_provide.NUTRIENT_ID JOIN food ON food.ID_FOOD=to_provide.FOOD_ID JOIN to_contain ON food.ID_FOOD=to_contain.FOOD_ID JOIN meal ON meal.ID_MEAL=to_contain.ID_MEAL WHERE meal.LOGIN='$login' AND nutrient_intake.NUTRIENT_ID=1 AND meal.DATE > (NOW() - INTERVAL 1 WEEK) GROUP BY meal.DATE");
            $resultcal=mysqli_fetch_all($sqlcal);
            //print_r($resultcal);
            $cal="[";
            for($i=0;$i<sizeof($resultcal[0]);$i++){
                $ratio=$resultcal[$i][0];
                $date=$resultcal[$i][1];
                $cal.="[$date,$ratio],";
            }
            $cal.="]";
        ?>
        <script type="text/javascript">
            window.onload = function () {
                var chart = new CanvasJS.Chart("chartContainer", {
                    title:{
                        text: "Calories par semaine"              
                    },
                    data: [              
                    {
                        // Change type to "doughnut", "line", "splineArea", etc.
                        type: "column",
                        dataPoints: [
                            { label: "apple",  y: 10  },
                            { label: "orange", y: 15  },
                            { label: "banana", y: 25  },
                            { label: "mango",  y: 30  },
                            { label: "grape",  y: 28  }
                        ]
                    }
                    ]
                });
                chart.render();
            }
        </script>
        <div id="chartContainer" style="height: 300px; width: 100%;"></div>
    </div>
</body>
</html>