<?php
require_once "session.php";
require_once "dbcontroller.php";
$username = $_SESSION["username"];
$select = "SELECT email, applicant_id FROM users WHERE email='$username'";
$result = mysql_query($select) or die('Database error '.mysql_error());
$row = mysql_fetch_assoc($result);
$appid = $row['applicant_id'];
$email = $row['email'];

$flag = 0;

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

if(isset($_POST['x_board'])) $x_board = mysql_escape_string($_POST['x_board']);
if(isset($_POST['x_inst'])) $x_inst = mysql_escape_string($_POST['x_inst']);
if(isset($_POST['x_city'])) $x_city = mysql_escape_string($_POST['x_city']);
if(isset($_POST['x_state'])) $x_state = mysql_escape_string($_POST['x_state']);
if(isset($_POST['x_major'])) $x_major = mysql_escape_string($_POST['x_major']);
if(isset($_POST['x_marks'])) $x_marks = $_POST['x_marks'];
if(isset($_POST['x_year'])) $x_year = mysql_escape_string($_POST['x_year']);

if(isset($_POST['xii_board'])) $xii_board = mysql_escape_string($_POST['xii_board']);
if(isset($_POST['xii_inst'])) $xii_inst = mysql_escape_string($_POST['xii_inst']);
if(isset($_POST['xii_city'])) $xii_city = mysql_escape_string($_POST['xii_city']);
if(isset($_POST['xii_state'])) $xii_state = mysql_escape_string($_POST['xii_state']);
if(isset($_POST['xii_major'])) $xii_major = mysql_escape_string($_POST['xii_major']);
if(isset($_POST['xii_marks'])) $xii_marks = mysql_escape_string($_POST['xii_marks']);
if(isset($_POST['xii_year'])) $xii_year = mysql_escape_string($_POST['xii_year']);

if(isset($_POST['ug_degree'])) $ug_degree = mysql_escape_string($_POST['ug_degree']);
if(isset($_POST['ug_inst'])) $ug_inst = mysql_escape_string($_POST['ug_inst']);
if(isset($_POST['ug_univ'])) $ug_univ = mysql_escape_string($_POST['ug_univ']);
if(isset($_POST['ug_city'])) $ug_city = mysql_escape_string($_POST['ug_city']);
if(isset($_POST['ug_state'])) $ug_state = mysql_escape_string($_POST['ug_state']);
if(isset($_POST['ug_major'])) $ug_major = mysql_escape_string($_POST['ug_major']);
if(isset($_POST['ug_major_other'])) $ug_major_other = mysql_escape_string($_POST['ug_major_other']);
if(isset($_POST['ug_marks1'])) $ug_marks1 = mysql_escape_string($_POST['ug_marks1']);
if(isset($_POST['ug_marks2'])) $ug_marks2 = mysql_escape_string($_POST['ug_marks2']);
if(isset($_POST['ug_year_from'])) $ug_year_from = mysql_escape_string($_POST['ug_year_from']);
if(isset($_POST['ug_year_to'])) $ug_year_to = mysql_escape_string($_POST['ug_year_to']);
if(isset($_POST['ug_marks1']) && isset($_POST['ug_marks2'])) $ug_marks = $ug_marks1.'.'.$ug_marks2;

if(isset($_POST['pg_degree'])) $pg_degree = mysql_escape_string($_POST['pg_degree']);
if(isset($_POST['pg_inst'])) $pg_inst = mysql_escape_string($_POST['pg_inst']);
if(isset($_POST['pg_univ'])) $pg_univ = mysql_escape_string($_POST['pg_univ']);
if(isset($_POST['pg_major'])) $pg_major = mysql_escape_string($_POST['pg_major']);
if(isset($_POST['pg_marks1'])) $pg_marks1 = mysql_escape_string($_POST['pg_marks1']);
if(isset($_POST['pg_marks2'])) $pg_marks2 = mysql_escape_string($_POST['pg_marks2']);
if(isset($_POST['pg_year_from'])) $pg_year_from = mysql_escape_string($_POST['pg_year_from']);
if(isset($_POST['pg_year_to'])) $pg_year_to = mysql_escape_string($_POST['pg_year_to']);
if(isset($_POST['pg_marks1']) && isset($_POST['pg_marks2'])) $pg_marks = $pg_marks1.'.'.$pg_marks2;

if(isset($_POST['gre_awa'])) $gre_awa = mysql_escape_string($_POST['gre_awa']);
if(isset($_POST['gre_verbal'])) $gre_verbal = mysql_escape_string($_POST['gre_verbal']);
if(isset($_POST['gre_quant'])) $gre_quant = mysql_escape_string($_POST['gre_quant']);
if(isset($_POST['toefl_reading'])) $toefl_reading = mysql_escape_string($_POST['toefl_reading']);
if(isset($_POST['toefl_writing'])) $toefl_writing = mysql_escape_string($_POST['toefl_writing']);
if(isset($_POST['toefl_speaking'])) $toefl_speaking = mysql_escape_string($_POST['toefl_speaking']);
if(isset($_POST['toefl_listening'])) $toefl_listening = mysql_escape_string($_POST['toefl_listening']);

$update = "UPDATE education_details SET x_board='$x_board', x_inst='$x_inst', x_city='$x_city', x_state='$x_state', x_major='$x_major',
x_marks='$x_marks', x_year='$x_year', xii_board='$xii_board', xii_inst='$xii_inst', xii_city='$xii_city', xii_state='$xii_state', xii_major='$xii_major',
xii_marks='$xii_marks', xii_year='$xii_year', ug_degree='$ug_degree', ug_inst='$ug_inst', ug_univ='$ug_univ', ug_city='$ug_city', ug_state='$ug_state', ug_major='$ug_major',
ug_major_other='$ug_major_other', ug_marks='$ug_marks', ug_year_from='$ug_year_from', ug_year_to='$ug_year_to', pg_degree='$pg_degree', pg_inst='$pg_inst',
pg_univ='$pg_univ', pg_major='$pg_major', pg_marks='$pg_marks', pg_year_from='$pg_year_from', pg_year_to='$pg_year_to', gre_awa='$gre_awa', gre_verbal='$gre_verbal',
gre_quant='$gre_quant', toefl_reading='$toefl_reading', toefl_writing='$toefl_writing', toefl_listening='$toefl_listening', toefl_speaking='$toefl_speaking'
WHERE applicant_id='$appid'";

