<?PHP
	session_start();
	include("db.php");
	$seid   = $_SESSION["seid"];
	$sepwd  = $_SESSION["sepwd"];
	$seauth = $_SESSION["seauthority"];
	if(isset($seid) && isset($sepwd)){
		$id = $_POST['id'];
		$pwd = $_POST['pwd'];
		
		// -------------------- 轉換職別代碼為全名 ------------------------------
		//$occupation = $_POST['occupation'];
		$occ_data = $_POST['occupation'];
		$sel_occ = "SELECT * FROM auth WHERE catrgory='".$occ_data."'";
		$query_occ = mysql_query($sel_occ);
		$res_occ = mysql_fetch_array($query_occ);
		$occ_vie = $res_occ['occupation'];
		// ------------------------- End -----------------------------------------
		
		$first = $_POST['first'];
		$last = $_POST['last'];
		$email = $_POST['email'];
		$sex = $_POST['sex'];
		
		
		// ----------  取得DB中的國家英文名與簡碼  ----------------------------------------------------------
		
		$country = $_POST['nationality'];	//國別簡碼
		if($country == "OTHER"){
			$nationality = $_POST['nationalitys'];
		}else{
			$sel_nat = "SELECT * FROM country WHERE natcode='".$country."'";
			$query_nat = mysql_query($sel_nat);
			$result_nat = mysql_fetch_array($query_nat);
			$nationality = $result_nat['nationality'];						//將國別簡碼轉換成國別全名
		}
		
		// ---------------------------------------------------------------------------------------------------
		

		$hospital_data = $_POST['hospital'];
		echo $hospital_data."<br/>";
		echo $_POST['hospitals'];
		//判斷 country 若為 other時, 則帶入空格欄的值 nationalitys value.
		if($hospital_data == "OTHER"){										
			$hospital = $_POST['hospitals'];
			echo $hospital;
		}else{
		    $hospital = "";
		}	
		
		

		/*$birthday = $_POST['addate'];*/								 // 為配合sys-add-acc.php中的萬年曆, 所以birthday 改成 addate
		$birthday_month = $_POST['month'];
		$birthday_day   = $_POST['day'];
		$birthday_years = $_POST['years'];
		$birthday = $birthday_month."-".$birthday_day."-".$birthday_years;
		
		
		
		$address = $_POST['address'];
		$home = $_POST['home'];
		$office = $_POST['office'];
		$mobile = $_POST['mobile'];
		$fax = $_POST['fax'];
		$introduction = $_POST['introduction'];

		$addtime = $_POST['addtime'];
		$chgtime = $_POST['chgtime'];
		
		
		$filename = $_FILES['picpath']['name'];										// get picture's file name.
		if(!empty($filename)){
			$oldmask = umask(0);														
			@mkdir("/var/www/vhosts/seed-nncf.org/httpdocs/photo/member/".$id, 0777);			// create new image fold by new member fold
			umask($oldmask);															
			$img_path = "/var/www/vhosts/seed-nncf.org/httpdocs/photo/member/".$id."/";			// photo on server path.
			copy($_FILES['picpath']['tmp_name'], $img_path.$_FILES['picpath']['name']);	// save picture from temp_file to fold.
			$picpaths = "http://www.seed-nncf.org/photo/member/".$id."/".$filename;			// picture path for show picture on page.
			unset($_SESSION["picpaths"]);
			$_SESSION['picpaths'] = $picpaths;
	
		}elseif(!empty($_SESSION['picpaths'])){
			$picpaths = $_SESSION['picpaths'];
		}else{
			$picpaths = "images/user-pic.jpg";
			unset($_SESSION["picpaths"]);
			$_SESSION['picpaths'] = $picpaths;
		}
		

		$get_time = getdate();
		$addtime =  $get_time['year']."-".$get_time['mon']."-".$get_time['mday']."-".$get_time['hours'].":".$get_time['minutes'].":".$get_time['seconds'];
		$chgtime =  $addtime;
			
		
		// -------------------- 判斷新建帳號是否重複 -----------------------------

		$chk_acc = "SELECT id FROM member WHERE id='".$id."'";
		$query = mysql_query($chk_acc);
		$row = mysql_fetch_array($query);
		$num = mysql_num_rows($query);
		if($num){
			echo "<script language='Javascript'>";
			echo "alert('This Account is exist, please choiec other ID name.');";
			echo " location.href='sys-add-acc.php';";
			echo "</script>";
		}
	
?>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>NCF -- Patient Record Online Management System</title>
</head>

<body topmargin="2">
<form name="form1" enctype="multipart/form-data" method="post" action="sys-add-save.php">
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
                      <p align="center"><font face="Arial" color="#FFFFFF" size="3"><i><b>Review  
                      Information Of User</b></i></font></td>    
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
                <table border="0" cellpadding="0" cellspacing="0" width="90%" height="172" style="font-family: Arial; font-size: 12pt; color: #666666; border-collapse: collapse" bordercolor="#111111">
                  <tr>
                    <td width="20%" style="border-top: 1px solid #C0C0C0" height="24">
                      <p style="line-height: 200%"><font size="2"><font face="Arial" color="#666666">*Client              
              ID</font><font color="#666666" size="3">：</font></font></td>
                    <td width="46%" style="border-top: 1px solid #C0C0C0" height="24" bgcolor="#F3E2AF">
                      <p style="line-height: 200%"><font color="#333333" size="2">　<?PHP echo $id; ?></font></td>   
                    <td width="34%" style="border-top: 1px solid #C0C0C0; " height="8" rowspan="6" bgcolor="#F3E2AF">
                      <p align="center"><font size="2"><img border="0" src="<?PHP echo $picpaths; ?>" width="188" height="200"></font></p>
                      </td>
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1px solid #C0C0C0" height="24">
                      <p style="line-height: 200%"><font size="2"><font face="Arial" color="#666666">*Password</font><font color="#666666">：</font></font></td>
                    <td width="46%" style="border-top: 1px solid #C0C0C0" height="24" bgcolor="#F3E2AF">
                      <p style="line-height: 200%"><font color="#333333" size="2">　<?PHP echo $pwd; ?></font></td>   
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1px solid #C0C0C0" height="24">
                      <p style="line-height: 200%"><font size="2"><font color="#666666" face="Arial">*Occupation</font><font color="#666666">：</font></font></td>
                    <td width="46%" style="border-top: 1px solid #C0C0C0" height="24" bgcolor="#F3E2AF">
                      <p style="line-height: 200%"><font color="#333333" size="2">　<?PHP echo $occ_vie; ?></font></td>   
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1px solid #C0C0C0" height="1" valign="top">
                      <p style="line-height: 200%"><font size="2"><font color="#666666" face="Arial">*E-mail</font><font color="#666666">：</font></font></td>
                    <td width="46%" style="border-top: 1px solid #C0C0C0" height="1" valign="middle" bgcolor="#F3E2AF">
                      <p style="line-height: 200%"><font color="#333333" size="2">　<?PHP echo $email; ?></font></td>        
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1px solid #C0C0C0" height="1" valign="top">
                      <p style="line-height: 200%"><font size="2"><font color="#666666" face="Arial">&nbsp; Name</font><font color="#666666">：</font></font></td>   
                    <td width="46%" style="border-top: 1px solid #C0C0C0" height="1" bgcolor="#F3E2AF">
                      <p style="line-height: 200%">
                      <font size="2">
                      <font color="#333333">
                      　</font><font color="#333333" face="Arial">First name</font><font color="#333333">－   
                      </font><font color="#333333" face="Arial"> <?PHP echo $first; ?><br>          
                      </font><font color="#333333">　</font><font color="#333333" face="Arial">Last name</font><font color="#333333">－   
                      </font><font color="#333333" face="Arial"> <?PHP echo $last;?></font></font></td>     
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1px solid #C0C0C0" height="1">
                      <p style="line-height: 200%"><font size="2"><font color="#666666" face="Arial">&nbsp;     
                      Sex</font><font color="#666666">：</font></font></td>
                    <td width="46%" style="border-top: 1px solid #C0C0C0" height="1" bgcolor="#F3E2AF">
                      <p style="line-height: 200%"><font color="#333333" size="2">　<?PHP echo $sex; ?></font></td>   
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1px solid #C0C0C0" height="20">
                      <p style="line-height: 200%"><font size="2"><font color="#666666" face="Arial">&nbsp;         
                      Date                          
              of birth</font><font color="#666666">：</font></font></td>         
                    <td width="80%" style="border-top: 1px solid #C0C0C0" height="20" colspan="2" bgcolor="#F3E2AF">
                      <p style="line-height: 200%"><font color="#333333" size="2">　<?PHP echo $birthday; ?></font></td>   
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1px solid #C0C0C0" height="24">
                      <p style="line-height: 200%"><font size="2"><font color="#666666" face="Arial">&nbsp;    
                      Nationality of birth</font><font color="#666666">：</font></font></td>   
                    <td width="80%" style="border-top: 1px solid #C0C0C0" height="24" colspan="2" bgcolor="#F3E2AF">
                      <p style="line-height: 200%">
                        <font color="#333333" size="2">　<?PHP echo $nationality; ?></font></td>   
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1px solid #C0C0C0" height="25">
                      <p style="line-height: 200%"><font size="2"><font color="#666666" face="Arial">&nbsp;         
                      For                
              present institute /<br>         
                      &nbsp; Hospital</font><font color="#666666">：</font></font></td>        
                    <td width="80%" style="border-top: 1px solid #C0C0C0" height="25" colspan="2" bgcolor="#F3E2AF">
                      <p style="line-height: 200%">
                        <font color="#333333" size="2">　<?PHP echo $hospital; ?></font></td>   
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1px solid #C0C0C0" height="19">
                      <p style="line-height: 200%"><font size="2"><font color="#666666" face="Arial">&nbsp;         
                      Address</font><font color="#666666">：</font></font></td>
                    <td width="80%" style="border-top: 1px solid #C0C0C0" height="19" colspan="2" bgcolor="#F3E2AF">
                      <p style="line-height: 200%"><font color="#333333" size="2">　<?PHP echo $address; ?></font></td>   
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1px solid #C0C0C0" height="19" valign="top">
                      <p style="line-height: 200%"><font size="2"><font face="Arial"><font color="#666666">&nbsp;</font> 
                      <font color="#666666">Telephone</font></font><font color="#666666">：</font></font></td>        
                    <td width="80%" style="border-top: 1px solid #C0C0C0" height="19" colspan="2" bgcolor="#F3E2AF">
                      <p style="line-height: 200%">
                      <font size="2">
                      <font color="#333333">　</font><font color="#333333" face="Arial">Home</font><font color="#333333">－    
                      <?PHP echo $home; ?><br>   
                      　</font><font color="#333333" face="Arial">Office</font><font color="#333333">－    
                      <?PHP echo $office; ?><br>   
                      　</font><font color="#333333" face="Arial">Mobile phone</font><font color="#333333">－    
                      <?PHP echo $mobile; ?></font></font></td>        
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1px solid #C0C0C0" height="19">
                      <p style="line-height: 200%"><font size="2"><font color="#666666" face="Arial">&nbsp;         
                      Fax</font><font color="#666666">：</font></font></td>
                    <td width="80%" style="border-top: 1px solid #C0C0C0" height="19" colspan="2" bgcolor="#F3E2AF">
                      <p style="line-height: 200%"><font color="#333333" size="2">　<?PHP echo $fax; ?></font></td>   
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1px solid #C0C0C0" height="19" valign="top">
                      <p style="line-height: 200%"><font size="2"><font color="#666666" face="Arial">&nbsp;    
                      I</font>ntroduction<font color="#666666">：</font></font></td>
                    <td width="80%" style="border-top: 1px solid #C0C0C0" height="19" colspan="2" bgcolor="#F3E2AF">
                      <p style="line-height: 200%"><font color="#333333" size="2">　<?PHP echo $introduction; ?></font><p style="line-height: 200%"><font size="2">　</font></td>
                  </tr>
                  <tr>
                    <td width="100%" style="border-top: 1px solid #C0C0C0; " height="19" colspan="3">
                      <p style="line-height: 200%" align="center">
              <font size="2">　</font></td>
                  </tr>
                </table>
                </center>
              </div>
              <p style="line-height: 200%; margin-left: 10; margin-right: 10">
              <font size="2">
              <input type="button" value="BACK" onClick="self.history.back(-1)">　　　<input type="submit" value="SAVE" name="save"></font><p align="left" style="line-height: 200%; margin-left: 10; margin-right: 10">
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
<input type="hidden" name="id" value="<?PHP echo $id; ?>">
<input type="hidden" name="pwd" value="<?PHP echo $pwd; ?>">
<input type="hidden" name="occupation" value="<?PHP echo $occ_vie; ?>">
<input type="hidden" name="first" value="<?PHP echo $first; ?>">
<input type="hidden" name="last" value="<?PHP echo $last; ?>">
<input type="hidden" name="email" value="<?PHP echo $email; ?>">
<input type="hidden" name="sex" value="<?PHP echo $sex; ?>">
<input type="hidden" name="nationality" value="<?PHP echo $nationality; ?>">
<input type="hidden" name="hospital" value="<?PHP echo $hospital; ?>">
<input type="hidden" name="birthday" value="<?PHP echo $birthday; ?>">
<input type="hidden" name="address" value="<?PHP echo $address; ?>">
<input type="hidden" name="home" value="<?PHP echo $home; ?>">
<input type="hidden" name="office" value="<?PHP echo $office; ?>">
<input type="hidden" name="mobile" value="<?PHP echo $mobile; ?>">
<input type="hidden" name="fax" value="<?PHP echo $fax; ?>">
<input type="hidden" name="picpaths" value="<?PHP echo $picpaths; ?>">
<input type="hidden" name="introduction" value="<?PHP echo $introduction; ?>">
<input type="hidden" name="addtime" value="<?PHP echo $addtime; ?>">
<input type="hidden" name="chgtime" value="<?PHP echo $chgtime; ?>">		
</form>
</body>

</html>
<?
	
		
	/*
		}else{
			echo "<Script Language='JavaScript'>";
			echo "alert('Sorry, Access denied');";
			echo " location.href='main.php';";
			echo " </Script>";
		}
	*/
	}else{
		echo "<Script Language='JavaScript'>";
		echo "alert('Access denied. Please login first.');";
		echo " location.href='login.php';";
		echo " </Script>";
	}



?>
