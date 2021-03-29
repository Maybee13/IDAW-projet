<?php
    $conn= mysqli_connect("localhost", "root", "", "imangermieux");
    
    if($conn == false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    $array = array('energie','eau','proteines','glucides','lipides','sucres','glucose','fibres_alimentaires','cholesterol','calcium','fer','iode','magnesium','phosphore','potassium','sodium','vitamines_d','vitamines_e','vitamines_k1','vitamines_c','vitamines_b1','vitamines_b2','vitamines_b3','vitamines_b5','vitamines_b6','vitamines_b9','vitamines_b12');

    if(isset($_POST['label'] )){
        $label = $_POST['label'];
    }
    if(isset($_POST['type'] )){
        $type = $_POST['type'];
    }
    if(isset($_POST['energie'] )){
        $energie = $_POST['energie'];
    }
    if(isset($_POST['eau'] )){
        $eau = $_POST['eau'];
    }
    if(isset($_POST['proteines'] )){
        $proteines = $_POST['proteines'];
    }
    if(isset($_POST['glucides'] )){
        $glucides = $_POST['glucides'];
    }
    if(isset($_POST['lipides'] )){
        $lipides = $_POST['lipides'];
    }
    if(isset($_POST['sucres'] )){
        $sucres = $_POST['sucres'];
    }
    if(isset($_POST['glucose'] )){
        $glucose = $_POST['glucose'];
    }
    if(isset($_POST['fibres_alimentaires'] )){
        $fibres_alimentaires = $_POST['fibres_alimentaires'];
    }
    if(isset($_POST['cholesterol'] )){
        $cholesterol = $_POST['cholesterol'];
    }
    if(isset($_POST['calcium'] )){
        $calcium = $_POST['calcium'];
    }
    if(isset($_POST['fer'] )){
        $fer = $_POST['fer'];
    }
    if(isset($_POST['iode'] )){
        $iode = $_POST['iode'];
    }
    if(isset($_POST['magnesium'] )){
        $magnesium = $_POST['magnesium'];
    }
    if(isset($_POST['phosphore'] )){
        $phosphore = $_POST['phosphore'];
    }
    if(isset($_POST['potassium'] )){
        $potassium = $_POST['potassium'];
    }
    if(isset($_POST['sodium'] )){
        $sodium = $_POST['sodium'];
    }
    if(isset($_POST['vitamines_d'] )){
        $vitamines_d = $_POST['vitamines_d'];
    }
    if(isset($_POST['vitamines_e'] )){
        $vitamines_e = $_POST['vitamines_e'];
    }
    if(isset($_POST['vitamines_k1'] )){
        $vitamines_k1 = $_POST['vitamines_k1'];
    }
    if(isset($_POST['vitamines_c'] )){
        $vitamines_c = $_POST['vitamines_c'];
    }
    if(isset($_POST['vitamines_b1'] )){
        $vitamines_b1 = $_POST['vitamines_b1'];
    }
    if(isset($_POST['vitamines_b2'] )){
        $vitamines_b2 = $_POST['vitamines_b2'];
    }
    if(isset($_POST['vitamines_b3'] )){
        $vitamines_b3 = $_POST['vitamines_b3'];
    }
    if(isset($_POST['vitamines_b5'] )){
        $vitamines_b5 = $_POST['vitamines_b5'];
    }
    if(isset($_POST['vitamines_b6'] )){
        $vitamines_b6 = $_POST['vitamines_b6'];
    }
    if(isset($_POST['vitamines_b9'] )){
        $vitamines_b9 = $_POST['vitamines_b9'];
    }
    if(isset($_POST['vitamines_b12'] )){
        $vitamines_b12 = $_POST['vitamines_b12'];
    }

    $id_food= "SELECT FOOD_ID FROM food WHERE label='${label}'";

    if($_POST['crud']=='ajout'){
        $sql = "INSERT INTO food (FOOD_LABEL,TYPE_) VALUES ('${label}','${type}')";
        for($i=1;$i<27;$i++){
            $nut=$array[$i];
            $sql_nut = "INSERT INTO to_provide (FOOD_ID,NUTRIENT_ID,RATIO) VALUES ('${id_food}','${i}','${nut}')";
        }
    }
    if($_POST['crud']=='modif'){
        $sql = "UPDATE food SET FOOD_LABEL='${label}',TYPE_= '${type}' WHERE FOOD_LABEL='${label}'";
        for($i=1;$i<27;$i++){
            $nut=$array[$i];
            $sql_nut = "UPDATE to_provide SET FOOD_ID ='${id_food}',NUTRIENT_ID='${i}',RATIO='${nut}' WHERE FOOD_ID='${id_food}'";
        }
    }
    if(mysqli_query($conn, $sql)){
        echo "Records added successfully.\n";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn)."\n";
    }
    if(mysqli_query($conn, $sql_nut)){
        echo "Records added successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql_nut. " . mysqli_error($conn)."\n";
    }

    
?>