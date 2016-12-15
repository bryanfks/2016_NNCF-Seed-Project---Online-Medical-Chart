<?PHP
  @session_start(); 

  require_once("db.php");

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
    
      // 新語言治療病患編號
      $branch = "3";
      $serialcode = "1";    //暂时以此当作同病患的病历表流水号
      $NCFMedicalNum = $NCFNumX.$branch.$serialcode;
    //echo $NCFMedicalNum."<br>";



?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<!-- saved from url=(0057)http://www.seed-nncf.org/china/for-pla-add-china-cgmh.php -->
<HTML><HEAD>
            <TITLE>NCF -- Patient Record Online Management System</TITLE>
            <META content="text/html; charset=utf-8" http-equiv=Content-Type>
            
    <SCRIPT language=javascript>
			<!--
				function saveData(opt){
					//alert (opt);
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
              alert ("请输入 评估日期-年");
            }else if(document.china_medical.BIHosTimeMonth.value == ""){
              alert ("请输入 评估日期-月");
            }else if(document.china_medical.BIHosTimeDay.value == ""){
              alert ("请输入 评估日期-日");
            }else if(document.china_medical.speechDr.value == ""){
              alert ("请输入 语言治疗师");
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
              alert ("请输入 评估日期-年");
            }else if(document.china_medical.BIHosTimeMonth.value == ""){
              alert ("请输入 评估日期-月");
            }else if(document.china_medical.BIHosTimeDay.value == ""){
              alert ("请输入 评估日期-日");
            }else if(document.china_medical.speechDr.value == ""){
              alert ("请输入 语言治疗师");
            }else {
              document.china_medical.remark.value = "1";
              document.china_medical.submit();
            }
          } else if(opt == "cancelAdd"){
              location.href='searchList.php?c=3';
          }
        }
				
				//-->
		</SCRIPT>
