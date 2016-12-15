<?
	session_cache_limiter("none");
	session_start();

	include 'db.php';
	
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
	
	
	if(!empty($seid) && !empty($sepwd)){
?>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>NCF -- Patient Record Online Management System</title>
<SCRIPT LANGUAGE="javascript">
	<!--
		function Indata2_onchange() {
      var nationality = document.getElementById("nationality").value;
      var courses = document.getElementById("courses").value;
      if(nationality == 'CN'){
			 location.href="chinaList.php?c="+courses+""; //用於判斷是整型、正畸、語言等手術用代號
			}else if(nationality == 'KH'){
        location.href='cambodiaList.php';	
			}else if(nationality == 'PK'){
				location.href='pakistanList.php';
			}else if(nationality == 'VN'){
        location.href='vietnamList.php';
      }else if(nationality == 'PH'){
        location.href='philippinesList.php';
      }
		}
			
		
		function openSubWin(){
			window.open("calendar_js.htm","Sub");
		}
	// -->
</SCRIPT>
</head>

<body topmargin="2">

<form name="myform" enctype="multipart/form-data" method="post" action="cambodiaList.php">
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
        
                </center><p style="line-height: 100%" align="left"><font color="#666666" size="2">　</font></td>
          </tr>
          <tr>
            <td width="100%" align="center" bgcolor="#F7EBC6" valign="top">
              <div align="center">
                <center>
                <table border="0" cellpadding="0" cellspacing="0" width="90%" height="1" style="font-family: Arial; font-size: 12pt; color: #666666; border-collapse: collapse" bordercolor="#111111">
                  <tr>
                    <td width="33%" style="border-top: 0px solid #C0C0C0" height="1" valign="middle">
                      <p style="line-height: 200%" align="right">患者國家：</p>
                    </td>              
                    <td width="80%" style="border-top: 0 solid #C0C0C0" height="1" bgcolor="#F7E3AD">
                      <p style="line-height: 100%">
                        <font color="#666666" size="2">&nbsp;</font>
                          <select size="1" name="nationality" id="nationality">
                            <option value="" selected>請選擇</option>
                            <option value="CN">China</option>
                            <option value="KH">Cambodia</option>
                            <option value="PK">Pakistan</option>
                            <option value="VN">Vietnam</option>
                            <option value="PH">Philippines</option>
                            <!-- <option value="MM">Myanmar</option>  //-->
                            <!-- <option value="IN">India</option> //-->
                            <!-- <option value="ID">Indonesia</option> //-->
                            <!-- <option value="DM">Dominican Republic</option> //-->
                            <!-- <option value="TW">Taiwan</option> //-->
                          </select>
                        <input type="hidden" size="20" name="nationalitys" value="" disabled />
                      </p>
                    </td>
                  </tr>
                  <tr>
                    <td width="33%" style="border-top: 0px solid #C0C0C0" height="1" valign="middle">
                      <p style="line-height: 200%" align="right">療程科別：</p>
                    </td> 
                    <td width="80%" style="border-top: 0 solid #C0C0C0" height="1" bgcolor="#F7E3AD">
                      <p style="line-height: 200%">
                        <font size="2" color="#666666">&nbsp;</font>
                        <select size="1" name="courses" id="courses">
                          <option value="" selected>請選擇</option>
                          <option value="ps">整型外科</option>
                          <option value="po">術前正畸</option>
                          <option value="st">語言治療</option>
                        </select>
                      </p>
                    </td>
                  </tr>

                  </table>
                </center>
              </div>
              <p style="line-height: 200%; margin-left: 10; margin-right: 10">
              <font size="2">
              <input type="button" value="SEARCH" name="search" onClick="return Indata2_onchange()" ></font>
              <p align="left" style="line-height: 200%; margin-left: 10; margin-right: 10"></p>
              <p align="left" style="line-height: 200%; margin-left: 10; margin-right: 10"></p>
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
		echo "<Script Language='JavaScript'>";
		echo "alert('Sorry, Access denied. \n  Please Login first.');";
		echo " location.href='login.php';";
		echo " </Script>";
	}
?>
