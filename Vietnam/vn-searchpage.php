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
        <link rel="stylesheet" href='css/VNSearchpage.css'>
        <SCRIPT LANGUAGE="javascript">
            function searchData(){
                document.personalinfo.submit();
            }
        </SCRIPT>
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
            <div>
                <?PHP include_once('selectBar.php'); ?>
                
            </div>
        </nav>
        <section>
            <div class="layer1">
                <form method="post" name="personalinfo" action="vn-searchList-new-mainbody.php" xmlns:javascript="http://www.w3.org/1999/xhtml">
                    <div class="Content-Title">
                        <table style="text-align: center; " class="Content-Title-2">
                            <tr>
                                <td style="vertical-align:middle;" class="TitleBar">
                                    <b> Subsidy Application </b>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!-- Search by ID Number, Patient Record Number or Patient's Name -->
                    <div class="HospitalData" style="height: 130px; margin: 30px 0 0 0;">
                        <table class="DiagnosisForm">
                            <tr align="center">
                                <td>
                                    <b>Search by ID Number, Patient Record Number or Patient's Name</b><br>
                                    <input type="text" name="srhValue" size="30" maxlength="50" value="" title="">
                                </td>
                            </tr>
                            <tr align="center">
                                <td>
                                    <input type="button" name="Search" value="Search" title="" onClick="return searchData()">
                                </td>
                            </tr>
                        </table>
                    </div>
                </form>
            </div>
        </section>
        <footer>
            <div>The  Web  Best  Browse  Mode ： Internet Explorer 9 (Or Update)  /  800 x 600  Resolution<br>
                Copyright © 2006~2016  <a href="http://www.nncf.org/" target="_blank">Noordhoff  Craniofacial  Foundation</a></div>
        </footer>
    </body>
    <input type="hidden" name="srhType" value="$srhType">
    <input type="hidden" name="srhValue" value="$srhValue">
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