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
    for($i=0;$i<sizeof($result)-$numberOfNutrients;$i=$i+$numberOfNutrients)
    {
        $label=$result[$i][0];
        $type=$result[$i][1];
        $tableauAliments[$i]=array();
        $row = array();
        $row[0]=$label;
        $row[1]=$type;
        //$tableauAliments[$i][0]=$label;
        //$tableauAliments[$i][1]=$type;
        //echo" -$row[0],$row[1]- ";
        for($j=$i;$j<$i+$numberOfNutrients;$j++)
        {
            $nutr = $result[$j][3];
            $row[$j+2] = $nutr;
        }
        $tableauAliments[$i]=$row;
        $a=0;
        //echo "$tableauAliments[$i][$a]";
    }
    
    $arr = array('f'=>array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5));
    $json = json_encode($result[21]);
    echo "Renvoie le json :", $json;

?>
