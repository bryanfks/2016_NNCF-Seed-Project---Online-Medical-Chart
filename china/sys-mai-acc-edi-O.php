<?PHP 
	session_cache_limiter("none");
	session_start();
	
	include 'db.php';
	
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
	
	if(!empty($seid) && !empty($sepwd)){
		
		//$id = $seid;														
		$id_modify = $_GET["id"];
		//------------------- Search Member Account from member.table -----------------
		$sel_data = "SELECT * FROM `member` WHERE id='".$id_modify."'";
		$query = mysql_query($sel_data);	
		$result = mysql_fetch_array($query);
		
		$get_time = getdate();
		$chgtime =  $get_time['year']."-".$get_time['mon']."-".$get_time['mday']."-".$get_time['hours'].":".$get_time['minutes'].":".$get_time['seconds'];

		//---------- Select List value. -----------
		$specialty = $result["specialty"];
		$appellation = $result["appellation"];
		$country = $result["country"];
		$hospital = $result["hospital"];
		//-----------------------------------------
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
					document.myform.id.value = "<? echo $result['id']; ?>";
					document.myform.pwd.value = "<? echo $result['pwd']; ?>";
					document.myform.email.value = "<? echo $result['email']; ?>";
					
					document.myform.firstname.value = "<? echo $result['firstname']; ?>";
					document.myform.lastname.value = "<? echo $result['lastname']; ?>";
					
					document.myform.address.value = "<? echo $result['address']; ?>";
					document.myform.city.value = "<? echo $result['city']; ?>";
					document.myform.state.value = "<? echo $result['state']; ?>";
					document.myform.zipcode.value = "<? echo $result['zipcode']; ?>";
					
					country = "<? echo $result['country']; ?>";
					if((country != "Cambodia") && (country != "China") && (country != "Dominican Republic") && (country != "India") && (country != "Indonesia") && (country != "Myanmar") && (country != "Philippines") && (country != "Pakistan") && (country != "Taiwan") && (country != "Vietnam") ){
						document.myform.countrys.value = "<? echo $result['country']; ?>";
						document.myform.cty.value = "<? echo $result['country']; ?>";
					}
					
					document.myform.telcountry.value = "<? echo $result['telcountry']; ?>";
					document.myform.telarea.value = "<? echo $result['telarea']; ?>";
					document.myform.tel.value = "<? echo $result['tel']; ?>";
					document.myform.fax.value = "<? echo $result['fax']; ?>";
					document.myform.mobile.value = "<? echo $result['mobile']; ?>";
					
					hospital = "<? echo $result['hospital']; ?>";
					if((hospital != "National Pediatric Hospital") && (hospital != "Affiliated Stomatological Hospital of Nanjing Medical University") && (hospital != "People`s Hospital of Hulunbeier,Southern Mongolian") && (hospital != "Shenzhen Second Hospital") && (hospital != "The Affiliated Hospital of Medical College,Qingdao University") && (hospital != "The 2nd Affiliated Hospital of Shantou University Medical College") && (hospital != "The First Hospital of Shanxi Medical University") && (hospital != "West China College of Stomatology Sichuan University") && (hospital != "Cipto Mangunkusumo Hospital") && (hospital != "Our Lady of Peace Hospital") && (hospital != "St. Elizabeth Hospital") && (hospital != "Ho Chi Minh Health Department Odorto Mazillo Hospital")){
						document.myform.hospitals.value = "<? echo $result['hospital']; ?>";
						document.myform.hos.value = "<? echo $result['hospital']; ?>";
					}
					
					document.myform.note.value = "<? echo $result['note']; ?>";
					document.myform.picpaths.value = "<? echo $result['picpath']; ?>";
				}
				
				function a(){
					id = document.myform.id.value;
					pwd = document.myform.pwd.value;
					confirms = document.myform.confirm.value;
					email = document.myform.email.value;
					specialty = document.myform.specialty.value;
					appellation = document.myform.appellation.value;
					firstname = document.myform.firstname.value;
					lastname = document.myform.lastname.value;
					
					if(id == ""){ 
						alert("Please enter ID.");
						return false;
					}
				
					if(pwd == ""){
						alert("Please enter Password.");
						return false;
					}
				
					if(confirms == ""){
						alert("Please enter Re-enter Password.");
						return false;
					}
				
					if(pwd != confirms){
						alert("Re-Enter Password is error, please input again.");
						return false;
					}
					if(email == ""){ 
					alert("Please enter E-mail.");
					return false;
				}
					if(specialty == ""){ 
						alert("Please select Specialty.");
						return false;
					}
				
					if(appellation == ""){ 
						alert("Please enter Appellation.");
						return false;
					}
					
					if(firstname == ""){ 
						alert("Please enter First name.");
						return false;
					}
					if(lastname == ""){ 
						alert("Please enter Last name.");
						return false;
					}
					if(country == ""){ 
						alert("Please enter Country.");
						return false;
					}
					
					if((id != "") && (specialty != "") && (firstname != "") && (lastname != "") && (country != "")){
						document.myform.submit();
					}
				}
			
			function Indata2_onchange() {
				//if(document.myform.country.options.value == 'OTHER'){
				if(document.myform.country.options.value == "OTHER"){
					document.myform.countrys.disabled = false;
				}else{
					document.myform.countrys.disabled = true;
				}
			}
			
			function Indata3_onchange() {
				//if(document.myform.hospital.options.value == 'OTHER'){
				if(document.myform.hospital.options.value == "OTHER"){
					document.myform.hospitals.disabled = false;
				}else{
					document.myform.hospitals.disabled = true;
				}
			}
			//-->
		</Script>
