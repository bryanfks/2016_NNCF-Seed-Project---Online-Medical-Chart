<?
  session_start();

  include 'db.php';
  
  $seid = $_SESSION["seid"];
  $sepwd = $_SESSION["sepwd"];
  
  if( (!empty($seid)) && (!empty($sepwd)) ){
    
    $srhValue = $_POST["srhValue"];
    if((!empty($srhValue))){
      // $selPatientinfo = "SELECT * FROM `patient-vn` WHERE `name` LIKE '".$srhValue."' OR `idno` LIKE '".$srhValue."' OR `MedicalRecordNumber` LIKE '".$srhValue."'"; 
      // echo 'Value: '.$selPatientinfo.'<br>'; 

      //屬廣泛搜尋法 ％：表示分配字元
      $queryPatientinfo = mysql_query("SELECT * FROM `patient-vn` WHERE `name` LIKE '".$srhValue."' OR `idno` LIKE '".$srhValue."' OR `MedicalRecordNumber` LIKE '".$srhValue."'");
      $rows = mysql_num_rows($queryPatientinfo);
    }
   
  // exit();
    if(empty($rows)){
      echo "<html>";
      echo "<head>";
      echo "<Script Language='JavaScript'>";
      echo "<!--";
       echo "\n";
      echo " location.href='vn-searchmsg.php';\n";
      echo "//-->";
      echo " </Script>";
      echo "</head>";
      echo "</html>";
    }
  
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
                // location.href = "for-pla-add-china-cgmh_new.php?cpi="+num+"&srhType=<? echo $srhType; ?>&srhValue=<? echo $srhValue; ?>";
                location.href = "vn-view-pinfo-new.php?cpi="+num+"&srhType=<? echo $srhType; ?>&srhValue=<? echo $srhValue; ?>";
            }
            function addData(){
                //alert("for-pla-add-china-cgmh-view.php?cpi="+num);
                location.href = "vn-add-pinfo.php";
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
            <div><?PHP require_once('selectBar.php'); ?></div>
        </nav>
        <section>
            <div class="layer1"><?PHP require_once('vn-searchList-new-content.php'); ?></div>
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
       echo " location.href='http://www.seed-nncf.org/login.php';\n";
       echo "//-->";
       echo " </Script>";
       echo "</head>";
       echo "</html>";
   }
?>