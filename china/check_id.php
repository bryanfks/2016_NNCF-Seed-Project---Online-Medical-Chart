<?PHP
	session_start();
	include("db.php");
	$seid = $_SESSION["seid"];
	$sepwd = $_SESSION["sepwd"];
	if(isset($seid) && isset($sepwd)){
	
	//現在需要修改載入檔案 select.php 的類型為何
	//利用會員權限來判斷
	
	$select_member	=	"SELECT * FROM member WHERE id='".$seid."' AND pwd='".$sepwd."'";
	$query_member	=	mysql_query($select_member);
	$result_member	=	mysql_fetch_array($query_member);
	$auth_member	=	$result_member["specialty"];
	$_SESSION["seauthority"] = $auth_member;
	
	// 判斷輸入的病患 "身份證號"，以及判斷字元"checkcode = 1"
	// 如果有資料，則把資料帶入表單：for-pla-edit-china-cgmh.php
	// 如果沒有資料，則顯示空白表單：for-pla-add-china-cgmh.php
	$idno = $_POST['idno'];
	$checkcode = $_POST['checkcode'];
	
	echo "The ID No.: ".$idno."<br/>";
	
	
	if(!empty($idno)){
		$select_member =	"SELECT * FROM `patient-china` WHERE idno='".$idno."'";
		
		echo $select_member."<br/>";
		
		$query_member =	mysql_query($select_member);
		$result_member	=	mysql_fetch_array($query_member);
		
		echo "<br/>Search result: ".$result_member;
		
		if(!empty($result_member)){
			echo "<Script Language='JavaScript'>";
			echo "<!--";
			echo "\n";
			echo "alert('搜尋到您要的資料');";
			echo "location.href='for-pla-edit-china-cgmh.php?idno=".$idno."';\n";
			echo "//-->";
			echo " </Script>";
		}else {
			echo "<Script Language='JavaScript'>";
			echo " location.href='for-pla-add-china-cgmh.php';";
			echo " </Script>";
		}
	}else{
		echo "<Script Language='JavaScript'>";
		echo " location.href='for-pla-add-china-cgmh.php';";
		echo " </Script>";
	}
	}
?>