
<?php
require_once 'database.php';
if(isset($_POST['process'] ))
{
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $id = mysqli_real_escape_string($conn,$_POST['empid']);
    $epf_reference = mysqli_real_escape_string($conn,$_POST['epfnum']);
    $month = mysqli_real_escape_string($conn,$_POST['month']);
    $year = mysqli_real_escape_string($conn,$_POST['year']);
    $days = mysqli_real_escape_string($conn,$_POST['days']);
    $basic = mysqli_real_escape_string($conn,$_POST['basic']);
    $overtime = mysqli_real_escape_string($conn,$_POST['OT']);
    $gross = mysqli_real_escape_string($conn,$_POST['gross']);
    $epf_employee = mysqli_real_escape_string($conn,$_POST['epf_employee']);
    $epf_employer = mysqli_real_escape_string($conn,$_POST['epf_employer']);
    $socso_employee = mysqli_real_escape_string($conn,$_POST['socso_employee']);
    $socso_employer = mysqli_real_escape_string($conn,$_POST['socso_employer']);
    $eis_employee = mysqli_real_escape_string($conn,$_POST['eis_employee']);
    $eis_employer = mysqli_real_escape_string($conn,$_POST['eis_employer']);
    $allowance = mysqli_real_escape_string($conn,$_POST['allowance_count']);
    $deduct = mysqli_real_escape_string($conn,$_POST['count_deduction']);
    $totalallowance = mysqli_real_escape_string($conn,$_POST['total_allow']);
    $totaldeduction = mysqli_real_escape_string($conn,$_POST['total_deduction']);
    $totalsalary = mysqli_real_escape_string($conn,$_POST['total_salary_final']);
    $date=date("Y-m-d");
    $approval = "Disapprove";

    echo $name;
    echo $id;
    echo $basic;
    echo $epf_employee ;
    echo $totaldeduction ;
    echo $approval ;

    $sql = "INSERT INTO salary (empname,empid,epfnum,month,year,days,basic,ot,gross,epf_employee,epf_employer,
            socso_emp,socso_com,eis_emp,eis_com,allowances,tot_deduction,tot_allowance,tot_deductions,total_salary,
             date_keyin,ApproveStatus) VALUES ('$name' , '$id' , '$epf_reference' , '$month' , '$year' , '$days' , '$basic' , '$overtime' , 
             '$gross','$epf_employee','$epf_employer','$socso_employee','$socso_employer','$eis_employee','$eis_employer','$allowance','$deduct'
             ,'$totalallowance','$totaldeduction','$totalsalary','$date','$approval') " ;
    $result=mysqli_query($conn,$sql);
    if($result)
    {
        echo "Success";
    }
    else
    {
        echo "apa nak jadi niiii!!!!!!";
    }

}
else
{
    echo "An error occured.";
}


?>