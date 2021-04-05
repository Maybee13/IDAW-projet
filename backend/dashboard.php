<?php
    $config = include('config.php');
    session_start();
    $conn= mysqli_connect($config['database'], $config['username'], $config['password'], $config['dbname']);
    if($conn == false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    $login=$_SESSION['login'];
    $sqlcal=mysqli_query($conn,"SELECT SUM(to_provide.RATIO), meal.DATE FROM to_provide JOIN nutrient_intake ON nutrient_intake.NUTRIENT_ID=to_provide.NUTRIENT_ID JOIN food ON food.ID_FOOD=to_provide.FOOD_ID JOIN to_contain ON food.ID_FOOD=to_contain.FOOD_ID JOIN meal ON meal.ID_MEAL=to_contain.ID_MEAL WHERE meal.LOGIN='$login' AND nutrient_intake.NUTRIENT_ID=1 AND meal.DATE > (NOW() - INTERVAL 1 WEEK) GROUP BY meal.DATE");
    $resultcal=mysqli_fetch_all($sqlcal);
    $cal=array(
        date('Y-m-d')=>0,
        date('Y-m-d', time()-86400)=>0,
        date('Y-m-d', time()-(2*86400))=>0,
        date('Y-m-d', time()-(3*86400))=>0,
        date('Y-m-d', time()-(4*86400))=>0,
        date('Y-m-d', time()-(5*86400))=>0,
        date('Y-m-d', time()-(6*86400))=>0,
        date('Y-m-d', time()-(7*86400))=>0,
    );
    foreach ($resultcal as $value){
        $cal[$value[1]] += $value[0];
    };
    echo(json_encode($cal))
?>