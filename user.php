<?php
require_once "pdo.php";
    if(isset($_POST['name'])
    &&isset($_POST['item'])
    && isset($_POST['procedue'])){
        $stmt = $pdo -> prepare('INSERT into users(recipie_name,items,recipie_procedue) VALUES(:name,:item,:procedue)');
        $stmt ->execute(array(
            ':name' => $_POST['name'],
            ':item' => $_POST['item'],
            ':procedue' => $_POST['procedue']
        ));

        header("location: user.php",true,301);
        return;
    }
    $us = 'abc'



?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HI USER</title>
</head>
<body>
    <h1>HI <?php echo $us?></h1>
    <div class = "form-container">
    <form method="POST">
    
    <label for = "name">Recipie-Name:
    <input type = "text" id = "recipie-name" name = "name">
    <br>
    <label for = "item">Recipie-Items:
    <input type = "text" id = "recipie-items" name = "item">
    <br>
    <label for = "procedue">Procedure:
    <textarea type = "text" id = "recipie-procedue" name = "procedue"></textarea>
    
    
    <button type = "submit">submit</button>
    </div>
    </form>
</body>
</html>
