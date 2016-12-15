<?PHP
    session_cache_limiter("none");
    session_start();
    
    include 'db.php';
       
    $seid = $_SESSION["seid"];
    $sepwd = $_SESSION["sepwd"];
    
    $branch = "1";
    $serialcode = "1";      //暫時以此當作同病患的病歷表流水號
    
    // 越南病例
    if(!empty($seid) && !empty($sepwd)){


        
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Personal Information</title>
        <link rel="stylesheet" href='css/selectBar.css'>
        <link rel="stylesheet" href='css/VNPInfoContent.css'>
        <script language="javascript">
            function saveData(opt){
                // alert (opt);
                if(opt == "save"){
                    // 警示未填写必要输入项资料
                        if(document.MedicalRecord.caseYear.value == ""){
                            alert ("Please Input Date of Intake - Year");
                        }else if(document.MedicalRecord.caseMonth.value == ""){
                            alert ("Please Input Date of Intake - Month");
                        }else if(document.MedicalRecord.caseDay.value == ""){
                            alert ("Please Input Date of Intake - Day");
                        }else if(document.MedicalRecord.MedicalRecordNumber.value == ""){
                            alert ("Please Input Patient Record Number");
                        }else if(document.MedicalRecord.idno.value == ""){
                            alert ("Please Input ID of Patient");
                        }else if(document.MedicalRecord.name.value == ""){
                            alert ("Please Input Name");
                        }else if(document.MedicalRecord.gender.value == ""){
                            alert ("Please Input Sex");
                        }else if(document.MedicalRecord.birthYear.value == ""){
                            alert ("Please Input Date of Birth - Year");
                        }else if(document.MedicalRecord.birthMonth.value == ""){
                            alert ("Please Input Date of Birth - Month"); 
                        }else if(document.MedicalRecord.birthDay.value == ""){
                            alert ("Please Input Date of Birth - Day");
                        }else if(document.MedicalRecord.address.value == ""){
                            alert ("Please Input Address");
                        }else if(document.MedicalRecord.height.value == ""){
                            alert ("Please Input Height");
                        }else if(document.MedicalRecord.weight.value == ""){
                            alert ("Please Input Weight");
                        }else if(document.MedicalRecord.BIHosTimeYear.value == ""){
                            alert ("Please Input Date of Admission - Year");
                        }else if(document.MedicalRecord.BIHosTimeMonth.value == ""){
                            alert ("Please Input Date of Admission - Month");
                        }else if(document.MedicalRecord.BIHosTimeDay.value == ""){
                            alert ("Please Input Date of Admission - Day");
                        }else if(document.MedicalRecord.surgeryTimeYear.value == ""){
                            alert ("Please Input Date of Surgery - Year");
                        }else if(document.MedicalRecord.surgeryTimeMonth.value == ""){
                            alert ("Please Input Date of Surgery - Month");
                        }else if(document.MedicalRecord.surgeryTimeDay.value == ""){
                            alert ("Please Input Date of Surgery - Day");
                        }else if(document.MedicalRecord.LHosTimeYear.value == ""){
                            alert ("Please Input Date of Discharge - Year");
                        }else if(document.MedicalRecord.LHosTimeMonth.value == ""){
                            alert ("Please Input Date of Discharge - Month");
                        }else if(document.MedicalRecord.LHosTimeDay.value == ""){
                            alert ("Please Input Date of Discharge - Day");
                        }else if(document.MedicalRecord.surgeon.value == ""){
                            alert ("Please Input Name of Surgeon");
                        }else if(document.MedicalRecord.Cleft_lip_and_palate_surgery.value == ""){
                            alert ("Please Select Did the patient have any treatment before？");
                        }else {
                            document.MedicalRecord.remark.value = "0";
                            document.MedicalRecord.submit();
                        }
                    } else if(opt == "cancelAdd"){
                            location.href='main.php';
                    }
                }
        </script>
    </head>
    <body>
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
            <div class="layer1"><?PHP require_once('vn-add-content.php'); ?></div>
        </section>
        <footer>
            <div>The  Web  Best  Browse  Mode ： Internet Explorer 9 (Or Update)  /  800 x 600  Resolution<br>
                Copyright © 2006~2016  <a href="http://www.nncf.org/" target="_blank">Noordhoff  Craniofacial  Foundation</a></div>
        </footer>
    </body>
</html>
<?PHP
    }else{
        echo "<Script Language='JavaScript'>";
        echo "alert('抱歉您现在无权限读取,请先登入')\;";
        echo " location.href=\'login.php\'\;";
        echo " </Script>";
    }
?>