</head>

<body topmargin="2" onLoad="input_text()">
<form name="myform" enctype="multipart/form-data" method="post" action="sys-mai-acc-save.php">
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
                      <p align="center"><i><b><font face="Arial" color="#FFFFFF" size="3">Maintain        
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
                      <p style="line-height: 200%"><font color="#666666" size="2"><? echo $result['id']; ?></font></td>     
                    <td width="34%" style="border-top: 1px solid #C0C0C0; " height="8" rowspan="5" bgcolor="#F7E3AD">
                      <p align="center" style="line-height: 200%"><font size="2" color="#666666"><img border="0" src="<?PHP if(!empty($result['picpath'])){ echo $result['picpath']; }else{ echo 'images/user-pic.jpg'; } ?>" width="188" height="200"><br>
                      Uploading your picture：<br>  
                      <input type="file" name="picpath" size="15"></font></p>
                    </td>
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1px solid #C0C0C0; " height="24" valign="middle">
                      <p style="line-height: 200%"><font size="2" color="#666666">*         
                      Password：</font></td>
                    <td width="46%" style="border-top: 1px solid #C0C0C0; " height="24" bgcolor="#F7E3AD" valign="middle">
                      <p style="line-height: 200%"><font size="2" color="#666666">&nbsp;<input type="password" name="pwd" size="5" value="" maxLength="4"> 
                      (4 characters)            
                      </font>
                    </td> 
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1px solid #C0C0C0; " height="24" valign="middle">
                      <p style="line-height: 200%"><font size="2" color="#666666">*    
                      Re-type                   
              password：</font></td>
                    <td width="46%" style="border-top: 1px solid #C0C0C0; " height="24" bgcolor="#F7E3AD" valign="middle">
                      <p style="line-height: 200%"><font size="2" color="#666666">&nbsp;<input type="password" name="confirm" size="5" value="" maxLength="4"></font></td>
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1px solid #C0C0C0; " height="1" valign="middle">
                      <p style="line-height: 200%"><font size="2" color="#666666">*     
                      E-mail：</font></td>
                    <td width="46%" style="border-top: 1px solid #C0C0C0; " height="1" valign="middle" bgcolor="#F7E3AD">
                      <p style="line-height: 200%"><font color="#666666" size="2">&nbsp;<input type="text" name="email" size="33" value=""></font></td>     
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1px solid #C0C0C0; " height="1" valign="middle">
                      <p style="line-height: 200%"><font size="2" color="#666666">*    
                      Specialty：</font></td>
                    <td width="46%" style="border-top: 1px solid #C0C0C0; " height="1" valign="middle" bgcolor="#F7E3AD">
                      <p style="line-height: 200%"><font color="#666666" size="2">&nbsp;<select size="1" name="specialty">
                        <option value="" <? if($specialty == ""){ echo "SELECTED"; }?>>Please select...</option>
                        <option value="ppls" <?PHP if($specialty == "ppls"){ echo "SELECTED"; }?>>Partner--PlasticSurgery</option>
                        <option value="poms" <?PHP if($specialty == "poms"){ echo "SELECTED"; }?>>Partner--Oral-MaxillofacialSurgery</option>
                        <option value="psp" <?PHP if($specialty == "psp"){ echo "SELECTED"; }?>>Partner--SpeechPathology</option>
                        <option value="pd" <?PHP if($specialty == "pd"){ echo "SELECTED"; }?>>Partner--Dentistry</option>
                        <option value="po" <?PHP if($specialty == "po"){ echo "SELECTED"; }?>>Partner--Orthodontics</option>
                        <option value="pa" <?PHP if($specialty == "pa"){ echo "SELECTED"; }?>>Partner--Anesthesiology</option>
                        <option value="pps" <?PHP if($specialty == "pps"){ echo "SELECTED"; }?>>Partner--PediatricSurgery</option>
                        <option value="pg" <?PHP if($specialty == "pg"){ echo "SELECTED"; }?>>Partner--Genetics</option>
                        <option value="psw" <?PHP if($specialty == "psw"){ echo "SELECTED"; }?>>Partner--SocialWork</option>
                        <option value="pn" <?PHP if($specialty == "pn"){ echo "SELECTED"; }?>>Partner--Nursing</option>
                        <option value="pp" <?PHP if($specialty == "pp"){ echo "SELECTED"; }?>>Partner--Psychology</option>
                        <option value="cgmhpls" <?PHP if($specialty == "cgmhpls"){ echo "SELECTED"; }?>>CGMH--PlasticSurgery</option>
                        <option value="cgmhoms" <?PHP if($specialty == "cgmhoms"){ echo "SELECTED"; }?>>CGMH--Oral-MaxillofacialSurgery</option>
                        <option value="cgmhsp" <?PHP if($specialty == "cgmhsp"){ echo "SELECTED"; }?>>CGMH--SpeechPathology</option>
                        <option value="cgmhd" <?PHP if($specialty == "cgmhd"){ echo "SELECTED"; }?>>CGMH--Dentistry</option>
                        <option value="cgmho" <?PHP if($specialty == "cgmho"){ echo "SELECTED"; }?>>CGMH--Orthodontics</option>  
                        <option value="cgmha" <?PHP if($specialty == "cgmha"){ echo "SELECTED"; }?>>CGMH--Anesthesiology</option>
                      	<option value="cgmhps" <?PHP if($specialty == "cgmhps"){ echo "SELECTED"; }?>>CGMH--PediatricSurgery</option>
                        <option value="cgmhg" <?PHP if($specialty == "cgmhg"){ echo "SELECTED"; }?>>CGMH--Genetics</option>
                        <option value="cgmhn" <?PHP if($specialty == "cgmhn"){ echo "SELECTED"; }?>>CGMH--Nursing</option>
                        <option value="cgmhp" <?PHP if($specialty == "cgmhp"){ echo "SELECTED"; }?>>CGMH--Psychology</option>
                        <option value="ncfsw" <?PHP if($specialty == "ncfsw"){ echo "SELECTED"; }?>>NCF--SocialWork</option>
                        <option value="ncfs" <?PHP if($specialty == "ncfs"){ echo "SELECTED"; }?>>NCF--Supervisor</option>
                        <option value="ncffs" <?PHP if($specialty == "ncffs"){ echo "SELECTED"; }?>>NCF--FinancialSpecialist</option>
                        <option value="ncfa" <?PHP if($specialty == "ncfa"){ echo "SELECTED"; }?>>NCF--Administration</option>
                      </select></font></td>     
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1px solid #C0C0C0; " height="19" valign="top">
                      <p style="line-height: 200%"><font size="2" color="#666666">
                      *   
                      Name：</font></td> 
                    <td width="80%" style="border-top: 1px solid #C0C0C0; " height="19" colspan="2" bgcolor="#F7E3AD" valign="middle">
                      <p style="line-height: 200%"><font size="2" color="#666666">&nbsp;<SELECT  size=1 name="appellation"> 
                          <OPTION value="" <? if($appellation == ""){ echo "SELECTED"; }?>>Please select...</OPTION> 
                          <OPTION value="Ms." <? if($appellation == "Ms."){ echo "SELECTED"; }?>>Ms.</OPTION> 
                          <OPTION value="Mr." <? if($appellation == "Mr."){ echo "SELECTED"; }?>>Mr.</OPTION> 
                          <OPTION value="Mrs." <? if($appellation == "Mrs."){ echo "SELECTED"; }?>>Mrs.</OPTION> 
                          <OPTION value="Dr. & Ms." <? if($appellation == "Dr. & Ms."){ echo "SELECTED"; }?>>Dr. & Ms.</OPTION>
                          <OPTION value="Dr. & Mr." <? if($appellation == "Dr. & Mr."){ echo "SELECTED"; }?>>Dr. & Mr.</OPTION>
                          <OPTION value="Dr. & Mrs." <? if($appellation == "Dr. & Mrs."){ echo "SELECTED"; }?>>Dr. & Mrs.</OPTION>
                          </SELECT> First name     
                      - 
                      <input type="text" name="firstname" size="16" value=""> Last name - 
                      <input type="text" name="lastname" size="16" value=""></font></td>   
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1px solid #C0C0C0; " height="19" valign="top">
                      <p style="line-height: 200%"><font size="2" color="#666666">
                      &nbsp;                   
                      Contact details：</font></td>    
                    <td width="80%" style="border-top: 1px solid #C0C0C0; " height="19" colspan="2" bgcolor="#F7E3AD" valign="middle">
                      <p style="line-height: 200%"><font color="#666666" size="2">
