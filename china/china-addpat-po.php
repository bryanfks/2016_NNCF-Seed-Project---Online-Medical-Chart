﻿<?PHP
    @session_start();

    include 'db.php';

    $seid = $_SESSION["seid"];
    $sepwd = $_SESSION["sepwd"];

    if( (!empty($seid)) && (!empty($sepwd)) ){
     
    //制作NCF编号
    $get_time = getdate();
    $date_year =  $get_time['year'];  // Year is 4 bits.
    $date = substr($date_year, 2);    // get Year last 2 bits.
    
    $sel_max = "SELECT MAX(NCFID) AS `NCFID` FROM `patient-china`";
    $query = mysql_query($sel_max);
    $result = mysql_fetch_array($query);
    $maxNums = $result['NCFID'];  //Get MAX num from China patient's num.

    if(!empty($maxNums)){ // If $max !empty than split no
      $no_date = substr($maxNums,2,2);  // fetch last 4 bits flow Num..
      $flow_no = substr($maxNums,-4);   // fetch 4 bits flow No.
      
      if($no_date = $date){
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
    // NCFNumX is china patient's NCFID. is NCF個案編號    
    
      // 新術前正畸病患編號
      $branch = "2";
      $serialcode = "1";    //暂时以此当作同病患的病历表流水号
      $NCFMedicalNum = $NCFNumX.$branch.$serialcode;
      //echo $NCFMedicalNum."<br>";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<!-- saved from url=(0057)http://www.seed-nncf.org/china/for-pla-add-china-cgmh.php -->
<HTML>
	<HEAD>
    	<TITLE>NCF -- Patient Record Online Management System</TITLE>
		<META content="text/html; charset=utf-8" http-equiv=Content-Type>
		<SCRIPT language=javascript>
			<!--
				function saveData(opt){
          //alert(opt);
          //alert(document.china_medical.caseYear.value);
          if(opt == "save"){
            // 警示未填写必要输入项资料
            if(document.china_medical.caseYear.value == ""){
              alert ("请输入 接案日期 年份");
            }else if(document.china_medical.caseMonth.value == ""){
              alert ("请输入 接案日期 月份");
            }else if(document.china_medical.caseDay.value == ""){
              alert ("请输入 接案日期 日份");
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
              alert ("请输入 初诊时间-年");
            }else if(document.china_medical.BIHosTimeMonth.value == ""){
              alert ("请输入 初诊时间-月");
            }else if(document.china_medical.BIHosTimeDay.value == ""){
              alert ("请输入 初诊时间-日");
            }else if(document.china_medical.surgeryTimeYear.value == ""){
              alert ("请输入 治疗结束时间-年");
            }else if(document.china_medical.surgeryTimeMonth.value == ""){
              alert ("请输入 治疗结束时间-月");
            }else if(document.china_medical.surgeryTimeDay.value == ""){
              alert ("请输入 治疗结束时间-日");
            }else if(document.china_medical.LHosTimeYear.value == ""){
              alert ("请输入 治疗开始时间-年");
            }else if(document.china_medical.LHosTimeMonth.value == ""){
              alert ("请输入 治疗开始时间-月");
            }else if(document.china_medical.LHosTimeDay.value == ""){
              alert ("请输入 治疗开始时间-日");
            }else if(document.china_medical.surgeon.value == ""){
              alert ("请输入 外科医师");
            }else if((!(document.getElementById('diagnosis_unilateral_cleft_lip_1').checked)) && (!(document.getElementById('diagnosis_bilateral_cleft_lip_2').checked)) && (!(document.getElementById('CleftPalate').checked)) && (!(document.getElementById('BoneGraft_main').checked)) && (!(document.getElementById('Combined_with_other_craniofacial_disorders').checked))){
              alert ("请选择 主诊断(医学专有名词)");
            }else if(document.china_medical.Cleft_lip_and_palate_surgery.value == ""){
              alert ("请选择 个案之前是否接受过任何唇颚裂手术？");
            }else{
              document.china_medical.remark.value = "1";
              document.china_medical.submit();
            }
          }else if(opt == "close"){
            if(document.china_medical.caseYear.value == ""){
              alert ("请输入 接案日期 年份");
            }else if(document.china_medical.caseMonth.value == ""){
              alert ("请输入 接案日期 月份");
            }else if(document.china_medical.caseDay.value == ""){
              alert ("请输入 接案日期 日份");
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
              alert ("请输入 初诊时间-年");
            }else if(document.china_medical.BIHosTimeMonth.value == ""){
              alert ("请输入 初诊时间-月");
            }else if(document.china_medical.BIHosTimeDay.value == ""){
              alert ("请输入 初诊时间-日");
            }else if(document.china_medical.surgeryTimeYear.value == ""){
              alert ("请输入 治疗结束时间-年");
            }else if(document.china_medical.surgeryTimeMonth.value == ""){
              alert ("请输入 治疗结束时间-月");
            }else if(document.china_medical.surgeryTimeDay.value == ""){
              alert ("请输入 治疗结束时间-日");
            }else if(document.china_medical.LHosTimeYear.value == ""){
              alert ("请输入 治疗开始时间-年");
            }else if(document.china_medical.LHosTimeMonth.value == ""){
              alert ("请输入 治疗开始时间-月");
            }else if(document.china_medical.LHosTimeDay.value == ""){
              alert ("请输入 治疗开始时间-日");
            }else if(document.china_medical.surgeon.value == ""){
              alert ("请输入 外科医师");
            }else if((!(document.getElementById('diagnosis_unilateral_cleft_lip_1').checked)) && (!(document.getElementById('diagnosis_bilateral_cleft_lip_2').checked)) && (!(document.getElementById('CleftPalate').checked)) && (!(document.getElementById('BoneGraft_main').checked)) && (!(document.getElementById('Combined_with_other_craniofacial_disorders').checked))){
              alert ("请选择 主诊断(医学专有名词)");
            }else if(document.china_medical.Cleft_lip_and_palate_surgery.value == ""){
              alert ("请选择 个案之前是否接受过任何唇颚裂手术？");
            }else {
              document.china_medical.remark.value = "1";
              document.china_medical.submit();
            }
          } else if(opt == "cancelAdd"){
              location.href='searchList.php?c=2';
          }
        }
				
				//-->
		</SCRIPT>
</HEAD>
<BODY topMargin=2>
<FORM encType=multipart/form-data method=post name="china_medical" action="china-addpat-po-save.php">
<DIV align=center>
<CENTER>
<TABLE border=0 cellSpacing=0 cellPadding=0 width=750 id="table11">
  <TBODY>
  <TR>
    <TD width="100%">
      <DIV align=center>
      <TABLE
      style="BORDER-BOTTOM: 2px solid; BORDER-LEFT: 2px solid; BORDER-TOP: 2px solid; BORDER-RIGHT: 2px solid"
      border=0 cellSpacing=0 cellPadding=0 width="100%" height=1 id="table12">
        <TBODY>
        <TR>
          <TD bgColor=#fff3de height=300 width="100%" align=middle><FONT
            size=3>
            <DIV align=center>
            <CENTER>
            <TABLE border=0 cellSpacing=0 cellPadding=0 width="100%" id="table13">
              <TBODY>
              <TR>
                <TD align=left>
                  <DIV align=center>
                  <TABLE border=1 cellSpacing=0 cellPadding=0 width="100%"
                  bgColor=#ff9966 height=50 id="table14">
                    <TBODY>
                    <tr bgcolor="#FFFFFF">
                        <td align="center"><font size="2" face="Arial"><?PHP include("../china/top2.php"); ?></font></td>
                      </tr>
                      <tr bgcolor="#C0C0C0">
                        <td align="center"><font size="2" face="Arial"><?PHP include("../china/select2.php"); ?></font></td>
                      </tr>
                    <TR>
                      <TD>
                        <P align=center style="line-height: 150%"><FONT color=#000000 size=4><I><B>
                        <SPAN>
                          <SELECT size=1 name="school">
                            <OPTION selected>请选择医院</OPTION> 
                            <OPTION value="西安交通大学口腔医院">西安交通大学口腔医院</OPTION>
                            <OPTION value="中国医学科学院北京协和医院">中国医学科学院北京协和医院</OPTION>
                          </SELECT>
                        </SPAN></B></I></FONT></FONT>
                        <SPAN><b><i><font color="#000000" size="4">清寒唇颚裂患者补助申请表（</font></i></b></SPAN>
                        <FONT size=3><SPAN<b><i><font color="#000000" size="4">术前正畸</font></i></b></SPAN></FONT>
                        <SPAN><b><i><font color="#000000" size="4">）</font></i></b></SPAN></P></TD></TR></TBODY></TABLE></DIV>
					<p style="line-height: 150%">
					<font color="#FF0000">&nbsp;※有 * 注记为必填</font>
					<FONT size=3>
            <DIV align=center>
              <TABLE border=1 cellSpacing=1 width="100%" id="table15">
                <TBODY>
                  <TR>
                    <TD>
                      <DIV align=center>
                        <TABLE border=0 cellSpacing=1 width="100%" id="table16">
                          <TBODY>
                          <TR>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=91>
							                 <p style="line-height: 150%"><FONT size=3>*接案日期</FONT>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=311>
							                 <p style="line-height: 150%">
                                <FONT size=3>&nbsp;<INPUT id="caseYear" maxLength=4 size=4 name="caseYear"> 年  
                                <INPUT id="caseMonth" maxLength=4 size=2 name="caseMonth"> 月  
                                <INPUT id="caseDay" maxLength=4 size=2 name="caseDay"> 日</FONT>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=118>
							                 <p style="line-height: 150%"><FONT size=3>&nbsp;NCF个案编号</FONT>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=224>&nbsp;</TD>
                          </TR>
                          </TBODY>
                        </TABLE>
                      </DIV>
                      <DIV align=center>
                        <TABLE border=0 cellSpacing=1 width="100%" id="table17">
                          <TBODY>
                          <TR>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid">
                              <p style="line-height: 150%"><SPAN><FONT size=3>&nbsp;外科医师</FONT></SPAN>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid"> 
                              <p style="line-height: 150%"><FONT size=3>&nbsp;<INPUT id="surgeryDrName" maxLength=20 name="surgeryDrName" size="18"></FONT>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid">
                              <p style="line-height: 150%"><FONT size=3>&nbsp;语言治疗师</FONT>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid"> 
                              <p style="line-height: 150%"><FONT size=3>&nbsp;<INPUT id="languageTherapist" maxLength=20 name="languageTherapist" size="18"></FONT>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid">
                              <p style="line-height: 150%"><FONT size=3>&nbsp;正畸科医师</FONT>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid">
                              <p style="line-height: 150%"><FONT size=3>&nbsp;<INPUT id="orthodontics" maxLength=20 name="orthodontics" size="18"></FONT>
                            </TD>
                          </TR>
                          </TBODY>
                        </TABLE>
                      </DIV>
                    </TD>
                  </TR>
                </TBODY>
              </TABLE>
            </DIV>
          &nbsp;<DIV align=center>
                  <TABLE border=1 cellSpacing=1 width="100%" id="table18">
                    <TBODY>
                    <TR>
                      <TD>
                        <DIV align=center>
                        <TABLE border=0 cellSpacing=1 width="100%" id="table19">
                          <TBODY>
                          <TR>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" height="30">
                              <p style="line-height: 150%"><I><B><FONT size=4>&nbsp;个案基本数据</FONT></B></I>
                            </TD>
                          </TR>
                          </TBODY>
                        </TABLE>
                        </DIV>
                        <DIV align=center>
                        <TABLE border=0 cellSpacing=1 width="100%">
                          <TBODY>
                          <TR>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=135>
                              <p style="line-height: 150%"><FONT size=3>*</FONT>身份证号</TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=290>
                              <p style="line-height: 150%"><FONT size=3>&nbsp;<INPUT id="idno" maxLength=20 name=idno></FONT>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=89>
                              <p style="line-height: 150%"><FONT size=3>&nbsp;病历</FONT>号<FONT size=3>码</FONT>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=203>
                              <p style="line-height: 150%"><FONT size=3>&nbsp;<INPUT id="MedicalRecordNumber" maxLength=20 name="MedicalRecordNumber"></FONT>
                            </TD>
                          </TR>
                          <TR>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=135>
                              <p style="line-height: 150%"><FONT size=3>*个案姓名</FONT>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=290>
                              <p style="line-height: 150%"><FONT size=3>&nbsp;<INPUT id="name" maxLength=20 name="name"></FONT>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=89>
                              <p style="line-height: 150%"><FONT size=3>*性别</FONT>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=203>
                              <p style="line-height: 150%"><FONT size=3>
                                <LABEL><INPUT id="gender" value="M" type=radio name="gender">男</LABEL> 
                                <LABEL><INPUT id="gender" value="F" type=radio name="gender">女</LABEL>
                                </FONT>
                            </TD>
                          </TR>
                          <TR>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=135>
                              <p style="line-height: 150%"><FONT size=3>*出生日期</FONT>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=290>
                              <p style="line-height: 150%">
                                <FONT size=3>&nbsp;
                                  <INPUT id="birthYear" maxLength=4 size=4 name="birthYear"> 年&nbsp;
                                  <INPUT id="birthMonth" maxLength=4 size=2 name="birthMonth"> 月  
                                  <INPUT id="birthDay" maxLength=4 size=2 name="birthDay"> 日
                                </FONT>
                              </p>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=89>
                              <p style="line-height: 150%"><FONT size=3>&nbsp;职业</FONT>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=203>
                              <p style="line-height: 150%">
                                <FONT size=3>&nbsp;<INPUT id="profession" maxLength=20 name="profession"></FONT>
                              </p>
                            </TD>
                          </TR>
                          <TR>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=135>
                              <p style="line-height: 150%"><FONT size=3>&nbsp;电话</FONT></p>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=290>
                              <p style="line-height: 150%"><FONT size=3>&nbsp;<INPUT id="tel" maxLength=20 size=30 name="tel"></FONT></p>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=89>
                              <p style="line-height: 150%"><FONT size=3>&nbsp;教育程度</FONT></p>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=203>
                              <p style="line-height: 150%"><FONT size=3>&nbsp;<INPUT id="education" maxLength=20 name="education"></FONT></p>
                            </TD>
                          </TR>
                          <TR>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=135>
                              <p style="line-height: 150%"><FONT size=3>*住址</FONT></p>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=592 colSpan=3>
                              <p style="line-height: 150%">
                                <FONT size=3>&nbsp;<INPUT id="address" maxLength=110 size=84 name="address"></FONT>
                              </p>
                            </TD>
                          </TR>
                          <TR>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=135>
                              <p style="line-height: 150%"><FONT size=3>&nbsp;重要联系人</FONT></p>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=290>
                              <p style="line-height: 150%"><FONT size=3>&nbsp;<INPUT id="contactperson" maxLength=20 name="contactperson"></FONT></p>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=89>
                              <p style="line-height: 150%"><FONT size=3>&nbsp;与个案关系</FONT></p>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=203>
                              <p style="line-height: 150%">
                                <FONT size=3>&nbsp;
                                  <INPUT id="relationship" maxLength=20 name="relationship" />
                                </FONT>
                              </p>
                            </TD>
                          </TR>
                          <TR>
                            <FONT size=3>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=135>
                              <p style="line-height: 150%"><FONT size=3>&nbsp;连络电话</FONT></p>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=592 colSpan=3>
                              <p style="line-height: 150%">
                                <FONT size=3>&nbsp;
                                  自宅：<INPUT id="phone" size=32 name="phone" /><br>
                                </FONT>
                                <FONT size=3>&nbsp;
                                  手机：<INPUT id="cellphone" size=32 name="cellphone" />
                                </FONT>
                              </p>
                            </TD>
                          </TR>
                          <TR> 
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=135>
                              <p style="line-height: 150%">
                                <font size="3">&nbsp;住家离医院距离</font>
                              </p>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=592 colSpan=3>
                              <p style="line-height: 150%">
                                <font size="3">
                                  <label>&nbsp;<input id="h2hdistance" type="radio" value="100" name="h2hdistance">少于100公里</label>
                                  <label><input id="h2hdistance" type="radio" value="100-200" name="h2hdistance">100-200公里</label>
                                  <label><input id="h2hdistance" type="radio" value="200" name="h2hdistance">大于200公里</label>
                                </font>
                              </p>
                            </TD>
                          </TR>
                          </TBODY>
                        </TABLE>
                        </DIV>
                      </TD>
                    </TR>
                    </TBODY>
                  </TABLE>
                </DIV>&nbsp;
                <DIV align=center>
                  <TABLE border=1 cellSpacing=1 width="100%" id="table62">
                    <TBODY>
                    <TR>
                      <TD>
                        <DIV align=center>
                        <TABLE border=0 cellSpacing=1 width="100%">
                          <TBODY>
                          <FONT size=3>
                          <TR>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=710 colSpan=4 height="30">
                              <p style="line-height: 150%"><B><I><FONT size=4>&nbsp;医疗诊断</FONT></I></B></p>
                            </TD>
                          </TR>
                          <TR>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=135>
                              <p style="line-height: 150%"><FONT size=3>*身高</FONT>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=290>
                              <p style="line-height: 150%"><FONT size=3>&nbsp;<INPUT id="height" maxLength="10" size="6" name="height" /> 公分</FONT></p>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=89>
                              <p style="line-height: 150%"><FONT size=3>*体重</FONT></p>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=203>
                              <p style="line-height: 150%"><FONT size=3>&nbsp;<INPUT id="weight" maxLength="10" size="6" name="weight" /> 公斤</FONT></p>
                            </TD>
                          </TR>
                          </TBODY>
                        </TABLE>
                        </DIV>
                        <DIV align=center>
                        <TABLE border=0 cellSpacing=1 width="100%" id="table64">
                          <TBODY>
                          <TR>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=135>
                              <p style="line-height: 150%"><FONT size=3>*主诊断<BR>&nbsp;（医学专有名词）</BR></FONT></p>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=592>
                              <p style="line-height: 150%">
                              <FONT size=3>&nbsp;
                                <INPUT id="diagnosis_unilateral_cleft_lip_1" value="UCL" type=checkbox name="diagnosis_unilateral_cleft_lip_1">单侧唇裂 (
                                  <INPUT id="diagnosis_unilateral_cleft_lip" value="C" type=radio name="diagnosis_unilateral_cleft_lip">完全性
                                  <INPUT id="diagnosis_unilateral_cleft_lip" value="IC" type=radio name="diagnosis_unilateral_cleft_lip">不完全性   
                                  <INPUT id="diagnosis_unilateral_cleft_lip" value="CK" type=radio name="diagnosis_unilateral_cleft_lip">隐裂
                                )
                              </FONT>
                              </p>
								              <p style="line-height: 150%">
                                <FONT size=3>&nbsp;
                                  <INPUT id="diagnosis_bilateral_cleft_lip_2" value="BCL" type=checkbox name="diagnosis_bilateral_cleft_lip_2">双侧唇裂 (
                                    <INPUT id="diagnosis_bilateral_cleft_lip" value="C" type=radio name="diagnosis_bilateral_cleft_lip">完全性
                                    <INPUT id="diagnosis_bilateral_cleft_lip" value="IC" type=radio name="diagnosis_bilateral_cleft_lip">不完全性
                                    <INPUT id="diagnosis_bilateral_cleft_lip" value="MCK" type=radio name="diagnosis_bilateral_cleft_lip">混合裂
                                  )
                                </FONT>
                              </p>
                              <P style="line-height: 150%">&nbsp;
                                <FONT size=3>
                                  <LABEL>
                                    <INPUT id="CleftPalate" value="CP" type=checkbox name="CleftPalate">
                                  </LABEL>颚裂 － 
                                  <LABEL>
                                    <INPUT id="incomplete" value="IC" type=radio name="complete_main">
                                  </LABEL>不完全性 (
                                    <LABEL>
                                      <INPUT id="incomplete" value="SCC" type=radio name="incomplete">
                                    </LABEL>粘膜下裂
                                    <LABEL>
                                      <INPUT id="incomplete" value="CU" type=radio name="incomplete">
                                    </LABEL>悬雍垂裂
                                    <LABEL>
                                      <INPUT id="incomplete" value="SP" type=radio name="incomplete">
                                    </LABEL>软颚裂
                                      <INPUT id="incomplete" value="BC" type=radio name="incomplete">双侧裂)<BR>
                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                  － 
                                  <LABEL>
                                    <INPUT id="incomplete" value="C" type=radio name="complete_main" />
                                  </LABEL> 完全性 (
                                    <INPUT id="complete" value="U" type=radio name="complete">单侧 
                                    <INPUT id="complete" value="B" type=radio name="complete">双侧 )
                                </FONT>
                              </P>
                              <P style="line-height: 150%">
                                <FONT size=3>&nbsp;
                                  <INPUT id="BoneGraft_main" value="BoneGraft" type=checkbox name="BoneGraft_main" />牙槽突裂 (
                                    <INPUT id="BoneGraft_select" value="C" type=radio name="BoneGraft_select"/>完全性 
                                    <INPUT id="BoneGraft_select" value="IC" type=radio name="BoneGraft_select"/>不完全性 
                                    <INPUT id="BoneGraft_select" value="CK" type=radio name="BoneGraft_select"/>隐裂 )
                                </FONT>
                              </P>
                              <P style="line-height: 150%">
                                <FONT size=3>&nbsp;
                                  <INPUT id="Combined_with_other_craniofacial_disorders" value=Other type=checkbox name="Combined_with_other_craniofacial_disorders">合并其它颅颜病症：
                                  <INPUT id="Combined_with_other_craniofacial_disorders_text" maxLength=30 size=50 name="Combined_with_other_craniofacial_disorders_text" value="" />
                                </FONT>
                              </P>
                            </TD>
                          </TR>
                          </TBODY>
                        </TABLE>
                        </DIV>
                        <DIV align=center>
                        <TABLE border=0 cellSpacing=1 width="100%" id="table65">
                          <TBODY>
                          <TR>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid">
                              <p style="line-height: 150%">
                                <FONT size=3>*个案之前是否接受过任何唇颚裂治疗？</FONT>
                              </p>
                              <P style="line-height: 150%">&nbsp;
                                <FONT size=3>
                                  <LABEL><INPUT id="Cleft_lip_and_palate_surgery" value="Y" type=radio name="Cleft_lip_and_palate_surgery">是</LABEL>
                                </FONT>
                              </P>
                              <P style="line-height: 150%">
                                <FONT size=3>&nbsp;&nbsp;&nbsp;&nbsp;
                                  <LABEL><INPUT id="beforeSurgery_1" value="1LNR" type=checkbox name="beforeSurgery_1">一期唇鼻修复</LABEL> 
                                  <LABEL><INPUT id="beforeSurgery_2" value="1BLANR" type=checkbox name="beforeSurgery_2">一期双侧唇鼻修复</LABEL>
                                  <LABEL><INPUT id="beforeSurgery_3" value="1CPR" type=checkbox name="beforeSurgery_3">一期颚裂修复</LABEL>
                                  <LABEL><INPUT id="beforeSurgery_4" value="FHR" type=checkbox name="beforeSurgery_4">廔孔修复</LABEL>
                                  <LABEL><INPUT id="beforeSurgery_5" value="PF" type=checkbox name="beforeSurgery_5">咽瓣修复</LABEL>
                                  <LABEL><INPUT id="beforeSurgery_6" value="PBR" type=checkbox name="beforeSurgery_6">梨骨瓣修复</LABEL>
                                </FONT>
                              </P>
                              <P style="line-height: 150%">
                                <FONT size=3>&nbsp;&nbsp;&nbsp;&nbsp;
								                  <INPUT id="beforeSurgery_7" value="2CPR" type=checkbox name="beforeSurgery_7">二期颚裂(颚咽)修复 
								                  <INPUT id="beforeSurgery_8" value="LR" type=checkbox name="beforeSurgery_8">唇鼻整形 
								                  <INPUT id="beforeSurgery_9" value="AB" type=checkbox name="beforeSurgery_9">齿槽植骨 
								                  <INPUT id="beforeSurgery_10" value="PO" type=checkbox name="beforeSurgery_10">术前正畸 
								                  <INPUT id="beforeSurgery_11" value="SL" type=checkbox name="beforeSurgery_11">语言治疗
                                </FONT>
                              </P>
                              <P style="line-height: 150%">
                                <FONT size=3>&nbsp;&nbsp;&nbsp;&nbsp;
								                  <INPUT id="beforeSurgery_other" value="other" type=checkbox name="beforeSurgery_other"/>其它，请详述：
                                  <INPUT id="beforeSurgery_other_reason" maxLength=60 size=60 name="beforeSurgery_other_reason"/>
                                </FONT>
                              </P>
                              <P style="line-height: 150%">
                                <LABEL><FONT size=3>&nbsp;<INPUT id="Cleft_lip_and_palate_surgery" value="N" type=radio name=Cleft_lip_and_palate_surgery>否</FONT></LABEL>
                              </P>
                            </TD>
                          </TR>
                          </TBODY>
                        </TABLE>
                        </DIV>
                        </TD></TR></TBODY></TABLE></DIV>
          &nbsp;<DIV align=center>
                  <TABLE border=1 cellSpacing=1 width="100%" id="table55">
                    <TBODY>
                    <TR>
                      <TD>
                        <FONT size=3>
                        <DIV align=center>
                          <TABLE border=0 cellSpacing=1 width="100%" id="table59">
                            <TBODY>
                              <TR>
                                <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" height="30">
                                  <p style="line-height: 150%">
                                    <I><B>
                                      <FONT size=4>&nbsp;家庭状况</FONT>
                                    </B></I>
                                  </p>
                                </TD>
                              </TR>
                            </TBODY>
                          </TABLE>
                        </DIV>
                        
                        <DIV align=center>
                        	<TABLE border=0 cellSpacing=1 width="100%" id="table60">
                            <TBODY>
									           <TR>
										          <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=83>
                                <p style="line-height: 150%"><FONT size=3>&nbsp;家庭成员</FONT>
										          </TD>
                              <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=669 colSpan=5>
                                <p style="line-height: 150%">
                                  <FONT size=3>&nbsp;共 
												            <INPUT id="familyMembers" maxLength=3 size=4 name="familyMembers"> 人；同住 
												            <INPUT id="live_together" maxLength=3 size=4 name="live_together"> 人
                                  </FONT>
                                </p>
										          </TD>
                            </TR>
                          	<TR>
                              <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=83>
                                <p style="line-height: 150%"><FONT size=3>&nbsp;父亲年龄</FONT>
										          </TD>
                            	<TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=115>
                                <p style="line-height: 150%"><FONT size=3>&nbsp;<INPUT id="fatherAge" maxLength=3 size=4 name="fatherAge"> 岁</FONT></p>
										          </TD>
                            	<TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=44>
                                <p style="line-height: 150%"><FONT size=3>&nbsp;职业</FONT>
										          </TD>
                            	<TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=198>
                                <p style="line-height: 150%">
                                  <FONT size=3>&nbsp;<INPUT id="fatherProfession_main" maxLength=20 name="fatherProfession_main" value="" /></FONT>
                                </p>
										          </TD>
                            	<TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=79>
                                <p style="line-height: 150%"><FONT size=3>&nbsp;教育程度</FONT></p>
										          </TD>
                            	<TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=221>
                                <p style="line-height: 150%">
												          <FONT size=3>
                                    <LABEL>&nbsp;<INPUT id="fatherProfession" value="大专" type=radio name="fatherProfession">大专以上</LABEL><BR>
                                    <LABEL>&nbsp;<INPUT id="fatherProfession" value="中学" type=radio name="fatherProfession">中学(专)</LABEL><BR>
                                    <LABEL>&nbsp;<INPUT id="fatherProfession" value="小学" type=radio name="fatherProfession">小学</LABEL><BR>
                                    <LABEL>&nbsp;<INPUT id="fatherProfession" value="不识字" type=radio name="fatherProfession">不识字</LABEL>
												          </FONT>
                                </p>
										          </TD>
                            </TR>
                            <TR>
										          <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=83>
                                <p style="line-height: 150%"><FONT size=3>&nbsp;母亲年龄</FONT>
										          </TD>
                            	<TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=115> 
                                <p style="line-height: 150%"><FONT size=3>&nbsp;<INPUT id="motherAge" maxLength=3 size=4 name="motherAge" value=""> 岁</FONT></p>
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
                                    <LABEL>&nbsp;<INPUT id="motherProfession" value="大专" type=radio name="motherProfession">大专以上</LABEL><BR>
                                    <LABEL>&nbsp;<INPUT id="motherProfession" value="中学" type=radio name="motherProfession">中学(专)</LABEL><BR>
                                    <LABEL>&nbsp;<INPUT id="motherProfession" value="小学" type=radio name="motherProfession">小学</LABEL><br>
                                    <LABEL>&nbsp;<INPUT id="motherProfession" value="不识字" type=radio name="motherProfession">不识字</LABEL>
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
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width="0">
                              <p style="line-height: 150%"><FONT size=3>&nbsp;个案家庭情况说明</FONT>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" colSpan=3>
                              <P align=center style="line-height: 150%">
                                <FONT size=3>
                                  <TEXTAREA id="descriptionCaseFamily" rows=5 cols=65 name="descriptionCaseFamily"></TEXTAREA>
                                </FONT>
                              </P>
                            </TD>
                          </TR>
                          <TR>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width="0">
                              <p style="line-height: 150%"><FONT size=3>&nbsp;主要经济/收入来源</FONT></p>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width="35%">
                              <p style="line-height: 150%"><FONTsize=3>
                                <INPUT id="mainSourceofIncome" maxLength=26 size=35 name="mainSourceofIncome" /></FONT>
                              </p>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width="13%">
                              <p style="line-height: 150%">
                                <FONT size=3>&nbsp;平均年收入</FONT>
                              </p>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width="32%">
                              <p style="line-height: 150%">
                                <FONT size=3>&nbsp;<INPUT id="income" maxLength="20" size="10" name="income"> (人民币)</FONT>
                              </p>
                            </TD>
                          </TR>
                          <TR>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width="0">
                              <p style="line-height: 150%">
                                <FONT size=3>&nbsp;家中固定支出项目<BR>&nbsp;(福利院免填)</FONT>
                              </p>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width="35%">
                              <p style="line-height: 150%">
                                <FONT size=3>
                                  <LABEL>&nbsp;1. <INPUT id="fixedExpenditure1" maxLength=30 size=30 name="fixedExpenditure1"></LABEL><BR>
                                  <LABEL>&nbsp;2. <INPUT id="fixedExpenditure2" maxLength=30 size=30 name="fixedExpenditure2"></LABEL><BR>
                                  <LABEL>&nbsp;3. <INPUT id="fixedExpenditure3" maxLength=30 size=30 name="fixedExpenditure3"></LABEL><BR>
                                  <LABEL>&nbsp;4. <INPUT id="fixedExpenditure4" maxLength=30 size=30 name="fixedExpenditure4"></LABEL>
                                </FONT>
                              </p>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width="13%">
                              <p style="line-height: 150%"><FONT size=3>&nbsp;预估支出</FONT></p>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width="32%">
                              <p style="line-height: 150%"><FONT size=3>&nbsp;平均每月生活支出
                                <INPUT id="extimatedExpenditures" maxLength="20" size="10" name="extimatedExpenditures"><br/>(人民币)
                              </FONT>
                              </p>
                            </TD>
                          </TR>
                        </TBODY>
                      </TABLE>
                    </DIV>
                  </TD>
                </TR>
              </TBODY>
            </TABLE>
          </DIV>
  &nbsp;  <div align="center">
          <table border="1" cellspacing="1" width="100%" id="table66">
            <tr>
              <td>
                <div align="center">
                  <table border="0" cellspacing="1" width="100%" id="table67">
                    <tr>
                      <td style="border-style: solid; border-width: 1" height="30">
                        
                          <i><b>
						                <font size="4">&nbsp;</font>
                          </b></i>
                          <FONT size=3>
                          <i><b>
                            <font size="4">NAM暨交通费补助申请</font>
                          </b></i>
                        
                      </td>
                    </tr>
                  </table>
                </div>
                <div align="center">
                  <table border="0" cellspacing="1" width="738" id="table68">
                    <!-- MSTableType="nolayout" -->
                    <tr>
                      <font size="3">
                        <td style="border-style: solid; border-width: 1" width="106">
  						            <p style="line-height: 150%"><font size="3">*初诊时间</font></p>
                        </td>
                        <td style="border-style: solid; border-width: 1" width="232">
                          <p style="line-height: 150%">
                            <font size="3">&nbsp;
                              <input id="BIHosTimeYear" maxLength="4" size="5" name="BIHosTimeYear"> 年
                              <input id="BIHosTimeMonth" maxLength="2" size="3" name="BIHosTimeMonth"> 月
                              <input id="BIHosTimeDay" maxLength="2" size="3" name="BIHosTimeDay"> 日
                            </font>
                          </p>
                        </td>
                        <td style="border-style: solid; border-width: 1" colspan="2">
						              <p style="line-height: 150%">
                            <FONT size=3>*正畸科医师</FONT>
                          </p>
                        </td>
                        <td style="border-style: solid; border-width: 1" width="258">
                          <p style="line-height: 150%"><font size="3">&nbsp;<input id="surgeon" maxLength="4" size="23" name="surgeon" value=""></font></p>
                        </td>
	                   </font>
                    </tr>
                    <tr>
                      <td style="border-style: solid; border-width: 1" width="106">
						            <p style="line-height: 150%"><font size="3">*治疗开始&#26102;&#38388;</font></p>
                      </td>
                      <td style="border-style: solid; border-width: 1" width="232">
						            <p style="line-height: 150%">
                          <font size="3">&nbsp;
                            <input id="LHosTimeYear" maxLength="4" size="5" name="LHosTimeYear"> 年
                            <input id="LHosTimeMonth" maxLength="2" size="3" name="LHosTimeMonth"> 月
                            <input id="LHosTimeDay" maxLength="2" size="3" name="LHosTimeDay"> 日
                          </font>
                        </p>
                      </td>
                      <td style="border-style: solid; border-width: 1" colspan="2">
                        <p style="line-height: 150%"><font size="3">*治疗结束时间</font>
                      </td>
                      <td style="border-style: solid; border-width: 1" width="258">
						            <p style="line-height: 150%"><font size="3">&nbsp;
                          <input id="surgeryTimeYear" maxLength="4" size="5" name="surgeryTimeYear"> 年
                          <input id="surgeryTimeMonth" maxLength="2" size="3" name="surgeryTimeMonth"> 月
                          <input id="surgeryTimeDay" maxLength="2" size="3" name="surgeryTimeDay"> 日</font>
                      </td>

                    </tr>

                    <FONT size=3>

                    <tr>

                      <td style="border-style: solid; border-width: 1" rowspan="3" width="106">
                        <FONT size=3>
						              <p style="line-height: 150%">&nbsp;个案照片</p>
                        </FONT>
                      </td>
                            
                      <td style="border-style: solid; border-width: 1" colspan="2">
                        <FONT size=3>
						              <p style="line-height: 150%" align="center"><b>〔治疗前〕</b><br>
						                拍照日：<input id="beforeSurgeryYear1" maxLength="4" size="4" name="beforeSurgeryYear1"> 年
                            <input id="beforeSurgeryMonth1" maxLength="2" size="2" name="beforeSurgeryMonth1"> 月
                            <input id="beforeSurgeryDay1" maxLength="2" size="2" name="beforeSurgeryDay1"> 日
                          </p>
						              <p align="center" style="line-height: 150%">
                            <img height="265" alt="Pedigree" src="user-pic.jpg" width="300" border="0">
                          </p>
                          <p align="center" style="line-height: 150%">
                            <input type="file" size="25" name="pedigree_graphics1" />
                          </p>
                        </td>
                        <td style="border-style: solid; border-width: 1" colspan="2">
                          <FONT size=3>
						                <p style="line-height: 150%" align="center"><b>〔治疗前〕<br></b>
                              拍照日：<input id="beforeSurgeryYear2" maxLength="4" size="4" name="beforeSurgeryYear2"> 年
                              <input id="beforeSurgeryMonth2" maxLength="2" size="2" name="beforeSurgeryMonth2"> 月
                              <input id="beforeSurgeryDay2" maxLength="2" size="2" name="beforeSurgeryDay2"> 日
                            </p>
						                <p align="center" style="line-height: 150%">
                              <img height="265" alt="Pedigree" src="user-pic.jpg" width="300" border="0">
                              </p>
                            <p align="center" style="line-height: 150%">
						                      <input type="file" size="25" name="pedigree_graphics2" />
                                </p>
                              </td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1" colspan="2"><FONT
            size=3>
						<p style="line-height: 150%" align="center">&nbsp;<b>〔
						治疗后〕</b><br>
						拍照日：<input id="afterSurgeryYear1" maxLength="4" size="4" name="afterSurgeryYear1"> 年
                  <input id="afterSurgeryMonth1" maxLength="2" size="2" name="afterSurgeryMonth1"> 月
                  <input id="afterSurgeryDay1" maxLength="2" size="2" name="afterSurgeryDay1"> 日
            </p>
						<p align="center" style="line-height: 150%">
              <img height="265" alt="Pedigree" src="user-pic.jpg" width="300" border="0"><p align="center" style="line-height: 150%">
						  <input type="file" size="25" name="pedigree_graphics3"></td>

                      <td style="border-style: solid; border-width: 1" colspan="2"><FONT
            size=3>
						<p style="line-height: 150%" align="center"><b>〔治疗后〕<br>
						</b>拍照日：<input id="afterSurgeryYear2" maxLength="4" size="4" name="afterSurgeryYear2"> 年
                      <input id="afterSurgeryMonth2" maxLength="2" size="2" name="afterSurgeryMonth2"> 月
                      <input id="afterSurgeryDay2" maxLength="2" size="2" name="afterSurgeryDay2"> 日
            </p>
						<p align="center" style="line-height: 150%">
              <img height="265" alt="Pedigree" src="user-pic.jpg" width="300" border="0"><p align="center" style="line-height: 150%">
						    <input type="file" size="25" name="pedigree_graphics4"></td>
                  
                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1" colspan="4"><FONT
            size=3>
						<p style="line-height: 150%" align="center"><b>〔治疗后〕<br>
						</b>拍照日：<input id="afterSurgeryYear3" maxLength="4" size="4" name="afterSurgeryYear3"> 年

                          <input id="afterSurgeryMonth3" maxLength="2" size="2" name="afterSurgeryMonth3"> 月

                          <input id="afterSurgeryDay3" maxLength="2" size="2" name="afterSurgeryDay3"> 日</p>
						<p align="center" style="line-height: 150%">

						<img height="265" alt="Pedigree" src="user-pic.jpg" width="300" border="0"><p align="center" style="line-height: 150%">
						<input type="file" size="25" name="pedigree_graphics5"></td>

                    </tr>

                    </table>

                <div align="center">

          <table border="1" width="100%">
            <tr>
              <td width="136">
                <p style="line-height: 150%"><font size="3">&nbsp;社会资源使用情形</font></p>
              </td>
						  <td><font size="3">
						    <p style="line-height: 150%">&nbsp;<input id="usageofSocialResources" value="Y" type="radio" name="usageofSocialResources">有</p>
						    <p style="line-height: 150%">&nbsp;&nbsp;&nbsp;&nbsp; 医疗补助：<input id="smileTrain" value="1" maxLength="20" type="checkbox" name="smileTrain">微笑列车，项目 
						<input id="MSitem" name="MSitem" size="43" value=""><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input id="MSOther" value="1" type="checkbox" name="MSOther">其他：<input id="MSOther_text" maxLength="20" size="54" name="MSOther_text" value=""></p>
						<p style="line-height: 150%">&nbsp;&nbsp;&nbsp;&nbsp; 生活补助：单位 － 
						<input id="LAunit" name="LAunit" value=""> 项目 
						－ <input id="LAitem" maxLength="20" name="LAitem" value=""></p>
						<p style="line-height: 150%">&nbsp;&nbsp;&nbsp;&nbsp; 其他补助：单位 － 
						<input id="OAunit" maxLength="20" name="OAunit" value=""> 项目 － 
						<input id="OAitem" maxLength="20" name="OAitem" value=""></p>
						<p style="line-height: 150%">&nbsp;<input id="usageofSocialResources" value="N" type="radio" name="usageofSocialResources">无</font></td>
					</tr>
					</table>

                </div>

                </div>

                </td>

            </tr>

          </table>

        </div>
          &nbsp;<table border="1" cellspacing="1" width="100%" id="table50">
            <tr>
              <td>
                <div align="center">
                  <table border="0" cellspacing="1" width="100%" id="table51">
                    <tr>
                      <td style="border-style: solid; border-width: 1" width="469"><FONT
            size=3>
						<p style="line-height: 150%"><i>
						<strong><font size="4">&nbsp;申请补助项目<br>
						【须检具医疗收据复印件、费用明细表复印件】</font></strong></i></td>
                      <td style="border-style: solid; border-width: 1">
						<p style="line-height: 150%"><FONT
            size=3>&nbsp;NCF补助编号：</td>
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
							<input id="TotalSFME" maxLength="10" size="5" name="TotalSFME"> 元</p>
							<p style="line-height: 150%">&nbsp; 1.申请NCF&#34917;助：人民&#24065;
							<input id="NCFAllowance" maxLength="10" size="5" name="NCFAllowance"> 元，占&#21307;&#30103;&#36153;用&#24635;金&#39069;&nbsp;
              <input id="NCFProportion" maxLength="10" size="3" name="NCFProportion"> 
							%</p>
							<p style="line-height: 150%">&nbsp; 2.案家自付：人民&#24065;
							<input id="PatientPay" maxLength="10" size="5" name="PatientPay" value=""> 元，占&#21307;&#30103;&#36153;用&#24635;金&#39069;
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
						<input id="NCFTotalSubsidies" maxLength="10" size="6" name="NCFTotalSubsidies"> </font>元</font></strong></td>
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
                        <P align=center><FONT size=3><INPUT id="save" onclick="return saveData('save')" value=储存 type=button name="save">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<INPUT id="cancelAdd" onclick="return saveData('cancelAdd')" value=取消 type=button name="cancelAdd">
                        </FONT></P></TD></TR></TBODY></TABLE></DIV>
                  <CENTER>
					<p style="line-height: 150%"></p>
					</CENTER></TD></TR></TBODY></TABLE></DIV></FONT></CENTER></TD></TR>
        <TR>
          <TD height=1 width="100%" align=middle>
            <HR color=#c0c0c0 SIZE=1 width="98%">

            <P align=center style="line-height: 150%"><I><FONT size=2><FONT color=#999999 face=Arial>The&nbsp; Web&nbsp; Best&nbsp; Browse&nbsp; Mode</FONT>
            <FONT color=#999999>： </FONT><FONT face=Arial><FONT color=#999999>Internet&nbsp; Explorer&nbsp; 6.02 (Or Update)&nbsp;/&nbsp; 800 x 600&nbsp; Resolution<BR>Copyright <span lang="zh-tw">©</span>&nbsp;&nbsp;
            </FONT><A href="http://www.nncf.org/" target=_blank><FONT color=#0066cc>Noordhoff&nbsp; Craniofacial&nbsp;Foundation</FONT></A></FONT></FONT></I></P></TD></TR></TBODY></TABLE></DIV></TD></TR></TBODY></TABLE></CENTER></DIV>
              <input type="hidden" name="patientID" value="<? echo $seid; ?>">
              <input type="hidden" name="remark" value="">
              <input type="hidden" name="NCFID" value="<? echo $NCFNumX; ?>">
              <input type="hidden" name="NCFMedicalNum" value="<? echo $NCFMedicalNumNow; ?>">
              <input type="hidden" name="branch" value="1">
              <input type="hidden" name="serialcode" value="1">
              <INPUT value="2" type=hidden name="branch"> 


             </FORM></BODY></HTML>
<?PHP
      }else{
        echo "<Script Language='JavaScript'>";
        echo "alert('抱歉您现在无权限读取,请先登入')\;";
        echo " location.href=\'login.php\'\;";
        echo " </Script>";
      }
?>