<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='css/crud.css' type='text/css' media='screen' title='default' charset='utf-8' />
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <title>CRUD</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h2>Aliments</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <table id="aliments" class="table table-bordered table-condensed table-striped">
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
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="panel panel-primary">
                    <div class="panel-heading"> 
                        Ajouter Aliment
                    </div>
                    <div class="panel-body">
                        <form id="formutil" onsubmit="event.preventDefault();utilBuildTableRow();" autocomplete="off">
                            <div class="form-group">
                                <label for="label"> Aliment </label>
                                <input type="text" class="form-control" value="Skywalker" id="label" />
                            </div>
                            <div class="form-group">
                                <label for="type"> Type </label>
                                <input type="text" class="form-control" value="Luc" id="type" />
                            </div>
                            <div class="col-xs-12">
                                <input type="submit" id="updateButton" class="btn btn-primary" onclick="update();" value="Ajouter">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/scriptAliments.js"></script>
    </body>
  
</html>