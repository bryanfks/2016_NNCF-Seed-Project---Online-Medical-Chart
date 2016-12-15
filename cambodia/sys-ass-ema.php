<?PHP
	//session_cache_limiter("none");
	session_start();
	
	include 'db.php';  
	
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
	
	if(!empty($seid) && !empty($sepwd)){
		
		//$id_modify = $_GET["id"];
		$id_modify = $_POST["id"];
		//echo "=> ".$id_modify."</br>";
		
		//------------- fetch TW Doctor data -------------------------------
		$sel_TW = "SELECT * FROM `member` WHERE authority='c'";
		$query_TW = mysql_query($sel_TW);	
?>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>NCF -- Patient Record Online Management System</title>
<SCRIPT LANGUAGE="javascript">
	<!--
		function fetch_Data(){
			var result1 = document.myForm.id.value;
			var result2 = document.myForm.assignID.value;
			location.href = "sys-ass-ema-save.php?id="+result1+"&assignID="+result2+"";
		}
	// -->
</SCRIPT>
</head>

<body topmargin="2">
<form name="myForm" enctype="multipart/form-data" method="post" action="sys-ass-ema-save.php">
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
                      <p align="center"><i><b><font face="Arial" color="#FFFFFF" size="3">Assign 
                      E-mail</font></b></i></td>        
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
                <table border="0" cellpadding="0" cellspacing="0" width="90%" style="font-family: Arial; font-size: 12pt; color: #666666; border-collapse: collapse" bordercolor="#111111">
                  <tr>
                    <td width="100%" style="border-top: 1px solid #C0C0C0; " height="19">
                      <p style="line-height: 200%" align="center">
                    </td>
                  </tr>
                </table>
                </center>
              </div>
              <div align="center">
                <center>
                <table border="1" cellpadding="0" cellspacing="0" width="90%">
                  <tr>
                            <td width="25%" align="center" height="19" valign="middle">
                              <p style="line-height: 150%"><font size="3" face="Arial">ID</font></td>
                            <td width="25%" align="center" height="19" valign="middle">
                              <p style="line-height: 150%"><font size="3" face="Arial">Assign 
                              ID</font></td>
                    <td width="25%" align="center" valign="middle">
                      <p style="line-height: 150%"><font size="3">　</font></p>
                            </td>
                  </tr>
                  <tr>
                    <?PHP
                  		$i=2;
                  		$j=1;
                  		
         			  		echo "<tr>";
		                	echo "<input type='hidden' name='id' value='".$id_modify."'>";
		                	echo "<td width='20%' align='center' valign='middle' ><p style='line-height: 150%'>".$id_modify."</td>";
			            	
		    	        	echo "<td width='25%' align='center' valign='middle'><p style='line-height: 150%'><select size='1' name='assignID'>";
		                			echo "<option value=''>Please select...</option>";
		                    		while($result2 = mysql_fetch_array($query_TW)){
				      					echo "<option value='".$result2['id']."'>".$result2['id']."</option>";
				      					$j++;
				 					}
    			            echo "<td width='20%' align='center' valign='middle'><font size='3'><input type='button' value='ASSIGN' name='maintain' onClick='fetch_Data()'></font></td>"; 
    			            echo "</tr>";
	            	 ?>
                    </select></p
                    ></td>
                    
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

</body>
</form>
</html>
<?PHP
	
}


?>