<?php
      header('Content-Type: application/json');
    $conn= mysqli_connect("localhost", "root", "", "imangermieux");
    if($conn == false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    if (!mysqli_set_charset($conn, "utf8")) {
        printf("Erreur lors du chargement du jeu de caractères utf8 : %s\n", mysqli_error($link));
        exit();
    }

    $sql=mysqli_query($conn,"SELECT food.FOOD_LABEL,food.TYPE_, nutrient_intake.NUTRIENT_NAME, to_provide.RATIO FROM food JOIN to_provide ON food.ID_FOOD = to_provide.FOOD_ID JOIN nutrient_intake ON to_provide.NUTRIENT_ID = nutrient_intake.NUTRIENT_ID ORDER BY food.FOOD_LABEL ASC");
    $result = mysqli_fetch_all($sql);

    
    $sql2 = mysqli_query($conn,"SELECT DISTINCT(COUNT(NUTRIENT_ID)) FROM nutrient_intake");
    $n = mysqli_fetch_all($sql2);
    $numberOfNutrients = $n[0][0];

    $sql3 = mysqli_query($conn,"SELECT DISTINCT(COUNT(ID_FOOD)) FROM food");
    $f = mysqli_fetch_all($sql3);
    $numberOfFood = $f[0][0];

    $tableauAliments = array();
    $k = 0;
    for($i=0;$i<sizeof($result)-$numberOfNutrients+1;$i=$i+$numberOfNutrients)
    {
        $label=$result[$i][0];
        $type=$result[$i][1];
        $row = array();
        array_push($row,$label);array_push($row,$type);
        for($j=$i;$j<$i+$numberOfNutrients;$j++)
        {
            $nutr = $result[$j][3];
            $row[] = $nutr;
        }
        array_push($tableauAliments,$row);
        $k++;
    }

    $json = json_encode($tableauAliments,JSON_FORCE_OBJECT);
    echo $json;
?>