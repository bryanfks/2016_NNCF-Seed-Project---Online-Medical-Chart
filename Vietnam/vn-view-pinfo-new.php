<?PHP
    
    session_start();
    
    include 'db.php';
       
    $seid = $_SESSION["seid"];
    $sepwd = $_SESSION["sepwd"];

    if(!empty($seid) && !empty($sepwd)){
        $CPIData = $_GET["cpi"];

         //搜寻病患病例表
        // $selPatientRecord = "SELECT * FROM `patient-vn-record` WHERE num='".$CPIData."'";
        $queryPatientinfo = mysql_query("SELECT * FROM `patient-vn` WHERE num='".$CPIData."'");
        $resultPatientinfo = mysql_fetch_array($queryPatientinfo);
         
         
        // 搜寻病患资料
        $selChinaPatientinfo = "SELECT * FROM `patient-vn-record` WHERE `NCFMedicalNum`='".$resultPatientinfo['NCFID']."'";
        // $queryPatientinfo = mysql_query("SELECT * FROM `patient-vn-record` WHERE `NCFMedicalNum`='".$resultPatientRecord['NCFID']."'");
        $queryPatientRecord = mysql_query($selChinaPatientinfo);
        $resultPatientRecord = mysql_fetch_array($queryPatientRecord);

        // echo '--> '.$resultPatientinfo.'<br>';

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Personal Information</title>
        <link rel="stylesheet" href='css/selectBar.css'>
        <link rel="stylesheet" href='css/VNViewPInfoContent.css'>
        <script language="javascript">
            function inputData(){
                //病患个人资料
                document.VNMedical.caseYear.value = "<?php echo $resultPatientinfo['caseYear'];  ?>";
                document.VNMedical.caseMonth.value = "<?php echo $resultPatientinfo['caseMonth'];  ?>";
                document.VNMedical.caseDay.value = "<?php echo $resultPatientinfo['caseDay'];  ?>";
                document.VNMedical.surgeryDrName.value = "<?php echo $resultPatientinfo['surgeryDrName'];  ?>";
                document.VNMedical.languageTherapist.value = "<?php echo $resultPatientinfo['languageTherapist'];  ?>";
                    document.VNMedical.orthodontics.value = "<?php echo $resultPatientinfo['orthodontics'];  ?>";
                    document.VNMedical.MedicalRecordNumber.value = "<?php echo $resultPatientinfo['MedicalRecordNumber'];  ?>";
                    document.VNMedical.idno.value = "<?php echo $resultPatientinfo['idno'];  ?>";
                    document.VNMedical.name.value = "<?php echo $resultPatientinfo['name'];  ?>";
                    document.VNMedical.birthYear.value = "<?php echo $resultPatientinfo['birthYear'];  ?>";
                    document.VNMedical.birthMonth.value = "<?php echo $resultPatientinfo['birthMonth'];  ?>";
                    document.VNMedical.birthDay.value = "<?php echo $resultPatientinfo['birthDay'];  ?>";
                    document.VNMedical.profession.value = "<?php echo $resultPatientinfo['profession'];  ?>";
                    document.VNMedical.tel.value = "<?php echo $resultPatientinfo['tel'];  ?>";
                    document.VNMedical.education.value = "<?php echo $resultPatientinfo['education'];  ?>";
                    document.VNMedical.address.value = "<?php echo $resultPatientinfo['address'];  ?>";
                    document.VNMedical.contactperson.value = "<?php echo $resultPatientinfo['contactperson'];  ?>";
                    document.VNMedical.relationship.value = "<?php echo $resultPatientinfo['relationship'];  ?>";
                    document.VNMedical.phone.value = "<?php echo $resultPatientinfo['phone'];  ?>";
                    document.VNMedical.height.value = "<?php echo $resultPatientinfo['height'];  ?>";
                    document.VNMedical.weight.value = "<?php echo $resultPatientinfo['weight'];  ?>";
                    document.VNMedical.Combined_with_other_craniofacial_disorders_text.value = "<?php echo $resultPatientinfo['Combined_with_other_craniofacial_disorders_text'];  ?>";
                    document.VNMedical.beforeSurgery_other_reason.value = "<?php echo $resultPatientinfo['beforeSurgery_other_reason'];  ?>";
                    document.VNMedical.familyMembers.value = "<?php echo $resultPatientinfo['familyMembers'];  ?>";
                    document.VNMedical.live_together.value = "<?php echo $resultPatientinfo['live_together'];  ?>";
                    document.VNMedical.fatherAge.value = "<?php echo $resultPatientinfo['fatherAge'];  ?>";
                    document.VNMedical.fatherProfession_main.value = "<?php echo $resultPatientinfo['fatherProfession_main'];  ?>"; 
                    document.VNMedical.motherAge.value = "<?php echo $resultPatientinfo['motherAge'];  ?>";
                    document.VNMedical.motherProfession_main.value = "<?php echo $resultPatientinfo['motherProfession_main'];  ?>";
<?PHP
    $nums = $resultPatientinfo["num"];
    $strS = $resultPatientinfo['descriptionCaseFamily'];
    //$strS2 = nl2br($strS);
    $strS1 = preg_replace('/\s/'," ",$strS);
    //$strS4 = preg_replace("<br />"," ",$strS3);
?>
                    document.VNMedical.descriptionCaseFamily.value = "<?php echo $strS1;  ?>";
                    
                    document.VNMedical.mainSourceofIncome.value = "<?php echo $resultPatientinfo['mainSourceofIncome'];  ?>";
                    document.VNMedical.income.value = "<?php echo $resultPatientinfo['income'];  ?>";
                    document.VNMedical.fixedExpenditure1.value = "<?php echo $resultPatientinfo['fixedExpenditure1'];  ?>";
                    document.VNMedical.fixedExpenditure2.value = "<?php echo $resultPatientinfo['fixedExpenditure2'];  ?>";
                    document.VNMedical.fixedExpenditure3.value = "<?php echo $resultPatientinfo['fixedExpenditure3'];  ?>";
                    document.VNMedical.fixedExpenditure4.value = "<?php echo $resultPatientinfo['fixedExpenditure4'];  ?>";
                    document.VNMedical.extimatedExpenditures.value = "<?php echo $resultPatientinfo['extimatedExpenditures'];  ?>";                

                }
                
                function saveData(opt){
                    if(opt == "save"){
                        // 警示未填写必要输入项资料
                        if(document.VNMedical.caseYear.value == ""){
                            alert ("Please Input Date of Intake - Year");
                        }else if(document.VNMedical.caseMonth.value == ""){
                            alert ("Please Input Date of Intake - Month");
                        }else if(document.VNMedical.caseDay.value == ""){
                            alert ("Please Input Date of Intake - Day");
                        }else if(document.VNMedical.MedicalRecordNumber.value == ""){
                            alert ("Please Input Patient Record Number");
                        }else if(document.VNMedical.idno.value == ""){
                            alert ("Please Input ID of Patient");
                        }else if(document.VNMedical.name.value == ""){
                            alert ("Please Input Name");
                        }else if(document.VNMedical.gender.value == ""){
                            alert ("Please Input Gender");
                        }else if(document.VNMedical.birthYear.value == ""){
                            alert ("Please Input Date of Birth - Year");
                        }else if(document.VNMedical.birthMonth.value == ""){
                            alert ("Please Input Date of Birth - Month");
                        }else if(document.VNMedical.birthDay.value == ""){
                            alert ("Please Input Date of Birth - Day");
                        }else if(document.VNMedical.address.value == ""){
                            alert ("Please Input Address");
                        }else if(document.VNMedical.height.value == ""){
                            alert ("Please Input Height");
                        }else if(document.VNMedical.weight.value == ""){
                            alert ("Please Input Weight");
                        }else if(document.VNMedical.BIHosTimeYear.value == ""){
                            alert ("Please Input Date of Admission - Year");
                        }else if(document.VNMedical.BIHosTimeMonth.value == ""){
                            alert ("Please Input Date of Admission - Month");
                        }else if(document.VNMedical.BIHosTimeDay.value == ""){
                            alert ("Please Input Date of Admission - Day");
                        }else if(document.VNMedical.surgeryTimeYear.value == ""){
                            alert ("Please Input Date of Surgery - Year");
                        }else if(document.VNMedical.surgeryTimeMonth.value == ""){
                            alert ("Please Input Date of Surgery - Month");
                        }else if(document.VNMedical.surgeryTimeDay.value == ""){
                            alert ("Please Input Date of Surgery - Day");
                        }else if(document.VNMedical.LHosTimeYear.value == ""){
                            alert ("Please Input Date of Discharge - Year");
                        }else if(document.VNMedical.LHosTimeMonth.value == ""){
                            alert ("Please Input Date of Discharge - Month");
                        }else if(document.VNMedical.LHosTimeDay.value == ""){
                            alert ("Please Input Date of Discharge - Day");
                        }else if(document.VNMedical.surgeon.value == ""){
                            alert ("Please Input Name of Surgeon");
                        }else if(document.VNMedical.Cleft_lip_and_palate_surgery.value == ""){
                            alert ("Please Select Did the patient have any treatment before？");
                        }else {
                            document.VNMedical.remark.value = "<? echo '0'; ?>";
                            document.VNMedical.num.value = "<? echo $CPIData; ?>";
                            document.VNMedical.submit();
                        }
                    } else if(opt == "cancels"){
                        location.href = "vn-searchList.php";
                    }
                }
    </script>
    </head>
    <body onLoad="inputData()">
        <form name="VNMedical" enctype="multipart/form-data" method="post" action="vn-view-pinfo-new-save.php">
        <header>
            <div class="RealTimeMsg">
                <div class="RTMsg">
                    Hi ! <?PHP echo $seid; ?>
                </div>
            </div>
        </header>
        <nav>
            <div><?PHP require_once('selectBar.php'); ?></div>
        </nav>
        <section>
            <div class="layer1">
                <?PHP require_once('vn-view-content-new.php'); ?>
            </div>
        </section>
        <footer>
            <div>The  Web  Best  Browse  Mode ： Internet Explorer 9 (Or Update)  /  800 x 600  Resolution<br>
                Copyright © 2006~2016  <a href="http://www.nncf.org/" target="_blank">Noordhoff  Craniofacial  Foundation</a></div>
        </footer>
    </body>
    </form>
</html>
<?PHP
   }else{
       echo "<html>";
       echo "<head>";
       echo "<Script Language='JavaScript'>";
       echo "<!--";
       echo "\n alert('Sorry, Access denied. Please Login first.');";
       echo "\n";
       echo " location.href='http://www.seed-nncf.org/login.php';\n";
       echo "//-->";
       echo " </Script>";
       echo "</head>";
       echo "</html>";
   }
?>