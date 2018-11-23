
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Register User</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <style>
  .floated {
  float: right ;
  margin-right:5px;
}
</style>
</head>
<body>
   <body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register an Account</div>
      <div class="card-body">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="" method="post">
            <div class="form-group ">
                <label>Id:<sup>*</sup></label>
                <input type="number" name="id" min="1"  class="form-control" >
                <span class="help-block"></span>
            </div>
             <div class="form-group">
                <label>Name:<sup>*</sup></label>
                <input type="text" name="name" class="form-control" >
                <span class="help-block"></span>
            </div>

             <div class="form-group">
                <label>Email:<sup>*</sup></label>
                <input type="email" name="email" class="form-control" >
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <label>Password:<sup>*</sup></label>
                <input type="password" name="password" class="form-control" >
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <label>Confirm Password:<sup>*</sup></label>
                <input type="password" name="confirm_password" class="form-control" >
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary"  name="submit" value="Submit" style="float:right;" >
                <input type="reset" class="btn btn-default" value="Reset" style="float:right;" >
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>
</body>
</html>





<?php
// Include config file
require_once 'database.php';


if(isset($_POST['submit']))
{

$id = mysqli_real_escape_string($conn,$_POST['id']);
$name = mysqli_real_escape_string($conn,$_POST['name']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$password = mysqli_real_escape_string($conn,$_POST['password']);
$level = 'staff';

if( empty($id) || empty($name) ||  empty($email) || empty($password))
{

$error= "Please enter all the required details";
echo "<script type='text/javascript'> alert('$error'); </script>";

}

else
{

  $sql = "SELECT * FROM employee WHERE empid='$id' " ;
  $result = mysqli_query($conn,$sql);
  $resultcheck = mysqli_num_rows($result);

    if($resultcheck > 0 )
    {

        $idtaken = "User ID taken";
        echo "<script type='text/javascript'> alert('$idtaken'); </script>";
    }
    else
    {

    $sql = " INSERT INTO employee (empid,empname,email,password,level) VALUES ('$id' ,'$name', '$email' , '$password','$level') " ;
    $result = mysqli_query($conn, $sql) ;
    $query ="INSERT INTO leave_limit (empid,annual,maternity,advance,special,medical) VALUES ('$id', 8 , 90 , 12 , 3 , 14 )";
    $insert = mysqli_query($conn,$query);
    if($result)
    {
      if($insert)
      {
          header("Location:login.php");
      }
    }
    else
      {
      echo "Error occured.Please retry";
      }



    }

}




}



?>
