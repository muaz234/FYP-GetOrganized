<?php


session_start();


if(isset($_POST['submit'])) {
	
	
	require 'verifyuser.php' ;
	
	$username = mysqli_real_escape_string($conn, $_POST['username']) ;
	
	$password = mysqli_real_escape_string($conn, $_POST['password']) ;
	
	
	if(empty($username) || empty($password) ) {
		
		
		
	}
	 else {
		  $sql= "SELECT * FROM loginadmin WHERE username='$username' " ;
		  $result = mysqli_query($conn, $sql);
		  $resultcheck = mysqli_num_rows($result);
		  if($resultcheck < 1) {
			  
			//  header("Location:indexadmin?login=error");
			  exit();
		  } else {
			  
			  if($row = mysqli_fetch_assoc($result)) {
				  
				 // $_SESSION['username'] = $row['username'] ;
				  // $_SESSION['password'] = $row['password'] ;
				   header("Location:indexadmin.php");
				   exit();
			  }
			  
			  
		  }
	 } 
		


}





		
		  
		
	
	else {
		header("Location:cubalogin.php");
		exit ;
	}
	
	
	
	
	
	




?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Login</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>
        <form action="cubalogin.php" method="post">
           
                <label>Username:<sup>*</sup></label>
                <input type="text" name="username"class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"></span>
               
            <div class="form-group >
                <label>Password:<sup>*</sup></label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary"  value="Submit">
            </div>
            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
        </form>

    </div> 
     <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>   
</body>
</html>




