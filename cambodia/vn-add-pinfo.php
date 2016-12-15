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
        //製作自動帶出NCF編號code
        $get_time = getdate();
        $date = substr($get_time['year'], 2);   // 取得西元年後2碼
        
        // if DB-Num. is not empty, get MAX no.
        $sel_Max = "SELECT MAX(NCFID) AS NCFID FROM 'patient-vn'";
        $queryData = mysql_query($sel_Max);
        $result = mysql_fetch_array($queryData);
        $maxNums = $result["NCFID"];
        
        // split no 
        if(!empty($maxNums)){   // If $max !empty than split no
            $no_date = substr($maxNums,2,2);    // fetch last 4 bits flow Num..
            $flow_no = substr($maxNums,-4);     // fetch 4 bits flow No.
            if($no_date == $date){
                $flow_no = $flow_no+1;
                if($flow_no <10){
                    $flow_no = "000".$flow_no;
                }else if($flow_no <100){
                    $flow_no = "00".$flow_no;
                }else if($flow_no <1000){
                    $flow_no = "0".$flow_no;
                }else if($flow_no <10000){
                    $flow_no = $flow_no;
                }
                $NCFNumX = "VN".$date.$flow_no;
            }else{
                $NCFNumX = "VN".$date."0001";
            }
        }else{
            $NCFNumX = "VN".$date."0001";
        }
        
        
        // Make Vietnam patient's Medical Record Number.
        $recordData = "SELECT MAX(NCFMedicalNum) AS MAXNCFNUM FROM 'patient-vn-record' WHERE NCFID='".$NCFNumX."'";
        @$queryRecordData = mysql_query($recordData);
        @$resultRecordData = mysql_fetch_array($queryRecordData);
        $NCFMedicalNum = $resultRecordData["MAXNCFNUM"];
    
        // 建立病歷表編號
        if(!empty($NCFMedicalNum)){ // If $max !empty than split no
            if($NCFMedicalNum <10){
                $NCFMedicalNumNow = $NCFNumX."0".$NCFMedicalNum;
            }else if($NCFMedicalNum <100){
                $NCFMedicalNumNow = $NCFNumX.$NCFMedicalNum;
            }
        }
        
        $NCFMedicalNumNow = $NCFNumX.$branch.$serialcode;
// echo "TEST=> ".$NCFMedicalNumNow.'<br>';
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
                            // document.MedicalRecord.remark.value = "<?php echo '1'; ?>";
                            document.MedicalRecord.remark.value = "1";
                            // alert('Ready for Send Data out.');
                            document.MedicalRecord.submit();
                        }
                    }else if(opt == "close"){
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
                            // document.MedicalRecord.remark.value = "<?php echo '0'; ?>";
                            document.MedicalRecord.remark.value = "0";
                            document.MedicalRecord.submit();
                        }
                    } else if(opt == "cancelAdd"){
                            // location.href='for-pla-add-china-search.php';
                    }
                }
        </script>
    </head>
    <body>
        <header>
            <div class="RealTimeMsg">
                <div class="RTMsg">
                    Welcome Sir.
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
