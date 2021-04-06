<?php
    header('Content-Type: application/json');
    $config = include('config.php');
    $conn= mysqli_connect($config['database'], $config['username'], $config['password'], $config['dbname']);
  if($conn == false){
      die("ERROR: Could not connect. " . mysqli_connect_error());
  }

    //$array = array('energie','eau','proteines','glucides','lipides','sucres','glucose','fibres_alimentaires','cholesterol','calcium','fer','iode','magnesium','phosphore','potassium','sodium','vitamines_d','vitamines_e','vitamines_k1','vitamines_c','vitamines_b1','vitamines_b2','vitamines_b3','vitamines_b5','vitamines_b6','vitamines_b9','vitamines_b12');

    if(isset($_POST['label'] )){
        $label = $_POST['label'];
    }
    if(isset($_POST['date'] )){
        $date = $_POST['date'];
    }
    
    if(isset($_POST['aliments'] )){
         $aliments = $_POST['aliments'];
     }//Pas réussi à exporter les ingrédients de chaque repas

    if($_POST['crud']=='ajout'){
        $sql = "INSERT INTO meal (MEAL_LABEL,DATE) VALUES ('${label}','${date}')";
        if(mysqli_query($conn, $sql)){
            echo "Records added successfully.\n";
        }
        else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn)."\n";
        }
        $result= mysqli_query($conn, "SELECT MAX(ID_MEAL) FROM meal");
        for ($i=0;$i<sizeof($aliments);i++)
        {
            $id = $aliments[0];
            $quantite = $aliments[0];
            $sql_ali= "INSERT INTO to_contain (FOOD_ID,ID_MEAL,QUANTITY) VALUES ('${id}','${result}','${quantite}')";
            if(mysqli_query($conn, $sql_ali)){
                echo "Records added successfully.";
            } 
            else{
                echo "ERROR: Could not able to execute $sql_nut. " . mysqli_error($conn)."\n";
            }
        }
    }
    else{
        $result= mysqli_query($conn, "SELECT ID_FOOD FROM food WHERE FOOD_LABEL='${label}'");
        $id_food_1 = mysqli_fetch_array($result,MYSQLI_NUM);
        $id_food = $id_food_1[0];
    }
    
?>