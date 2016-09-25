<?php
require_once "session.php";
require_once "dbcontroller.php";
$username = $_SESSION["username"];
$select = "SELECT email, applicant_id FROM users WHERE email='$username'";
$result = mysql_query($select) or die('Database error '.mysql_error());
$row = mysql_fetch_assoc($result);
$appid = $row['applicant_id'];
$email = $row['email'];

$target_dir = "uploads/";
$x_file = '';
$x_DocTooLarge = false;
$x_ExtnInvalid = false;
$x_UploadOk = false;
$x_Uploaded = false;
$x_flag = false;
$x_status = 0;

$xii_file = '';
$xii_DocTooLarge = false;
$xii_ExtnInvalid = false;
$xii_UploadOk = false;
$xii_Uploaded = false;
$xii_flag = false;
$xii_status = 0;

$ug_file = '';
$ug_DocTooLarge = false;
$ug_ExtnInvalid = false;
$ug_UploadOk = false;
$ug_Uploaded = false;
$ug_flag = false;
$ug_status = 0;

$pg_file = '';
$pg_DocTooLarge = false;
$pg_ExtnInvalid = false;
$pg_UploadOk = false;
$pg_Uploaded = false;
$pg_flag = false;
$pg_status = 0;

$gre_file = '';
$gre_DocTooLarge = false;
$gre_ExtnInvalid = false;
$gre_UploadOk = false;
$gre_Uploaded = false;
$gre_flag = false;
$gre_status = 0;

$toefl_file = '';
$toefl_DocTooLarge = false;
$toefl_ExtnInvalid = false;
$toefl_UploadOk = false;
$toefl_Uploaded = false;
$toefl_flag = false;
$toefl_status = 0;

$resume_file = '';
$resume_DocTooLarge = false;
$resume_ExtnInvalid = false;
$resume_UploadOk = false;
$resume_Uploaded = false;
$resume_flag = false;
$resume_status = 0;


if(isset($_FILES["x_doc"]["name"]) && !empty($_FILES["x_doc"]["name"]))
{
    $target_file = $target_dir . basename($_FILES["x_doc"]["name"]);
    $x_UploadOk = true;

    $xFile = $target_dir . $appid . '-X_marksheet.pdf';
    $x_file = $appid . '-X_marksheet.pdf';
    $x_file_size = $_FILES["x_doc"]["size"];

    $x_filetype = pathinfo($target_file, PATHINFO_EXTENSION);


    if ($x_file_size > 1000000)
    {
        $x_DocTooLarge = true;
        $x_UploadOk = false;
    }

    if ($x_filetype != "pdf")
    {
        $x_ExtnInvalid = true;
        $x_UploadOk = false;
    }

    if($x_UploadOk)
    {
        if (move_uploaded_file($_FILES["x_doc"]["tmp_name"], $xFile))
        {
            $x_Uploaded = true;
            $x_flag = true;

            $update = "UPDATE document_uploads SET x_status=TRUE, x_file='$x_file', x_size='$x_file_size', x_type='$x_filetype'  WHERE applicant_id='$appid'";
            $result = mysql_query($update) or die(mysql_error());
        }

        else
        {
            $x_Uploaded = false;

            $update = "UPDATE document_uploads SET x_status=FALSE, x_file='', x_size='', x_type=''  WHERE applicant_id='$appid'";
            $result = mysql_query($update) or die(mysql_error());
        }
    }
}

