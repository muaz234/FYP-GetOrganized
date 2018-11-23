
<?php
require_once 'database.php';

if(isset($_POST['update']))
{
$id = $_POST['id'] ;
$sql = "UPDATE salary SET ApproveStatus = 'Approve' WHERE ID='$id' " ;
$result = mysqli_query($conn,$sql);
if($result)
{
  header("Location: selectsalary.php" );
}
else {
  echo "An error occured" ;
}


}

else
{
  echo "";
}
require_once 'fpdf.php';
$pdf=new FPDF();

//Disable automatic page break
$pdf->SetAutoPageBreak(false);

//Add first page
$pdf->AddPage();

//set initial y axis position per page
$y_axis_initial = 25;

//print column titles
$pdf->SetFillColor(232, 232, 232);
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetY($y_axis_initial);
$pdf->SetX(25);
$pdf -> SetTitle("Salary Employee");

if(isset($_POST['print']))
{
  require_once 'database.php';
  $id = $_POST['id'] ;
  $sql = "SELECT ID,empname,empid,epfnum,month,year,days,basic,ot,
          gross,epf_employee,socso_emp,eis_emp,tot_deductions,total_salary,date_keyin FROM salary WHERE
          ID='$id'  " ;
  $print = mysqli_query($conn,$sql);


  while($row = mysqli_fetch_array($print))
  {

    $ID =  $row['empid'] ;
    $Name =  $row['empname'] ;
    $Epf_Num =  $row['epfnum'] ;

    $Month =  $row['month'] ;
    $Year =  $row['year'] ;
    $Days =  $row['days'] ;
    $Basic =  $row['basic'] ;
    $OverTime =  $row['ot'] ;
    $Gross =  $row['gross'] ;
    $EPF =  $row['epf_employee'] ;
    $SOCSO =  $row['socso_emp'] ;
    $EIS =  $row['eis_emp'] ;
    $Total_Deduction =  $row['tot_deductions'] ;
    $Total_Salary =  $row['total_salary'] ;
    $Date =  $row['date_keyin'] ;
    $convert_date = date("d-m-Y" ,strtotime($Date));

  }
     $pdf->Cell(20, 10, 'Salary Employee', 0, 1, 'C', 0);
     $pdf->Cell(10, 5, '', 0, 1, 'L', 0);
     $pdf->Cell(20, 5, 'Id', 0, 0, 'L', 0);
     $pdf->Cell(30, 5, $ID, 0, 0, 'L', 0);
     $pdf->Ln(10);
     $pdf->Cell(20, 5, 'Name', 0, 0, 'L', 0);
     $pdf->Cell(30, 5, $Name, 0, 0, 'L', 0);
     $pdf->Ln(10);

     $pdf->Cell(20, 5, 'Month', 0, 0, 'L', 0);
     $pdf->Cell(30, 5, $Month, 0, 0, 'L', 0);
     $pdf->Ln(10);
     $pdf->Cell(20, 5, 'Year', 0, 0, 'L', 0);
     $pdf->Cell(30, 5, $Year, 0, 0, 'L', 0);
     $pdf->Ln(10);
     $pdf->Cell(20, 5, 'Days', 0, 0, 'L', 0);
     $pdf->Cell(30, 6, $Days, 0, 0, 'L', 0);
     $pdf->Ln(10);
     $pdf->Cell(20, 5, 'Basic RM', 0, 0, 'L', 0);
     $pdf->Cell(30, 5, $Basic, 0, 0, 'L', 0);
     $pdf->Ln(10);
     $pdf->Cell(20, 5, 'Overtime RM', 0, 0, 'L', 0);
     $pdf->Cell(30, 5, $OverTime, 0, 0, 'C', 0);
     $pdf->Ln(10);
     $pdf->Cell(20, 5, 'Gross RM', 0, 0, 'L', 0);
     $pdf->Cell(30, 5, $Gross, 0, 0, 'C', 0);
     $pdf->Ln(10);
     $pdf->Cell(20, 10, 'Deductions', 0, 1, 'C', 0);
     $pdf->Cell(10, 5, '', 0, 1, 'L', 0);
     $pdf->Cell(20, 5, 'EPF RM', 0, 0, 'L', 0);
     $pdf->Cell(30, 5, $EPF, 0, 0, 'L', 0);
     $pdf->Ln(10);
     $pdf->Cell(20, 5, 'SOCSO RM', 0, 0, 'L', 0);
     $pdf->Cell(30, 5, $SOCSO, 0, 0, 'C', 0);
     $pdf->Ln(10);
     $pdf->Cell(20, 5, 'EIS RM', 0, 0, 'L', 0);
     $pdf->Cell(30, 5, $EIS, 0, 0, 'L', 0);
     $pdf->Ln(10);
     $pdf->Cell(20, 10, 'Nett Salary RM', 0, 0, 'L', 0);
     $pdf->Cell(30, 10, $Total_Salary, 0, 0, 'R', 0);
     $pdf->Ln(10);
     $pdf->Cell(20, 10, 'Date', 0, 0, 'L', 0);
     $pdf->Cell(30, 10, $convert_date, 0, 0, 'C', 0);

     ob_end_clean();
     $pdf -> Output("salary.pdf","I");
}



 ?>





<!--


 require_once 'tcpdf/tcpdf.php' ;

 $pdf_write = new TCPDF('P',PDF_UNIT,PDF_PAGE_FORMAT,true,'UTF-8',false) ;
 $pdf_write -> SetCreator(PDF_CREATOR);
 $pdf_write -> SetTitle("Employee Salary By Month");
 $pdf_write -> SetHeaderData('' , '' ,PDF_HEADER_TITLE,PDF_HEADER_STRING);
 $pdf_write -> SetHeaderFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
 $pdf_write -> SetFooterFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
 $pdf_write -> SetDefaultMonospacedFont('helvetica');
 $pdf_write -> SetFooterMargin(PDF_MARGIN_FOOTER);
 $pdf_write -> SetMargins(PDF_MARGIN_LEFT,'5',PDF_MARGIN_RIGHT);
 $pdf_write -> SetPrintHeader(false);
 $pdf_write -> SetPrintFooter(false);
 $pdf_write -> SetAutoPageBreak(TRUE,10);
 $pdf_write -> SetFont('helvetica','',12);
 $pdf_write -> AddPage();
 $content .= '
 $content = '';
 <h1> Employee Salary</h1>
 ' ;
 $load = '' ;
 $pdf_write -> writeHTML($content, true, 0, true, 0);
 $id_fill = '' ;
 $id_fill .= 'ID' ;
 $pdf_write -> writeHTML($id_fill, true, 0, true, 0);
 $pdf_write -> writeHTML($ID, true, 0, true, 0);
 $name_fill = '' ;
 $name_fill .= 'Name' ;
 $pdf_write -> writeHTML($name_fill, true, 0, true, 0);
 $pdf_write -> writeHTML($Name, true, 0, true, 0);
 $pdf_write->Cell(30, 6, $OverTime, 1, 0, 'L', 1);
   $pdf_write->Cell(100, 6, $Gross, 1, 0, 'L', 1);
   $pdf_write->Cell(30, 6, $TotalSalary, 1, 0, 'R', 1);
 //$pdf_write -> write($print);
 ob_end_clean();
 $pdf_write -> Output("salary.pdf","I");
-->
