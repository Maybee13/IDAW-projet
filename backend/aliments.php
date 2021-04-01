<?php
      header('Content-Type: application/json');
    $conn= mysqli_connect("localhost", "root", "", "imangermieux");
    if($conn == false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    /*else{
        echo"Bien connecté à la base";
    }*/
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
            $row[] = $nutr;
            //$row[$j+2] = $nutr;
        }
        $tableauAliments[$k]=$row;
        $a=0;
        //echo "$tableauAliments[$i][$a]";
        $k=$k+1;
    }

    //$arr = array('f'=>array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5));
    $json = json_encode($tableauAliments);
    echo $json;

?>
