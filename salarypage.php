<html>
<head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<script
  src="http://code.jquery.com/jquery-3.3.1.slim.js"
  integrity="sha256-fNXJFIlca05BIO2Y5zh1xrShK3ME+/lYZ0j+ChxX2DA="
  crossorigin="anonymous"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<!------ Include the above in your HEAD tag ---------->
<style type="text/css">
    .input-group-addon.primary {
    color: rgb(255, 255, 255);
    background-color: rgb(50, 118, 177);
    border-color: rgb(40, 94, 142);
}
.input-group-addon.success {
    color: rgb(255, 255, 255);
    background-color: rgb(92, 184, 92);
    border-color: rgb(76, 174, 76);
}
.input-group-addon.info {
    color: rgb(255, 255, 255);
    background-color: rgb(57, 179, 215);
    border-color: rgb(38, 154, 188);
}
.input-group-addon.warning {
    color: rgb(255, 255, 255);
    background-color: rgb(240, 173, 78);
    border-color: rgb(238, 162, 54);
}
.input-group-addon.danger {
    color: rgb(255, 255, 255);
    background-color: rgb(217, 83, 79);
    border-color: rgb(212, 63, 58);
}
</style>
<script type="text/javascript" src="salarycount.js" > </script>
<script type="text/javascript">
$(document).ready(function() {
    
    var navListItems = $('ul.setup-panel li a'),
        allWells = $('.setup-content');

    allWells.hide();

    navListItems.click(function(e)
    {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this).closest('li');
        
        if (!$item.hasClass('disabled')) {
            navListItems.closest('li').removeClass('active');
            $item.addClass('active');
            allWells.hide();
            $target.show();
        }
    });
    
    $('ul.setup-panel li.active a').trigger('click');
    
    // DEMO ONLY //
    $('#activate-step-1').on('click', function(e) {
        $("#info").text($(this).attr('id'));
        //$('ul.setup-panel li:eq(1)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-1"]').trigger('click');
        //$(this).remove();
    }) 
    
    $('#activate-step-2').on('click', function(e) {
        $("#info").text($(this).attr('id'));
        //$('ul.setup-panel li:eq(1)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-2"]').trigger('click');
        //$(this).remove();
    })   
    $('#activate-step-tiga').on('click', function(e) {
        $("#info").text($(this).attr('id'));
        //$('ul.setup-panel li:eq(2)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-tiga"]').trigger('click');
        //$(this).remove();
    }) 
    $('#activate-step-empat').on('click', function(e) {
        $("#info").text($(this).attr('id'));
        //$('ul.setup-panel li:eq(3)').removeClass('disabled');
        $('ul.setup-panel li a[href="#step-empat"]').trigger('click');
        //$(this).remove();
    }) 
    $('button').on('click', function(e) {
      $("#info").text($(this).attr('id')) 
      var target = $(this).attr('id').split(':')[1];
       var temp = target.split("-")[1] - 1 ;
       $('ul.setup-panel li:eq(' + temp + ')').removeClass('disabled');
       $('ul.setup-panel li a[href="#' + target + '"]').trigger('click');
    });
});


</script>
</head>
<body>

<form action="getsalary.php" method="POST">
             
<div class="container">
    <div class="row form-group">
        <div class="col-xs-12">
            <ul class="nav nav-pills nav-justified thumbnail setup-panel">
                <li class="active"><a href="#step-1">
                    <h4 class="list-group-item-heading">Personal Information</h4>
                    <p class="list-group-item-text">Employee Information</p>
                </a></li>
                <li class="disabled"><a href="#step-2">
                    <h4 class="list-group-item-heading">Salary</h4>
                    <p class="list-group-item-text"> Days of Work</p>
                </a></li>
                <li class="disabled"><a href="#step-3">
                    <h4 class="list-group-item-heading">Addition/Deductions</h4>
                    <p class="list-group-item-text">Additional/Deductions to Salary</p>
                </a></li>
                <li class="disabled"><a href="#step-4">
                    <h4 class="list-group-item-heading">Total Salary</h4>
                    <p class="list-group-item-text">Confirmation</p>
                </a></li>
            </ul>
        </div>
    </div>


    <div class="row setup-content" id="step-1">
        <div class="col-xs-12">
            <div class="col well">
                <div class="row">
     <div class="col-sm-offset-4 col-sm-6">
                
             <div class="form-group">
                    <label for="validate-text">Name</label>
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Employee Name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="validate-optional">Employee ID</label>
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        <input type="text" class="form-control" name="empid" id="empid" placeholder="ID" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="validate-optional">EPF Number</label>
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        <input type="text" class="form-control" name="epfnum" id="epfnum" placeholder="EPF" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="validate-select">Month</label>
                    <div class="input-group">
                        <select class="form-control" name="month" id="month" placeholder="Month" style="max-width:50%" required>
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
                        <select class="form-control" name="year" id="year" placeholder="Year" style="max-width:50%" required>
                            <option value="">Select Year</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                        </select>
                        <span class="input-group-addon danger"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>      
                </div>
                
                       </div>
        </div>
    </div>
                <button id="activate:step-2" class="btn btn-primary btn-lg" class="btn btn-primary btn-lg">Salary</button> 
            </div>
        </div>
