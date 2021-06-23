<?php
require_once "pdo.php";
    if(isset($_POST['recipie-name'])
    && isset($_POST['recipie-items'])
    && isset($_POST['recipie-procedue'])){
        $stmt = $pdo -> prepare('INSERT into users(recipie_name,items,recipie_procedue) VALUES(:recipie-name,:recipie-items,:recipie-procedue)');
        $stmt ->execute(array(
            ':recipie-name' => $_POST['recipie-name'],
            ':recipie-items' => $_POST['recipie-items'],
            ':recipie-procedue' => $_POST['recipie-procedue']
        ));

        header("location: user.php",true,301);
        return;
    }




?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HI User</title>
</head>
<body>
    <div class = "form-container">
    <form method="post">
    
    <label for = "recipie-name">Recipie-Name:
    <input type = "text" id = "recipie-name" value = "">
    <br>
    <label for = "recipie-items">Recipie-Items:
    <input type = "text" id = "recipie-items" value = "">
    <br>
    <label for = "recipie-procedue">Procedure:
    <textarea type = "text" id = "recipie-procedue" value = ""></textarea>
    
    
    <button type = "submit">submit</button>
    </div>
    </form>
</body>
</html>
