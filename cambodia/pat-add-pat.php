<?
	session_cache_limiter("none");
	session_start();
	include 'db.php';  
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
	if(!empty($seid) && !empty($sepwd)){
		
		$sel_auth = "SELECT * FROM member WHERE id='".$seid."'";		//取得醫師的 ID
		$query = mysql_query($sel_auth);
		$result = mysql_fetch_array($query);
		$auth = $result['authority'];									//取得職業類別(權限設定);目前取得的是職別全名
		
		
		/*
		
		$sel_transfer = "SELECT * FROM subject WHERE catrgory='".$auth."'";	//將職別全名轉成職別代碼
		$query_transfer = mysql_query($sel_transfer);
		$result_transfer = mysql_fetch_array($query_transfer);
		$transfer_code = $result_transfer['catcode'];
		echo $transfer_code."</br>";
		*/
		
		$sel_auth_code = "SELECT * FROM auth WHERE occupation='".$auth."'";	//將職別代碼轉出國內或國外的代碼 f/t
		$query_code = mysql_query($sel_auth_code);
		$result_code = mysql_fetch_array($query_code);
		
		


		// -------------------- 處理 Client-ID ------------------------------
			$dates = getdate();
			$year = $dates['year'];
			$mon = $dates['mon'];
			
			if($mon < 10){ 
				$month = "0".$mon;
			}else{
				$month = $mon;
			}

			$datecode = $year.$month;							// datecode: Client's ID 日期碼

			$sel_flownum = "SELECT MAX(flownum) FROM patient WHERE datecode='".$datecode."' GROUP BY datecode";
			$query_flownum = mysql_query($sel_flownum);
			$result_flownum = mysql_fetch_array($query_flownum);
			$flowcode = $result_flownum['MAX(flownum)'];				// flownum: Client's ID 流水號
			
			if(empty($flowcode)){
				$flownum = 0001;
			}else{
				$flownum = $flowcode + 1;
			}
			
		// ------------------------------------------------------------------ 
		
			
		$drid = $seid;											// drid: 開案醫師代號
			
		if($result_code['code'] == "f"){
		
?>
<html>

<head>
<meta http-equiv="Content-Language" content="zh-tw">
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>NCF -- Patient Record Online Management System</title>
<SCRIPT ID=clientEventHandlersJS LANGUAGE=javascript>

	<!--
	
		function sendData(){
		
			firstname = document.myform.firstname.value;
		
			lastname = document.myform.lastname.value;
		
			nationality = document.myform.nationality.value;
		
			if(firstname == ""){
			
				alert("Please input \"First Name\".");
			
				return false;
		
			}
		
				
			if(lastname == ""){
			
				alert("Please input \"Last Name\".");
			
				return false;
		
			}
		
					
			if(nationality == ""){
			
				alert("Please select \"Nationality of birth\".");
			
				return false;
		
			}
		
						
			if((firstname != "") && (firstname != "") && (firstname != "")){
			
				document.myform.submit();	
		
			}
	
		}
		function Indata2_onchange(){
			if(window.event.srcElement.options[window.event.srcElement.selectedIndex].text == 'Other'){
				document.myform.nationalitys.disabled = false;
		
			}else{
			
				document.myform.nationalitys.disabled = true;
		
			}
	
		}
	
		function openSubWin(){
			window.open("calendar_js.htm","Sub","width='200',hight='200'");
		}

	//-->

</SCRIPT>
</head>

<body topmargin="2" bgcolor="#F2FBFB" style="font-family: Arial; font-size: 12pt">
<form name="myform" enctype="multipart/form-data" method="post" action="pat-add-rev.php">
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
                        <option selected>Other Function</option>
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
                    <td width="20%" align="center"><font size="3" face="Arial"><input type="button" value="LOGOUT" name="logout" onClick="javascript:location.href='logout.php'"></font></td>
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
                      Patient's 
                      </i>  
                      </font><i><font size="4" face="Arial" color="#FFFFFF">Information</font></i></td>   
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
                <table border="0" cellpadding="0" cellspacing="0" width="90%" height="86" style="font-family: Arial; font-size: 12pt; color:#666666; border-collapse:collapse" bordercolor="#111111">
                  <tr>
                    <td width="28%" style="border-top: 1px solid #C0C0C0; " height="24" valign="top">
                      <p style="line-height: 200%">*<font color="#666666" size="3" face="Arial">Name</font><font color="#666666" size="3">：</font></td>
                    <td width="43%" style="border-top: 1px solid #C0C0C0; " height="24">
                      <p style="line-height: 200%"><font color="#666666" size="3" face="Arial">First name－ <input type="text" name="firstname" size="20" value=""><br>       
                      Last name－ <input type="text" name="lastname" size="20" value=""></font></td>
                    <td width="29%" style="border-top: 1px solid #C0C0C0; " height="8" rowspan="7">
                      <p align="center" style="line-height: 200%"><font size="3"><img border="0" src="images/user-pic.jpg" width="188" height="200"></font></p>
                      <p align="center" style="line-height: 200%"><font color="#666666" size="3"><input type="file" name="picture"></font>      
                    </td>
                  </tr>
                  <tr>
                    <td width="28%" style="border-top: 1px solid #C0C0C0; " height="24">
                      <p style="line-height: 200%"><font face="Arial" color="#666666" size="3">
                      *Nationality of birth</font><font color="#666666" size="3">：</font></td>
                    <td width="43%" style="border-top: 1px solid #C0C0C0; " height="24">
                      <p style="line-height: 200%">
                        <font size="3" color="#666666"><select size="1" name="nationality" onChange="return Indata2_onchange()">
                          <option value="" Selected>Please select...</option>
                        </font>
                        <font face="Arial" size="3" color="#666666">
                          <option value="CAM">Cambodia</option>
                          <option value="VIE">Vietnam</option>
                          <option value="PHI">Philippines</option>
                          <option value="CHI">China</option>
                          <option value="MYA">Myanmar</option>
                          <option value="IND">India</option>
                          <option value="INS">Indonesia</option>
                          <option value="PAK">Pakistan</option>
                          <option value="DOM">Dominican Republic</option>
                          <option value="OTHER">Other</option>
                        </font>
                        </select><input type="text" name="nationalitys" size="20" value="" disabled></td>
                  </tr>
                  <tr>
                    <td width="28%" style="border-top: 1px solid #C0C0C0; " height="24">
                      <p style="line-height: 200%"><font color="#666666" size="3" face="Arial">&nbsp;  
                      Sex</font><font color="#666666" size="3">：</font></td>
                    <td width="43%" style="border-top: 1px solid #C0C0C0; " height="24">
                      <p style="line-height: 200%">
                      <font color="#666666" size="3"><input type="radio" name="sex" value="male">Male　<input type="radio" name="sex" value="female">Female　</font><font face="Arial" size="3" color="#666666"><input type="radio" value="OTHER" name="sex">Other           
                        <input type="text" name="sexs" size="8"></font></td>
                  </tr>
                  <tr>
                    <td width="28%" style="border-top: 1px solid #C0C0C0; " height="24">
                      <p style="line-height: 200%"><font color="#666666" size="3" face="Arial">&nbsp; 
                      Date of birth</font><font color="#666666" size="3">：</font></td>
                    <td width="43%" style="border-top: 1px solid #C0C0C0; " height="24">
                      <p style="line-height: 200%"><font color="#666666" size="3"><input type="text" name="addate" size="20"></font><font face="Arial" color="#666666" size="2"><input type="button" value="PERPETUAL CALENDAR" onClick="javascript:document.all.ADCalendar.Open('addate')"></font></td>
                  </tr>
                  <tr>
                    <td width="28%" style="border-top: 1px solid #C0C0C0; " height="1" valign="top">
                      <p style="line-height: 200%"> 
                      <font color="#666666" face="Arial" size="3">&nbsp;    
              ID number of nationality</font><font color="#666666" size="3">：</font></td>
                    <td width="43%" style="border-top: 1px solid #C0C0C0; " height="1" valign="middle">
                      <p style="line-height: 200%"><font color="#666666" size="3">
                      <input type="text" name="idnumber" size="20"></font></td>     
                  </tr>
                  <tr>
                    <td width="28%" style="border-top: 1px solid #C0C0C0; " height="1" valign="top">
                      <p style="line-height: 200%"><font face="Arial" color="#666666" size="3">&nbsp; 
                      Height：</font></td>
                    <td width="43%" style="border-top: 1px solid #C0C0C0; " height="1">
                      <p style="line-height: 200%"><font color="#666666" size="3">      
                      <input type="text" name="height" size="10"></font><font size="3" face="Arial" color="#666666"> ( CM )</font></td>  
                  </tr>
                  <tr>
                    <td width="28%" style="border-top: 1px solid #C0C0C0; " height="1">
                      <p style="line-height: 200%"><font color="#666666" size="3" face="Arial">&nbsp; 
                      Weight：</font></td>
                    <td width="43%" style="border-top: 1px solid #C0C0C0; " height="1">
                      <p style="line-height: 200%">
                      <font color="#666666" size="3">      
                      <input type="text" name="weight" size="10"></font><font size="3" face="Arial" color="#666666"> ( KG )</font></td>
                  </tr>
                  <tr>
                    <td width="28%" style="border-top: 1px solid #C0C0C0; " height="20">
                      <p style="line-height: 200%"><font color="#666666" size="3" face="Arial">&nbsp; Telephone</font><font color="#666666" size="3">：</font></td>      
                    <td width="72%" style="border-top: 1px solid #C0C0C0; " height="20" colspan="2">
                      <p style="line-height: 200%"><font color="#666666" size="3">      
                      <input type="text" name="telephone" size="20"></font></td>
                  </tr>
                  <tr>
                    <td width="28%" style="border-top: 1px solid #C0C0C0; " height="25">
                      <p style="line-height: 200%"><font color="#666666" size="3" face="Arial">&nbsp;      
                            
                      Guardian：</font></td>     
                    <td width="72%" style="border-top: 1px solid #C0C0C0; " height="25" colspan="2">
                      <p style="line-height: 200%">
                        <input type="text" name="guardian" size="20"></td>
                  </tr>
                  <tr>
                    <td width="28%" style="border-top: 1px solid #C0C0C0; " height="19">
                      <p style="line-height: 200%"><font color="#666666" size="3" face="Arial">&nbsp; Numbers 
                      of family：</font></td>
                    <td width="72%" style="border-top: 1px solid #C0C0C0; " height="19" colspan="2">
                      <p style="line-height: 200%"><font color="#666666" size="3">
                      <input type="text" name="familynum" size="15"></font></td>
                  </tr>
                  <tr>
                    <td width="28%" style="border-top: 1px solid #C0C0C0; " height="19">
                      <p style="line-height: 200%"><font color="#666666" size="3" face="Arial">&nbsp; Total           
              family income：</font></td>
                    <td width="72%" style="border-top: 1px solid #C0C0C0; " height="19" colspan="2">
                      <p style="line-height: 200%"><font color="#666666" size="3">
                      <input type="text" name="income" size="15"></font><font color="#666666" size="3" face="Arial"> 
                      ( USD )</font></td>
                  </tr>
                  <tr>
                    <td width="28%" style="border-top: 1px solid #C0C0C0; " height="15" valign="top">
                      <p style="line-height: 200%"><font color="#666666" size="3" face="Arial">&nbsp; 
                      I</font>ntroduction<font color="#666666" size="3">：</font></td>
                    <td width="72%" style="border-top: 1px solid #C0C0C0; " height="15" colspan="2">
                      <p style="line-height: 200%">
                      <textarea rows="5" name="introduction" cols="65"></textarea></td>
                  </tr>
                  <tr>
                    <td width="100%" style="border-top: 1px solid #C0C0C0; " height="1" colspan="3">
                      <p style="line-height: 200%" align="center">
                    </td>
                  </tr>
                  </table>
                </center>
              </div>
              <p style="line-height: 200%; margin-left: 10; margin-right: 10">
              <font size="3">
              <input type="button" value="REVIEW" name="review" onClick="sendData()"></font><p align="left" style="line-height: 200%; margin-left: 10; margin-right: 10">
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
	<input type="hidden" name="datecode" value="<?PHP echo $datecode; ?>">
	<input type="hidden" name="flownum" value="<?PHP echo $flownum; ?>">
	<input type="hidden" name="drid" value="<?PHP echo $drid; ?>">
	<div id="ROCCalendar" style="behavior:url('.\calendar.htc');" separator="/" rocdate counter></div>
	<div id="ADCalendar" style="behavior:url('.\calendar.htc');"></div>
 </form>
</body>

</html>
<PHP		
		}else{
			
			echo "<Script Language='JavaScript'>";
			
			echo "alert('Sorry, Access denied.');";
			
			echo " location.href='main.php';";
			
			echo " </Script>";
		
		}
		
	}else{
		
	
		echo "<Script Language='JavaScript'>";
		echo "alert('Sorry, Access denied. \n  Please Login first.');";
		echo " location.href='login.php';";
		echo " </Script>";
	}

>