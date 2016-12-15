<?PHP
	session_start();
	include("db.php");
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
	if(isset($seid) && isset($sepwd)){
	
	//現在需要修改載入檔案 select.php 的類型為何
	//利用會員權限來判斷
	
	$select_member	=	"SELECT * FROM member WHERE id='".$seid."' AND pwd='".$sepwd."' ";
	$query_member	=	mysql_query($select_member);
	$result_member	=	mysql_fetch_array($query_member);
	//$auth_member	=	$result_member['authority'];
	$auth_member	=	$result_member["specialty"];
	$_SESSION["seauthority"] = $auth_member;
	//echo "Value= ".$_SESSION["seauthority"];

?>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>NCF -- Patient Record Online Management System</title>
</head>

<body topmargin="2">

<div align="center">
  <center>
  <table border="0" cellpadding="0" cellspacing="0" width="760">
    <tr>
      <td width="100%">
        <div align="center">
          <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-style: solid; border-width: 2" height="1">
            <tr>
              <td width="100%" height="16" align="center"><font size="3" face="Arial"><?PHP include("/var/www/vhosts/seed-nncf.org/httpdocs/pakistan/top.php"); ?></font></td>
            </tr>
            <tr>
              <td width="100%" height="16" align="center"><font size="3" face="Arial"><?PHP include("/var/www/vhosts/seed-nncf.org/httpdocs/pakistan/select.php"); ?></font></td>
            </tr>
            <tr>
              <td width="100%" height="300" align="center" bgcolor="#FFF3DE"><font size="3"></font></td>
            </tr>
            <tr>
              <td width="100%" height="1" align="center">
                <hr size="1" color="#C0C0C0" width="98%">
                <p align="center"><i><font size="2"><font face="Arial" color="#999999">The&nbsp;   
                Web&nbsp; Best&nbsp; Browse&nbsp; Mode </font><font color="#999999">：   
                </font><font face="Arial"><font color="#999999">Internet&nbsp;   
                Explorer&nbsp; 6.02 (Or Update)&nbsp; /&nbsp; 800 x 600&nbsp;   
                Resolution<br>
                Copyright © 2006~2012&nbsp; </font><a href="http://www.nncf.org/" target="_blank"><font color="#0066CC">Noordhoff&nbsp;   
                Craniofacial&nbsp; Foundation<br>  
                <br>
                </font></a></font></font></i></td>
            </tr>
          </table>
        </div>
      </td>
    </tr>
  </table>
  </center>
</div>

</body>

</html>
<?PHP
	}else{
		echo "<Script Language='JavaScript'>";
		echo "alert('抱歉您現在無權限讀取,請先登入')\;";
		echo " location.href=\'login.php\'\;";
		echo " </Script>";
	}
?>
