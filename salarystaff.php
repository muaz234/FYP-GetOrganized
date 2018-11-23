
<html>
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script
  			  src="https://code.jquery.com/jquery-3.3.1.js"
  			  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  			  crossorigin="anonymous"></script>


    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>

  <!------ Include the above in your HEAD tag ---------->

  <script>
  $(document).on('change','#emp_id',  function() {
  var  ID = $('#emp_id').val();
console.log(ID)  ;
  $.ajax({


    data : { empid: ID },
    type : "POST",
    url : 'selectemp.php',
    dataType : "json",
    success : function(data) {
      console.log(data);

      for (var ID in data) {
        $('#name').val(data.name);
        $('#epfnum').val(data.epfnum);
        //$('.place').val(data.place);
      }
    }
  });
});
</script>
<style>
body {
    background-color: #d1f4ff;
}
body{
    margin-top:40px;
}

.stepwizard-step p {
    margin-top: 10px;
}

.stepwizard-row {
    display: table-row;
}

.stepwizard {
    display: table;
    width: 100%;
    position: relative;
}

.stepwizard-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
}

.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-order: 0;

}

.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}

.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
}
#month { margin-left: 10px; }
 #year { margin-left: 50px; }
</style>
<script>
$(document).ready(function () {

    var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-primary').trigger('click');
});
</script>
<script type="text/javascript"   >

function Generate()
{
var days= document.getElementById("days").value;

var basic = days * 38.46 ;
var overtime = days * 7.2 * 3 ;
//document.getElementById("overtime").value= overtime;

if(days> 26)
{
	var limitbasic = basic - 1000.00;
	var basic = 1000.00;
	var extradays = days - 26 ;
	var additionaldays = extradays * (7.20 * 11);
	var over = overtime + additionaldays + limitbasic ;

  document.getElementById('OverTime').value= over.toFixed(2);

}
else if(days<26)
{
var over = days * 7.2 * 3 ;
document.getElementById('OverTime').value= over.toFixed(2);
}

else if(days == 26)
{

	var basic = 1000.00 ;
	parseFloat(basic);

  var totalgross = basic + overtime ;

}
var totalgross = parseFloat(basic + overtime) ;
document.getElementById("basic").value= parseFloat(basic).toFixed(2) ;
document.getElementById('OverTime').value= overtime.toFixed(2);

document.getElementById("total_gross").value = totalgross.toFixed(2);
var countEPF = EPF();
document.getElementById("epf").value = parseFloat(countEPF[0]).toFixed(2) ;
document.getElementById("epf_emp").value = parseFloat(countEPF[1]).toFixed(2)	;


var countsocso = SOCSO(totalgross);
document.getElementById("socso_emp").value = parseFloat(countsocso[0]).toFixed(2) ;
document.getElementById("socso_company").value = parseFloat(countsocso[1]).toFixed(2) ;


var counteis = EIS(totalgross);
document.getElementById("eis_emp").value = parseFloat(counteis[0]).toFixed(2) ;
document.getElementById("eis_company").value = parseFloat(counteis[1]).toFixed(2) ;

var count_deduction = parseFloat(countEPF[0]) + parseFloat(countsocso[0]) + parseFloat(counteis[0]) ;

document.getElementById("total_deduction").value = count_deduction ;
document.getElementById("total_deduct").value = count_deduction ;
document.getElementById("total_allowance").value = allowance ;
var countallowances = totalallowances();
document.getElementById("total_allowance").value = parseFloat(countallowances).toFixed(2) ;


var final = totalgross - count_deduction ;
console.log(final) ;
return final ;
}
function finalcalculation(final)
{
  var sum_allowance = totalallowances() ;
  var final = Generate()  ;
  console.log(sum_allowance);
  console.log(final);
  allowance_float = parseFloat(sum_allowance);
  final_salary_float = parseFloat(final);
  var finalsalary = allowance_float + final_salary_float ;
  document.getElementById("total_salary").value = parseFloat(finalsalary).toFixed(2) ;
}
function EPF()
{
var epf_emp = 110.00;
var epf_company = 130.00;
var epf =[epf_emp,epf_company];
return epf;
}

function totalallowances()
{
  var allowance = document.getElementById("allowance").value;
  return allowance ;
}

