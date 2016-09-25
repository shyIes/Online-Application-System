<?php

require_once "session.php";
require_once "dbcontroller.php";
require("fpdf/fpdf.php");
require("fpdi/fpdi.php");
require_once("fpdi/fpdf_tpl.php");


$username = $_SESSION["username"];
$select = "SELECT * FROM users WHERE email='$username'";
$result = mysql_query($select) or die('Database error '.mysql_error());
$row = mysql_fetch_assoc($result);

$appid = $row['applicant_id'];
$email = $row['email'];
$firstname = $row['first_name'];
$middlename = $row['middle_name'];
$lastname = $row['last_name'];
$phone = $row['phone'];

$select = "SELECT * FROM personal_details where applicant_id='$appid'";
$result = mysql_query($select) or die('Database error '.mysql_error());
$row = mysql_fetch_assoc($result);

$gender = $row['gender'];
$dob = $row['date_of_birth'];
$pline1 = $row['p_address_line1'];
$pline2 = $row['p_address_line2'];
$pcity = $row['p_address_city'];
$pstate = $row['p_address_state'];
$ppincode = $row['p_address_pincode'];

$mline1 = $row['m_address_line1'];
$mline2 = $row['m_address_line2'];
$mcity = $row['m_address_city'];
$mstate = $row['m_address_state'];
$mpincode = $row['m_address_pincode'];

$select = "SELECT * FROM education_details WHERE applicant_id='$appid'";
$result = mysql_query($select) or die('Database error ' . mysql_error());
$row = mysql_fetch_assoc($result);

$x_board = $row['x_board'];
$x_inst = $row['x_inst'];
$x_city = $row['x_city'];
$x_state = $row['x_state'];
$x_major = $row['x_major'];
$x_marks = $row['x_marks'];
$x_year = $row['x_year'];

$xii_board = $row['xii_board'];
$xii_inst = $row['xii_inst'];
$xii_city = $row['xii_city'];
$xii_state = $row['xii_state'];
$xii_major = $row['xii_major'];
$xii_marks = $row['xii_marks'];
$xii_year = $row['xii_year'];

$ug_degree = $row['ug_degree'];
$ug_inst = $row['ug_inst'];
$ug_univ = $row['ug_univ'];
$ug_city = $row['ug_city'];
$ug_state = $row['ug_state'];
$ug_major = $row['ug_major'];
$ug_major_other = $row['ug_major_other'];
$ug_marks = $row['ug_marks'];
$pieces = explode('.',$ug_marks);
$ug_marks1 = $pieces[0];
$ug_marks2 = $pieces[1];
$ug_year_from = $row['ug_year_from'];
$ug_year_to = $row['ug_year_to'];

$pg_degree = $row['pg_degree'];
$pg_inst = $row['pg_inst'];
$pg_univ = $row['pg_univ'];
$pg_major = $row['pg_major'];
$pg_marks = $row['pg_marks'];
$pieces = explode('.',$pg_marks);
$pg_marks1 = $pieces[0];
$pg_marks2 = $pieces[1];
$pg_year_from = $row['pg_year_from'];
$pg_year_to = $row['pg_year_to'];

$gre_awa = $row['gre_awa'];
$gre_verbal = $row['gre_verbal'];
$gre_quant = $row['gre_quant'];

$toefl_reading = $row['toefl_reading'];
$toefl_writing = $row['toefl_writing'];
$toefl_listening = $row['toefl_listening'];
$toefl_speaking = $row['toefl_speaking'];

$pdf = new FPDI();

$pdf->AddPage();
$pdf->Image("images/SASE header.jpg",17.5,10,175);
$pdf->ln(55);
$pdf->SetFont('Times','B',18);
$pdf->SetTextColor(28,41,125);
$pdf->Cell(190,30,"PRE-APPLICATION FORM",0,1,'C');
$pdf->Cell(190,0,"Master of Science in Information Technology",0,1,'C');
$pdf->Cell(190,20,"– Software Engineering",0,1,'C');

$pdf->SetFillColor(255,0,0);
$pdf->SetTextColor(255);
$pdf->SetDrawColor(0,0,0);
$pdf->SetLineWidth(.3);
$pdf->SetFont('Times','B',11);
$header = array('For Office Use Only');
for($i=0;$i<count($header);$i++)
    $pdf->Cell(180,7,$header[$i],1,1,'L',true);

