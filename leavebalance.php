<?php
require_once 'database.php';
session_start();
if(!empty($_SESSION["empid"]))
{
	$leave = $_POST['Leave'];
$sql = "SELECT maternity,annual,special,medical,empid FROM leave_limit where empid='". $_SESSION['empid'] . " ' ";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)){

	$maternity = $row['maternity'];
	$annual = $row['annual']      ;
    $medical = $row['medical']    ;
    $special = $row['special']    ;
if($leave == 'Maternity Leave' )
{
	echo $maternity;
}
else if($leave == 'Annual Leave' )
{
	echo $annual; 
}
else if($leave == 'Medical Leave' )
{
	echo $medical; 
}
else if($leave ==  'Special Leave' )
{
	echo $special;
}
else 
{
	$script = "An error occured.";
	echo $script;
}
    

}



}

?>