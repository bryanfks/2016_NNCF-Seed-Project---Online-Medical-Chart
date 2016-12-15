<?PHP
	session_start();
	include("db.php");
	$seid   = $_SESSION["seid"];
	$sepwd  = $_SESSION["sepwd"];
	$seauth = $_SESSION["seauthority"];
	if(isset($seid) && isset($sepwd)){
?>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>NCF -- Patient Record Online Management System</title>

<SCRIPT LANGUAGE="javascript">
	<!--
		function a(){
			    id = document.myform.id.value;
				pwd = document.myform.pwd.value;
				confirms = document.myform.confirm.value;
				email = document.myform.email.value;
				specialty = document.myform.specialty.value;
				appellation = document.myform.appellation.value;
				firstname = document.myform.firstname.value;
				lastname = document.myform.lastname.value;
				country = document.myform.country.value;
				countrys = document.myform.countrys.value;
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
					alert("Please select Appellation.");
					return false;
				}
				if(firstname == ""){ 
					alert("Please enter Firstname.");
					return false;
				}
				if(lastname == ""){ 
					alert("Please enter lastname.");
					return false;
				}
				if(country == ""){ 
					alert("Please enter Country.");
					return false;
				} else if (country == "OTHER") {
					if (countrys == "") {
						alert("Please enter other Country.");
						return false;
					}
				}
				
				if((id != "") && (pwd != "") && (email != "") && (specialty != "") && (firstname != "") && (lastname != "") && (country != "")){
					document.myform.submit();
				}
			}				
			
			function Indata2_onchange() {
				//if(window.event.srcElement.options[window.event.srcElement.selectedIndex].text == 'OTHER'){
				// onLoad="return Indata2_onchange()"
				if(document.myform.country.options.value == 'OTHER'){
					document.myform.countrys.disabled = false;
				}else{
					document.myform.countrys.disabled = true;
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
			
			function openSubWin(){
				window.open("calendar_js.htm","Sub");
			}
	// -->
</SCRIPT>
</head>

<body topmargin="2">
	<form name="myform" enctype="multipart/form-data" method="post" action="sys-add-save.php">
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
                      <p align="center"><font face="Arial" color="#FFFFFF" size="3"><i><b>Add            
                      Account</b></i></font></td>   
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
                    <td width="20%" style="border-top: 1 solid #C0C0C0" height="24" valign="middle">
                      <p style="line-height: 200%"><font size="2" color="#666666">*     
                      ID：</font></td>
                    <td width="46%" style="border-top: 1 solid #C0C0C0" height="24" bgcolor="#F7E3AD" valign="middle">
                      <p style="line-height: 200%"><font color="#666666" size="2">&nbsp;<input type="text" name="id" size="7" maxLength="7"> 
                      (7 characters)</font></td>     
                    <td width="34%" style="border-top: 1 solid #C0C0C0" height="8" rowspan="5" bgcolor="#F7E3AD">
                      <p align="center" style="line-height: 200%"><font size="2" color="#666666"><img border="0" src="images/user-pic.jpg" width="188" height="200"><br>
                      Uploading your picture：<br>  
                      <input type="file" name="picpath" size="15"></font></p>
                    </td>
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1 solid #C0C0C0" height="24" valign="middle">
                      <p style="line-height: 200%"><font size="2" color="#666666">*         
                      Password：</font></td>
                    <td width="46%" style="border-top: 1 solid #C0C0C0" height="24" bgcolor="#F7E3AD" valign="middle">
                      <p style="line-height: 200%"><font size="2" color="#666666">&nbsp;<input type="password" name="pwd" size="5" maxLength="4"> 
                      (4 characters)            
                      </font>
                    </td> 
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1 solid #C0C0C0" height="24" valign="middle">
                      <p style="line-height: 200%"><font size="2" color="#666666">*    
                      Re-type                   
              password：</font></td>
                    <td width="46%" style="border-top: 1 solid #C0C0C0" height="24" bgcolor="#F7E3AD" valign="middle">
                      <p style="line-height: 200%"><font size="2" color="#666666">&nbsp;<input type="password" name="confirm" size="5"  maxLength="4"></font></td>
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1 solid #C0C0C0" height="1" valign="middle">
                      <p style="line-height: 200%"><font size="2" color="#666666">*     
                      E-mail：</font></td>
                    <td width="46%" style="border-top: 1 solid #C0C0C0" height="1" valign="middle" bgcolor="#F7E3AD">
                      <p style="line-height: 200%"><font color="#666666" size="2">&nbsp;<input type="text" name="email" size="33"></font></td>     
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1 solid #C0C0C0" height="1" valign="middle">
                      <p style="line-height: 200%"><font size="2" color="#666666">*    
                      Specialty：</font></td>
                    <td width="46%" style="border-top: 1 solid #C0C0C0" height="1" valign="middle" bgcolor="#F7E3AD">
                      <p style="line-height: 200%"><font color="#666666" size="2">&nbsp;<select size="1" name="specialty">
                        <option value Selected>Please select...</option>
                        <option value="ppls">Partner--PlasticSurgery</option>
                        <option value="poms">Partner--Oral-MaxillofacialSurgery</option>
                        <option value="psp">Partner--SpeechPathology</option>
                        <option value="pd">Partner--Dentistry</option>
                        <option value="po">Partner--Orthodontics</option>
                        <option value="pa">Partner--Anesthesiology</option>
                        <option value="pps">Partner--PediatricSurgery</option>
                        <option value="pg">Partner--Genetics</option>
                        <option value="psw">Partner--SocialWork</option>
                        <option value="pn">Partner--Nursing</option>
                        <option value="pp">Partner--Psychology</option>
                        <option value="cgmhpls">CGMH--PlasticSurgery</option>
                        <option value="cgmhoms">CGMH--Oral-MaxillofacialSurgery</option>
                        <option value="cgmhsp">CGMH--SpeechPathology</option>
                        <option value="cgmhd">CGMH--Dentistry</option>
                        <option value="cgmho">CGMH--Orthodontics</option>  
                        <option value="cgmha">CGMH--Anesthesiology</option>
                      	<option value="cgmhps">CGMH--PediatricSurgery</option>
                        <option value="cgmhg">CGMH--Genetics</option>
                        <option value="cgmhn">CGMH--Nursing</option>
                        <option value="cgmhp">CGMH--Psychology</option>
                        <option value="ncfsw">NCF--SocialWork</option>
                        <option value="ncfs">NCF--Supervisor</option>
                        <option value="ncffs">NCF--FinancialSpecialist</option>
                        <option value="ncfa">NCF--Administrator</option>
                      </select></font></td>     
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1 solid #C0C0C0" height="19" valign="top">
                      <p style="line-height: 200%"><font size="2" color="#666666">
                      *   
                      Name：</font></td> 
                    <td width="80%" style="border-top: 1 solid #C0C0C0" height="19" colspan="2" bgcolor="#F7E3AD" valign="middle">
                      <p style="line-height: 200%"><font size="2" color="#666666">&nbsp;<SELECT   
                        onchange="return Indata2_onchange()" size=1 
                        name="appellation" onLoad="return Indata2_onchange()"> 
                          <OPTION value="" selected>Please select...</OPTION> 
                          <OPTION value="Ms.">Ms.</OPTION> 
                          <OPTION value="Mr.">Mr.</OPTION> 
                          <OPTION value="Mrs.">Mrs.</OPTION> 
                          <OPTION value="Dr. & Ms.">Dr. & Ms.</OPTION>
                          <OPTION value="Dr. & Mr.">Dr. & Mr.</OPTION>
                          <OPTION value="Dr. & Mrs.">Dr. & Mrs.</OPTION>
                        </SELECT> First name     
                      - 
                      <input type="text" name="firstname" size="16"> Last name - 
                      <input type="text" name="lastname" size="16"></font></td>   
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1 solid #C0C0C0" height="19" valign="top">
                      <p style="line-height: 200%"><font size="2" color="#666666">
                      &nbsp;                   
                      Contact details：</font></td>    
                    <td width="80%" style="border-top: 1 solid #C0C0C0" height="19" colspan="2" bgcolor="#F7E3AD" valign="middle">
                      <p style="line-height: 200%"><font color="#666666" size="2">
&nbsp;Address - <input type="text" name="address" size="70"><br>
&nbsp;City - <input type="text" name="city" size="25">&nbsp; State/Province - 
                      <input type="text" name="state" size="25"><br>
&nbsp;Zip/Postal code -   
                      <input type="text" name="zipcode" size="10"><br>
&nbsp;* Country - <SELECT onChange="return Indata2_onchange()" size=1 name="country"> 
                          <OPTION value="" selected>Please select...</OPTION> 
                          <OPTION value="Cambodia">Cambodia</OPTION> 
                          <OPTION value="China">China</OPTION> 
                          <OPTION value="Dominican Republic">Dominican Republic</OPTION> 
                          <OPTION value="India">India</OPTION> 
                          <OPTION value="Indonesia">Indonesia</OPTION> 
                          <OPTION value="Myanmar">Myanmar</OPTION> 
                          <OPTION value="Philippines">Philippines</OPTION> 
                          <OPTION value="Pakistan">Pakistan</OPTION> 
                          <OPTION value="Taiwan">Taiwan</option>
                          <OPTION value="Vietnam">Vietnam</OPTION> 
                          <OPTION value="OTHER">Other</OPTION></SELECT> 
                          <INPUT disabled maxLength=256 size=40 name="countrys">
                          </font><p style="line-height: 200%">
                      <font color="#666666" size="2">&nbsp;Telephone Info：<br>
&nbsp; Country Code - <input type="text" name="telcountry" size="10">&nbsp; Area Code 
                      - <input type="text" name="telarea" size="10"><br>
&nbsp;&nbsp; Tel - <input type="text" name="tel" size="15">&nbsp; Fax    
                      - <input type="text" name="fax" size="15">&nbsp; Mobile - 
                      <input type="text" name="mobile" size="17"></font></p>  
                      </td>  
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1 solid #C0C0C0" height="25" valign="middle">
                      <p style="line-height: 200%"><font size="2" color="#666666">&nbsp;                   
                      Present institute /<br>                   
                      &nbsp; Hospital：</font></td>                  
                    <td width="80%" style="border-top: 1 solid #C0C0C0" height="25" colspan="2" bgcolor="#F7E3AD" valign="middle">
                      <p style="line-height: 200%">
                        <font color="#666666" size="2">&nbsp;<SELECT onChange="Indata3_onchange()" size="1" name="hospital"> 
                        <OPTION value="" selected>Please select...</OPTION> 
                        <OPTION value="National Pediatric Hospital">National Pediatric Hospital</OPTION>
                        <OPTION value="Affiliated Stomatological Hospital of Nanjing Medical University">Affiliated Stomatological Hospital of Nanjing Medical University</OPTION>
                        <OPTION value="People`s Hospital of Hulunbeier,Southern Mongolian">People`s Hospital of Hulunbeier,Southern Mongolian</OPTION>
                        <OPTION value="Shenzhen Second Hospital">Shenzhen Second Hospital</OPTION>
                        <OPTION value="The Affiliated Hospital of Medical College,Qingdao University">The Affiliated Hospital of Medical College,Qingdao University</OPTION>
                        <OPTION value="The 2nd Affiliated Hospital of Shantou University Medical College">The 2nd Affiliated Hospital of Shantou University Medical College</OPTION>
                        <OPTION value="The First Hospital of Shanxi Medical University">The First Hospital of Shanxi Medical University</OPTION>
                        <OPTION value="West China College of Stomatology Sichuan University">West China College of Stomatology Sichuan University</OPTION>
                        <OPTION value="Cipto Mangunkusumo Hospital">Cipto Mangunkusumo Hospital</OPTION>
                        <OPTION value="Our Lady of Peace Hospital">Our Lady of Peace Hospital</OPTION>
                        <OPTION value="St. Elizabeth Hospital">St. Elizabeth Hospital</OPTION>
                        <OPTION value="Ho Chi Minh Health Department Odorto Mazillo Hospital">Ho Chi Minh Health Department Odorto Mazillo Hospital</OPTION>
                        <OPTION value="OTHER">Other</OPTION></SELECT> 
                        <INPUT disabled maxLength=256 size=40 name="hospitals">
                        </font></td>
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1 solid #C0C0C0" height="15" valign="top">
                      <p style="line-height: 200%"><font size="2" color="#666666">&nbsp; 
                      Note：</font></td>
                    <td width="80%" style="border-top: 1 solid #C0C0C0" height="15" colspan="2" bgcolor="#F7E3AD" valign="middle">
                      <p style="line-height: 200%" align="center">
                      <font size="2" color="#666666">
                      <textarea rows="5" name="note" cols="64"></textarea></font></td>
                  </tr>
                  <tr>
                    <td width="100%" style="border-top: 1 solid #C0C0C0" height="4" colspan="3" valign="middle">
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