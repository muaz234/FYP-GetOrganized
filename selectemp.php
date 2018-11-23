<?php
require_once 'database.php';
if(!empty($_POST['empid']))
{
$id = $_POST['empid'] ;
echo $id ;

$sql = "SELECT empname,epfnum,empid FROM employee WHERE empid='$id' ";
$result = mysqli_query($conn,$sql);
$affected = mysqli_num_rows($result);
echo $affected;
while($row=mysqli_fetch_array($result)){

      $id = $row['empid'];
      $name =$row['empname'];
      $epf = $row['epfnum'];




}

$append = array($name,$epf);
echo json_encode($append);

}
 ?>