</HEAD>
<BODY topMargin=2>
<FORM Enctype="multipart/form-data" method="post" name="china_medical" action="cn-lang-add-save.php">
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
            <TABLE border=0 cellSpacing=0 cellPadding=0 width=780 id="table13">
              <TBODY>
              <TR>
                <TD align=left>
                  <DIV align=center>
                  <TABLE border=1 cellSpacing=0 cellPadding=0 width="100%"
                  bgColor=#ff9966 height=40 id="table14">
                    <TBODY>
                      <tr bgcolor="#FFFFFF">
                        <td align="center"><font size="2" face="Arial"><?PHP include("../china/top.php"); ?></font></td>
                      </tr>
                      <tr bgcolor="#C0C0C0">
                        <td align="center"><font size="2" face="Arial"><?PHP include("../china/select.php"); ?></font></td>
                      </tr>
                    	<TR>
                      		<TD>
                        		<P align=center style="line-height: 150%">
                        			<FONT color=#000000 size=4>
                        				<I><B>
                        					<SPAN>
                        						<SELECT size=1 name=school> 
                        							<OPTION selected>请选择医院</OPTION>
                        							<OPTION value="C">西安交通大学口腔医院</OPTION>
                        							<OPTION value="S">中国医学科学院北京协和医院</OPTION>
                        						</SELECT>&nbsp;
                        					</SPAN>
                        				</B></I>
                        			</FONT>
                        			<SPAN>
                        				<b><i><font color="#000000" size="4">清寒唇颚裂患者补助申请表（语言治疗）</font></i></b>
                        			</SPAN>
								</P>
							</TD>
						</TR>
					</TBODY>
				</TABLE>
				</DIV>
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
                                <INPUT id="caseMonth" maxLength="2" size="2" name="caseMonth"> 月  
                                <INPUT id="caseDay" maxLength="2" size="2" name="caseDay"> 日</FONT>
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
                </TBODY></TABLE></DIV>&nbsp;<DIV align=center>
                  <TABLE border=1 cellSpacing=1 width=780 id="table55">
                    <TBODY>
                    <TR>
                      <TD>
                        <DIV align=center>
                        <TABLE border=0 cellSpacing=1 width=780 id="table56">
                          <TBODY>
                          <TR>
                            <TD
                            style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid">
							<p style="line-height: 150%"><I><B><FONT
                              size=4>&nbsp;个案基本数据</FONT></B></I></TD></TR></TBODY></TABLE></DIV>
                        <DIV align=center>
                        <TABLE border=0 cellSpacing=1 width=780 id="table57">
                          <TBODY>
                          <TR>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=135>
                              <p style="line-height: 150%"><FONT size=3>*</FONT>身份证号</TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=290>
                              <p style="line-height: 150%"><FONT size=3>&nbsp;<INPUT id="idno" maxLength=20 name=idno></FONT>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=89>
                              <p style="line-height: 150%"><FONT size=3>&nbsp;病历号码</FONT>
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
                              <p style="line-height: 150%"><FONT size=3>*性　别</FONT>
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
                                  <INPUT id="birthMonth" maxLength=2 size=2 name="birthMonth"> 月  
                                  <INPUT id="birthDay" maxLength=2 size=2 name="birthDay"> 日
                                </FONT>
                              </p>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=89>
                              <p style="line-height: 150%"><FONT size=3>&nbsp;职　业</FONT>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=203>
                              <p style="line-height: 150%">
                                <FONT size=3>&nbsp;<INPUT id="profession" maxLength=20 name="profession"></FONT>
                              </p>
                            </TD>
                          </TR>
                          <TR>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=135>
                              <p style="line-height: 150%"><FONT size=3>&nbsp;&nbsp;电　话</FONT></p>
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
                              <p style="line-height: 150%"><FONT size=3>*住　址</FONT></p>
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
                          </TBODY></TABLE></DIV>
                        </TD></TR></TBODY></TABLE></DIV>
          		&nbsp;<DIV align=center>
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
                              <p style="line-height: 150%"><FONT size=3>*身　高</FONT>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=290>
                              <p style="line-height: 150%"><FONT size=3>&nbsp;<INPUT id="height" maxLength="20" size="6" name="height" /> 公分</FONT></p>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=89>
                              <p style="line-height: 150%"><FONT size=3>*体　重</FONT></p>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=203>
                              <p style="line-height: 150%"><FONT size=3>&nbsp;<INPUT id="weight" maxLength="20" size="6" name="weight" />&nbsp;&nbsp;公　斤</FONT></p>
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
                                  <INPUT id="beforeSurgery_other_reason" maxLength=60 size=60 name="beforeSurgery_other_reason" value="" />
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
                                    <INPUT id="familyMembers" maxLength="20" size="4" name="familyMembers"> 人；同住 
                                    <INPUT id="live_together" maxLength="20" size="4" name="live_together"> 人
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
                                  <LABEL>&nbsp;1. <INPUT id="fixedExpenditure1" maxLength="40" size="30" name="fixedExpenditure1"></LABEL><BR>
                                  <LABEL>&nbsp;2. <INPUT id="fixedExpenditure2" maxLength="40" size="30" name="fixedExpenditure2"></LABEL><BR>
                                  <LABEL>&nbsp;3. <INPUT id="fixedExpenditure3" maxLength="40" size="30" name="fixedExpenditure3"></LABEL><BR>
                                  <LABEL>&nbsp;4. <INPUT id="fixedExpenditure4" maxLength="40" size="30" name="fixedExpenditure4"></LABEL>
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

        <div align="center">
          <br/>
          <table border="1" cellspacing="1" width="780" id="table62">
            <tr>
              <td>
                <div align="center">
                  <table border="0" cellspacing="1" width="780" id="table63">
                    <tr>
                      <td style="border-style: solid; border-width: 1">
						            <p style="line-height: 150%">
                          <i><b><font size="4">&nbsp;语言治疗师评估及治疗计划表</font></b></i>
                        </p>
                      </td>
                    </tr>
                  </table>
                </div>
                <div align="center">
                  <table border="0" cellspacing="1" width="780" id="table64">
                    <tr>
                      <td style="border-style: solid; border-width: 1" width="81">
                        <p style="line-height: 150%"><font size="3">*评估日期</font></p>
                      </td>
                      <td style="border-style: solid; border-width: 1">
						            <p style="line-height: 150%">
                          <font size="3">&nbsp;
                            <input id="BIHosTimeYear" maxLength="4" size="5" name="BIHosTimeYear"> 年
                            <input id="BIHosTimeMonth" maxLength="2" size="3" name="BIHosTimeMonth"> 月
                            <input id="BIHosTimeDay" maxLength="2" size="3" name="BIHosTimeDay"> 日
                          </font>
                        </p>
                      </td>
                      <td style="border-style: solid; border-width: 1">
						            <p style="line-height: 150%">*语言治疗师</p>
                      </td>
                      <td style="border-style: solid; border-width: 1">
						            <p style="line-height: 150%">
                          <font size="3">&nbsp;
                            <input id="speechDr" maxLength="40" size="23" name="speechDr" value="" />
                          </font>
                        </p>
                      </td>
                    </tr>
                    <tr>
                      <font size="3">
                        <td style="border-style: solid; border-width: 1" width="81">
						              <p style="line-height: 150%">&nbsp;评估报告</p>
                        </td>
                        <td style="border-style: solid; border-width: 1" colspan="3">
						              <p style="line-height: 150%">
                            <font size="3">&nbsp;Resonance：
                              <INPUT id="hypernasality" value="1" type=checkbox name="hypernasality">Hypernasality (
                                <INPUT id="mild" value="1" type=checkbox name="mild">mild 
						                    <INPUT id="moderate" value="1" type=checkbox name="moderate">moderate 
						                    <INPUT id="severity" value="1" type=checkbox name="severity">severity )
						                    <INPUT id="hyponasality" value="1" type=checkbox name="hyponasality">Hyponasality
						                      <br/>  
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						                    <INPUT id="mix" value="1" type=checkbox name="mix">Mix 
						                    <INPUT id="cdsr" value="1" type=checkbox name="cdsr">Cul-de-sac resonance
                            </font>
                          </p>
						              <p style="line-height: 150%">&nbsp;Nasal Emission
                            <font size="3">：
                              <INPUT id="visble" value="1" type=checkbox name="visble" />visble ( 
                            </font>
                            <FONT size=3> 
                              <INPUT id="rt" value="1" type=checkbox name="rt" />Rt,
                            </FONT>
                            <FONT size=3> 
						                  <INPUT id="lt" value="1" type=checkbox name="lt" />Lt,
                            </FONT>
                            <FONT size=3>
                              <INPUT id="bil" value="1" type=checkbox name="bil">Bil ),
                            </FONT> 
                            <FONT size=3> 
                              <INPUT id="audible" value="1" type=checkbox name="audible">Audible, 
                            </FONT> 
                            <FONT size=3>
                              <INPUT id="nt" value="1" type=checkbox name="nt">Nasal turbulence
                            </FONT>
                          </p>
						              <p style="line-height: 150%">&nbsp;Grimace
                            <font size="3">：</font>
                            <LABEL>
                              <FONT size=3>
                                <INPUT id="Grimace" value="Y" type=radio name="Grimace" />
                              </FONT>
                            </LABEL>Yes
                            <LABEL>
                              <FONT size=3>
                                <INPUT id="Grimace" value="N" type=radio name="Grimace" />
                              </FONT>
                            </LABEL>No
                          </p>
						              <p style="line-height: 150%">&nbsp;Phonaton
                            <font size="3">：
                              <INPUT id="hsn" value="1" type=checkbox name="hsn">
                            </font>
                            <LABEL>
                              <FONT size=3>Hoarseness,</font>
                            </LABEL>
                              <FONT size=3>
                                <INPUT id="lp" value="1" type=checkbox name="lp">
                              </FONT>
                            <LABEL>
                              <FONT size=3>Low pitched,</font>
                            </LABEL>
                              <FONT size=3> 
						                    <INPUT id="rl" value="1" type=checkbox name="rl">
                              </FONT>
                            <LABEL>
                              <FONT size=3>Reduced loudness</FONT>
                            </LABEL>
                          </p>
                          <p style="line-height: 150%">&nbsp;Articulation
                            <font size="3">：NON-VP Related：</font>
                          </p>
                          <p style="line-height: 150%">&nbsp;结构历程
                            <font size="3">：<br>
                            </font>&nbsp;&nbsp; 
                            <font size="3">Omission：
                              <INPUT id="Omission_ck" value="1" type=checkbox name="Omission_ck" />
                              <input id="Omission" maxLength="40" size="23" name="Omission" value="" />
                            </font>
                            <font size="3">声随韵母鼻音省略：<!-- 翻譯 With nasal vowel sound -->
                              <INPUT id="nvs_ck" value="1" type=checkbox name="nvs_ck">
                              <input id="nvs" value="" maxLength="40" size="23" name="nvs" /><br>
                            </font>&nbsp;&nbsp; 介音省略： <!-- 翻譯 Medial omitted -->
                            <font size="3">
                              <INPUT id="mo_ck" value="1" type=checkbox name="mo_ck" />
                              <input id="mo" value="" maxLength="40" size="23" name="mo">
                            </font>
                            <font size="3">复韵母简化：<!-- 翻譯 Simplify complex vowel -->
                              <INPUT id="scv_ck" value="1" type=checkbox name="scv_ck" />
                              <input id="scv" value="" maxLength="40" size="23" name="scv"><br>
                            </font>&nbsp;&nbsp; 
                            <font size="3">赘加声母：(CV－CCV)<!-- 翻譯  -->
                              <INPUT id="CVCCV_ck" value="1" type=checkbox name="CVCCV_ck">
                              <input id="CVCCV" value="" maxLength="40" size="18" name="CVCCV">
                            </FONT>
                            <font size="3">赘加韵母：(CV－－CVV) 
                              <INPUT id="CVCVV_ck" value="1" type=checkbox name="CVCVV_ck">
                              <input id="CVCVV" value="" maxLength="40" size="18" name="CVCVV" />
                            </FONT>
                          </p>
                          <p style="line-height: 150%">
                            <font size="3">&nbsp;位置替代历程：<br>&nbsp;&nbsp; Fronting：
                              <INPUT id="Fronting_ck" value="1" type=checkbox name="Fronting_ck">
                              <input id="Fronting" value="" maxLength="40" size="23" name="Fronting" />
                            </font>
                            <font size="3">Backing：
                              <INPUT id="Backing_ck" value="1" type=checkbox name="Backing_ck">
                              <input id="Backing" value="" maxLength="40" size="23" name="Backing" /><br>
                            </font>&nbsp;&nbsp; 
                            <font size="3">舌面音替代：<!-- 翻譯 Lingual sound alternative -->
                              <INPUT id="lsa_ck" value="1" type=checkbox name="lsa_ck">
                              <input id="lsa" value="" maxLength="40" size="23" name="lsa">
                            </font>
                            <font size="3">舌尖音替代：<!-- 翻譯 Alternative Retroflex -->
                              <INPUT id="arx_ck" value="1" type=checkbox name="arx_ck">
                              <input id="arx" value="" maxLength="40" size="23" name="arx" />
                            </font>
                          </p>
                          <p style="line-height: 150%">&nbsp;
                          <font size="3">方法替代历程：<br></font>&nbsp;&nbsp; 
                          <font size="3">Stopping：
                            <INPUT id="Stopping_ck" value="1" type=checkbox name="Stopping_ck">
                            <input id="Stopping" value="" maxLength="40" size="23" name="Stopping" />
                          </font> 
                          <font size="3">Affrication：
                            <INPUT id="Affrication_ck" value="1" type=checkbox name="Affrication_ck" />
                            <input id="Affrication" value="" maxLength="40" size="23" name="Affrication" /><br>
                          </font>&nbsp;&nbsp; 
                          <font size="3">Deaffrication：
                            <INPUT id="Deaffrication_ck" value="1" type=checkbox name="Deaffrication_ck">
                            <input id="Deaffrication" value="" maxLength="40" size="23" name="Deaffrication">
                          </font> 
                          <font size="3">Aspiration：
                            <INPUT id="Aspiration_ck" value="1" type=checkbox name="Aspiration_ck">
                            <input id="Aspiration" value="" maxLength="40" size="23" name="Aspiration"><br>
                          </font>&nbsp;&nbsp; 
                          <font size="3">Unaspiration：
                            <INPUT id="Unaspiration_ck" value="1" type=checkbox name="Unaspiration_ck">
                            <input id="Unaspiration" value="" maxLength="40" size="23" name="Unaspiration">
                          </font>
                          <font size="3">Naslization：
                            <INPUT id="Naslization_ck" value="1" type=checkbox name="Naslization_ck">
                            <input id="Naslization" value="" maxLength="40" size="23" name="Naslization" /><br>
                          </font>&nbsp;&nbsp; 
                          <font size="3">Lateralization：
                            <INPUT id="Lateralization_ck" value="1" type=checkbox name="Lateralization_ck">
                            <input id="Lateralization" value="" maxLength="40" size="23" name="Lateralization" />
                          </font>
                        </p>
                        <p style="line-height: 150%">&nbsp;<font size="3">其他：</font></p>
                        <p style="line-height: 150%">&nbsp;&nbsp; 
                        <FONT size=3>同化历程 <!-- 翻譯 Assimilation Course -->
                          <INPUT id="ac_ck" value="1" type=checkbox name="ac_ck">
                          <input id="ac" value="" maxLength="40" size="23" name="ac" />
                        </FONT>
                        <FONT size=3>其他替代 <!-- 翻譯 Other alternatives -->
                          <INPUT id="oa_ck" value="1" type=checkbox name="oa_ck">
                          <input id="oa" value="" maxLength="40" size="23" name="oa" />
                        </FONT>
                      </p>
                      <p style="line-height: 150%">&nbsp;&nbsp; 
                      <FONT size=3>VP Related 
                        <INPUT id="Glottal" value="1" type=checkbox name="Glottal" />Glottal
                      </FONT>
                      <FONT size=3>
                        <INPUT id="phf" value="1" type=checkbox name="phf">Pharyngeal fricative/ 
                      </FONT>
                      <FONT size=3>
                        <INPUT id="phls" value="1" type=checkbox name="phls">Pharyngeal stop<br>&nbsp;&nbsp;
                      </FONT>
                      <font size="3">
                        <INPUT id="oca" value="1" type=checkbox name="oca">Other Compensatory Articulation
                      </font>
                      <FONT size=3>
                        <INPUT id="wkp" value="1" type=checkbox name="wkp">Weak pressure
                      </FONT>
                      <FONT size=3>
                        <INPUT id="Omission2" value="1" type=checkbox name="Omission2">Omission
                      </FONT>
                      <FONT size=3>
                        <INPUT id="Nasalization" value="1" type=checkbox name="Nasalization">Nasalization
                      </FONT>
                      <font size="3">
                        <LABEL><br>&nbsp;&nbsp; 
                        <INPUT id="other_vpr_ck" value="1" type=checkbox name="other_vpr_ck">Other：
                        </LABEL> 
                      </font>
                      <font size="3">
                        <input id="other_vpr" value="" maxLength="40" size="23" name="other_vpr">
                      </font>
                    </p>
                    <p style="line-height: 150%">&nbsp;&nbsp; 
                    <font size="3">Intelligibility：
                      <LABEL>
                        <INPUT id="Intelligibility" value="OK" type=radio name="Intelligibility" />
                      </LABEL>
                    </font>
                    <font size="3">OK
                      <LABEL>
                        <INPUT id="Intelligibility" value="Mild" type=radio name="Intelligibility">
                      </LABEL>
                    </font>
                    <font size="3">Mild
                      <LABEL>
                        <INPUT id="Intelligibility" value="Severity" type=radio name="Intelligibility">
                      </LABEL>
                    </font>
                    Severity
                  </p>
                  <p style="line-height: 150%">&nbsp;&nbsp; 
                  <font size="3">VP Impression：
                    <LABEL>
                      <INPUT id="VPI" value="Adequate" type=radio name="VPI">
                    </LABEL>
                  </font>
                  <font size="3">Adequate/
                    <LABEL>
                      <INPUT id="VPI" value="pae" type=radio name="VPI">
                    </LABEL>
                  </font>
                  <font size="3">Prob adequate/
                    <LABEL>
                      <INPUT id="VPI" value="Marginal" type=radio name="VPI">
                    </LABEL>
                  </font>
                  <font size="3">Marginal/
                    <LABEL>
                      <INPUT id="VPI" value="Inadequate" type=radio name="VPI" />
                    </LABEL>
                  </font>
                  Inadequate
                </p>
                <p style="line-height: 150%">&nbsp;&nbsp; 
                  <font size="3">Rec：
                    <INPUT id="RecF" value="1" type=checkbox name="RecF">
                  </font>
                  <FONT size=3>F,
                    <INPUT id="RecHP" value="1" type=checkbox name="RecHP" />
                  </FONT>
                  <FONT size=3>Home program,
                    <INPUT id="RecST" value="1" type=checkbox name="RecST">
                  </FONT>
                  <FONT size=3>ST,
                    <INPUT id="RecNPS" value="1" type=checkbox name="RecNPS">
                  </FONT>
                  NPS
                </p>
                <p style="line-height: 150%">&nbsp;&nbsp; 
                <font size="3">Others：<!--  評估報告  Evaluation Report   -->
                  <input id="Other_ER" value="" maxLength="40" size="23" name="Other_ER" />
                </font>
              </td>
            </font>
          </tr>
          <tr>
            <td style="border-style: solid; border-width: 1" width="81">
              <FONT size=3>
                <p style="line-height: 150%">&nbsp;治疗计划</p>
              </FONT>
            </td>
            <td style="border-style: solid; border-width: 1" colspan="3">
						  <p style="line-height: 150%">&nbsp;
                <font size="3">
                  <LABEL>
                    <INPUT id="TTPN" value="NPSCK" type=radio name="TTPN" /> NPS检查
                  </LABEL>
                </font>
                <font size="3">
                  <LABEL>
                    <INPUT id="TTPN" value="SLTT" type=radio name="TTPN"> 手术治疗 <!-- 翻譯 Surgical treatment -->
                  </LABEL>
                </font>
                <font size="3">
                  <LABEL>
                    <INPUT id="TTPN" value="STTT" type=radio name="TTPN"> 语言治疗 ( 预计开始治疗日期：<!-- 翻譯 Speech Therapy -->
                  </LABEL>
                </font>
                <font size="3">
                  <input id="sht_month" maxLength="2" size="2" name="sht_month" value="" /> 月
                </font>
                <font size="3">
                  <input id="sht_day" maxLength="2" size="2" name="sht_day" value="" />日 )
                </font>
                <FONT size=3>
                  <p style="line-height: 150%">&nbsp;(一)预定疗程：<input id="pdmc" maxLength="40" size="23" name="pdmc" value=""></p><!-- 翻譯 Predetermined course -->
                  <p style="line-height: 150%">&nbsp;(二)安排语言治疗项目：<input id="astp" maxLength="40" size="23" name="astp" value=""></p><!-- 翻譯 Arrange speech therapy project -->
                  <p style="line-height: 150%">&nbsp;(三)治疗重点：<input id="tmf" maxLength="40" size="23" name="tmf" value=""></p><!-- 翻譯 Treatment focus -->
                  <p style="line-height: 150%">&nbsp;(四)语言治疗成效评估：<input id="stee" maxLength="40" size="23" name="stee" value=""></p><!-- 翻譯 Speech therapy effectiveness evaluation -->
                  <p style="line-height: 150%">&nbsp;(五)后续治疗计划：</p><!-- 翻譯  -->
                  <p style="line-height: 150%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <LABEL>
                      <INPUT id="fuptp" value="close" type=radio name="fuptp"> 成效良好，结案。
                    </LABEL>
                    
                  </p>
                  <p style="line-height: 150%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <LABEL>
                      <INPUT id="fuptp" value="continue" type=radio name="fuptp" /> 建议仍须继续接受治疗，理由：
                    </LABEL>
                    <input id="fuptp_oth" value="" maxLength="40" size="23" name="fuptp_oth">
                  </p>
                  <p style="line-height: 150%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <LABEL><INPUT id="fuptp" value="1" type=radio name="fuptp"></LABEL>
                    其他：
                      <input id="fuptp_txt" value="" maxLength="40" size="23" name="fuptp_txt" /> 
                  </p>
                </td>
              </tr>
            </table>
          </div>
        </td>
      </tr>
    </table>
    <div align="center">&nbsp;
      <table border="1" cellspacing="1" width="780" id="">
        <tr>
          <td>
            <div align="center">
              <table border="0" cellspacing="1" width="780" id="table51">
                <tr>
                  <td style="border-style: solid; border-width: 1" width="536">
                    <FONT size=3>
						          <p style="line-height: 150%">
                        <i>
                          <strong>
                          <font size="4">&nbsp;申请补助项目【须检具医疗收据复印件、费用明细表复印件】</font>
                          </strong>
                        </i>
                      </p>
                    </FONT>
                  </td>
                  <td style="border-style: solid; border-width: 1">
						        <p style="line-height: 150%">
                      <FONT size=3>&nbsp;NCF补助编号：</FONT>
                    </p>
                  </td>
                </tr>
              </table>
            </div>
            <div align="center">
              <table border="0" cellspacing="1" width="780" id="table52">
                <tr>
                  <td style="border-style: solid; border-width: 1" width="536" valign="top">
                    <FONT size=3>
                      <p style="line-height: 150%">&nbsp;
                        <input id="mlss" type="checkbox" value="1" name="mlss" /><strong>医疗费补助：</strong>
                      </p>
                      <p style="line-height: 150%">&nbsp;&nbsp;医疗费用总计：人民币 
                        <input id="tmcost" maxLength="10" size="5" name="tmcost" value="" /> 元
                      </p>
                      <p style="line-height: 150%">&nbsp;&nbsp;1.申请NCF补助：<br>&nbsp;&nbsp; 
                        <LABEL>
                          <INPUT id="npy_ck" value="1" type=checkbox name="npy_ck"> 鼻咽镜检查费
                        </LABEL>
                        <input id="npy" maxLength="10" size="2" name="npy" value="">元&nbsp; 
                        <LABEL>
                          <INPUT id="lat_ck" value="1" type=checkbox name="lat_ck"> 语言评估费
                        </LABEL>
                          <input id="lat" maxLength="10" size="2" name="lat" value="">元&nbsp; 
                        <LABEL>
                          <INPUT id="spty_ck" value="1" type=checkbox name="spty_ck" /> 语言治疗
                        </LABEL>
                        <input id="spty" maxLength="10" size="2" name="spty" value="" />元<br>&nbsp;&nbsp;&nbsp; 
                        共计人民币
                        <input id="totalRMB" maxLength="10" size="5" name="totalRMB" value="" /> 元，占医疗费用总金额
                        <input id="tRMBps" maxLength="10" size="2" name="tRMBps" value="" /> ％
                      </p>
                      <p style="line-height: 150%">&nbsp; 2.案家自付：人民币
                        <input id="Deductible" maxLength="10" size="5" name="Deductible" value="" /> 元，占医疗费用总金额
                        <input id="ddps" maxLength="10" size="2" name="ddps" value="" /> ％
                      </p>
                    </td>
                    <td style="border-style: solid; border-width: 1" valign="top">
                      <FONT size=3>
                        <p style="line-height: 150%">
                          <strong>&nbsp;<input id="ncfts_ck" type="checkbox" value="1" name="ncfts_ck"> 交通费补助：</strong>
                        </p>
                        <p style="line-height: 150%">&nbsp;&nbsp; 1.NCF补助：人民币
                          <input id="ncftsRMB" maxLength="10" size="3" name="ncftsRMB" value=""> 元
                        </p>
                        <p style="line-height: 150%">&nbsp;&nbsp; 2.案家自付：人民币
                          <input id="selfpay" maxLength="10" size="3" name="selfpay" value=""> 元
                        </p>
                        <p style="line-height: 150%">&nbsp;&nbsp; 3.交通总费用：人民币
                          <input id="tcost" maxLength="10" size="3" name="tcost" value=""> 元
                        </p>
                      </td>
                    </tr>
                  </table>
                </div>
                <div align="center">
                  <table border="0" cellspacing="1" width="780" id="table53">
                    <tr>
                      <FONT size=3>
                        <td style="border-style: solid; border-width: 1" height="38">
                          <p align="center" style="line-height: 150%">
                            <strong>
                              <font size="4">申请NCF补助费用总金额为：人民币<input id="totalNCF" maxLength="40" size="6" name="totalNCF" value="" /> 元</font>
                            </strong>
                          </p>
                        </td>
                      </FONT>
                    </tr>
                  </table>
                </div>
                <FONT size=3>
                  <div align="center">
                    <table border="0" cellspacing="1" width="100%" id="table54">
                      <tr>
                        <td style="border-style: solid; border-width: 1">
                          <p align="center" style="line-height: 150%">
                            <FONT size=3><strong> 上传其它资料【注：病患签名处的补助凭证在此上传】</strong></FONT>
                          </p>
                          <p align="center" style="line-height: 150%"><font size="3">附件一：<br>
                            <input type="file" size="25" name="pedigree_graphics_other1" value="" /></font>
                          </p>
                          <p align="center" style="line-height: 150%">
                            <FONT size=3>附件二：<br>
                              <input type="file" size="25" name="pedigree_graphics_other2" value="" />
                            </FONT>
                          </p>
                          <p align="center" style="line-height: 150%">
                            <FONT size=3>附件三：<br>
                              <input type="file" size="25" name="pedigree_graphics_other3" value="" />
                            </FONT>
                          </p>
                          <p align="center" style="line-height: 150%">
                            <FONT size=3>附件四：<br>
                              <input type="file" size="25" name="pedigree_graphics_other4" value="" />
                            </FONT>
                          </p>
                          <p align="center" style="line-height: 150%">
                            <FONT size=3>附件五：<br>
                              <input type="file" size="25" name="pedigree_graphics_other5" value="" />
                            </FONT>
                          </p>
                          <p align="center" style="line-height: 150%">
                            <FONT size=3>附件六：<br>
                              <input type="file" size="25" name="pedigree_graphics_other6" value="" />
                            </FONT>
                          </p>
                          <p align="center" style="line-height: 150%">
                            <FONT size=3>附件七：<br>
                              <input type="file" size="25" name="pedigree_graphics_other7" value="" />
                            </FONT>
                          </p>
                          <p align="center" style="line-height: 150%">
                            <FONT size=3>附件八：<br>
                              <input type="file" size="25" name="pedigree_graphics_other8" value="" />
                            </FONT>
                          </p>
                          <p align="center" style="line-height: 150%">
                            <FONT size=3>附件九：<br>
                              <input type="file" size="25" name="pedigree_graphics_other9" value="" />
                            </FONT>
                          </p>
                          <p align="center" style="line-height: 150%">
                            <FONT size=3>附件十：<br>
                              <input type="file" size="25" name="pedigree_graphics_other10" value="" />
                            </FONT>
                          </p>
                          <p align="center" style="line-height: 150%">&nbsp;</p>
                      </td>
                    </tr>
                  </table>
                </div>
              </td>
            </tr>
          </table>
        </div>
        <br/>
      </div>
      <DIV align=center>
        <TABLE border=0 cellSpacing=1 width=780 id="table36">
          <TBODY>
            <TR>
              <TD>
                <P align=center style="line-height: 150%">
                  <FONT size=3>
                    <INPUT id="save" onclick="return saveData('save')" value="储存" type="button" name="save">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <INPUT id="close" onclick="return saveData('cancelAdd')" value="取消" type="button" name="close">
                  </FONT>
                </P>
              </TD>
            </TR>
          </TBODY>
        </TABLE>
      </DIV>
      <CENTER>
        <p style="line-height: 150%"></p>
      </CENTER>
    </TD>
  </TR>
