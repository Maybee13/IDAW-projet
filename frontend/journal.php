<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel='stylesheet' href='css/crud2.css' type='text/css' media='screen' title='default' charset='utf-8' />
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.24/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.24/datatables.min.js"></script>
    <script type = "text/javascript" src="js/s.js"></script> 
    <title>CRUD</title>
</head>
<body>
    <?php
    require_once('navbar.php');
    ?>
    <div class="col-sm-6">
        <h4>Bienvenue <?php echo "User anonyme"/*$_SESSION['mail']*/?>!</h4>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h2>Aliments</h2>
            </div>
        </div>
        <div class="row">
            <div class="table-responsive">
                <table id="aliments" class="display table table-bordered nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Supprimer</th>
                            <th>Nom du repas</th>
                            <th>Date/heure</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            //$user = $_SESSION['mail'];
                            $user  = 'pierre.marque@etu.imt-lille-douai.fr';
                            $conn= mysqli_connect("localhost", "root", "", "imangermieux");
                            if($conn == false){
                                die("ERROR: Could not connect. " . mysqli_connect_error());
                            }
                            $sql = mysqli_query($conn,"SELECT meal.MEAL_LABEL, meal.DATE FROM meal WHERE meal.LOGIN = '${user}'");
                            $result = mysqli_fetch_all($sql);
                            for($i=0;$i<sizeof($result)-1;$i++){
                                $mealLabel = $result[$i][0];
                                $mealDate = $result[$i][1];
                                echo" 
                                <button type='button'
                                        onclick='mealDelete(this);'
                                        class='btn'
                                        data-id=' $i '>
                                        <i class='fas fa-trash' />
                                </button>
                                </td>
                                <td>$mealLabel</td>
                                <td>$mealDate</td>";
                                echo"</tr>";
                            }
                        ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="panel panel-primary">
                    <h2 >Ajouter un repas</h2>
                    <div class="panel-body">
                        <form id="formutil" onsubmit="event.preventDefault();utilBuildTableRow();" autocomplete="off">
                            <div class="form-group">
                                <label for="label"> Repas </label>
                                <input type="text" class="form-control" value="Banane" id="label" />
                            </div>
                            <div class="form-group">
                                <label for="type"> Date </label>
                                <input type="text" class="form-control" value="Fruit" id="type" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
  
</html>