<?php
session_start();

if(!isset($_SESSION["empname"])  ) {
header("Location:login.php"); 
}
if($_SESSION["level"]!="staff"){
  header("Location:login.php");
}

require_once 'database.php';
$sql = "SELECT empid,empname,designation,department,annual,medical,special FROM employee where empname='".$_SESSION['empname']."' " ;
$result=mysqli_query($conn,$sql);
while ($row=mysqli_fetch_array($result)){

    $name= $row['empname'];
    $id= $row['empid'];
    $design = $row['designation'];
    $dept = $row['department'];
    
    $annual = $row['annual'];
    $medical = $row['medical'];
    $special = $row['special'];
}




if(isset($_POST['submit'])) {
$name = mysqli_real_escape_string($conn,$_POST['nama']);
$title = mysqli_real_escape_string($conn,$_POST['jawatan']);
$dept = mysqli_real_escape_string($conn,$_POST['department']);
$empID = mysqli_real_escape_string($conn,$_POST['empid']);
$leavereq = mysqli_real_escape_string($conn,$_POST['Leave']) ;
$before = mysqli_real_escape_string($conn,$_POST['start_date']);
$after = mysqli_real_escape_string($conn,$_POST['end_date']);

$days = mysqli_real_escape_string($conn,$_POST['hari']);
$current_date = date("Y-m-d");
$remarks = mysqli_real_escape_string($conn,$_POST['remarks']);
$approval = '0' ;
if($leavereq === 'Maternity Leave' )
{
    $limit = '90' ;
    if($days>$limit)
    {
        $warning="Limit exceeded.Please re-select";
        echo "<script type='text/javascript'> alert('$warning'); </script>";
    }
    elseif($days<=$limit)
    {
        $query ="INSERT into cuti (Name,Title,Dept,EmpID,Request,AppliedDate,DateBefore,DateAfter,NumDays,Approval,Remarks) VALUES ('$name','$title','$dept','$empID','$leavereq','$current_date','$before','$after','$days','$approval','$remarks') " ;
        mysqli_query($conn,$query);
        header('Location:approvalcutistaff.html');
 
    }
    else
    {
        $error = "An error occured.Please refresh your browser and try again.";
        echo $error;
    }
}
elseif($leavereq === 'Annual Leave')
{
    $limit = '8';
     if($days>$limit)
    {
        $warning="Limit exceeded.Please re-select";
        echo "<script type='text/javascript'> alert('$warning'); </script>";
    }
    elseif($days<=$limit)
    {
                    
            $updateleave = $annual - $days ;
            if($updateleave<=$annual && $annual>'0')
            {
            $sql = "UPDATE employee SET  annual='$updateleave'  where empname='".$_SESSION['empname']."' " ;
            mysqli_query($conn,$sql);
             $query ="INSERT into cuti (Name,Title,Dept,EmpID,Request,AppliedDate,DateBefore,DateAfter,NumDays,Approval,Remarks) VALUES ('$name','$title','$dept','$empID','$leavereq','$current_date','$before','$after','$days','$approval','$remarks') " ;
        mysqli_query($conn,$query);
        header('Location:approvalcutistaff.html');
           }
           else
           {
            $offlimit = "Your leave has reached the limit.Please select other type of leave whenever possible.";
            echo "<script type='text/javascript'> alert('$offlimit'); </script> ";
            
           }
    }
     else
    {
        $error = "An error occured.Please try again.";
        echo $error;
    }
}

elseif($leavereq === 'Medical Leave' )
{
    $limit = '14';
     if($days>$limit)
    {
        $warning="Limit exceeded.Please re-select";
        echo "<script type='text/javascript'> alert('$warning'); </script>";
    }
    elseif($days<=$limit)
    {
        
            $updateleave = $medical - $days ;
             if($updateleave<=$medical && $medical>'0')
            {
            $sql = "UPDATE employee SET medical='$updateleave'  where empname='".$_SESSION['empname']."' " ;
            mysqli_query($conn,$sql);
             $query ="INSERT into cuti (Name,Title,Dept,EmpID,Request,AppliedDate,DateBefore,DateAfter,NumDays,Approval,Remarks) VALUES ('$name','$title','$dept','$empID','$leavereq','$current_date','$before','$after','$days','$approval','$remarks') " ;
        mysqli_query($conn,$query);
        header('Location:approvalcutistaff.html');
            }
            else
           {
            $offlimit = "Your leave has reached the limit.Please select other type of leave whenever possible.";
            echo "<script type='text/javascript'> alert('$offlimit'); </script> ";
            
           }

    }
     else
    {
        $error = "An error occured.Please try again.";
        echo $error;
    }
}
elseif($leavereq === 'Special Leave' )
{
        $limit = '3';
     if($days>$limit)
    {
        $warning="Limit exceeded.Please re-select";
        echo "<script type='text/javascript'> alert('$warning'); </script>";
    }
    elseif($days<=$limit)
    {
        
            $updateleave = $special - $days ;
            if($updateleave<=$special && $special>'0')
            {
            $sql = "UPDATE employee SET special='$updateleave'  where empname='".$_SESSION['empname']."' " ;
            mysqli_query($conn,$sql);
             $query ="INSERT into cuti (Name,Title,Dept,EmpID,Request,AppliedDate,DateBefore,DateAfter,NumDays,Approval,Remarks) VALUES ('$name','$title','$dept','$empID','$leavereq','$current_date','$before','$after','$days','$approval','$remarks') " ;
        mysqli_query($conn,$query);
        header('Location:approvalcutistaff.html');
            }
            else
            {
                $offlimit = "Your leave has reached the limit.Please select other type of leave whenever possible.";
                echo "<script type='text/javascript'> alert('$offlimit'); </script> ";
            }
    
}

else
{
    echo "The leave type is not valid!";
}



}

}


