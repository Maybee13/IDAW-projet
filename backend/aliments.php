<?php
    $conn= mysqli_connect("localhost", "root", "", "imangermieux");
    if($conn == false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    else{
        echo"Bien connecté à la base";
    }
    $sql=mysqli_query($conn,"SELECT food.FOOD_LABEL,food.TYPE_, nutrient_intake.NUTRIENT_NAME, to_provide.RATIO FROM food JOIN to_provide ON food.ID_FOOD = to_provide.FOOD_ID JOIN nutrient_intake ON to_provide.NUTRIENT_ID = nutrient_intake.NUTRIENT_ID ORDER BY food.FOOD_LABEL ASC");
    $result = mysqli_fetch_all($sql);
    
    $sql2 = mysqli_query($conn,"SELECT DISTINCT(COUNT(NUTRIENT_ID)) FROM nutrient_intake");
    $i = mysqli_fetch_all($sql2);
    $numberOfNutrients = $i[0][0];

    $tableauAliments = array();
    for($i=0;$i<140/*sizeof($result)*/-$numberOfNutrients;$i=$i+$numberOfNutrients+1)
    {
        $label=$result[$i][0];
        $type=$result[$i][1];
        $tableauAliments[$i]=array();
        $tableauAliments[$i][0]=$label;
        $tableauAliments[$i][1]=$label;
        for($j=$i;$j<$i+$numberOfNutrients;$j++)
        {
            $nutr=$result[$j][3];
            $tableauAliments[$i][$j]=$nutr;
        }
    }
    
    $arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);
    $json = json_encode($tableauAliments[0]);
    echo "Renvoie le json :", $json;

?>
