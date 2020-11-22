
<?php

error_reporting(E_ERROR/E_PARSE);

$name=$_POST["name"];
$pass=$_POST["pass"];
$email =$_POST["email"];
$gender =$_POST["gender"];
$number =$_POST["number"];
$address =$_POST['address'];


?>

<!DOCTYPE HTML>  
<html>
<head>
  <title>Registration</title>
  
  <style>
  .error {color: #FF0000;}
</style>
</head>
<body>  


<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr  = $numberErr = $addressErr = $passErr = "";
$name = $email = $gender =  $number = $address = $pass =  "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["password"])) {
    $passErr  = "Number is required";
  } else {
    $pass = test_input($_POST["Password"]);
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  if (empty($_POST["number"])) {
    $numberErr = "Number is required";
  } else {
    $number = test_input($_POST["number"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }

  if (empty($_POST["address"])) {
    $addressErr = "address is required";
  } else {
    $address = test_input($_POST["address"]);
  }

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>


<h2>REGISTRATION</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  Password: <input type="password" name="pass">
  <span class="error">* <?php echo  $passErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Mobile Number:  
  <input type="mobile" name="number">     
  <span class="error">* <?php echo $numberErr;?></span>
  <br><br> 
  Gender:
  <input type="radio" name="gender" value="female">Female
  <input type="radio" name="gender" value="male">Male
  <input type="radio" name="gender" value="other">Other
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>

  Address:
  <input type="text" name="address">
  <span class="error">* <?php echo $addressErr;?></span>
  <br><br>
  <br><br>
  <input type="reset" value="Reset">
  <input type="submit" name="submit" value="Submit">  
</form>

<table align="center">
<tr>
<td><a href="PROFILE_PICTURE.php">Profile_picture</a></td>
<td><a href="LOGIN.php"> Login </a></td>
<td><a href="HOME.php"> Home </a></td>
</tr>
</table>

 </body>
</html>

<?php

$file=fopen("view/reg.txt","a");
fwrite($file,$name);
fwrite($file,$pass);
fwrite($file,$email);
fwrite($file,$gender);
fwrite($file,$number);
fwrite($file,$address);
fclose($file);

?>