?>




<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    
var gon = {};
gon["holiday"] = "2018-04-01,2018-04-02,2018-04-11".split(",");

// 2 helper functions - moment.js is 35K minified so overkill in my opinion
function pad(num) { return ("0" + num).slice(-2); }
function formatDate(date) { var d = new Date(date), dArr = [d.getFullYear(), pad(d.getMonth() + 1), pad(d.getDate())];return dArr.join('-');}

function calculateDays(first,last) {
  var aDay = 24 * 60 * 60 * 1000,
  daysDiff = parseInt((last.getTime()-first.getTime())/aDay,10)+1;

  if (daysDiff>0) {  
    for (var i = first.getTime(), lst = last.getTime(); i <= lst; i += aDay) {
      var d = new Date(i);
      if (d.getDay() == 6 || d.getDay() == 0 // weekend
      || gon.holiday.indexOf(formatDate(d)) != -1) {
          daysDiff--;
      }
    }
  }
  return daysDiff;
}

// ONLY using jQuery here because OP already used it. I use 1.11 so IE8+

function calc() {
  
var start_date = new Date(document.getElementById("start_date").value);
var end_date = new Date(document.getElementById("end_date").value);

    var days = calculateDays(start_date,end_date);
                              
    if (days <= 0) {
      alert("Please enter an end date after the begin date");
    }
    else {
      //alert(days +" working days found");
    }
    return days;
}


function cal(){
if(document.getElementById("end_date")){
document.getElementById("hari").value=calc();
        }  
        
    }

</script>
<script type="text/javascript">
$(function(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;
    $('#start_date').attr('min', maxDate);
    $('#end_date').attr('min', maxDate);    
    $('#somedate').attr('max', maxDate);
});

</script>
<style>
<style type="text/css">
.form-style-1 {
    margin:10px auto;
    max-width: 400px;
    padding: 20px 12px 10px 20px;
    font: 13px "Lucida Sans Unicode", "Lucida Grande", sans-serif;
}
.form-style-1 li {
    padding: 0;
    display: block;
    list-style: none;
    margin: 10px 0 0 0;
}
.form-style-1 label{
    margin:0 0 3px 0;
    padding:0px;
    display:block;
    font-weight: bold;
}
.form-style-1 input[type=text], 
.form-style-1 input[type=date],
.form-style-1 input[type=datetime],
.form-style-1 input[type=number],
.form-style-1 input[type=search],
.form-style-1 input[type=time],
.form-style-1 input[type=url],
.form-style-1 input[type=email],
textarea, 
select{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    border:1px solid #BEBEBE;
    padding: 7px;
    margin:0px;
    -webkit-transition: all 0.30s ease-in-out;
    -moz-transition: all 0.30s ease-in-out;
    -ms-transition: all 0.30s ease-in-out;
    -o-transition: all 0.30s ease-in-out;
    outline: none;  
}
.form-style-1 input[type=text]:focus, 
.form-style-1 input[type=date]:focus,
.form-style-1 input[type=datetime]:focus,
.form-style-1 input[type=number]:focus,
.form-style-1 input[type=search]:focus,
.form-style-1 input[type=time]:focus,
.form-style-1 input[type=url]:focus,
.form-style-1 input[type=email]:focus,
.form-style-1 textarea:focus, 
.form-style-1 select:focus{
    -moz-box-shadow: 0 0 8px #88D5E9;
    -webkit-box-shadow: 0 0 8px #88D5E9;
    box-shadow: 0 0 8px #88D5E9;
    border: 1px solid #88D5E9;
}
.form-style-1 .field-divided{
    width: 49%;
}

