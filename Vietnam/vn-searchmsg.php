<?
    session_start();

    include 'db.php';
    
    $seid = $_SESSION["seid"];
    $sepwd = $_SESSION["sepwd"];
    
    if( (!empty($seid)) && (!empty($sepwd)) ){
        
        $srhType = $_POST["srhType"];
        $srhValue = $_POST["srhValue"];
        
        if($srhType == "chkID"){
            $selChinaPatientinfo = "SELECT * FROM `patient-vn` WHERE idno ='".$srhValue."' ORDER BY `idno` DESC";
        }else if($srhType == "chkNAME"){
            $selChinaPatientinfo = "SELECT * FROM `patient-vn` WHERE name ='".$srhValue."' ORDER BY `name` DESC";
        }else if($srhType == "chkPATNO"){
            $selChinaPatientinfo = "SELECT * FROM `patient-vn` WHERE MedicalRecordNumber ='".$srhValue."' ORDER BY `MedicalRecordNumber` DESC";
        }else{
            echo "<Script Language='JavaScript'>";
            echo "<!--";
            //echo "\n alert('查无符合资料！请按下“新增”直接新增补助申请表或是按下“取消”重新查询');";
            echo "\n";
            //echo " location.href='for-pla-add-china-search.php';\n";
            echo "//-->";
            echo " </Script>";
        }
        
        @$queryChinaPatientinfo = mysql_query($selChinaPatientinfo);
        @$rows = mysql_num_rows($queryChinaPatientinfo);
        
        //echo $selChinaPatientinfo."<br/>";
        //echo $srhType." == ".$srhValue." == ".$rows;
        
        if(empty($rows)){
            echo "<html>";
            echo "<head>";
            echo "<Script Language='JavaScript'>";
            echo "<!--";
            //echo "\n alert('查无符合资料！请按下“新增”直接新增补助申请表或是按下“取消”重新查询。');";
            echo "\n";
            //echo " location.href='main.php';\n";
            echo "//-->";
            echo " </Script>";
            echo "</head>";
            echo "</html>";
        }
        //$chinaDrID = $seid;
        //$selChinaPatientinfo = "SELECT * FROM `patient-china` WHERE patientID ='".$seid."' ORDER BY `NCFID` DESC";
        //$queryChinaPatientinfo = mysql_query($selChinaPatientinfo);
        //$rows = mysql_num_rows($queryChinaPatientinfo);
        //echo $rows;
        
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Personal Information</title>
        <link rel="stylesheet" href='css/searchBar.css'>
        <link rel="stylesheet" href='css/VNSearch.css'>
        <SCRIPT LANGUAGE="javascript">
            function addData(){
                location.href = "vn-add-pinfo.php";
            }                          
            function cancelSearch(){
                //alert("for-pla-add-china-cgmh-view.php?cpi="+num);
                location.href = "vn-searchpage.php";
            }
        </SCRIPT>
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
            <div>
                <?PHP include_once('selectBar.php'); ?>
            </div>
        </nav>
        <section>
            <div class="layer1">
                <form method="post" name="personalinfo" action="#" xmlns:javascript="http://www.w3.org/1999/xhtml">
                    <div class="Content-Title">
                        <table style="text-align: center; " class="Content-Title-2">
                            <tr>
                                <td style="vertical-align:middle;" class="TitleBar">
                                    <b> Search Patient </b>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!-- Search by ID Number, Patient Record Number or Patient's Name -->
                    <div class="HospitalData" style="height: 130px; margin: 30px 0 0 0;">
                        <table class="DiagnosisForm">
                            <tr align="center">
                                <td>
                                    <p style="line-height: 150%">No data!</p>
                                    <p style="line-height: 150%">Please press "Add" to create a new patient or "Cancel" to restart the process.</p>
                                </td>
                            </tr>
                            <tr align="center">
                                <td>
                                    <!-- <input type="button" name="Search" value="Search" title="" onClick="return searchData()"> -->
                                    <input type="button" name="addNewRecord" value="Add" onClick="return addData()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="button" name="cancelSearchData" value="Cancel" onClick="return cancelSearch()">
                                </td>
                            </tr>
                        </table>
                    </div>
                </form>
            </div>
            <input type="hidden" name="srhType" value="$srhType">
            <input type="hidden" name="srhValue" value="$srhValue">
        </section>
        <footer>
            <div>The  Web  Best  Browse  Mode ： Internet Explorer 9 (Or Update)  /  800 x 600  Resolution<br>
                Copyright © 2006~2016  <a href="http://www.nncf.org/" target="_blank">Noordhoff  Craniofacial  Foundation</a></div>
        </footer>
    </body>
</html>
<?PHP
    }else{
        echo "<html>";
        echo "<head>";
        echo "<Script Language='JavaScript'>";
        echo "<!--";
        echo "\n alert('Sorry, Access denied. Please Login first.');";
        echo "\n";
        echo " location.href='login.php';\n";
        echo "//-->";
        echo " </Script>";
        echo "</head>";
        echo "</html>";
    }
?>