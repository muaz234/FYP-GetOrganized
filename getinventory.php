

<?php

require_once 'database.php';

if(isset($_GET['submit'])) 
{
$id = $_GET['id'];

//$item = mysqli_real_escape_string($conn,$_POST['item']);
date_default_timezone_set("Asia/Kuala_Lumpur");
$record_date = date('Y-m-d');

$quantity = mysqli_real_escape_string($conn,$_GET['quantity']);
//$remarks = mysqli_real_escape_string($conn,$_POST['remarks']);
/*$image=$_FILES['pic']['name'];
$target="images/".basename($image);
*/
//$sql = "UPDATE inventory SET item = '$item' , image = '$image' , quantity = '$quantity' , remarks = '$remarks' WHERE  id='$id'  " ;

$query="SELECT item,remarks,count1,count2,date1,date2 FROM inventory WHERE id= '$id' " ;
$statement=mysqli_query($conn,$query);
//$test = mysqli_num_rows($statement);
//echo $test;
//$col = mysqli_fetch_assoc($statement);
while($row=mysqli_fetch_array($statement))
{

    $item = $row['item'];
    $remarks = $row['remarks'];
    $first = $row['count1'];
    $second = $row['count2'];
    $date1= $row['date1'];
    $date2 = $row['date2'];
}

          if(empty($first) || $first == '0')
          {
              $sql = "UPDATE inventory SET count1='$quantity' , date1='$record_date'   WHERE id=$id";
             $result = mysqli_query($conn,$sql) ;
             if($result) 
              {
                echo  "<script type='javascript' alert('Updated Sucessfully') ></script> " ;
                header("refresh:0; url=viewinventory.php");
              } 
          }
                else if(empty($second) || $second == '0')
              {
                  $sql = "UPDATE inventory SET count2='$quantity' , date2='$record_date'   WHERE id=$id";
                 $result = mysqli_query($conn,$sql) ;
                 if($result) 
                  {
                    echo "<script type='javascript' alert('Updated Sucessfully') ></script> " ;
                    header("refresh:0; url=viewinventory.php");
                  }
              }
                    else if(strtotime($date1) > strtotime($date2) || strtotime($date1) < strtotime($record_date)  )
                    {
                         $swap = "UPDATE inventory SET count2='$first' , date2='$date1'   WHERE id=$id";
                        $affected = mysqli_query($conn,$swap) ;
                        $sql = "UPDATE inventory SET count1='$quantity' , date1='$record_date'   WHERE id=$id";
                        $result = mysqli_query($conn,$sql) ;
                        if($affected) 
                        {
                          if($result)
                              {
                        echo  "<script type='javascript' alert('Updated Sucessfully') ></script> " ;
                        header("refresh:0; url=viewinventory.php");
                              }    
                        } 
                    }
                           else if(strtotime($date2) > strtotime($date1) || strtotime($date2) < strtotime($record_date)  )
                          {
                             $swap = "UPDATE inventory SET count1='$second' , date1='$date2'   WHERE id=$id";
                              $affected = mysqli_query($conn,$swap) ;
                              $sql = "UPDATE inventory SET count2='$quantity' , date2='$record_date'   WHERE id=$id";
                             $result = mysqli_query($conn,$sql) ;
                             if($affected)
                             {
                                if($result) 
                                  {
                                    echo  "<script type='javascript' alert('Updated Sucessfully') ></script> " ;
                                    header("refresh:0; url=viewinventory.php");
                                  }
                            } 
                          }
                else
                  {

                      echo "<script type='javascript' alert('Both Dates are the same.Please update the inventory on next day onwards')></script> ";

                  } 


}



?>


