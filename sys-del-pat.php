<?PHP 
	
	session_cache_limiter("none");
	session_start();
	
	include 'db.php';  
	
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
	
	if(!empty($seid) && !empty($sepwd)){
		
		$id = $seid;										
    if(!empty($_POST['nationality']))	{
      $fg = $_POST['nationality'];
    }else{
      $fg = $_GET['f'];
    }
    //echo "Contry code: ".$fg."<br>";
    if($fg == 1){
      //$sel_data = "SELECT * FROM `patient-china` WHERE `NCFID` LIKE 'CN15%' ORDER BY `NCFID` DESC";
      $sel_data = "SELECT * FROM `patient-china` ORDER BY `NCFID` DESC";
      //echo $sel_data."<br/>";
      $query = mysql_query($sel_data);  
    }elseif ($fg == 2) {
      //$sel_data = "SELECT * FROM `chinapatient` ORDER BY `patientID` DESC";
      $sel_data = "SELECT * FROM `chinapatient` ORDER BY `patientID` DESC";
      $query = mysql_query($sel_data);
    }elseif ($fg == 3) {
      $sel_data = "SELECT * FROM `PKpatient` ORDER BY `patientid` DESC";
      $query = mysql_query($sel_data); 
    }elseif ($fg == 4) {
      $sel_data = "SELECT * FROM `PHpatient` ORDER BY `NCFID` DESC";
      $query = mysql_query($sel_data); 
    }
?>


<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>NCF -- Patient Record Online Management System</title>
<SCRIPT LANGUAGE="javascript">
	<!--
		function fetch_Data(num){
			if(confirm('Delete Patient?')){
        nat = '<?PHP echo $fg; ?>';
				location.href = "sys-del-pat-del.php?id="+num+"&f="+nat;
			}
		}
	// -->
</SCRIPT>
</head>

<body topmargin="2">

<form name="myform" enctype="multipart/form-data" method="post" action="sys-del-pat-del.php">
<div align="center">
  <center>
  <table border="0" cellpadding="0" cellspacing="0" width="760">
    <tr>
      <td width="100%">
        <div align="center">
          <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-style: solid; border-width: 2" height="1">
            <tr>
              <td width="100%" height="16" align="center"><font size="2" face="Arial"><?PHP include("/var/www/vhosts/seed-nncf.org/httpdocs/top.php"); ?></font></td>
            </tr>
            <tr>
              <td width="100%" height="16" align="center"><font size="2" face="Arial"><?PHP include("/var/www/vhosts/seed-nncf.org/httpdocs/select.php"); ?></font></td>
            </tr>
  </center>
            <tr>
              <td width="100%" height="100%" align="center">
                <div align="center">
                  <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                      <td width="100%">
                        <p align="right"><font size="2"><img border="0" src="images/laebl-25.gif" width="160" height="40"></font></td>
                    </tr>
  <center>
  <tr>
            <td width="100%" align="center" bgcolor="#F7EBC6">
              <font size="2">　</font>
              <div align="center">
                <table border="1" cellpadding="0" cellspacing="0" width="90%" bgcolor="#FF9966">
                  <tr>
                    <td width="100%">
                      <p align="center"><i><b><font face="Arial" color="#FFFFFF" size="3">Delete 
                      Patient</font></b></i></td>        
                  </tr>
                </table>
              </div>
              <p></td>
          </tr>
        </center>
          <tr>
            <td width="100%" align="center" bgcolor="#F7EBC6" valign="top">
              <div align="center">
                <center>
                <table border="0" cellpadding="0" cellspacing="0" width="90%" style="font-family: Arial; font-size: 12pt; color: #666666; border-collapse: collapse" bordercolor="#111111">
                  <tr>
                    <td width="100%" style="border-top: 1px solid #C0C0C0; " height="19">
                      <p style="line-height: 200%" align="center">
                    </td>
                  </tr>
                </table>
                </center>
              </div>
              <div align="center">
                <center>
                <table border="1" cellpadding="0" cellspacing="0" width="90%">
                  <tr>
                            <td width="20%" align="center" height="19" valign="middle">
                              <p style="line-height: 150%"><font size="3" face="Arial">ID</font></td>
                            <td width="20%" align="center" height="19" valign="middle">
                              <p style="line-height: 150%"><font size="3" face="Arial">Name</font></td>
                            <!--
                            <td width="20%" align="center" height="19" valign="middle">
                              <p style="line-height: 150%"><font size="3" face="Arial">Last name</font>
                            </td>
                            -->
                      <td width="20%" align="center" valign="middle">
                      <p style="line-height: 150%"><font size="3">　</font></p>
                            </td>
                  </tr>
                  <tr>
                  	<?PHP
                  		//$i=2; 原始資料
                      $i = 2;
                  		while($result = mysql_fetch_array($query)){
                        //echo "<br>".$result["NCFID"]."<br>";
                        echo "<tr>";
                        echo "<input type='hidden' name='".$i."' value='".$result['patientid']."'>";
	                    echo "<td width='20%' align='center' valign='middle' >".$result['NCFID']."</td>";
                        echo "<td width='20%' align='center' valign='middle'>".$result['name']."</td>";
                        echo "<td width='20%' align='center' valign='middle'><font size='3'>";
                        echo "<input type='button' value='DELETE' name='maintain' onClick='fetch_Data(".$result['num'].")'>";
                        echo "</font></td>";
                        echo "<input type='hidden' name='id' value='".$result['num']."'>";
                        echo "<input type='hidden' name='f' value='".$fg."'>";
                        echo "<input type='hidden' name='NCFID' value='".$result['NCFID']."'>";
                        echo "</tr>";
                        
                        $i++;
                      }
	              	
                    ?>
                  </tr>
                </table>
                </center>
              </div>
              <p align="left" style="line-height: 200%; margin-left: 10; margin-right: 10">
              　</td>
              </tr>
                    </table>
                  </div>
                </td>
            </tr>
            <tr>
              <td width="100%" height="1" align="center">
                <hr size="1" color="#C0C0C0" width="98%">
                <p align="center"><i><font size="2"><font face="Arial" color="#999999">The&nbsp;           
                Web&nbsp; Best&nbsp; Browse&nbsp; Mode </font><font color="#999999">：           
                </font><font face="Arial"><font color="#999999">Internet&nbsp;           
                Explorer&nbsp; 6.02 (Or Update)&nbsp; /&nbsp; 800 x 600&nbsp;           
                Resolution<br>
                Copyright c 2006~2007&nbsp; </font><a href="http://www.nncf.org/" target="_blank"><font color="#0066CC">Noordhoff&nbsp;           
                Craniofacial&nbsp; Foundation<br>          
                <br>
                </font></a></font></font></i></td>
            </tr>
          </table>
        </div>
      </td>
    </tr>
  </table>
</div>
</form>
</body>

</html>


<?PHP
	
  }else{
    echo "<Script Language='JavaScript'>";
    echo "alert('Sorry, Access denied. \n  Please Login first.');";
    echo " location.href='login.php';";
    echo " </Script>";
  }

?>
