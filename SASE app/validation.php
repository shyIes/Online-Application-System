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

$select = "SELECT * FROM personal_details WHERE applicant_id='$appid'";
$result = mysql_query($select) or die(mysql_error());
$row = mysql_fetch_assoc($result);

$dob = $row['date_of_birth'];
$gender = $row['gender'];
$p_address_line1 = $row['p_address_line1'];
$p_address_line2 = $row['p_address_line2'];
$p_address_city = $row['p_address_city'];
$p_address_state = $row['p_address_state'];
$p_address_pincode = $row['p_address_pincode'];

$select = "SELECT * FROM education_details WHERE applicant_id='$appid'";
$result = mysql_query($select) or die(mysql_error());
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

$select = "SELECT * FROM essays WHERE applicant_id='$appid'";
$result = mysql_query($select) or die(mysql_error());
$row = mysql_fetch_assoc($result);

$acads_file = $row['acads_file'];
$acads_type = $row['acads_type'];
$acads_size = $row['acads_size'];
$acads_status = $row['acads_status'];

$exp_file = $row['exp_file'];
$exp_type= $row['exp_type'];
$exp_size = $row['exp_size'];
$exp_status = $row['exp_status'];

$cri_file = $row['cri_file'];
$cri_type = $row['cri_type'];
$cri_size = $row['cri_size'];
$cri_status = $row['cri_status'];

$select = "SELECT * FROM document_uploads WHERE applicant_id='$appid'";
$result = mysql_query($select) or die(mysql_error());
$row = mysql_fetch_assoc($result);