$pdf->SetFillColor(255);
$pdf->SetTextColor(0);
$pdf->SetFont('Times','',11);
$pdf->Cell(90,7,"Applicant Reference Number",1,0,'L',true);
$pdf->Cell(90,7,$appid,1,1,'L',true);
$pdf->Cell(90,7,"Supplementary Materials Received",1,0,'L',true);

for($i=1;$i<=9;$i++)
{
    $pdf->Cell(5, 7, $i, 1, 0, 'L', true);
    $pdf->Cell(5, 7, '', 1, 0, 'L', true);
}
$pdf->ln(15);
$pdf->Image("uploads/".$appid."-photo.jpg",155,140,32);
$pdf->SetFont('Times','B',13);
$pdf->ln(25);
$pdf->Cell(15, 7, '       1. Personal Details',0, 1, 'L', true);
$pdf->ln(5);
$pdf->SetFont('Times','',12);
$pdf->Cell(90, 7, '       First Name                ',1, 0, 'L', true);
$pdf->Cell(90, 7,$firstname,1, 1, 'L', true);
$pdf->Cell(90, 7, '       Middle Name                ',1, 0, 'L', true);
$pdf->Cell(90, 7,$middlename,1, 1, 'L', true);
$pdf->Cell(90, 7, '       Last Name                ',1, 0, 'L', true);
$pdf->Cell(90, 7,$lastname,1, 1, 'L', true);
$pdf->Cell(90, 7, '       Phone                ',1, 0, 'L', true);
$pdf->Cell(90, 7,'+91 '.$phone,1, 1, 'L', true);

$pdf->Cell(90, 7, '       Email                ',1, 0, 'L', true);
$pdf->Cell(90, 7,$email,1, 1, 'L', true);

if($gender='f') $gender = 'Female';
else $gender = 'Male';

$pdf->Cell(90, 7, '       Gender                ',1, 0, 'L', true);
$pdf->Cell(90, 7,$gender,1, 1, 'L', true);

$pdf->Cell(90, 7, '       Date of Birth                ',1, 0, 'L', true);
$pdf->Cell(90, 7,$dob,1, 1, 'L', true);

$pdf->Cell(90, 7, '       Permanent Address (Line 1)             ',1, 0, 'L', true);

$pdf->Cell(90, 7,$pline1,1, 1, 'L', true);

$pdf->Cell(90, 7, '                                       (Line 2)             ',1, 0, 'L', true);
$pdf->Cell(90, 7,$pline2,1, 1, 'L', true);

$pdf->Cell(90, 7, '       City             ',1, 0, 'L', true);
$pdf->Cell(90, 7,$pcity,1, 1, 'L', true);

$pdf->Cell(90, 7, '       State             ',1, 0, 'L', true);
$pdf->Cell(90, 7,$pstate,1, 1, 'L', true);

$pdf->Cell(90, 7, '       Pincode             ',1, 0, 'L', true);
$pdf->Cell(90, 7,$ppincode,1, 1, 'L', true);

if(!empty($mline1) || !empty($mcity))
{
    $pdf->Cell(90, 7, '       Mailing Address (Line 1)             ',1, 0, 'L', true);

    $pdf->Cell(90, 7,$mline1,1, 1, 'L', true);

    $pdf->Cell(90, 7, '                                       (Line 2)             ',1, 0, 'L', true);
    $pdf->Cell(90, 7,$mline2,1, 1, 'L', true);

    $pdf->Cell(90, 7, '       City             ',1, 0, 'L', true);
    $pdf->Cell(90, 7,$mcity,1, 1, 'L', true);

    $pdf->Cell(90, 7, '       State             ',1, 0, 'L', true);
    $pdf->Cell(90, 7,$mstate,1, 1, 'L', true);

    $pdf->Cell(90, 7, '       Pincode             ',1, 0, 'L', true);
    $pdf->Cell(90, 7,$mpincode,1, 1, 'L', true);
}

$pdf->AddPage();
$pdf->ln(10);
$pdf->SetFont('Times','B',13);
$pdf->Cell(15, 7, '       2. Education Details',0, 1, 'L', true);
$pdf->ln(5);

$pdf->SetFont('Times','B',12);

$pdf->SetFillColor(175);
$pdf->SetTextColor(0);
$pdf->SetDrawColor(0,0,0);
$pdf->SetLineWidth(.3);

