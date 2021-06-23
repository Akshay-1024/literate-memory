<?php
require_once "pdo.php";
if(isset($_POST['user'])
	&&isset($_POST['mail'])
		&&isset($_POST['password'])){
	$stmt = $pdo -> prepare('INSERT INTO persons(username,email,pass) VALUES(:uid,:mail,:pass)'
	);
	$stmt->execute(array(
                ':uid' => $_POST['user'],
                ':mail' => $_POST['mail'],
                ':pass' => $_POST['password'])
        );
	header("Location: index.php",true,301);
	return;
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>REGISTER</title>
</head>
<body>
<div>
<form method="POST">
	<p>USER NAME:
		<input type="text" id="user" name="user">
	</p>
	<p>EMAIL
		<input type="text" id="mail" name="mail">
	</p>
	<p>PASSWORD:
		<input type="password" id="password" name="password">
	</p>
        <p>CONFIRM PASSWORD:
            <input type="password" id="cpassword" name="cpassword">
        </p>
	<input type="submit" id="submit" onclick="return doValidate();">
</form>
<script>
function doValidate() {
    console.log('Validating...');
    try {
        addr = document.getElementById('mail').value;
        pw = document.getElementById('password').value;
        cpw = document.getElementById('cpassword').value;
        console.log("Validating addr="+addr+" pw="+pw);
        if (addr == null || addr == "" || pw == null || pw == "") {
            alert("ALL fields must be filled out");
            return false;
        }
        if ( addr.indexOf('@') == -1 ) {
            alert("Invalid email address");
            return false;
        }
        if(pw!=cpw){
            alert("Passwords don't match");
            return false;
        }
        return true;
    } catch(e) {
        return false;
    }
    return false;
}
</script>
</div>
</body>
</html>