$x_status = $row['x_status'];
$xii_status = $row['xii_status'];
$ug_status = $row['ug_status'];
$resume_status = $row['resume_status'];
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
                            <a href="education.php">Education Details</a>
                        </td>
                        <td style="font-size:12px">
                            <a href="essays.php">Essays</a>
                        </td>
                        <td style="font-size:12px">
                            <a href="documents.php">Document Uploads</a>
                        </td>
                        <td style="font-size:12px">
                            <b>Application Validation</b>
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
                <br><br><br>
               <form name="validation" method="post" class="AdvancedForm">
                    <table align="center" cellpadding="3" cellspacing="2">
                        <tr>
                            <td>
                                <b>Application Validation</b>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="70">
                                <b>This page lists those fields which are mandatory but not yet have been filled by you. </b>
                                <b>You can visit the corresponding page to complete the details.</b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php
                                if(empty($x_board)) {
                                echo "X Board";
                                ?>
                            </td>
                            <td>
                                <?php
                                echo "<a href=\"education.php\">Education Details</a>";
                                $flag = 1;
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php
                                if(empty($x_inst)) {
                                echo "X Institution";
                                ?>
                            </td>
                            <td>
                                <?php
                                echo "<a href=\"education.php\">Education Details</a>";
                                $flag = 1;
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php
                                if(empty($x_city)) {
                                    echo "X City";
                                ?>
                            </td>
                            <td>
                                <?php
                                echo "<a href=\"education.php\">Education Details</a>";
                                $flag = 1;
                                  }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php
                                if(empty($x_state)){
                                    echo "X State";
                                ?>
                            </td>
                            <td>
                                <?php
                               echo "<a href=\"education.php\">Education Details</a>";
                                $flag = 1;
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php
                                if(empty($x_major)){
                                    echo "X Major";
                                ?>
                            </td>
                            <td>
                                <?php
                                echo "<a href=\"education.php\">Education Details</a>";
                                $flag = 1;
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php
                                if(empty($x_marks)) {
                                    echo "X Marks";
                                ?>
                            </td>
                            <td>
                                <?php
                               echo "<a href=\"education.php\">Education Details</a>";
                                $flag = 1;
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php
                                if(empty($x_year)) {
                                    echo "X Year";
                                ?>
                            </td>
                            <td>
                                <?php
                               echo "<a href=\"education.php\">Education Details</a>";
                                $flag = 1;
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php
                                if(empty($xii_board)) {
                                    echo "XII Board";
                                ?>
                            </td>
                            <td>
                                <?php
                               echo "<a href=\"education.php\">Education Details</a>";
                                $flag = 1;
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php
                                if(empty($xii_inst)) {
                                echo "XII Institution";
                                ?>
                            </td>
                            <td>
                                <?php
                               echo" <a href=\"education.php\">Education Details</a>";
                                $flag = 1;
                                  }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php
                                if(empty($xii_city)){
                                echo "XII City";
                                ?>
                            </td>
                            <td>
                                <?php
                               echo "<a href=\"education.php\">Education Details</a>";
                                $flag = 1;
                                  }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php
                                if(empty($xii_state)){
                                    echo "XII State";
                                ?>
                            </td>
                            <td>
                                <?php
                                echo "<a href=\"education.php\">Education Details</a>";
                                $flag = 1;
                                  }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php
                                if(empty($xii_major)) {
                                    echo "XII Major";
                                ?>
                            </td>
                            <td>
                                <?php
                                echo "<a href=\"education.php\">Education Details</a>";
                                $flag = 1;
                                  }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php
                                if(empty($xii_marks)) {
                                    echo "XII Marks";
                                ?>
                            </td>
                            <td>
                                <?php
                                echo "<a href=\"education.php\">Education Details</a>";
                                $flag = 1;
                                  }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php
                                if(empty($xii_year)) {
                                    echo "XIIth Year";
                                ?>
                            </td>
                            <td>
                                <?php
                                echo "<a href=\"education.php\">Education Details</a>";
                                $flag = 1;
                                  }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php
                                if(empty($ug_degree)){
                                    echo "UG Degree";
                                ?>
                            </td>
                            <td>
                                <?php
                               echo "<a href=\"education.php\">Education Details</a>";
                                $flag = 1;
                                  }
                                ?>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <?php
                                if(empty($ug_inst)){
                                echo "UG Institution";
                                ?>
                            </td>
                            <td>
                                <?php
                                echo "<a href=\"education.php\">Education Details</a>";
                                $flag = 1;
                                  }
                                ?>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <?php
                                if(empty($ug_univ)) {
                                    echo "UG University";
                                ?>
                            </td>
                            <td>
                                <?php
                                echo "<a href=\"education.php\">Education Details</a>";
                                $flag = 1;
                                  }
                                ?>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <?php
                                if(empty($ug_city)) {
                                    echo "UG City";
                                ?>
                            </td>
                            <td>
                                <?php
                                echo "<a href=\"education.php\">Education Details</a>";
                                $flag = 1;
                                  }
                                ?>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <?php
                                if(empty($ug_state)) {
                                    echo "UG State";
                                ?>
                            </td>
                            <td>
                                <?php
                                echo "<a href=\"education.php\">Education Details</a>";
                                $flag = 1;
                                  }
                                ?>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <?php
                                if($ug_major=="Others (Please specify below)"){

                                {
                                    if(empty($ug_major_other)) echo "UG Major";
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                               echo " <a href=\"education.php\">Education Details</a>";
                                $flag = 1;
                                  }
                                ?>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <?php
                                if(empty($ug_marks1) && empty($ug_marks2)) {
                                    echo "UG Marks";
                                ?>
                            </td>
                            <td>
                                <?php
                               echo " <a href=\"education.php\">Education Details</a>";
                                $flag = 1;
                                  }
                                ?>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <?php
                                if(empty($ug_year_from)){
                                    echo "UG Year from";
                                ?>
                            </td>
                            <td>
                                <?php
                                echo "<a href=\"education.php\">Education Details</a>";
                                $flag = 1;
                                  }
                                ?>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <?php
                                if(empty($ug_year_to)) {
                                    echo "UG Year to";
                                ?>
                            </td>
                            <td>
                                <?php
                                echo "<a href=\"education.php\">Education Details</a>";
                                $flag = 1;
                                  }
                                ?>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <?php
                                if($acads_status==0) {
                                    echo "Academic Achievements Document Upload ";
                                ?>
                            </td>
                            <td>
                                <?php
                               echo " <a href=\"essays.php\">Essays</a>";
                                $flag = 1;
                                  }
                                ?>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <?php
                                if($exp_status==0) {
                                    echo "Software Project Experience Upload";
                                ?>
                            </td>
                            <td>
                                <?php
                                echo "<a href=\"essays.php\">Essays</a>";
                                $flag = 1;
                                  }
                                ?>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <?php
                                if($cri_status==0) {
                                    echo "Critical Essay Upload";
                                ?>
                            </td>
                            <td>
                                <?php
                                echo "<a href=\"essays.php\">Essays</a>";
                                $flag = 1;
                                  }
                                ?>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <?php
                                if($x_status==0){
                                    echo "X Marksheet";
                                ?>
                            </td>
                            <td>
                                <?php
                                echo "<a href=\"documents.php\">Documents</a>";
                                $flag = 1;
                                  }
                                ?>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <?php
                                if($xii_status==0) {
                                    echo "XII Marksheet";
                                ?>
                            </td>
                            <td>
                                <?php
                               echo " <a href=\"documents.php\">Documents</a>";
                                $flag = 1;
                                  }
                                ?>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <?php
                                if($ug_status==0) {
                                    echo "UG Marksheet";
                                ?>
                            </td>
                            <td>
                                <?php
                               echo " <a href=\"documents.php\">Documents</a>";
                                  }
                                ?>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <?php
                                if($resume_status==0){
                                echo "Resume";
                                ?>
                            </td>
                            <td>
                                <?php
                                echo "<a href=\"documents.php\">Documents</a>";
                                    $flag = 1;
                                }
                                ?>
                            </td>
                            <?php
                            if($flag==0)
                            {
                                echo "<b><p style=color:green>All mandatory fields filled. You may proceed to <a href=\"payment.php\">pay.</a></p></b>";
                                $update = "UPDATE users SET validation_status = 1 WHERE applicant_id = '$appid'";
                                $result = mysql_query($update) or die(mysql_error());
                            }
                            ?>
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