$pdf->Cell(60, 7, '       Qualification                ',1, 0, 'L', true);
$pdf->Cell(120, 7,'SSLC (X Standard)',1, 1, 'L', true);

$pdf->SetFillColor(255);
$pdf->SetFont('Times','',12);

$x_board = strtoupper($x_board);

$pdf->Cell(60, 7, '       Board                ',1, 0, 'L', true);
$pdf->Cell(120, 7,$x_board,1, 1, 'L', true);
$pdf->Cell(60, 7, '       Institution                ',1, 0, 'L', true);
$pdf->Cell(120, 7,$x_inst,1, 1, 'L', true);
$pdf->Cell(60, 7, '       Location                ',1, 0, 'L', true);
$pdf->Cell(120, 7,$x_city,1, 1, 'L', true);
$pdf->Cell(60, 7, '       Major Subjects                ',1, 0, 'L', true);
$pdf->Cell(120, 7,$x_major,1, 1, 'L', true);
$pdf->Cell(60, 7, '       Percentage of Marks                ',1, 0, 'L', true);
$pdf->Cell(120, 7,$x_marks,1, 1, 'L', true);
$pdf->Cell(60, 7, '       Year of Passing                ',1, 0, 'L', true);
$pdf->Cell(120, 7,$x_year,1, 1, 'L', true);

$pdf->ln(10);

$pdf->SetFont('Times','B',12);

$pdf->SetFillColor(175);
$pdf->SetTextColor(0);
$pdf->SetDrawColor(0,0,0);
$pdf->SetLineWidth(.3);

$pdf->Cell(60, 7, '       Qualification                ',1, 0, 'L', true);
$pdf->Cell(120, 7,'P.U.C (XII Standard)',1, 1, 'L', true);

$pdf->SetFillColor(255);
$pdf->SetFont('Times','',12);

$xii_board = strtoupper($xii_board);

$pdf->Cell(60, 7, '       Board                ',1, 0, 'L', true);
$pdf->Cell(120, 7,$xii_board,1, 1, 'L', true);
$pdf->Cell(60, 7, '       Institution                ',1, 0, 'L', true);
$pdf->Cell(120, 7,$xii_inst,1, 1, 'L', true);
$pdf->Cell(60, 7, '       Location                ',1, 0, 'L', true);
$pdf->Cell(120, 7,$xii_city,1, 1, 'L', true);
$pdf->Cell(60, 7, '       Major Subjects                ',1, 0, 'L', true);
$pdf->Cell(120, 7,$xii_major,1, 1, 'L', true);
$pdf->Cell(60, 7, '       Percentage of Marks                ',1, 0, 'L', true);
$pdf->Cell(120, 7,$xii_marks,1, 1, 'L', true);
$pdf->Cell(60, 7, '       Year of Passing                ',1, 0, 'L', true);
$pdf->Cell(120, 7,$xii_year,1, 1, 'L', true);

$pdf->ln(10);

$pdf->SetFont('Times','B',12);

$pdf->SetFillColor(175);
$pdf->SetTextColor(0);
$pdf->SetDrawColor(0,0,0);
$pdf->SetLineWidth(.3);

$pdf->Cell(60, 7, '       Qualification                ',1, 0, 'L', true);
$pdf->Cell(120, 7,'Under-graduate Degree',1, 1, 'L', true);

$pdf->SetFillColor(255);
$pdf->SetFont('Times','',12);

$pdf->Cell(60, 7, '       Degree                ',1, 0, 'L', true);
$pdf->Cell(120, 7,$ug_degree,1, 1, 'L', true);
$pdf->Cell(60, 7, '       Major                ',1, 0, 'L', true);
if($ug_major=="Others (Please specify below)"){
    $pdf->Cell(120, 7,$ug_major_other,1, 1, 'L', true);
}
else{
    $pdf->Cell(120, 7,$ug_major,1, 1, 'L', true);
}

