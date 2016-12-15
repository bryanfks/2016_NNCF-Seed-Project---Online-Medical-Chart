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
	
	
	// 判斷輸入的病患 "身份證號"，以及判斷字元"checkcode = 1"
	// 如果有資料，則把資料帶入表單：for-pla-edit-china-cgmh.php
	// 如果沒有資料，則顯示空白表單：for-pla-add-china-cgmh.php
	$idno = $_POST['idno'];
	$checkcode = $_POST['checkcode'];
	/*
	if(!empty($idno)){
		$select_member =	"SELECT * FROM patient-china WHERE idno='".$idno."'";
		$query_member =	mysql_query($select_member);
		$result_member	=	mysql_fetch_array($query_member);
		
		if(!empty($result_member)){
			echo "<Script Language='JavaScript'>";
			echo "<!--";
			echo "\n";
		    echo "location.href='for-pla-edit-china-cgmh.php?idno=".$idno."';\n";
			echo "//-->";
			echo " </Script>";
		}
	}else{
		echo "<Script Language='JavaScript'>";
		echo " location.href='main.php';";
		echo " </Script>";
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

<div align="center">
  <center>
  <table border="0" cellpadding="0" cellspacing="0" width="760">
    <tr>
      <td width="100%">
        <div align="center">
          <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-style: solid; border-width: 2" height="1">
            <tr>
              <td width="100%" height="16" align="center"><font size="3" face="Arial"><?PHP include("top.php"); ?></font></td>
            </tr>
            <tr>
              <td width="100%" height="16" align="center"><font size="3" face="Arial"><?PHP include("select.php"); ?></font></td>
            </tr>
            <tr>
              <td width="100%" height="300" align="center" bgcolor="#FFF3DE"><font size="3">
              	
                <div align="center">

  <center>

  <table border="0" cellpadding="0" cellspacing="0" width="780">

    <tr>

      <td align="left">

		<div align="center">

        <table cellSpacing="0" cellPadding="0" width="100%" bgColor="#ff9966" border="1" height="40">

          <tbody>

            <tr>

              <td>

                <p align="center">

				<span class closure_uid_qekr43="362" Kc="null" lang="zh-CN" id="result_box" c="4" a="undefined">

				<b><i>

				<font color="#000000" size="4">
                	<select size="1" name="select1">
                    	<option selected>请选择医院</option>
                        <option value="西安交通大学口腔医院">西安交通大学口腔医院</option>
                    </select>
                             &nbsp;清寒唇腭裂患者补助申请表</font></i></b></span>
               <font size="5">
				</font>  

              </td>

            </tr>

          </tbody>

        </table>

      </div>

        <br>

&nbsp;<div align="center">

          <table border="1" cellspacing="1" width="780">

            <tr>

              <td>

                <div align="center">

                  <table border="0" cellspacing="1" width="780">

                    <tr>

                      <td width="109" style="border-style: solid; border-width: 1"><font size="3">*接案日期</font></td>

                      <td width="252" style="border-style: solid; border-width: 1"><font size="3">&nbsp;<input id="caseYear0" maxLength="4" size="5" name="caseYear"> 年   

                          <input id="caseMonth0" maxLength="2" size="3" name="caseMonth"> 月   

                          <input id="caseDay0" maxLength="2" size="3" name="caseDay"> 日</font></td>

                      <td width="106" style="border-style: solid; border-width: 1"><font size="3">&nbsp;NCF个案编号</font></td>

                      <td width="287" style="border-style: solid; border-width: 1">&nbsp;</td>

                    </tr>

                  </table>

                </div>

                <div align="center">

                  <table border="0" cellspacing="1" width="780">

                    <tr>

                      <td style="border-style: solid; border-width: 1;"><span class closure_uid_qekr43="387" Kc="null" lang="zh-CN" id="result_box2" c="4" a="undefined"><font size="3">&nbsp;外科医师</font></span></td>

                      <td style="border-style: solid; border-width: 1">

						<font size="3">&nbsp;<input id="surgeryDrName1" maxLength="20" name="surgeryDrName" size="20">&nbsp;</font></td>

                      <td style="border-style: solid; border-width: 1">

						<font size="3">&nbsp;语言治疗师</font></td>

                      <td style="border-style: solid; border-width: 1">

						<font size="3">&nbsp;<input id="languageTherapist1" maxLength="20" name="languageTherapist" size="20">&nbsp;</font></td>

                      <td style="border-style: solid; border-width: 1"><font size="3">&nbsp;正畸科医师</font></td>

                      <td style="border-style: solid; border-width: 1">

						<font size="3">&nbsp;<input id="orthodontics" maxLength="20" name="orthodontics" size="20">&nbsp;</font></td>

                    </tr>

                  </table>

                </div>

              </td>

            </tr>

          </table>

        </div><br>

&nbsp;<div align="center">

          <table border="1" cellspacing="1" width="780">

            <tr>

              <td>

                <div align="center">

                  <table border="0" cellspacing="1" width="780">

                    <tr>

                      <td style="border-style: solid; border-width: 1"><i><b>

						<font size="4">个案基本数据</font></b></i></td>

                    </tr>

                  </table>

                </div>

                <div align="center">

                  <table border="0" cellspacing="1" width="780">

                    <tr>

                      <td style="border-style: solid; border-width: 1" width="99"><font size="3">*</font>身份证号</td>

					<form name="searchid" enctype="multipart/form-data" method="post" action="check_id.php">
                      <td style="border-style: solid; border-width: 1" width="291"><font size="3">&nbsp;<input id="idno" maxLength="20" name="idno" size="20" value="">&nbsp; 

                            <input type="submit" value="查询" name="B1"><input type="hidden" value="1" name="checkcode"></font></td>
                    </form>

                      <td style="border-style: solid; border-width: 1" width="113">

						<font size="3">&nbsp;病历</font>号<font size="3">码</font></td>

                      <td style="border-style: solid; border-width: 1" width="251">

						<font size="3">&nbsp;<input id="MedicalRecordNumber" maxLength="20" name="MedicalRecordNumber" size="20"></font></td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1" width="99"><font size="3">*个案姓名</font></td>

                      <td style="border-style: solid; border-width: 1" width="291">

						<font size="3">&nbsp;<input id="name" maxLength="20" name="name" size="20"></font></td>

                      <td style="border-style: solid; border-width: 1" width="113"><font size="3">*性&nbsp;      

                        别</font></td>

                      <td style="border-style: solid; border-width: 1" width="251"><font size="3"><label><input id="gender_male2" type="radio" value="男" name="gender">男</label> 

                          <label><input id="gender_female2" type="radio" value="女" name="gender">女</label></font></td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1" width="99"><font size="3">*出生日期</font></td>

                      <td style="border-style: solid; border-width: 1" width="291"><font size="3">&nbsp;<input id="birthYear2" maxLength="4" size="4" name="birthYear"> 年&nbsp;<input id="birthMonth2" maxLength="2" size="3" name="birthMonth"> 

						月      

                        <input id="birthDay2" maxLength="2" size="3" name="birthDay"> 日</font></td>

                      <td style="border-style: solid; border-width: 1" width="113"><font size="3">&nbsp;职&nbsp; 

						业</font></td>

                      <td style="border-style: solid; border-width: 1" width="251">

						<font size="3">&nbsp;<input id="profession2" maxLength="20" name="profession" size="20"></font></td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1" width="99"><font size="3">&nbsp;电&nbsp; 话</font></td>     

                      <td style="border-style: solid; border-width: 1" width="291">

						<font size="3">&nbsp;<input id="tel2" maxLength="20" name="tel" size="32"></font></td>

                      <td style="border-style: solid; border-width: 1" width="113"><font size="3">&nbsp;教育程度</font></td>

                      <td style="border-style: solid; border-width: 1" width="251">

						<font size="3">&nbsp;<input id="education2" maxLength="20" name="education" size="20"></font></td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1" width="99"><font size="3">*住&nbsp;      

                        址</font></td>

                      <td style="border-style: solid; border-width: 1" colspan="3" width="667">

						<font size="3">&nbsp;<input id="address2" maxLength="110" size="81" name="address"></font></td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1" width="99"><font size="3">&nbsp;重要联系人</font></td>

                      <td style="border-style: solid; border-width: 1" width="291">

						<font size="3">&nbsp;<input id="contactperson2" maxLength="20" name="contactperson" size="20"></font></td>

                      <td style="border-style: solid; border-width: 1" width="113"><font size="3">&nbsp;</font>与个案关系</td>

                      <td style="border-style: solid; border-width: 1" width="251">

						<font size="3">&nbsp;<input id="relationship2" maxLength="20" name="relationship" size="20"></font></td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1" width="99">

						<font size="3">&nbsp;连络电话</font></td>

                      <td style="border-style: solid; border-width: 1" colspan="3" width="667">

						<font size="3">

						&nbsp;<input id="phone3" name="phone" size="32"></font></td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1" width="766" colspan="4">

						<b><i><font size="4">医师诊断</font></i></b></td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1" width="99"><font size="3">*身&nbsp; 高</font></td>      

                      <td style="border-style: solid; border-width: 1" width="291"><font size="3">&nbsp;<input id="height0" maxLength="3" size="4" name="height"> 

                        公分</font></td>

                      <td style="border-style: solid; border-width: 1" width="113"><font size="3">*体&nbsp; 重</font></td>      

                      <td style="border-style: solid; border-width: 1" width="251"><font size="3">&nbsp;<input id="weight0" maxLength="3" size="4" name="weight"> 

                        公斤</font></td>

                    </tr>

                  </table>

                </div>

                <div align="center">

                  <table border="0" cellspacing="1" width="780">

                    <tr>

                      <td style="border-style: solid; border-width: 1" width="129"><font size="3">

						*主诊断<br>

                          &nbsp; ( 医学专有名词 )</font></td>      

                      <td style="border-style: solid; border-width: 1" width="637">

                          <p><font size="3">&nbsp;<input id="diagnosis_unilateral_cleft_lip_2" type="checkbox" value="UCL" name="diagnosis_unilateral_cleft_lip_1">&#21333;&#20391;唇裂 

							(                                 

                          <input id="diagnosis_unilateral_cleft_lip0" type="radio" value="C" name="diagnosis_unilateral_cleft_lip">完全性                                 

                          <input id="diagnosis_unilateral_cleft_lip1" type="radio" value="IC" name="diagnosis_unilateral_cleft_lip">不完全性                                 

                          <input id="diagnosis_unilateral_cleft_lip2" type="radio" value="CK" name="diagnosis_unilateral_cleft_lip">&#38544;裂 

							)</font></p>

                          <font size="3">

                          &nbsp;<input id="diagnosis_bilateral_cleft_lip_3" type="checkbox" value="BCL" name="diagnosis_bilateral_cleft_lip_2">双侧唇裂 

							(                                 

                          <input id="diagnosis_bilateral_cleft_lip0" type="radio" value="C" name="diagnosis_bilateral_cleft_lip">完全性                                 

                          <input id="diagnosis_bilateral_cleft_lip1" type="radio" value="IC" name="diagnosis_bilateral_cleft_lip">不完全性                                 

                          <input id="diagnosis_bilateral_cleft_lip2" type="radio" value="MCK" name="diagnosis_bilateral_cleft_lip">混合裂 

							)</font><p>&nbsp;<font size="3"><label for="checkbox9"><input id="CleftPalate0" type="checkbox" value="CP" name="CleftPalate"></label>&#33133;裂  

                          ---   

                          <label for="checkbox11">

							<input id="incomplete4" type="radio" value="V1" name="incomplete_main"></label>不完全性 

							(  

                          <label for="checkbox11"><input id="incomplete0" type="radio" value="SCC" name="incomplete"></label>粘膜下裂  

                          <label for="checkbox12"><input id="incomplete1" type="radio" value="CU" name="incomplete"></label>&#24748;雍垂裂  

                          <label for="checkbox13"><input id="incomplete2" type="radio" value="SP" name="incomplete"></label>&#36719;&#33133;裂  

                          <input id="incomplete3" type="radio" value="BC" name="incomplete">&#21452;&#20391;裂 

							)<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 

							---  

                          <label for="checkbox11">

							<input id="incomplete5" type="radio" value="V1" name="complete_main"></label> 

                          完全性 ( <input id="complete0" type="radio" value="U" name="complete">&#21333;&#20391; <input id="complete1" type="radio" value="B" name="complete">双侧 

							)</font></p>                                

                          <p><font size="3">&nbsp;<input id="beforeSurgery_21" type="checkbox" value="PO" name="BoneGraft_main">牙槽突裂 

							(                                 

                          <input id="diagnosis_unilateral_cleft_lip3" type="radio" value="C" name="BoneGraft_select">完全性                                 

                          <input id="diagnosis_unilateral_cleft_lip4" type="radio" value="IC" name="BoneGraft_select">不完全性                                 

                          <input id="diagnosis_unilateral_cleft_lip5" type="radio" value="CK" name="BoneGraft_select">&#38544;裂 

							)</font></p>                    

                          <p><font size="3">&nbsp;<input id="Combined_with_other_craniofacial_disorders0" type="checkbox" value="Other" name="Combined_with_other_craniofacial_disorders">合并其他&#39045;&#39068;病症

							： 

							<input id="Combined_with_other_craniofacial_disorders_text0" maxLength="30" size="50" name="Combined_with_other_craniofacial_disorders_text"></font></p>            

                      </td>

                    </tr>

                  </table>

                </div>

                <div align="center">

                  <table border="0" cellspacing="1" width="780">

                    <tr>

                      <td style="border-style: solid; border-width: 1"><font size="3">*</font>个案<font size="3">之前是否接受&#36807;任何唇&#33133;裂治疗？</font><p>

						&nbsp;<font size="3"><label><input id="Cleft_lip_and_palate_surgery0" type="radio" value="Y" name="Cleft_lip_and_palate_surgery">是</label></font></p>

                          <p><font size="3">&nbsp; <label>&nbsp;<input id="beforeSurgery_1" type="checkbox" value="1LNR" name="beforeSurgery_1">一期唇鼻修复</label>                                 

                          <label><input id="beforeSurgery_12" type="checkbox" value="1BLANR" name="beforeSurgery_2">一期双侧唇鼻修复</label>                                 

                          <label><input id="beforeSurgery_13" type="checkbox" value="1CPR" name="beforeSurgery_3">一期腭裂修复</label>                                 

                          <label><input id="beforeSurgery_14" type="checkbox" value="FHR" name="beforeSurgery_4">廔孔修复</label>                                 

                          <label><input id="beforeSurgery_15" type="checkbox" value="PF" name="beforeSurgery_5">咽瓣修复</label>                                 

                          <label><input id="beforeSurgery_16" type="checkbox" value="PBR" name="beforeSurgery_6">梨骨瓣修复</label></font></p>                                

                          <p><font size="3">&nbsp;&nbsp; <input id="beforeSurgery_17" type="checkbox" value="2CPR" name="beforeSurgery_7">二期腭裂(腭咽)修复                  

                          <input id="beforeSurgery_18" type="checkbox" value="LR" name="beforeSurgery_8">唇鼻整形                  

                          <input id="beforeSurgery_19" type="checkbox" value="AB" name="beforeSurgery_9">齿槽植骨                  

                          <input id="beforeSurgery_20" type="checkbox" value="PO" name="beforeSurgery_10">术前正畸                  

                          <input id="beforeSurgery_22" type="checkbox" value="PO" name="beforeSurgery_11">语言治疗</font></p>              

                          <p><font size="3">&nbsp;&nbsp; <input id="beforeSurgery_other0" type="checkbox" value="其他" name="beforeSurgery_other">其他，&#35831;&#35814;述

							：                  

                          <input id="beforeSurgery_other_reason0" maxLength="60" size="60" name="beforeSurgery_other_reason"></font></p>              

                          <p><label><font size="3">&nbsp;<input id="Cleft_lip_and_palate_surgery1" type="radio" value="N" name="Cleft_lip_and_palate_surgery">否</font></label></p>

                      </td>

                    </tr>

                  </table>

                </div>

                <div align="center">

                  <table border="0" cellspacing="1" width="780">

                    <tr>

                      <td style="border-style: solid; border-width: 1"><i><b>

						<font size="4">家庭状况</font></b></i></td>

                    </tr>

                  </table>

                </div>

                <div align="center">

                  <table border="0" cellspacing="1" width="780">

                    <tr>

                      <td style="border-style: solid; border-width: 1" width="103"><font size="3">&nbsp;家庭成&#21592;</font></td>

                      <td style="border-style: solid; border-width: 1" width="639" colspan="5"><font size="3">&nbsp;共 <input id="familyMembers0" maxLength="3" size="4" name="familyMembers">     

                          人；同住 <input id="live_together0" maxLength="3" size="4" name="live_together">     

                          人</font></td>  

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1" width="103"><font size="3"> &nbsp;父&#20146;年&#40836;</font></td>

                      <td style="border-style: solid; border-width: 1" width="85"><font size="3">&nbsp;<input id="fatherAge2" maxLength="3" size="4" name="fatherAge"> 

                        &#23681;</font></td>

                      <td style="border-style: solid; border-width: 1" width="55"><font size="3"> &nbsp;&#32844;&#19994;</font></td>

                      <td style="border-style: solid; border-width: 1" width="179">

						<font size="3">&nbsp;<input id="fatherProfession_main2" maxLength="20" name="fatherProfession_main" size="20"></font></td>

                      <td style="border-style: solid; border-width: 1" width="99"><font size="3"> &nbsp;教育程度</font></td>

                      <td style="border-style: solid; border-width: 1" width="221"><font size="3"><label>&nbsp;<input id="fatherProfession10" type="radio" value="大&#19987;以上" name="fatherProfession">大&#19987;以上</label><br>

                          <label>&nbsp;<input id="fatherProfession11" type="radio" value="中&#23398;(&#19987;)" name="fatherProfession">中学(&#19987;)</label><br>

                          <label>&nbsp;<input id="fatherProfession12" type="radio" value="小&#23398;" name="fatherProfession">小

						学</label><br>

                          <label>&nbsp;<input id="fatherProfession13" type="radio" value="&#35782;字" name="fatherProfession">&#35782;字</label> 

                          <label>&nbsp;<input id="fatherProfession14" type="radio" value="不&#35782;字" name="fatherProfession">不&#35782;字</label></font></td>     

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1" width="103"><font size="3">&nbsp;母&#20146;年&#40836;</font></td>

                      <td style="border-style: solid; border-width: 1" width="85"><font size="3">&nbsp;<input id="fatherAge1" maxLength="3" size="4" name="motherAge"> 

                        &#23681;</font></td>

                      <td style="border-style: solid; border-width: 1" width="55"><font size="3"> &nbsp;&#32844;&#19994;</font></td> 

                      <td style="border-style: solid; border-width: 1" width="179">

						<font size="3">&nbsp;<input id="fatherProfession_main1" maxLength="20" name="motherProfession_main" size="20"></font></td>

                      <td style="border-style: solid; border-width: 1" width="99">

						<font size="3"> &nbsp;教育程度</font></td> 

                      <td style="border-style: solid; border-width: 1" width="221"><font size="3"><label>&nbsp;<input id="fatherProfession5" type="radio" value="大&#19987;以上" name="motherProfession">大&#19987;以上</label><br>

                          <label>&nbsp;<input id="fatherProfession6" type="radio" value="中&#23398;(&#19987;)" name="motherProfession">中

						学(&#19987;)</label><br>

                          <label>&nbsp;<input id="fatherProfession7" type="radio" value="小&#23398;" name="motherProfession">小

						学</label><br>

                          <label>&nbsp;<input id="fatherProfession8" type="radio" value="&#35782;字" name="motherProfession">&#35782;字</label> 

                          <label>&nbsp;<input id="fatherProfession9" type="radio" value="不&#35782;字" name="motherProfession">不&#35782;字</label></font></td>     

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1" width="103" rowspan="2"><font size="3"> &nbsp;家系&#22270;</font></td>

                      <td style="border-style: solid; border-width: 1" width="639" colspan="5">

                        <p align="center"><font size="3">

						<img height="285" alt="Pedigree" src="user-pic.jpg" width="325" border="0"></font></td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1" width="639" colspan="5">

                        <p align="center"><font size="3">

                        <input type="file" size="25" name="pedigree_graphics"></font></td>

                    </tr>

                  </table>

                </div>

                <div align="center">

                  <table border="0" cellspacing="1" width="780">

                    <tr>

                      <td style="border-style: solid; border-width: 1"><font size="3">&nbsp;</font>个案<font size="3">家庭情&#20917;&#35828;明</font></td>

                      <td style="border-style: solid; border-width: 1" colspan="3">

                        <p align="center"><font size="3">

						<textarea id="descriptionCaseFamily0" name="descriptionCaseFamily" rows="4" cols="70"></textarea></font></td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1"><font size="3">&nbsp;主要&#32463;&#27982;/</font>收入来源</td>

                      <td style="border-style: solid; border-width: 1">

						<font size="3">&nbsp;<input id="mainSourceofIncome1" maxLength="26" size="30" name="mainSourceofIncome"></font></td>

                      <td style="border-style: solid; border-width: 1"><font size="3"> &nbsp;平均年收入</font></td>

                      <td style="border-style: solid; border-width: 1"><font size="3">&nbsp;     

                        <input id="income" maxLength="7" size="9" name="income">         

                          (人民&#24065;)</font></td>     

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1"><font size="3">&nbsp;家中固定支出项目<br>

                          &nbsp;(福利院免填)</font></td>     

                      <td style="border-style: solid; border-width: 1"><font size="3"><label for="fixedExpenditure1">&nbsp;1.    

                          <input id="fixedExpenditure13" maxLength="30" size="30" name="fixedExpenditure"></label><br>

                          <label for="fixedExpenditure2">&nbsp;2. <input id="fixedExpenditure" maxLength="30" size="30" name="fixedExpenditure2"></label><br>   

                          <label for="fixedExpenditure3">&nbsp;3. <input id="fixedExpenditure" maxLength="30" size="30" name="fixedExpenditure3"></label><br>   

                          <label for="fixedExpenditure4">&nbsp;4. <input id="fixedExpenditure" maxLength="30" size="30" name="fixedExpenditure4"></label></font></td> 

                      <td style="border-style: solid; border-width: 1"><font size="3">  &nbsp;&#39044;估支出</font></td>

                      <td style="border-style: solid; border-width: 1"><font size="3">&nbsp;平均每月生活支出 <input id="extimatedExpenditures1" maxLength="7" size="9" name="extimatedExpenditures">            

                          (人民&#24065;)</font></td>    

                    </tr>

                  </table>

                </div>

              </td>

            </tr>

          </table>

        </div>

        <br>

        <br>

        <div align="center">

          <table border="1" cellspacing="1" width="780">

            <tr>

              <td>

                <div align="center">

                  <table border="0" cellspacing="1" width="780">

                    <tr>

                      <td style="border-style: solid; border-width: 1"><i><b>

						<font size="4">手术医疗及交通费补助申请</font></b></i></td>

                    </tr>

                  </table>

                </div>

                <div align="center">

                  <table border="0" cellspacing="1" width="780">

                    <tr>

                      <td style="border-style: solid; border-width: 1" width="155"><font size="3">&nbsp;NCF补助编</font>号</td>

                      <td style="border-style: solid; border-width: 1" width="611">&nbsp;</td>

                    </tr>

                  </table>

                </div>

                <div align="center">

                  <table border="0" cellspacing="1" width="780">

                    <tr>

                      <td style="border-style: solid; border-width: 1"><font size="3">*住院&#26102;&#38388;</font></td>

                      <td style="border-style: solid; border-width: 1"><font size="3">&nbsp;<input id="BIHosTimeYear0" maxLength="4" size="5" name="BIHosTimeYear"> 年   

                          <input id="BIHosTimeMonth0" maxLength="2" size="3" name="BIHosTimeMonth"> 月   

                          <input id="BIHosTimeDay0" maxLength="2" size="3" name="BIHosTimeDay"> 日</font></td>

                      <td style="border-style: solid; border-width: 1"><font size="3">*&#24320;刀&#26102;&#38388;</font></td>

                      <td style="border-style: solid; border-width: 1"><font size="3">&nbsp;<input id="surgeryTimeYear0" maxLength="4" size="5" name="surgeryTimeYear"> 年   

                          <input id="surgeryTimeMonth0" maxLength="2" size="3" name="surgeryTimeMonth"> 月   

                          <input id="surgeryTimeDay0" maxLength="2" size="3" name="surgeryTimeDay"> 日</font></td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1"><font size="3">*出院&#26102;&#38388;</font></td>

                      <td style="border-style: solid; border-width: 1"><font size="3">&nbsp;<input id="LHosTimeYear0" maxLength="4" size="5" name="LHosTimeYear"> 年   

                          <input id="LHosTimeMonth0" maxLength="2" size="3" name="LHosTimeMonth"> 月   

                          <input id="LHosTimeDay0" maxLength="2" size="3" name="LHosTimeDay"> 日</font></td>

                      <td style="border-style: solid; border-width: 1"><font size="3">&nbsp;麻醉方法</font></td>

                      <td style="border-style: solid; border-width: 1"><label><font size="3">&nbsp;<input id="Anesthesia0" type="radio" value="全身麻醉" name="Anesthesia">全身麻醉   

                          <input id="Anesthesia1" type="radio" value="局部麻醉" name="Anesthesia">局部麻醉</font></label></td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1"><font size="3">*外科医师</font></td>

                      <td style="border-style: solid; border-width: 1">

						<font size="3">&nbsp;<input id="surgeon0" maxLength="20" name="surgeon" size="20"></font></td>

                      <td style="border-style: solid; border-width: 1"><font size="3">&nbsp;麻醉科医师</font></td>

                      <td style="border-style: solid; border-width: 1">

						<font size="3">&nbsp;<input id="anesthesiologist0" maxLength="20" name="anesthesiologist" size="20"></font></td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1"><font size="3">&nbsp;手&#26415;&#31867;型</font></td>

                      <td style="border-style: solid; border-width: 1" colspan="3">

                          <p><font size="3">&nbsp;<input id="surgeryType0" type="radio" value="M1LNR" name="surgeryType">一期&#21333;&#20391;唇鼻修复    

                          <input id="surgeryType1" type="radio" value="M1BLANR" name="surgeryType">一期双侧唇鼻修复    

                          <input id="surgeryType2" type="radio" value="M1CPR" name="surgeryType">一期&#33133;裂修复    

                          <input id="surgeryType3" type="radio" value="MFHR" name="surgeryType">廔孔修复</font></p>

                          <p><font size="3">&nbsp;<input id="surgeryType4" type="radio" value="M2CPR" name="surgeryType">二期&#33133;裂(&#33133;咽)修复                      

                          <input id="surgeryType5" type="radio" value="MLR" name="surgeryType">唇鼻整形                      

                          <input id="surgeryType6" type="radio" value="MAB" name="surgeryType">&#40831;槽植骨                      

                          <input id="surgeryType7" type="radio" value="MPF" name="surgeryType">咽瓣修复                      

                          <input id="surgeryType8" type="radio" value="MPBR" name="surgeryType">梨骨瓣修复</font></p>

                          <p><font size="3">&nbsp;<input id="surgeryType9" type="radio" value="MOTH" name="surgeryType">其他：    

                          <input id="surgeryTypeOther_text0" maxLength="20" name="surgeryTypeOther_text" size="20"></font></p>

                        </td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1" rowspan="4"><font size="3">&nbsp;修补类型</font></td>

                      <td style="border-style: solid; border-width: 1" colspan="3">

                          <p><font size="3">&nbsp;单侧唇裂：</font></p>

							<p><font size="3"><label>&nbsp;&nbsp; <input id="repairTypeUnilateralcleftlip0" type="radio" value="Rotation-AdvancementVariant" name="repairTypeUnilateralcleftlip">Rotation-Advancement    

                          Variant</label> <label><input id="repairTypeUnilateralcleftlip1" type="radio" value="TriangularVariant" name="repairTypeUnilateralcleftlip">Triangular                      

                          Variant</label> <label><input id="repairTypeUnilateralcleftlip2" type="radio" value="Mohler" name="repairTypeUnilateralcleftlip">Mohler</label></font></p>                     

                          <p><font size="3"> <label>&nbsp;&nbsp; <input id="repairTypeUnilateralcleftlip3" type="radio" value="Others" name="repairTypeUnilateralcleftlip">Others：</label>  

                          <input id="repairTypeUnilateralcleftlip_text0" name="repairTypeUnilateralcleftlip_text" size="20"></font></p>                    

                      </td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1" colspan="3">

                          <p><font size="3">&nbsp;双侧唇裂：</font></p>

                          <p><font size="3">&nbsp;&nbsp; <input id="repairTypeBilateralcleftlip0" type="radio" value="Straight Line" name="repairTypeBilateralcleftlip">Straight                      

                          Line <input id="repairTypeBilateralcleftlip1" type="radio" value="Forked Flap" name="repairTypeBilateralcleftlip">Forked                      

                          Flap <input id="repairTypeBilateralcleftlip2" type="radio" value="Others" name="repairTypeBilateralcleftlip">Others：                      

                          <input id="repairTypeBilateralcleftlip_text0" maxLength="20" name="repairTypeBilateralcleftlip_text" size="20"></font></p>

                      </td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1" colspan="3">

                          <p><font size="3">&nbsp;&#33133;裂：</font></p>

                          <p><font size="3">&nbsp; &nbsp;<input id="repairTypeCleftpalate0" type="radio" value="LangenbeckVariant" name="repairTypeCleftpalate">Langenbeck                      

                          Variant <input id="repairTypeCleftpalate1" type="radio" value="PushbackVariant" name="repairTypeCleftpalate">Pushback                      

                          Variant <input id="repairTypeCleftpalate2" type="radio" value="Furlow" name="repairTypeCleftpalate">Furlow                      

                          <input id="repairTypeCleftpalate3" type="radio" value="PF" name="repairTypeCleftpalate">PF</font> 

                          <font size="3"><input id="repairTypeCleftpalate4" type="radio" value="FurlowPF" name="repairTypeCleftpalate">Furlow+PF</font></p>        

                          <p><font size="3">&nbsp;&nbsp;                     

                          <input id="repairTypeCleftpalate5" type="radio" value="Others" name="repairTypeCleftpalate">Others：                      

                          <input id="repairTypeCleftpalate_text0" maxLength="20" name="repairTypeCleftpalate_text" size="20"></font></p>

                      </td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1" colspan="3">

                          <p><font size="3">&nbsp;牙槽突裂：</font></p>

                        <p><font size="3">&nbsp; &nbsp;<input id="BoneGraft" type="radio" value="Straight Line" name="BoneGraft">Bone         

                          Graft</font></p>

                      </td>

                    </tr>

                  </table>

                </div>

                <div align="center">

                  <table border="0" cellspacing="1" width="780">

                    <tr>

                      <td rowspan="4" style="border-style: solid; border-width: 1" width="99"><font size="3">&nbsp;           

                          </font>个案照片</td>

                      <td style="border-style: solid; border-width: 1"><font size="3">         

                          &nbsp;手术前－拍照日： <input id="beforeSurgeryYear0" maxLength="4" size="5" name="beforeSurgeryYear"> 年      

                          <input id="beforeSurgeryMonth0" maxLength="2" size="3" name="beforeSurgeryMonth"> 月      

                          <input id="beforeSurgeryDay0" maxLength="2" size="3" name="beforeSurgeryDay"> 日</font><p align="center"><font size="3">

						<img height="280" alt="Pedigree" src="user-pic.jpg" width="316" border="0"></font></td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1">

						<p align="center"><font size="3"><input type="file" size="25" name="pedigree_graphics1"></font></td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1"><font size="3">         

                          &nbsp;手术后－拍照日： <input id="afterSurgeryYear0" maxLength="4" size="5" name="afterSurgeryYear"> 年      

                          <input id="afterSurgeryMonth0" maxLength="2" size="3" name="afterSurgeryMonth"> 月      

                          <input id="afterSurgeryDay0" maxLength="2" size="3" name="afterSurgeryDay"> 日</font><p align="center"><font size="3">

						<img height="280" alt="Pedigree" src="user-pic.jpg" width="316" border="0"></font></td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1">

						<p align="center"><font size="3"><input type="file" size="25" name="pedigree_graphics2"></font></td>

                      </tr>

                  </table>

                </div>

                <div align="center">

                  <table border="0" cellspacing="1" width="780">

                    <tr>

                      <td style="border-style: solid; border-width: 1">

						<font size="3">&nbsp;社&#20250;&#36164;源使用情形</font></td>    

                      <td style="border-style: solid; border-width: 1">

                          <p><font size="3">&nbsp;<input id="usageofSocialResources0" type="radio" value="Y" name="usageofSocialResources">有</font></p>

							<p><font size="3">&nbsp;&nbsp;&nbsp;&nbsp; 医&#30103;&#34917;助：                   

                          <input id="smileTrain0" type="checkbox" maxLength="20" value="1" name="smileTrain">微笑列&#36710;，&#39033;目                   

                          <input id="MSitem0" name="MSitem" size="20"> <input id="MSOther0" type="checkbox" value="1" name="MSOther">其他：                   

                          <input id="MSOther_text0" maxLength="20" name="MSOther_text" size="19"></font></p>

							<p><font size="3">&nbsp;&nbsp;&nbsp;&nbsp; 生活&#34917;助： &#21333;位

							－ <input id="LAunit0" name="LAunit" size="20"> &#39033;目

							－                   

                          <input id="LAitem0" maxLength="20" name="LAitem" size="20"></font></p>

							<p><font size="3">&nbsp;&nbsp;&nbsp;&nbsp; 其他&#34917;助： &#21333;位

							－ <input id="OAunit0" maxLength="20" name="OAunit" size="20"> &#39033;目

							－                   

                          <input id="OAitem0" maxLength="20" name="OAitem" size="20"></font></p>

							<p><font size="3">&nbsp;<input id="usageofSocialResources1" type="radio" value="N" name="usageofSocialResources"></font>无</p>

                      </td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1">

						<font size="3">&nbsp;住家离&#21307;院距离</font></td>    

                      <td style="border-style: solid; border-width: 1"><font size="3"><label>&nbsp;<input id="h2hdistance3" type="radio" value="&lt;100" name="h2hdistance">少于100公里</label> <label><input id="h2hdistance4" type="radio" value="100-200" name="h2hdistance">100-200公里</label> <label><input id="h2hdistance5" type="radio" value="&gt;200" name="h2hdistance">大于200公里</label></font></td>

                    </tr>

                  </table>

                </div>

                <div align="center">

                  <table border="0" cellspacing="1" width="780">

                    <tr>

                      <td style="border-style: solid; border-width: 1"><i>

						<strong><font size="4">申请补助项目【*&#39035;&#26816;具&#21307;&#30103;收据复印件、&#36153;用明&#32454;表复印件】</font></strong></i></td>

                    </tr>

                  </table>

                </div>

                <div align="center">

                  <table border="0" cellspacing="1" width="780">

                    <tr>

                      <td style="border-style: solid; border-width: 1">

                          <p><font size="3">&nbsp;<input id="subsidiesforMedicalExpenses0" type="checkbox" value="1" name="subsidiesforMedicalExpenses"><strong>&#21307;&#30103;&#36153;&#34917;助：</strong></font></p>

							<p><font size="3">&nbsp;&nbsp; &#21307;&#30103;&#36153;用&#24635;&#35745;：人民&#24065; <input id="TotalSFME0" maxLength="6" size="6" name="TotalSFME"> 元</font></p>

							<p><font size="3">&nbsp;&nbsp;&nbsp;&nbsp; 1.申&#35831;NCF&#34917;助：人民&#24065;

							<input id="NCFAllowance0" maxLength="6" size="3" name="NCFAllowance"> 元，占&#21307;&#30103;&#36153;用&#24635;金&#39069;                   

                          <input id="NCFProportion0" maxLength="3" size="2" name="NCFProportion"> ％</font></p>

							<p>&nbsp;<font size="3">&nbsp;&nbsp;&nbsp; 2.案家自付：人民&#24065;

							<input id="PatientPay0" maxLength="6" size="3" name="PatientPay"> 元，占&#21307;&#30103;&#36153;用&#24635;金&#39069;                   

                          <input id="textfield19" maxLength="3" size="2" name="PatientProportion"> ％</font></p>

                      </td>

                      <td style="border-style: solid; border-width: 1">

                          <p><strong><font size="3">&nbsp;<input id="transportationSubsidies4" type="checkbox" value="1" name="transportationSubsidies">交通费补助：</font></strong></p>

							<p><font size="3">&nbsp;&nbsp; 1.申&#35831;NCF&#34917;助：人民&#24065;

							<input id="NCFSOT0" maxLength="6" size="3" name="NCFSOT"> 元</font></p>

							<p><font size="3">&nbsp;&nbsp; 2.案家自付：人民&#24065;

							<input id="PatientSOT0" maxLength="6" size="3" name="PatientSOT"> 元</font></p>          

                      </td>

                    </tr>

                  </table>

                </div>

                <div align="center">

                  <table border="0" cellspacing="1" width="780">

                    <tr>

                      <td style="border-style: solid; border-width: 1" height="38">

                        <p align="center"><strong><font size="4">申&#35831;NCF&#34917;助&#36153;用&#24635;金&#39069;&#20026;：人民&#24065;<font size="3"> <input id="NCFTotalSubsidies0" maxLength="6" size="6" name="NCFTotalSubsidies"> </font>元</font></strong></td>

                    </tr>

                  </table>

                </div>

                <div align="center">

                  <table border="0" cellspacing="1" width="780">

                    <tr>

                      <td style="border-style: solid; border-width: 1">

                        <p align="center"><font size="3">( 上传其他资料 )<br>

                        <img height="1050" alt="Pedigree" src="user-pic.jpg" width="760" border="0"></font></p>

                      </td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1">

                        <p align="center"><font size="3"><input type="file" size="25" name="pedigree_graphics_other"></font></td>

                    </tr>

                  </table>

                </div>

              </td>

            </tr>

          </table>

        </div>

        　

        <div align="center">

          <table border="0" cellspacing="1" width="780">

            <tr>

              <td>

                <p align="center"><font size="3"><input id="save0" onClick="return saveData('save')" type="button" value="&#20648;存" name="save">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="close0" onClick="return closeData('close')" type="button" value="&#32467;案" name="close"></font></td>

            </tr>

          </table>

        </div>

  </center>

    </td>

    </tr>

  </table>

</div>
              
              
              
              
              
              
              
              
              
              
              </font></td>
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
