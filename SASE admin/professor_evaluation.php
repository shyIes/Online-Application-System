<?php
require_once "professor_session.php";
require_once "admin_dbcontroller.php";

$appid = $_GET["appid"];
$username = $_SESSION["username"];
$select = "SELECT first_name,last_name FROM sase_student.users WHERE applicant_id='$appid'";
$result = mysql_query($select) or die('Database error '.mysql_error());
$row = mysql_fetch_assoc($result);
$firstname = $row['first_name'];
$lastname = $row['last_name'];

$select = "SELECT ug_degree,ug_major,ug_marks,ug_inst,gre_quant,gre_verbal,
toefl_reading,toefl_listening,toefl_writing,toefl_speaking FROM sase_student.education_details
WHERE applicant_id ='$appid' ";
$result = mysql_query($select) or die('Database error '.mysql_error());
$rows = mysql_fetch_assoc($result);
$ug_degree = $rows['ug_degree'];
$ug_major= $rows['ug_major'];
$ug_marks = $rows['ug_marks'];
$ug_inst = $rows['ug_inst'];
$gre_verbal = $rows['gre_verbal'];
$gre_quant = $rows['gre_quant'];
$gre_total = $gre_verbal + $gre_quant;

$toefl_reading = $rows['toefl_reading'];
$toefl_writing = $rows['toefl_writing'];
$toefl_listening = $rows['toefl_listening'];
$toefl_speaking = $rows['toefl_speaking'];
$toefl_total = $toefl_reading + $toefl_writing + $toefl_listening + $toefl_speaking;

$flag = 0;

//$personality = $_POST['personality'];
//$qualification = $_POST['qualification'];
//$scores = $_POST['scores'];
//$work = $_POST['work'];
//$communication = $_POST['communication'];
//$confidence= $_POST['confidence'];
//$essays = $_POST['essays'];
//$achievements = $_POST['achievements'];
//$overall_rating = $_POST['overall_rating'];
//$strengths = $_POST['strengths'];
//$weakness = $_POST['weakness'];
//$recommendation = $_POST['recommendation'];

//$insert = "INSERT INTO evaluation VALUES ( '$appid','$username','$personality1','$qualification','$scores','$work','$communication','$confidence','$essays','$achievements','$overall_rating','$strengths',
//'$weakness','$recommendation', 'evaluated')" or die(mysql_error());

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
            <span style="float:right;"><a href="professor_profile.php">Profile</a> |
            <a href="professor_logout.php">Logout</a></span></p>
            <div class="TabBody">
                <table width="114%">
                    <tr>
                        <td style="font-size:12px">
                            <b>Evaluation Sheet</b>
                        </td>
                    </tr>
                </table>
            </div>
            <div align="center">
                <br><br><br>
                <?php
                if($flag==1) echo "<h4 align=center style=color:green;> Details saved</h4>";
                ?>
                <form name="evaluation" action="professor_selection.php" method="post" class="AdvancedForm">
                    <table align="center" cellpadding="3" cellspacing="2">
                        <tr>
                            <td>
                                <b>Evaluation Form:</b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Name
                            </td>
                            <td>
                                <?php echo $firstname." ".$lastname ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Applicant ID
                            </td>
                            <td>
                                <input type="text" name="applicant_id" value="<?php echo $appid ?>" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Degree
                            </td>
                            <td>
                                <?php echo $ug_degree ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Institute
                            </td>
                            <td>
                                <?php echo $ug_inst ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                CGPA
                            </td>
                            <td>
                                <?php echo $ug_marks ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                GRE
                            </td>
                            <td>
                                <?php echo $gre_total ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                TOEFL
                            </td>
                            <td>
                                <?php echo $toefl_total ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Assessment Areas</b>
                            </td>
                            <td>
                                <b>Rating</b>
                            </td>
                        </tr>
                        </th>
                        <tr>
                            <td>
                                Personality
                            </td>
                            <td>
                                <select name="personality" required>
                                        <option value="A">A - Good</option>
                                        <option value="B">B - Above Average</option>
                                        <option value="C">C - Average</option>
                                        <option value="D">D - Poor</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Educational Qualification
                            </td>
                            <td>
                                <select name="qualification" required>
                                    <option value="A">A - Good</option>
                                    <option value="B">B - Above Average</option>
                                    <option value="C">C - Average</option>
                                    <option value="D">D - Poor</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                GRE/TOEFL/Analytical Writing/Academic Performance
                            </td>
                            <td>
                                <select name="scores" required>
                                    <option value="A">A - Good</option>
                                    <option value="B">B - Above Average</option>
                                    <option value="C">C - Average</option>
                                    <option value="D">D - Poor</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Work Experience and Career Achievement
                            </td>
                            <td>
                                <select name="work" required>
                                    <option value="A">A - Good</option>
                                    <option value="B">B - Above Average</option>
                                    <option value="C">C - Average</option>
                                    <option value="D">D - Poor</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Communication/Presentation
                            </td>
                            <td>
                                <select name="communication" required>
                                    <option value="A">A - Good</option>
                                    <option value="B">B - Above Average</option>
                                    <option value="C">C - Average</option>
                                    <option value="D">D - Poor</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Emotional Stability/Manners/Attitudes/Confidence/Self Reliance
                            </td>
                            <td>
                                <select name="confidence" required>
                                    <option value="A">A - Good</option>
                                    <option value="B">B - Above Average</option>
                                    <option value="C">C - Average</option>
                                    <option value="D">D - Poor</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                SOP and Software Project Experience
                            </td>
                            <td>
                                <select name="essays" required>
                                    <option value="A">A - Good</option>
                                    <option value="B">B - Above Average</option>
                                    <option value="C">C - Average</option>
                                    <option value="D">D - Poor</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Achievements and Extra curricular
                            </td>
                            <td>
                                <select name="achievements" required>
                                    <option value="A">A - Good</option>
                                    <option value="B">B - Above Average</option>
                                    <option value="C">C - Average</option>
                                    <option value="D">D - Poor</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Overall Rating</b>
                            </td>
                            <td>
                                <select name="overall_rating" required>
                                    <option value="A">A - Good</option>
                                    <option value="B">B - Above Average</option>
                                    <option value="C">C - Average</option>
                                    <option value="D">D - Poor</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Strengths
                            </td>
                            <td>

                                <textarea name="strengths" rows="4" cols="50">

                                </textarea>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                Weakness
                            </td>
                            <td>
                                <textarea name="weakness" rows="4" cols="50">

                                </textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Recommendations
                            </td>
                            <td>
                                <input type="radio" name="recommendation" id="recommendation" value="Suitable" checked="checked" required/> Suitable
                                <input type="radio" name="recommendation" id="recommendation" value="Waitlist"/> Waitlist
                                <input type="radio" name="recommendation" id="recommendation" value="Unsuitable"/> Unsuitable
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

