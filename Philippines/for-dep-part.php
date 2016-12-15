<?PHP
	session_start();
	include 'db.php';
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
	$specialty = $_SESSION["spe_data"];
	//$sess = session_is_registered("spe_data");
	if(!empty($seid) && !empty($sepwd)){
		$patient_id = $_GET["patid"];
		//echo "=> ".$patient_id;
		//$specialofMember = $_SESSION["specialty"];
		
		$sel_Memberdata = "SELECT * FROM `member` WHERE id=\"".$seid."\" AND pwd=\"".$sepwd."\"";
		$query_Memberdata = mysql_query($sel_Memberdata);
		$res_Memberdata = mysql_fetch_array($query_Memberdata);
		if((!empty($res_Memberdata["specialty"])) && ($res_Memberdata["specialty"] == "ncfa" || "ppls" || "poms" || "psp" || "pd" || "po" || "pa" || "pps" || "pg" || "psw" || "pn" || "pp")){
	//echo "Authority: ".$res_Memberdata['authority']."<br/>";
	
	
	
	
	
?>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>NCF -- Patient Record Online Management System</title>
<script language="javascript" type="text/javascript">
	<!--
		function checkPartner(){
			patien_id = document.myform.patids.value;
			location.href='rec-pat-inf.php';
		}
		
		function checkPartner2(){
			patient_id = document.myform.partner_value.value;
			location.href = "rec-pat-inf.php?id="+patient_id;
		}
		
	//-->
</script>
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
                      <? if($res_Memberdata['authority']  == 'p'){ ?>
                        <div align="left">
                          <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                              <td width="20%"><font size="3" face="Arial"><a id="NCF_Partner" onClick="return checkPartner2()" href="#"><img border="0" src="images/label-11.gif" width="160" height="40"></a></font></td>
                              <td width="20%"><img border="0" src="images/label-22.gif" width="160" height="40"></td>
                              <?PHP echo "<input type='hidden' id='partner_value' name='partner_value' value='".$patient_id."'> "; ?>
                              <td width="20%"></td>
                              <td width="20%"></td>
                              <td width="20%"></td>
                            </tr>
                          </table>
                        </div>
					  <?  } elseif ($res_Memberdata['authority']  == 'c') { ?>
                        <div align="left">
                          <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                              <td width="20%"><font size="3" face="Arial"><a id="NCF_Partner" onClick="return checkPartner2()" href="#"><img border="0" src="images/label-11.gif" width="160" height="40"></a></font></td>
                              <td width="20%"></td>
                              <td width="20%"><img border="0" src="images/label-23.gif" width="160" height="40"></td>
                              <?PHP echo "<input type='hidden' id='partner_value' name='partner_value' value='".$patient_id."'> "; ?>
                              <td width="20%"></td>
                              <td width="20%"></td>
                            </tr>
                          </table>
                        </div>
                        <?  } elseif ($res_Memberdata['authority']  == 'n' || 'a') { ?>
                        <div align="left">
                          <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                              <td width="21%"><font size="3" face="Arial"><a id="NCF_Partner" onClick="return checkPartner2()" href="#"><img border="0" src="images/label-11.gif" width="160" height="40"></a></font></td>
                              <td width="19%"></td>
                              <td width="21%"></td>
                              <td width="21%"><img border="0" src="images/label-24.gif" width="160" height="40"></td>
                              <?PHP echo "<input type='hidden' id='partner_value' name='partner_value' value='".$patient_id."'> "; ?>
                              <td width="18%"></td>
                            </tr>
                          </table>
                        </div>
                        <? } ?>
                      </td>
                    </tr>
  <center>
  <tr>
                <td width="103%" align="center" bgcolor="#F7EBC6">
              <font size="2">　</font>
              <div align="center">
                <table border="1" cellpadding="0" cellspacing="0" width="90%" bgcolor="#FF9966">
                  <tr>
                    <td width="100%">
                      <p align="center"><font face="Arial" color="#FFFFFF" size="3"><i><b>
                      Patient&#39;s Record</b></i></font></td>   
                  </tr>
                </table>
              </div>
        
                </center><p style="line-height: 200%" align="left"><font color="#666666" size="2">
                　　　</font><font size="3"><select size="1" name="Dep_code" onChange="javascript:location.href=this.options.value">
                        <option selected>Department Code</option>
                        <option  value="for-pla-part.php?pat_id=<?PHP echo $patient_id; ?>&branch=1">Plastic & Reconstructive Surgery</option>
                      </select></font></td>
          </tr>
          <tr>
            <td width="103%" align="center" bgcolor="#F7EBC6" valign="top">
              <div align="center">
                <center>
                <table border="0" cellpadding="0" cellspacing="0" width="90%" height="143" style="font-family: Arial; font-size: 12pt; color: #666666; border-collapse: collapse" bordercolor="#111111">
                  <tr>
                    <td width="100%" style="border-top: 1px solid #C0C0C0; " height="4" valign="middle">
                      <p style="line-height: 200%" align="center">
                    </td>
                  </tr>
                  </table>
                </center>
              </div>
              <p align="left" style="line-height: 200%; margin-left: 10; margin-right: 10">
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
		}
	}else{
		echo "<Script Language='JavaScript'>";
		echo "alert('Sorry, Access denied. \n  Please Login first.');";
		echo " location.href='login.php';";
		echo " </Script>";
	}
?>