</div>
    <div id="container">
    <div class="row setup-content" id="step-2">
        <div class="col-xs-12">

            <div class="col well">
                <div class="row">
     <div class="col-sm-offset-4 col-sm-6">
            
                <h1 class="text-center"> </h1>
                <div class="form-group">
                    <label for="validate-text">Number of Days</label>
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        <input type="text" class="form-control" name="days" id="days" placeholder="Days of work"  onchange="Generate()" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="validate-optional">Basic Salary</label>
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        <input type="text" class="form-control" name="basic" id="basic" placeholder="Basic">
                    </div>
                </div>
                <div class="form-group">
                    <label for="validate-optional">Over Time</label>
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        <input type="text" class="form-control" name="OT" id="OT" placeholder="Overtime" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="validate-optional">Gross Salary</label>
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        <input type="text" class="form-control" name="gross" id="gross" placeholder="Gross Salary" >
                    </div>
                </div>
                
                <button id="activate:step-1" class="btn btn-primary btn-lg">Personal Information</button>
                <button id="activate:step-tiga" class="btn btn-primary btn-lg">Add/Deduct</button>
            </div>
      </div>
    </div>
</div>
</div>
</div>
<div id="container">
    <div class="row setup-content" id="step-tiga">
        <div class="col-xs-12">
            <div class="col well">
                <div class="row">
     <div class="col-sm-offset-4 col-sm-6">
                <h1 class="text-center"> </h1>
                <div class="form-group">
                    <label for="validate-text">EPF Amount</label>
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        <input type="text" class="form-control" name="epf_employee" id="epf" placeholder="EPF" style="max-width:50%" readonly>
                        <input type="text" class="form-control" name="epf_employer" id="epf_emp" placeholder="EPF Company" style="max-width:50%" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="validate-optional">SOCSO Amount</label>
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        <input type="text" class="form-control" name="socso_employee" id="socso_emp" placeholder="SOCSO" style="max-width:50%" readonly>
                        <input type="text" class="form-control" name="socso_employer" id="socso_company" placeholder="SOCSO Company" style="max-width:50%" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="validate-optional">EIS Amount</label>
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        <input type="text" class="form-control" name="eis_employee" id="eis_emp" placeholder="EIS" style="max-width:50%" readonly>
                        <input type="text" class="form-control" name="eis_employer" id="eis_company" placeholder="EIS Company" style="max-width:50%" readonly>
                    </div>
                </div>
                 <div class="form-group">
                    <label for="validate-optional">Allowances</label>
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        <input type="text" class="form-control" name="allowance_count" id="allowance" placeholder="Allowances" >
                    </div>
                </div>
                 <div class="form-group">
                    <label for="validate-optional">Total Deductions</label>
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        <input type="text" class="form-control" name="count_deduction" id="total_deduction" placeholder="Total Deductions" readonly>
                    </div>
                </div>
                <button id="activate:step-2" class="btn btn-primary btn-lg">Deductions</button>
                <button id="activate:step-empat" class="btn btn-primary btn-lg">Total Pay</button>
            </div>
        </div>
    </div>
</div>
</div>

</div>
  <div id="container">
    <div class="row setup-content" id="step-empat">
    <div class="col-xs-12">
            <div class="col well">
                <div class="row">
     <div class="col-sm-offset-4 col-sm-6">
        
                <h1 class="text-center"></h1>
                <div class="form-group">
                    <label for="validate-text">Allowances</label>
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        <input type="text" class="form-control" name="total_allow" id="total_allowance" placeholder="Total Allowance" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="validate-optional">Deductions</label>
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        <input type="text" class="form-control" name="total_deduction" id="total_deduct" placeholder="Deduction" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="validate-optional">Total Salary</label>
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        <input type="text" class="form-control" name="total_salary_final" id="total_salary" placeholder="Total Salary" readonly>
                    </div>
                </div>
                    
                
                <button id="activate:step-tiga" class="btn btn-primary btn-lg">Deductions</button>
                <input id="activate:step-4" type="submit" name="process"  value="Submit" onclick="Generate()">       
                
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

</form>
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
    $approval = "Disapprove";

    echo $name;
    echo $id;
    echo $basic;
    echo $epf_employee ;
    echo $totaldeduction ;
    echo $approval ;

    $sql = "INSERT INTO salary (empname,empid,epfnum,month,year,days,basic,ot,gross,epf_employee,epf_employer,
            socso_emp,socso_com,eis_emp,eis_com,allowances,tot_deduction,tot_allowance,tot_deductions,total_salary,
             date_keyin,ApproveStatus) VALUES ('$name' , '$id' , '$epf_reference' , '$month' , '$year' , '$days' , '$basic' , '$overtime' , 
             '$gross','$epf_employee','$epf_employer','$socso_employee','$socso_employer','$eis_employee','$eis_employer','$allowance','$deduct'
             ,'$totalallowance','$totaldeduction','$totalsalary','$date','$approval') " ;
    $result=mysqli_query($conn,$sql);
    if($result)
    {
        echo "Success";
    }
    else
    {
        echo "apa nak jadi niiii!!!!!!";
    }

}

?>