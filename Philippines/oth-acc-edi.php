<?PHP
	
	session_start();
	include("db.php");
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
	if(!empty($seid) && !empty($sepwd)){
	//if(empty($seid) && empty($sepwd)){	
		$id = $seid;
		$sel_data = "SELECT * FROM member WHERE id='".$id."'";
		$query = mysql_query($sel_data);
		$result = mysql_fetch_array($query);	// 將搜尋出的資料存放於 result[], 用於此頁顯示用
		
		$get_time = getdate();
		$chgtime =  $get_time['year']."-".$get_time['mon']."-".$get_time['mday']."-".$get_time['hours'].":".$get_time['minutes'].":".$get_time['seconds'];
		
		$nat = $result['nationality'];
		$occ = $result['authority'];
		
		$sel_data2 = "SELECT * FROM auth WHERE authority='".$result['specialty']."'";				// 由登入帳號取得個人資料
		$query2 = mysql_query($sel_data2);
		$result2 = mysql_fetch_array($query2);
?>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>NCF -- Patient Record Online Management System</title>
<Script language="JavaScript">
			
			<!--
				
				function input_text(){
					document.myform.email.value = "<? echo $result['email']; ?>";
					document.myform.first.value = "<? echo $result['firstname']; ?>";
					document.myform.last.value = "<? echo $result['lastname']; ?>";
					document.myform.address.value = "<? echo $result['address']; ?>";
					document.myform.city.value = "<? echo $result['city']; ?>";
					document.myform.state.value = "<? echo $result['state']; ?>";
					document.myform.zipcode.value = "<? echo $result['zipcode']; ?>";
					
					var nationality = "<? echo $result['country']; ?>";
					if((nationality != "Cambodia") || (nationality != "China") || (nationality != "Dominican Republic") || (nationality != "India") || (nationality != "Indonesia") || (nationality != "Myanmar") || (nationality != "Philippines") || (nationality != "Pakistan") || (nationality != "Taiwan") || (nationality != "Vietnam")) {
						document.myform.nationalitys.value = "<? echo $result['country']; ?>";
					} else {
						document.myform.nationalitys.value = "";
					}
					
					document.myform.countrycode.value = "<? echo $result['telcountry']; ?>";
					document.myform.areacode.value = "<? echo $result['telcountry']; ?>";
					document.myform.tel.value = "<? echo $result['tel']; ?>";
					document.myform.fax.value = "<? echo $result['fax']; ?>";
					document.myform.mobile.value = "<? echo $result['mobile']; ?>";
					document.myform.hospitals.value = "<? echo $result['hospital']; ?>";
					document.myform.note.value = "<? echo $result['note']; ?>";
					
					document.myform.picpath.value = "<? echo $result['picpath']; ?>";
				}
				
				function a(){
					email = document.myform.email.value;
					first = document.myform.first.value;
					last = document.myform.last.value;
					nationality = document.myform.nationality.value;
					
					if(email == ""){ 
						alert("Please enter E-mail.");
						return false;
					}
					
					if(first == ""){ 
						alert("Please input first name.");
						return false;
					}
					
					if(last == ""){ 
						alert("Please input last name.");
						return false;
					}
					
					if(nationality == ""){ 
						alert("Please input Nationality.");
						return false;
					}
					
					if((email != "") && (first != "") && (last != "") && (nationality != "")){
							document.myform.submit();
					} 
				}
				
				function Indata2_onchange() {
					//if(window.event.srcElement.options[window.event.srcElement.selectedIndex].text == 'OTHER'){
					// onLoad="return Indata2_onchange()"
					if(document.myform.nationality.options.value == 'OTHER'){
						document.myform.nationalitys.disabled = false;
					}else{
						document.myform.nationalitys.disabled = true;
					}
				}
				
				function Indata3_onchange() {
					//if(window.event.srcElement.options[window.event.srcElement.selectedIndex].text == 'Other'){
					if(document.myform.hospital.options.value == 'OTHER'){
						document.myform.hospitals.disabled = false;
					}else{
						document.myform.hospitals.disabled = true;
					}
				}

			//-->
		</Script>
</head>

<body topmargin="2"  onLoad="input_text()">
<form name="myform" enctype="multipart/form-data" method="post" action="oth-acc-save.php">
<div align="center">
  <center>
  <table border="0" cellpadding="0" cellspacing="0" width="760">
    <tr>
      <td width="100%">
        <div align="center">
          <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-style: solid; border-width: 2" height="1">
            <tr>
              <td width="100%" height="16" align="center"><font size="2" face="Arial"><?PHP include("top.php"); ?></font></td>
            </tr>
            <tr>
              <td width="100%" height="16" align="center"><font size="2" face="Arial"><?PHP include("select.php"); ?></font></td>
            </tr>
  </center>
            <tr>
              <td width="100%" height="100%" align="center">
                <div align="center">
                  <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                      <td width="100%">
                        <p align="right">&nbsp;</td>
                    </tr>
  <center>
  <tr>
                <td width="100%" align="center" bgcolor="#F7EBC6">
              <font size="2">　</font>
              <div align="center">
                <table border="1" cellpadding="0" cellspacing="0" width="90%" bgcolor="#FF9966">
                  <tr>
                    <td width="100%">
                      <p align="center"><i><b><font face="Arial" color="#FFFFFF" size="3">
                      Edit        
                      Information Of Account</font></b></i></td>   
                  </tr>
                </table>
              </div>
        
                </center><p style="line-height: 200%" align="left"><font color="#666666" size="2">　　　※</font><font face="Arial" color="#666666" size="2">Items 
                marked with an asterisk * are required.</font></td>
          </tr>
          <tr>
            <td width="100%" align="center" bgcolor="#F7EBC6" valign="top">
              <div align="center">
                <center>
                <table border="0" cellpadding="0" cellspacing="0" width="90%" height="134" style="font-family: Arial; font-size: 12pt; color: #666666; border-collapse: collapse" bordercolor="#111111">
                  <tr>
                    <td width="20%" style="border-top: 1px solid #C0C0C0; " height="24" valign="middle">
                      <p style="line-height: 200%"><font size="2" color="#666666">*     
                      ID：</font></td>
                    <td width="46%" style="border-top: 1px solid #C0C0C0; " height="24" bgcolor="#F7E3AD" valign="middle">
                      <p style="line-height: 200%"><font color="#666666" size="2">&nbsp;<?PHP echo $result['id']; ?></font></td>     
                    <td width="34%" style="border-top: 1px solid #C0C0C0; " height="8" rowspan="4" bgcolor="#F7E3AD">
                      <p align="center" style="line-height: 200%"><font size="2" color="#666666"><img border="0" src="<?PHP if(!empty($result['picpath'])){ echo $result['picpath']; }else{ echo 'images/user-pic.jpg'; } ?>" width="188" height="200"><br>
                      Uploading your picture：<br>  
                      <input type="file" name="picpath" value=""></font></p>
                    </td>
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1px solid #C0C0C0; " height="24" valign="middle">
                      <p style="line-height: 200%"><font size="2" color="#666666">*         
                      Password：</font></td>
                    <td width="46%" style="border-top: 1px solid #C0C0C0; " height="24" bgcolor="#F7E3AD" valign="middle">
                      <p style="line-height: 200%"><font size="2" color="#666666">&nbsp;<? echo $result['pwd']; ?></font></td> 
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1px solid #C0C0C0; " height="1" valign="middle">
                      <p style="line-height: 200%"><font size="2" color="#666666">*     
                      E-mail：</font></td>
                    <td width="46%" style="border-top: 1px solid #C0C0C0; " height="1" valign="middle" bgcolor="#F7E3AD">
                      <p style="line-height: 200%"><font color="#666666" size="2">&nbsp;<input type="text" name="email" size="33"></font></td>     
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1px solid #C0C0C0; " height="1" valign="middle">
                      <p style="line-height: 200%"><font size="2" color="#666666">*    
                      Specialty：</font></td>
                    <td width="46%" style="border-top: 1px solid #C0C0C0; " height="1" valign="middle" bgcolor="#F7E3AD">
                      <p style="line-height: 200%"><font color="#666666" size="2">&nbsp;<?PHP echo $result2['specialty']; ?></font></td>     
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1px solid #C0C0C0; " height="19" valign="top">
                      <p style="line-height: 200%"><font size="2" color="#666666">
                      *   
                      Name：</font></td> 
                    <td width="80%" style="border-top: 1px solid #C0C0C0; " height="19" colspan="2" bgcolor="#F7E3AD" valign="middle">
                      <p style="line-height: 200%"><font size="2" color="#666666">&nbsp;
                      <SELECT onChange="return Indata2_onchange()" size=1 name="sex" onLoad="return Indata2_onchange()"> 
                          <OPTION value="" <? if($result['appellation'] == ""){ echo "SELECTED"; }?>>Please select...</OPTION> 
                          <OPTION value="Ms." <? if($result['appellation'] == "Ms."){ echo "SELECTED"; }?>>Ms.</OPTION> 
                          <OPTION value="Mr." <? if($result['appellation'] == "Mr."){ echo "SELECTED"; }?>>Mr.</OPTION> 
                          <OPTION value="Mrs." <? if($result['appellation'] == "Mrs."){ echo "SELECTED"; }?>>Mrs.</OPTION> 
                          <OPTION value="Dr. & Ms." <? if($result['appellation'] == "Dr. & Ms."){ echo "SELECTED"; }?>>Dr. & Ms.</OPTION>
                          <OPTION value="Dr. & Mr." <? if($result['appellation'] == "Dr. & Mr."){ echo "SELECTED"; }?>>Dr. & Mr.</OPTION>
                          <OPTION value="Dr. & Mrs." <? if($result['appellation'] == "Dr. & Mrs."){ echo "SELECTED"; }?>>Dr. & Mrs.</OPTION>
                       </SELECT> First name     
                      - 
                      <input type="text" name="first" size="16"> Last name - 
                      <input type="text" name="last" size="16"></font></td>   
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1px solid #C0C0C0; " height="19" valign="top">
                      <p style="line-height: 200%"><font size="2" color="#666666">
                      &nbsp;                   
                      Contact details：</font></td>    
                    <td width="80%" style="border-top: 1px solid #C0C0C0; " height="19" colspan="2" bgcolor="#F7E3AD" valign="middle">
                      <p style="line-height: 200%"><font color="#666666" size="2">
&nbsp;Address - <input type="text" name="address" size="63" value=""><br>
&nbsp;City - <input type="text" name="city" size="25">&nbsp; State/Province - 
                      <input type="text" name="state" size="25"><br>
&nbsp;Zip/Postal code -   
                      <input type="text" name="zipcode" size="10"><br>
&nbsp;* Country - <SELECT onChange="return Indata2_onchange()" size=1 name="nationality" onLoad="return Indata2_onchange()"> 
                          <OPTION value="" <? if($result['country'] == ""){ echo "SELECTED"; }?>>Please select...</OPTION> 
                          <OPTION value="Cambodia" <? if($result['country'] == "Cambodia"){ echo "SELECTED"; }?>>Cambodia</OPTION> 
                          <OPTION value="China" <? if($result['country'] == "China"){ echo "SELECTED"; }?>>China</OPTION> 
                          <OPTION value="Dominican Republic" <? if($result['country'] == "Dominican Republic"){ echo "SELECTED"; }?>>Dominican Republic</OPTION>
                          <OPTION value="India" <? if($result['country'] == "India"){ echo "SELECTED"; }?>>India</OPTION>
                          <OPTION value="Indonesia" <? if($result['country'] == "Indonesia"){ echo "SELECTED"; }?>>Indonesia</OPTION>
                          <OPTION value="Myanmar" <? if($result['country'] == "Myanmar"){ echo "SELECTED"; }?>>Myanmar</OPTION>
                          <OPTION value="Philippines" <? if($result['country'] == "Philippines"){ echo "SELECTED"; }?>>Philippines</OPTION>
                          <OPTION value="Pakistan" <? if($result['country'] == "Pakistan"){ echo "SELECTED"; }?>>Pakistan</OPTION> 
                          <OPTION value="Taiwan" <? if($result['country'] == "Taiwan"){ echo "SELECTED"; }?>>Taiwan</option>
                          <OPTION value="Vietnam" <? if($result['country'] == "Vietnam"){ echo "SELECTED"; }?>>Vietnam</OPTION>
                          <OPTION value="OTHER" <? if(($result['country'] != "Cambodia") && ($result['country'] != "China") && ($result['country'] != "Dominican Republic") && ($result['country'] != "India") && ($result['country'] != "Indonesia") && ($result['country'] != "Myanmar") && ($result['country'] != "Philippines") && ($result['country'] != "Pakistan") && ($result['country'] != "Taiwan") && ($result['country'] != "Vietnam")){ echo "SELECTED"; }?>>Other</OPTION></SELECT>
                          <INPUT disabled maxLength=256 size=40 name="nationalitys"  id="nationalitys" value="">
                          </font><p style="line-height: 200%">
                      <font color="#666666" size="2">&nbsp;Telephone Info：<br>
&nbsp; Country Code - <input type="text" name="countrycode" size="10">&nbsp; Area Code 
                      - <input type="text" name="areacode" size="10"><br>
&nbsp;&nbsp; Tel - <input type="text" name="tel" size="15">&nbsp; Fax    
                      - <input type="text" name="fax" size="15">&nbsp; Mobile - 
                      <input type="text" name="mobile" size="17"></font></p>  
                      </td>  
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1px solid #C0C0C0; " height="25" valign="middle">
                      <p style="line-height: 200%"><font size="2" color="#666666">&nbsp;                   
                      Present institute /<br>                   
                      &nbsp; Hospital：</font></td>                  
                    <td width="80%" style="border-top: 1px solid #C0C0C0; " height="25" colspan="2" bgcolor="#F7E3AD" valign="middle">
                      <p style="line-height: 200%">
                        <font color="#666666" size="2">&nbsp;
                        <SELECT onChange="Indata3_onchange()" size=1 name="hospital">
                        	<OPTION value="" selected>Please select...</OPTION> 
                        	<OPTION value="National Pediatric Hospital" <? if($result['hospital'] == "National Pediatric Hospital"){ echo "SELECTED"; }?>>National Pediatric Hospital</OPTION>
                        	<OPTION value="Affiliated Stomatological Hospital of Nanjing Medical University" <? if($result['hospital'] == "Affiliated Stomatological Hospital of Nanjing Medical University"){ echo "SELECTED"; }?>>Affiliated Stomatological Hospital of Nanjing Medical University</OPTION>
                        	<OPTION value="People`s Hospital of Hulunbeier,Southern Mongolian" <? if($result['hospital'] == "NPH"){ echo "SELECTED"; }?>>People`s Hospital of Hulunbeier,Southern Mongolian</OPTION>
                        	<OPTION value="Shenzhen Second Hospital" <? if($result['hospital'] == "Shenzhen Second Hospital"){ echo "SELECTED"; }?>>Shenzhen Second Hospital</OPTION>
                        	<OPTION value="The Affiliated Hospital of Medical College,Qingdao University" <? if($result['hospital'] == "The Affiliated Hospital of Medical College,Qingdao University"){ echo "SELECTED"; }?>>The Affiliated Hospital of Medical College,Qingdao University</OPTION>
                        	<OPTION value="The 2nd Affiliated Hospital of Shantou University Medical College" <? if($result['hospital'] == "The 2nd Affiliated Hospital of Shantou University Medical College"){ echo "SELECTED"; }?>>The 2nd Affiliated Hospital of Shantou University Medical College</OPTION>
                        	<OPTION value="The First Hospital of Shanxi Medical University" <? if($result['hospital'] == "The First Hospital of Shanxi Medical University"){ echo "SELECTED"; }?>>The First Hospital of Shanxi Medical University</OPTION>
                        	<OPTION value="West China College of Stomatology Sichuan University" <? if($result['hospital'] == "West China College of Stomatology Sichuan University"){ echo "SELECTED"; }?>>West China College of Stomatology Sichuan University</OPTION>
                        	<OPTION value="Cipto Mangunkusumo Hospital" <? if($result['hospital'] == "Cipto Mangunkusumo Hospital"){ echo "SELECTED"; }?>>Cipto Mangunkusumo Hospital</OPTION>
                        	<OPTION value="Our Lady of Peace Hospital" <? if($result['hospital'] == "Our Lady of Peace Hospital"){ echo "SELECTED"; }?>>Our Lady of Peace Hospital</OPTION>
                        	<OPTION value="St. Elizabeth Hospital" <? if($result['hospital'] == "St. Elizabeth Hospital"){ echo "SELECTED"; }?>>St. Elizabeth Hospital</OPTION>
                        	<OPTION value="Ho Chi Minh Health Department Odorto Mazillo Hospital" <? if($result['hospital'] == "Ho Chi Minh Health Department Odorto Mazillo Hospital"){ echo "SELECTED"; }?>>Ho Chi Minh Health Department Odorto Mazillo Hospital</OPTION>
                        	<OPTION value="OTHER" <? if(($result['hospital'] != "National Pediatric Hospital") && ($result['hospital'] != "Affiliated Stomatological Hospital of Nanjing Medical University") && ($result['hospital'] != "People`s Hospital of Hulunbeier,Southern Mongolian") && ($result['hospital'] != "Shenzhen Second Hospital") && ($result['hospital'] != "The Affiliated Hospital of Medical College,Qingdao University") && ($result['hospital'] != "The 2nd Affiliated Hospital of Shantou University Medical College") && ($result['hospital'] != "The First Hospital of Shanxi Medical University") && ($result['hospital'] != "West China College of Stomatology Sichuan University") && ($result['hospital'] != "Cipto Mangunkusumo Hospital") && ($result['hospital'] != "Our Lady of Peace Hospital") && ($result['hospital'] != "St. Elizabeth Hospital") && ($result['hospital'] != "Ho Chi Minh Health Department Odorto Mazillo Hospital")){ echo "SELECTED"; }?>>Other</OPTION>
                        </SELECT> 
                        
                        <INPUT disabled maxLength=256 size=40 name="hospitals"></font></td>
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1px solid #C0C0C0; " height="15" valign="top">
                      <p style="line-height: 200%"><font size="2" color="#666666">&nbsp; 
                      Note：</font></td>
                    <td width="80%" style="border-top: 1px solid #C0C0C0; " height="15" colspan="2" bgcolor="#F7E3AD" valign="middle">
                      <p style="line-height: 200%" align="center">
                      <font size="2" color="#666666">
                      <textarea rows="5" name="note" cols="64"></textarea></font></td>
                  </tr>
                  <tr>
                    <td width="100%" style="border-top: 1px solid #C0C0C0; " height="4" colspan="3" valign="middle">
                      <p style="line-height: 200%" align="center">
                    </td>
                  </tr>
                  </table>
                </center>
              </div>
              <p style="line-height: 200%; margin-left: 10; margin-right: 10">
              <font size="2">
              <input type="button" value="SAVE" name="SAVE" onClick="a()"></font><p align="left" style="line-height: 200%; margin-left: 10; margin-right: 10">
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
	<input type="hidden" name="chgtime" value="<?PHP echo $chgtime; ?>">
	<input type="hidden" name="id" value="<?PHP echo $id; ?>" >
	<input type="hidden" name="picpaths" value="<?PHP echo $result['picpath']; ?>" >
    <input type="hidden" name="nationality_B" value="<?PHP echo $nat; ?>" >
    <input type="hidden" name="nationality_back" value="<? echo $result['country']; ?>" >
	<input type="hidden" name="hospital_B" value="<?PHP echo $result['hospital']; ?>" >
</form>
</body>
</html>
<?
	}else{
		echo "<Script Language='JavaScript'>";
		echo "alert('Access denied. Please login first.');";
		echo " location.href='login.php';";
		echo " </Script>";
	}
?>