<?php
require_once 'database.php';



$sql = " SELECT ID,empid,empname,days,basic,ot,gross,epf_employee,socso_emp,
        eis_emp,tot_allowance,tot_deductions,total_salary,ApproveStatus
        FROM salary WHERE month = '$month' AND year = '$year' " ;
$result = mysqli_query($conn,$sql);
echo $result ;



?>