if(isset($_FILES["xii_doc"]["name"]) && !empty($_FILES["xii_doc"]["name"]))
{
    $target_file = $target_dir . basename($_FILES["xii_doc"]["name"]);
    $xii_UploadOk = true;

    $xiiFile = $target_dir . $appid . '-XII_marksheet.pdf';
    $xii_file = $appid . '-XII_marksheet.pdf';
    $xii_file_size = $_FILES["xii_doc"]["size"];

    $xii_filetype = pathinfo($target_file, PATHINFO_EXTENSION);

    if ($xii_file_size > 1000000)
    {
        $xii_DocTooLarge = true;
        $xii_UploadOk = false;
    }

    if ($xii_filetype != "pdf")
    {
        $xii_ExtnInvalid = true;
        $xii_UploadOk = false;
    }

    if($xii_UploadOk)
    {
        if (move_uploaded_file($_FILES["xii_doc"]["tmp_name"], $xiiFile))
        {
            $xii_Uploaded = true;
            $xii_flag = true;

            $update = "UPDATE document_uploads SET xii_status=TRUE, xii_file='$xii_file', xii_size='$xii_file_size', xii_type='$xii_filetype'  WHERE applicant_id='$appid'";
            $result = mysql_query($update) or die(mysql_error());
        }

        else
        {
            $xii_Uploaded = false;

            $update = "UPDATE document_uploads SET xii_status=FALSE, xii_file='', xii_size='', xii_type=''  WHERE applicant_id='$appid'";
            $result = mysql_query($update) or die(mysql_error());
        }
    }
}

if(isset($_FILES["ug_doc"]["name"]) && !empty($_FILES["ug_doc"]["name"]))
{
    $target_file = $target_dir . basename($_FILES["ug_doc"]["name"]);
    $ug_UploadOk = true;

    $ugFile = $target_dir . $appid . '-UG_marksheet.pdf';
    $ug_file = $appid . '-UG_marksheet.pdf';
    $ug_file_size = $_FILES["ug_doc"]["size"];

    $ug_filetype = pathinfo($target_file, PATHINFO_EXTENSION);

    if ($ug_file_size > 1000000)
    {
        echo "The doc is too large ".$ug_DocTooLarge;
        $ug_DocTooLarge = true;
        $ug_UploadOk = false;
    }

    if ($ug_filetype != "pdf")
    {
        $ug_ExtnInvalid = true;
        $ug_UploadOk = false;
    }

    if($ug_UploadOk)
    {
        if (move_uploaded_file($_FILES["ug_doc"]["tmp_name"], $ugFile))
        {
            $ug_Uploaded = true;
            $ug_flag = true;

            $update = "UPDATE document_uploads SET ug_status=TRUE, ug_file='$ug_file', ug_size='$ug_file_size', ug_type='$ug_filetype'  WHERE applicant_id='$appid'";
            $result = mysql_query($update) or die(mysql_error());
        }

        else
        {
            $ug_Uploaded = false;

            $update = "UPDATE document_uploads SET ug_status=FALSE, ug_file='', ug_size='', ug_type=''  WHERE applicant_id='$appid'";
            $result = mysql_query($update) or die(mysql_error());
        }
    }
}

if(isset($_FILES["pg_doc"]["name"]) && !empty($_FILES["pg_doc"]["name"]))
{
    $target_file = $target_dir . basename($_FILES["pg_doc"]["name"]);
    $pg_UploadOk = true;

    $pgFile = $target_dir . $appid . '-PG_marksheet.pdf';
    $pg_file = $appid . '-PG_marksheet.pdf';
    $pg_file_size = $_FILES["pg_doc"]["size"];

    $pg_filetype = pathinfo($target_file, PATHINFO_EXTENSION);

    if ($pg_file_size > 1000000)
    {
        $pg_DocTooLarge = true;
        $pg_UploadOk = false;
    }

    if ($pg_filetype != "pdf")
    {
        $pg_ExtnInvalid = true;
        $pg_UploadOk = false;
    }

    if($pg_UploadOk)
    {
        if (move_uploaded_file($_FILES["pg_doc"]["tmp_name"], $pgFile))
        {
            $pg_Uploaded = true;
            $pg_flag = true;

            $update = "UPDATE document_uploads SET pg_status=TRUE, pg_file='$pg_file', pg_size='$pg_file_size', pg_type='$pg_filetype'  WHERE applicant_id='$appid'";
            $result = mysql_query($update) or die(mysql_error());
        }

        else
        {
            $pg_Uploaded = false;

            $update = "UPDATE document_uploads SET pg_status=FALSE, pg_file='', pg_size='', pg_type=''  WHERE applicant_id='$appid'";
            $result = mysql_query($update) or die(mysql_error());
        }
    }
}

