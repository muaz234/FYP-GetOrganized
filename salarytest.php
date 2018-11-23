<html>
<head>
<script type="text/javascript" src="salarycount.js" > </script>
</head>
<body>
<form action="getsalary.php" method="POST">
	Name <input type="text" class="form-control" name="name" id="name" placeholder="Employee Name" required>
	Employee ID <input type="text" class="form-control" name="empid" id="empid" placeholder="ID" required>
	EPF Number <input type="text" class="form-control" name="epfnum" id="epfnum" placeholder="EPF" required>
	 Month<select class="form-control" name="month" id="month" placeholder="Month" style="max-width:50%" required>
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
    Number of Days<input type="text" class="form-control" name="days" id="days" placeholder="Days of work"  onchange="Generate()" required>
    Basic Salary <input type="text" class="form-control" name="basic" id="basic" placeholder="Basic">
    Over Time <input type="text" class="form-control" name="OT" id="OT" placeholder="Overtime" >
    Gross Salary<input type="text" class="form-control" name="gross" id="gross" placeholder="Gross Salary" >
    EPF Amount <input type="text" class="form-control" name="epf_employee" id="epf" placeholder="EPF" style="max-width:50%" readonly>
               <input type="text" class="form-control" name="epf_employer" id="epf_emp" placeholder="EPF Company" style="max-width:50%" readonly>
    SOCSO Amount <input type="text" class="form-control" name="socso_employee" id="socso_emp" placeholder="SOCSO" style="max-width:50%" readonly>
                 <input type="text" class="form-control" name="socso_employer" id="socso_company" placeholder="SOCSO Company" style="max-width:50%" readonly>
    EIS Amount <input type="text" class="form-control" name="eis_employee" id="eis_emp" placeholder="EIS" style="max-width:50%" readonly>
               <input type="text" class="form-control" name="eis_employer" id="eis_company" placeholder="EIS Company" style="max-width:50%" readonly>
    Allowances <input type="text" class="form-control" name="allowance_count" id="allowance" placeholder="Allowances" >
    Total Deductions <input type="text" class="form-control" name="count_deduction" id="total_deduction" placeholder="Total Deductions" readonly>
    Allowances <input type="text" class="form-control" name="total_allow" id="total_allowance" placeholder="Total Allowance" readonly>
    Deductions <input type="text" class="form-control" name="total_deduction" id="total_deduct" placeholder="Deduction" readonly>
    Total Salary <input type="text" class="form-control" name="total_salary_final" id="total_salary" placeholder="Total Salary" readonly>
    <input type="submit" name="process"   class="btn btn-primary bstn-lg" value="Submit" onclick="Generate()">


</form>



</body>	
</head>


