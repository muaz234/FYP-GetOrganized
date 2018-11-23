<html>
<head>
<title> Leave Approval </title>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<?php
require_once 'database.php';
session_start();

if(isset($_POST['approve'])) {
	$ticked = $_POST["approve"];

	for($i=0; $i<count($ticked); $i++) {
		//echo $ticked[$i];

		$sql=("UPDATE cuti SET Approval='1' WHERE ID = '".$ticked[$i]."' ");
		$test=mysqli_query($conn, $sql);
		if(!$test) {
			echo "Please refresh your browser..";
		}
		else {

		echo "An email will be sent to notify the staff on leave application status." ;

		}
	}
//$type = $_SESSION['leavetype'];

$query="SELECT a.empid,a.annual,a.maternity,a.advance,a.medical,a.special,b.NumDays,b.Approval,b.Request,b.EmpID,b.Name,b.ID
		FROM leave_limit a,cuti b
 		WHERE b.Approval = '1' AND a.empid=b.EmpID ";
$result=mysqli_query($conn,$query);
$numrows = mysqli_num_rows($result);
//echo $numrows ;
while($row=mysqli_fetch_array($result))
{
	$name = $row['Name'];
	$days = $row['NumDays'];
	$leave = $row['Request'];
	$maternity = $row['maternity'];
	$annual = $row['annual']      ;
    $medical = $row['medical']    ;
    $special = $row['special']    ;
}
if($leave == 'Maternity Leave'  && $maternity>0 )
{
	$updateleave = $maternity - $days ;
	if($updateleave>=0)
	{
	//$updatequery = "UPDATE leave_limit SET  maternity='$updateleave'  where empid='".$_SESSION['empid']."' " ;
    $updatequery = "UPDATE leave_limit a JOIN b cuti  on a.empid = b.EmpID SET a.maternity='$updateleave' " ;
    $updated = mysqli_query($conn,$updatequery);
		$counterapproval = "UPDATE cuti SET Approval = '2' ";
		mysqli_query($conn,$counterapproval);
	}
	else
	{
	 $offlimit = "Your leave has reached the limit.Please select other type of leave whenever possible.";
     echo "<script type='text/javascript'> alert('$offlimit'); </script> ";
	}
}

else if($leave == 'Annual Leave'  && $annual>0 )
{
	$updateleave = $annual - $days ;
	if($updateleave>=0)
	{
	//$updatequery = "UPDATE leave_limit SET  annual='$updateleave'  where empid='".$_SESSION['empid']."' " ;
    $updatequery = "UPDATE leave_limit a JOIN cuti b  on a.empid = b.EmpID SET a.annual='$updateleave' " ;
    $updated = mysqli_query($conn,$updatequery);
		$counterapproval = "UPDATE cuti SET Approval = '2' ";
		mysqli_query($conn,$counterapproval);
	}
	else
	{
		  $offlimit = "Your leave has reached the limit.Please select other type of leave whenever possible.";
            echo "<script type='text/javascript'> alert('$offlimit'); </script> ";

	}
}
else if($leave == 'Special Leave'  && $special>0 )
{
	$updateleave = $special - $days ;
	if($updateleave>=0)
	{
	//$updatequery = "UPDATE leave_limit SET  special='$updateleave'  where empid='".$_SESSION['empid']."' " ;
    $updatequery = "UPDATE leave_limit a JOIN cuti b  on a.empid = b.EmpID SET a.special='$updateleave' " ;
    $updated = mysqli_query($conn,$updatequery);
		$counterapproval = "UPDATE cuti SET Approval = '2' ";
		mysqli_query($conn,$counterapproval);
	}
	else
	{
		  $offlimit = "Your leave has reached the limit.Please select other type of leave whenever possible.";
            echo "<script type='text/javascript'> alert('$offlimit'); </script> ";

	}
}
else if($leave == 'Medical Leave'  && $medical>0 )
{
	$updateleave = $medical - $days ;
	if($updateleave>=0)
	{
	//$updatequery = "UPDATE leave_limit SET  medical='$updateleave'  where empid='".$_SESSION['empid']."' " ;
    $updatequery = "UPDATE leave_limit a JOIN cuti b  on a.empid = b.EmpID SET a.medical='$updateleave' " ;
    $updated = mysqli_query($conn,$updatequery);
		$counterapproval = "UPDATE cuti SET Approval = '2' ";
		mysqli_query($conn,$counterapproval);
	}
	else
	{
		  $offlimit = "Your leave has reached the limit.Please select other type of leave whenever possible.";
            echo "<script type='text/javascript'> alert('$offlimit'); </script> ";

	}
}
else
{

		$offlimit = "The leave application is not sucessful.";
		echo "<script type='text/javascript'> alert('$offlimit'); </script> ";
}
/*
$counterapproval = "UPDATE cuti SET Approval = '2' ";

if($updated)
{
mysqli_query($conn,$counterapproval);
}
else
{
			$offlimit = "The leave application is not sucessful.";
            echo "<script type='text/javascript'> alert('$offlimit'); </script> ";

}
*/

}
?>
<br>
<br>

<a href='indexadmin.php' > Back