$pdf->Cell(60, 7, '       Percentage of marks                ',1, 0, 'L', true);
$pdf->Cell(120, 7,$ug_marks,1, 1, 'L', true);
$pdf->Cell(60, 7, '       Institution                ',1, 0, 'L', true);
$pdf->Cell(120, 7,$ug_inst,1, 1, 'L', true);
$pdf->Cell(60, 7, '       University                ',1, 0, 'L', true);
$pdf->Cell(120, 7,$ug_univ,1, 1, 'L', true);
$pdf->Cell(60, 7, '       City                ',1, 0, 'L', true);
$pdf->Cell(120, 7,$ug_city,1, 1, 'L', true);
$pdf->Cell(60, 7, '       State                ',1, 0, 'L', true);
$pdf->Cell(120, 7,$ug_state,1, 1, 'L', true);
$pdf->Cell(60, 7, '       Year(From)                ',1, 0, 'L', true);
$pdf->Cell(120, 7,$ug_year_from,1, 1, 'L', true);
$pdf->Cell(60, 7, '       Year(To)                ',1, 0, 'L', true);
$pdf->Cell(120, 7,$ug_year_to,1, 1, 'L', true);

$pdf->ln(10);


if(!empty($pg_degree) || !empty($pg_major)){


    $pdf->SetFont('Times','B',12);

    $pdf->SetFillColor(175);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0,0,0);
    $pdf->SetLineWidth(.3);

    $pdf->Cell(60, 7, '       Qualification                ',1, 0, 'L', true);
    $pdf->Cell(120, 7,'Post-graduate Degree/Diploma',1, 1, 'L', true);

    $pdf->SetFillColor(255);
    $pdf->SetFont('Times','',12);

    $pdf->Cell(60, 7, '       Degree                ',1, 0, 'L', true);
    $pdf->Cell(120, 7,$pg_degree,1, 1, 'L', true);
    $pdf->Cell(60, 7, '       Major Subject                ',1, 0, 'L', true);
    $pdf->Cell(120, 7,$pg_major,1, 1, 'L', true);
    $pdf->Cell(60, 7, '       Percentage of marks                ',1, 0, 'L', true);
    $pdf->Cell(120, 7,$pg_marks,1, 1, 'L', true);
    $pdf->Cell(60, 7, '       Institution                ',1, 0, 'L', true);
    $pdf->Cell(120, 7,$pg_inst,1, 1, 'L', true);
    $pdf->Cell(60, 7, '       University                ',1, 0, 'L', true);
    $pdf->Cell(120, 7,$pg_univ,1, 1, 'L', true);
    $pdf->Cell(60, 7, '       Year(From)                ',1, 0, 'L', true);
    $pdf->Cell(120, 7,$pg_year_from,1, 1, 'L', true);
    $pdf->Cell(60, 7, '       Year(To)                ',1, 0, 'L', true);
    $pdf->Cell(120, 7,$pg_year_to,1, 1, 'L', true);

}
$pdf->ln(10);

$pdf->SetFont('Times','B',12);

$pdf->SetFillColor(175);
$pdf->SetTextColor(0);
$pdf->SetDrawColor(0,0,0);
$pdf->SetLineWidth(.3);

$pdf->Cell(60, 7, '       GRE                ',1, 0, 'L', true);
$pdf->Cell(120, 7,'Score',1, 1, 'L', true);

$pdf->SetFillColor(255);
$pdf->SetFont('Times','',12);

$pdf->Cell(60, 7, '       Verbal                ',1, 0, 'L', true);
$pdf->Cell(120, 7,$gre_verbal,1, 1, 'L', true);
$pdf->Cell(60, 7, '       Quantitative                ',1, 0, 'L', true);
$pdf->Cell(120, 7,$gre_quant,1, 1, 'L', true);
$pdf->Cell(60, 7, '       Analytical Writing                ',1, 0, 'L', true);
$pdf->Cell(120, 7,$gre_awa,1, 1, 'L', true);
$pdf->Cell(60, 7, '       Total                ',1, 0, 'L', true);
$pdf->Cell(120, 7,$gre_verbal + $gre_quant,1, 1, 'L', true);

$pdf->ln(10);

$pdf->SetFont('Times','B',12);

$pdf->SetFillColor(175);
$pdf->SetTextColor(0);
$pdf->SetDrawColor(0,0,0);
$pdf->SetLineWidth(.3);

$pdf->Cell(60, 7, '       TOEFL                ',1, 0, 'L', true);
$pdf->Cell(120, 7,'Score',1, 1, 'L', true);

$pdf->SetFillColor(255);
$pdf->SetFont('Times','',12);

