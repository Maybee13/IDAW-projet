<?php
    $conn= mysqli_connect("localhost", "root", "", "imangermieux");
    $sql="SELECT LOGIN, FIRSTNAME FROM user";
    $result=$conn->query($sql);

    $errorText="";
    $successfullyLogged=false;

    if(isset($_POST['login'])){
        $tryLogin=$_POST['login'];
        while($data=mysqli_fetch_array($result)){
            if($data['LOGIN']==$tryLogin){
                $login=$tryLogin;
                $name=$data['FIRSTNAME'];
                $successfullyLogged=true;
            }
        }
    }
    else{
        $errorText="Merci d'utiliser le formulaire de login";
    }
    if(!$successfullyLogged){
        echo $errorText;
    }
    else{
        session_start();
        $_SESSION['login']=$login;
        $_SESSION['firstname']=$name;
        echo "
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <link rel='stylesheet' href='css/crud2.css' type='text/css' media='screen' title='default' charset='utf-8' />
            <title>TP3</title>
        </head>
        <body>";
        require_once('navbar.php');
        echo "<h1>Bienvenue $name !</h1>
        </body>
        </html>";
    }
?>