&nbsp;Address - <input type="text" name="address" size="70" value=""><br>
&nbsp;City - <input type="text" name="city" size="25" value="">&nbsp; State/Province - 
                      <input type="text" name="state" size="25" value=""><br>
&nbsp;Zip/Postal code -   
                      <input type="text" name="zipcode" size="10" value=""><br>
&nbsp;* Country - <SELECT onChange="return Indata2_onchange()" onLoad="Indata2_onchange()" size=1 name="country"> 
                          <OPTION value="" <? if($country == ""){ echo "SELECTED"; }?>>Please select...</OPTION> 
                          <OPTION value="Cambodia" <? if($country == "Cambodia"){ echo "SELECTED"; }?>>Cambodia</OPTION> 
                          <OPTION value="China" <? if($country == "China"){ echo "SELECTED"; }?>>China</OPTION> 
                          <OPTION value="Dominican Republic" <? if($country == "Dominican Republic"){ echo "SELECTED"; }?>>Dominican Republic</OPTION> 
                          <OPTION value="India" <? if($country == "India"){ echo "SELECTED"; }?>>India</OPTION> 
                          <OPTION value="Indonesia" <? if($country == "Indonesia"){ echo "SELECTED"; }?>>Indonesia</OPTION> 
                          <OPTION value="Myanmar" <? if($country == "Myanmar"){ echo "SELECTED"; }?>>Myanmar</OPTION> 
                          <OPTION value="Philippines" <? if($country == "Philippines"){ echo "SELECTED"; }?>>Philippines</OPTION> 
                          <OPTION value="Pakistan" <? if($country == "Pakistan"){ echo "SELECTED"; }?>>Pakistan</OPTION> 
                          <OPTION value="Taiwan" <? if($country == "Taiwan"){ echo "SELECTED"; }?>>Taiwan</option>
                          <OPTION value="Vietnam" <? if($country == "Vietnam"){ echo "SELECTED"; }?>>Vietnam</OPTION> 
                          <OPTION value="OTHER" <? if(($country != "Cambodia") && ($country != "China") && ($country != "Dominican Republic") && ($country != "India") && ($country != "Indonesia") && ($country != "Myanmar") && ($country != "Philippines") && ($country != "Pakistan") && ($country != "Taiwan") && ($country != "Vietnam") && ($country != "") ){ echo "SELECTED"; }?>>Other</OPTION></SELECT> 
                          <INPUT maxLength="256" size="40" name="countrys" value="" disabled></font><p style="line-height: 200%">
                      <font color="#666666" size="2">&nbsp;Telephone Info：<br>