$result = mysql_query($update) or die(mysql_error());
$flag = 1;

?>

<html>
<head>
    <meta http-equiv="Content-Language" content="en-us">
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    <title>MSIT-SE Admissions 2016</title>
    <link href="ssn.css" type="text/css" rel=stylesheet>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-2.1.4.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="../SASE%20app/javascripts/jquery.validate.js" type="text/javascript">
    </script>
    <script src="../SASE%20app/javascripts/jquery.validation.functions.js" type="text/javascript">
    </script>
    <script type="text/javascript">
    </script>
    <script type="text/javascript">

            jQuery(function(){

                jQuery("#x_inst").validate({
                    expression: "if (VAL.match(/[A-Za-z0-9'\.\-\s\,]/) || !VAL) return true; else return false;",
                    message: "Please enter a proper institution name."
                });
                jQuery("#x_city").validate({
                    expression: "if ((isNaN(VAL) && VAL.match(/^[A-z]+$/)) || !VAL) return true; else return false;",
                    message: "Please enter a valid city."
                });
                jQuery("#x_major").validate({
                    expression: "if (VAL.match(/[A-Za-z0-9'\.\-\s\,]/) || !VAL) return true; else return false;",
                    message: "Please enter valid major subjects."
                });
                jQuery("#x_marks").validate({
                    expression: "if (VAL.match(/[0-9]/) || !VAL) return true; else return false;",
                    message: "Please enter valid marks percentage."
                });
                jQuery("#x_year").validate({
                    expression: "if ((VAL.match(/^[0-9]{4}$/) && VAL>2000) || !VAL) return true; else return false;",
                    message: "Please enter a valid year."
                });


                jQuery("#xii_inst").validate({
                    expression: "if (VAL.match(/[A-Za-z0-9'\.\-\s\,]/) || !VAL) return true; else return false;",
                    message: "Please enter a proper institution name."
                });
                jQuery("#xii_city").validate({
                    expression: "if ((isNaN(VAL) && VAL.match(/^[A-z]+$/)) || !VAL) return true; else return false;",
                    message: "Please enter a valid city."
                });
                jQuery("#xii_major").validate({
                    expression: "if (VAL.match(/[A-Za-z0-9'\.\-\s\,]/) || !VAL) return true; else return false;",
                    message: "Please enter valid major subjects."
                });
                jQuery("#xii_marks").validate({
                    expression: "if (VAL.match(/[0-9]/) || !VAL) return true; else return false;",
                    message: "Please enter valid marks percentage."
                });
                jQuery("#xii_year").validate({
                    expression: "if ((VAL.match(/^[0-9]{4}$/) && VAL>2002) || !VAL) return true; else return false;",
                    message: "Please enter a valid year."
                });

                jQuery("#ug_inst").validate({
                    expression: "if (VAL.match(/[A-Za-z0-9'\.\-\s\,]/) || !VAL) return true; else return false;",
                    message: "Please enter a proper institution name."
                });
                jQuery("#ug_univ").validate({
                    expression: "if (VAL.match(/[A-Za-z0-9'\.\-\s\,]/) || !VAL) return true; else return false;",
                    message: "Please enter a proper institution name."
                });
                jQuery("#ug_city").validate({
                    expression: "if ((isNaN(VAL) && VAL.match(/^[A-z]+$/)) || !VAL) return true; else return false;",
                    message: "Please enter a valid city."
                });
                jQuery("#ug_marks1").validate({
                    expression: "if (VAL.match(/[0-9]/) || !VAL) return true; else return false;",
                    message: "Please enter valid marks percentage."
                });
                jQuery("#ug_marks2").validate({
                    expression: "if (VAL.match(/[0-9]/) || !VAL) return true; else return false;",
                    message: "Please enter valid marks percentage."
                });
                jQuery("#ug_year_from").validate({
                    expression: "if ((VAL.match(/^[0-9]{4}$/)) || !VAL) return true; else return false;",
                    message: "Please enter a valid year."
                });
                jQuery("#ug_year_to").validate({
                    expression: "if ((VAL.match(/^[0-9]{4}$/)) || !VAL) return true; else return false;",
                    message: "Please enter a valid year."
                });

                jQuery("#pg_inst").validate({
                    expression: "if (VAL.match(/[A-Za-z0-9'\.\-\s\,]/) || !VAL) return true; else return false;",
                    message: "Please enter a proper institution name."
                });
                jQuery("#pg_univ").validate({
                    expression: "if (VAL.match(/[A-Za-z0-9'\.\-\s\,]/) || !VAL) return true; else return false;",
                    message: "Please enter a proper institution name."
                });
                jQuery("#pg_marks1").validate({
                    expression: "if (VAL.match(/[0-9]/) || !VAL) return true; else return false;",
                    message: "Please enter valid marks percentage."
                });
                jQuery("#pg_marks2").validate({
                    expression: "if (VAL.match(/[0-9]/) || !VAL) return true; else return false;",
                    message: "Please enter valid marks percentage."
                });

                jQuery("#gre_verbal").validate({
                    expression: "if ((VAL.match(/^[0-9]{3}$/) && VAL>=130 && VAL<=170) || !VAL) return true; else return false;",
                    message: "Please enter a valid GRE verbal score (between 130 and 170)."
                });
                jQuery("#gre_quant").validate({
                    expression: "if ((VAL.match(/^[0-9]{3}$/) && VAL>=130 && VAL<=170) || !VAL) return true; else return false;",
                    message: "Please enter a valid GRE quantitative score (between 130 and 170)."
                });
                jQuery("#toefl_reading").validate({
                    expression: "if ((VAL.match(/[0-9]/) && VAL<=30) || !VAL) return true; else return false;",
                    message: "Please enter a valid TOEFL Reading score (between 0 and 30)."
                });
                jQuery("#toefl_writing").validate({
                    expression: "if ((VAL.match(/[0-9]/) && VAL<=30) || !VAL) return true; else return false;",
                    message: "Please enter a valid TOEFL Writing score (between 0 and 30)."
                });
                jQuery("#toefl_listening").validate({
                    expression: "if ((VAL.match(/[0-9]/) && VAL<=30) || !VAL) return true; else return false;",
                    message: "Please enter a valid TOEFL Listening score (between 0 and 30)."
                });
                jQuery("#toefl_speaking").validate({
                    expression: "if ((VAL.match(/[0-9]/) && VAL<=30) || !VAL) return true; else return false;",
                    message: "Please enter a valid TOEFL Speaking score (between 0 and 30)."
                });

            });
    </script>
    <style>
        <!--
        div { font-family: inherit; }
        .lc { clear: left; float: left; width: 348px; }
        -->
    </style>
