 <html>
<head>
<title>Add Inventory </title>
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
<h1>Add An Item</h1>
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
<label for="quantity">Quantity Available</label>
</div> 

<div class="col-25">
<input type="number" name="quantity" placeholder="Quantity"> <br>
</div>
</div>
<div class="row">
<div class="col-25">
<label for="remarks">Remarks of Item</label>
</div> 
<div class="col-75">
<input type="textarea" name="remarks" rows="1" cols="30" placeholder="Enter Remarks" style="height:100px"> <br>
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


require_once 'database.php';
date_default_timezone_set("Asia/Kuala_Lumpur");
if(isset($_POST['submit'] )){
//$errors=array();
$item = mysqli_real_escape_string($conn,$_POST['item']);
$quantity = mysqli_real_escape_string($conn,$_POST['quantity']);
$remarks = mysqli_real_escape_string($conn,$_POST['remarks']);
$date =date('Y-m-d');
/*$image=$_FILES['pic']['name'];
$size=$_FILES['pic']['size'];
$tmp=$_FILES['pic']['tmp_name'];
$type=$_FILES['pic']['type'];
$assign = explode('.',$_FILES['pic']['name']);
$extension=end($assign);
$expensions=array("jpeg","jpg","png","JPEG","JPG","PNG");
if(in_array($extension,$expensions)=== false) {
    $errors[]="Filetype not allowed,Please choose a JPEG file.";
}
if($type > 10000000){
    $errors[]="Picture must be less than 10MB size.";
}


$target="images/".basename($image);
if(empty($errors)==true){
    move_uploaded_file($tmp,$target); */
    $sql = "INSERT INTO inventory (item,count1,date1,remarks) VALUES ('$item','$quantity','$date','$remarks') " ;
    $result = mysqli_query($conn,$sql);
if($result) {
    header("refresh:0; url=viewinventory.php");
            }

}





?>



<!--
<div class="row">
<div class="col-25">
<label for="pic">Sample Picture</label>
</div> 
<div class="col-25">
<input type="file" name="pic" placeholder="Choose File"> <br>
</div>
</div>
-->