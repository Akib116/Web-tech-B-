<!DOCTYPE HTML>  
<html>
<head>
  <title>Profile Picture</title>
 
</head>
<body>
<table align="center">
	<tr>
    <td><a href="HOME.php"> Home </a></td>
    <td><a href="LOGIN.php"> Login </a></td>
    
    </tr>
</table>

<h2>PROFILE PICTURE</h2>
<img src="picture/logo.jpg" alt="logo" width="100" height="100"><br><br>
<?php
    
    error_reporting(E_ERROR/E_PARSE);

   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 500000){
         $errors[]='File size must be excately 5 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"images/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
?>

<form action="" method="POST" enctype="multipart/form-data">
         <input type="file" name="image" /><br><br>
         <input type="submit"/>
      </form>
    
</body>
</html>