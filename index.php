<?php
require_once "pdo.php";
if (isset($_POST['user']) && isset($_POST['password'])) {

    $stmt = $pdo->prepare('SELECT username, pass FROM persons WHERE username = :em AND pass = :pw');

    $stmt->execute(array(':em' => $_POST['user'], ':pw' => $_POST['password']));


    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        header("Location: user.php",true,301);
        return;
    }
    else{
    	echo '<script>alert("INVALID PASSWORD OR USER")</script>';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>COOKIE RECIPE</title>
</head>
<body>
<h1>WELCOME TO WEBSITE</h1>
<div align="center">
<form method="POST">
	<label for="user">USER ID</label>
	<input type="text" id="user" name="user">
	<label for="password">PASSWORD</label>
	<input type="password" id="password" name="password">
	<input type="submit" id="submit">
</form>
<h2>IF NOT REGISTERED</h2>
<a href="register.php">REGISTER</a>
</div>
</body>
</html>