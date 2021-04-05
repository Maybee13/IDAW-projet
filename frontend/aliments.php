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
    <script type = "text/javascript" src="js/scriptAliments.js"></script> 
    <title>CRUD</title>
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
                <h2>Aliments</h2>
            </div>
        </div>
        <div class="row">
            <div class="table-responsive">
                <table id="aliments" class="display table table-bordered nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Modifier</th>
                            <th>Supprimer</th>
                            <th>Aliment</th>
                            <th>Type</th>
                            <th>Energie (kcal/100g)</th>
                            <th>Eau (g/100g)</th>
                            <th>Protéines (g/100g)</th>
                            <th>Glucides (g/100g)</th>
                            <th>Lipides (g/100g)</th>
                            <th>Sucres (g/100g)</th>
                            <th>Glucose (g/100g)</th>
                            <th>Fibres Alimentaires (g/100g)</th>
                            <th>Cholestérol (mg/100g)</th>
                            <th>Calcium (mg/100g)</th>
                            <th>Fer (mg/100g)</th>
                            <th>Iode (µg/100g)</th>
                            <th>Magnésium (mg/100g)</th>
                            <th>Phosphore (mg/100g)</th>
                            <th>Potassium (mg/100g)</th>
                            <th>Sodium (mg/100g)</th>
                            <th>Vitamines D (µg/100g)</th>
                            <th>Vitamines E (mg/100g)</th>
                            <th>Vitamine K1 (µg/100g)</th>
                            <th>Vitamines C (mg/100g)</th>
                            <th>Vitamines B1 (mg/100g)</th>
                            <th>Vitamines B2 (mg/100g)</th>
                            <th>Vitamines B3 (mg/100g)</th>
                            <th>Vitamines B5 (mg/100g)</th>
                            <th>Vitamines B6 (mg/100g)</th>
                            <th>Vitamines B9 (µg/100g)</th>
                            <th>Vitamines B12 (µg/100g)</th>
                        </tr>
                    </thead>
                    <tbody id="TableAliments">
                        
                        
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="panel panel-primary">
                    <h2 >Ajouter un Aliment</h2>
                    <div class="panel-body">
                        <form id="formutil" onsubmit="event.preventDefault();utilBuildTableRow();" autocomplete="off">
                            <div class="form-group">
                                <label for="label"> Aliment </label>
                                <input type="text" class="form-control" value="Banane" id="label" />
                            </div>
                            <div class="form-group">
                                <label for="type"> Type </label>
                                <input type="text" class="form-control" value="Fruit" id="type" />
                            </div>
                            <div class="form-group">
                                <label for="type"> Energie (kcal/100g) </label>
                                <input type="text" class="form-control" id="energie" />
                            </div>
                            <div class="form-group">
                                <label for="type"> Eau (g/100g) </label>
                                <input type="text" class="form-control" id="eau" />
                            </div>
                            <div class="form-group">
                                <label for="type"> Protéines (g/100g) </label>
                                <input type="text" class="form-control" id="proteines" />
                            </div>
                            <div class="form-group">
                                <label for="type"> Glucides (g/100g) </label>
                                <input type="text" class="form-control" id="glucides" />
                            </div>
                            <div class="form-group">
                                <label for="type"> Lipides (g/100g) </label>
                                <input type="text" class="form-control" id="lipides" />
                            </div>
                            <div class="form-group">
                                <label for="type"> Sucres (g/100g) </label>
                                <input type="text" class="form-control" id="sucres" />
                            </div>
                            <div class="form-group">
                                <label for="type"> Glucose (g/100g) </label>
                                <input type="text" class="form-control" id="glucose" />
                            </div>
                            <div class="form-group">
                                <label for="type"> Fibres Alimentaires (g/100g) </label>
                                <input type="text" class="form-control" id="fibres_alimentaires" />
                            </div>
                            <div class="form-group">
                                <label for="type"> Cholestérol (mg/100g) </label>
                                <input type="text" class="form-control" id="cholesterol" />
                            </div>
                            <div class="form-group">
                                <label for="type"> Calcium (mg/100g) </label>
                                <input type="text" class="form-control" id="calcium" />
                            </div>
                            <div class="form-group">
                                <label for="type"> Fer (mg/100g) </label>
                                <input type="text" class="form-control" id="fer" />
                            </div>
                            <div class="form-group">
                                <label for="type"> Iode (µg/100g) </label>
                                <input type="text" class="form-control" id="iode" />
                            </div>
                            <div class="form-group">
                                <label for="type"> Magnésium (mg/100g) </label>
                                <input type="text" class="form-control" id="magnesium" />
                            </div>
                            <div class="form-group">
                                <label for="type"> Phosphore (mg/100g) </label>
                                <input type="text" class="form-control" id="phosphore" />
                            </div>
                            <div class="form-group">
                                <label for="type"> Potassium (mg/100g) </label>
                                <input type="text" class="form-control" id="potassium" />
                            </div>
                            <div class="form-group">
                                <label for="type"> Sodium (mg/100g) </label>
                                <input type="text" class="form-control" id="sodium" />
                            </div>
                            <div class="form-group">
                                <label for="type"> Vitamines D (µg/100g) </label>
                                <input type="text" class="form-control" id="vitamines_d" />
                            </div>
                            <div class="form-group">
                                <label for="type"> Vitamines E (mg/100g) </label>
                                <input type="text" class="form-control" id="vitamines_e" />
                            </div>
                            <div class="form-group">
                                <label for="type"> Vitamines K1 (µg/100g) </label>
                                <input type="text" class="form-control" id="vitamines_k1" />
                            </div>
                            <div class="form-group">
                                <label for="type"> Vitamines C (mg/100g) </label>
                                <input type="text" class="form-control" id="vitamines_c" />
                            </div>
                            <div class="form-group">
                                <label for="type"> Vitamines B1 (mg/100g) </label>
                                <input type="text" class="form-control" id="vitamines_b1" />
                            </div>
                            <div class="form-group">
                                <label for="type"> Vitamines B2 (mg/100g) </label>
                                <input type="text" class="form-control" id="vitamines_b2" />
                            </div>
                            <div class="form-group">
                                <label for="type"> Vitamines B3 (mg/100g) </label>
                                <input type="text" class="form-control" id="vitamines_b3" />
                            </div>
                            <div class="form-group">
                                <label for="type"> Vitamines B5 (mg/100g) </label>
                                <input type="text" class="form-control" id="vitamines_b5" />
                            </div>
                            <div class="form-group">
                                <label for="type"> Vitamines B6 (mg/100g) </label>
                                <input type="text" class="form-control" id="vitamines_b6" />
                            </div>
                            <div class="form-group">
                                <label for="type"> Vitamines B9 (µg/100g) </label>
                                <input type="text" class="form-control" id="vitamines_b9" />
                            </div>
                            <div class="form-group">
                                <label for="type"> Vitamines B12 (µg/100g) </label>
                                <input type="text" class="form-control" id="vitamines_b12" />
                            </div>
                            <div class="col-xs-12">
                                <input type="submit" id="updateButton" class="btn btn-primary" onclick="update();" value="Ajouter"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
  