function SOCSO(totalgross)
{

 var socso_company;
 var socso_emp;


 if(totalgross> 1400.00 && totalgross <= 1500.00 )
 {
 		socso_emp = 7.25 ;
 		socso_company = 18.10 ;

 }
else if(totalgross>1500.00 && totalgross <= 1600.00)
{
		socso_emp = 7.75 ;
 		socso_company = 19.40;

}
else if(totalgross> 1600.00 && totalgross <= 1700.00 )
{
		socso_emp = 8.25 ;
 		socso_company =  20.60 ;

}
else if(totalgross> 1700.00 && totalgross <= 1800.00 )
{
		socso_emp = 8.75 ;
 		socso_company =  21.90 ;

}
else if(totalgross> 1800.00 && totalgross <= 1900.00 )
{
		socso_emp = 9.25 ;
 		socso_company = 23.10 ;

}
else if(totalgross> 1900.00 && totalgross <= 2000.00 )
{
		socso_emp = 9.75 ;
 		socso_company =  24.40 ;

}
else
{
	console.log("An error occured;");
}
var socso=[socso_emp,socso_company];
return socso ;
}
function EIS(totalgross)
{
var eis_company;
 var eis_emp;
 if(totalgross> 1400.00 && totalgross <= 1500.00 )
 {
 		eis_emp = 2.90 ;
 		eis_company =  2.90 ;

 }
else if(totalgross> 1500.00 && totalgross <= 1600.00  )
{
		eis_emp = 3.10 ;
 		eis_company = 3.10 ;

}
else if(totalgross> 1600.00 && totalgross <= 1700.00 )
{
		eis_emp = 3.30 ;
 		eis_company = 3.30 ;

}
else if(totalgross> 1700.00 && totalgross <= 1800.00 )
{
		eis_emp = 3.50 ;
 		eis_company = 3.50 ;

}
else if(totalgross> 1800.00 && totalgross <= 1900.00 )
{
		eis_emp = 3.70 ;
 		eis_company = 3.70 ;

}
else if(totalgross> 1900.00 && totalgross <= 2000.00 )
{
		eis_emp = 3.90 ;
 		eis_company = 3.90 ;

}
else
{
	console.log("An error occured;");
}
var eis=[eis_emp,eis_company];
return eis;
}




 </script>
</head>
<body>
  <div class="modal fade" id="salarymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
           <div class="modal-dialog" role="document">
               <div class="modal-content">
                   <div class="modal-header">
                       <h5 class="modal-title" id="exampleModalLabel">Submitted</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                           </button>
                   </div>
                       <div class="modal-body" id="body">
                           <h2>Salary has been sent to manager for approval process. </h2>

                               <p> </p>
                       </div>
                           <div class="modal-footer">
                               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                   <a type="link" class="btn btn-primary" href="indexdua.php" > Dismiss </a>
                           </div>
               </div>
           </div>
       </div>


<div class="container">
<div class="stepwizard">
    <div class="stepwizard-row setup-panel">
        <div class="stepwizard-step">
            <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
            <p>Step 1:Personal Information</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
            <p>Step 2:Basic Calculation</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
            <p>Step 3:Deduction</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-4" type="button" class="btn btn-primary btn-circle" disabled="disabled">4</a>
            <p>Step 4:Nett Salary</p>
        </div>
    </div>
