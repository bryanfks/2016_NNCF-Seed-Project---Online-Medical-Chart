<?PHP
  session_cache_limiter("none");
  session_start();
  
  include 'db.php';
     
  $seid = $_SESSION["seid"];
  $sepwd = $_SESSION["sepwd"];
  
  
  if(!empty($seid) && !empty($sepwd)){
    $CPIData = $_GET["cpi"];
    
    $srhType = $_GET["srhType"];
    $srhValue = $_GET["srhValue"];

    $courses = $_GET["courses"];

    //echo "srhType: ".$srhType."<br/>srhValue: ".$srhValue."<br/>CPIData: ".$CPIData."<br>courses: ".$courses."<br>";
    
    // 搜寻病患资料
    $selChinaPatientinfo = "SELECT * FROM `patient-china` WHERE num =".$cpi."";
    $queryChinaPatientinfo = mysql_query($selChinaPatientinfo);
    $resultChinaPatientinfo = mysql_fetch_array($queryChinaPatientinfo);
    
    //搜寻病患病例表
    //$NCFMedicalNums = $resultChinaPatientinfo['NCFID']."11";
    $selChinaPatientRecord = "SELECT * FROM `patientrecord-china` WHERE NCFMedicalNum='".$NCFMedicalNums."'";
    $queryChinaPatientRecord = mysql_query($selChinaPatientRecord);
    $resultChinaPatientRecord = mysql_fetch_array($queryChinaPatientRecord);
    
    //echo $selChinaPatientRecord."<br>";
    $nums = $CPIData;
?>
<HTML>
  <HEAD>
    <TITLE>NCF -- Patient Record Online Management System</TITLE>
    <META content="text/html; charset=utf-8" http-equiv=Content-Type>
    <script language="javascript">
      <!--
        function inputData(){
            //病患个人资料
          document.china_medical.caseYear.value = "<?php echo $resultChinaPatientinfo['caseYear'];  ?>";
          document.china_medical.caseMonth.value = "<?php echo $resultChinaPatientinfo['caseMonth'];  ?>";
          document.china_medical.caseDay.value = "<?php echo $resultChinaPatientinfo['caseDay'];  ?>";
          document.china_medical.surgeryDrName.value = "<?php echo $resultChinaPatientinfo['surgeryDrName'];  ?>";
          document.china_medical.languageTherapist.value = "<?php echo $resultChinaPatientinfo['languageTherapist'];  ?>";
          document.china_medical.orthodontics.value = "<?php echo $resultChinaPatientinfo['orthodontics'];  ?>";
          document.china_medical.MedicalRecordNumber.value = "<?php echo $resultChinaPatientinfo['MedicalRecordNumber'];  ?>";
          document.china_medical.idno.value = "<?php echo $resultChinaPatientinfo['idno'];  ?>";
          document.china_medical.name.value = "<?php echo $resultChinaPatientinfo['name'];  ?>";
          document.china_medical.birthYear.value = "<?php echo $resultChinaPatientinfo['birthYear'];  ?>";
          document.china_medical.birthMonth.value = "<?php echo $resultChinaPatientinfo['birthMonth'];  ?>";
          document.china_medical.birthDay.value = "<?php echo $resultChinaPatientinfo['birthDay'];  ?>";
          document.china_medical.profession.value = "<?php echo $resultChinaPatientinfo['profession'];  ?>";
          document.china_medical.tel.value = "<?php echo $resultChinaPatientinfo['tel'];  ?>";
          document.china_medical.education.value = "<?php echo $resultChinaPatientinfo['education'];  ?>";
          document.china_medical.address.value = "<?php echo $resultChinaPatientinfo['address'];  ?>";
          document.china_medical.contactperson.value = "<?php echo $resultChinaPatientinfo['contactperson'];  ?>";
          document.china_medical.relationship.value = "<?php echo $resultChinaPatientinfo['relationship'];  ?>";
          document.china_medical.phone.value = "<?php echo $resultChinaPatientinfo['phone'];  ?>";
          document.china_medical.cellphone.value = "<?php echo $resultChinaPatientinfo['cellphone'];  ?>";
          document.china_medical.height.value = "<?php echo $resultChinaPatientinfo['height'];  ?>";
          document.china_medical.weight.value = "<?php echo $resultChinaPatientinfo['weight'];  ?>";
          document.china_medical.Combined_with_other_craniofacial_disorders_text.value = "<?php echo $resultChinaPatientinfo['Combined_with_other_craniofacial_disorders_text'];  ?>";
          document.china_medical.beforeSurgery_other_reason.value = "<?php echo $resultChinaPatientinfo['beforeSurgery_other_reason'];  ?>";
          document.china_medical.familyMembers.value = "<?php echo $resultChinaPatientinfo['familyMembers'];  ?>";
          document.china_medical.live_together.value = "<?php echo $resultChinaPatientinfo['live_together'];  ?>";
          document.china_medical.fatherAge.value = "<?php echo $resultChinaPatientinfo['fatherAge'];  ?>";
          document.china_medical.fatherProfession_main.value = "<?php echo $resultChinaPatientinfo['fatherProfession_main'];  ?>"; 
          document.china_medical.motherAge.value = "<?php echo $resultChinaPatientinfo['motherAge'];  ?>";
          document.china_medical.motherProfession_main.value = "<?php echo $resultChinaPatientinfo['motherProfession_main'];  ?>";
<?
  $strS = $resultChinaPatientinfo['descriptionCaseFamily'];
  //$strS2 = nl2br($strS);
  $strS1 = preg_replace('/\s/'," ",$strS);
  //$strS4 = preg_replace("<br />"," ",$strS3);
?>
document.china_medical.descriptionCaseFamily.value = "<?php echo $strS1;  ?>";

document.china_medical.mainSourceofIncome.value = "<?php echo $resultChinaPatientinfo['mainSourceofIncome'];  ?>";
document.china_medical.income.value = "<?php echo $resultChinaPatientinfo['income'];  ?>";
document.china_medical.fixedExpenditure1.value = "<?php echo $resultChinaPatientinfo['fixedExpenditure1'];  ?>";
document.china_medical.fixedExpenditure2.value = "<?php echo $resultChinaPatientinfo['fixedExpenditure2'];  ?>";
document.china_medical.fixedExpenditure3.value = "<?php echo $resultChinaPatientinfo['fixedExpenditure3'];  ?>";
document.china_medical.fixedExpenditure4.value = "<?php echo $resultChinaPatientinfo['fixedExpenditure4'];  ?>";
document.china_medical.extimatedExpenditures.value = "<?php echo $resultChinaPatientinfo['extimatedExpenditures'];  ?>";        

        }
        function turnbacke(){
          document.turnback.submit();
        }
        function addData(num){
           var courses = document.getElementById('courses').value;
          
          if (courses == "ps"){
            //location.href = "for-pla-add-china-cgmh.php?c="+courses+"n="+NCFMedicalNum;
            location.href = "for-pla-add-china-cgmh_new.php?num="+num;
            //alert("for-pla-add-china-cgmh_new.php?num="+num);
          }else if (courses == "po"){
            location.href = "china-addpat-po-view_new.php?num="+num;
            //alert("china-addpat-po-view_new.php?num="+num);
          }

          
        }
        
            
      //-->
      </script>
</HEAD>
<BODY  topmargin="2" onLoad="inputData()">
<FORM enctype="multipart/form-data" method="post" name="china_medical" action="for-pla-add-china-cgmh-edit.php">
<DIV align=center>
<CENTER>
<TABLE border=0 cellSpacing=0 cellPadding=0 width=750 id="table11">
  <TBODY>
  <TR>
    <TD width="100%">
      <DIV align=center>
      <TABLE style="BORDER-BOTTOM: 2px solid; BORDER-LEFT: 2px solid; BORDER-TOP: 2px solid; BORDER-RIGHT: 2px solid" border=0 bgcolor="#FFF3DE" cellSpacing=0 cellPadding=0 width="100%" height=1 id="table12">
        <TBODY>
        <TR>
          <TD bgColor=#fff3de width="100%" align=middle>
            <FONT size=3>
            <DIV align=center>
            <CENTER>
            <TABLE border=0 cellSpacing=0 cellPadding=0 width="100%" id="table13">
              
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-style: solid; border-width: 2" height="1">
                  <tr>
                    <td width="100%" align="center"><font size="3" face="Arial"><?PHP include("top.php"); ?></font></td>
                  </tr>
                  <tr>
                    <td width="100%" align="center"><font size="3" face="Arial"><?PHP include("select.php"); ?></font></td>
                  </tr>
                </table>
              



              <TBODY>
              <TR>
                <TD align=left>

                  <DIV align=center>
                  <TABLE border=1 cellSpacing=0 cellPadding=0 width="100%" bgColor=#ff9966 height=50 id="table13">
                    <TBODY>
                    <TR>
                      <TD>
                        <P align=center style="line-height: 150%">
                          <FONT color="#000000" size=4><I><B>
                            <SPAN id=result_box lang=zh-CN a="undefined" c="4" Kc="null" closure_uid_qekr43="362">
                              <SELECT size=1 name="school">
                                <OPTION selected>请选择医院</OPTION>
                                <OPTION value="西安交通大学口腔医院" <?php if($resultChinaPatientinfo['school'] =="西安交通大学口腔医院"){echo "selected";}  ?>>西安交通大学口腔医院</OPTION>
                                <OPTION value="中国医学科学院北京协和医院" <?php if($resultChinaPatientinfo['school'] == "中国医学科学院北京协和医院"){echo "selected";} ?>>中国医学科学院北京协和医院</OPTION>
                              </SELECT>
                            </SPAN></B></I></FONT></FONT>
                            <SPAN id=result_box a="undefined" c="4" Kc="null" closure_uid_qekr43="362"><b><i><font color="#000000" size="4">清寒唇颚裂患者补助申请表
            （整形外科）</font></i></b></SPAN></P></TD></TR></TBODY></TABLE></DIV>
          <p style="line-height: 150%">
          <font color="#FF0000">&nbsp;※有 * 注记为必填</font>
          <FONT
            size=3>
          <DIV align=center>
                  <TABLE border=1 cellSpacing=1 bgcolor="#FFF3DE" width="100%" id="table15">
                    <TBODY>
                    <TR>
                      <TD>
                        <DIV align=center>
                        <TABLE border=0 cellSpacing=1 width="100%" id="table16">
                          <TBODY>
                          <TR>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid"
                            width=91>
              <p style="line-height: 150%"><FONT size=3>*接案日期</FONT></TD>
                            <TD
                            style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid"
                            width=311>
              <p style="line-height: 150%"><FONT size=3>&nbsp;<INPUT id="caseYear" maxLength=4 size=4 name="caseYear" value=""> 年  
              <INPUT id="caseMonth" maxLength=2 size=2 name="caseMonth" value=""> 月  
              <INPUT id="caseDay" maxLength=2 size=2 name="caseDay" value=""> 日</FONT></TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=118>
              <p style="line-height: 150%"><FONT size=3>&nbsp;NCF个案编号</FONT></TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=224>&nbsp;<?php echo $resultChinaPatientinfo['NCFID'];  ?></TD></TR></TBODY></TABLE></DIV>
                        <DIV align=center>
                        <TABLE border=0 cellSpacing=1 width="100%" id="table17" bgcolor="#FFF3DE">
                          <TBODY>
                          <TR>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid">
              <p style="line-height: 150%"><SPAN><FONT size=3>&nbsp;外科医师</FONT></SPAN></TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid">
              <p style="line-height: 150%"><FONT size=3>&nbsp;<INPUT id="surgeryDrName" maxLength=20 name="surgeryDrName" size="18" value=""></FONT></TD>
                            <TD
                            style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid">
              <p style="line-height: 150%"><FONT
                              size=3>&nbsp;语言治疗师</FONT></TD>
                            <TD
                            style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid">
              <p style="line-height: 150%"><FONT
                              size=3>&nbsp;<INPUT id="languageTherapist" maxLength=20 name="languageTherapist" size="18" value=""></FONT></TD>
                            <TD
                            style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid">
              <p style="line-height: 150%"><FONT
                              size=3>&nbsp;正畸科医师</FONT></TD>
                            <TD
                            style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid">
              <p style="line-height: 150%"><FONT
                              size=3>&nbsp;<INPUT id="orthodontics" maxLength=20 name="orthodontics" size="18" value=""></FONT></TD></TR></TBODY></TABLE></DIV></TD></TR></TBODY></TABLE></DIV>
          &nbsp;<DIV align=center>
                  <TABLE border=1 bgcolor="#FFF3DE" cellSpacing=1 width="100%" id="table18">
                    <TBODY>
                    <TR>
                      <TD>
                        <DIV align=center>
                        <TABLE border=0 bgcolor="#FFF3DE" cellSpacing=1 width="100%" id="table19">
                          <TBODY>
                          <TR>
                            <TD
                            style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" height="30">
              <p style="line-height: 150%"><I><B><FONT
                              size=4>&nbsp;个案基本数据</FONT></B></I></TD></TR></TBODY></TABLE></DIV>
                        <DIV align=center>
                        <TABLE border=0 cellSpacing=1 width="100%">
                          <TBODY>
                          <TR>
                            <TD
                            style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid"
                            width=135>
              <p style="line-height: 150%"><FONT size=3>*</FONT>身份证号</TD>
                            <TD
                            style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid"
                            width=290>
              <p style="line-height: 150%"><FONT size=3>&nbsp;<INPUT id="idno" maxLength=20 name="idno" value=""></FONT></TD>
                            <TD
                            style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid"
                            width=89>
              <p style="line-height: 150%"><FONT size=3>&nbsp;病历号码</FONT></TD>
                            <TD
                            style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid"
                            width=203>
              <p style="line-height: 150%"><FONT size=3>&nbsp;<INPUT id="MedicalRecordNumber" maxLength=20 name="MedicalRecordNumber" value=""></FONT></TD></TR>
                          <TR>
                            <TD
                            style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid"
                            width=135>
              <p style="line-height: 150%"><FONT size=3>*个案姓名</FONT></TD>
                            <TD
                            style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid"
                            width=290>
              <p style="line-height: 150%"><FONT size=3>&nbsp;<INPUT id="name" maxLength=20 name="name" value=""></FONT></TD>
                            <TD
                            style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid"
                            width=89>
              <p style="line-height: 150%"><FONT size=3>*性别</FONT></TD>
                            <TD
                            style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid"
                            width=203>
              <p style="line-height: 150%"><FONT size=3><LABEL>&nbsp;
              <INPUT id="gender_male" value="M" type=radio name="gender" <? if($resultChinaPatientinfo['gender'] == "M"){ echo "checked"; } ?>>男</LABEL> <LABEL><INPUT id="gender_female" value="F" type=radio name="gender" <? if($resultChinaPatientinfo['gender'] == "F"){ echo "checked"; } ?>>女</LABEL></FONT></TD></TR>
                          <TR>
                            <TD
                            style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid"
                            width=135>
              <p style="line-height: 150%"><FONT size=3>*出生日期</FONT></TD>
                            <TD
                            style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid"
                            width=290>
              <p style="line-height: 150%"><FONT size=3>&nbsp;<INPUT id="birthYear" maxLength=4 size=4 name="birthYear" value=""> 年&nbsp;<INPUT id="birthMonth" maxLength=4 size=2 name="birthMonth" value=""> 月  
              <INPUT id="birthDay" maxLength=4 size=2 name="birthDay" value=""> 日</FONT></TD>
                            <TD
                            style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid"
                            width=89>
              <p style="line-height: 150%"><FONT size=3>&nbsp;职业</FONT></TD>
                            <TD
                            style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid"
                            width=203>
              <p style="line-height: 150%"><FONT size=3>&nbsp;<INPUT id="profession" maxLength=20 name="profession" value=""></FONT></TD></TR>
                          <TR>
                            <TD
                            style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid"
                            width=135>
              <p style="line-height: 150%"><FONT size=3>&nbsp;电话</FONT></TD>
                            <TD
                            style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid"
                            width=290>
              <p style="line-height: 150%"><FONT size=3>&nbsp;<INPUT id="tel" maxLength=20 size=30 name="tel" value=""></FONT></TD>
                            <TD
                            style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid"
                            width=89>
              <p style="line-height: 150%"><FONT size=3>&nbsp;教育程度</FONT></TD>
                            <TD
                            style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid"
                            width=203>
              <p style="line-height: 150%"><FONT size=3>&nbsp;<INPUT id="education" maxLength=20 name="education" value=""></FONT></TD></TR>
                          <TR>
                            <TD
                            style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid"
                            width=135>
              <p style="line-height: 150%"><FONT size=3>*住址</FONT></TD>
                            <TD
                            style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid"
                            width=592 colSpan=3>
              <p style="line-height: 150%"><FONT size=3>&nbsp;<INPUT id="address" maxLength=110 size=84 name="address" value=""></FONT></TD></TR>
                          <TR>
                            <TD
                            style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid"
                            width=135>
              <p style="line-height: 150%"><FONT size=3>&nbsp;重要联系人</FONT></TD>
                            <TD
                            style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid"
                            width=290>
              <p style="line-height: 150%"><FONT size=3>&nbsp;<INPUT id="contactperson" maxLength=20 name="contactperson" value=""></FONT></TD>
                            <TD
                            style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid"
                            width=89>
              <p style="line-height: 150%"><FONT size=3>&nbsp;</FONT>与个案关系</TD>
                            <TD
                            style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid"
                            width=203>
              <p style="line-height: 150%"><FONT size=3>&nbsp;<INPUT id="relationship" maxLength=20 name="relationship" value=""></FONT></TD></TR>
                          <tr>
                           <FONT size=3>
                            <TD
                            style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid"
                            width=135>
              <p style="line-height: 150%"><FONT size=3>&nbsp;连络电话</FONT></TD>
                            <TD
                            style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid"
                            width=592 colSpan=3>
              <p style="line-height: 150%"><FONT size=3>&nbsp;自宅：<INPUT id="phone" size=32 name="phone" value=""><br>
              </FONT>&nbsp;<FONT size=3>手机：<INPUT id="cellphone" size=32 name="cellphone" value=""></FONT></p></TD>
              </tr>
                          <TR>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=135>

            <p style="line-height: 150%">

            <font size="3">&nbsp;住家离医院距离</font></TD>
                            <TD
                            style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid"
                            width=592 colSpan=3>
              <p style="line-height: 150%"><font size="3"><label>
            &nbsp;<input id="h2hdistance" type="radio" value="100" name="h2hdistance" <? if($resultChinaPatientinfo['h2hdistance'] == "100"){ echo "checked"; } ?>>少于100公里</label> <label>
            <input id="h2hdistance" type="radio" value="100-200" name="h2hdistance" <? if($resultChinaPatientinfo['h2hdistance'] == "100-200"){ echo "checked"; } ?>>100-200公里</label> <label>
            <input id="h2hdistance" type="radio" value="200" name="h2hdistance" <? if($resultChinaPatientinfo['h2hdistance'] == "200"){ echo "checked"; } ?>>大于200公里</label></font></TD></TR>
                          </TBODY></TABLE></DIV>
                        </TD></TR></TBODY></TABLE></DIV>
          &nbsp;<DIV align=center>
                  <TABLE border=1  bgcolor="#FFF3DE" cellSpacing=1 width="100%" id="table62">
                    <TBODY>
                    <TR>
                      <TD>
                        <DIV align=center>
                        <TABLE border=0 cellSpacing=1 width="100%">
                          <TBODY>
                          <FONT
            size=3>
                          <TR>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=710 colSpan=4 height="30">
              <p style="line-height: 150%"><B><I><FONT size=4>&nbsp;</FONT></I></B><font size="4"><b><i>医疗诊断</i></b></font></TD></TR>
                          <TR>
                            <TD
                            style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid"
                            width=135>
              <p style="line-height: 150%"><FONT size=3>*身高</FONT></TD>
                            <TD
                            style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid"
                            width=290>
              <p style="line-height: 150%"><FONT size=3>&nbsp;<INPUT id="height" maxLength="10" size="6" name="height" value=""> 公分</FONT></TD>
                            <TD
                            style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid"
                            width=89>
              <p style="line-height: 150%"><FONT size=3>*体重</FONT></TD>
                            <TD
                            style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid"
                            width=203>
              <p style="line-height: 150%"><FONT size=3>&nbsp;<INPUT id="weight" maxLength="10" size="6" name="weight" value="">
                          公斤</FONT></TD></TR></TBODY></TABLE></DIV>
                        <DIV align=center>
                        <TABLE border=0 cellSpacing=1 width="100%" id="table64">
                          <TBODY>
                          <TR>
                            <TD
                            style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid"
                            width=135>
              <p style="line-height: 150%"><FONT size=3>*主诊断<BR>&nbsp;（医学专有名词）</FONT></TD>
                            <TD
                            style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid"
                            width=592>
                              <p style="line-height: 150%">
                              <FONT size=3>&nbsp;<INPUT id="diagnosis_unilateral_cleft_lip_1" value="UCL" type=checkbox name="diagnosis_unilateral_cleft_lip_1" <? if(($resultChinaPatientinfo['diagnosis_unilateral_cleft_lip_1'] == "UCL") || ($resultChinaPatientinfo['diagnosis_unilateral_cleft_lip_1'] == "1")){ echo "checked"; } ?>>单侧唇裂 (
                              <INPUT id="diagnosis_unilateral_cleft_lip" value="C" type=radio name="diagnosis_unilateral_cleft_lip" <? if($resultChinaPatientinfo['diagnosis_unilateral_cleft_lip'] == "C"){ echo "checked"; } ?>>完全性
                              <INPUT id="diagnosis_unilateral_cleft_lip" value="IC" type=radio name="diagnosis_unilateral_cleft_lip" <? if($resultChinaPatientinfo['diagnosis_unilateral_cleft_lip'] == "IC"){ echo "checked"; } ?>>不完全性 
                              <INPUT id="diagnosis_unilateral_cleft_lip" value="CK" type=radio name="diagnosis_unilateral_cleft_lip" <? if($resultChinaPatientinfo['diagnosis_unilateral_cleft_lip'] == "CK"){ echo "checked"; } ?>>隐裂)</FONT></p>
                              <p style="line-height: 150%"><FONT size=3>&nbsp;
                              <INPUT id="diagnosis_bilateral_cleft_lip_2" value="BCL" type=checkbox name="diagnosis_bilateral_cleft_lip_2" <? if(($resultChinaPatientinfo['diagnosis_bilateral_cleft_lip_2'] == "BCL") || ($resultChinaPatientinfo['diagnosis_bilateral_cleft_lip_2'] == "1")){ echo "checked"; } ?>>双侧唇裂 (
                              <INPUT id="diagnosis_bilateral_cleft_lip" value="C" type=radio name="diagnosis_bilateral_cleft_lip" <? if($resultChinaPatientinfo['diagnosis_bilateral_cleft_lip'] == "C"){ echo "checked"; } ?>>完全性
                              <INPUT id="diagnosis_bilateral_cleft_lip" value="IC" type=radio name="diagnosis_bilateral_cleft_lip" <? if($resultChinaPatientinfo['diagnosis_bilateral_cleft_lip'] == "IC"){ echo "checked"; } ?>>不完全性
                              <INPUT id="diagnosis_bilateral_cleft_lip" value="MCK" type=radio name="diagnosis_bilateral_cleft_lip" <? if($resultChinaPatientinfo['diagnosis_bilateral_cleft_lip'] == "MCK"){ echo "checked"; } ?>>混合裂
                              )</FONT></p>
                              <P style="line-height: 150%">&nbsp;<FONT size=3><LABEL for=checkbox9><INPUT id="CleftPalate" value=CP type=checkbox name="CleftPalate" <? if($resultChinaPatientinfo['CleftPalate'] == "CP"){ echo "checked"; } ?>></LABEL>颚裂 － <LABEL for=checkbox11>
                              <INPUT id="incomplete" value="IC" type=radio name="incomplete_main"<? if($resultChinaPatientinfo['incomplete_main'] == "IC"){ echo "checked"; } ?>></LABEL>不完全性 (<LABEL for=checkbox11><INPUT id="incomplete" value="SCC" type=radio name="incomplete" <? if($resultChinaPatientinfo['incomplete'] == "SCC"){ echo "checked"; } ?>></LABEL>粘膜下裂
                              <LABEL for=checkbox12>
                <INPUT id="incomplete" value="CU" type=radio name="incomplete" <? if($resultChinaPatientinfo['incomplete'] == "CU"){ echo "checked"; } ?>></LABEL>悬雍垂裂
                              <LABEL for=checkbox13>
                <INPUT id="incomplete" value="SP" type=radio name="incomplete" <? if($resultChinaPatientinfo['incomplete'] == "SP"){ echo "checked"; } ?>></LABEL>软颚裂
                              <INPUT id="incomplete" value="BC" type=radio name="incomplete" <? if($resultChinaPatientinfo['incomplete'] == "BC"){ echo "checked"; } ?>>双侧裂
                              )<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              － <LABEL for=checkbox11>
                              <INPUT id="incomplete" value="C" type=radio name="incomplete_main" <? if($resultChinaPatientinfo['incomplete_main'] == "C"){ echo "checked"; } ?>></LABEL> 完全性
                              (<INPUT id="complete" value="U" type=radio name="complete" <? if($resultChinaPatientinfo['complete'] == "U"){ echo "checked"; } ?>>单侧 
                              <INPUT id="complete" value="B" type=radio name="complete" <? if($resultChinaPatientinfo['complete'] == "B"){ echo "checked"; } ?>>双侧 )</FONT></P>
                              <P style="line-height: 150%"><FONT size=3>&nbsp;<INPUT id="beforeSurgery_23" value="BoneGraft" type=checkbox name="BoneGraft_main" <? if($resultChinaPatientinfo['BoneGraft_main'] == "BoneGraft"){ echo "checked"; } ?>>牙槽突裂 (
                              <INPUT id="diagnosis_unilateral_cleft_lip" value="C" type=radio name="BoneGraft_select" <? if($resultChinaPatientinfo['BoneGraft_select'] == "C"){ echo "checked"; } ?>>完全性 
                              <INPUT id="diagnosis_unilateral_cleft_lip" value="IC" type=radio name="BoneGraft_select" <? if($resultChinaPatientinfo['BoneGraft_select'] == "IC"){ echo "checked"; } ?>>不完全性 
                              <INPUT id="diagnosis_unilateral_cleft_lip" value="CK" type=radio name="BoneGraft_select" <? if($resultChinaPatientinfo['BoneGraft_select'] == "CK"){ echo "checked"; } ?>>隐裂 )</FONT></P>
                              <P style="line-height: 150%"><FONT size=3>&nbsp;<INPUT id="Combined_with_other_craniofacial_disorders" value="Other" type=checkbox name="Combined_with_other_craniofacial_disorders" <? if($resultChinaPatientinfo['Combined_with_other_craniofacial_disorders'] == "Other"){ echo "checked"; } ?>>合并其它颅颜病症
                ：<INPUT id="Combined_with_other_craniofacial_disorders_text" maxLength=30 size=50 name="Combined_with_other_craniofacial_disorders_text"></FONT></P></TD></TR></TBODY></TABLE></DIV>
                        <DIV align=center>
                        <TABLE border=0 cellSpacing=1 width="100%" id="table65">
                          <TBODY>
                          <TR>
                            <TD
                            style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid">
              <p style="line-height: 150%"><FONT
                              size=3>*个案之前是否接受过任何唇颚裂治疗？</FONT></p>
                              <P style="line-height: 150%">&nbsp;<FONT size=3><LABEL><INPUT id="Cleft_lip_and_palate_surgery" value="Y" type=radio name="Cleft_lip_and_palate_surgery" <? if($resultChinaPatientinfo['Cleft_lip_and_palate_surgery'] == "Y"){ echo "checked"; } ?>>是</LABEL></FONT></P>
                              <P style="line-height: 150%"><FONT size=3>&nbsp;&nbsp;&nbsp;&nbsp;
                <LABEL>
                <INPUT id="beforeSurgery_1" value="1LNR" type=checkbox name="beforeSurgery_1" <? if($resultChinaPatientinfo['beforeSurgery_1'] == "1LNR"){ echo "checked"; } ?>>一期唇鼻修复</LABEL> <LABEL>
                <INPUT id="beforeSurgery_2" value="1BLANR" type=checkbox name="beforeSurgery_2" <? if($resultChinaPatientinfo['beforeSurgery_2'] == "1BLANR"){ echo "checked"; } ?>>一期双侧唇鼻修复</LABEL> <LABEL>
                <INPUT id="beforeSurgery_3" value="1CPR" type=checkbox name="beforeSurgery_3" <? if($resultChinaPatientinfo['beforeSurgery_3'] == "1CPR"){ echo "checked"; } ?>>一期颚裂修复</LABEL> <LABEL>
                <INPUT id="beforeSurgery_4" value="FHR" type=checkbox name="beforeSurgery_4" <? if($resultChinaPatientinfo['beforeSurgery_4'] == "FHR"){ echo "checked"; } ?>>廔孔修复</LABEL> <LABEL>
                <INPUT id="beforeSurgery_5" value="PF" type=checkbox name="beforeSurgery_5" <? if($resultChinaPatientinfo['beforeSurgery_5'] == "PF"){ echo "checked"; } ?>>咽瓣修复</LABEL> <LABEL>
                <INPUT id="beforeSurgery_6" value="PBR" type=checkbox name="beforeSurgery_6" <? if($resultChinaPatientinfo['beforeSurgery_6'] == "PBR"){ echo "checked"; } ?>>梨骨瓣修复</LABEL></FONT></P>
                              <P style="line-height: 150%"><FONT size=3>&nbsp;&nbsp;&nbsp;&nbsp; 
                <INPUT id="beforeSurgery_7" value="2CPR" type=checkbox name="beforeSurgery_7" <? if($resultChinaPatientinfo['beforeSurgery_7'] == "2CPR"){ echo "checked"; } ?>>二期颚裂(颚咽)修复 
                <INPUT id="beforeSurgery_8" value="LR" type=checkbox name="beforeSurgery_8" <? if($resultChinaPatientinfo['beforeSurgery_8'] == "LR"){ echo "checked"; } ?>>唇鼻整形 
                <INPUT id="beforeSurgery_9" value="AB" type=checkbox name="beforeSurgery_9" <? if($resultChinaPatientinfo['beforeSurgery_9'] == "AB"){ echo "checked"; } ?>>齿槽植骨 
                <INPUT id="beforeSurgery_10" value="PO" type=checkbox name="beforeSurgery_10" <? if($resultChinaPatientinfo['beforeSurgery_10'] == "PO"){ echo "checked"; } ?>>术前正畸 
                <INPUT id="beforeSurgery_11" value="SL" type=checkbox name="beforeSurgery_11" <? if($resultChinaPatientinfo['beforeSurgery_11'] == "SL"){ echo "checked"; } ?>>语言治疗</FONT></P>
                              <P style="line-height: 150%"><FONT size=3>&nbsp;&nbsp;&nbsp;&nbsp; 
                <INPUT id="beforeSurgery_other" value="other" type=checkbox name="beforeSurgery_other" <? if($resultChinaPatientinfo['beforeSurgery_other'] == "other"){ echo "checked"; } ?>>其它，请详述：<INPUT id="beforeSurgery_other_reason" maxLength=60 size=60 name="beforeSurgery_other_reason"></FONT></P>
                <P style="line-height: 150%"><LABEL><FONT size=3>&nbsp;<INPUT id="Cleft_lip_and_palate_surgery" value="N" type=radio name="Cleft_lip_and_palate_surgery" <? if($resultChinaPatientinfo['Cleft_lip_and_palate_surgery'] == "N"){ echo "checked"; } ?>>否</FONT></LABEL></P></TD></TR></TBODY></TABLE></DIV>
                        </TD></TR></TBODY></TABLE></DIV>
          &nbsp;<DIV align=center>
                  <TABLE border=1 bgcolor="#FFF3DE" cellSpacing=1 width="100%" id="table55">
                    <TBODY>
                    <TR>
                      <TD>
                        <FONT
            size=3>
                        <DIV align=center>
                        <TABLE border=0 cellSpacing=1 width="100%" id="table59">
                          <TBODY>
                          <TR>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" height="30">
              <p style="line-height: 150%"><I><B><FONT size=4>&nbsp;家庭状况</FONT></B></I></TD></TR></TBODY></TABLE></DIV>
                        <DIV align=center>
                        <TABLE border=0 cellSpacing=1 width="100%" id="table60">
                          <TBODY>
                          <TR>
                            <TD
                            style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid"
                            width=83>
              <p style="line-height: 150%"><FONT size=3>&nbsp;家庭成员</FONT></TD>
                            <TD
                            style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid"
                            width=669 colSpan=5>
              <p style="line-height: 150%"><FONT size=3>&nbsp;共 
              <INPUT id="familyMembers" maxLength=3 size=4 name="familyMembers" value=""> 人；同住 
              <INPUT id="live_together" maxLength=3 size=4 name="live_together" value="">
                          人</FONT></TD></TR>
                          <TR>
                                <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=83>
                                  <p style="line-height: 150%"><FONT size=3>&nbsp;父亲年龄</FONT>
                                </TD>
                                <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=115>
                                  <p style="line-height: 150%"><FONT size=3>&nbsp;<INPUT id="fatherAge" maxLength=3 size=4 name="fatherAge"> 岁</FONT>
                                </TD>
                                  <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=44>
                                    <p style="line-height: 150%"><FONT size=3>&nbsp;职业</FONT>
                                  </TD>
                                  <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=198>
                                    <p style="line-height: 150%"><FONT size=3>&nbsp;<INPUT id="fatherProfession_main" maxLength=20 name="fatherProfession_main" value=""></FONT>
                                  </TD>
                                  <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=79>
                                    <p style="line-height: 150%"><FONT size=3>&nbsp;教育程度</FONT>
                                  </TD>
                                  <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=221>
                                    <p style="line-height: 150%">
                                      <FONT size=3>
                                        <LABEL>&nbsp;<INPUT id="fatherProfession" value="大专" type=radio name="fatherProfession" <? if($resultChinaPatientinfo['fatherProfession'] == "大专"){ echo "checked"; } ?>>大专以上</LABEL><BR>
                                        <LABEL>&nbsp;<INPUT id="fatherProfession" value="中学" type=radio name="fatherProfession" <? if($resultChinaPatientinfo['fatherProfession'] == "中学"){ echo "checked"; } ?>>中学(专)</LABEL><BR>
                                        <LABEL>&nbsp;<INPUT id="fatherProfession" value="小学" type=radio name="fatherProfession" <? if($resultChinaPatientinfo['fatherProfession'] == "小学"){ echo "checked"; } ?>>小学</LABEL><br>
                                        <LABEL>&nbsp;<INPUT id="fatherProfession" value="不识字" type=radio name="fatherProfession" <? if($resultChinaPatientinfo['fatherProfession'] == "不识字"){ echo "checked"; } ?>>不识字</LABEL>
                                      </FONT>
                                    </p>
                                  </TD>
                                </TR>
                                <TR>
                              <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=83>
                                <p style="line-height: 150%"><FONT size=3>&nbsp;母亲年龄</FONT>
                              </TD>
                              <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=115>
                                <p style="line-height: 150%"><FONT size=3>&nbsp;<INPUT id="motherAge" maxLength=3 size=4 name="motherAge"> 岁</FONT></p>
                              </TD>
                              <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=44>
                                <p style="line-height: 150%"><FONT size=3>&nbsp;职业</FONT>
                              </TD>
                              <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=198>
                                <p style="line-height: 150%"><FONT size=3>&nbsp;<INPUT id="motherProfession_main" maxLength=20 name="motherProfession_main"></FONT>
                              </TD>
                              <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=79>
                                <p style="line-height: 150%"><FONT size=3>&nbsp;教育程度</FONT>
                              </TD>
                              <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=221>
                                <p style="line-height: 150%">
                                  <FONT size=3>
                                    <LABEL>&nbsp;<INPUT id="motherProfession" value="大专" type=radio name="motherProfession"<? if($resultChinaPatientinfo['motherProfession'] == "大专"){ echo "checked"; } ?>>大专以上</LABEL><BR>
                                    <LABEL>&nbsp;<INPUT id="motherProfession" value="中学" type=radio name="motherProfession"<? if($resultChinaPatientinfo['motherProfession'] == "中学"){ echo "checked"; } ?>>中学(专)</LABEL><BR>
                                    <LABEL>&nbsp;<INPUT id="motherProfession" value="小学" type=radio name="motherProfession"<? if($resultChinaPatientinfo['motherProfession'] == "小学"){ echo "checked"; } ?>>小学</LABEL><br>
                                    <LABEL>&nbsp;<INPUT id="motherProfession" value="不识字" type=radio name="motherProfession"<? if($resultChinaPatientinfo['motherProfession'] == "不识字"){ echo "checked"; } ?>>不识字</LABEL>
                                  </FONT>
                                </p>        
                              </TD>
                            </TR>
                          </TBODY></TABLE></DIV>
                        <DIV align=center>
                        <TABLE border=0 cellSpacing=1 width="100%" id="table61">
                          <TBODY>
                          <TR>
                            <TD
                            style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width="0">
              <p style="line-height: 150%"><FONT size=3>&nbsp;个案家庭情况说明</FONT></TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" colSpan=3>
                              <P align=center style="line-height: 150%"><FONT size=3>
                <TEXTAREA id="descriptionCaseFamily" rows=5 cols=65 name="descriptionCaseFamily" value=""></TEXTAREA></FONT></P></TD></TR>
                          <TR>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width="0">
              <p style="line-height: 150%"><FONT size=3>&nbsp;主要经济/收入来源</FONT></TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width="35%">
              <p style="line-height: 150%"><FONT size=3><INPUT id="mainSourceofIncome" maxLength=26 size=35 name="mainSourceofIncome" value=""></FONT></TD>
                            <TD
                            style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width="13%">
              <p style="line-height: 150%"><FONT
                              size=3>&nbsp;平均年收入</FONT></TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width="32%">
              <p style="line-height: 150%"><FONT size=3>&nbsp;<INPUT id="income" maxLength="20" size="10" name="income" value=""> (人民币)</FONT></TD></TR>
                          <TR>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width="0">
              <p style="line-height: 150%"><FONT size=3>&nbsp;家中固定支出项目<BR>&nbsp;(福利院免填)</FONT></TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width="35%">
              <p style="line-height: 150%"><FONT size=3><LABEL for=fixedExpenditure1>&nbsp;1.
                              <INPUT id="fixedExpenditure" maxLength=30 size=30 name="fixedExpenditure1" value=""></LABEL>
              <BR>
              <LABEL for=fixedExpenditure2>&nbsp;2. 
              <INPUT id="fixedExpenditure" maxLength=30 size=30 name="fixedExpenditure2" value=""></LABEL>
              <BR>
              <LABEL for=fixedExpenditure3>&nbsp;3. 
              <INPUT id="fixedExpenditure" maxLength=30 size=30 name="fixedExpenditure3" value=""></LABEL><BR>
              <LABEL for=fixedExpenditure4>&nbsp;4. 
              <INPUT id="fixedExpenditure" maxLength=30 size=30 name="fixedExpenditure4"></LABEL></FONT></TD>
              <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width="13%">
              <p style="line-height: 150%"><FONT size=3>&nbsp;预估支出</FONT></TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width="32%">
              <p style="line-height: 150%"><FONT size=3>&nbsp;平均每月生活支出 
              <INPUT id="extimatedExpenditures" maxLength="20" size="10" name="extimatedExpenditures" value=""><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          (人民币)</FONT></TD></TR></TBODY></TABLE></DIV></TD></TR></TBODY></TABLE></DIV>
  &nbsp;<div align="center">
          <table border="0" bgcolor="#FFF3DE" cellspacing="1" width="100%" id="table66">
            <tr>
              <td>
                <div align="center">
                  
            <DIV align=center>
              <table border="0" cellspacing="1" width="780">
                <tr>
                  <td>
                    <p align="center">
                      <font size="3">
                        <input id="save0" onClick="return addData('<? echo $nums;  ?>')" type="button" value="新增此患者补助申请表" name="save">      
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input id="close0" onClick="return turnbacke()" type="button" value="回上一页" name="close">
                        </font>
                    </p>
                  </td>
                </tr>
              </table>
            </DIV>
                  <CENTER>
          <p style="line-height: 150%"></p>
          </CENTER></TD></TR></TBODY></TABLE></DIV></FONT></CENTER></TD></TR>
        <TR>
          <TD height=1 width="100%" align=middle>
            <HR color=#c0c0c0 SIZE=1 width="98%">

            <P align=center style="line-height: 150%"><I><FONT size=2>
                <FONT color=#999999 face=Arial>The&nbsp; Web&nbsp; Best&nbsp; Browse&nbsp; Mode
                </FONT><FONT color=#999999>： </FONT>
                <FONT face=Arial>
                    <FONTcolor=#999999>Internet&nbsp; Explorer&nbsp; 6.02 (Or Update)&nbsp;
            /&nbsp; 800 x 600&nbsp; Resolution<BR>Copyright <span lang="zh-tw">©</span>&nbsp;&nbsp;
            </FONT><A href="http://www.nncf.org/" target=_blank><FONT color=#0066cc>Noordhoff&nbsp; Craniofacial&nbsp;
            Foundation</FONT></A></FONT></FONT></I></P></TD></TR></TBODY></TABLE></DIV></TD></TR></TBODY></TABLE></CENTER></DIV>
          <input type="hidden" name="patientID" value="<? echo $seid; ?>">
                <input type="hidden" name="remark" value="">
        <input type="hidden" name="NCFID" value="<? echo $resultChinaPatientinfo['NCFID']; ?>">
                <input type="hidden" name="NCFMedicalNum" value="<? echo $NCFMedicalNums; ?>">
                <input type="hidden" name="num" value="">
                <input type="hidden" name="branch" value="1">
                <input type="hidden" name="serialcode" value="1">
                
                <input type="hidden" id="courses" name="courses" value="<? echo $courses; ?>">

    </form>
        <form name="turnback" enctype="multipart/form-data" method="post" action="rec-sea-list-china-search.php">
      <input type="hidden" name="srhType" value="<? echo $srhType; ?>">
      <input type="hidden" name="srhValue" value="<? echo $srhValue; ?>">
    </form></BODY></HTML>
<?PHP
  }else{
    echo "<Script Language='JavaScript'>";
    echo "alert('抱歉您现在无权限读取,请先登入')\;";
    echo " location.href=\'login.php\'\;";
    echo " </Script>";
  }
?>