if(isset($_FILES["gre_doc"]["name"]) && !empty($_FILES["gre_doc"]["name"]))
{
    $target_file = $target_dir . basename($_FILES["gre_doc"]["name"]);
    $gre_UploadOk = true;

    $greFile = $target_dir . $appid . '-GRE.pdf';
    $gre_file = $appid . '-GRE.pdf';
    $gre_file_size = $_FILES["gre_doc"]["size"];

    $gre_filetype = pathinfo($target_file, PATHINFO_EXTENSION);

    if ($gre_file_size > 1000000)
    {
        $gre_DocTooLarge = true;
        $gre_UploadOk = false;
    }

    if ($gre_filetype != "pdf")
    {
        $gre_ExtnInvalid = true;
        $gre_UploadOk = false;
    }

    if($gre_UploadOk)
    {
        if (move_uploaded_file($_FILES["gre_doc"]["tmp_name"], $greFile))
        {
            $gre_Uploaded = true;
            $gre_flag = true;

            $update = "UPDATE document_uploads SET gre_status=TRUE, gre_file='$gre_file', gre_size='$gre_file_size', gre_type='$gre_filetype'  WHERE applicant_id='$appid'";
            $result = mysql_query($update) or die(mysql_error());
        }

        else
        {
            $gre_Uploaded = false;

            $update = "UPDATE document_uploads SET gre_status=FALSE, gre_file='', gre_size='', gre_type=''  WHERE applicant_id='$appid'";
            $result = mysql_query($update) or die(mysql_error());
        }
    }
}

if(isset($_FILES["toefl_doc"]["name"]) && !empty($_FILES["toefl_doc"]["name"]))
{
    $target_file = $target_dir . basename($_FILES["toefl_doc"]["name"]);
    $toefl_UploadOk = true;

    $toeflFile = $target_dir . $appid . '-TOEFL.pdf';
    $toefl_file = $appid . '-TOEFL.pdf';
    $toefl_file_size = $_FILES["toefl_doc"]["size"];

    $toefl_filetype = pathinfo($target_file, PATHINFO_EXTENSION);

    if ($toefl_file_size > 1000000)
    {
        $toefl_DocTooLarge = true;
        $toefl_UploadOk = false;
    }

    if ($toefl_filetype != "pdf")
    {
        $toefl_ExtnInvalid = true;
        $toefl_UploadOk = false;
    }

    if($toefl_UploadOk)
    {
        if (move_uploaded_file($_FILES["toefl_doc"]["tmp_name"], $toeflFile))
        {
            $toefl_Uploaded = true;
            $toefl_flag = true;

            $update = "UPDATE document_uploads SET toefl_status=TRUE, toefl_file='$toefl_file', toefl_size='$toefl_file_size', toefl_type='$toefl_filetype'  WHERE applicant_id='$appid'";
            $result = mysql_query($update) or die(mysql_error());
        }

        else
        {
            $toefl_Uploaded = false;

            $update = "UPDATE document_uploads SET toefl_status=FALSE, toefl_file='', toefl_size='', toefl_type=''  WHERE applicant_id='$appid'";
            $result = mysql_query($update) or die(mysql_error());
        }
    }
}

if(isset($_FILES["resume_doc"]["name"]) && !empty($_FILES["resume_doc"]["name"]))
{
    $target_file = $target_dir . basename($_FILES["resume_doc"]["name"]);
    $resume_UploadOk = true;

    $resumeFile = $target_dir . $appid . '-resume.pdf';
    $resume_file = $appid . '-resume.pdf';
    $resume_file_size = $_FILES["resume_doc"]["size"];

    $resume_filetype = pathinfo($target_file, PATHINFO_EXTENSION);

    if ($resume_file_size > 1000000)
    {
        $resume_DocTooLarge = true;
        $resume_UploadOk = false;
    }

    if ($resume_filetype != "pdf")
    {
        $resume_ExtnInvalid = true;
        $resume_UploadOk = false;
    }

    if($resume_UploadOk)
    {
        if (move_uploaded_file($_FILES["resume_doc"]["tmp_name"], $resumeFile))
        {
            $resume_Uploaded = true;
            $resume_flag = true;

            $update = "UPDATE document_uploads SET resume_status=TRUE, resume_file='$resume_file', resume_size='$resume_file_size', resume_type='$resume_filetype'  WHERE applicant_id='$appid'";
            $result = mysql_query($update) or die(mysql_error());
        }

        else
        {
            $resume_Uploaded = false;

            $update = "UPDATE document_uploads SET resume_status=FALSE, resume_file='', resume_size='', resume_type=''  WHERE applicant_id='$appid'";
            $result = mysql_query($update) or die(mysql_error());
        }
    }
}

