<?PHP
	session_start();             
	include 'db.php';
?>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Language" content="en-us">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>NCF -- Patient Record Online Management System</title>

</head>

<body topmargin="2">

<p style="line-height: 100%">

<font size="3">



<?PHP               
	
	$id = $_POST['id'];               
	$pwd = $_POST['pwd'];               
	$pgValue = $_POST['pgValue'];               
	
	if($pgValue == 1){               
		$chkId = "SELECT * FROM member WHERE BINARY id='".$id."' AND pwd='".$pwd."'";               
		$query = mysql_query($chkId);               
		$result = mysql_num_rows($query);
		$auth  = $result['authority'];
		$country = $result['country'];
			
		if(($result >= 1) && ($country != 'china')){               
			$_SESSION["seid"] = $id;             
			$_SESSION["sepwd"] = $pwd;             
			
			//session_register("specialty");
			$specialty_data = $result["specialty"];
			$_SESSION["spe_data"] = $specialty_data;
			
			//Get User auth. value for select.php use.
			$sel_auth = "SELECT * FROM auth WHERE authority='".$auth."'";
			$query_auth = mysql_query($sel_auth);
			@$result_auth = mysql_fetch_array($query_auth);
			$authority = $result_auth['authority'];
			
			// Get login ID             
			$login_id = $id;             
			
			// Get login IP             
			$login_ip = $REMOTE_ADDR;             
			
			// Get login Time             
			$get_time = getdate();             
			$login_time = $get_time['year']."-".$get_time['mon']."-".$get_time['mday']."-".$get_time['hours'].":".$get_time['minutes'].":".$get_time['seconds'];             
			$_SESSION["logintime"] = $login_time;             
			
			$ins_data = "INSERT INTO  `record` ( `id` ,  `ip` ,  `login` ,  `logout` ) VALUES ('".$login_id."',  '".$login_ip."',  '".$login_time."',  '')";             
			$query = mysql_query($ins_data);             
			
			echo "<script language='JavaScript'> location.href = \"http://www.seed-nncf.org/main.php\"; </script>";	               
			exit;               
		}elseif (($result >= 1) && ($country == 'china')) { 
			$_SESSION["seid"] = $id;             
			$_SESSION["sepwd"] = $pwd;             
			$_SESSION["country"] = $country;
			
			//session_register("specialty");
			$specialty_data = $result["specialty"];
			$_SESSION["spe_data"] = $specialty_data;
			
			//Get User auth. value for select.php use.
			$sel_auth = "SELECT * FROM auth WHERE authority='".$auth."'";
			$query_auth = mysql_query($sel_auth);
			@$result_auth = mysql_fetch_array($query_auth);
			$authority = $result_auth['authority'];
			
			// Get login ID             
			$login_id = $id;             
			
			// Get login IP             
			$login_ip = $REMOTE_ADDR;             
			
			// Get login Time             
			$get_time = getdate();             
			$login_time = $get_time['year']."-".$get_time['mon']."-".$get_time['mday']."-".$get_time['hours'].":".$get_time['minutes'].":".$get_time['seconds'];             
			$_SESSION["logintime"] = $login_time;             
			
			$ins_data = "INSERT INTO  `record` ( `id` ,  `ip` ,  `login` ,  `logout` ) VALUES ('".$login_id."',  '".$login_ip."',  '".$login_time."',  '')";             
			$query = mysql_query($ins_data);             
			
			echo "<script language='JavaScript'> location.href = \"http://www.seed-nncf.org/china/main.php\"; </script>";	               
			exit;
		}else{
			echo "<script language='JavaScript'>";               
			echo "	alert('Your ID or Password is error.\\n Please Re-Enter.');";
			echo "	location.href = \"http://www.seed-nncf.org/login.php\" ;";
			echo "</script>";               
			exit;               
		}	               
	}              
?></font>

<div align="center">
  <center>
  <table border="0" cellpadding="0" cellspacing="0" width="750" background="images/login-3.jpg" height="400">
    <tr>
      <td width="100%" valign="top" height="471">
        <form ACTION="login.php" name="form1" method="POST">
          <p align="center" style="line-height: 100%"><font size="3">　</font></p>
          <p align="center" style="line-height: 100%">　</p>
          <p align="center" style="line-height: 100%">　</p>
          <p align="center" style="line-height: 100%">　</p>
          <p align="center" style="line-height: 100%">　</p>
          <p align="center" style="line-height: 100%">　</p>
          <p align="center" style="line-height: 100%">　</p>
          <div align="center">
            <table border="0" cellpadding="0" cellspacing="0" width="300">
              <tr>
                <td height="173" align="center">                
                  <div align="center">
                    <table border="0" cellpadding="0" cellspacing="0" width="377" bgcolor="#FFFFFF" height="195">
                      <tr>
                        <td bgcolor="#FFCF63" align="center" width="375" height="30">
                          <p align="center" style="line-height: 150%"><i><font color="#0033CC" face="Arial" size="4">Patient                                    
                          Record Online<br>        
                          Management System</font></i></p>                                   
                        </td>
                      </tr>
                      <tr>
                        <td align="center" style="border: 1 solid #FFCF63" width="375" height="165">
                          <p align="center" style="line-height: 100%"><font size="3"><font face="Arial"><br>
                          Your&nbsp; I D</font>：&nbsp; <input type="text" name="id" size="10">                                       
                          </font>                                
                          <p align="center" style="line-height: 100%"><font face="Arial"><font size="3">Password</font></font><font size="3"><font color="#666666">：</font><input type="password" name="pwd" size="10" maxLength="4"></font></p>
                        </center>
                          <p align="center" style="line-height: 100%"><font size="3">　　　　<input type="submit" value="LOGIN" name="loginbutton">　　<a href="mailto:seed-nncf@nncf.org"><font color="#0066CC">Forget         
                          ID or password ?</font>       
                          </a>  
                          </font>
                        </td>
                      </tr>
                    </table>
                  </div>              
                </td>
              </tr>
            </table>
          </div>
    <center>
          <p align="center" style="line-height: 100%">　</p>     
          <p align="center" style="line-height: 100%"><i><font size="2"><font face="Arial" color="#999999">The&nbsp; Web&nbsp; Best&nbsp;                                         
          Browse&nbsp; Mode </font><font color="#999999"> ： </font><font face="Arial"><font color="#999999"> Internet&nbsp; Explorer&nbsp; 6.02 (Or Update)&nbsp;                                         
          /&nbsp; 800 x 600&nbsp; Resolution<br>                                        
          Copyright &copy; 2006~2007&nbsp; </font><a href="http://www.nncf.org/" target="_blank"><font color="#0066CC">Noordhoff&nbsp; Craniofacial&nbsp;                           
          Foundation</font></a></font></font></i></p>     
        <input type="hidden" name="pgValue" value="1">
        </form>
      </td>
    </tr>
  </table>
</div>

</body>

</html>
