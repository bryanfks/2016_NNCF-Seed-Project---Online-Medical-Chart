<?PHP
	session_cache_limiter("none");
	session_start();
	
	include 'db.php';
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
	$seclientid = $_SESSION["clientid"];
	
	if(!empty($seid) && !empty($sepwd)){
		
		
		$sea_clientid = $_GET['clientid'];
		$sea_drid = $_GET['drid'];
		$sea_num = $_GET['num'];
		
		/*
		$sea_clientid = $_POST['clientid'];
		$sea_drid = $_POST['drid'];
		$sea_num = $_POST['num'];
		*/
		
		if(empty($sea_clientid)){							
			$id = $seclientid;
		}else{
			$id = $sea_clientid;
		}
		$sel_data = "SELECT * FROM patient WHERE clientid='".$id."'";
		$query = mysql_query($sel_data);
		$result = mysql_fetch_array($query);
?>
<html>

<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>NCF -- Patient Record Online Management System</title>
</head>

<body topmargin="2">
<form name="myform" enctype="multipart/form-data" method="post" action="rec-edi-pat.php">
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
                        <div align="left">
                          <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                              <td width="20%"><font size="3" face="Arial"><img border="0" src="../images/label-21.gif" width="160" height="40"></font></td>
                              <td width="20%"><a href="../old/for-doc.php?clientid=".$result[' clientid']."&drid=".$result['drid']."><font size='3' face='Arial'><img border='0' src='../images/label-12.gif' width='160' height='40'></font></a></td>
                              <td width="20%"><a href="../old/sup-are.php?clientid=".$result[' clientid']."&drid=".$result['drid']."><font size='3' face='Arial'><img border='0' src='../images/label-13.gif' width='160' height='40'></font></a></td>
                              <td width="20%"><?PHP /* <img border="0" src="images/rec-pa1.gif" width="160" height="40"> */?></td>
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
                      <p align="center"><font face="Arial" color="#FFFFFF" size="3"><i><b>Information Of Patient</b></i></font></td>      
                  </tr>
                </table>
              </div>
        </center>
                <p style="line-height: 200%" align="left"></td>
          </tr>
          <tr>
            <td width="100%" align="center" bgcolor="#F7EBC6" valign="top">
              <div align="center">
                <center>
                <table border="0" cellpadding="0" cellspacing="0" width="90%" height="143" style="font-family: Arial; font-size: 12pt; color: #666666; border-collapse: collapse" bordercolor="#111111">
                  
                  <tr>
                    <td width="66%" style="border-top: 1 solid #C0C0C0" height="24" valign="top" colspan="2">
                      <p style="line-height: 200%">
                      <font color="#666666" size="2">&nbsp;ID of the patient:&nbsp;<?PHP echo $id; ?></font>
                    </td>  
                    <td width="34%" style="border-top: 1 solid #C0C0C0" height="8" rowspan="7" bgcolor="#F7E3AD">
                      <p align="center" style="line-height: 200%">
                      	<font size="2"><img border="0" src="<?PHP if(!empty($result['picture'])){ echo $result['picture']; }else{ echo 'images/user-pic.jpg'; } ?>" width="188" height="200"></font>
                      </p>
                      <p align="center" style="line-height: 200%"> 
                    </td>
                  </tr>
                  
                  <tr>
                    <td width="20%" style="border-top: 1 solid #C0C0C0" height="24" valign="top">
                      <p style="line-height: 200%"><font size="2"><font color="#666666">&nbsp;   
                      Name:</font></font></td> 
                    <td width="46%" style="border-top: 1 solid #C0C0C0" height="24" bgcolor="#F7E3AD">
                      <p style="line-height: 200%">
                    <font size="2"><font color="#666666">First     
                      name- &nbsp;<?PHP echo $result['firstname']; ?><br/>                
                    </font><font color="#666666">       
                      Last name- &nbsp;<?PHP echo $result['lastname']; ?></font></font>   
                    </td> 
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1 solid #C0C0C0" height="24">
                      <p style="line-height: 200%"><font size="2" color="#666666">&nbsp;   
                      Nationality of birth:</font></td>
                    <td width="46%" style="border-top: 1 solid #C0C0C0" height="24" bgcolor="#F7E3AD">
                      <p style="line-height: 200%"><?PHP echo $result['nationality']; ?></td>
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1 solid #C0C0C0" height="24">
                      <p style="line-height: 200%"><font face="Arial" color="#666666" size="2">&nbsp;&nbsp;ID of nationality</font><font color="#666666" size="2">:</font></td>   
                    <td width="46%" style="border-top: 1 solid #C0C0C0" height="24" bgcolor="#F7E3AD">
                      <p style="line-height: 200%"><?PHP echo $result['idnumber']; ?></td>
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1 solid #C0C0C0" height="25">
                      <p style="line-height: 200%"><font color="#666666" size="2">&nbsp;   
                      Sex:</font></td>
                    <td width="46%" style="border-top: 1 solid #C0C0C0" height="25" bgcolor="#F7E3AD">
                      <p style="line-height: 200%"><font color="#666666" size="2"><?PHP echo $result['sex']; ?></font></td>  
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1 solid #C0C0C0" height="22">
                      <p style="line-height: 200%"><font color="#666666" size="2" face="Arial">&nbsp;&nbsp;Height</font><font color="#666666" size="2">:</font></td>
                    <td width="46%" style="border-top: 1 solid #C0C0C0" height="22" bgcolor="#F7E3AD">
                      <p style="line-height: 200%"><font color="#666666" size="2" face="Arial"><?PHP echo $result['height']; ?>( CM )</font></td>     
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1 solid #C0C0C0" height="20">
                      <font color="#666666" size="2" face="Arial">&nbsp; Weight</font><font color="#666666" size="2">:</font></td>
                    <td width="46%" style="border-top: 1 solid #C0C0C0" height="20" bgcolor="#F7E3AD">
                      <p style="line-height: 200%">
                      <font color="#666666" size="2" face="Arial"><?PHP echo $result['weight']; ?>( KG )</font></p>  
                    </td>  
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1 solid #C0C0C0" height="20">
                      <p style="line-height: 200%"><font face="Arial" color="#666666" size="2">&nbsp;     
                      Date of birth</font><font color="#666666" size="2">:</font></td>
                    <td width="80%" style="border-top: 1 solid #C0C0C0" height="20" colspan="2" bgcolor="#F7E3AD">
                      <p style="line-height: 200%"><font color="#666666" size="2" face="Arial">A.D.</font><font color="#666666" size="2">:</font><font color="#666666" size="2" face="Arial">Month 
                      - Day - Years</font></td>       
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1 solid #C0C0C0" height="19" valign="top">
                      <p style="line-height: 200%"><font size="2" color="#666666" face="Arial">&nbsp;     
                      Telephone</font><font size="2" color="#666666">:</font></td>
                    <td width="80%" style="border-top: 1 solid #C0C0C0" height="19" colspan="2" bgcolor="#F7E3AD">
                      <p style="line-height: 200%"><font color="#666666" size="2" face="Arial"><?PHP echo $result['telephone']; ?></font></td>
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1 solid #C0C0C0" height="19">
                      <p style="line-height: 200%"><font color="#666666" size="2">&nbsp;     
                      Guardian:</font></td>
                    <td width="80%" style="border-top: 1 solid #C0C0C0" height="19" colspan="2" bgcolor="#F7E3AD">
                      <p style="line-height: 200%"><font color="#666666" size="2" face="Arial"><?PHP echo $result['guardian']; ?></font></td>
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1 solid #C0C0C0" height="19">
                      <p style="line-height: 200%"><font color="#666666" size="2">&nbsp;     
                      Numbers      
                      of family:</font></td>     
                    <td width="80%" style="border-top: 1 solid #C0C0C0" height="19" colspan="2" bgcolor="#F7E3AD">
                      <p style="line-height: 200%"><font color="#666666" size="2" face="Arial"><?PHP echo $result['familynum']; ?></font></td>
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1 solid #C0C0C0" height="19">
                      <p style="line-height: 200%"><font color="#666666" size="2">&nbsp;     
                      Total                
              family income:</font></td>     
                    <td width="80%" style="border-top: 1 solid #C0C0C0" height="19" colspan="2" bgcolor="#F7E3AD">
                      <p style="line-height: 200%"><font color="#666666" size="2"><?PHP echo $result['income']; ?>( USD )</font></td>     
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1 solid #C0C0C0" height="15" valign="top">
                      <p style="line-height: 200%"><font size="2"><font color="#666666" face="Arial">&nbsp;   
                      I</font>ntroduction<font color="#666666" size="2">:</font></font></td>
                    <td width="80%" style="border-top: 1 solid #C0C0C0" height="15" colspan="2" bgcolor="#F7E3AD">
                      <?PHP echo $result['introduction']; ?></td>
                  </tr>
                  <tr>
                    <td width="100%" style="border-top: 1 solid #C0C0C0" height="15" valign="top" colspan="3">
                      <p style="line-height: 200%"><font size="2">&nbsp; Time of last edit: <?PHP echo $result['chgtime']; ?><br>
                      &nbsp; Time of    
                          first creation: <?PHP echo $result['addtime']; ?><br> 
                      &nbsp; <font color="#666666" size="2">ID of the doctor 
                      first creation: <?PHP echo $result['drid']; ?></font></font></td>
                  </tr>
                  <tr>
                    <td width="100%" style="border-top: 1 solid #C0C0C0" height="4" colspan="3">
                      <p style="line-height: 200%" align="center">
                    </td>
                  </tr>
                  </table>
                </center>
              </div>
              <p style="line-height: 200%; margin-left: 10; margin-right: 10">
              <font size="2"><input type="submit" value="EDIT" name="edit"></font><p align="left" style="line-height: 200%; margin-left: 10; margin-right: 10">
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
                Web&nbsp; Best&nbsp; Browse&nbsp; Mode </font><font color="#999999">:
                </font><font face="Arial"><font color="#999999">Internet&nbsp;          
                Explorer&nbsp; 6.02 (Or Update)&nbsp; /&nbsp; 800 x 600&nbsp;          
                Resolution<br>
                Copyright c 2006~2007&nbsp; </font><a href="http://www.nncf.org/" target="_blank"><font color="#0066CC">Noordhoff&nbsp;          
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
<input type='hidden' name='clientid' value="<?PHP echo $row['clientid']; ?>">
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