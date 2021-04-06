<?php
    $config = include('config.php');
    $conn= mysqli_connect($config['database'], $config['username'], $config['password'], $config['dbname']);
    
    if($conn == false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    if(isset($_POST['label'] )){
        $label = $_POST['label'];
    }

    $sql = "DELETE FROM meal WHERE MEAL_LABEL ='${label}'";
    if(mysqli_query($conn, $sql)){
        echo "Records deleted successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
?>