</div>
<form role="form" action="" method="POST">
    <div class="row setup-content" id="step-1">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Personal Information</h3>
                <div class="form-group">
                    <label for="validate-optional">Employee ID</label>
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        <input type="text" class="form-control" name="empid" id="emp_id" placeholder="ID" style="width:500px;" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="validate-text">Name</label>
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Employee Name" style="width:500px;" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="validate-optional">EPF Number</label>
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        <input type="text" class="form-control" name="epfnum" id="epfnum" placeholder="EPF" style="width:500px;" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="validate-select">Month</label>
                    <div class="input-group">
                        <select class="form-control" name="month" id="month" placeholder="Month" style="max-width:40%" required>
                            <option value="">Select Month</option>
                            <option value="January">January</option>
                            <option value="February">February</option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="June">June</option>
                            <option value="July">July</option>
                            <option value="August">August</option>
                            <option value="September">September</option>
                            <option value="October">October</option>
                            <option value="November">November</option>
                            <option value="December">December</option>
                        </select>
                        <select class="form-control" name="year" id="year" placeholder="Year" style="max-width:40%" required>
                            <option value="">Select Year</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                        </select>
             </div>
                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
            </div>
        </div>
    </div>
  </div>
    <div class="row setup-content" id="step-2">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Gross Salary</h3>
                <div class="form-group">
                    <label for="validate-text">Number of Days</label>
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        <input type="text" class="form-control" name="days" id="days" placeholder="Days of work" style="width:500px;" onchange="Generate()" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="validate-optional">Basic Salary</label>
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        <input type="text" class="form-control" name="basic" id="basic" style="width:500px;" placeholder="Basic">
                    </div>
                </div>
                <div class="form-group">
                    <label for="validate-optional">Over Time</label>
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        <input type="text" class="form-control" name="OT" id="OverTime" style="width:500px;" placeholder="Overtime" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="validate-optional">Gross Salary</label>
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        <input type="text" class="form-control" name="gross" id="total_gross" style="width:500px;"  placeholder="Gross Salary" >
                    </div>
                </div>

                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
            </div>
        </div>
    </div>
    <div class="row setup-content" id="step-3">
        <div class="col-xs-15">
            <div class="col-md-15">
                <h3> Addition/Deduction </h3>
                <div class="form-group">
                    <label for="validate-text">EPF Amount</label>
                    <div class="input-group">
                  <!--  <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span> -->
                  <p align="left">Employee</p>
                <input type="text" class="form-control" name="epf_employee" id="epf" placeholder="EPF" style="width:500px;"  readonly>
                  <p align ="left">Employer </p>
                <input type="text" class="form-control" name="epf_employer" id="epf_emp" placeholder="EPF Company" style="width:500px;" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="validate-optional">SOCSO Amount</label>
                    <div class="input-group">
                        <!--<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>  -->
                        <p align="left">Employee</p>
                        <input type="text" class="form-control" name="socso_employee" id="socso_emp" placeholder="SOCSO" style="width:500px;" readonly>
                        <p align ="left">Employer </p>
                        <input type="text" class="form-control" name="socso_employer" id="socso_company" placeholder="SOCSO Company" style="width:500px;" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="validate-optional">EIS Amount</label>
                    <div class="input-group">
                      <!--  <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span> -->
                          <p align="left">Employee</p>
                        <input type="text" class="form-control" name="eis_employee" id="eis_emp" placeholder="EIS" style="width:500px;" readonly>
                          <p align="left">Employer</p>
                        <input type="text" class="form-control" name="eis_employer" id="eis_company" placeholder="EIS Company" style="width:500px;" readonly>
                    </div>
                </div>
                 <div class="form-group">
                    <label for="validate-optional">Allowances</label>
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        <input type="text" class="form-control" name="allowance_count" id="allowance" style="width:500px;" placeholder="Allowances" onchange="totalallowances()" >
                    </div>
                </div>
                 <div class="form-group">
                    <label for="validate-optional">Total Deductions</label>
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        <input type="text" class="form-control" name="count_deduction" id="total_deduction" style="width:500px;" placeholder="Total Deductions" readonly>
                    </div>
                </div>
                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" onclick="finalcalculation()" >Next</button>
            </div>
        </div>
    </div>
    <div class="row setup-content" id="step-4">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Final Page </h3>
                <div class="form-group">
                    <label for="validate-text">Allowances</label>
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        <input type="text" class="form-control" name="total_allow" id="total_allowance" style="width:500px;" placeholder="Total Allowance" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="validate-optional">Deductions</label>
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        <input type="text" class="form-control" name="total_deduction" id="total_deduct" style="width:500px;" placeholder="Deduction" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="validate-optional">Nett Salary</label>
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        <input type="text" class="form-control" name="total_salary_final" id="total_salary" style="width:500px;" placeholder="Total Salary" readonly>
                    </div>
                </div>

                <input type="submit" class="btn btn-info btn-lg pull-right" name="process" value="Submit" onclick="Generate()" >
            </div>
        </div>
    </div>
</form>
</div>

</body>
</html>







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
    $approval = "Pending Approval";


    $sql = "INSERT INTO salary (empname,empid,epfnum,month,year,days,basic,ot,gross,epf_employee,epf_employer,
            socso_emp,socso_com,eis_emp,eis_com,allowances,tot_deduction,tot_allowance,tot_deductions,total_salary,
             date_keyin,ApproveStatus) VALUES ('$name' , '$id' , '$epf_reference' , '$month' , '$year' , '$days' , '$basic' , '$overtime' ,
             '$gross','$epf_employee','$epf_employer','$socso_employee','$socso_employer','$eis_employee','$eis_employer','$allowance','$deduct'
             ,'$totalallowance','$totaldeduction','$totalsalary','$date','$approval') " ;
    $result=mysqli_query($conn,$sql);
    if($result)
    {
      ?>

<script type="text/javascript">
$(document).ready(function() {
$('#salarymodal').modal('show'); //twitter bootstrap modal


});
</script>


<?php
    }


}


?>