$pdf->Cell(60, 7, '       Reading                ',1, 0, 'L', true);
$pdf->Cell(120, 7,$toefl_reading,1, 1, 'L', true);
$pdf->Cell(60, 7, '       Listening                ',1, 0, 'L', true);
$pdf->Cell(120, 7,$toefl_listening,1, 1, 'L', true);
$pdf->Cell(60, 7, '       Speaking                ',1, 0, 'L', true);
$pdf->Cell(120, 7,$toefl_speaking,1, 1, 'L', true);
$pdf->Cell(60, 7, '       Writing                 ',1, 0, 'L', true);
$pdf->Cell(120, 7,$toefl_writing,1, 1, 'L', true);
$pdf->Cell(60, 7, '       Total                ',1, 0, 'L', true);
$pdf->Cell(120, 7,$toefl_listening + $toefl_writing + $toefl_speaking + $toefl_reading,1, 1, 'L', true);

$gre_file = 'uploads/'.$appid.'-GRE.pdf';
$toefl_file = 'uploads/'.$appid.'-TOEFL.pdf';
$acads_file = 'uploads/'.$appid.'-acads.pdf';
$exp_file = 'uploads/'.$appid.'-exp.pdf';
$sop_file = 'uploads/'.$appid.'-SOP.pdf';
$x_file = 'uploads/'.$appid.'-X_marksheet.pdf';
$xii_file = 'uploads/'.$appid.'-XII_marksheet.pdf';
$ug_file = 'uploads/'.$appid.'-UG_marksheet.pdf';
$pg_file = 'uploads/'.$appid.'-PG_marksheet.pdf';
$resume = 'uploads/'.$appid.'-resume.pdf';


$pageCount = $pdf->setSourceFile($acads_file);

for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++)
{
    $pdf->AddPage();
    $tpl = $pdf->importPage($pageNo, '/MediaBox');
    $pdf->useTemplate($tpl, 0, 0, 0, 0, true);
}

$pageCount = $pdf->setSourceFile($exp_file);

for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++)
{
    $pdf->AddPage();
    $tpl = $pdf->importPage($pageNo);
    $pdf->useTemplate($tpl, 0, 0, 0, 0, true);

}
$pageCount = $pdf->setSourceFile($sop_file);

for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++)
{
    $pdf->AddPage();
    $tpl = $pdf->importPage($pageNo, '/MediaBox');
    $pdf->useTemplate($tpl, 0, 0, 0, 0, true);
}

$pageCount = $pdf->setSourceFile($x_file);

for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++)
{
    $pdf->AddPage();
    $tpl = $pdf->importPage($pageNo, '/MediaBox');
    $pdf->useTemplate($tpl, 0, 0, 0, 0, true);
}

$pageCount = $pdf->setSourceFile($xii_file);

for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++)
{
    $pdf->AddPage();
    $tpl = $pdf->importPage($pageNo, '/MediaBox');
    $pdf->useTemplate($tpl, 0, 0, 0, 0, true);
}

$pageCount = $pdf->setSourceFile($ug_file);

for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++)
{
    $pdf->AddPage();
    $tpl = $pdf->importPage($pageNo, '/MediaBox');
    $pdf->useTemplate($tpl, 0, 0, 0, 0, true);
}

$pageCount = $pdf->setSourceFile($pg_file);

for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++)
{
    $pdf->AddPage();
    $tpl = $pdf->importPage($pageNo, '/MediaBox');
    $pdf->useTemplate($tpl, 0, 0, 0, 0, true);
}

$pageCount = $pdf->setSourceFile($gre_file);

for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++)
{
    $pdf->AddPage();
    $tpl = $pdf->importPage($pageNo, '/MediaBox');
    $pdf->useTemplate($tpl, 0, 0, 0, 0, true);
}

$pageCount = $pdf->setSourceFile($toefl_file);

for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++)
{
    $pdf->AddPage();
    $tpl = $pdf->importPage($pageNo, '/MediaBox');
    $pdf->useTemplate($tpl, 0, 0, 0, 0, true);
}

$pageCount = $pdf->setSourceFile($resume);

for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++)
{
    $pdf->AddPage();
    $tpl = $pdf->importPage($pageNo, '/MediaBox');
    $pdf->useTemplate($tpl, 0, 0, 0, 0, true);
}

$file = 'uploads/'.$appid.'.pdf';

$pdf->Output('I');
$pdf->Output('F',$file);
?>