<?
  session_start();

  include 'db.php';
  
  $seid = $_SESSION["seid"];
  $sepwd = $_SESSION["sepwd"];
  
  if( (!empty($seid)) && (!empty($sepwd)) ){
    
    $srhType = $_POST["srhType"];
    $srhValue = $_POST["srhValue"];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Personal Information</title>
        <link rel="stylesheet" href='css/selectBar.css'>
        <link rel="stylesheet" href='css/VNSearchList.css'>
        <SCRIPT LANGUAGE="javascript">
            function fetch_Data(num){
                location.href = "vn-view-pinfo.php?cpi="+num;
            }
            function addData(){
                //alert("for-pla-add-china-cgmh-view.php?cpi="+num);
                location.href = "for-pla-add-china-cgmh.php";
            }
        </SCRIPT>
    </head>
    <body>
        <header>
            <div class="RealTimeMsg">
                <div class="RTMsg">
                    Hi! <?php echo $seid; ?>
                </div>
            </div>
        </header>
        <nav>
            <div><?PHP require_once('selectBar.php'); ?></div>
        </nav>
        <section>
            <div class="layer1">
              <div class="Content-Title">
                <table style="text-align: center; " class="Content-Title-2">
                  <tr>
                    <td style="vertical-align:middle;" class="TitleBar">
                      <b>Search Patient</b>
                    </td>
                  </tr>
                </table>
              </div>
              <!-- Search List --> 
              <div class="HospitalData">
                <table class="DiagnosisForm">
                  <tr align="center">
                    <td>Subsidy Number(NCF)</td>
                    <td>NCF Number</td>
                    <td>Name</td>
                    <td>Hospital</td>
                    <td>Patient Record Number(Hospital)</td>
                    <td>Status</td>
                    <td style="width: 130px;"></td>
                  </tr>
                  <tr> 
                    <?PHP
                      $SelCode = "SELECT * FROM `patient-vn-record` ORDER BY `NCFMedicalNum` DESC";
                      $QueryCode = mysql_query($SelCode);
                
                      $i = 1;
                      while($ResData = mysql_fetch_array($QueryCode)){
                        $SelVNPinfo = "SELECT * FROM `patient-vn` WHERE `NCFID`='".$ResData['NCFID']."'";
                        $QueryVNPinfo = mysql_query($SelVNPinfo);
                        $ResVNPinfo = mysql_fetch_array($QueryVNPinfo);
                        

                        $remarks = $ResData["remark"];
                        if($remarks == "0" || $remarks == 0){
                          $remark2 = "Waiting for Approval";
                        }else if($remarks == "1" || $remarks == 1){
                          $remark2 = "Incomplete";
                        }else if($remarks == "2" || $remarks == 2){
                          $remark2 = "Complete";
                        }else {
                          return "";
                        }
                        if ($ResData["hospitalname"] == 'OMFH'){
                            $hospitalName = 'Odonto Maxillo Facial Hospital';
                        }

                        echo "<tr>";
                            echo "<td width='16%' align='center' valign='middle'>".$ResData["NCFMedicalNum"]."</td>";
                            echo "<td width='16%' align='center' valign='middle'>".$ResData["NCFID"]."</td>";
                            echo "<td width='17%' align='center' valign='middle'>".$ResVNPinfo["name"]."</td>";
                            echo "<td width='17%' align='center' valign='middle'>".$hospitalName."</td>";
                            echo "<td width='17%' align='center' valign='middle'>".$ResVNPinfo["MedicalRecordNumber"]."</td>";
                            echo "<td width='17%' align='center' valign='middle'>".$remark2."</td>";
                            $values = $ResData['num'];
                            echo "<td width='17%' align='center' valign='middle'><font size='3'><input type='button' value='Enter' name='search' onClick='fetch_Data(".$values.")'></font></td>";
                        echo "</tr>";
                        //echo $i."<br/>";
                        $i++;
                      }
                    ?>
                  </tr>
                  <tr></tr>
                </table>
              </div>
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