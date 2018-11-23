 

 <html>
<head>
<title>Request Inventory </title>
<style>
* {
    box-sizing: border-box;
}
.header {
    background-color: #F1F1F1;
    text-align: center;
    padding: 20px;
}
input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
}

label {
    padding: 12px 12px 12px 0;
    display: inline-block;
}

input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float: center;
    align: right;
}

input[type=submit]:hover {
    background-color: #45a049;
}

.container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}

.col-25 {
    float: left;
    width: 25%;
    margin-top: 6px;
}

.col-75 {
    float: left;
    width: 75%;
    margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media (max-width: 600px) {
    .col-25, .col-75, input[type=submit] {
        width: 100%;
        margin-top: 0;
    }
}
</style>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
<div class="container">
<form action="" method="POST" enctype="multipart/form-data">
<div class="header">
<h1>Request an item </h1>
</div>
<br>
<br>
<div class="row">
<div class="col-25">
<label for="item">Item</label>
</div> 
 <div class="col-25">
<select  type="dropdown" name="item" placeholder="Item details"> <br>
<option value="Torch Light" >Torch Light </option>
<option value="Rain Coat" > Rain Coat</option>
<option value="Walkie Talkie" > Walkie Talkie</option>
<option value="Logbook Items" > Logbook Item</option>
</select>
</div>
</div>
<br>


<div class="row">
<div class="col-25">
<label for="quantity">Quantity</label>
</div> 

<div class="col-25">
<input type="number" name="quantity" placeholder="Quantity"> <br>
</div>
</div>
<div class="row">
<input type="submit" value="submit"  name="submit" style="float:right;" >
</div>
</form>
</div>
</body>
</html>


<?php
require_once 'database.php' ;
date_default_timezone_set("Asia/Kuala_Lumpur");

if(isset($_POST['submit']))
{
    $item = mysqli_real_escape_string($conn,$_POST['item']);
    $quantity = mysqli_real_escape_string($conn,$_POST['quantity']);
    $date =date('Y-m-d');
    $sql = "INSERT INTO checkout (Item,quantity,DateRequest) VALUES ('$item','$quantity','$date') " ;
    $result = mysqli_query($conn,$sql) ;
    
    $query="SELECT item,remarks,count1,count2,date1,date2 FROM inventory WHERE item='$item' " ;
    $statement=mysqli_query($conn,$query);
            while($row=mysqli_fetch_array($statement))
            {

                $item = $row['item'];
                $remarks = $row['remarks'];
                $first = $row['count1'];
                $second = $row['count2'];
                $date1= $row['date1'];
                $date2 = $row['date2'];
            }

            if($second > 0 && strtotime($date1) < strtotime($date2))
            {   
                $updatecount = $second - $quantity ;
                $sql = "UPDATE inventory SET count2='$updatecount' WHERE item='$item' " ;
                $update_query = mysqli_query($conn,$sql) ;
                header("refresh:0; url=viewinventory.php");
            }
    
        else if($first > 0 && strtotime($date2) < strtotime($date1))
        {   
            $updatecount = $first - $quantity ;
            $sql = "UPDATE inventory SET count1='$updatecount' WHERE item='$item' " ;
            $update_query = mysqli_query($conn,$sql) ;
            header("refresh:0; url=viewinventory.php");     
        }
    else
    {
        $error = "Invalid request.Please justify different amount.";
        echo "<script type='text/javascript'> alert('$error'); </script> " ;
    }

}

 
?>
