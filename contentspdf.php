<?php
require_once 'database.php';




$sql = "SELECT empname,empid,epfnum,month,year,days,basic,ot,
        gross,epf_employee,socso_emp,eis_emp,tot_deductions,total_salary,date_keyin FROM salary WHERE
        ID= 2  " ;
$print = mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($print))
{
      $ID =  $row['empid'];
      $Name =  $row['empname'];
      $EPF = $row['epfnum'];
      $Month = $row['month'];
      $Year = $row['year'];
      $Days =   $row['days'];
      $Basic = $row['basic'];
      $OverTime = $row['ot'];
      $Gross = $row ['gross'];
      $EPF_employee = $row['epf_employee'];
      $SOCSO_employee = $row['socso_emp'];
      $EIS_employee = $row['eis_emp'];
      $Total_Deduction = $row['tot_deductions'];
      $Total_Salary = $row['total_salary'];
      $Date = $row['date_keyin'];
}

?>

<html>
<head>
</head>
<body>
<div class="container">
	

<form action="" method="POST">
<h3>Details</h3>
<div class="form-group" >
	ID :<input type="text" value="<?php echo $ID ; ?>" >
</div>
<div class="form-group" >
	Name :<input type="text" value="<?php echo $Name ; ?>" >
</div>
<div class="form-group" >
	EPF Number : <input type="text" value="<?php echo $EPF ; ?>" >
</div>
<div class="form-group" >
	Month :<input type="text" value="<?php echo $Month ; ?>" >
</div>
<div class="form-group" >
	Year :<input type="text" value="<?php echo $Year ; ?>" >
</div>
<h3>Gross Section </h3>
<div class="form-group" >
	Number of Days :<input type="text" value="<?php echo $Days ; ?>" >
</div>

<div class="form-group" >
	Basic Salary :<input type="text" value="<?php echo $Basic ; ?>" >
</div>
<div class="form-group" >
	Overtime Salary :<input type="text" value="<?php echo $OverTime ; ?>" >
</div>
<div class="form-group" >
	Gross Salary :<input type="text" value="<?php echo $Gross ; ?>" >
</div>
<h3>Deduction </h3>
<div class="form-group" >
	Employee EPF :<input type="text" value="<?php echo $EPF_employee ; ?>" >
</div>
<div class="form-group" >
	Employee SOCSO :<input type="text" value="<?php echo $SOCSO_employee ; ?>" >
</div>
<div class="form-group" >
	Employee EIS :<input type="text" value="<?php echo $EIS_employee ; ?>" >
</div>
<h3>Total Addition/Deduction </h3>
<div class="form-group" >
	Total Deduction :<input type="text" value="<?php echo $Total_Deduction ; ?>" >
</div>
<div class="form-group" >
	Total Salary :<input type="text" value="<?php echo $Total_Salary ; ?>" >
</div>
<div class="footer" >
	Date Print<input type="text" value="<?php echo $Date ; ?>" >
</div>



</form>
</div>
</body>
</html>



<?php




?>