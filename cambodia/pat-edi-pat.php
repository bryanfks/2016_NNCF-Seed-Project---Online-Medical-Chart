<?
	
	session_cache_limiter("none");
	session_start();
	
	include 'db.php';  
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
	
	if(!empty($seid) && !empty($sepwd)){
		$clientid = $_POST['clientid'];
		//echo "Client ID: ".$clientid."</br>";
		
		$sel_data = "SELECT * FROM patient WHERE clientid='".$clientid."'";
		//echo $sel_data."</br>";
		$query = mysql_query($sel_data);
		$result = mysql_fetch_array($query);									// 將搜尋出的資料存放於 result[], 用於此頁顯示用
		
		$nat = $result['nationality'];
	
	
?>
<html>

	<head>
		<meta http-equiv="Content-Language" content="zh-tw">
		<meta http-equiv="Content-Type" content="text/html; charset=big5">
		<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
		<meta name="ProgId" content="FrontPage.Editor.Document">
		<title>NCF -- Patient Record Online Management System</title>
		<Script language="JavaScript">
			
			<!--
				
				function input_text(){
					
					document.myform.firstname.value = "<? echo $result['firstname']; ?>";
					
					document.myform.lastname.value = "<? echo $result['lastname']; ?>";
					
					document.myform.sex.value = "<? echo $result['sex']; ?>";
					document.myform.addate.value = "<? echo $result['birthday']; ?>";
					
					document.myform.idnumber.value = "<? echo $result['idnumber']; ?>";
					
					document.myform.height.value = "<? echo $result['height']; ?>";
					
					document.myform.weight.value = "<? echo $result['weight']; ?>";
					
					document.myform.telephone.value = "<? echo $result['telephone']; ?>";
					
					document.myform.guardian.value = "<? echo $result['guardian']; ?>";
					
					document.myform.familynum.value = "<? echo $result['familynum']; ?>";
					document.myform.income.value = "<? echo $result['income']; ?>";
					document.myform.introduction.value = "<? echo $result['introduction']; ?>";
				}
				
				function Indata2_onchange() {
					if(window.event.srcElement.options[window.event.srcElement.selectedIndex].text == 'OTHER'){
						document.myform.nationalitys.disabled = false;
					
					}else{
						document.myform.nationalitys.disabled = true;
					}
				}
				
				function a(){
					
					firstname = document.myform.firstname.value;
					
					lastname = document.myform.lastname.value;
					
					nationality = document.myform.nationality.value;
					
					
					if(firstname == ""){ 
						
						alert("Please enter \"First name\".");
						
						return false;
					
					}
					
					if(lastname == ""){
						
						alert("Please enter \"Last name\".");
						
						return false;
					
					}
					
					if(nationality == ""){
						
						alert("Please enter \"Nationality\".");
						
						return false;
					
					}
					
					if((firstname != "") && (lastname != "") && (nationality != "")){
						
						document.myform.submit();
					
					}
				
				}
			// -->

		</Script>
	</head>	

<body topmargin="2" bgcolor="#F2FBFB" style="font-family: Arial; font-size: 12pt" onLoad="input_text()">
<form name="myform" enctype="multipart/form-data" method="post" action="pat-edi-rev.php">
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
                        <option value="">Print Patient Data</option>
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
                <table border="0" cellpadding="0" cellspacing="0" width="90%" height="17" style="font-family: Arial; font-size: 12pt; color: #666666; border-collapse: collapse" bordercolor="#111111">
                  <tr>
                    <td width="28%" style="border-top: 1px solid #C0C0C0" height="26" valign="top">
                      <p style="line-height: 200%">*<font color="#666666" size="3">Client's  
                      ID：</font></td>
                    <td width="43%" style="border-top: 1px solid #C0C0C0" height="26">
                      <p style="line-height: 200%"><?PHP echo $result['clientid']; ?></td>
                    <td width="29%" style="border-top: 1px solid #C0C0C0; " height="8" rowspan="9">
                      <p align="center" style="line-height: 200%"><font size="3"><img border="0" src="<?PHP if(!empty($result['picture'])){ echo $result['picture']; }else{ echo 'images/user-pic'; } ?>" width="188" height="200"></font></p>
                      <p align="center" style="line-height: 200%"><font color="#666666" size="3"><input type="file" name="picture" value=""></font>      
                    </td>
                  </tr>
                  <tr>
                    <td width="28%" style="border-top: 1px solid #C0C0C0" height="10" valign="top">
                      <p style="line-height: 200%">*<font color="#666666" size="3">Client's  
                      ID of the doctor<br>&nbsp; create the information：</font></td> 
                    <td width="43%" style="border-top: 1px solid #C0C0C0" height="10">
                      <p style="line-height: 200%"><font size="3"><?PHP echo $result['drid']; ?></font></td>
                  </tr>
                  <tr>
                    <td width="28%" style="border-top: 1px solid #C0C0C0; " height="39" valign="top">
                      <p style="line-height: 200%">*<font color="#666666" size="3" face="Arial">Name</font><font color="#666666" size="3">：</font></td>
                    <td width="43%" style="border-top: 1px solid #C0C0C0; " height="39">
                      <p style="line-height: 200%"><font color="#666666" size="3" face="Arial">First name</font><font color="#666666" size="3">－ <input type="text" name="firstname" size="20" value=""><br>         
                      </font><font color="#666666" size="3" face="Arial">       
                      Last name</font><font color="#666666" size="3">－ <input type="text" name="lastname" size="20" value=""></font></td>  
                  </tr>
                  <tr>
                    <td width="28%" style="border-top: 1px solid #C0C0C0; " height="24">
                      <p style="line-height: 200%"><font face="Arial" color="#666666" size="3">
                      *Nationality of birth</font><font color="#666666" size="3">：</font></td> 
                    <td width="43%" style="border-top: 1px solid #C0C0C0; " height="24">
                      <p style="line-height: 200%">
                        <font size="3" color="#666666"><select size="1" name="nationality" onchange="return Indata2_onchange()">
                          <option>Please select...</option>
                        </font>
                        <font face="Arial" size="3" color="#666666">
                          <option value="CAM" <? if($nat == "Cambodia"){ echo "SELECTED"; }?>>Cambodia</option>
                           <option value="VIE" <? if($nat == "Vietnam"){ echo "SELECTED"; }?>>Vietnam</option>
                           <option value="PHI" <? if($nat == "Philippines"){ echo "SELECTED"; }?>>Philippines</option>
                           <option value="CHI" <? if($nat == "China"){ echo "SELECTED"; }?>>China</option>
                           <option value="MYA" <? if($nat == "Myanmar"){ echo "SELECTED"; }?>>Myanmar</option>
                           <option value="IND" <? if($nat == "India"){ echo "SELECTED"; }?>>India</option>
                           <option value="INS" <? if($nat == "Indonesia"){ echo "SELECTED"; }?>>Indonesia</option>
                           <option value="PAK" <? if($nat == "Pakistan"){ echo "SELECTED"; }?>>Pakistan</option>
                           <option value="DOM" <? if($nat == "Dominican Republic"){ echo "SELECTED"; }?>>Dominican Republic</option>
                           <option value="OTHER" <? if(($nat != "Cambodia") && ($nat != "Vietnam") && ($nat != "Philippines") && ($nat != "China") && ($nat != "Myanmar") && ($nat != "India") && ($nat != "Indonesia") && ($nat != "Pakistan") && ($nat != "Dominican Republic")){ echo "SELECTED"; }?>>Other</option>
                        </font>
                        </select><input type="text" size="20" name="nationalitys" value="" disabled></td>
                  </tr>
                  <tr>
                    <td width="28%" style="border-top: 1px solid #C0C0C0; " height="24">
                      <p style="line-height: 200%"><font color="#666666" size="3" face="Arial">&nbsp;    
                      Sex</font><font color="#666666" size="3">：</font></td>
                    <td width="43%" style="border-top: 1px solid #C0C0C0; " height="24">
                      <p style="line-height: 200%">
                      <font color="#666666" size="3"><input type="radio" value="male" name="sex" <? if($result['sex'] == "male"){ echo "checked"; } ?> >Male　<input type="radio" value="female" name="sex" <? if($result['sex'] == "female"){ echo "checked"; } ?> >Female　<input type="radio" value="OTHER" name="sex" <? if(($result['sex'] != "male") &&($result['sex'] != "female")){ echo "checked"; } ?> ></font><font face="Arial" size="3" color="#666666">Other             
                        <input type="text" name="sexs" size="8"></font></td>
                  </tr>
                  <tr>
                    <td width="28%" style="border-top: 1px solid #C0C0C0; " height="24">
                      <p style="line-height: 200%"><font color="#666666" size="3" face="Arial">&nbsp;   
                      Date of birth</font><font color="#666666" size="3">：</font></td>  
                    <td width="43%" style="border-top: 1px solid #C0C0C0; " height="24">
                      <p style="line-height: 200%"><font color="#666666" size="3"><input type="text" name="addate" size="20" value=""></font><font face="Arial" color="#666666" size="2"><input type="button" value="PERPETUAL CALENDAR" onclick="javascript:document.all.ADCalendar.Open('addate')"></font></td>
                  </tr>
                  <tr>
                    <td width="28%" style="border-top: 1px solid #C0C0C0; " height="1" valign="top">
                      <p style="line-height: 200%"> 
                      <font color="#666666" face="Arial" size="3">&nbsp;      
              ID number of nationality</font><font color="#666666" size="3">：</font></td>  
                    <td width="43%" style="border-top: 1px solid #C0C0C0; " height="1" valign="middle">
                      <p style="line-height: 200%"><font color="#666666" size="3">
                      <input type="text" name="idnumber" size="20" value=""></font></td>     
                  </tr>
                  <tr>
                    <td width="28%" style="border-top: 1px solid #C0C0C0; " height="1" valign="top">
                      <p style="line-height: 200%"><font face="Arial" color="#666666" size="3">&nbsp;   
                      Height</font><font color="#666666" size="3">：</font></td>
                    <td width="43%" style="border-top: 1px solid #C0C0C0; " height="1">
                      <p style="line-height: 200%"><font color="#666666" size="3">      
                      <input type="text" name="height" size="10" value=""> </font><font size="3" face="Arial" color="#666666"> ( CM )</font></td>    
                  </tr>
                  <tr>
                    <td width="28%" style="border-top: 1px solid #C0C0C0; " height="1">
                      <p style="line-height: 200%"><font color="#666666" size="3" face="Arial">&nbsp;   
                      Weight</font><font color="#666666" size="3">：</font></td>
                    <td width="43%" style="border-top: 1px solid #C0C0C0; " height="1">
                      <p style="line-height: 200%">
                      <font color="#666666" size="3">      
                      <input type="text" name="weight" size="10" value=""> </font><font size="3" face="Arial" color="#666666"> ( KG )</font></td>  
                  </tr>
                  <tr>
                    <td width="28%" style="border-top: 1px solid #C0C0C0; " height="20">
                      <p style="line-height: 200%"><font color="#666666" size="3" face="Arial">&nbsp; Telephone</font><font color="#666666" size="3">：</font></td>        
                    <td width="72%" style="border-top: 1px solid #C0C0C0; " height="20" colspan="2">
                      <p style="line-height: 200%"><font color="#666666" size="3">      
                      <input type="text" name="telephone" size="20" value=""></font></td>
                  </tr>
                  <tr>
                    <td width="28%" style="border-top: 1px solid #C0C0C0; " height="25">
                      <p style="line-height: 200%"><font color="#666666" size="3" face="Arial">&nbsp;        
                            
                      Guardian</font><font color="#666666" size="3">：</font></td>     
                    <td width="72%" style="border-top: 1px solid #C0C0C0; " height="25" colspan="2">
                      <p style="line-height: 200%">
                        <input type="text" name="guardian" size="20" value=""></td>
                  </tr>
                  <tr>
                    <td width="28%" style="border-top: 1px solid #C0C0C0; " height="19">
                      <p style="line-height: 200%"><font color="#666666" size="3" face="Arial">&nbsp; Numbers   
                      of family</font><font color="#666666" size="3">：</font></td>  
                    <td width="72%" style="border-top: 1px solid #C0C0C0; " height="19" colspan="2">
                      <p style="line-height: 200%"><font color="#666666" size="3">
                      <input type="text" name="familynum" size="15" value=""></font></td>
                  </tr>
                  <tr>
                    <td width="28%" style="border-top: 1px solid #C0C0C0; " height="19">
                      <p style="line-height: 200%"><font color="#666666" size="3" face="Arial">&nbsp; Total             
              family income</font><font color="#666666" size="3">：</font></td>  
                    <td width="72%" style="border-top: 1px solid #C0C0C0; " height="19" colspan="2">
                      <p style="line-height: 200%"><font color="#666666" size="3">
                      <input type="text" name="income" size="15" value=""> </font><font color="#666666" size="3" face="Arial"> 
                      ( USD )</font></td>  
                  </tr>
                  <tr>
                    <td width="28%" style="border-top: 1px solid #C0C0C0; " height="15" valign="top">
                      <p style="line-height: 200%"><font color="#666666" size="3" face="Arial">&nbsp;  
                      I</font>ntroduction<font color="#666666" size="3">：</font></td>
                    <td width="72%" style="border-top: 1px solid #C0C0C0; " height="15" colspan="2">
                      <p style="line-height: 200%">
                      <textarea rows="5" name="introduction" cols="65" value=""></textarea></td>
                  </tr>
                  <tr>
                    <td width="100%" style="border-top: 1px solid #C0C0C0" height="1" valign="top" colspan="3">
                      <div align="center">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                          <tr>
                          <td width="50%">
                          <p style="line-height: 200%">
                          <font color="#666666" size="3">&nbsp;   
                          Time of last edit：   
                          <?PHP echo $result['chgtime']; ?></font></td>
                          <td width="50%">
                          <p style="line-height: 200%">
                          <font color="#666666" size="3">Time of   
                          first creation：   
                          <?PHP echo $result['addtime']; ?></font></td>
                          </tr>
                        </table>
                      </div>
                    </td>
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
              <input type="button" value="REVIEW" name="review" onClick="a()"></font><p align="left" style="line-height: 200%; margin-left: 10; margin-right: 10">
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
	
	<input type="hidden" name="clientid" value="<?PHP echo $result['clientid']; ?>">
	
	<input type="hidden" name="drid" value="<?PHP echo $result['drid']; ?>">
	
	<input type="hidden" name="addtime" value="<?PHP echo $result['addtime']; ?>">

<div id="ROCCalendar" style="behavior:url('.\calendar.htc');" separator="/" rocdate counter></div>
	
<div id="ADCalendar" style="behavior:url('.\calendar.htc');"></div>

</form>
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