<!-- <?php

if(isset($POST['submit'])){

$Days = $_POST['days'];
$initial = 38.46;
if($Days== 26){

$basic = $initial * $Days;
echo $basic;
}
else if($Days>26)
{
$basic= $initial * $Days;
echo $basic;
}



}

?>   -->



<html>
<head>
<title>Salary</title>
<body>
<h1> </h1>
<form>
Number of Days: <input type="text" name="days" id="days"  ><br>
Basic : <input type="text" name="basic" ><br>
Basic:<div id="basic" > </div>
Overtime:<div id="overtime"> </div>
Gross: <div id="gross"> </div>
EPF : <div id="epf_emp"> </div>
SOCSO : <div id="socso_emp"> </div>
SOCSO COMPANY: <div id="socso_company"> </div>
EIS : <div id="eis_emp"> </div>
EIS COMPANY: <div id="eis_company"> </div>

OverTime : <input type="text" name="OT" id="OT" ><br>
<!-- nanti aku buat part kira jam utk days>27...count by input days or hours -->
Gross Salary : <input type="text" name="gross" id=""> <br>
EPF : <input type="text" name="epf" id="epf"><br>
SOCSO : <input type="text" name="socso" id="socso"><br>
Allowance : <input type="text" name="allowance" id="allowance"><br>
Deductions : <input type="text" id="deduct"> <br>
<input type="button" name="submit" value="Calculate" onclick="Generate()"> <br>
<input type="reset" name="reset"> 
</form>
</body>	
</head>
</html>

