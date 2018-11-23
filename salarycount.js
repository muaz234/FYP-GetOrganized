//var basic= document.getElementById("basic").value;
function Generate()
{
var days= document.getElementById("days").value;
var allowance = document.getElementById("allowance").value;
var basic = days * '38.46' ;
var overtime = days * '7.2' * '3' ;
//document.getElementById("overtime").value= overtime;

if(days>'26')
{
	var limitbasic = basic - 1000;
	var basic = '1000.00';
	parseFloat(basic);
	var extradays = days - '26' ;
	var additionaldays = extradays * ('7.20' * '11');
	var overtime = overtime + additionaldays + limitbasic ;


}
else if(days<'26')
{
var over = days * '7.2' * '3' ;
document.getElementById('OverTime').value= over.toFixed(2);
}

else if(days == '26')
{

	var basic = '1000.00';
	parseFloat(basic);
}
document.getElementById("basic").value= basic ;
document.getElementById('OverTime').value= overtime.toFixed(2);
var totalgross = parseFloat(basic + overtime) ;
document.getElementById("gross").value = totalgross.toFixed(2);
var countEPF = EPF();
document.getElementById("epf").value = countEPF[0] ;
document.getElementById("epf_emp").value = countEPF[1]	;


var countsocso = SOCSO(totalgross);
document.getElementById("socso_emp").value = countsocso[0];
document.getElementById("socso_company").value = countsocso[1];


var counteis = EIS(totalgross);
document.getElementById("eis_emp").value = counteis[0];
document.getElementById("eis_company").value = counteis[1];

var count_deduction = parseFloat(countEPF[0]) + parseFloat(countsocso[0]) + parseFloat(counteis[0]) ;
document.getElementById("total_deduction").value = count_deduction ;
document.getElementById("total_deduct").value = count_deduction ;
document.getElementById("total_allowance").value = allowance ;
var finalsalary= totalgross + allowance - count_deduction ;
document.getElementById("total_salary").value = finalsalary.toFixed(2) ;
return totalgross;
}

function EPF()
{
var epf_emp = '110.00';
var epf_company = '130.00';
var epf =[epf_emp,epf_company];
return epf;
}


function SOCSO(totalgross)
{

 var socso_company;
 var socso_emp;


 if(totalgross>'1400.00' && totalgross <= '1500.00')
 {
 		socso_emp ='7.25';
 		socso_company = '18.10';

 }
else if(totalgross>'1500.00' && totalgross <= '1600.00')
{
		socso_emp ='7.75';
 		socso_company = '19.40';

}
else if(totalgross>'1600.00' && totalgross <= '1700.00')
{
		socso_emp ='8.25';
 		socso_company = '20.60';

}
else if(totalgross>'1700.00' && totalgross <= '1800.00')
{
		socso_emp ='8.75';
 		socso_company = '21.90';

}
else if(totalgross>'1800.00' && totalgross <= '1900.00')
{
		socso_emp ='9.25';
 		socso_company = '23.10';

}
else if(totalgross>'1900.00' && totalgross <= '2000.00')
{
		socso_emp ='9.75';
 		socso_company = '24.40';

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
 if(totalgross>'1400.00' && totalgross <= '1500.00')
 {
 		eis_emp ='2.90';
 		eis_company = '2.90';

 }
else if(totalgross>'1500.00' && totalgross <= '1600.00')
{
		eis_emp ='3.10';
 		eis_company = '3.10';

}
else if(totalgross>'1600.00' && totalgross <= '1700.00')
{
		eis_emp ='3.30';
 		eis_company = '3.30';

}
else if(totalgross>'1700.00' && totalgross <= '1800.00')
{
		eis_emp ='3.50';
 		eis_company = '3.50';

}
else if(totalgross>'1800.00' && totalgross <= '1900.00')
{
		eis_emp ='3.70';
 		eis_company = '3.70';

}
else if(totalgross>'1900.00' && totalgross <= '2000.00')
{
		eis_emp ='3.90';
 		eis_company = '3.90';

}
else
{
	console.log("An error occured;");
}
var eis=[eis_emp,eis_company];
return eis;
}
