<?PHP
    @session_start();

    include 'db.php';

    $seid = $_SESSION["seid"];
    $sepwd = $_SESSION["sepwd"];

    if( (!empty($seid)) && (!empty($sepwd)) ){

      $CPIData = $_GET["cpi"];
      $ncfmn = $_GET["n"];
      $ncfmednum = "CN".$ncfmn;

      //echo "NCFMN: ".$ncfmn."<br/>";

      //搜尋語言治療病歷表
      $sCNPatRec = "SELECT * FROM `patient_cn_lang_record` WHERE num = ".$CPIData."";
      $qCNPatRec = mysql_query($sCNPatRec);
      $resultChinaPatientRecord = mysql_fetch_array($qCNPatRec);

      //搜寻病患病例表
      $sCNPatInfo = "SELECT * FROM `patient-china` WHERE NCFID = '".$resultChinaPatientRecord['NCFID']."'";
      $qCNPatInfo = mysql_query($sCNPatInfo);
      $resultChinaPatientinfo = mysql_fetch_array($qCNPatInfo);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<!-- saved from url=(0057)http://www.seed-nncf.org/china/for-pla-add-china-cgmh.php -->
<HTML>
	<HEAD>
		<TITLE>NCF -- Patient Record Online Management System</TITLE>
		<META content="text/html; charset=utf-8" http-equiv=Content-Type>
	</HEAD>
	<BODY topMargin=2>
	<FORM Enctype="multipart/form-data" method="post" name="china_medical" action="">
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
                  <TABLE border=1 cellSpacing=0 cellPadding=0 width="100%" bgColor=#ff9966 height=40 id="table14">
                    <TBODY>
                        <!--
                            Top Bar zone.
                        -->
                    	<TR>
                      		<TD>
                        		<P align=center style="line-height: 150%">
                        			<FONT color=#000000 size=4>
                        				<I><B>
                        					<SPAN>
                                                                                        <?php
                                                                                            if($resultChinaPatientinfo['school']  == "C" )
                                                                                            {
                                                                                                echo  "西安交通大学口腔医院";
                                                                                            } elseif ($resultChinaPatientinfo['school']  == "S") {
                                                                                                echo "中国医学科学院北京协和医院";
                                                                                            }
                                                                                        ?>
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
                                <FONT size=3>&nbsp;
				<?PHP echo $resultChinaPatientinfo['caseYear']; ?>年
				<?PHP echo $resultChinaPatientinfo['caseMonth']; ?> 月
				<?PHP echo $resultChinaPatientinfo['caseDay']; ?> 日</FONT>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=118>
                               <p style="line-height: 150%"><FONT size=3>&nbsp;NCF个案编号</FONT>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=224>&nbsp;<?PHP echo $resultChinaPatientinfo['NCFID']; ?></TD>
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
                              <p style="line-height: 150%"><FONT size=3>&nbsp;<?PHP echo $resultChinaPatientinfo['surgeryDrName']; ?></FONT>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid">
                              <p style="line-height: 150%"><FONT size=3>&nbsp;语言治疗师</FONT>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid">
                              <p style="line-height: 150%"><FONT size=3>&nbsp;<?PHP echo $resultChinaPatientinfo['languageTherapist']; ?></FONT>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid">
                              <p style="line-height: 150%"><FONT size=3>&nbsp;正畸科医师</FONT>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid">
                              <p style="line-height: 150%"><FONT size=3>&nbsp;<?PHP echo $resultChinaPatientinfo['orthodontics']; ?></FONT>
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
                              <p style="line-height: 150%"><FONT size=3>&nbsp;<?PHP echo $resultChinaPatientinfo['idno']; ?></FONT>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=89>
                              <p style="line-height: 150%"><FONT size=3>&nbsp;病历号码</FONT>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=203>
                              <p style="line-height: 150%"><FONT size=3>&nbsp;<?PHP echo $resultChinaPatientinfo['MedicalRecordNumber']; ?></FONT>
                            </TD>
                          </TR>
                          <TR>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=135>
                              <p style="line-height: 150%"><FONT size=3>*个案姓名</FONT>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=290>
                              <p style="line-height: 150%"><FONT size=3>&nbsp;<?PHP echo $resultChinaPatientinfo['name']; ?></FONT>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=89>
                              <p style="line-height: 150%"><FONT size=3>*性　别</FONT>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=203>
                              <p style="line-height: 150%"><FONT size=3>
                                <LABEL>
                                <?PHP
                                        if($resultChinaPatientinfo['gender'] == "M")
                                        {
                                            echo "男";
                                       }else{
                                            echo "女";
                                       }
                                ?>
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
			 <?PHP echo $resultChinaPatientinfo['birthYear']; ?> 年&nbsp;
                                  <?PHP echo $resultChinaPatientinfo['birthMonth']; ?> 月
                                  <?PHP echo $resultChinaPatientinfo['birthDay']; ?> 日
                                </FONT>
                              </p>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=89>
                              <p style="line-height: 150%"><FONT size=3>&nbsp;职　业</FONT>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=203>
                              <p style="line-height: 150%">
                                <FONT size=3>&nbsp;<?PHP echo $resultChinaPatientinfo['profession']; ?></FONT>
                              </p>
                            </TD>
                          </TR>
                          <TR>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=135>
                              <p style="line-height: 150%"><FONT size=3>&nbsp;&nbsp;电　话</FONT></p>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=290>
                              <p style="line-height: 150%"><FONT size=3>&nbsp;<?PHP echo $resultChinaPatientinfo['tel']; ?></FONT></p>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=89>
                              <p style="line-height: 150%"><FONT size=3>&nbsp;教育程度</FONT></p>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=203>
                              <p style="line-height: 150%"><FONT size=3>&nbsp;<?PHP echo $resultChinaPatientinfo['education']; ?></FONT></p>
                            </TD>
                          </TR>
                          <TR>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=135>
                              <p style="line-height: 150%"><FONT size=3>*住　址</FONT></p>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=592 colSpan=3>
                              <p style="line-height: 150%">
                                <FONT size=3>&nbsp;<?PHP echo $resultChinaPatientinfo['address']; ?></FONT>
                              </p>
                            </TD>
                          </TR>
                          <TR>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=135>
                              <p style="line-height: 150%"><FONT size=3>&nbsp;重要联系人</FONT></p>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=290>
                              <p style="line-height: 150%"><FONT size=3>&nbsp;<?PHP echo $resultChinaPatientinfo['contactperson']; ?></FONT></p>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=89>
                              <p style="line-height: 150%"><FONT size=3>&nbsp;与个案关系</FONT></p>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=203>
                              <p style="line-height: 150%">
                                <FONT size=3>&nbsp;
                                  <?PHP echo $resultChinaPatientinfo['relationship']; ?>
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
                                  自宅：<?PHP echo $resultChinaPatientinfo['phone']; ?><br>
                                </FONT>
                                <FONT size=3>&nbsp;
                                  手机：<?PHP echo $resultChinaPatientinfo['cellphone']; ?>
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
				<?PHP echo $resultChinaPatientinfo['h2hdistance']; ?>
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
                              <p style="line-height: 150%"><FONT size=3>&nbsp;<?PHP echo $resultChinaPatientinfo['height']; ?> 公分</FONT></p>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=89>
                              <p style="line-height: 150%"><FONT size=3>*体　重</FONT></p>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=203>
                              <p style="line-height: 150%"><FONT size=3>&nbsp;<?PHP echo $resultChinaPatientinfo['weight']; ?> 公斤</FONT></p>
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
                                <INPUT id="diagnosis_unilateral_cleft_lip_1" value="UCL" type=checkbox name="diagnosis_unilateral_cleft_lip_1" <? if(($resultChinaPatientinfo['diagnosis_unilateral_cleft_lip_1'] == "UCL") || ($resultChinaPatientinfo['diagnosis_unilateral_cleft_lip_1'] == "1")){ echo "checked"; } ?>>单侧唇裂 (
                                <INPUT id="diagnosis_unilateral_cleft_lip" value="C" type=radio name="diagnosis_unilateral_cleft_lip" <? if($resultChinaPatientinfo['diagnosis_unilateral_cleft_lip'] == "C"){ echo "checked"; } ?>>完全性
                                <INPUT id="diagnosis_unilateral_cleft_lip" value="IC" type=radio name="diagnosis_unilateral_cleft_lip" <? if($resultChinaPatientinfo['diagnosis_unilateral_cleft_lip'] == "IC"){ echo "checked"; } ?>>不完全性
                                <INPUT id="diagnosis_unilateral_cleft_lip" value="CK" type=radio name="diagnosis_unilateral_cleft_lip" <? if($resultChinaPatientinfo['diagnosis_unilateral_cleft_lip'] == "CK"){ echo "checked"; } ?>>隐裂
                                )
                              </FONT>
                              </p>
                              <p style="line-height: 150%">
                                <FONT size=3>&nbsp;
                                  <INPUT id="diagnosis_bilateral_cleft_lip_2" value="BCL" type=checkbox name="diagnosis_bilateral_cleft_lip_2" <? if(($resultChinaPatientinfo['diagnosis_bilateral_cleft_lip_2'] == "BCL") || ($resultChinaPatientinfo['diagnosis_bilateral_cleft_lip_2'] == "1")){ echo "checked"; } ?>>双侧唇裂 (
                                  <INPUT id="diagnosis_bilateral_cleft_lip" value="C" type=radio name="diagnosis_bilateral_cleft_lip" <? if($resultChinaPatientinfo['diagnosis_bilateral_cleft_lip'] == "C"){ echo "checked"; } ?>>完全性
                                  <INPUT id="diagnosis_bilateral_cleft_lip" value="IC" type=radio name="diagnosis_bilateral_cleft_lip" <? if($resultChinaPatientinfo['diagnosis_bilateral_cleft_lip'] == "IC"){ echo "checked"; } ?>>不完全性
                                  <INPUT id="diagnosis_bilateral_cleft_lip" value="MCK" type=radio name="diagnosis_bilateral_cleft_lip" <? if($resultChinaPatientinfo['diagnosis_bilateral_cleft_lip'] == "MCK"){ echo "checked"; } ?>>混合裂
                                  )
                                </FONT>
                              </p>
                              <P style="line-height: 150%">&nbsp;
                                <FONT size=3>
                                  <LABEL>
                                    <INPUT id="CleftPalate" value="CP" type=checkbox name="CleftPalate" <? if($resultChinaPatientinfo['CleftPalate'] == "CP"){ echo "checked"; } ?>>
                                  </LABEL>颚裂 －
                                  <LABEL>
                                    <INPUT id="complete_main" value="IC" type=radio name="complete_main" <? if($resultChinaPatientinfo['complete_main'] == "IC"){ echo "checked"; } ?>>
                                  </LABEL>不完全性 (
                                    <LABEL>
                                      <INPUT id="incomplete" value="SCC" type=radio name="incomplete" <? if($resultChinaPatientinfo['incomplete'] == "SCC"){ echo "checked"; } ?>>
                                    </LABEL>粘膜下裂
                                    <LABEL>
                                      <INPUT id="incomplete" value="CU" type=radio name="incomplete" <? if($resultChinaPatientinfo['incomplete'] == "CU"){ echo "checked"; } ?>>
                                    </LABEL>悬雍垂裂
                                    <LABEL>
                                      <INPUT id="incomplete" value="SP" type=radio name="incomplete" <? if($resultChinaPatientinfo['incomplete'] == "SP"){ echo "checked"; } ?>>
                                    </LABEL>软颚裂
                                      <INPUT id="incomplete" value="BC" type=radio name="incomplete" <? if($resultChinaPatientinfo['incomplete'] == "BC"){ echo "checked"; } ?>>双侧裂)<BR>
                                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  －
                                  <LABEL>
                                    <INPUT id="complete_main" value="C" type=radio name="complete_main" <? if($resultChinaPatientinfo['complete_main'] == "C"){ echo "checked"; } ?> />
                                  </LABEL> 完全性 (
                                    <INPUT id="complete" value="U" type=radio name="complete" <? if($resultChinaPatientinfo['complete'] == "U"){ echo "checked"; } ?>>单侧
                                    <INPUT id="complete" value="B" type=radio name="complete" <? if($resultChinaPatientinfo['complete'] == "B"){ echo "checked"; } ?>>双侧 )
                                </FONT>
                              </P>
                              <P style="line-height: 150%">
                                <FONT size=3>&nbsp;
                                  <INPUT id="BoneGraft_main" value="BoneGraft" type=checkbox name="BoneGraft_main" <? if($resultChinaPatientinfo['BoneGraft_main'] == "BoneGraft"){ echo "checked"; } ?> />牙槽突裂 (
                                    <INPUT id="BoneGraft_select" value="C" type=radio name="BoneGraft_select" <? if($resultChinaPatientinfo['BoneGraft_select'] == "C"){ echo "checked"; } ?>/>完全性
                                    <INPUT id="BoneGraft_select" value="IC" type=radio name="BoneGraft_select" <? if($resultChinaPatientinfo['BoneGraft_select'] == "IC"){ echo "checked"; } ?>/>不完全性
                                    <INPUT id="BoneGraft_select" value="CK" type=radio name="BoneGraft_select" <? if($resultChinaPatientinfo['BoneGraft_select'] == "CK"){ echo "checked"; } ?>/>隐裂 )
                                </FONT>
                              </P>
                              <P style="line-height: 150%">
                                <FONT size=3>&nbsp;
                                  <INPUT id="Combined_with_other_craniofacial_disorders" value=Other type=checkbox name="Combined_with_other_craniofacial_disorders" <? if($resultChinaPatientinfo['Combined_with_other_craniofacial_disorders'] == "Other"){ echo "checked"; } ?>>合并其它颅颜病症：
                                  <?PHP echo $resultChinaPatientinfo['Combined_with_other_craniofacial_disorders_text']; ?>
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
                                  <LABEL><INPUT id="Cleft_lip_and_palate_surgery" value="Y" type=radio name="Cleft_lip_and_palate_surgery" <? if($resultChinaPatientinfo['Cleft_lip_and_palate_surgery'] == "Y"){ echo "checked"; } ?>>是</LABEL>
                                </FONT>
                              </P>
                              <P style="line-height: 150%">
                                <FONT size=3>&nbsp;&nbsp;&nbsp;&nbsp;
                                  <LABEL><INPUT id="beforeSurgery_1" value="1LNR" type=checkbox name="beforeSurgery_1" <? if($resultChinaPatientinfo['beforeSurgery_1'] == "1LNR"){ echo "checked"; } ?>>一期唇鼻修复</LABEL>
                                  <LABEL><INPUT id="beforeSurgery_2" value="1BLANR" type=checkbox name="beforeSurgery_2" <? if($resultChinaPatientinfo['beforeSurgery_2'] == "1BLANR"){ echo "checked"; } ?>>一期双侧唇鼻修复</LABEL>
                                  <LABEL><INPUT id="beforeSurgery_3" value="1CPR" type=checkbox name="beforeSurgery_3" <? if($resultChinaPatientinfo['beforeSurgery_3'] == "1CPR"){ echo "checked"; } ?>>一期颚裂修复</LABEL>
                                  <LABEL><INPUT id="beforeSurgery_4" value="FHR" type=checkbox name="beforeSurgery_4" <? if($resultChinaPatientinfo['beforeSurgery_4'] == "FHR"){ echo "checked"; } ?>>廔孔修复</LABEL>
                                  <LABEL><INPUT id="beforeSurgery_5" value="PF" type=checkbox name="beforeSurgery_5" <? if($resultChinaPatientinfo['beforeSurgery_5'] == "PF"){ echo "checked"; } ?>>咽瓣修复</LABEL>
                                  <LABEL><INPUT id="beforeSurgery_6" value="PBR" type=checkbox name="beforeSurgery_6" <? if($resultChinaPatientinfo['beforeSurgery_6'] == "PBR"){ echo "checked"; } ?>>梨骨瓣修复</LABEL>
                                </FONT>
                              </P>
                              <P style="line-height: 150%">
                                <FONT size=3>&nbsp;&nbsp;&nbsp;&nbsp;
                                  <INPUT id="beforeSurgery_7" value="2CPR" type=checkbox name="beforeSurgery_7" <? if($resultChinaPatientinfo['beforeSurgery_7'] == "2CPR"){ echo "checked"; } ?>>二期颚裂(颚咽)修复
                                  <INPUT id="beforeSurgery_8" value="LR" type=checkbox name="beforeSurgery_8" <? if($resultChinaPatientinfo['beforeSurgery_8'] == "LR"){ echo "checked"; } ?>>唇鼻整形
                                  <INPUT id="beforeSurgery_9" value="AB" type=checkbox name="beforeSurgery_9" <? if($resultChinaPatientinfo['beforeSurgery_9'] == "AB"){ echo "checked"; } ?>>齿槽植骨
                                  <INPUT id="beforeSurgery_10" value="PO" type=checkbox name="beforeSurgery_10" <? if($resultChinaPatientinfo['beforeSurgery_10'] == "PO"){ echo "checked"; } ?>>术前正畸
                                  <INPUT id="beforeSurgery_11" value="SL" type=checkbox name="beforeSurgery_11" <? if($resultChinaPatientinfo['beforeSurgery_11'] == "SL"){ echo "checked"; } ?>>语言治疗
                                </FONT>
                              </P>
                              <P style="line-height: 150%">
                                <FONT size=3>&nbsp;&nbsp;&nbsp;&nbsp;
                                  <INPUT id="beforeSurgery_other" value="other" type=checkbox name="beforeSurgery_other" <? if($resultChinaPatientinfo['beforeSurgery_other'] == "other"){ echo "checked"; } ?>/>其它，请详述：
                                  <?PHP echo $resultChinaPatientinfo['beforeSurgery_other_reason']; ?>
                                </FONT>
                              </P>
                              <P style="line-height: 150%">
                                <LABEL><FONT size=3>&nbsp;<INPUT id="Cleft_lip_and_palate_surgery" value="N" type=radio name="Cleft_lip_and_palate_surgery" <? if($resultChinaPatientinfo['Cleft_lip_and_palate_surgery'] == "N"){ echo "checked"; } ?>>否</FONT></LABEL>
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
                                    <?PHP echo $resultChinaPatientinfo['familyMembers']; ?> 人；同住
                                    <?PHP echo $resultChinaPatientinfo['live_together']; ?> 人
                                  </FONT>
                                </p>
                              </TD>
                            </TR>
                            <TR>
                              <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=83>
                                <p style="line-height: 150%"><FONT size=3>&nbsp;父亲年龄</FONT>
                              </TD>
                              <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=115>
                                <p style="line-height: 150%"><FONT size=3>&nbsp;<?PHP echo $resultChinaPatientinfo['fatherAge']; ?> 岁</FONT></p>
                              </TD>
                              <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=44>
                                <p style="line-height: 150%"><FONT size=3>&nbsp;职业</FONT>
                              </TD>
                              <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=198>
                                <p style="line-height: 150%">
                                  <FONT size=3>&nbsp;<?PHP echo $resultChinaPatientinfo['fatherProfession_main']; ?></FONT>
                                </p>
                              </TD>
                              <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=79>
                                <p style="line-height: 150%"><FONT size=3>&nbsp;教育程度</FONT></p>
                              </TD>
                              <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=221>
                                <p style="line-height: 150%">
                                  <FONT size=3>
                                  	<?PHP echo $resultChinaPatientinfo['fatherProfession']; ?>
                                  </FONT>
                                </p>
                              </TD>
                            </TR>
                            <TR>
                              <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=83>
                                <p style="line-height: 150%"><FONT size=3>&nbsp;母亲年龄</FONT>
                              </TD>
                              <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=115>
                                <p style="line-height: 150%"><FONT size=3>&nbsp;<?PHP echo $resultChinaPatientinfo['motherAge']; ?> 岁</FONT></p>
                              </TD>
                              <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=44>
                                <p style="line-height: 150%"><FONT size=3>&nbsp;职业</FONT>
                              </TD>
                              <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=198>
                                <p style="line-height: 150%"><FONT size=3>&nbsp;<?PHP echo $resultChinaPatientinfo['motherProfession_main']; ?></FONT>
                              </TD>
                              <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=79>
                                <p style="line-height: 150%"><FONT size=3>&nbsp;教育程度</FONT>
                              </TD>
                              <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=221>
                                <p style="line-height: 150%">
                                  <FONT size=3>
                                  	<?PHP echo $resultChinaPatientinfo['motherProfession']; ?>
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
                                  <?PHP echo $resultChinaPatientinfo['descriptionCaseFamily']; ?>
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
                                <?PHP echo $resultChinaPatientinfo['mainSourceofIncome']; ?></FONT>
                              </p>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width="13%">
                              <p style="line-height: 150%">
                                <FONT size=3>&nbsp;平均年收入</FONT>
                              </p>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width="32%">
                              <p style="line-height: 150%">
                                <FONT size=3>&nbsp;<?PHP echo $resultChinaPatientinfo['income']; ?> (人民币)</FONT>
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
                                  <LABEL>&nbsp;1. <?PHP echo $resultChinaPatientinfo['fixedExpenditure1']; ?></LABEL><BR>
                                  <LABEL>&nbsp;2. <?PHP echo $resultChinaPatientinfo['fixedExpenditure2']; ?></LABEL><BR>
                                  <LABEL>&nbsp;3. <?PHP echo $resultChinaPatientinfo['fixedExpenditure3']; ?></LABEL><BR>
                                  <LABEL>&nbsp;4. <?PHP echo $resultChinaPatientinfo['fixedExpenditure4']; ?></LABEL>
                                </FONT>
                              </p>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width="13%">
                              <p style="line-height: 150%"><FONT size=3>&nbsp;预估支出</FONT></p>
                            </TD>
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width="32%">
                              <p style="line-height: 150%"><FONT size=3>&nbsp;平均每月生活支出
                                <?PHP echo $resultChinaPatientinfo['extimatedExpenditures']; ?><br/>(人民币)
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
					<?PHP echo $resultChinaPatientRecord['BIHosTimeYear']; ?> 年
                            			<?PHP echo $resultChinaPatientRecord['BIHosTimeMonth']; ?> 月
                            			<?PHP echo $resultChinaPatientRecord['BIHosTimeDay']; ?> 日
                          		</font>
                        	</p>
                      </td>
                      <td style="border-style: solid; border-width: 1">
			<p style="line-height: 150%">*语言治疗师</p>
                      </td>
                      <td style="border-style: solid; border-width: 1">
			<p style="line-height: 150%">
                          		<font size="3">&nbsp;
                            			 <?PHP echo $resultChinaPatientRecord['speechDr']; ?> 
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
                              			<INPUT id="hypernasality" value="1" type=checkbox name="hypernasality" <? if($resultChinaPatientRecord['hypernasality'] == "1"){ echo "checked"; } ?>>Hypernasality (
                                			<INPUT id="mild" value="1" type=checkbox name="mild" <? if($resultChinaPatientRecord['mild'] == "1"){ echo "checked"; } ?>>mild
					<INPUT id="moderate" value="1" type=checkbox name="moderate" <? if($resultChinaPatientRecord['moderate'] == "1"){ echo "checked"; } ?>>moderate
					<INPUT id="severity" value="1" type=checkbox name="severity" <? if($resultChinaPatientRecord['severity'] == "1"){ echo "checked"; } ?>>severity )
					<INPUT id="hyponasality" value="1" type=checkbox name="hyponasality" <? if($resultChinaPatientRecord['hyponasality'] == "1"){ echo "checked"; } ?>>Hyponasality
					<br/>
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<INPUT id="mix" value="1" type=checkbox name="mix" <? if($resultChinaPatientRecord['mix'] == "1"){ echo "checked"; } ?>>Mix
					<INPUT id="cdsr" value="1" type=checkbox name="cdsr" <? if($resultChinaPatientRecord['cdsr'] == "1"){ echo "checked"; } ?>>Cul-de-sac resonance
                            		</font>
                          	</p>
			<p style="line-height: 150%">&nbsp;Nasal Emission
                            		<font size="3">：
                              			<INPUT id="visble" value="1" type=checkbox name="visble" <? if($resultChinaPatientRecord['visble'] == "1"){ echo "checked"; } ?> />visble (
                            		</font>
                            		<FONT size=3>
                              			<INPUT id="rt" value="1" type=checkbox name="rt" <? if($resultChinaPatientRecord['rt'] == "1"){ echo "checked"; } ?> />Rt,
                            		</FONT>
                            		<FONT size=3>
					<INPUT id="lt" value="1" type=checkbox name="lt" <? if($resultChinaPatientRecord['lt'] == "1"){ echo "checked"; } ?> />Lt,
                            		</FONT>
                            		<FONT size=3>
                              			<INPUT id="bil" value="1" type=checkbox name="bil" <? if($resultChinaPatientRecord['bil'] == "1"){ echo "checked"; } ?>>Bil ),
                            		</FONT>
                            		<FONT size=3>
                              			<INPUT id="audible" value="1" type=checkbox name="audible" <? if($resultChinaPatientRecord['audible'] == "1"){ echo "checked"; } ?>>Audible,
                            		</FONT>
                            		<FONT size=3>
                              			<INPUT id="nt" value="1" type=checkbox name="nt" <? if($resultChinaPatientRecord['nt'] == "1"){ echo "checked"; } ?>>Nasal turbulence
                            		</FONT>
                          	</p>
			<p style="line-height: 150%">&nbsp;Grimace
                            		<font size="3">：</font>
                            		<LABEL>
                              			<FONT size=3>
                                				<INPUT id="Grimace" value="Y" type=radio name="Grimace" <? if($resultChinaPatientRecord['Grimace'] == "Y"){ echo "checked"; } ?> />
                              			</FONT>
                            		</LABEL>Yes
                            		<LABEL>
                              			<FONT size=3>
                                				<INPUT id="Grimace" value="N" type=radio name="Grimace" <? if($resultChinaPatientRecord['Grimace'] == "N"){ echo "checked"; } ?> />
                              			</FONT>
                            		</LABEL>No
                          	</p>
						              <p style="line-height: 150%">&nbsp;Phonaton
                            <font size="3">：
                              <INPUT id="hsn" value="1" type=checkbox name="hsn" <? if($resultChinaPatientRecord['hsn'] == "1"){ echo "checked"; } ?> />
                            </font>
                            <LABEL>
                              <FONT size=3>Hoarseness,</font>
                            </LABEL>
                              <FONT size=3>
                                <INPUT id="lp" value="1" type=checkbox name="lp" <? if($resultChinaPatientRecord['lp'] == "1"){ echo "checked"; } ?> />
                              </FONT>
                            <LABEL>
                              <FONT size=3>Low pitched,</font>
                            </LABEL>
                              <FONT size=3>
						                    <INPUT id="rl" value="1" type=checkbox name="rl" <? if($resultChinaPatientRecord['rl'] == "1"){ echo "checked"; } ?> />
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
                              <INPUT id="Omission_ck" value="1" type=checkbox name="Omission_ck" <? if($resultChinaPatientRecord['Omission_ck'] == "1"){ echo "checked"; } ?> />
                              <?PHP echo $resultChinaPatientRecord['Omission']; ?>
                            </font>
                            <font size="3"> / 声随韵母鼻音省略：<!-- 翻譯 With nasal vowel sound -->
                              <INPUT id="nvs_ck" value="1" type=checkbox name="nvs_ck" <? if($resultChinaPatientRecord['nvs_ck'] == "1"){ echo "checked"; } ?> />
                              <?PHP echo $resultChinaPatientRecord['nvs']; ?><br>
                            </font>&nbsp;&nbsp; 介音省略： <!-- 翻譯 Medial omitted -->
                            <font size="3">
                              <INPUT id="mo_ck" value="1" type=checkbox name="mo_ck" <? if($resultChinaPatientRecord['mo_ck'] == "1"){ echo "checked"; } ?> />
                              <?PHP echo $resultChinaPatientRecord['mo']; ?>
                            </font>
                            <font size="3"> / 复韵母简化：<!-- 翻譯 Simplify complex vowel -->
                              <INPUT id="scv_ck" value="1" type=checkbox name="scv_ck" <? if($resultChinaPatientRecord['scv_ck'] == "1"){ echo "checked"; } ?> />
                              <?PHP echo $resultChinaPatientRecord['scv']; ?><br>
                            </font>&nbsp;&nbsp;
                            <font size="3">赘加声母：(CV－CCV)<!-- 翻譯  -->
                              <INPUT id="CVCCV_ck" value="1" type=checkbox name="CVCCV_ck" <? if($resultChinaPatientRecord['CVCCV_ck'] == "1"){ echo "checked"; } ?> />
                              <?PHP echo $resultChinaPatientRecord['CVCCV']; ?>
                            </FONT>
                            <font size="3"> / 赘加韵母：(CV－－CVV)
                              <INPUT id="CVCVV_ck" value="1" type=checkbox name="CVCVV_ck" <? if($resultChinaPatientRecord['CVCVV_ck'] == "1"){ echo "checked"; } ?>/>
                              <?PHP echo $resultChinaPatientRecord['CVCVV']; ?>
                            </FONT>
                          </p>
                          <p style="line-height: 150%">
                            <font size="3">&nbsp;位置替代历程：<br>&nbsp;&nbsp; Fronting：
                              <INPUT id="Fronting_ck" value="1" type=checkbox name="Fronting_ck" <? if($resultChinaPatientRecord['Fronting_ck'] == "1"){ echo "checked"; } ?> />
                              <?PHP echo $resultChinaPatientRecord['Fronting']; ?>
                            </font>
                            <font size="3"> / Backing：
                              <INPUT id="Backing_ck" value="1" type=checkbox name="Backing_ck" <? if($resultChinaPatientRecord['Backing_ck'] == "1"){ echo "checked"; } ?>>
                              <?PHP echo $resultChinaPatientRecord['Backing']; ?><br>
                            </font>&nbsp;&nbsp;
                            <font size="3">舌面音替代：<!-- 翻譯 Lingual sound alternative -->
                              <INPUT id="lsa_ck" value="1" type=checkbox name="lsa_ck" <? if($resultChinaPatientRecord['lsa_ck'] == "1"){ echo "checked"; } ?>>
                              <?PHP echo $resultChinaPatientRecord['lsa']; ?>
                            </font>
                            <font size="3"> / 舌尖音替代：<!-- 翻譯 Alternative Retroflex -->
                              <INPUT id="arx_ck" value="1" type=checkbox name="arx_ck" <? if($resultChinaPatientRecord['arx_ck'] == "1"){ echo "checked"; } ?>>
                              <?PHP echo $resultChinaPatientRecord['arx']; ?>
                            </font>
                          </p>
                          <p style="line-height: 150%">&nbsp;
                          <font size="3">方法替代历程：<br></font>&nbsp;&nbsp;
                          <font size="3">Stopping：
                            <INPUT id="Stopping_ck" value="1" type=checkbox name="Stopping_ck" <? if($resultChinaPatientRecord['Stopping_ck'] == "1"){ echo "checked"; } ?>>
                            <?PHP echo $resultChinaPatientRecord['Stopping']; ?>
                          </font>
                          <font size="3"> / Affrication：
                            <INPUT id="Affrication_ck" value="1" type=checkbox name="Affrication_ck" <? if($resultChinaPatientRecord['Affrication_ck'] == "1"){ echo "checked"; } ?>/>
                            <?PHP echo $resultChinaPatientRecord['Affrication']; ?><br>
                          </font>&nbsp;&nbsp;
                          <font size="3">Deaffrication：
                            <INPUT id="Deaffrication_ck" value="1" type=checkbox name="Deaffrication_ck" <? if($resultChinaPatientRecord['Deaffrication_ck'] == "1"){ echo "checked"; } ?> />
                            <?PHP echo $resultChinaPatientRecord['Deaffrication']; ?>
                          </font>
                          <font size="3"> / Aspiration：
                            <INPUT id="Aspiration_ck" value="1" type=checkbox name="Aspiration_ck" <? if($resultChinaPatientRecord['Aspiration_ck'] == "1"){ echo "checked"; } ?> />
                            <?PHP echo $resultChinaPatientRecord['Aspiration']; ?><br>
                          </font>&nbsp;&nbsp;
                          <font size="3">Unaspiration：
                            <INPUT id="Unaspiration_ck" value="1" type=checkbox name="Unaspiration_ck" <? if($resultChinaPatientRecord['Unaspiration_ck'] == "1"){ echo "checked"; } ?> />
                            <?PHP echo $resultChinaPatientRecord['Unaspiration']; ?>
                          </font>
                          <font size="3"> / Naslization：
                            <INPUT id="Naslization_ck" value="1" type=checkbox name="Naslization_ck" <? if($resultChinaPatientRecord['Naslization_ck'] == "1"){ echo "checked"; } ?> />
                            <?PHP echo $resultChinaPatientRecord['Naslization']; ?><br>
                          </font>&nbsp;&nbsp;
                          <font size="3">Lateralization：
                            <INPUT id="Lateralization_ck" value="1" type=checkbox name="Lateralization_ck" <? if($resultChinaPatientRecord['Lateralization_ck'] == "1"){ echo "checked"; } ?>>
                            <?PHP echo $resultChinaPatientRecord['Lateralization']; ?>
                          </font>
                        </p>
                        <p style="line-height: 150%">&nbsp;<font size="3">其他：</font></p>
                        <p style="line-height: 150%">&nbsp;&nbsp;
                        <FONT size=3>同化历程 <!-- 翻譯 Assimilation Course -->
                          <INPUT id="ac_ck" value="1" type=checkbox name="ac_ck" <? if($resultChinaPatientRecord['ac_ck'] == "1"){ echo "checked"; } ?>>
                          <?PHP echo $resultChinaPatientRecord['ac']; ?>
                        </FONT>
                        <FONT size=3>其他替代 <!-- 翻譯 Other alternatives -->
                          <INPUT id="oa_ck" value="1" type=checkbox name="oa_ck" <? if($resultChinaPatientRecord['oa_ck'] == "1"){ echo "checked"; } ?>>
                          <?PHP echo $resultChinaPatientRecord['oa']; ?>
                        </FONT>
                      </p>
                      <p style="line-height: 150%">&nbsp;&nbsp;
                      <FONT size=3>VP Related
                        <INPUT id="Glottal" value="1" type=checkbox name="Glottal" <? if($resultChinaPatientRecord['Glottal'] == "1"){ echo "checked"; } ?> />Glottal
                      </FONT>
                      <FONT size=3>
                        <INPUT id="phf" value="1" type=checkbox name="phf" <? if($resultChinaPatientRecord['phf'] == "1"){ echo "checked"; } ?> />Pharyngeal fricative/
                      </FONT>
                      <FONT size=3>
                        <INPUT id="phls" value="1" type=checkbox name="phls" <? if($resultChinaPatientRecord['phls'] == "1"){ echo "checked"; } ?> />Pharyngeal stop<br>&nbsp;&nbsp;
                      </FONT>
                      <font size="3">
                        <INPUT id="oca" value="1" type=checkbox name="oca"  <? if($resultChinaPatientRecord['oca'] == "1"){ echo "checked"; } ?> />Other Compensatory Articulation
                      </font>
                      <FONT size=3>
                        <INPUT id="wkp" value="1" type=checkbox name="wkp"  <? if($resultChinaPatientRecord['wkp'] == "1"){ echo "checked"; } ?> />Weak pressure
                      </FONT>
                      <FONT size=3>
                        <INPUT id="Omission2" value="1" type=checkbox name="Omission2"  <? if($resultChinaPatientRecord['Omission2'] == "1"){ echo "checked"; } ?> />Omission
                      </FONT>
                      <FONT size=3>
                        <INPUT id="Nasalization" value="1" type=checkbox name="Nasalization" <? if($resultChinaPatientRecord['Nasalization'] == "1"){ echo "checked"; } ?> />Nasalization
                      </FONT>
                      <font size="3">
                        <LABEL><br>&nbsp;&nbsp;
                        <INPUT id="other_vpr_ck" value="1" type=checkbox name="other_vpr_ck" <? if($resultChinaPatientRecord['other_vpr_ck'] == "1"){ echo "checked"; } ?> />Other：
                        </LABEL>
                      </font>
                      <font size="3">
                        <?PHP echo $resultChinaPatientRecord['other_vpr']; ?>
                      </font>
                    </p>
                    <p style="line-height: 150%">&nbsp;&nbsp;
                    <font size="3">Intelligibility：
                      <LABEL>
                        <INPUT id="Intelligibility" value="OK" type=radio name="Intelligibility" <? if($resultChinaPatientRecord['Intelligibility'] == "OK"){ echo "checked"; } ?> />
                      </LABEL>
                    </font>
                    <font size="3">OK
                      <LABEL>
                        <INPUT id="Intelligibility" value="Mild" type=radio name="Intelligibility" <? if($resultChinaPatientRecord['Intelligibility'] == "Mild"){ echo "checked"; } ?> />
                      </LABEL>
                    </font>
                    <font size="3">Mild
                      <LABEL>
                        <INPUT id="Intelligibility" value="Severity" type=radio name="Intelligibility" <? if($resultChinaPatientRecord['Intelligibility'] == "Severity"){ echo "checked"; } ?> />
                      </LABEL>
                    </font>
                    Severity
                  </p>
                  <p style="line-height: 150%">&nbsp;&nbsp;
                  <font size="3">VP Impression：
                    <LABEL>
Adequate
                      <INPUT id="VPI" value="Adequate" type=radio name="VPI" <? if($resultChinaPatientRecord['VPI'] == "Adequate"){ echo "checked"; } ?> />
                    </LABEL>
                  </font>
                  <font size="3">Adequate/
                    <LABEL>
                      <INPUT id="VPI" value="pae" type=radio name="VPI" <? if($resultChinaPatientRecord['VPI'] == "pae"){ echo "checked"; } ?> />
                    </LABEL>
                  </font>
                  <font size="3">Prob adequate/
                    <LABEL>
                      <INPUT id="VPI" value="Marginal" type=radio name="VPI" <? if($resultChinaPatientRecord['VPI'] == "Marginal"){ echo "checked"; } ?> />
                    </LABEL>
                  </font>
                  <font size="3">Marginal/
                    <LABEL>
                      <INPUT id="VPI" value="Inadequate" type=radio name="VPI" <? if($resultChinaPatientRecord['VPI'] == "Inadequate"){ echo "checked"; } ?> />
                    </LABEL>
                  </font>
                  Inadequate
                </p>
                <p style="line-height: 150%">&nbsp;&nbsp;
                  <font size="3">Rec：
                    <INPUT id="RecF" value="1" type=checkbox name="RecF" <? if($resultChinaPatientRecord['RecF'] == "1"){ echo "checked"; } ?> />
                  </font>
                  <FONT size=3>F,
                    <INPUT id="RecHP" value="1" type=checkbox name="RecHP" <? if($resultChinaPatientRecord['RecHP'] == "1"){ echo "checked"; } ?> />
                  </FONT>
                  <FONT size=3>Home program,
                    <INPUT id="RecST" value="1" type=checkbox name="RecST" <? if($resultChinaPatientRecord['RecST'] == "1"){ echo "checked"; } ?> />
                  </FONT>
                  <FONT size=3>ST,
                    <INPUT id="RecNPS" value="1" type=checkbox name="RecNPS" <? if($resultChinaPatientRecord['RecNPS'] == "1"){ echo "checked"; } ?> />
                  </FONT>
                  NPS
                </p>
                <p style="line-height: 150%">&nbsp;&nbsp;
                <font size="3">Others：<!--  評估報告  Evaluation Report   -->
                  <?PHP echo $resultChinaPatientRecord['Other_ER']; ?>
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
                    <INPUT id="TTPN" value="NPSCK" type=radio name="TTPN" <? if($resultChinaPatientRecord['TTPN'] == "NPSCK"){ echo "checked"; } ?> /> NPS检查
                  </LABEL>
                </font>
                <font size="3">
                  <LABEL>
                    <INPUT id="TTPN" value="SLTT" type=radio name="TTPN" <? if($resultChinaPatientRecord['TTPN'] == "SLTT"){ echo "checked"; } ?> /> 手术治疗 <!-- 翻譯 Surgical treatment -->
                  </LABEL>
                </font>
                <font size="3">
                  <LABEL>
                    <INPUT id="TTPN" value="STTT" type=radio name="TTPN" <? if($resultChinaPatientRecord['TTPN'] == "STTT"){ echo "checked"; } ?> /> 语言治疗 ( 预计开始治疗日期：<!-- 翻譯 Speech Therapy -->
                  </LABEL>
                </font>
                <font size="3">
                  <?PHP echo $resultChinaPatientRecord['sht_month']; ?> 月
                </font>
                <font size="3">
                  <?PHP echo $resultChinaPatientRecord['sht_day']; ?> 日 )
                </font>
                <FONT size=3>
                  <p style="line-height: 150%">&nbsp;(一)预定疗程：<?PHP echo $resultChinaPatientRecord['pdmc']; ?></p><!-- 翻譯 Predetermined course -->
                  <p style="line-height: 150%">&nbsp;(二)安排语言治疗项目：<?PHP echo $resultChinaPatientRecord['astp']; ?></p><!-- 翻譯 Arrange speech therapy project -->
                  <p style="line-height: 150%">&nbsp;(三)治疗重点：<?PHP echo $resultChinaPatientRecord['tmf']; ?></p><!-- 翻譯 Treatment focus -->
                  <p style="line-height: 150%">&nbsp;(四)语言治疗成效评估：<?PHP echo $resultChinaPatientRecord['stee']; ?></p><!-- 翻譯 Speech therapy effectiveness evaluation -->
                  <p style="line-height: 150%">&nbsp;(五)后续治疗计划：</p><!-- 翻譯  -->
                  <p style="line-height: 150%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <LABEL>
                      <INPUT id="fuptp" value="close" type=radio name="fuptp" <? if($resultChinaPatientRecord['fuptp'] == "close"){ echo "checked"; } ?> /> 成效良好，结案。
                    </LABEL>

                  </p>
                  <p style="line-height: 150%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <LABEL>
                      <INPUT id="fuptp" value="continue" type=radio name="fuptp" <? if($resultChinaPatientRecord['fuptp'] == "continue"){ echo "checked"; } ?> /> 建议仍须继续接受治疗，理由：
                    </LABEL>
                    <?PHP echo $resultChinaPatientRecord['fuptp_oth']; ?>
                  </p>
                  <p style="line-height: 150%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <LABEL><INPUT id="fuptp" value="1" type=radio name="fuptp" <? if($resultChinaPatientRecord['fuptp'] == "1"){ echo "checked"; } ?> /></LABEL>
                    其他： <?PHP echo $resultChinaPatientRecord['fuptp_txt']; ?>
                  </p>
                </td>
              </tr>
            </table>
          </div>
        </td>
      </tr>
    </table>
	<div align="center">&nbsp;
		<tableborder="1" cellspacing="1" width="780" id="">
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
                        <input id="mlss" type="checkbox" value="1" name="mlss" <? if($resultChinaPatientRecord['mlss'] == "1"){ echo "checked"; } ?> /><strong>医疗费补助：</strong>
                      </p>
                      <p style="line-height: 150%">&nbsp;&nbsp;医疗费用总计：人民币
                        <?PHP echo $resultChinaPatientRecord['tmcost']; ?> 元
                      </p>
                      <p style="line-height: 150%">&nbsp;&nbsp;1.申请NCF补助：<br>&nbsp;&nbsp;
                        <LABEL>
                          <INPUT id="npy_ck" value="1" type=checkbox name="npy_ck" <? if($resultChinaPatientRecord['npy_ck'] == "1"){ echo "checked"; } ?> /> 鼻咽镜检查费
                        </LABEL>
                        <?PHP echo $resultChinaPatientRecord['npy']; ?> 元&nbsp;
                        <LABEL>
                          <INPUT id="lat_ck" value="1" type=checkbox name="lat_ck" <? if($resultChinaPatientRecord['lat_ck'] == "1"){ echo "checked"; } ?> /> 语言评估费
                        </LABEL>
                          <?PHP echo $resultChinaPatientRecord['lat']; ?> 元&nbsp;
                        <LABEL>
                          <INPUT id="spty_ck" value="1" type=checkbox name="spty_ck" <? if($resultChinaPatientRecord['spty_ck'] == "1"){ echo "checked"; } ?> /> 语言治疗
                        </LABEL>
                        <?PHP echo $resultChinaPatientRecord['spty']; ?> 元<br>&nbsp;&nbsp;&nbsp;
                        共计人民币
                        <?PHP echo $resultChinaPatientRecord['totalRMB']; ?> 元，占医疗费用总金额
                        <?PHP echo $resultChinaPatientRecord['tRMBps']; ?> ％
                      </p>
                      <p style="line-height: 150%">&nbsp; 2.案家自付：人民币
                        <?PHP echo $resultChinaPatientRecord['Deductible']; ?> 元，占医疗费用总金额
                        <?PHP echo $resultChinaPatientRecord['ddps']; ?> ％
                      </p>
                    </td>
                    <td style="border-style: solid; border-width: 1" valign="top">
                      <FONT size=3>
                        <p style="line-height: 150%">
                          <strong>&nbsp;<input id="ncfts_ck" type="checkbox" value="1" name="ncfts_ck" <? if($resultChinaPatientRecord['ncfts_ck'] == "1"){ echo "checked"; } ?> /> 交通费补助：</strong>
                        </p>
                        <p style="line-height: 150%">&nbsp;&nbsp; 1.NCF补助：人民币
                          <?PHP echo $resultChinaPatientRecord['ncftsRMB']; ?> 元
                        </p>
                        <p style="line-height: 150%">&nbsp;&nbsp; 2.案家自付：人民币
                          <?PHP echo $resultChinaPatientRecord['selfpay']; ?> 元
                        </p>
                        <p style="line-height: 150%">&nbsp;&nbsp; 3.交通总费用：人民币
                          <?PHP echo $resultChinaPatientRecord['tcost']; ?> 元
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
                              <font size="4">申请NCF补助费用总金额为：人民币 <?PHP echo $resultChinaPatientRecord['totalNCF']; ?> 元</font>
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
                          <p align="center" style="line-height: 150%" height="100%"><font size="3">附件一：<img src="<?PHP echo $resultChinaPatientRecord['pedigree_graphics_other1']; ?>" alt="1" height="" width=""><br>
                            </font>
                          </p>
                          <p align="center" style="line-height: 150%">
                            <FONT size=3>附件二：<img src="<?PHP echo $resultChinaPatientRecord['pedigree_graphics_other2']; ?>" alt="2" height="" width=""><br>
                            </FONT>
                          </p>
                          <p align="center" style="line-height: 150%">
                            <FONT size=3>附件三：<img src="<?PHP echo $resultChinaPatientRecord['pedigree_graphics_other3']; ?>" alt="3" height="" width=""><br>
                            </FONT>
                          </p>
                          <p align="center" style="line-height: 150%">
                            <FONT size=3>附件四：<img src="<?PHP echo $resultChinaPatientRecord['pedigree_graphics_other4']; ?>" alt="4" height="" width=""><br>
                            </FONT>
                          </p>
                          <p align="center" style="line-height: 150%">
                            <FONT size=3>附件五：<img src="<?PHP echo $resultChinaPatientRecord['pedigree_graphics_other5']; ?>" alt="5" height="" width=""><br>
                            </FONT>
                          </p>
                          <p align="center" style="line-height: 150%">
                            <FONT size=3>附件六：<img src="<?PHP echo $resultChinaPatientRecord['pedigree_graphics_other6']; ?>" alt="6" height="" width=""><br>
                            </FONT>
                          </p>
                          <p align="center" style="line-height: 150%">
                            <FONT size=3>附件七：<img src="<?PHP echo $resultChinaPatientRecord['pedigree_graphics_other7']; ?>" alt="7" height="" width=""><br>
                            </FONT>
                          </p>
                          <p align="center" style="line-height: 150%">
                            <FONT size=3>附件八：<img src="<?PHP echo $resultChinaPatientRecord['pedigree_graphics_other8']; ?>" alt="8" height="" width=""><br>
                            </FONT>
                          </p>
                          <p align="center" style="line-height: 150%">
                            <FONT size=3>附件九：<img src="<?PHP echo $resultChinaPatientRecord['pedigree_graphics_other9']; ?>" alt="9" height="" width=""><br>
                            </FONT>
                          </p>
                          <p align="center" style="line-height: 150%">
                            <FONT size=3>附件十：<img src="<?PHP echo $resultChinaPatientRecord['pedigree_graphics_other10']; ?>" alt="10" height="" width=""><br>
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