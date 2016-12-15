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
		
		$sel_data2 = "SELECT * FROM auth WHERE authority='".$result['specialty']."'";				// 由登入帳號取得個人資料
		$query2 = mysql_query($sel_data2);
		$result2 = mysql_fetch_array($query2);
		
		$sex = $result['appellation'];
		$first = $result['firstname'];
		$last = $result['lastname'];
		$address = $result['address'];
		$city = $result['city'];
		$state = $result['state'];
		$zipcode = $result['zipcode'];
		$nationality = $result['country'];
		$countrycode = $result['telcountry'];
		$areacode = $result['telarea'];
		$tel = $result['tel'];
		$fax = $result['fax'];
		$mobile = $result['mobile'];
		$hospital = $result['hospital'];
		$note = $result['note'];
		$picpath = $result['picpath'];
		
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
<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
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
              <td width="100%" height="16" align="center"><font size="2" face="Arial"><?PHP include("../cambodia/top.php"); ?></font></td>
            </tr>
            <tr>
              <td width="100%" height="16" align="center"><font size="2" face="Arial"><?PHP include("../cambodia/select.php"); ?></font></td>
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
        
                </center><p style="line-height: 200%" align="left">&nbsp;</td>
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
                      <p align="center" style="line-height: 200%"><font size="2" color="#666666"><img border="0" src="<?PHP if(!empty($result['picpath'])){ echo $result['picpath']; }else{ echo 'images/user-pic.jpg'; } ?>" width="188" height="200"></font></p>
                    </td>
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1px solid #C0C0C0; " height="24" valign="middle">
                      <p style="line-height: 200%"><font size="2" color="#666666">*         
                      Password：</font></td>
                    <td width="46%" style="border-top: 1px solid #C0C0C0; " height="24" bgcolor="#F7E3AD" valign="middle">
                      <p style="line-height: 200%"><font size="2" color="#666666">&nbsp;<?PHP echo $result['pwd']; ?></font></td> 
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1px solid #C0C0C0; " height="1" valign="middle">
                      <p style="line-height: 200%"><font size="2" color="#666666">*     
                      E-mail：</font></td>
                    <td width="46%" style="border-top: 1px solid #C0C0C0; " height="1" valign="middle" bgcolor="#F7E3AD">
                      <p style="line-height: 200%"><font color="#666666" size="2">&nbsp;<?PHP echo $result['email']; ?></font></td>     
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
                      <p style="line-height: 200%"><font size="2" color="#666666">&nbsp;<?PHP echo $sex; ?>&nbsp;<?PHP echo $first; ?>&nbsp;<?PHP echo $last; ?></font></td>   
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1px solid #C0C0C0; " height="19" valign="top">
                      <p style="line-height: 200%"><font size="2" color="#666666">
                      &nbsp;                   
                      Contact details：</font></td>    
                    <td width="80%" style="border-top: 1px solid #C0C0C0; " height="19" colspan="2" bgcolor="#F7E3AD" valign="middle">
                      <p style="line-height: 200%"><font color="#666666" size="2">
&nbsp;Address - &nbsp;<?PHP echo $address; ?><br>
&nbsp;City - &nbsp;<?PHP echo $city; ?> &nbsp; State/Province - &nbsp;<?PHP echo $state; ?><br>
&nbsp;Zip/Postal code - &nbsp;<?PHP echo $zipcode; ?><br>
&nbsp;Country - &nbsp;<?PHP echo $nationality; ?></font><p style="line-height: 200%">
                      <font color="#666666" size="2">&nbsp;Telephone Info：<br>
&nbsp; Country Code - &nbsp;<?PHP echo $countrycode; ?>&nbsp; Area Code 
                      - &nbsp;<?PHP echo $areacode; ?><br>
&nbsp;&nbsp; Tel - &nbsp;<?PHP echo $tel; ?> &nbsp; Fax    
                      - &nbsp;<?PHP echo $fax; ?> &nbsp; Mobile - &nbsp;<?PHP echo $mobile; ?></font></p>  
                      </td>  
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1px solid #C0C0C0; " height="25" valign="middle">
                      <p style="line-height: 200%"><font size="2" color="#666666">&nbsp;                   
                      Present institute /<br>                   
                      &nbsp; Hospital：</font></td>                  
                    <td width="80%" style="border-top: 1px solid #C0C0C0; " height="25" colspan="2" bgcolor="#F7E3AD" valign="middle">
                      <p style="line-height: 200%">
                        <font color="#666666" size="2">&nbsp;<?PHP echo $hospital; ?> </font></td>
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1px solid #C0C0C0; " height="15" valign="top">
                      <p style="line-height: 200%"><font size="2" color="#666666">&nbsp; 
                      Note：</font></td>
                    <td width="80%" style="border-top: 1px solid #C0C0C0; " height="15" colspan="2" bgcolor="#F7E3AD" valign="middle">
                      <p style="line-height: 200%">
                      &nbsp;<?PHP echo $note; ?> </td>
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
              <input type="submit" value="EDIT" name="EDIT"></font><p align="left" style="line-height: 200%; margin-left: 10; margin-right: 10">
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