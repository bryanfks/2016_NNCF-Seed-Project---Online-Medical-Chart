<?PHP
	
	session_cache_limiter("none");
	session_start();
	
	include 'db.php';  
	
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
	
	if(!empty($seid) && !empty($sepwd)){
		$id = $seid;														// 此頁面只允許修改登入者本身的資料
		$sel_data = "SELECT * FROM member WHERE id='".$id."'";				// 由登入帳號取得個人資料
		$query = mysql_query($sel_data);
		$result = mysql_fetch_array($query);
		
		/*
		$country = $_SESSION['nationality'];
		if(empty($country)){
			$nationality = $result['nationality'];
		}else{
			$nationality = $country;
		}
		*/
		
?>	
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>NCF -- Patient Record Online Management System</title>
</head>

<body topmargin="2">
<form name="form1" enctype="multipart/form-data" method="post" action="oth-acc-edi.php">
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
                      <p align="center"><i><b><font face="Arial" color="#FFFFFF" size="3">Information 
                      Of User</font></b></i></td>   
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
                <table border="0" cellpadding="0" cellspacing="0" width="90%" height="95" style="font-family: Arial; font-size: 12pt; color: #666666; border-collapse: collapse" bordercolor="#111111">
                  <tr>
                    <td width="20%" style="border-top: 1px solid #C0C0C0" height="24">
                      <p style="line-height: 200%"><font size="2"><font face="Arial" color="#666666">*Client's              
              ID</font><font color="#666666" size="3">：</font></font></td>
                    <td width="46%" style="border-top: 1px solid #C0C0C0" height="24" bgcolor="#F3E2AF">
                      <p style="line-height: 200%"><font color="#333333" size="2">　<?PHP echo $result['id']; ?></font></td>  
                    <td width="34%" style="border-top: 1px solid #C0C0C0; " height="8" rowspan="6" bgcolor="#F3E2AF">
                      <p align="center" style="line-height: 200%"><font size="2"><img border="0" src="<?PHP if(!empty($result['picpath'])){ echo $result['picpath']; }else{ echo 'images/user-pic.jpg'; } ?>" width="188" height="200"></font></p>
                      </td>
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1px solid #C0C0C0" height="24">
                      <p style="line-height: 200%"><font size="2"><font face="Arial" color="#666666">*Password</font><font color="#666666">：</font></font></td>
                    <td width="46%" style="border-top: 1px solid #C0C0C0" height="24" bgcolor="#F3E2AF">
                      <p style="line-height: 200%"><font color="#333333" size="2">　<?PHP echo $result['pwd']; ?></font></td>  
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1px solid #C0C0C0" height="24">
                      <p style="line-height: 200%"><font size="2"><font color="#666666" face="Arial">*Occupation</font><font color="#666666">：</font></font></td>
                    <td width="46%" style="border-top: 1px solid #C0C0C0" height="24" bgcolor="#F3E2AF">
                      <p style="line-height: 200%"><font color="#333333" size="2">　<?PHP echo $result['authority']; ?></font></td>  
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1px solid #C0C0C0" height="1" valign="top">
                      <p style="line-height: 200%"><font size="2"><font color="#666666" face="Arial">*E-mail</font><font color="#666666">：</font></font></td>
                    <td width="46%" style="border-top: 1px solid #C0C0C0" height="1" valign="middle" bgcolor="#F3E2AF">
                      <p style="line-height: 200%"><font color="#333333" size="2">　<?PHP echo $result['email']; ?></font></td>       
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1px solid #C0C0C0" height="1" valign="top">
                      <p style="line-height: 200%"><font size="2"><font color="#666666" face="Arial">&nbsp; Name</font><font color="#666666">：</font></font></td>  
                    <td width="46%" style="border-top: 1px solid #C0C0C0" height="1" bgcolor="#F3E2AF">
                      <p style="line-height: 200%">
                      <font size="2">
                      <font color="#333333">
                      　</font><font color="#333333" face="Arial">First name</font><font color="#333333">－  
                      </font><font color="#333333" face="Arial"> <?PHP echo $result['firstname']; ?><br>         
                      </font><font color="#333333">　</font><font color="#333333" face="Arial">Last name</font><font color="#333333">－  
                      </font><font color="#333333" face="Arial"> <?PHP echo  
                      $result['lastname']; ?></font></font></td>    
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1px solid #C0C0C0" height="1">
                      <p style="line-height: 200%"><font size="2"><font color="#666666" face="Arial">&nbsp;    
                      Sex</font><font color="#666666">：</font></font></td>
                    <td width="46%" style="border-top: 1px solid #C0C0C0" height="1" bgcolor="#F3E2AF">
                      <p style="line-height: 200%"><font color="#333333" size="2">　<?PHP echo $result['sex']; ?></font></td>  
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1px solid #C0C0C0" height="20">
                      <p style="line-height: 200%"><font size="2"><font color="#666666" face="Arial">&nbsp;        
                      Date                         
              of birth</font><font color="#666666">：</font></font></td>        
                    <td width="80%" style="border-top: 1px solid #C0C0C0" height="20" colspan="2" bgcolor="#F3E2AF">
                      <p style="line-height: 200%"><font color="#333333" size="2">　<?PHP echo $result['birthday']; ?></font></td>  
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1px solid #C0C0C0" height="24">
                      <p style="line-height: 200%"><font size="2"><font color="#666666" face="Arial">&nbsp;   
                      Nationality of birth</font><font color="#666666">：</font></font></td>  
                    <td width="80%" style="border-top: 1px solid #C0C0C0" height="24" colspan="2" bgcolor="#F3E2AF">
                      <p style="line-height: 200%">
                        <font color="#333333" size="2">　<?PHP echo $result['nationality']; ?></font></td>  
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1px solid #C0C0C0" height="25">
                      <p style="line-height: 200%"><font size="2"><font color="#666666" face="Arial">&nbsp;        
                      For               
              present institute /<br>        
                      &nbsp; Hospital</font><font color="#666666">：</font></font></td>       
                    <td width="80%" style="border-top: 1px solid #C0C0C0" height="25" colspan="2" bgcolor="#F3E2AF">
                      <p style="line-height: 200%">
                        <font color="#333333" size="2">　<?PHP echo $result['hospital']; ?></font></td>  
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1px solid #C0C0C0" height="19">
                      <p style="line-height: 200%"><font size="2"><font color="#666666" face="Arial">&nbsp;        
                      Address</font><font color="#666666">：</font></font></td>
                    <td width="80%" style="border-top: 1px solid #C0C0C0" height="19" colspan="2" bgcolor="#F3E2AF">
                      <p style="line-height: 200%"><font color="#333333" size="2">　<?PHP echo $result['address']; ?></font></td>  
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1px solid #C0C0C0" height="19" valign="top">
                      <p style="line-height: 200%"><font size="2"><font face="Arial"><font color="#666666">&nbsp;</font> 
                      <font color="#666666">Telephone</font></font><font color="#666666">：</font></font></td>       
                    <td width="80%" style="border-top: 1px solid #C0C0C0" height="19" colspan="2" bgcolor="#F3E2AF">
                      <p style="line-height: 200%">
                      <font size="2">
                      <font color="#333333">　</font><font color="#333333" face="Arial">Home</font><font color="#333333">－   
                      <?PHP echo $result['home']; ?><br>  
                      　</font><font color="#333333" face="Arial">Office</font><font color="#333333">－   
                      <?PHP echo $result['office']; ?><br>  
                      　</font><font color="#333333" face="Arial">Mobile phone</font><font color="#333333">－   
                      <?PHP echo $result['mobile']; ?></font></font></td>       
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1px solid #C0C0C0" height="19">
                      <p style="line-height: 200%"><font size="2"><font color="#666666" face="Arial">&nbsp;        
                      Fax</font><font color="#666666">：</font></font></td>
                    <td width="80%" style="border-top: 1px solid #C0C0C0" height="19" colspan="2" bgcolor="#F3E2AF">
                      <p style="line-height: 200%"><font color="#333333" size="2">　<?PHP echo $result['fax']; ?></font></td>  
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1px solid #C0C0C0" height="19" valign="top">
                      <p style="line-height: 200%"><font size="2"><font color="#666666" face="Arial">&nbsp;   
                      I</font>ntroduction<font color="#666666">：</font></font></td>
                    <td width="80%" style="border-top: 1px solid #C0C0C0" height="19" colspan="2" bgcolor="#F3E2AF">
                      <p style="line-height: 200%"><font color="#333333" size="2">　<?PHP echo $result['introduction'];?></font><p style="line-height: 200%"><font size="2">　</font></td>
                  </tr>
                  <tr>
                    <td width="100%" style="border-top: 1px solid #C0C0C0; " height="19" colspan="3">
                      <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1">
                        <tr>
                          <td width="50%">
                          <p style="line-height: 200%">
                          <font size="2">
                          <font face="Arial" color="#666666">&nbsp;   
                          Time of last edit</font><font color="#666666">：   
                          <?PHP echo $result['chgtime']; ?></font></font></td>  
                          <td width="50%">
                          <p style="line-height: 200%">
                          <font size="2">
                          <font face="Arial" color="#666666">Time of  
                          first creation</font><font color="#666666">：   
                          <?PHP echo $result['addtime']; ?></font></font></td>  
                        </tr>
                      </table>
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
              <font size="2">
              <input type="submit" value="EDIT" name="edit"></font><p align="left" style="line-height: 200%; margin-left: 10; margin-right: 10">
              <font size="2">　</font></td>
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
                Copyright © 2006~2007&nbsp; </font><a href="http://www.nncf.org/" target="_blank"><font color="#0066CC">Noordhoff&nbsp;         
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

</body>
</form> 
</html>
<?
		
	}else{
		echo "<Script Language='JavaScript'>";
		echo "alert('Access denied. Please login first.');";
		echo " location.href='login.php';";
		echo " </Script>";
	}
?>