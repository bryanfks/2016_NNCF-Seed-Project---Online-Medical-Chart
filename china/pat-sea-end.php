<?
	
	session_cache_limiter("none");
	session_start();
	
	
	include 'db.php';  
	
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
	
	if(!empty($seid) && !empty($sepwd)){
		
		$clientid = $_POST['clientid'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		
		$nat = $_POST['nationality'];
		if($nat == "OTHER"){								//判斷 Nationality 若為 OTHER 時, 則帶入空格欄的值 Nationalitys value.
			
			$nationality = $_POST['nationalitys'];
			// nationality 為國別簡碼, 當選 Other時, 則為input值
		}else{
			
			$code = $_POST['nationality'];
					
			$chk_acc = "SELECT * FROM country WHERE natcode='".$code."'";
		
			$query = mysql_query($chk_acc);
		
			$row = mysql_fetch_array($query);
		
			$nationality = $row['nationality'];
		}	
		
		
		$drid = $_POST['drid'];
		
		$sel_pat = "SELECT * FROM patient WHERE ";
		
		//if(!empty($idnumber)){
			
		$sel_pat .= "clientid='".$clientid."' ";
		
		//}
		if(!empty($firstname)){
			
			$sel_pat .= "OR firstname='".$firstname."' ";
		
		}
		if(!empty($lastname)){
			
			$sel_pat .= "OR lastname='".$lastname."' ";
		
		}
		if(!empty($nationality)){
			
			$sel_pat .= "OR nationality='".$nationality."' ";
		
		}
		if(!empty($drid)){
			$sel_pat .= "OR drid='".$drid."'";
		}
		$query = mysql_query($sel_pat);
?>
<html>

	<head>
		<meta http-equiv="Content-Language" content="zh-tw">
		<meta http-equiv="Content-Type" content="text/html; charset=big5">
		<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
		<meta name="ProgId" content="FrontPage.Editor.Document">
		<title>NCF -- Patient Record Online Management System</title>
		<script language="JavaScript">
			<!--
				function sends(i){
					document.myform[i].submit();
				}
			//-->
		</script>
	</head>

<body topmargin="2" bgcolor="#F2FBFB" style="font-family: Arial; font-size: 12pt">

<div align="center">
  <center>
  <table border="1" cellpadding="0" cellspacing="0" width="760" background="images/logo1.jpg" height="100%" bordercolor="#CCCCCC">
    <tr>
      <td width="100%" valign="top">
                        </center>
      <div align="center">
        <center>
        <table border="0" cellpadding="0" cellspacing="0" width="100%" bordercolor="#C0C0C0">
          <tr>
            <td width="100%" align="center" background="images/main1.jpg">
              <div align="center">
                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                  <tr>
                    <td width="33%" valign="middle" height="107">
                    <font size="3">　<img border="0" src="images/logo2.gif" align="bottom" width="85" height="90"></font></td>
                    <td width="20%" valign="middle" height="107">
                      　
                    <p>　</p>
                    <p><font color="#666666" size="3">【 </font><font color="#666666" size="3">                
                      Hi ! <?PHP echo $seid; ?> </font><font color="#666666" size="3"> 】</font> </td>                               
                    <td width="47%" valign="top" height="107">
                      <p><font size="3"><font color="#FF9966">　　　　　　　　</font><font color="#FF9966">Amount of online user：</font><font color="#008080">&lt;num&gt;</font></font></p>                     
                      <p><b><font size="3"><font color="#FF9966">
                      Real-time message</font><font color="#FF9966">：                      
                      </font></font></b><font size="3"><font color="#FF9966"><br>                     
                      </font><font color="#008080">　　</font><font color="#008080">&lt;                                    
                      message&gt;</font></font></p>  
                    </td>
                  </tr>
                </table>
              </div>
            </td>
          </tr>
          <tr>
            <td width="100%" align="center" bgcolor="#C0C0C0">
              <div align="center">
                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                  <tr>
                    <td width="20%" align="center"><font size="3" face="Arial"><select size="1" name="select1" onChange="javascript:location.href=this.options.value">
                        <option selected>Record Management</option>
                        <option value="pat-sea-pat.php">Search Patient</option>
                        <option value="pat-add-pat.php">Add Patient</option>
                      </select></font></td>
                    <td width="20%" align="center"><font size="3" face="Arial"><select size="1" name="select2" onChange="javascript:location.href=this.options.value">
                        option selected>Other Function</option>
                        <option value="oth-acc-inf.php">Personal Info Edit</option>
                        <option value="">Forum Of Discussion</option>
                        <option value="oth-all.php">Allowances Function</option>
                      </select></font></td>
                    <td width="20%" align="center"><font size="3" face="Arial"><select size="1" name="select3" onChange="javascript:location.href=this.options.value">
                        <option selected>Report Management</option>
                        <option>Print Patient Data</option>
                      </select></font></td>
                    <td width="20%" align="center"><font size="3" face="Arial"><select size="1" name="select4" onChange="javascript:location.href=this.options.value">
                        <option selected>System Management</option>
                        <option value="sys-add-acc.php">Add Account</option>
                        <option value="">Maintain Account</option>
                        <option value="">Delete Account</option>
                        <option value="">Set Real-time Message</option>
                        <option value="">Assign E-mail</option>
                      </select></font></td>
                    <td width="20%" align="center"><font size="3" face="Arial"><input type="button" value="LOGOUT" name="logout" onclick="javascript:location.href='logout.php'"></font></td>
                  </tr>
                </table>
              </div>
            </td>
          </tr>
          <tr>
            <td width="100%" align="center">
              <hr size="1" color="#999999">
            </td>
          </tr>
          <tr>
            <td width="100%" align="center" valign="bottom">
              <div align="center">
                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                  <tr>
                    <td width="20%" align="center" valign="bottom"><font size="3" face="Arial"><img border="0" src="images/main2-21.gif" width="160" height="40"></font></td>
                    <td width="20%" align="center" valign="bottom"><a href="for-key.php"><font size="3" face="Arial"><img border="0" src="images/main2-12.gif" width="160" height="40"></font></a></td>
                    <td width="20%" align="center" valign="bottom"><a href="med-sup.php"><font size="3" face="Arial"><img border="0" src="images/main2-13.gif" width="160" height="40"></font></a></td>
                    <td width="20%" align="center" valign="bottom"><a href="fin-ass.php"><font size="3" face="Arial"><img border="0" src="images/main2-14.gif" width="160" height="40"></font></a></td>
                    <td width="20%" align="center" valign="bottom">　</td>
                  </tr>
                </table>
              </div>
            </td>
          </tr>
          <tr>
            <td width="100%" align="center" bgcolor="#F7EBC6">
              　
              <div align="center">
                <table border="1" cellpadding="0" cellspacing="0" width="90%" bgcolor="#FF9966">
                  <tr>
                    <td width="100%">
                      <p align="center"><font size="4" face="Arial" color="#FFFFFF"><i>
                      Search patient</i></font></td>      
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
                <table border="1" cellpadding="0" cellspacing="0" width="95%" style="color: #666666">
                  <tr>
                    <td width="14%" align="center">
                      <p style="line-height: 150%; margin-left: 1; margin-right: 1"><font color="#666666" size="3" face="Arial">Client's   
                      ID<br>
                      of the patient</font><font color="#666666" size="3"></font></td>   
                    <td width="19%" align="center">
                      <p style="line-height: 150%; margin-left: 1; margin-right: 1"><font color="#666666" size="3" face="Arial">Name</font><font color="#666666" size="3"> 
                      <br>
                      of the patient</font></td> 
                    <td width="21%" align="center">
                      <p style="line-height: 150%; margin-left: 1; margin-right: 1"><font face="Arial" color="#666666" size="3">Nationality<br>
                      of the patient birth</font></td>
                    <td width="17%" align="center">
                      <p style="line-height: 150%; margin-left: 1; margin-right: 1">Client's 
                      ID of the doctor create the information</td> 
                    <td width="17%" align="center">
                      <p style="line-height: 150%; margin-left: 1; margin-right: 1">Date 
                      of create<br>
                      the patient's<br>
                      information</td>
                  </tr>
          		<?PHP
          			//$i = 0;
          			while($row = mysql_fetch_array($query)){
          				echo "<form name='myform' method='get' active='pat-pat-inf.php'>";
                		echo "<tr>";
                		echo "  <td width='14%' align='center'>";
                		echo "    <p style='line-height: 150%; margin-left: 1; margin-right: 1'><a href='pat-pat-inf.php?clientid=".$row['clientid']."&drid=".$row['drid']."'>".$row['clientid']."</a></td>";
                		echo "  <td width='19%' align='center'>";
                		echo "    <p style='line-height: 150%; margin-left: 1; margin-right: 1'>".$row['firstname']." ".$row['lastname']."</td>";
                		echo "  <td width='21%' align='center'>";
                		echo "    <p style='line-height: 150%; margin-left: 1; margin-right: 1'>".$row['nationality']."</td>";
                		echo "  <td width='17%' align='center'>";
                		echo "    <p style='line-height: 150%; margin-left: 1; margin-right: 1'>".$row['drid']."</td>";
                		echo "  <td width='17%' align='center'>";
                		echo "    <p style='line-height: 150%; margin-left: 1; margin-right: 1'>".$row['addtime']."</td>";
                		echo "</tr>";
                		echo "<input type='hidden' name='clientid' value='".$row['clientid']."'>";
                		echo "<input type='hidden' name='drid' value='".$row['drid']."'>";
                		echo "</form>";
                		//$i++;
                	}
                ?>
                </table>
                </center>
              </div>
              <p align="center" style="line-height: 200%; margin-left: 10; margin-right: 10">
              　
              <p align="left" style="line-height: 200%; margin-left: 10; margin-right: 10">
              　
              <p align="left" style="line-height: 200%; margin-left: 10; margin-right: 10">
              　</td>
          </tr>
        </table>
      </div>
      <p align="center" style="line-height: 150%"><i><font color="#999999" face="Arial" size="3">The&nbsp; Web&nbsp; Best&nbsp;                                     
      Browse&nbsp; Mode </font><font size="3" color="#999999"> ： </font><font color="#999999" face="Arial" size="3"> Internet&nbsp; Explorer&nbsp; 6.02 (Or Update)&nbsp;                                     
      /&nbsp; 800 x 600&nbsp; Resolution<br>                                    
      Copyright &copy; 2005~2006&nbsp; <a href="http://www.nncf.org/" target="_blank">Noordhoff&nbsp;                                     
      Craniofacial&nbsp; Foundation</a></font></i></p>                                   
      </td>
    </tr>
  </table>
</div>

</body>

</html>
<?
	
	}else{
		
		echo "<Script Language='JavaScript'>";
		
		echo "alert('抱歉您現在無權限讀取,請先登入');";
		
		echo " location.href='login.php';";
		
		echo " </Script>";
	
	}

?>