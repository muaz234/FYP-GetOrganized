<html>
<head>
</head>
<body>
<form action ="" method="POST">
<input type="submit" value="KITACUBA!!!!!!!!!!!" name="try" >
</form>
</body>
</html>



<?php
if(isset($_POST['try']))
{


$content = '';

$content .= 'is it okay??' ;
echo $content ;

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
$content = '';

$content .= 'is it okay??' ;
echo $content ;
//$print = file_get_contents(contentspdf.php);
$print = 1 ;
$pdf_write -> Write($h=0, $content, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
//$pdf_write -> write($print);
ob_end_clean();
$pdf_write -> Output("salary.pdf","I");

}

?>
