<?php
    $conn= mysqli_connect("localhost", "root", "", "imangermieux");
    
    if($conn == false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    if(isset($_POST['label'] )){
        $label = $_POST['label'];
    }
    if(isset($_POST['type'] )){
        $type = $_POST['type'];
    }
    if($_POST['crud']=='ajout'){
        $sql = "INSERT INTO food (FOOD_LABEL,TYPE_) VALUES ('${label}','${type}')";
    }
    if($_POST['crud']=='modif'){
        $sql = "UPDATE food SET FOOD_LABEL='${label}',TYPE_='${type}' WHERE FOOD_LABEL='${label}'";
    }
    if(mysqli_query($conn, $sql)){
        echo "Records added successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }

    
?>