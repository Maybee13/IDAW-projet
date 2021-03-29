<?php
    $conn= mysqli_connect("localhost", "root", "", "imangermieux");
    
    if($conn == false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    if(isset($_POST['label'] )){
        $label = $_POST['label'];
    }

    $sql = "DELETE FROM food WHERE FOOD_LABEL ='${label}'";
    if(mysqli_query($conn, $sql)){
        echo "Records deleted successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
?>