</html>
<script>
     fetch(backendurl + "aliments.php").then( 
                    res => res.json()
                )
                .then(res=> {
                    let texte=""
                    for(let i=0;i<res.length()-1;i=i++){
                        let label=res[i][0]
                        let type=res[i][1]
                        texte+="<tr><td><button type='button' onclick='display(this)' class='btn' data-id='"+ i +"
                            '><i class='fas fa-edit'/></button><td><button type='button'onclick='utilDelete(this);'class='btn'data-id='"+ $i +"
                            '><i class='fas fa-trash' /></button></td><td>"+label+"</td><td>"+type+"</td>"
                        for(let j=2;j<29;j++){
                            let nutr=res[i][j]
                            texte=texte+"<td>"+nutr+"</td>"
                        }
                        texte+="</tr>"
                    }
                    console.log(texte)
                    $(#"TableAliments" ).append(texte);
                   
                })
    
</script>

<!--for($i=0;$i<sizeof($result)-27;$i=$i+28){
                                $label=$result[$i][0];
                                $type=$result[$i][1];
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
                                <td>$label</td>
                                <td>$type</td>";
                                for($j=$i;$j<$i+27;$j++){
                                    $nutr=$result[$j][3];
                                    echo"<td>$nutr</td>";
                                }
                                echo"</tr>";-->