&nbsp; Country Code - <input type="text" name="telcountry" size="10" value="">&nbsp; Area Code 
                      - <input type="text" name="telarea" size="10" value=""><br>
&nbsp;&nbsp; Tel - <input type="text" name="tel" size="15" value="">&nbsp; Fax    
                      - <input type="text" name="fax" size="15" value="">&nbsp; Mobile - 
                      <input type="text" name="mobile" size="17" value=""></font></p>  
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
                        <OPTION value="" <? if($hospital == ""){ echo "SELECTED"; }?>>Please select...</OPTION> 
                        <OPTION value="National Pediatric Hospital" <? if($hospital == "National Pediatric Hospital"){ echo "SELECTED"; }?>>National Pediatric Hospital</OPTION>
                        <OPTION value="Affiliated Stomatological Hospital of Nanjing Medical University" <? if($hospital == "Affiliated Stomatological Hospital of Nanjing Medical University"){ echo "SELECTED"; }?>>Affiliated Stomatological Hospital of Nanjing Medical University</OPTION>
                        <OPTION value="People`s Hospital of Hulunbeier,Southern Mongolian" <? if($hospital == "People`s Hospital of Hulunbeier,Southern Mongolian"){ echo "SELECTED"; }?>>People`s Hospital of Hulunbeier,Southern Mongolian</OPTION>
                        <OPTION value="Shenzhen Second Hospital" <? if($hospital == "Shenzhen Second Hospital"){ echo "SELECTED"; }?>>Shenzhen Second Hospital</OPTION>
                        <OPTION value="The Affiliated Hospital of Medical College,Qingdao University" <? if($hospital == "The Affiliated Hospital of Medical College,Qingdao University"){ echo "SELECTED"; }?>>The Affiliated Hospital of Medical College,Qingdao University</OPTION>
                        <OPTION value="The 2nd Affiliated Hospital of Shantou University Medical College" <? if($hospital == "The 2nd Affiliated Hospital of Shantou University Medical College"){ echo "SELECTED"; }?>>The 2nd Affiliated Hospital of Shantou University Medical College</OPTION>
                        <OPTION value="The First Hospital of Shanxi Medical University" <? if($hospital == "The First Hospital of Shanxi Medical University"){ echo "SELECTED"; }?>>The First Hospital of Shanxi Medical University</OPTION>
                        <OPTION value="West China College of Stomatology Sichuan University" <? if($hospital == "West China College of Stomatology Sichuan University"){ echo "SELECTED"; }?>>West China College of Stomatology Sichuan University</OPTION>
                        <OPTION value="Cipto Mangunkusumo Hospital" <? if($hospital == "Cipto Mangunkusumo Hospital"){ echo "SELECTED"; }?>>Cipto Mangunkusumo Hospital</OPTION>
                        <OPTION value="Our Lady of Peace Hospital" <? if($hospital == "Our Lady of Peace Hospital"){ echo "SELECTED"; }?>>Our Lady of Peace Hospital</OPTION>
                        <OPTION value="St. Elizabeth Hospital" <? if($hospital == "St. Elizabeth Hospital"){ echo "SELECTED"; }?>>St. Elizabeth Hospital</OPTION>
                        <OPTION value="Ho Chi Minh Health Department Odorto Mazillo Hospital" <? if($hospital == "Ho Chi Minh Health Department Odorto Mazillo Hospital"){ echo "SELECTED"; }?>>Ho Chi Minh Health Department Odorto Mazillo Hospital</OPTION>
                        <OPTION value="OTHER" <? if(($hospital != "National Pediatric Hospital") && ($hospital != "Affiliated Stomatological Hospital of Nanjing Medical University") && ($hospital != "People`s Hospital of Hulunbeier,Southern Mongolian") && ($hospital != "Shenzhen Second Hospital") && ($hospital != "The Affiliated Hospital of Medical College,Qingdao University") && ($hospital != "The 2nd Affiliated Hospital of Shantou University Medical College") && ($hospital != "The First Hospital of Shanxi Medical University") && ($hospital != "West China College of Stomatology Sichuan University") && ($hospital != "Cipto Mangunkusumo Hospital") && ($hospital != "Our Lady of Peace Hospital") && ($hospital != "St. Elizabeth Hospital") && ($hospital != "Ho Chi Minh Health Department Odorto Mazillo Hospital") && ($hospital != "")){ echo "SELECTED"; }?>>Other</OPTION>
                        </SELECT> <input maxLength="256" size="40" name="hospitals" value="" disabled></font></td>
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1px solid #C0C0C0; " height="15" valign="top">
                      <p style="line-height: 200%"><font size="2" color="#666666">&nbsp; 
                      Note：</font></td>
                    <td width="80%" style="border-top: 1px solid #C0C0C0; " height="15" colspan="2" bgcolor="#F7E3AD" valign="middle">
                      <p style="line-height: 200%" align="center">
                      <font size="2" color="#666666">
                      <textarea rows="5" name="note" cols="64"  value=""></textarea></font></td>
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
    	<input type="hidden" name="chgtime" value="<?PHP echo $chgtime; ?>">
		<input type="hidden" name="num" value="<?PHP echo $result['num']; ?>">
		<input type="hidden" name="id" value="<?PHP echo $id; ?>" >
		<input type="hidden" name="picpaths" value="" >
		<input type="hidden" name="cty" value="<? echo $result['country']; ?>" >
		<input type="hidden" name="hos" value="<? echo $result['hospital']; ?>" >
		
  </table>
</div>
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