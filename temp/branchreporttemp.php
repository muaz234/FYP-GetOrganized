




<html>
<head>
 <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Report Form</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">




</head>
<body>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Submit a Report</div>
      <div class="card-body">
      	<h1> Fill the details required. * marks means required </h1>
    
      	<p> A report form for every branch and to be submitted to the manager/headquarters </p>


<form action="simpanreport.php"  method="post" >

Branch Number:<select name="branchid" id= "brid" >
   <option value="102-Kuala Lumpur" >Kuala Lumpur </option>
   <option value="103-Kluang,Johor" >Kluang </option>
   <option value="101-Bukit Mertajam" >Bukit Mertajam </option>
   <option value="100-Petaling Jaya"Petaling Jaya </option>
   </select>
   <br>

Amount of Employees: <input type="text" name="amtemp" id="emp_amt" placeholder="Employee amount" > <br> 

Actual Employees: <input type="text" name="actemp" id="act_emp" placeholder="Actual number of employee" > <br> 

Number of broken CCTV : <input type="text" name="brokencctv" id="broken_cctv"  placeholder="Broken CCTV" > <br> 

Item that needed to be replaced : <input type="textarea" name="itemreplace" id="replaceitem"  placeholder="Item replacement" > <br>

Date of Submitted Report : <input type="date" name="submitreport"  id="submitreport" min="2017-01-01" max="2017-12-31" >  <br>

<input type="submit" value="Submit" >
<input type="reset" value="Reset" >


</form>
</body>
</html>