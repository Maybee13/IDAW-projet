<?php
    session_start();
    $config = include('config.php');
    $conn= mysqli_connect($config['database'], $config['username'], $config['password'], $config['dbname']);
    if($conn == false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    $login=$_SESSION['login'];
    $sqlfruit=mysqli_query($conn,"SELECT SUM(to_contain.QUANTITY) FROM food JOIN to_contain ON food.ID_FOOD=to_contain.FOOD_ID JOIN meal ON to_contain.ID_MEAL=meal.ID_MEAL WHERE meal.login='$login' AND (food.TYPE_='fruits' OR food.TYPE_='legumes') AND meal.DATE > (NOW() - INTERVAL 1 WEEK)");
    $resultfruit=mysqli_fetch_all($sqlfruit);
    $nombrefruit=$resultfruit[0][0];
    echo(json_encode($nombrefruit));
?>