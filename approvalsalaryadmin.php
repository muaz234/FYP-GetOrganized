
<!DOCTYPE html>
<html lang="en">
<head>
  <script
    src="http://code.jquery.com/jquery-3.3.1.slim.js"
    integrity="sha256-fNXJFIlca05BIO2Y5zh1xrShK3ME+/lYZ0j+ChxX2DA="
    crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <style>
    body {
        background-color: #d1f4ff;
    }
    </style>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>

  <div class="container">
              <h2 align="center" >Employee Salary by Month </h2>

          <br><br>
          <table class="table table-striped">
               <thead>
                    <tr class="info">
                        <th>EmpID</th>
                        <th>Name</th>
                        <th>Days</th>
                        <th>Basic Salary</th>
                        <th>Overtime</th>
                        <th>Gross Salary</th>
                        <th>EPF</th>
                        <th>SOCSO</th>
                        <th>EIS</th>
                        <th>Total Allowances</th>
                        <th>Total Deduction</th>
                        <th>Total Salary</th>
                        <th>Status</th>
                        <th>Action</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

<?php
include_once 'select_salary.php';
require_once 'database.php';

if(isset($month) && isset($year) )
{
//echo $month ;
//echo $year ;
$sql = " SELECT ID,empid,empname,days,basic,ot,gross,epf_employee,socso_emp,
        eis_emp,tot_allowance,tot_deductions,total_salary,ApproveStatus
        FROM salary WHERE month = '$month' AND year = '$year' " ;
//$sql = "SELECT * FROM salary WHERE month=$month AND $year = "
$result = mysqli_query($conn,$sql);
$selected = mysqli_num_rows($result);
//echo $selected ;
}
while($row=mysqli_fetch_array($result))
{

?>
<tr>
<td><?php echo $row['empid'] ; ?> </td>
<td><?php echo $row['empname'] ; ?> </td>
<td><?php echo $row['days'] ; ?> </td>
<td><?php echo $row['basic'] ; ?> </td>
<td><?php echo $row['ot'] ; ?> </td>
<td><?php echo $row['gross'] ; ?> </td>
<td><?php echo $row['epf_employee'] ; ?> </td>
<td><?php echo $row['socso_emp'] ; ?> </td>
<td><?php echo $row['eis_emp'] ; ?> </td>
<td><?php echo $row['tot_allowance'] ; ?> </td>
<td><?php echo $row['tot_deductions'] ; ?> </td>
<td><?php echo $row['total_salary'] ; ?> </td>
<td><?php echo $row['ApproveStatus'] ; ?> </td>
<form action="salarydecision.php"  method="POST" >
      <input type="hidden" name="id" value="<?php echo $row['ID']; ?>" >
<td> <input type="submit" value="Approve" name="update"  > </td>
<td> <input type="submit" value="Print PDF" name="print"  > </td>

</tr>
<?php
}
?>
</tbody>
</table>
</form>
</body>
</div>
</html>
