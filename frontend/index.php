<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='css/index.css' type='text/css' media='screen' title='default' charset='utf-8' />
    <title>iMangerMieux - Connexion</title>
</head>
<body>
    <div class="row">
        <div class="col-sm-6">
            <h1>Bienvenue sur iMangerMieux!</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <h2>Connexion</h2>
        </div>
    </div>
    <div class="container">
        <form id="login_form" action="connected.php" method="POST">
            <table>
                <tr>
                    <th>Login :</th>
                    <td><input type="text" name="login"></td>
                </tr>
                <tr>
                    <th></th>
                    <td><input type="submit" value="Se connecter..."/></td>
                </tr>
            </table>
        </form>
    </div>
    <div>
        <img src='imgs/food.png'>
    </div>
</body>
</html>