.form-style-1 .field-long{
    width: 100%;
}
.form-style-1 .field-select{
    width: 100%;
}
.form-style-1 .field-textarea{
    height: 100px;
}
.form-style-1 input[type=submit], .form-style-1 input[type=button]{
    background: #4B99AD;
    padding: 8px 15px 8px 15px;
    border: none;
    color: #fff;
}
.form-style-1 input[type=submit]:hover, .form-style-1 input[type=button]:hover{
    background: #4691A4;
    box-shadow:none;
    -moz-box-shadow:none;
    -webkit-box-shadow:none;
}
.form-style-1 .required{
    color:red;
}
</style>
</style>

</head>    
<body>


<div class="container-fluid">
<form method="POST" action="">   
<h1>LEAVE APPLICATION </h1> 
<span>Please fill in the particular details </span>

<ul class="form-style-1">
<li>
<label>
Full Name <span class="required">*</span>
</label>
<input type="text" name="nama" class="field-divided" placeholder="Name"  value='<?php echo $name ;    ?>'/>&nbsp;
</li>
<li>
<label>Designation <span class="required">*</span></label>
<input type="text" name="jawatan" placeholder="Designation" value='<?php echo $design ;    ?>'> <br>
</li>

<label>Department <span class="required">*</span></label>
<input type="text" name="department" placeholder="Department" value='<?php echo $dept ;    ?>'> <br>
</li>

<label>Employee Number  <span class="required">*</span></label>
<input type="text" name="empid" placeholder="EmployeeID" value='<?php echo $id ; ?> ' /> <br>
</li>
<li>
<label>Type of Leave</label>
<select id="leave" name="Leave" class="field-select" onchange="leaveChange()">
    <option value="Annual Leave">Annual Leave</option>
    <option value="Maternity Leave">Maternity Leave</option>
    <option value="No Pay Leave">No Pay Leave</option>
    <option value="Advance Leave">Advance Leave</option>
    <option value="Special Leave">Special/Compassionate Leave</option>
    <option value="Medical Leave">Medical Leave</option>
    </select>
    </li>
   <label>
<span>Date of Intended Leave </span> <br>
FROM<input type="date" name="start_date"  id="start_date"  onchange="cal()"  > 
TO<input type="date" name="end_date" id="end_date"  onchange="cal()" > 
</label>
<label>
<span>Number of Days </span>
<input type="number"  id="hari" name="hari" min="1" max="99"> <br>
</label>
<label>
<span>Available Days </span>
<input type="number"  id="available" name="available" min="1" max="99" value=''  > <br>

</label>
<div id="output" > </div>
<label>Remarks<span class="required">*</span></label>
<input type="text" name="remarks" placeholder="Remarks"  /> <br>

<li>
<input type="submit" value="Submit" name="submit" />
</li>
</ul>
</form>
</div>
</body>
</html>
<script type="text/javascript">
    function leaveChange() 
    {
        var leaveType=document.getElementById("leave").value;
        if(leaveType == 'Annual Leave')
        {
        $.ajax({    //create an ajax request to display.php
        type: "POST",
        url: "leavebalance.php",             
        data: "leaveType",   //expect html to be returned                
        success: function(response){                    
            document.getElementById("available").value = response ;
            
        },
        error : function(jqXHR,textStatus,errorThrown){
            console.log(textStatus,errorThrown);
        }
        });
        }
        else if(leaveType == 'Medical Leave')
        {
        $.ajax({    //create an ajax request to display.php
        type: "POST",
        url: "leavebalance.php",             
        data: "leaveType",   //expect html to be returned                
        success: function(response){                    
              document.getElementById("available").value = response ;
            
        },
        error : function(jqXHR,textStatus,errorThrown){
            console.log(textStatus,errorThrown);
        }
        });
        }    
        else if(leaveType == 'Special Leave')
        {
        $.ajax({    //create an ajax request to display.php
        type: "POST",
        url: "leavebalance.php",             
        data: "leaveType",   //expect html to be returned                
        success: function(response){                    
            document.getElementById("available").value = response ;
            
        },
        error : function(jqXHR,textStatus,errorThrown){
            console.log(textStatus,errorThrown);
        }
        });
        }
    }
 

</script>