</head>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0">

<div align="center">

    <table width="865" border="0" cellpadding="0">
        <tr>
            <td>

                <table border="0" cellpadding="0" style="border-collapse: collapse" width="100%" id="table15">
                    <tr>
                        <td width="597" valign="top">
                            <table border="0" cellpadding="0" style="border-collapse: collapse" width="100%" id="table16">
                                <tr>
                                    <td height="36">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>
                                        <table border="0" cellpadding="0" style="border-collapse: collapse" width="100%" id="table17">
                                            <tr>
                                                <td width="30">&nbsp;</td>
                                                <td width="87">
                                                    <a href="index.php">
                                                        <img border="0" src="images/ssn-logo.gif" width="87" height="37" alt="SSN"></a></td>
                                                <td>&nbsp;</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="18"></td>
                                </tr>
                            </table>
                        </td>
                        <td width="268" valign="top">
                            <table border="0" cellpadding="0" style="border-collapse: collapse" width="100%" id="table18">
                                <tr>
                                    <td height="17"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <table border="0" cellpadding="0" style="border-collapse: collapse" width="90%" id="table19">
                                            <tr>
                                                <td align="center" width="20">
                                                </td>
                                                <td align="center" width="10">
                                                </td>
                                                <td align="center" width="120">
                                                </td>
                                                <td align="center" width="10">
                                                    <a href="index.php">
                                                        <img border="0" src="images/home-logo.gif" width="11" height="11" alt="Home"></a></td>
                                                <td align="center" width="10">

                                                    <a href="contact.php">

                                                        <img border="0" src="images/contact-us.gif" width="15" height="11" alt="Contact Us"></a></td>
                                                <td align="left" width="10">

                                                    <a href="sitemap.php">
                                                        <img border="0" src="images/sitemap.gif" width="15" height="11" alt="Sitemap"></a></td>
                                                <td align="left" width="10">

                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>
                                        <p align="left">
                                            <img align="left" border="0" src="images/institions-top.gif" width="600" height="40"></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <script type="text/JavaScript" src="js/qm1.js"></script>
                <ul id="qm1" class="qmmc">
                    <li><a class="qmparent" href="#"><img name="meuntop" border="0" src="images/about-ssn.gif" width="87" height="31"></a>
                        <ul>
                            <li><a class="qmparent" href="overview.php">Overview</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>

                            <li><a class="qmparent" href="founder.php">The Founder</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
                            <li><a class="qmparent" href="management.php">Management</a></li>
                            <li><a class="qmparent" href="president.php">President</a></li>
                            <li><a class="qmparent" href="faculty.php">Faculty</a></li>
                            <li><a class="qmparent" target="_blank" href="pdf/Brochure.pdf">Brochure</a></li>
                        </ul>
                    </li>
                    <li><a class="qmparent" href="cmu_colb.php"><img name="meuntop1" border="0" src="images/institution.gif" width="65" height="31"></a>

                    </li>
                    <li><a class="qmparent" href="#"><img name="meuntop2" border="0" src="images/programs.gif" width="87" height="31"></a>
                        <ul>

                            <li><a class="qmparent" href="programs.php">MSIT-SE</a></li>

                        </ul>
                    </li>
                    <li><a class="qmparent" href="#"><img name="meuntop3" border="0" src="images/admission.gif" width="94" height="31"></a>
                        <ul>
                            <li><a class="qmparent" href="admissions_2016.php">Admissions 2016</a></li>
                            <li><a class="qmparent" href="msit_admissions.php">MSIT-SE</a></li>
                            <li><a class="qmparent" href="faq_2012.php">FAQ & Help</a></li>

                        </ul>
                    </li>
                    <li><a class="qmparent" href="careers.php"><img name="meuntop4" border="0" src="images/career-ssn.gif" width="119" height="31"></a>
                    </li>

                    <li><a class="qmparent" href="students.php"><img name="meuntop5" border="0" src="images/scholarship.gif" width="90" height="31"></a></li>
                    <li><a class="qmparent" href="photo.php">
                            <img name="meuntop6" border="0" src="images/media.gif" width="120" height="31"></a>
                        <ul>


                        </ul>
                    </li>
                    <li><a class="qmparent" href="services.php"><img name="meuntop7" border="0" src="images/sport.gif" width="95" height="31"></a>


                    </li>
                    <li><a class="qmparent" href="alumni.php" ><img name="meuntop8" border="0" onchange="this.src='images/alumini-on.gif'" src="images/alumini.gif" width="69" height="31"></a>
                </ul>
                <script type="text/javascript">
                    qm_create(1,false,0,500,false,false,false,false);
                </script>
            </td>
        </tr>
        <tr>
            <td height="18"></td>
        </tr>
        <tr>
            <td>
                <table border="0" cellpadding="0" style="border-collapse: collapse" width="100%" id="table5">
                    <tr>
                        <td>
                            <table border="0" cellpadding="0" style="border-collapse: collapse" width="100%" id="table14">
                                <tr>
                                    <td colspan="2">
                                        <img border="0" src="images/up-line.gif" width="861" height="1"></td>
                                </tr>
                                <tr>
                                    <td width="860">
                                        <img border="0" src="images/msit.jpg" width="860" height="179"></td>
                                    <td>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <img border="0" src="images/center-down-line.gif" width="861" height="5"></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <P align="right"><span><a class="contentred" href="index.php">
                                                    <span style="text-decoration: none">Home</span></a></span><span class="contentbottom"><b> /
                                                    Admissions</b>&nbsp;&nbsp; </span></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <td class="main" colspan="2" valign="top">
            <h2 align="center" class="contentblock">MSIT-SE Application 2016-17</h2>
            <p align="left">Welcome, <b><?php echo $_SESSION["name"].'!'?></b>
            <span style="float:right;"><a href="profile.php">Profile</a> |
            <a href="logout.php">Logout</a></span></p>
            <div class="TabBody">
                <table width="106%">
                    <tr>
                        <td style="font-size:12px">
                            <a href="personal.php">Personal Details</a>
                        </td>
                        <td style="font-size:12px">
                            <b>Education Details</b>
                        </td>
                        <td style="font-size:12px">
                            <a href="essays.php">Essays</a>
                        </td>
                        <td style="font-size:12px">
                            <a href="documents.php">Document Uploads</a>
                        </td>
                        <td style="font-size:12px">
                            <a href="validation.php">Application Validation</a>
                        </td>
                        <td style="font-size:12px">
                            <a href="preview.php">Preview</a>
                        </td>
                        <td style="font-size:12px">
                            <a href="payment.php">Submit and Pay</a>
                        </td>
                    </tr>
                </table>
            </div>
            <div align="center">
                <form name="education" action="education.php" method="post" class="AdvancedForm">
                    <table align="center" cellpadding="3" cellspacing="2">
                        <tr>
                            <td>
                                <b>Education Details:</b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Secondary School Examination (X Standard)</b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Board
                            </td>
                            <td>
                                <?php
                                if($x_board == 'cbse')
                                {
                                    echo "<input type=\"radio\" name=\"x_board\" id=\"x_board\" value=\"cbse\" checked=\"checked\" required/> CBSE
                                    <input type=\"radio\" name=\"x_board\" id=\"x_board\" value=\"icse\"/> ICSE
                                    <input type=\"radio\" name=\"x_board\" id=\"x_board\" value=\"matric\"/> Matric
                                    <input type=\"radio\" name=\"x_board\" id=\"x_board\" value=\"stateboard\"/> State Board";
                                }
                                elseif($x_board == 'icse')
                                {
                                    echo "<input type=\"radio\" name=\"x_board\" id=\"x_board\" value=\"cbse\" required/> CBSE
                                    <input type=\"radio\" name=\"x_board\" id=\"x_board\" value=\"icse\" checked=\"checked\"/> ICSE
                                    <input type=\"radio\" name=\"x_board\" id=\"x_board\" value=\"matric\"/> Matric
                                    <input type=\"radio\" name=\"x_board\" id=\"x_board\" value=\"stateboard\"/> State Board";
                                }
                                elseif($x_board == 'matric')
                                {
                                    echo "<input type=\"radio\" name=\"x_board\" id=\"x_board\" value=\"cbse\" required/> CBSE
                                    <input type=\"radio\" name=\"x_board\" id=\"x_board\" value=\"icse\" /> ICSE
                                    <input type=\"radio\" name=\"x_board\" id=\"x_board\" value=\"matric\" checked=\"checked\"/> Matric
                                    <input type=\"radio\" name=\"x_board\" id=\"x_board\" value=\"stateboard\"/> State Board";
                                }
                                elseif($x_board == 'stateboard')
                                {
                                    echo "<input type=\"radio\" name=\"x_board\" id=\"x_board\" value=\"cbse\" required/> CBSE
                                    <input type=\"radio\" name=\"x_board\" id=\"x_board\" value=\"icse\" /> ICSE
                                    <input type=\"radio\" name=\"x_board\" id=\"x_board\" value=\"matric\" /> Matric
                                    <input type=\"radio\" name=\"x_board\" id=\"x_board\" value=\"stateboard\" checked=\"checked\"/> State Board";
                                }
                                else
                                {
                                    echo "<input type=\"radio\" name=\"x_board\" id=\"x_board\" value=\"cbse\" required/> CBSE
                                    <input type=\"radio\" name=\"x_board\" id=\"x_board\" value=\"icse\" /> ICSE
                                    <input type=\"radio\" name=\"x_board\" id=\"x_board\" value=\"matric\" /> Matric
                                    <input type=\"radio\" name=\"x_board\" id=\"x_board\" value=\"stateboard\"/> State Board";
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Institution
                            </td>
                            <td>
                                <input type="text" name="x_inst" id="x_inst" size="50" value="<?php echo $x_inst ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Location
                            </td>
                        </tr>
                        <tr>
                            <td>
                                City
                            </td>
                            <td>
                                <input type="text" name="x_city" id="x_city" value="<?php echo $x_city ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                State
                            </td>
                            <td>
                                <select name="x_state" required>
                                    <option value="<?php echo $x_state ?>" selected><?php echo $x_state ?></option>
                                    <option value='Andaman and Nicobar Islands'>Andaman and Nicobar Islands</option>
                                    <option value='Andhra Pradesh'>Andhra Pradesh</option>
                                    <option value='Arunachal Pradesh'>Arunachal Pradesh</option>
                                    <option value='Assam'>Assam</option>
                                    <option value='Bihar'>Bihar</option>
                                    <option value='Chandigarh'>Chandigarh</option>
                                    <option value='Chhattisgarh'>Chhattisgarh</option>
                                    <option value='Dadra and Nagar Haveli'>Dadra and Nagar Haveli</option>
                                    <option value='Daman and Diu'>Daman and Diu</option>
                                    <option value='Delhi'>Delhi</option>
                                    <option value='Goa'>Goa</option>
                                    <option value='Gujarat'>Gujarat</option>
                                    <option value='Haryana'>Haryana</option>
                                    <option value='Himachal Pradesh'>Himachal Pradesh</option>
                                    <option value='Jammu and Kashmir'>Jammu and Kashmir</option>
                                    <option value='Jharkhand'>Jharkhand</option>
                                    <option value='Karnataka'>Karnataka</option>
                                    <option value='Kerala'>Kerala</option>
                                    <option value='Lakshadweep'>Lakshadweep</option>
                                    <option value='Madhya Pradesh'>Madhya Pradesh</option>
                                    <option value='Maharashtra'>Maharashtra</option>
                                    <option value='Manipur'>Manipur</option>
                                    <option value='Meghalaya'>Meghalaya</option>
                                    <option value='Mizoram'>Mizoram</option>
                                    <option value='Nagaland'>Nagaland</option>
                                    <option value='Odisha'>Odisha</option>
                                    <option value='Puducherry'>Puducherry</option>
                                    <option value='Punjab'>Punjab</option>
                                    <option value='Rajasthan'>Rajasthan</option>
                                    <option value='Sikkim'>Sikkim</option>
                                    <option value='Tamil Nadu'>Tamil Nadu</option>
                                    <option value='Telangana'>Telangana</option>
                                    <option value='Tripura'>Tripura</option>
                                    <option value='Uttar Pradesh'>Uttar Pradesh</option>
                                    <option value='Uttarakhand'>Uttarakhand</option>
                                    <option value='West Bengal'>West Bengal</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Major Subjects
                            </td>
                            <td>
                                <input type="text" name="x_major" id="x_major" size="50" value="<?php echo $x_major ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Percentage of Marks
                            </td>
                            <td>
                                <input type="text" size=2 maxlength=2 name="x_marks" id="x_marks" value="<?php echo $x_marks ?>"> %
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Year of Passing
                            </td>
                            <td>
                                <input type="text" size=2 name="x_year" id="x_year" maxlength="4" value="<?php echo $x_year ?>">
                            </td>
                        </tr>
                        <br><br><br>
                        <tr>
                            <td>
                                <b>Senior School Examination or Pre-University (PUC) (XII Standard)</b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Board
                            </td>
                            <td>
                                <?php
                                if($xii_board == 'cbse')
                                {
                                    echo "<input type=\"radio\" name=\"xii_board\" id=\"xii_board\" value=\"cbse\" checked=\"checked\" required/> CBSE
                                    <input type=\"radio\" name=\"xii_board\" id=\"xii_board\" value=\"icse\"/> ICSE
                                    <input type=\"radio\" name=\"xii_board\" id=\"xii_board\" value=\"stateboard\"/> State Board";
                                }
                                elseif($xii_board == 'icse')
                                {
                                    echo "<input type=\"radio\" name=\"xii_board\" id=\"xii_board\" value=\"cbse\" required/> CBSE
                                    <input type=\"radio\" name=\"xii_board\" id=\"xii_board\" value=\"icse\" checked=\"checked\"/> ICSE
                                    <input type=\"radio\" name=\"xii_board\" id=\"xii_board\" value=\"stateboard\"/> State Board";
                                }
                                elseif($xii_board == 'stateboard')
                                {
                                    echo "<input type=\"radio\" name=\"xii_board\" id=\"xii_board\" value=\"cbse\" required/> CBSE
                                    <input type=\"radio\" name=\"xii_board\" id=\"xii_board\" value=\"icse\" /> ICSE
                                    <input type=\"radio\" name=\"xii_board\" id=\"xii_board\" value=\"stateboard\" checked=\"checked\"/> State Board";
                                }
                                else
                                {
                                    echo "<input type=\"radio\" name=\"xii_board\" id=\"xii_board\" value=\"cbse\" required/> CBSE
                                    <input type=\"radio\" name=\"xii_board\" id=\"xii_board\" value=\"icse\" /> ICSE
                                    <input type=\"radio\" name=\"xii_board\" id=\"xii_board\" value=\"stateboard\"/> State Board";
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Institution
                            </td>
                            <td>
                                <input type="text" name="xii_inst" id="xii_inst" size="50" value="<?php echo $xii_inst ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Location
                            </td>
                        </tr>
                        <tr>
                            <td>
                                City
                            </td>
                            <td>
                                <input type="text" name="xii_city" id="xii_city" value="<?php echo $xii_city ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                State
                            </td>
                            <td>
                                <select name="xii_state" required>
                                    <option value="<?php echo $xii_state ?>" selected><?php echo $xii_state ?></option>
                                    <option value='Andaman and Nicobar Islands'>Andaman and Nicobar Islands</option>
                                    <option value='Andhra Pradesh'>Andhra Pradesh</option>
                                    <option value='Arunachal Pradesh'>Arunachal Pradesh</option>
                                    <option value='Assam'>Assam</option>
                                    <option value='Bihar'>Bihar</option>
                                    <option value='Chandigarh'>Chandigarh</option>
                                    <option value='Chhattisgarh'>Chhattisgarh</option>
                                    <option value='Dadra and Nagar Haveli'>Dadra and Nagar Haveli</option>
                                    <option value='Daman and Diu'>Daman and Diu</option>
                                    <option value='Delhi'>Delhi</option>
                                    <option value='Goa'>Goa</option>
                                    <option value='Gujarat'>Gujarat</option>
                                    <option value='Haryana'>Haryana</option>
                                    <option value='Himachal Pradesh'>Himachal Pradesh</option>
                                    <option value='Jammu and Kashmir'>Jammu and Kashmir</option>
                                    <option value='Jharkhand'>Jharkhand</option>
                                    <option value='Karnataka'>Karnataka</option>
                                    <option value='Kerala'>Kerala</option>
                                    <option value='Lakshadweep'>Lakshadweep</option>
                                    <option value='Madhya Pradesh'>Madhya Pradesh</option>
                                    <option value='Maharashtra'>Maharashtra</option>
                                    <option value='Manipur'>Manipur</option>
                                    <option value='Meghalaya'>Meghalaya</option>
                                    <option value='Mizoram'>Mizoram</option>
                                    <option value='Nagaland'>Nagaland</option>
                                    <option value='Odisha'>Odisha</option>
                                    <option value='Puducherry'>Puducherry</option>
                                    <option value='Punjab'>Punjab</option>
                                    <option value='Rajasthan'>Rajasthan</option>
                                    <option value='Sikkim'>Sikkim</option>
                                    <option value='Tamil Nadu'>Tamil Nadu</option>
                                    <option value='Telangana'>Telangana</option>
                                    <option value='Tripura'>Tripura</option>
                                    <option value='Uttar Pradesh'>Uttar Pradesh</option>
                                    <option value='Uttarakhand'>Uttarakhand</option>
                                    <option value='West Bengal'>West Bengal</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Major Subjects
                            </td>
                            <td>
                                <input type="text" name="xii_major" id="xii_major" size="50" value="<?php echo $xii_major ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Percentage of Marks
                            </td>
                            <td>
                                <input type="text" size=2 maxlength=2 name="xii_marks" id="xii_marks" value="<?php echo $xii_marks ?>"> %
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Year of Passing
                            </td>
                            <td>
                                <input type="text" size=2 name="xii_year" id="xii_year" maxlength="4" value="<?php echo $xii_year ?>">
                            </td>
                        </tr>
                        <br><br><br>
                        <tr>
                            <td>
                                <b>Undergraduate Degree</b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Degree
                            </td>
                            <td>
                                <?php
                                if($ug_degree == 'B.E.')
                                {
                                    echo "<input type=\"radio\" name=\"ug_degree\" id=\"ug_degree\" value=\"B.E.\" checked=\"checked\" required/> B.E.
                                    <input type=\"radio\" name=\"ug_degree\" id=\"ug_degree\" value=\"B.Tech.\"/> B.Tech.
                                        <input type=\"radio\" name=\"ug_degree\" id=\"ug_degree\" value=\"MCA.\"/> MCA";
                                }
                                elseif($ug_degree == 'B.Tech.')
                                {
                                    echo "<input type=\"radio\" name=\"ug_degree\" id=\"ug_degree\" value=\"B.E.\" required/> B.E.
                                    <input type=\"radio\" name=\"ug_degree\" id=\"ug_degree\" value=\"B.Tech.\" checked=\"checked\"/> B.Tech.
                                    <input type=\"radio\" name=\"ug_degree\" id=\"ug_degree\" value=\"MCA.\"/> MCA";
                                }
                                elseif($ug_degree == 'MCA')
                                {
                                    echo "<input type=\"radio\" name=\"ug_degree\" id=\"ug_degree\" value=\"B.E.\" required/> B.E.
                                    <input type=\"radio\" name=\"ug_degree\" id=\"ug_degree\" value=\"B.Tech.\" /> B.Tech.
                                    <input type=\"radio\" name=\"ug_degree\" id=\"ug_degree\" value=\"MCA.\" checked=\"checked\"/> MCA";
                                }
                                else
                                {
                                    echo "<input type=\"radio\" name=\"ug_degree\" id=\"ug_degree\" value=\"B.E.\" required/> B.E.
                                    <input type=\"radio\" name=\"ug_degree\" id=\"ug_degree\" value=\"B.Tech.\"/> B.Tech.
                                    <input type=\"radio\" name=\"ug_degree\" id=\"ug_degree\" value=\"MCA.\"/> MCA";
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Institution
                            </td>
                            <td>
                                <input type="text" name="ug_inst" id="ug_inst" size="50" value="<?php echo $ug_inst ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                University
                            </td>
                            <td>
                                <input type="text" name="ug_univ" id="ug_univ" size="50" value="<?php echo $ug_univ ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Location
                            </td>
                        </tr>
                        <tr>
                            <td>
                                City
                            </td>
                            <td>
                                <input type="text" name="ug_city" id="ug_city" value="<?php echo $ug_city ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                State
                            </td>
                            <td>
                                <select name="ug_state" required>
                                    <option value="<?php echo $ug_state ?>" selected><?php echo $ug_state ?></option>
                                    <option value='Andaman and Nicobar Islands'>Andaman and Nicobar Islands</option>
                                    <option value='Andhra Pradesh'>Andhra Pradesh</option>
                                    <option value='Arunachal Pradesh'>Arunachal Pradesh</option>
                                    <option value='Assam'>Assam</option>
                                    <option value='Bihar'>Bihar</option>
                                    <option value='Chandigarh'>Chandigarh</option>
                                    <option value='Chhattisgarh'>Chhattisgarh</option>
                                    <option value='Dadra and Nagar Haveli'>Dadra and Nagar Haveli</option>
                                    <option value='Daman and Diu'>Daman and Diu</option>
                                    <option value='Delhi'>Delhi</option>
                                    <option value='Goa'>Goa</option>
                                    <option value='Gujarat'>Gujarat</option>
                                    <option value='Haryana'>Haryana</option>
                                    <option value='Himachal Pradesh'>Himachal Pradesh</option>
                                    <option value='Jammu and Kashmir'>Jammu and Kashmir</option>
                                    <option value='Jharkhand'>Jharkhand</option>
                                    <option value='Karnataka'>Karnataka</option>
                                    <option value='Kerala'>Kerala</option>
                                    <option value='Lakshadweep'>Lakshadweep</option>
                                    <option value='Madhya Pradesh'>Madhya Pradesh</option>
                                    <option value='Maharashtra'>Maharashtra</option>
                                    <option value='Manipur'>Manipur</option>
                                    <option value='Meghalaya'>Meghalaya</option>
                                    <option value='Mizoram'>Mizoram</option>
                                    <option value='Nagaland'>Nagaland</option>
                                    <option value='Odisha'>Odisha</option>
                                    <option value='Puducherry'>Puducherry</option>
                                    <option value='Punjab'>Punjab</option>
                                    <option value='Rajasthan'>Rajasthan</option>
                                    <option value='Sikkim'>Sikkim</option>
                                    <option value='Tamil Nadu'>Tamil Nadu</option>
                                    <option value='Telangana'>Telangana</option>
                                    <option value='Tripura'>Tripura</option>
                                    <option value='Uttar Pradesh'>Uttar Pradesh</option>
                                    <option value='Uttarakhand'>Uttarakhand</option>
                                    <option value='West Bengal'>West Bengal</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Major
                            </td>
                            <td>
                                <select name="ug_major" required>
                                    <option value="<?php echo $ug_major ?>" selected><?php echo $ug_major ?></option>
                                    <option value='Aeronautical Engineering'>Aeronautical Engineering</option>
                                    <option value='Automobile Engineering'>Automobile Engineering</option>
                                    <option value='Chemical Engineering'>Chemical Engineering</option>
                                    <option value='Civil Engineering'>Civil Engineering</option>
                                    <option value='Computer Science and Engineering'>Computer Science and Engineering</option>
                                    <option value='Electrical and Electronics Engineering'>Electrical and Electronics Engineering</option>
                                    <option value='Electronics and Communication Engineering'>Electronics and Communication Engineering</option>
                                    <option value='Electronics & Instrumentation Engineering'>Electronics & Instrumentation Engineering</option>
                                    <option value='Industrial Engineering'>Industrial Engineering</option>
                                    <option value='Information Technology'>Information Technology</option>
                                    <option value='Mechanical Engineering'>Mechanical Engineering</option>
                                    <option value='Production Engineering'>Production Engineering</option>
                                    <option value='Other'>Others (Please specify below)</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Other (not listed above):
                            </td>
                            <td>
                                <input type="text" name="ug_major_other" id="ug_major_other" value="<?php echo $ug_major_other ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Percentage of Marks (or if GPA, in percentage)
                            </td>
                            <td>
                                <input type="text" size=1 name="ug_marks1" id="ug_marks1" value="<?php echo $ug_marks1 ?>" maxlength="2"> .
                                <input type="text" size=1 name="ug_marks2" id="ug_marks2" value="<?php echo $ug_marks2 ?>" maxlength="1"> %
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Years
                            </td>
                            <td>
                                <input type="text" size=2 name="ug_year_from" id="ug_year_from" maxlength="4" value="<?php echo $ug_year_from ?>"> to
                                <input type="text" size=2 name="ug_year_to" id="ug_year_to" maxlength="4" value="<?php echo $ug_year_to ?>">
                            </td>
                        </tr>
                        <br><br><br>
                        <tr>
                            <td>
                                <b>Postgraduate Degree</b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Degree
                            </td>
                            <td>
                                <?php
                                if($pg_degree == 'M.E.')
                                {
                                    echo "<input type=\"radio\" name=\"pg_degree\" id=\"pg_degree\" value=\"M.E.\" checked=\"checked\"/> M.E.
                                    <input type=\"radio\" name=\"pg_degree\" id=\"pg_degree\" value=\"M.Tech.\"/> M.Tech.
                                    <input type=\"radio\" name=\"pg_degree\" id=\"pg_degree\" value=\"M.Sc.\"/> M.Sc.
                                    <input type=\"radio\" name=\"pg_degree\" id=\"pg_degree\" value=\"MBA\"/> MBA
                                    <input type=\"radio\" name=\"pg_degree\" id=\"pg_degree\" value=\"MCA\"/> MCA";
                                }
                                elseif($pg_degree == 'M.Tech.')
                                {
                                    echo "<input type=\"radio\" name=\"pg_degree\" id=\"pg_degree\" value=\"M.Tech.\" checked=\"checked\"/> M.Tech.
                                    <input type=\"radio\" name=\"pg_degree\" id=\"pg_degree\" value=\"M.E.\"/> M.E.
                                    <input type=\"radio\" name=\"pg_degree\" id=\"pg_degree\" value=\"M.Sc.\"/> M.Sc.
                                    <input type=\"radio\" name=\"pg_degree\" id=\"pg_degree\" value=\"MBA\"/> MBA
                                    <input type=\"radio\" name=\"pg_degree\" id=\"pg_degree\" value=\"MCA\"/> MCA";
                                }
                                elseif($pg_degree == 'M.Sc.')
                                {
                                    echo "<input type=\"radio\" name=\"pg_degree\" id=\"pg_degree\" value=\"M.Sc.\" checked=\"checked\"/> M.Sc.
                                    <input type=\"radio\" name=\"pg_degree\" id=\"pg_degree\" value=\"M.E.\"/> M.E.
                                    <input type=\"radio\" name=\"pg_degree\" id=\"pg_degree\" value=\"M.Tech.\"/> M.Tech.
                                    <input type=\"radio\" name=\"pg_degree\" id=\"pg_degree\" value=\"MBA\"/> MBA
                                    <input type=\"radio\" name=\"pg_degree\" id=\"pg_degree\" value=\"MCA\"/> MCA";
                                }
                                elseif($pg_degree == 'MBA')
                                {
                                    echo "<input type=\"radio\" name=\"pg_degree\" id=\"pg_degree\" value=\"MBA\" checked=\"checked\"/> MBA
                                    <input type=\"radio\" name=\"pg_degree\" id=\"pg_degree\" value=\"M.E.\"/> M.E.
                                    <input type=\"radio\" name=\"pg_degree\" id=\"pg_degree\" value=\"M.Tech.\"/> M.Tech.
                                    <input type=\"radio\" name=\"pg_degree\" id=\"pg_degree\" value=\"M.Sc.\"/> M.Sc.
                                    <input type=\"radio\" name=\"pg_degree\" id=\"pg_degree\" value=\"MCA\"/> MCA";
                                }
                                elseif($ug_degree == 'MCA')
                                {
                                    echo "<input type=\"radio\" name=\"pg_degree\" id=\"pg_degree\" value=\"MCA\" checked=\"checked\"/> MCA
                                    <input type=\"radio\" name=\"pg_degree\" id=\"pg_degree\" value=\"M.E.\"/> M.E.
                                    <input type=\"radio\" name=\"pg_degree\" id=\"pg_degree\" value=\"M.Tech.\"/> M.Tech.
                                    <input type=\"radio\" name=\"pg_degree\" id=\"pg_degree\" value=\"M.Sc.\"/> M.Sc.
                                    <input type=\"radio\" name=\"pg_degree\" id=\"pg_degree\" value=\"MBA\"/> MBA";
                                }
                                else
                                {
                                    echo "<input type=\"radio\" name=\"pg_degree\" id=\"pg_degree\" value=\"M.E.\"/> M.E.
                                    <input type=\"radio\" name=\"pg_degree\" id=\"pg_degree\" value=\"M.Tech.\"/> M.Tech.
                                    <input type=\"radio\" name=\"pg_degree\" id=\"pg_degree\" value=\"M.Sc.\"/> M.Sc.
                                    <input type=\"radio\" name=\"pg_degree\" id=\"pg_degree\" value=\"MBA\"/> MBA
                                    <input type=\"radio\" name=\"pg_degree\" id=\"pg_degree\" value=\"MCA\"/> MCA";
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Institution
                            </td>
                            <td>
                                <input type="text" name="pg_inst" id="pg_inst" size="50" value="<?php echo $pg_inst ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                University
                            </td>
                            <td>
                                <input type="text" name="pg_univ" id="pg_univ" size="50" value="<?php echo $pg_univ ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Major
                            </td>
                            <td>
                                <input type="text" name="pg_major" id="pg_major" size="50" value="<?php echo $pg_major ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Percentage of Marks (or if GPA, in percentage)
                            </td>
                            <td>
                                <input type="text" size=1 name="pg_marks1" id="pg_marks1" value="<?php echo $pg_marks1 ?>" maxlength="2"> .
                                <input type="text" size=1 name="pg_marks2" id="pg_marks2" value="<?php echo $pg_marks2 ?>" maxlength="1"> %
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Years
                            </td>
                            <td>
                                <input type="text" size=2 name="pg_year_from" id="pg_year_from" maxlength="4" value="<?php echo $pg_year_from ?>"> to
                                <input type="text" size=2 name="pg_year_to" id="pg_year_to" maxlength="4" value="<?php echo $pg_year_to ?>">
                            </td>
                        </tr>
                        <br><br><br>
                        <tr>
                            <td>
                                <b>GRE</b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Analytical Writing Assessment (AWA)
                            </td>
                            <td>
                                <select name="gre_awa" required>
                                    <option value="<?php echo $gre_awa ?>" selected><?php echo $gre_awa ?></option>
                                    <option value=0.0>0.0</option>
                                    <option value=0.5>0.5</option>
                                    <option value=1.0>1.0</option>
                                    <option value=1.5>1.5</option>
                                    <option value=2.0>2.0</option>
                                    <option value=2.5>2.5</option>
                                    <option value=3.0>3.0</option>
                                    <option value=3.5>3.5</option>
                                    <option value=4.0>4.0</option>
                                    <option value=4.5>4.5</option>
                                    <option value=5.0>5.0</option>
                                    <option value=5.5>5.5</option>
                                    <option value=6.0>6.0</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Verbal
                            </td>
                            <td>
                                <input type="text" name="gre_verbal" id="gre_verbal" maxlength="3" value="<?php echo $gre_verbal ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Quantitative
                            </td>
                            <td>
                                <input type="text" name="gre_quant" id="gre_quant" maxlength="3" value="<?php echo $gre_quant ?>">
                            </td>
                        </tr>
                        <br><br><br>
                        <tr>
                            <td>
                                <b>TOEFL</b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Reading
                            </td>
                            <td>
                                <input type="text" name="toefl_reading" id="toefl_reading" maxlength="2" value="<?php echo $toefl_reading ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Writing
                            </td>
                            <td>
                                <input type="text" name="toefl_writing" id="toefl_writing" maxlength="2" value="<?php echo $toefl_writing ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Listening
                            </td>
                            <td>
                                <input type="text" name="toefl_listening" id="toefl_listening" maxlength="2" value="<?php echo $toefl_listening ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Speaking
                            </td>
                            <td>
                                <input type="text" name="toefl_speaking" id="toefl_speaking" maxlength="2" value="<?php echo $toefl_speaking ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" value="Save" id="FormSubmit" />
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </td>

        <tr>
            <td width="861">
                <br><br><br>
                <table width="865" border="0" cellpadding="0" id="table33">
                    <tr>
                        <td width="861">
                            <img border="0" src="images/bottom-line.gif" width="861" height="6px"></td>
                    </tr>
                    <tr>
                        <td>
                            <table border="0" cellpadding="0" style="border-collapse: collapse" width="100%" id="table34">
                                <tr>
                                    <td width="13">&nbsp;</td>
                                    <td width="11">
                                        <img border="0" src="images/copyright.gif" width="11" height="10" alt="Copyright"></td>
                                    <td width="3"></td>
                                    <td class="contentbottom">Copyright 2015 SSN School of Advanced Software Engineering. All rights reserved. </td>
                                    <td width="38">&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

</div>

<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
    _uacct = "UA-3737455-1";
    urchinTracker();
</script>

</body>
<script type="text/javascript">
    qm_create(1,false,0,500,false,false,false,false);
    document.meuntop3.src = "images/admission-on.gif";
</script>
</html>


