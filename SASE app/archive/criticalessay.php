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
$file ='';
$criDocTooLarge = false;
$criExtnInvalid = false;
$criUploadOk = false;
$criUploaded = false;
$flag = false;
$status = 0;

if(isset($_FILES["cri"]["name"]))
{
    $target_file = $target_dir . basename($_FILES["cri"]["name"]);
    $criUploadOk = true;

    $criFile = $target_dir . $appid . '-SOP.doc';
    $file = $appid . '-SOP.doc';
    $file_size = $_FILES["cri"]["size"];

    $filetype = pathinfo($target_file, PATHINFO_EXTENSION);

    if ($file_size > 500000)
    {
        $criDocTooLarge = true;
        $criUploadOk = false;
    }

    if ($filetype != "doc")
    {
        $criExtnInvalid = true;
        $criUploadOk = false;
    }

    if($criUploadOk)
    {
        if (move_uploaded_file($_FILES["cri"]["tmp_name"], $criFile))
        {
            $criUploaded = true;
            $flag = true;

            $update = "UPDATE critical_essay SET status=TRUE, file='$file', size='$file_size', type='$filetype'  WHERE applicant_id='$appid'";
            $result = mysql_query($update) or die(mysql_error());
        }

        else
        {
            $criUploaded = false;

            $update = "UPDATE critical_essay SET status=FALSE, file='', size='', type=''  WHERE applicant_id='$appid'";
            $result = mysql_query($update) or die(mysql_error());
        }
    }
}

$select = "SELECT status, file FROM critical_essay WHERE applicant_id='$appid'";
$result = mysql_query($select) or die(mysql_error());
$rows = mysql_num_rows($result);


if($rows)
{
    $row = mysql_fetch_assoc($result);
    $status = $row['status'];
    $file = $row['file'];
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
                <table width="114%">
                    <tr>
                        <td style="font-size:12px">
                            <a href="personal.php">Personal Details</a>
                        </td>
                        <td style="font-size:12px">
                            <a href="education.php">Education Details</a>
                        </td>
                        <td style="font-size:12px">
                            <b>Essays</b>
                        </td>
                        <td style="font-size:12px">
                            <a href="documents.php">Document Uploads</a>
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
                    <tr>
                        <td style="font-size:12px">
                            <a href="essays.php">Academic Achievements</a>
                        </td>
                        <td style="font-size:12px">
                            <a href="experience.php">Experience</a>
                        </td>
                        <td style="font-size:12px">
                            <b>Critical Essay</b>
                        </td>
                    </tr>
                </table>
            </div>
            <div align="center">
                <form name="critical_essay" action="criticalessay.php" method="post" class="AdvancedForm" enctype="multipart/form-data">
                    <table align="center" cellpadding="3" cellspacing="2">
                        <tr>
                            <td>
                                <br><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Critical Essay </b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                The essay is an important part of your application packet, and helps the Admissions
                                Committee to better understand your background, your goals, and your suitability as a
                                candidate. Successful essays are those that provide clear descriptions into what you
                                have done, what you are hoping to accomplish as a student of this program, and what
                                is truly unique about you as a candidate. Refer to the template for detailed essay
                                requirements.
                            </td>
                            <td>
                                <a href="documents/SOP.doc">Download template</a>
                            </td>
                            <td>
                                <?php
                                if($flag == true)
                                {
                                    echo "<b><p style=color:green>File uploaded!</p></b>";
                                }

                                if($criUploaded==false && $criExtnInvalid==true)
                                {
                                    echo "<b><p style=color:red>Invalid extension! Only .doc files allowed!</p></b>";
                                }

                                if($criUploaded==false && $criDocTooLarge==true)
                                {
                                    echo "<b><p style=color:red>File too large! Limit to 500KB!</p></b>";
                                }

                                if($criUploaded==true)
                                {
                                    echo "<a href=\"uploads/$file\">View uploaded file</a>";
                                    echo "<input type='file' name='cri' id='cri'>
                                          <input type='submit' value='Replace' name='criUpload'>";
                                }

                                if($criUploaded==false && $status==1)
                                {
                                    echo "<a href=\"uploads/$file\">View uploaded file</a>";
                                    echo "<input type='file' name='cri' id='cri'>
                                          <input type='submit' value='Replace' name='criUpload'>";
                                }

                                if($criUploaded==false && $status==0)
                                {   echo "<b><p style=color:red>No file uploaded!</p></b>";
                                    echo "<input type='file' name='cri' id='cri'>
                                          <input type='submit' value='Upload' name='criUpload'>";
                                }
                                ?>

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

