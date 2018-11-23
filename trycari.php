<html>
<head> 
<title> Search Report </title>

</head>
<body>
	<center>

<form method="post" action=""  >


Branch Number:<select name="brid" id ="branchid"  >

   <option value="102" >Kuala Lumpur </option>
   <option value="103" >Kluang </option>
   <option value="101" >Bukit Mertajam </option>
   <option value="100" >Petaling Jaya </option>
   </select>
   <br>


<input type="submit" value="Search" name="submit" > 
</form>

</body>
</html>


<?php
   if(isset($_POST['submit'])){

     
$id = $_POST['brid'] ;
echo $id ;
}


?>