$select = "SELECT x_status, x_file, xii_status, xii_file, ug_status, ug_file, pg_status, pg_file, gre_status, gre_file, toefl_status,
           toefl_file, resume_status, resume_file FROM document_uploads WHERE applicant_id='$appid'";
$result = mysql_query($select) or die(mysql_error());
$rows = mysql_num_rows($result);


if($rows)
{
    $row = mysql_fetch_assoc($result);
    $x_status = $row['x_status'];
    $x_file = $row['x_file'];
    $xii_status = $row['xii_status'];
    $xii_file = $row['xii_file'];
    $ug_status = $row['ug_status'];
    $ug_file = $row['ug_file'];
    $pg_status = $row['pg_status'];
    $pg_file = $row['pg_file'];
    $gre_status = $row['gre_status'];
    $gre_file = $row['gre_file'];
    $toefl_status = $row['toefl_status'];
    $toefl_file = $row['toefl_file'];
    $resume_status = $row['resume_status'];
    $resume_file = $row['resume_file'];
}
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
    <script>
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
                            <b>Document Uploads</b>
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
                    <tr>
                        <td>
                            <br><br>
                        </td>
                    </tr>
                </table>
            </div>
            <div align="center">
                <form name="document_uploads" action="documents.php" method="post" class="AdvancedForm" enctype="multipart/form-data">
                    <table align="center" cellpadding="3" cellspacing="2">
                        <tr>
                            <td>
                                <br><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Document Uploads </b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Secondary School Leaving Exam Marksheet (X Standard)
                            </td>
                            <td>
                                <?php
                                if($x_flag == true)
                                {
                                    echo "<b><p style=color:green>File uploaded!</p></b>";
                                }

                                if(isset($_FILES['x_doc']['name'])) {
                                    if ($_FILES['x_doc']['error'] > 0 && !empty($_FILES["x_doc"]["name"])) {
                                        echo "<b><p style=color:red>File not uploaded! Invalid extension or large file.</p></b>";
                                    }
                                }

                                if($x_ExtnInvalid==true)
                                {
                                    echo "<b><p style=color:red>Invalid extension! Only .pdf files allowed!</p></b>";
                                }

                                if($x_DocTooLarge==true)
                                {
                                    echo "<b><p style=color:red>File too large! Limit to 1 MB!</p></b>";
                                }

                                if($x_Uploaded==true)
                                {
                                    echo "<a href=\"uploads/$x_file\">View uploaded file</a>";
                                }

                                if($x_Uploaded==false && $x_status==1)
                                {
                                    echo "<a href=\"uploads/$x_file\">View uploaded file</a>";
                                }

                                if($x_Uploaded==false && $x_status==0)
                                {   echo "<b><p style=color:red>No file uploaded!</p></b>";
                                }
                                ?>
                                <input type='file' name='x_doc' id='x_doc'>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Senior School Leaving Exam Marksheet (XII Standard)
                            </td>
                            <td>
                                <?php
                                if($xii_flag == true)
                                {
                                    echo "<b><p style=color:green>File uploaded!</p></b>";
                                }

                                if(isset($_FILES['xii_doc']['name'])) {
                                    if ($_FILES['xii_doc']['error'] > 0 && !empty($_FILES["xii_doc"]["name"])) {
                                        echo "<b><p style=color:red>File not uploaded! Invalid extension or large file.</p></b>";
                                    }
                                }

                                if($xii_ExtnInvalid==true)
                                {
                                    echo "<b><p style=color:red>Invalid extension! Only .pdf files allowed!</p></b>";
                                }

                                if($xii_DocTooLarge==true)
                                {
                                    echo "<b><p style=color:red>File too large! Limit to 1 MB!</p></b>";
                                }

                                if($xii_Uploaded==true)
                                {
                                    echo "<a href=\"uploads/$xii_file\">View uploaded file</a>";
                                }

                                if($xii_Uploaded==false && $xii_status==1)
                                {
                                    echo "<a href=\"uploads/$xii_file\">View uploaded file</a>";
                                }

                                if($xii_Uploaded==false && $xii_status==0)
                                {   echo "<b><p style=color:red>No file uploaded!</p></b>"; }
                                ?>
                                <input type='file' name='xii_doc' id='xii_doc'>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Undergraduate Marksheet (till the latest semester)
                            </td>
                            <td>
                                <?php
                                if($ug_flag == true)
                                {
                                    echo "<b><p style=color:green>File uploaded!</p></b>";
                                }

                                if(isset($_FILES['ug_doc']['name'])) {
                                    if ($_FILES['ug_doc']['error'] > 0 && !empty($_FILES['ug_doc']['name'])) {
                                        echo "<b><p style=color:red>File not uploaded! Invalid extension or large file.</p></b>";
                                    }
                                }

                                if($ug_ExtnInvalid==true)
                                {
                                    echo "<b><p style=color:red>Invalid extension! Only .pdf files allowed!</p></b>";
                                }

                                if($ug_DocTooLarge==true)
                                {
                                    echo "<b><p style=color:red>File too large! Limit to 1 MB!</p></b>";
                                }

                                if($ug_Uploaded==true)
                                {
                                    echo "<a href=\"uploads/$ug_file\">View uploaded file</a>";
                                }

                                if($ug_Uploaded==false && $ug_status==1)
                                {
                                    echo "<a href=\"uploads/$ug_file\">View uploaded file</a>";
                                }

                                if($ug_Uploaded==false && $ug_status==0)
                                {   echo "<b><p style=color:red>No file uploaded!</p></b>"; }
                                ?>
                                <input type='file' name='ug_doc' id='ug_doc'>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Postgraduate Marksheet (till the latest semester)
                            </td>
                            <td>
                                <?php
                                if($pg_flag == true)
                                {
                                    echo "<b><p style=color:green>File uploaded!</p></b>";
                                }

                                if(isset($_FILES['pg_doc']['name'])) {
                                    if ($_FILES['pg_doc']['error'] > 0 && !empty($_FILES['pg_doc']['name'])) {
                                        echo "<b><p style=color:red>File not uploaded! Invalid extension or large file.</p></b>";
                                    }
                                }

                                if($pg_ExtnInvalid==true)
                                {
                                    echo "<b><p style=color:red>Invalid extension! Only .pdf files allowed!</p></b>";
                                }

                                if($pg_DocTooLarge==true)
                                {
                                    echo "<b><p style=color:red>File too large! Limit to 1 MB!</p></b>";
                                }

                                if($pg_Uploaded==true)
                                {
                                    echo "<a href=\"uploads/$pg_file\">View uploaded file</a>";
                                }

                                if($pg_Uploaded==false && $pg_status==1)
                                {
                                    echo "<a href=\"uploads/$pg_file\">View uploaded file</a>";
                                }

                                if($pg_Uploaded==false && $pg_status==0)
                                {   echo "<b><p style=color:red>No file uploaded!</p></b>";}
                                ?>
                                <input type='file' name='pg_doc' id='pg_doc'>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                GRE Score Report (Optional)
                            </td>
                            <td>
                                <?php
                                if($gre_flag == true)
                                {
                                    echo "<b><p style=color:green>File uploaded!</p></b>";
                                }

                                if(isset($_FILES['gre_doc']['name'])) {
                                    if ($_FILES['gre_doc']['error'] > 0 && !empty($_FILES['gre_doc']['name'])) {
                                        echo "<b><p style=color:red>File not uploaded! Invalid extension or large file.</p></b>";
                                    }
                                }

                                if($gre_ExtnInvalid==true)
                                {
                                    echo "<b><p style=color:red>Invalid extension! Only .pdf files allowed!</p></b>";
                                }

                                if($gre_DocTooLarge==true)
                                {
                                    echo "<b><p style=color:red>File too large! Limit to 1 MB!</p></b>";
                                }

                                if($gre_Uploaded==true)
                                {
                                    echo "<a href=\"uploads/$gre_file\">View uploaded file</a>";
                                }

                                if($gre_Uploaded==false && $gre_status==1)
                                {
                                    echo "<a href=\"uploads/$gre_file\">View uploaded file</a>";
                                }

                                if($gre_Uploaded==false && $gre_status==0)
                                {   echo "<b><p style=color:red>No file uploaded!</p></b>";}
                                ?>
                                <input type='file' name='gre_doc' id='gre_doc'>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                TOEFL Score Report (Optional)
                            </td>
                            <td>
                                <?php
                                if($toefl_flag == true)
                                {
                                    echo "<b><p style=color:green>File uploaded!</p></b>";
                                }

                                if(isset($_FILES['toefl_doc']['name'])) {
                                    if ($_FILES['toefl_doc']['error'] > 0 && !empty($_FILES['toefl_doc']['name'])) {
                                        echo "<b><p style=color:red>File not uploaded! Invalid extension or large file.</p></b>";
                                    }
                                }

                                if($toefl_ExtnInvalid==true)
                                {
                                    echo "<b><p style=color:red>Invalid extension! Only .pdf files allowed!</p></b>";
                                }

                                if($toefl_DocTooLarge==true)
                                {
                                    echo "<b><p style=color:red>File too large! Limit to 1 MB!</p></b>";
                                }

                                if($toefl_Uploaded==true)
                                {
                                    echo "<a href=\"uploads/$toefl_file\">View uploaded file</a>";
                                }

                                if($toefl_Uploaded==false && $toefl_status==1)
                                {
                                    echo "<a href=\"uploads/$toefl_file\">View uploaded file</a>";
                                }

                                if($toefl_Uploaded==false && $toefl_status==0)
                                {   echo "<b><p style=color:red>No file uploaded!</p></b>";}
                                ?>
                                <input type='file' name='toefl_doc' id='toefl_doc'>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Resume
                            </td>
                            <td>
                                <?php
                                if($resume_flag == true)
                                {
                                    echo "<b><p style=color:green>File uploaded!</p></b>";
                                }

                                if(isset($_FILES['resume_doc']['name'])) {
                                    if ($_FILES['resume_doc']['error'] > 0 && !empty($_FILES['resume_doc']['name'])) {
                                        echo "<b><p style=color:red>File not uploaded! Invalid extension or large file.</p></b>";
                                    }
                                }

                                if($resume_ExtnInvalid==true)
                                {
                                    echo "<b><p style=color:red>Invalid extension! Only .pdf files allowed!</p></b>";
                                }

                                if($resume_DocTooLarge==true)
                                {
                                    echo "<b><p style=color:red>File too large! Limit to 1 MB!</p></b>";
                                }

                                if($resume_Uploaded==true)
                                {
                                    echo "<a href=\"uploads/$resume_file\">View uploaded file</a>";
                                }

                                if($resume_Uploaded==false && $resume_status==1)
                                {
                                    echo "<a href=\"uploads/$resume_file\">View uploaded file</a>";
                                }

                                if($resume_Uploaded==false && $resume_status==0)
                                {   echo "<b><p style=color:red>No file uploaded!</p></b>";}
                                ?>
                                <input type='file' name='resume_doc' id='resume_doc'>
                            </td>
                        </tr>
                        <tr>
                            <td>

                            </td>
                            <td>
                                <input type='submit' value='Upload/Replace selected files'>";
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

