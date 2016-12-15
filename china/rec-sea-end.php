<?
	session_start();

	include 'db.php';
	
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
	
	//------ Get $seid the auth code. ------------------
	$sel_member_auth = "SELECT * FROM `member` WHERE id='".$seid."'";
	$sel_member_auth_query = mysql_query($sel_member_auth);
	$sel_member_auth_result = mysql_fetch_array($sel_member_auth_query);
	$member_auth = $sel_member_auth_result["authority"];
	
	if( (!empty($seid)) && (!empty($sepwd)) ){
		
		$patid = $_POST["patid"];
		$firstname = $_POST["firstname"];
		$lastname = $_POST["lastname"];
		$nat = $_POST["nationality"];
		$nats = $_POST["nationalitys"];
		$editor = $_POST["editor"];
	
		if(!empty($patid)){
			$itemOfcolumn = "patientid";
			$itemOfvalue = $patid;
			$itemOfsearch = $itemOfcolumn."='".$itemOfvalue."'";
			$sel_data = "SELECT * FROM `patient` WHERE ".$itemOfsearch."";
			
		@$query_data = mysql_query($sel_data);	
		}elseif(!empty($nat)){
			if(($nat == "KH") || ($nat == "VN") || ($nat == "PH") || ($nat == "MM") || ($nat == "IN") || ($nat == "ID") || ($nat == "PK") || ($nat == "DM") || ($nat == "TW")){
				$itemOfcolumn = "nationality";
				$itemOfvalue = $nat;
				$itemOfsearch = $itemOfcolumn."='".$itemOfvalue."'";
				//$sel_data = "SELECT * FROM `patient` WHERE ".$itemOfsearch." ORDER BY `patientid` DESC";
				$sel_data = "SELECT * FROM `patient` WHERE ".$itemOfsearch." ORDER BY `patientid` DESC";
				@$query_data = mysql_query($sel_data);	
			}else if($nat == "CN"){
				echo "<html>";
				echo "<head>";
				echo "<Script Language='JavaScript'>";
				echo "<!--";
				echo "\n alert('Sorry, Access denied. Please Login first.');";
				echo "\n";
				echo " location.href='searchList.php';\n";
				echo "//-->";
				echo " </Script>";
				echo "</head>";
				echo "</html>";
			}else{
				$itemOfcolumn2 = "nationality";
				$itemOfvalue2 = $nats;
				$itemOfsearch2 = $itemOfcolumn2."='".$itemOfvalue2."'";
				//$sel_data2 = "SELECT * FROM `patient` WHERE ".$itemOfsearch2." ORDER BY `patientid` DESC";
				$sel_data2 = "SELECT * FROM `patient` WHERE ".$itemOfsearch2." ORDER BY `patientid` DESC";
				@$query_data = mysql_query($sel_data2);	
			}
		}elseif((!empty($firstname)) || (!empty($lastname))){
			$itemOfcolumn_firstname = "firstname";
			$itemOfvalue1 = $firstname;
			$itemOfcolumn_lastname = "lastname";
			$itemOfvalue2 = $lastname;
			$itemOfsearch = "".$itemOfcolumn_firstname."='".$itemOfvalue1." ' OR ".$itemOfcolumn_lastname."='".$itemOfvalue2."'";
			//$sel_data = "SELECT * FROM `patient` WHERE ".$itemOfsearch." ORDER BY `patientid` DESC";
			$sel_data = "SELECT * FROM `patient` WHERE ".$itemOfsearch." ORDER BY `patientid` DESC";
			@$query_data = mysql_query($sel_data);	
		}elseif(!empty($editor)){
			$sel_data = "SELECT * FROM `patrecord` WHERE editorid = '".$editor."' ORDER BY `patid` DESC";
			@$query_data = mysql_query($sel_data);
		}
?>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>NCF -- Patient Record Online Management System</title>
<SCRIPT LANGUAGE="javascript">
	<!--
<?PHP
	//echo $member_auth;
	if(($member_auth =="admin") || ($member_auth =="a") || ($member_auth =="ncfa")){
?>
		function fetch_Data(num){
			if (num/2 != 0){			
				nums = num*2;
			}else{
				nums = num;
			}
			result = document.myForm.elements[nums].value;
			//alert(result);
			location.href = "rec-pat-inf.php?id="+result;
		}
<?PHP
	} else {
?>
		function fetch_Data(num){
			if (num/2 != 0){			
				nums = num*2 -1 ;
			}else{
				nums = num;
			}
			result = document.myForm.elements[nums].value;
			//alert(result);
			location.href = "rec-pat-inf.php?id="+result;
		}
<?PHP } ?>
	/* 
		以上算式計算法說明：
		因admin ﹠其他帳號的差異在於 上方下拉式選單數量
		1. admin帳號：共三個下拉選單，所以 " ID of the patient " 由 4 開始計算，以 +2 進位（偶數進位）。
		2. 其他帳號：共兩個下拉選單，所以 " ID of the patient " 由 3 開始計算，以 +2 進位（奇數進位）。
	*/
	//-->
</SCRIPT>
</head>

<body topmargin="2">
<form name="myForm" enctype="multipart/form-data" method="get" >
<div align="center">
  <center>
  <table border="0" cellpadding="0" cellspacing="0" width="760">
    <tr>
      <td width="100%">
        <div align="center">
          <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-style: solid; border-width: 2" height="1">
            <tr>
              <td width="100%" height="16" align="center"><font size="2" face="Arial"><?PHP include("/home/customer/seed-nncf.org/www/top.php"); ?></font></td>
            </tr>
            <tr>
              <td width="100%" height="16" align="center"><font size="2" face="Arial"><?PHP include("/home/customer/seed-nncf.org/www/select.php"); ?></font></td>
            </tr>
  </center>
            <tr>
              <td width="100%" height="100%" align="center">
                <div align="center">
                  <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                      <td width="100%">
                        <div align="left">
                          <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                              <td width="20%"></td>
                              <td width="20%"></td>
                              <td width="20%"></td>
                              <td width="20%"></td>
                              <td width="20%"></td>
                            </tr>
                          </table>
                        </div>
                      </td>
                    </tr>
  <center>
  <tr>
                <td width="100%" align="center" bgcolor="#F7EBC6">
              <font size="2">　</font>
              <div align="center">
                <table border="1" cellpadding="0" cellspacing="0" width="90%" bgcolor="#FF9966">
                  <tr>
                    <td width="100%">
                      <p align="center"><i>
                      <font face="Arial" color="#FFFFFF" size="3"><b>Search   
                      Patient</b></font></i></td>   
                  </tr>
                </table>
              </div>
        
                </center><p style="line-height: 200%" align="left"><font color="#666666" size="2">　</font></td>
          </tr>
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
                            <td width="16%" align="center" height="19" valign="middle">
                              <p style="line-height: 150%">ID of the patient</td>  
                            <td width="16%" align="center" height="19" valign="middle">
                              <p style="line-height: 150%">First name</td>
                            <td width="17%" align="center" height="19" valign="middle">
                              <p style="line-height: 150%">Last name</td>
                            <td width="17%" align="center" height="19" valign="middle">
                              <p style="line-height: 150%">Nationality</td>
                  			<td width="17%" align="center" valign="middle">　</td>
                  </tr>
                   <?PHP
				   		$i=2;
				   		//$j=2;
				   		while($result = mysql_fetch_array($query_data)){
				   				if(($result["nationality"] != "KH") && ($result["nationality"] != "VN") && ($result["nationality"] != "PH") && ($result["nationality"] != "CN") && ($result["nationality"] != "MM") && ($result["nationality"] != "IN") && ($result["nationality"] != "ID") && ($result["nationality"] != "PK") && ($result["nationality"] != "DM") && ($result["nationality"] != "TW")){
									$natcode = $result["nationality"];
								}else{
									$sel_natcode = "SELECT * FROM `country` WHERE natcode='".$result["nationality"]."'";
									@$query_natcode= mysql_query($sel_natcode);	
									$natcodes = mysql_fetch_array($query_natcode);
									$natcode = $natcodes["nationality"];
								}
						echo "<tr>";
		            	echo "<input type='hidden' name='".$i."' value='";
							if(!empty($result["patientid"])){
								echo $result["patientid"];
							}else{
								echo $result["patid"];
							}
						echo "'>";
			    		echo "<td width='16%' align='center' valign='middle'>";
							if(!empty($result["patientid"])){
								echo $result["patientid"];
							}else{
								echo $result["patid"];
							}
						echo "</td>";
						echo "<td width='16%' align='center' valign='middle'>".$result["firstname"]."</td>";
        		    	echo "<td width='17%' align='center' valign='middle'>".$result["lastname"]."</td>";
					    echo "<td width='17%' align='center' valign='middle'>".$natcode."</td>";
						echo "<td width='17%' align='center' valign='middle'><font size='3'><input type='button' value='ENTER' name='search' onClick='fetch_Data(".$i.")'></font></td>";
						echo "</tr>";
					    $i++;
                   }
	              ?>
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
                Copyright © 2008&nbsp; </font><a href="http://www.nncf.org/" target="_blank"><font color="#0066CC">Noordhoff&nbsp;          
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