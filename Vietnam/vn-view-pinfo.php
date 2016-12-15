<?php
    
    session_start();
    
    include 'db.php';
       
    $seid = $_SESSION["seid"];
    $sepwd = $_SESSION["sepwd"];

    if(!empty($seid) && !empty($sepwd)){
        $CPIData = $_GET["cpi"];


        // 搜寻病患资料
        $selChinaPatientinfo = "SELECT * FROM `patient-vn-record` WHERE `num`='".$CPIData."'";
        $queryPatientRecord = mysql_query($selChinaPatientinfo);
        $resultPatientRecord = mysql_fetch_array($queryPatientRecord);


         //搜寻病患病例表
        $selPatientRecord = "SELECT * FROM `patient-vn-recorduse` WHERE NCFID='".$resultPatientRecord['NCFID']."'";
        $queryPatientinfo = mysql_query($selPatientRecord);
        $resultPatientinfo = mysql_fetch_array($queryPatientinfo);
         
         
        // echo '--> '.$selPatientRecord.'<br>';

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
                    
                    //病历表资料                 
                    document.VNMedical.BIHosTimeYear.value = "<?php echo $resultPatientRecord['BIHosTimeYear'];  ?>";
                    document.VNMedical.BIHosTimeMonth.value = "<?php echo $resultPatientRecord['BIHosTimeMonth'];  ?>";
                    document.VNMedical.BIHosTimeDay.value = "<?php echo $resultPatientRecord['BIHosTimeDay'];  ?>";
                    document.VNMedical.surgeryTimeYear.value = "<?php echo $resultPatientRecord['surgeryTimeYear'];  ?>";
                    document.VNMedical.surgeryTimeMonth.value = "<?php echo $resultPatientRecord['surgeryTimeMonth'];  ?>";
                    document.VNMedical.surgeryTimeDay.value = "<?php echo $resultPatientRecord['surgeryTimeDay'];  ?>";
                    document.VNMedical.LHosTimeYear.value = "<?php echo $resultPatientRecord['LHosTimeYear'];  ?>";
                    document.VNMedical.LHosTimeMonth.value = "<?php echo $resultPatientRecord['LHosTimeMonth'];  ?>";
                    document.VNMedical.LHosTimeDay.value = "<?php echo $resultPatientRecord['LHosTimeDay'];  ?>";
                    
                    
                    document.VNMedical.surgeon.value = "<?php echo $resultPatientRecord['surgeon'];  ?>";
                    document.VNMedical.anesthesiologist.value = "<?php echo $resultPatientRecord['anesthesiologist'];  ?>";
                    document.VNMedical.surgeryTypeOther_text.value = "<?php echo $resultPatientRecord['surgeryTypeOther_text'];  ?>";
                    document.VNMedical.repairTypeUnilateralcleftlip_text.value = "<?php echo $resultPatientRecord['repairTypeUnilateralcleftlip_text'];  ?>";
                    document.VNMedical.repairTypeBilateralcleftlip_text.value = "<?php echo $resultPatientRecord['repairTypeBilateralcleftlip_text'];  ?>";
                    document.VNMedical.repairTypeCleftpalate_text.value = "<?php echo $resultPatientRecord['repairTypeCleftpalate_text'];  ?>";
                    
                    document.VNMedical.beforeSurgeryYear.value = "<?php echo $resultPatientRecord['beforeSurgeryYear'];  ?>";
                    document.VNMedical.beforeSurgeryMonth.value = "<?php echo $resultPatientRecord['beforeSurgeryMonth'];  ?>";
                    document.VNMedical.beforeSurgeryDay.value = "<?php echo $resultPatientRecord['beforeSurgeryDay'];  ?>";
                    
                    document.VNMedical.afterSurgeryYear.value = "<?php echo $resultPatientRecord['afterSurgeryYear'];  ?>";
                    document.VNMedical.afterSurgeryMonth.value = "<?php echo $resultPatientRecord['afterSurgeryMonth'];  ?>";
                    document.VNMedical.afterSurgeryDay.value = "<?php echo $resultPatientRecord['afterSurgeryDay'];  ?>";
                    
                    
                    document.VNMedical.MSitem.value = "<?php echo $resultPatientinfo['MSitem'];  ?>";
                    document.VNMedical.MSOther_text.value = "<?php echo $resultPatientinfo['MSOther_text'];  ?>";
                    document.VNMedical.LAunit.value = "<?php echo $resultPatientinfo['LAunit'];  ?>";
                    document.VNMedical.LAitem.value = "<?php echo $resultPatientinfo['LAitem'];  ?>";
                    document.VNMedical.OAunit.value = "<?php echo $resultPatientinfo['OAunit'];  ?>";
                    document.VNMedical.OAitem.value = "<?php echo $resultPatientinfo['OAitem'];  ?>";
                    
                    // NCF 審核資料
                    document.VNMedical.TotalSFME.value = "<?php echo $resultPatientRecord['TotalSFME'];  ?>";
                    document.VNMedical.NCFAllowance.value = "<?php echo $resultPatientRecord['NCFAllowance'];  ?>";
                    document.VNMedical.NCFProportion.value = "<?php echo $resultPatientRecord['NCFProportion'];  ?>";
                    document.VNMedical.PatientPay.value = "<?php echo $resultPatientRecord['PatientPay'];  ?>";
                    document.VNMedical.PatientProportion.value = "<?php echo $resultPatientRecord['PatientProportion'];  ?>";
                    document.VNMedical.NCFSOT.value = "<?php echo $resultPatientRecord['NCFSOT'];  ?>";
                    document.VNMedical.PatientSOT.value = "<?php echo $resultPatientRecord['PatientSOT'];  ?>";
                    document.VNMedical.NCFTotalSubsidies.value = "<?php echo $resultPatientRecord['NCFTotalSubsidies'];  ?>";
                    document.VNMedical.OtherPay.value = "<?php echo $resultPatientRecord['OtherPay'];  ?>";
                    
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
                    }else if(opt == "sends"){
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
                            document.VNMedical.remark.value = "<? echo '1'; ?>";
                            document.VNMedical.num.value = "<? echo $CPIData; ?>";
                            document.VNMedical.submit();
                        }
                    }else if(opt == "cancels"){
                        location.href = "vn-searchList.php";
                    }
                }
    </script>
    </head>
    <body onLoad="inputData()">
        <form name="VNMedical" enctype="multipart/form-data" method="post" action="vn-view-pinfo-save.php">
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
                <?PHP require_once('vn-view-content.php'); ?>
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