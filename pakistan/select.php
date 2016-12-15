<?PHP
	
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
	if(!empty($seid) && !empty($sepwd)){
	
	$select_member	=	"SELECT * FROM member WHERE id='".$seid."' AND pwd='".$sepwd."' ";
	$query_member	=	mysql_query($select_member);
	$result_member	=	mysql_fetch_array($query_member);
	$auth_member	=	$result_member['authority'];
	$auth_specialty	=	$result_member['specialty'];
	
	$result_value = mysql_fetch_array($query_member);
	$auth  = $result_value['authority'];
	$country = $result_value['country'];

	$idchk1 = substr($seid,0,2);
	//echo $idchk1;
?>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>NCF -- Patient Record Online Management System</title>
</head>

<body topmargin="0">

<div align="center">
  <center>
  <table border="0" cellpadding="0" cellspacing="0" width="760" height="50">
    <tr>
      <td width="100%" height="1">
        <hr size="1" color="#C0C0C0">
        
                  <tr>
            <td width="100%" align="center" bgcolor="#C0C0C0" height="29">
              <div align="center">
                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                  <tr>
                    <td width="20%" align="center">
                    	<font size="3" face="Arial">
                    		<select size="1" name="select1" onChange="javascript:location.href= this.options[this.selectedIndex].value;">
                        		<option selected>Patient Record Management</option>
                                <?  if($idchk1 = "cn") echo "<option value='searchList.php'>List of Application</option>"; ?>
                                <option value="for-pla-add-PK-search.php">Add New Application</option>
                        	</select>
                        </font>
                    </td>
                    <td width="20%" align="center"><font size="3" face="Arial"><select size="1" name="select2" onChange="javascript:location.href= this.options[this.selectedIndex].value;">
                        <option selected>Other Function</option>
                        <option value="oth-acc-inf.php">Edit Personal Info</option>
                        <!-- <option value="oth-acc-inf.php">Edit Personal Info</option> -->
                      </select></font></td>
                    </td>
                    <td width="20%" align="center"></td>
                    <td width="20%" align="center"><font size="3" face="Arial">
                    <?PHP 
						/*
                    	if(($auth_specialty == "ncfa") && ($auth_member == "a")){ 
							echo "<select size='1' name='select4' onChange='javascript:location.href=this.options.value'>";
                        	echo "<option selected>System Management</option>";
                        	echo "<option value='sys-add-acc.php'>Add Account</option>";
                        	echo "<option value='sys-mai-acc.php'>Edit Account</option>";
                        	echo "<option value='sys-del-acc.php'>Delete Account</option>";
                        	echo "<option value='sys-set-mes.php'>Set Real-time message</option>";
                        	echo "<option value='sys-assign.php'>Assign E-mail</option>";
                        	echo "<option value='sys-del-pat.php'>Delete Patient</option>";
                      		echo "</select>";
						*/
                      	}
                    ?></font></td>
                    <td width="20%" align="center"><font size="3" face="Arial"><input type="button" value="LOGOUT" name="logout" onClick="javascript:location.href='logout.php'"></font></td>
                  </tr>
                </table>
              </div>
            </td>
          </tr>

        
    <td height="1">

        
        <hr size="1" color="#C0C0C0">
      </td>
    </tr>
  </table>
  </center>
</div>

</body>

</html>
<?PHP
	/*
	}else{
		echo "<Script Language='JavaScript'>";
		echo "alert('抱歉您現在無權限讀取,請先登入');";
		echo " location.href='login.php';";
		echo " </Script>";
	}
	*/
?>