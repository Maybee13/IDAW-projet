<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='css/crud2.css' type='text/css' media='screen' title='default' charset='utf-8' />
    <title>Profil</title>
</head>
<body>
    <?php
    require_once('navbar.php');
    ?>
    <div class="col-sm-6">
        <h4>Bienvenue <?php echo $_SESSION['firstname']?>!</h4>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h2>Profil</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <?php
                    $conn= mysqli_connect("localhost", "root", "", "imangermieux");
                    if($conn == false){
                        die("ERROR: Could not connect. " . mysqli_connect_error());
                    }
                    $login=$_SESSION['login'];
                    $sql=mysqli_query($conn,"SELECT * FROM user WHERE LOGIN='$login'");
                    $result=mysqli_fetch_all($sql);
                    //print_r($result);
                    $surname=$result[0][1];
                    $firstname=$result[0][2];
                    $dateofbirth=$result[0][3];
                    $sex=$result[0][4];
                    if($result[0][5]==1){
                        $sport='bas';
                    }
                    if($result[0][5]==2){
                        $sport='moyen';
                    }
                    else{
                        $sport='elevé';
                    }

                    $user=$_SESSION['login'];
                    echo "<div class='espace'>Nom : $surname</div>
                    <div class='espace'>Prénom : $firstname</div>
                    <div class='espace'>Email : $login</div>
                    <div class='espace'>Date de Naissance : $dateofbirth</div>
                    <div class='espace'>Sex : $sex</div>
                    <div class='espace'>Niveau de Pratique Sportive : $sport</div>"                
                ?>
            </div>
        </div>
    </div>
</body>
</html>