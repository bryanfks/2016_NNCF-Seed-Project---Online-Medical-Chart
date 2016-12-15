<?PHP
  session_cache_limiter("none");
  session_start();
  
  include 'db.php';
     
  $seid = $_SESSION["seid"];
  $sepwd = $_SESSION["sepwd"];
  

  if(!empty($seid) && !empty($sepwd)){
    //制作自动带出NCF编号code
    $get_time = getdate();
    $date_year =  $get_time['year'];  // Year is 4 bits.
    $date = substr($date_year, 2);    // get Year last 2 bits.
    
    $sel_max = "SELECT MAX(NCFID) FROM `patient-china`";
    $query = mysql_query($sel_max);
    $result = mysql_fetch_array($query);
    $maxNums = $result['MAX(NCFID)']; //Get MAX num from China patient's num.
    
    // split no 
    if(!empty($maxNums)){ // If $max !empty than split no
      $now_date = substr($maxNums,2,2); // fetch last 4 bits flow Num..
      $flow_no = substr($maxNums,-4);   // fetch 4 bits flow No.
      if($now_date == $date){
        $flow_no = $flow_no+1;
        if($flow_no <10){
          $flow_no = "000".$flow_no;
        }else if($flow_no <100){
          $flow_no = "00".$flow_no;
        }else if($flow_no <1000){
          $flow_no = "0".$flow_no;
        }else if($flow_no <10000){
          $flow_no = $flow_no;
        }
        $NCFNumX = "CN".$date.$flow_no;
      }else{
        $NCFNumX = "CN".$date."0001"; 
      }
    }else{
      $NCFNumX = "CN".$date."0001";
    }

    
    // NCFNumX is china patient's Number.
    //End of China patient's Num. 
    // Make China patient's Medical Record Number.
    $recordData = "SELECT MAX(NCFMedicalNum) FROM `patientrecord-china` WHERE NCFID='".$NCFNumX."'";
    @$queryRecordData = mysql_query($recordData);
    @$resultRecordData = mysql_fetch_array($queryRecordData);
    $NCFMedicalNum = $resultRecordData["MAX(NCFMedicalNum)"];
    
    // 建立病历表编号
    if(!empty($NCFMedicalNum)){ // If $max !empty than split no
      if($NCFMedicalNum <10){
        $NCFMedicalNumNow = $NCFNumX."0".$NCFMedicalNum;
      }else if($NCFMedicalNum <100){
        $NCFMedicalNumNow = $NCFNumX.$NCFMedicalNum;
      }
    }

    $branch = "1";
    $serialcode = "1";    //暂时以此当作同病患的病历表流水号
    $NCFMedicalNumNow = $NCFNumX.$branch.$serialcode;
    //echo "Num: ".$NCFMedicalNumNow."<br>";
//echo $NCFMedicalNumNow.'<br><br>';



?>
<HTML><HEAD>
            <TITLE>NCF -- Patient Record Online Management System</TITLE>
<META content="text/html; charset=utf-8" http-equiv=Content-Type>
<script language="javascript">
      <!--
        function saveData(opt){
          //alert (opt);
          if(opt == "save"){
            // 警示未填写必要输入项资料
            if(document.china_medical.caseYear.value == ""){
              alert ("请输入 接案日期 年份");
            }else if(document.china_medical.idno.value == ""){
              alert ("请输入 身份证号");
            }else if(document.china_medical.name.value == ""){
              alert ("请输入 个案姓名");
            }else if(document.china_medical.gender.value == ""){
              alert ("请选择 性别");
            }else if(document.china_medical.birthYear.value == ""){
              alert ("请输入 出生年");
            }else if(document.china_medical.address.value == ""){
              alert ("请输入 住址");
            }else if(document.china_medical.height.value == ""){
              alert ("请输入 身高");
            }else if(document.china_medical.weight.value == ""){
              alert ("请输入 体重");
            }else if(document.china_medical.BIHosTimeYear.value == ""){
              alert ("请输入 住院时间-年");
            }else if(document.china_medical.surgeryTimeYear.value == ""){
              alert ("请输入 开刀时间-年");
            }else if(document.china_medical.LHosTimeYear.value == ""){
              alert ("请输入 出院时间-年");
            }else if(document.china_medical.surgeon.value == ""){
              alert ("请输入 外科医师");
            }else if(document.china_medical.Cleft_lip_and_palate_surgery.value == ""){
              alert ("请选择 个案之前是否接受过任何唇颚裂手术？");
            }else {
              document.china_medical.remark.value = "<? echo '1'; ?>";
              document.china_medical.submit();
            }
          }else if(opt == "close"){
            if(document.china_medical.caseYear.value == ""){
              alert ("请输入 接案日期 年份");
            }else if(document.china_medical.idno.value == ""){
              alert ("请输入 身份证号");
            }else if(document.china_medical.name.value == ""){
              alert ("请输入 个案姓名");
            }else if(document.china_medical.gender.value == ""){
              alert ("请选择 性别");
            }else if(document.china_medical.birthYear.value == ""){
              alert ("请输入 出生年");
            }else if(document.china_medical.address.value == ""){
              alert ("请输入 住址");
            }else if(document.china_medical.height.value == ""){
              alert ("请输入 身高");
            }else if(document.china_medical.weight.value == ""){
              alert ("请输入 体重");
            }else if(document.china_medical.BIHosTimeYear.value == ""){
              alert ("请输入 住院时间-年");
            }else if(document.china_medical.surgeryTimeYear.value == ""){
              alert ("请输入 开刀时间-年");
            }else if(document.china_medical.LHosTimeYear.value == ""){
              alert ("请输入 出院时间-年");
            }else if(document.china_medical.surgeon.value == ""){
              alert ("请输入 外科医师");
            }else if(document.china_medical.Cleft_lip_and_palate_surgery.value == ""){
              alert ("请选择 个案之前是否接受过任何唇颚裂手术？");
            }else {
              document.china_medical.remark.value = "<? echo '0'; ?>";
              document.china_medical.submit();
            }
          } else if(opt == "cancelAdd"){
              location.href='for-pla-add-china-search.php';
          }
        }
        
        //-->
    </script>
</HEAD>
<BODY topMargin=2>
<FORM encType=multipart/form-data method=post name=china_medical action="for-pla-add-china-cgmh-save.php">
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
                    <td width="100%" align="center"><font size="3" face="Arial"><?PHP include("/var/www/vhosts/seed-nncf.org/httpdocs/china/top.php"); ?></font></td>
                  </tr>
                  <tr>
                    <td width="100%" align="center"><font size="3" face="Arial"><?PHP include("/var/www/vhosts/seed-nncf.org/httpdocs/china/select.php"); ?></font></td>
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
                                <OPTION value="西安交通大学口腔医院">西安交通大学口腔医院</OPTION>
                                <OPTION value="中国医学科学院北京协和医院">中国医学科学院北京协和医院</OPTION>
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
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=224>&nbsp;</TD></TR></TBODY></TABLE></DIV>
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
							<p style="line-height: 150%"><FONT size=3>&nbsp;病历</FONT>号<FONT
                              size=3>码</FONT></TD>
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
							<INPUT id="gender_male" value="M" type=radio name="gender">男</LABEL> <LABEL><INPUT id="gender_female" value="F" type=radio name="gender">女</LABEL></FONT></TD></TR>
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
						&nbsp;<input id="h2hdistance" type="radio" value="100" name="h2hdistance">少于100公里</label> <label>
						<input id="h2hdistance" type="radio" value="100-200" name="h2hdistance">100-200公里</label> <label>
						<input id="h2hdistance" type="radio" value="200" name="h2hdistance">大于200公里</label></font></TD></TR>
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
                              <FONT size=3>&nbsp;
                                <INPUT id="diagnosis_unilateral_cleft_lip_1" value="UCL" type=checkbox name="diagnosis_unilateral_cleft_lip_1">单侧唇裂 (
                                <INPUT id="diagnosis_unilateral_cleft_lip" value="C" type=radio name="diagnosis_unilateral_cleft_lip">完全性
                                <INPUT id="diagnosis_unilateral_cleft_lip" value="IC" type=radio name="diagnosis_unilateral_cleft_lip">不完全性 
								                <INPUT id="diagnosis_unilateral_cleft_lip" value="CK" type=radio name="diagnosis_unilateral_cleft_lip">隐裂)
                              </FONT></p>
								<p style="line-height: 150%"><FONT size=3>&nbsp;<INPUT id="diagnosis_bilateral_cleft_lip_2" value="BCL" type=checkbox name="diagnosis_bilateral_cleft_lip_2">双侧唇裂 (
                <INPUT id="diagnosis_bilateral_cleft_lip" value="C" type=radio name="diagnosis_bilateral_cleft_lip">完全性
                              <INPUT id="diagnosis_bilateral_cleft_lip" value="IC" type=radio name="diagnosis_bilateral_cleft_lip">不完全性
                              <INPUT id="diagnosis_bilateral_cleft_lip" value="MCK" type=radio name="diagnosis_bilateral_cleft_lip">混合裂
                              )</FONT></p>
                              <P style="line-height: 150%">&nbsp;<FONT size=3><LABEL for=checkbox9><INPUT id="CleftPalate" value="CP" type=checkbox name="CleftPalate"></LABEL>颚裂 － <LABEL for=checkbox11>
								<INPUT id="complete_main" value="IC" type=radio name="complete_main"></LABEL>不完全性 (<LABEL for=checkbox11><INPUT id="incomplete" value="SCC" type=radio name="incomplete"></LABEL>粘膜下裂
                              <LABEL for=checkbox12>
								<INPUT id="incomplete" value="CU" type=radio name="incomplete"></LABEL>悬雍垂裂
                              <LABEL for=checkbox13>
								<INPUT id="incomplete" value="SP" type=radio name="incomplete"></LABEL>软颚裂
                              <INPUT id="incomplete" value="BC" type=radio name="incomplete">双侧裂
                              )<BR>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              － <LABEL for=checkbox11>
								<INPUT id="complete_main" value="C" type=radio name="complete_main"></LABEL> 完全性
                              (<INPUT id="complete" value="U" type=radio name="complete">单侧 
								<INPUT id="complete" value="B" type=radio name="complete">双侧 )</FONT></P>
                              <P style="line-height: 150%"><FONT size=3>&nbsp;<INPUT id="beforeSurgery_23" value="BoneGraft" type=checkbox name="BoneGraft_main">牙槽突裂 (
                              <INPUT id="BoneGraft_select" value="C" type=radio name="BoneGraft_select">完全性 
								              <INPUT id="BoneGraft_select" value="IC" type=radio name="BoneGraft_select">不完全性 
								              <INPUT id="BoneGraft_select" value="CK" type=radio name="BoneGraft_select">隐裂 )</FONT></P>
                              <P style="line-height: 150%"><FONT size=3>&nbsp;<INPUT id="Combined_with_other_craniofacial_disorders" value="Other" type=checkbox name="Combined_with_other_craniofacial_disorders">合并其它颅颜病症
								：<INPUT id="Combined_with_other_craniofacial_disorders_text" maxLength=30 size=50 name="Combined_with_other_craniofacial_disorders_text"></FONT></P></TD></TR></TBODY></TABLE></DIV>
                        <DIV align=center>
                        <TABLE border=0 cellSpacing=1 width="100%" id="table65">
                          <TBODY>
                          <TR>
                            <TD
                            style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid">
							<p style="line-height: 150%"><FONT
                              size=3>*个案之前是否接受过任何唇颚裂治疗？</FONT></p>
                              <P style="line-height: 150%">&nbsp;<FONT size=3><LABEL><INPUT id="Cleft_lip_and_palate_surgery" value="Y" type=radio name="Cleft_lip_and_palate_surgery">是</LABEL></FONT></P>
                              <P style="line-height: 150%"><FONT size=3>&nbsp;&nbsp;&nbsp;&nbsp;
								<LABEL>
								<INPUT id="beforeSurgery_1" value="1LNR" type=checkbox name="beforeSurgery_1">一期唇鼻修复</LABEL> <LABEL>
								<INPUT id="beforeSurgery_2" value="1BLANR" type=checkbox name="beforeSurgery_2">一期双侧唇鼻修复</LABEL> <LABEL>
								<INPUT id="beforeSurgery_3" value="1CPR" type=checkbox name="beforeSurgery_3">一期颚裂修复</LABEL> <LABEL>
								<INPUT id="beforeSurgery_4" value="FHR" type=checkbox name="beforeSurgery_4">廔孔修复</LABEL> <LABEL>
								<INPUT id="beforeSurgery_5" value="PF" type=checkbox name="beforeSurgery_5">咽瓣修复</LABEL> <LABEL>
								<INPUT id="beforeSurgery_6" value="PBR" type=checkbox name="beforeSurgery_6">梨骨瓣修复</LABEL></FONT></P>
                              <P style="line-height: 150%"><FONT size=3>&nbsp;&nbsp;&nbsp;&nbsp; 
								<INPUT id="beforeSurgery_7" value="2CPR" type=checkbox name="beforeSurgery_7">二期颚裂(颚咽)修复 
								<INPUT id="beforeSurgery_8" value="LR" type=checkbox name="beforeSurgery_8">唇鼻整形 
								<INPUT id="beforeSurgery_9" value="AB" type=checkbox name="beforeSurgery_9">齿槽植骨 
								<INPUT id="beforeSurgery_10" value="PO" type=checkbox name="beforeSurgery_10">术前正畸 
								<INPUT id="beforeSurgery_11" value="SL" type=checkbox name="beforeSurgery_11">语言治疗</FONT></P>
                              <P style="line-height: 150%"><FONT size=3>&nbsp;&nbsp;&nbsp;&nbsp; 
								<INPUT id="beforeSurgery_other" value="other" type=checkbox name="beforeSurgery_other">其它，请详述：
                <INPUT id="beforeSurgery_other_reason" maxLength=60 size=60 name="beforeSurgery_other_reason"></FONT></P>
                <P style="line-height: 150%"><LABEL><FONT size=3>&nbsp;
                <INPUT id="Cleft_lip_and_palate_surgery" value="N" type=radio name="Cleft_lip_and_palate_surgery">否</FONT></LABEL></P></TD></TR></TBODY></TABLE></DIV>
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
                                <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=83>
                                  <p style="line-height: 150%"><FONT size=3>&nbsp;家庭成员</FONT>
                                </TD>
                                <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=669 colSpan=5>
                                  <p style="line-height: 150%"><FONT size=3>&nbsp;共 <INPUT id="familyMembers" maxLength=3 size=4 name="familyMembers" value=""> 人；同住 
                                  <INPUT id="live_together" maxLength=3 size=4 name="live_together" value=""> 人</FONT>
                                </TD>
                              </TR>
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
                                        <LABEL>&nbsp;<INPUT id="Cleft_lip_and_palate_surgery" value="大专" type=radio name="fatherProfession">大专以上</LABEL><BR>
                                        <LABEL>&nbsp;<INPUT id="Cleft_lip_and_palate_surgery" value="中学" type=radio name="fatherProfession">中学(专)</LABEL><BR>
                                        <LABEL>&nbsp;<INPUT id="Cleft_lip_and_palate_surgery" value="小学" type=radio name="fatherProfession">小学</LABEL><br>
                                        <INPUT id="Cleft_lip_and_palate_surgery" value="不识字" type=radio name="fatherProfession">不识字</LABEL>
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
                                <p style="line-height: 150%"><FONT size=3>&nbsp;<INPUT id="fatherProfession_main" maxLength=20 name="motherProfession_main"></FONT>
                              </TD>
                              <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=79>
                                <p style="line-height: 150%"><FONT size=3>&nbsp;教育程度</FONT>
                              </TD>
                              <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=221>
                                <p style="line-height: 150%">
                                  <FONT size=3>
                                    <LABEL>&nbsp;<INPUT id="Cleft_lip_and_palate_surgery" value="大专" type=radio name="motherProfession">大专以上</LABEL><BR>
                                    <LABEL>&nbsp;<INPUT id="Cleft_lip_and_palate_surgery" value="中学" type=radio name="motherProfession">中学(专)</LABEL><BR>
                                    <LABEL>&nbsp;<INPUT id="Cleft_lip_and_palate_surgery" value="小学" type=radio name="motherProfession">小学</LABEL><br>
                                    <LABEL>&nbsp;<INPUT id="Cleft_lip_and_palate_surgery" value="不识字" type=radio name="motherProfession">不识字</LABEL>
                                  </FONT>
                                </p>        
                              </TD>
                            </TR>
                          </TBODY>
                        </TABLE>
                      </DIV>

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
          <table border="1" bgcolor="#FFF3DE" cellspacing="1" width="100%" id="table66">
            <tr>
              <td>
                <div align="center">
                  <table border="0" bgcolor="#FFF3DE" cellspacing="1" width="100%" id="table67">
                    <tr>
                      <td style="border-style: solid; border-width: 1" height="30">
						<p style="line-height: 150%"><i><b>
						<font size="4">&nbsp;手术医疗情况</font></b></i></td>
                    </tr>
                  </table>
                </div>
                <div align="center">
                  <table border="0" cellspacing="1" width="738" id="table68">
                    <!-- MSTableType="nolayout" -->
					<tr>
                      <font size="3">
                      <td style="border-style: solid; border-width: 1" width="88">
						            <p style="line-height: 150%"><font size="3">*住院时间</font>
                      </td>
                      <td style="border-style: solid; border-width: 1" width="250">
						            <p style="line-height: 150%">
                          <font size="3">&nbsp;<input id="BIHosTimeYear" maxLength="4" size="5" name="BIHosTimeYear" value=""> 年
                          <input id="BIHosTimeMonth" maxLength="2" size="3" name="BIHosTimeMonth" value=""> 月
                          <input id="BIHosTimeDay" maxLength="2" size="3" name="BIHosTimeDay" value=""> 日</font></td>
                      <td style="border-style: solid; border-width: 1" colspan="2">
						            <p style="line-height: 150%"><font size="3">*开刀时间</font></td>
                      <td style="border-style: solid; border-width: 1" width="268">
						            <p style="line-height: 150%">
                        <font size="3">&nbsp;<input id="surgeryTimeYear" maxLength="4" size="5" name="surgeryTimeYear" value=""> 年
                          <input id="surgeryTimeMonth" maxLength="2" size="3" name="surgeryTimeMonth" value=""> 月
                          <input id="surgeryTimeDay" maxLength="2" size="3" name="surgeryTimeDay" value=""> 日</font></td>
	</font>
                    </tr>
                    <tr>
                      <td style="border-style: solid; border-width: 1" width="88">
						<p style="line-height: 150%"><font size="3">*出院时间</font></td>
                      <td style="border-style: solid; border-width: 1" width="250">
						<p style="line-height: 150%">
            <font size="3">&nbsp;<input id="LHosTimeYear" maxLength="4" size="5" name="LHosTimeYear" value=""> 年
                          <input id="LHosTimeMonth" maxLength="2" size="3" name="LHosTimeMonth" value=""> 月
                          <input id="LHosTimeDay" maxLength="2" size="3" name="LHosTimeDay" value=""> 日</font></td>
                      <td style="border-style: solid; border-width: 1" colspan="2">
    					<p style="line-height: 150%"><font size="3">&nbsp;麻醉方法</font></td>
                      <td style="border-style: solid; border-width: 1" width="268">
						<p style="line-height: 150%"><font size="3">
						<label>&nbsp;<input id="Anesthesia2" value="GA" type="radio" name="Anesthesia">全身麻醉 
						<input id="Anesthesia" value="LA" type="radio" name="Anesthesia">局部麻醉</label></font></td>

                    </tr>

                    <tr>
                      <font size="3">
                      <td style="border-style: solid; border-width: 1" width="88">
						<p style="line-height: 150%"><font size="3">*外科医师</font></td>
                      <td style="border-style: solid; border-width: 1" width="250">
						<p style="line-height: 150%"><font size="3">&nbsp;<input id="surgeon" maxLength="4" size="23" name="surgeon" value=""></font></td>
                      <td style="border-style: solid; border-width: 1" colspan="2">
						<p style="line-height: 150%"><font size="3">&nbsp;麻醉科医师</font></td>
                      <td style="border-style: solid; border-width: 1" width="268">
						<p style="line-height: 150%"><font size="3">
						&nbsp;<input id="anesthesiologist" maxLength="4" size="23" name="anesthesiologist" value=""></font></td>
	</font>
                    </tr>
                    <tr>
                      <td style="border-style: solid; border-width: 1" width="88">
						<p style="line-height: 150%">
						<font size="3">&nbsp;手术类型</font></td>

                      <td style="border-style: solid; border-width: 1" colspan="4">
						<font size="3">
						<p style="line-height: 150%">&nbsp;<input id="surgeryType1" value="M1LNR" type="checkbox" name="surgeryType1">一期单侧唇鼻修复 
						<input id="surgeryType2" value="M1BLANR" type="checkbox" name="surgeryType2">一期双侧唇鼻修复 
						<input id="surgeryType3" value="M1CPR" type="checkbox" name="surgeryType3">一期颚裂修复 
						<input id="surgeryType4" value="MFHR" type="checkbox" name="surgeryType4">廔孔修复</p>
						<p style="line-height: 150%">
						&nbsp;<input id="surgeryType5" value="M2CPR" type="checkbox" name="surgeryType5">二期颚裂(颚咽)修复 
						<input id="surgeryType6" value="MLR" type="checkbox" name="surgeryType6">唇鼻整形 
						<input id="surgeryType7" value="MAB" type="checkbox" name="surgeryType7">齿槽植骨 
						<input id="surgeryType8" value="MPF" type="checkbox" name="surgeryType8">咽瓣修复 
						<input id="surgeryType9" value="MPBR" type="checkbox" name="surgeryType9">梨骨瓣修复</p>
						<p style="line-height: 150%">&nbsp;<input id="surgeryType10" value="MOTH" type="checkbox" name="surgeryType10">
            其他：<input id="surgeryTypeOther_text1" maxLength="20" name="surgeryTypeOther_text" size="30" value=""></font></td>

                    </tr>

                    <tr>

                      <FONT
            size=3>

                      <td style="border-style: solid; border-width: 1" rowspan="4" width="88"><FONT
            size=3>
						<p style="line-height: 150%">&nbsp;修补类型</td>

                      <td style="border-style: solid; border-width: 1" colspan="4">
						<font size="3">
						<p style="line-height: 150%">&nbsp;单侧唇裂：</p>
						<p style="line-height: 150%"><label>&nbsp;&nbsp;
						<input id="repairTypeUnilateralcleftlip1" value="Rotation-AdvancementVariant" type="radio" name="repairTypeUnilateralcleftlip" value="">Rotation-Advancement 
						Variant</label> <label>
						<input id="repairTypeUnilateralcleftlip2" value="TriangularVariant" type="radio" name="repairTypeUnilateralcleftlip" value="">Triangular 
						Variant</label> <label>
						<input id="repairTypeUnilateralcleftlip3" value="Mohler" type="radio" name="repairTypeUnilateralcleftlip" value="">Mohler</label></p>
						<p style="line-height: 150%"><label>&nbsp;&nbsp;
						<input id="repairTypeUnilateralcleftlip4" value="Others" type="radio" name="repairTypeUnilateralcleftlip" value="">Others：</label><input id="repairTypeUnilateralcleftlip_text" name="repairTypeUnilateralcleftlip_text" size="30" value=""></font></td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1" colspan="4">
						<font size="3">
						<p style="line-height: 150%">&nbsp;双侧唇裂：</p>
						<p style="line-height: 150%">&nbsp;&nbsp;
						<input id="repairTypeBilateralcleftlip5" value="StraightLine" type="radio" name="repairTypeBilateralcleftlip" value="">Straight 
						Line
						<input id="repairTypeBilateralcleftlip6" value="ForkedFlap" type="radio" name="repairTypeBilateralcleftlip" value="">Forked 
						Flap
						<input id="repairTypeBilateralcleftlip7" value="Others" type="radio" name="repairTypeBilateralcleftlip" value="">Others：<input id="repairTypeBilateralcleftlip_text" maxLength="20" name="repairTypeBilateralcleftlip_text" size="30" value=""></font></td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1" colspan="4">
						<font size="3">
						<p style="line-height: 150%">&nbsp;颚裂：</p>
						<p style="line-height: 150%">&nbsp; &nbsp;<input id="repairTypeCleftpalate" value="LangenbeckVariant" type="radio" name="repairTypeCleftpalate">Langenbeck 
						Variant
						<input id="repairTypeCleftpalate8" value="PushbackVariant" type="radio" name="repairTypeCleftpalate">Pushback 
						Variant
						<input id="repairTypeCleftpalate9" value="Furlow" type="radio" name="repairTypeCleftpalate">Furlow
						<input id="repairTypeCleftpalate10" value="PF" type="radio" name="repairTypeCleftpalate">PF
						<input id="repairTypeCleftpalate11" value="FurlowPF" type="radio" name="repairTypeCleftpalate">Furlow+PF</p>
						<p style="line-height: 150%">&nbsp;&nbsp;
						<input id="repairTypeCleftpalate11" value="Others" type="radio" name="repairTypeCleftpalate">Others：<input id="repairTypeCleftpalate_text" maxLength="20" name="repairTypeCleftpalate_text" size="30" value=""></font></td>

                    </tr>

                    <tr>

                   <td style="border-style: solid; border-width: 1" colspan="4">
						<font size="3">
						<p style="line-height: 150%">&nbsp;牙槽突裂：</p>
						<p style="line-height: 150%">&nbsp; &nbsp;<input id="BoneGraft" value="BoneGraft" type="radio" name="BoneGraft">Bone 
						Graft</font></td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1" rowspan="3" width="88"><FONT
            size=3>
						<p style="line-height: 150%">&nbsp;个案照片</td>

                      <td style="border-style: solid; border-width: 1" colspan="2"><FONT size=3>
						<p style="line-height: 150%" align="center"><b>〔手术前〕</b><br>
						拍照日：<input id="beforeSurgeryYear1" maxLength="4" size="4" name="beforeSurgeryYear1" value=""> 年
                  <input id="beforeSurgeryMonth1" maxLength="2" size="2" name="beforeSurgeryMonth1" value=""> 月
                  <input id="beforeSurgeryDay1" maxLength="2" size="2" name="beforeSurgeryDay1" value=""> 日</p>
						<p align="center" style="line-height: 150%">

						<img height="265" alt="Pedigree" src="user-pic.jpg" width="300" border="0"><p align="center" style="line-height: 150%">
						<input type="file" size="25" name="pedigree_graphics1" value=""></td>

                      <td style="border-style: solid; border-width: 1" colspan="2"><FONT size=3>
						<p style="line-height: 150%" align="center"><b>〔手术前〕<br>
						</b>拍照日：<input id="beforeSurgeryYear2" maxLength="4" size="4" name="beforeSurgeryYear2" value=""> 年
                      <input id="beforeSurgeryMonth2" maxLength="2" size="2" name="beforeSurgeryMonth2" value=""> 月
                      <input id="beforeSurgeryDay2" maxLength="2" size="2" name="beforeSurgeryDay2" value=""> 日</p>
						<p align="center" style="line-height: 150%">

						<img height="265" alt="Pedigree" src="user-pic.jpg" width="300" border="0"><p align="center" style="line-height: 150%">
						<input type="file" size="25" name="pedigree_graphics2" value=""></td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1" colspan="2"><FONT
            size=3>
						<p style="line-height: 150%" align="center">&nbsp;<b>〔手术后〕</b><br>
						拍照日：<input id="afterSurgeryYear1" maxLength="4" size="4" name="afterSurgeryYear1" value=""> 年
                  <input id="afterSurgeryMonth1" maxLength="2" size="2" name="afterSurgeryMonth1" value=""> 月
                  <input id="afterSurgeryDay1" maxLength="2" size="2" name="afterSurgeryDay1" value=""> 日</p>
						<p align="center" style="line-height: 150%">

						<img height="265" alt="Pedigree" src="user-pic.jpg" width="300" border="0"><p align="center" style="line-height: 150%">
						<input type="file" size="25" name="pedigree_graphics3"></td>

                      <td style="border-style: solid; border-width: 1" colspan="2"><FONT
            size=3>
						<p style="line-height: 150%" align="center">&nbsp;<b>〔手术后〕</b><br>
						拍照日：<input id="afterSurgeryYear2" maxLength="4" size="4" name="afterSurgeryYear2" value=""> 年
                  <input id="afterSurgeryMonth2" maxLength="2" size="2" name="afterSurgeryMonth2" value=""> 月
                  <input id="afterSurgeryDay2" maxLength="2" size="2" name="afterSurgeryDay2" value=""> 日</p>
						<p align="center" style="line-height: 150%">

						<img height="265" alt="Pedigree" src="user-pic.jpg" width="300" border="0"><p align="center" style="line-height: 150%">
						<input type="file" size="25" name="pedigree_graphics4"></td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1" colspan="4"><FONT
            size=3>
						<p style="line-height: 150%" align="center"><b>〔手术后〕</b><br>
						拍照日：<input id="afterSurgeryYear3" maxLength="4" size="4" name="afterSurgeryYear3" value=""> 年
                  <input id="afterSurgeryMonth3" maxLength="2" size="2" name="afterSurgeryMonth3" value=""> 月
                  <input id="afterSurgeryDay3" maxLength="2" size="2" name="afterSurgeryDay3" value=""> 日</p>
						<p align="center" style="line-height: 150%">

						<img height="265" alt="Pedigree" src="user-pic.jpg" width="300" border="0"><p align="center" style="line-height: 150%">
						<input type="file" size="25" name="pedigree_graphics5"></td>

                    </tr>

                    </table>

                <div align="center">

                  <table border="1" bgcolor="#FFF3DE" width="100%">
					<tr>
						<td width="136">
						<p style="line-height: 150%"><font size="3">&nbsp;社会资源使用情形</font></td>
						<td><font size="3">
						<p style="line-height: 150%">&nbsp;<input id="usageofSocialResources" value="Y" type="radio" name="usageofSocialResources">有</p>
						<p style="line-height: 150%">
						&nbsp;&nbsp;&nbsp;&nbsp; 医疗补助：<input id="smileTrain" value="1" maxLength="20" type="checkbox" name="smileTrain">微笑列车，项目 
						<input id="MSitem" name="MSitem" size="43" value="">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input id="MSOther" value="1" type="checkbox" name="MSOther">其他：<input id="MSOther_text" maxLength="20" size="54" name="MSOther_text" value=""></p>
						<p style="line-height: 150%">&nbsp;&nbsp;&nbsp;&nbsp; 生活补助：单位 － 
						<input id="LAunit" name="LAunit" value=""> 项目 
						－ <input id="LAitem" maxLength="20" name="LAitem" value=""></p>
						<p style="line-height: 150%">&nbsp;&nbsp;&nbsp;&nbsp; 其他补助：单位 － 
						<input id="OAunit" maxLength="20" name="OAunit" value=""> 项目 － 
						<input id="OAitem" maxLength="20" name="OAitem" value=""></p>
						<p style="line-height: 150%">&nbsp;<input id="usageofSocialResources" value="N" type="radio" name="usageofSocialResources" value="">无</font></td>
					</tr>
					</table>

                </div>

                </div>

                </td>

            </tr>

          </table>

        </div>
          &nbsp;<table border="1" bgcolor="#FFF3DE" cellspacing="1" width="100%" id="table50">
            <tr>
              <td>
                <div align="center">
                  <table border="0" cellspacing="1" width="100%" id="table51">
                    <tr>
                      <td style="border-style: solid; border-width: 1" width="469">
                          <FONT size=3>
						<p style="line-height: 150%"><i>
						<strong><font size="4">&nbsp;申请补助项目<br>
						【&#39035;&#26816;具&#21307;&#30103;收据复印件、&#36153;用明&#32454;表复印件】</font></strong></i></td>
                      <td style="border-style: solid; border-width: 1">
                        <p style="line-height: 150%">
                            <FONT size=3>&nbsp;NCF补助编号：</td>
                    </tr>
                  </table>
                </div>
                <div align="center">
                  <table border="0" cellspacing="1" width="100%" id="table52">
                    <tr>
                      <td style="border-style: solid; border-width: 1" width="469" valign="top">
					<FONT size=3>
                          <p style="line-height: 150%">
                          &nbsp;<input id="subsidiesforMedicalExpenses" type="checkbox" value="1" name="subsidiesforMedicalExpenses"><strong>&#21307;&#30103;&#36153;&#34917;助：</strong></p>
							<p style="line-height: 150%">&nbsp;&nbsp;&#21307;&#30103;&#36153;用&#24635;&#35745;：人民&#24065; 
							<input id="TotalSFME" maxLength="10" size="5" name="TotalSFME" value=""> 元</p>
							<p style="line-height: 150%">&nbsp; 1.申请NCF&#34917;助：人民&#24065;
							<input id="NCFAllowance" maxLength="10" size="5" name="NCFAllowance" value=""> 元，占&#21307;&#30103;&#36153;用&#24635;金&#39069;&nbsp;
              <input id="NCFProportion" maxLength="10" size="3" name="NCFProportion" value=""> 
							%</p>
							<p style="line-height: 150%">&nbsp; 2.案家自付：人民&#24065;
							<input id="PatientPay" maxLength="6" size="3" name="PatientPay"> 元，占&#21307;&#30103;&#36153;用&#24635;金&#39069;
                          <input id="PatientProportion" maxLength="10" size="3" name="PatientProportion" value=""> 
							%</p>
                      </td>
                     <td style="border-style: solid; border-width: 1" valign="top">
                          <FONT size=3>
							<p style="line-height: 150%">
                          <strong>&nbsp;<input id="transportationSubsidies" type="checkbox" value="1" name="transportationSubsidies">交通费补助：</strong></p>
							<p style="line-height: 150%">&nbsp;&nbsp;1.申请NCF&#34917;助：人民&#24065;
							<input id="NCFSOT" maxLength="10" size="5" name="NCFSOT" value=""> 元</p>
							<p style="line-height: 150%">&nbsp;&nbsp;2.案家自付：人民&#24065;
							<input id="PatientSOT" maxLength="10" size="5" name="PatientSOT" value=""> 元</p>
                      </td>
                    </tr>
                  </table>
                </div>
                <div align="center">
                  <table border="0" cellspacing="1" width="100%" id="table53">
                    <tr>
					<FONT size=3>
                      <td style="border-style: solid; border-width: 1" height="50">
                        <p align="center" style="line-height: 150%"><strong><font size="4">申&#35831;NCF&#34917;助&#36153;用&#24635;金&#39069;&#20026;：人民&#24065;<font size="3"> 
						<input id="NCFTotalSubsidies" maxLength="10" size="6" name="NCFTotalSubsidies" value=""> </font>元</font></strong></td>
                    </tr>
					</FONT>
                  </table>
                </div>
					<FONT size=3>
                <div align="center">
                  <table border="0" cellspacing="1" width="100%" id="table54">
                    <tr>
                      <td style="border-style: solid; border-width: 1">
						<p align="center" style="line-height: 150%">
						<strong>上传其它资料</strong><FONT size=3><strong>【</strong></font><strong>注：病患签名处的补助凭证或其他票据在此上传</strong><FONT size=3><strong>】</strong></font></p>
						<p align="center" style="line-height: 150%">
						附<font size="3">件一：<br>
						<input type="file" size="25" name="pedigree_graphics_other1"></font></p>
						<p align="center" style="line-height: 150%">
					<FONT size=3>
						附件二：<br>
						<input type="file" size="25" name="pedigree_graphics_other2"></font></p>
						<p align="center" style="line-height: 150%">
					<FONT size=3>
						附件三：<br>
						<input type="file" size="25" name="pedigree_graphics_other3"></font></p>
						<p align="center" style="line-height: 150%">
					<FONT size=3>
						附件四：<br>
						<input type="file" size="25" name="pedigree_graphics_other4"></font></p>
						<p align="center" style="line-height: 150%">
					<FONT size=3>
						附件五：<br>
						<input type="file" size="25" name="pedigree_graphics_other5"></p>
						<p align="center" style="line-height: 150%">
						&nbsp;</p>
                      </td>
                    </tr>
                    </table>
                </div>
              </td>
            </tr>
          </table>
            <DIV align=center>
                <TABLE border=0 cellSpacing=1 width="100%" id="table36">
                    <TBODY>
                        <TR>
                            <TD>
                                <P align=center style="line-height: 150%">
                                    <FONT size=3>
                                        <INPUT id=save0 onclick="return saveData('save')" value=储存 type=button name=save>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <INPUT id=close0 onclick="return saveData('cancelAdd')" value=取消 type=button name=close>
                                    </FONT>
                                </P>
                            </TD>
                        </TR>
                    </TBODY>
                </TABLE>
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
                    <FONT color=#999999>Internet&nbsp; Explorer&nbsp; 6.02 (Or Update)&nbsp;/&nbsp; 800 x 600&nbsp; Resolution<BR>Copyright 
                    <span lang="zh-tw">©</span>&nbsp;&nbsp;
            </FONT><A href="http://www.nncf.org/" target=_blank><FONT color=#0066cc>Noordhoff&nbsp; Craniofacial&nbsp;Foundation</FONT></A>
            </FONT></FONT></I></P></TD></TR></TBODY></TABLE></DIV></TD></TR></TBODY></TABLE></CENTER></DIV>
              <input type="hidden" name="patientID" value="<? echo $seid; ?>">
              <input type="hidden" name="remark" value="">
              <input type="hidden" name="NCFID" value="<? echo $NCFNumX; ?>">
              <input type="hidden" name="NCFMedicalNum" value="<? echo $NCFMedicalNumNow; ?>">
              <input type="hidden" name="branch" value="1">
              <input type="hidden" name="serialcode" value="1">
            </FORM></BODY></HTML>
<?PHP
  }else{
    echo "<Script Language='JavaScript'>";
    echo "alert('抱歉您现在无权限读取,请先登入')\;";
    echo " location.href=\'login.php\'\;";
    echo " </Script>";
  }
?>