</TBODY></TABLE></DIV></FONT></CENTER></TD></TR>
        <TR>
          <TD height=1 width="100%" align=middle>
            <HR color=#c0c0c0 SIZE=1 width="98%">

            <P align=center style="line-height: 150%"><I><FONT size=2><FONT color=#999999
            face=Arial>The&nbsp; Web&nbsp; Best&nbsp; Browse&nbsp; Mode
            </FONT><FONT color=#999999>： </FONT><FONT face=Arial><FONT
            color=#999999>Internet&nbsp; Explorer&nbsp; 6.02 (Or Update)&nbsp;
            /&nbsp; 800 x 600&nbsp; Resolution<BR>Copyright <span lang="zh-tw">©</span>&nbsp;&nbsp;
            </FONT><A href="http://www.nncf.org/" target=_blank><FONT
            color=#0066cc>Noordhoff&nbsp; Craniofacial&nbsp;
            Foundation<BR><BR></FONT></A></FONT></FONT></I></P></TD></TR></TBODY></TABLE></DIV></TD></TR></TBODY></TABLE></CENTER></DIV>
            <input type="hidden" name="patientID" value="<? echo $seid; ?>">
              <input type="hidden" name="remark" value="">
              <input type="hidden" name="NCFID" value="<? echo $NCFNumX; ?>">
              <input type="hidden" name="NCFMedicalNum" value="<? echo $NCFMedicalNumNow; ?>">
              <!--<input type="hidden" name="branch" value="3">-->
              <input type="hidden" name="serialcode" value="<?PHP echo $serialcode; ?>">
              <INPUT value="3" type=hidden name="branch"> 
      </FORM>
    </BODY>
</HTML>
<?PHP
  
      }else{
        echo "<Script Language='JavaScript'>";
        echo "alert('抱歉您现在无权限读取,请先登入')\;";
        echo " location.href=\'login.php\'\;";
        echo " </Script>";
      }
  
?>