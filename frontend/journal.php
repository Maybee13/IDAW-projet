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
    <!--<link href="css/style.css" rel="stylesheet">-->
    <link rel='stylesheet' href='css/crud2.css' type='text/css' media='screen' title='default' charset='utf-8' />
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.24/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.24/datatables.min.js"></script>
    <script type = "text/javascript" src="js/scriptJournal.js"></script> 
    <title>CRUD</title>
</head>
<body>
    <?php
    require_once('navbar.php');
    ?>
    <div class="col-sm-6">
    <?php 
        //$user = $_SESSION['mail'];
        $user  = 'pierre.marque@etu.imt-lille-douai.fr';
    ?>
        <h4>Bienvenue <?php echo "User anonyme"/*$user*/?>!</h4>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h2>Repas</h2>
            </div>
        </div>
        <div class="row">
            <div class="table-responsive">
                <table id="repas" class="display table table-bordered nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Supprimer</th>
                            <th>Modifier</th>
                            <th>Nom du repas</th>
                            <th>Date/heure</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $conn= mysqli_connect("localhost", "root", "", "imangermieux");
                            if($conn == false){
                                die("ERROR: Could not connect. " . mysqli_connect_error());
                            }
                            $sql = mysqli_query($conn,"SELECT meal.MEAL_LABEL, meal.DATE FROM meal WHERE meal.LOGIN = 'pierre.marque@etu.imt-lille-douai.fr'");
                            $result = mysqli_fetch_all($sql);
                            for($i=0;$i<sizeof($result);$i++){
                                $mealLabel = $result[$i][0];
                                $mealDate = $result[$i][1];
                                echo "<tr><td><button type='button'
                                        onclick='display(this)';
                                        class='btn'
                                        data-id=' $i '>
                                        <i class='fas fa-edit'/>
                                </button><td>
                                <button type='button'
                                        onclick='utilDelete(this);'
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
                        <form id="formutil" onsubmit="event.preventDefault();utilBuildTableRow();" autocomplete="on">
                            <div class="form-group">
                                <label for="label"> Repas </label>
                                <input type="text" class="form-control" id="label" placeholder="ex : Dîner avec Mémé" required/>
                            </div>
                            <div class="form-group">
                                <label for="date"> Date </label>
                                <input type="date" class="form-control"  id="date" required/>
                            </div>
                            <div class="col-xs-12">
                                <input type="submit" id="updateMealsButton" class="btn btn-primary" onclick="updateMelas();" value="Ajouter">
                            </div>
                            <div class="col-xs-12">
                                <input type="reset"  class="btn btn-primary" onclick="updateMelas();" value="Reset">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
  
</html>