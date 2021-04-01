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
    for($i=0;$i<sizeof($result)-$numberOfNutrients;$i=$i+$numberOfNutrients)
    {
        $label=$result[$i][0];
        $type=$result[$i][1];
        //$tableauAliments[$i]=array();
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
        array_push($tableauAliments,$row);
        //$tableauAliments[$k]=$row;
        $k=$k+1;
    }
    //$t=array();
   // for ($s=0;$s<18;$s++){$t[]=$tableauAliments[$s];}
    $json = json_encode($tableauAliments);
    echo $json;

/*
      header('Content-Type: application/json');
    $conn= mysqli_connect("localhost", "root", "", "imangermieux2");
    if($conn == false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    /* Modification du jeu de résultats en utf8 
    if (!mysqli_set_charset($conn, "utf8")) {
        printf("Erreur lors du chargement du jeu de caractères utf8 : %s\n", mysqli_error($link));
        exit();
    }

    $sql=mysqli_query($conn,"SELECT food.FOOD_LABEL,food.TYPE_, nutrient_intake.NUTRIENT_NAME, to_provide.RATIO FROM food JOIN to_provide ON food.ID_FOOD = to_provide.FOOD_ID JOIN nutrient_intake ON to_provide.NUTRIENT_ID = nutrient_intake.NUTRIENT_ID ORDER BY food.FOOD_LABEL ASC");
    $result = mysqli_fetch_all($sql);
    // print_r($result);

    $tableauAliments = [];
    $indexAliments = 0;
    $i=0;

    while($i<sizeof($result))
    {
        $aliments = [];
        $aliments['label'] = $result[$i][0];
        $aliments['type'] = $result[$i][1];
        $aliments['nutriments'] = [];
        $nutrimentIndex = 2;
        while( $result[$i+$nutrimentIndex][0] ==  $aliments['label'] ) {
            // this is a nutriment of THIS current food
            $nutriment = [];
            $nutriment[0] = $result[$i+$nutrimentIndex][2];
            $nutriment[1] = $result[$i+$nutrimentIndex][3];
            // $nutriment[2] = $result[$i+$nutrimentIndex][0];
            $aliments['nutriments'][] = $nutriment;
            $nutrimentIndex = $nutrimentIndex + 1;
        }
        $tableauAliments[]=$aliments;
        $i+=$nutrimentIndex;
    }

    //print_r($tableauAliments);

    $json = json_encode($tableauAliments,JSON_THROW_ON_ERROR);

    echo $json;
?>*/
