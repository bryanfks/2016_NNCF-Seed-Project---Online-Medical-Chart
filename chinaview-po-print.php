<?PHP
    @session_start(); 

    include 'db.php';

    $seid = $_SESSION["seid"];
    $sepwd = $_SESSION["sepwd"];

    if( (!empty($seid)) && (!empty($sepwd)) ){
      
      $CPIData = $_GET["cpi"];
      $CPIData2 = $_GET["cpi2"];

      $ncfmn = $_GET["n"];
      $ncfmednum = "CN".$ncfmn;
      
      //echo "NCFMN: ".$ncfmn."<br/>";

      // 搜寻病患资料
      //$resultChinaPatientinfo = mysql_fetch_array(mysql_query("SELECT * FROM `patient-china` WHERE num = ".$CPIData.""));
      $sCNPatRec = "SELECT * FROM `patientrecord-china` WHERE num = ".$CPIData2."";
      $qCNPatRec = mysql_query($sCNPatRec);
      $resultChinaPatientRecord = mysql_fetch_array($qCNPatRec);

      //搜寻病患病例表
      //$resultChinaPatientRecord = mysql_fetch_array(mysql_query("SELECT * FROM `patientrecord-china` WHERE NCFID='".$resultChinaPatientinfo['NCFID']."'"));
      //$sCNPatInfo = "SELECT * FROM `patient-china` WHERE NCFID = '".$resultChinaPatientRecord['NCFID']."'";
      $sCNPatInfo = "SELECT * FROM `patient-china` WHERE num = '".$CPIData."'";
      $qCNPatInfo = mysql_query($sCNPatInfo);
      $resultChinaPatientinfo = mysql_fetch_array($qCNPatInfo);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<!-- saved from url=(0057)http://www.seed-nncf.org/china/for-pla-add-china-cgmh.php -->
<HTML>
	<HEAD>
    	<TITLE>NCF -- Patient Record Online Management System</TITLE>
		<META content="text/html; charset=utf-8" http-equiv=Content-Type>
          <script type="text/javascript">
        function printPage(){
                window.print( );
        }
        </script>
</HEAD>
<BODY topMargin=2 OnLoad="printPage()">
<FORM enctype="multipart/form-data" method="post" name="china_medical" action="chinaview-po-save.php">
<DIV align=center>
<CENTER>
<TABLE border=0 cellSpacing=0 cellPadding=0 width=750 id="table11">
  <TBODY>
  <TR>
    <TD width="100%">
      <DIV align=center>
      <TABLE style="BORDER-BOTTOM: 2px solid; BORDER-LEFT: 2px solid; BORDER-TOP: 2px solid; BORDER-RIGHT: 2px solid" border=0 cellSpacing=0 cellPadding=0 width="100%" height=1 id="table12">
        <TBODY>
        <TR>
          <TD bgColor=#fff3de height=300 width="100%" align=middle><FONT size=3>
            <DIV align=center>
            <CENTER>
            <TABLE border=0 cellSpacing=0 cellPadding=0 width="100%" id="table13">
              <TBODY>
              <TR>
                <TD align=left>
                  <DIV align=center>
                  <TABLE border=1 cellSpacing=0 cellPadding=0 width="100%" bgColor=#ff9966 height=50 id="table14">
                    <TBODY>
                        
                    <TR>
                      <TD>
                        <P align=center style="line-height: 150%"><FONT color=#000000 size=4><I><B>
                        <SPAN>
                          <?php
                              if($resultChinaPatientinfo['school']  == "西安交通大学口腔医院" )
                              {
                                  echo  "西安交通大学口腔医院";
                              } elseif ($resultChinaPatientinfo['school']  == "中国医学科学院北京协和医院") {
                                  echo "中国医学科学院北京协和医院";
                              }
                            ?>
                        </SPAN></B></I></FONT></FONT>
                        <SPAN><b><i><font color="#000000" size="4">清寒唇颚裂患者补助申请表（</font></i></b></SPAN>
                        <FONT size=3><SPAN<b><i><font color="#000000" size="4">术前正畸</font></i></b></SPAN></FONT>
                        <SPAN><b><i><font color="#000000" size="4">）</font></i></b></SPAN></P></TD></TR></TBODY></TABLE></DIV>
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
                            <TD style="border: 1px solid; width: 100px;">
                               <p style="line-height: 150%"><FONT size=3>*接案日期</FONT>
                            </TD>
                            <TD style="border: 1px solid; width: 290px;">
                               <p style="line-height: 150%">
                                <FONT size=3>&nbsp;
        <?PHP echo $resultChinaPatientinfo['caseYear']; ?>年
        <?PHP echo $resultChinaPatientinfo['caseMonth']; ?> 月
        <?PHP echo $resultChinaPatientinfo['caseDay']; ?> 日</FONT>
                            </TD>
                            <TD style="border: 1px solid; width: 100px;">
                               <p style="line-height: 150%"><FONT size=3>&nbsp;NCF个案编号</FONT>
                            </TD>
                            <TD style="border: 1px solid; width: 290px;">&nbsp;<?PHP echo $resultChinaPatientinfo['NCFID']; ?></TD>
                          </TR>
                          </TBODY>
                        </TABLE>
                      </DIV>
                      <DIV align=center>
                        <TABLE border=0 cellSpacing=1 width="100%" id="table17">
                          <TBODY>
                          <TR>
                            <TD style="border: 1px solid; width: 100px;">
                              <p style="line-height: 150%"><SPAN><FONT size=3>&nbsp;外科医师</FONT></SPAN>
                            </TD>
                            <TD style="border: 1px solid; width: 160px;">
                              <p style="line-height: 150%"><FONT size=3>&nbsp;<?PHP echo $resultChinaPatientinfo['surgeryDrName']; ?></FONT>
                            </TD>
                            <TD style="border: 1px solid; width: 100px;">
                              <p style="line-height: 150%"><FONT size=3>&nbsp;语言治疗师</FONT>
                            </TD>
                           <TD style="border: 1px solid; width: 160px;">
                              <p style="line-height: 150%"><FONT size=3>&nbsp;<?PHP echo $resultChinaPatientinfo['languageTherapist']; ?></FONT>
                            </TD>
                            <TD style="border: 1px solid; width: 100px;">
                              <p style="line-height: 150%"><FONT size=3>&nbsp;正畸科医师</FONT>
                            </TD>
                           <TD style="border: 1px solid; width: 160px;">
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
                            <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid">
              <p style="line-height: 150%"><I><B><FONT size=4>&nbsp;个案基本数据</FONT></B></I></TD></TR></TBODY></TABLE></DIV>
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
                  <table border="0" cellspacing="1" width="780px" id="table68">
                    <!-- MSTableType="nolayout" -->
                    <tr>
                      <font size="3">
                        <td style="border-style: solid; border-width: 1" >
            <p style="line-height: 150%"><font size="3">*初诊时间</font></p>
                        </td>
                        <td style="border-style: solid; border-width: 1" >
                          <p style="line-height: 150%">
                            <font size="3">&nbsp;
                              <?PHP echo $resultChinaPatientinfo['BIHosTimeYear']; ?> 年
                              <?PHP echo $resultChinaPatientinfo['BIHosTimeMonth']; ?> 月
                              <?PHP echo $resultChinaPatientinfo['BIHosTimeDay']; ?> 日
                            </font>
                          </p>
                        </td>
                        <td style="border-style: solid; border-width: 1" colspan="2">
                          <p style="line-height: 150%">
                            <FONT size=3>*正畸科医师</FONT>
                          </p>
                        </td>
                        <td style="border-style: solid; border-width: 1" width="258">
                          <p style="line-height: 150%"><font size="3">&nbsp;<?PHP echo $resultChinaPatientinfo['surgeon']; ?></font></p>
                        </td>
                     </font>
                    </tr>
                    <tr>
                      <td style="border-style: solid; border-width: 1" width="106">
        <p style="line-height: 150%"><font size="3">*治疗开始时间</font></p>
                      </td>
                      <td style="border-style: solid; border-width: 1" width="232">
          <p style="line-height: 150%">
                          <font size="3">&nbsp;
                            <?PHP echo $resultChinaPatientinfo['LHosTimeYear']; ?> 年
                            <?PHP echo $resultChinaPatientinfo['LHosTimeMonth']; ?> 月
                            <?PHP echo $resultChinaPatientinfo['LHosTimeDay']; ?> 日
                          </font>
                        </p>
                      </td>
                      <td style="border-style: solid; border-width: 1" colspan="2">
                        <p style="line-height: 150%"><font size="3">*治疗结束时间</font>
                      </td>
                      <td style="border-style: solid; border-width: 1" width="258">
            <p style="line-height: 150%"><font size="3">&nbsp;
                          <?PHP echo $resultChinaPatientinfo['surgeryTimeYear']; ?> 年
                          <?PHP echo $resultChinaPatientinfo['surgeryTimeMonth']; ?> 月
                          <?PHP echo $resultChinaPatientinfo['surgeryTimeDay']; ?> 日</font>
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
          拍照日：
                            <?PHP echo $resultChinaPatientinfo['beforeSurgeryYear1']; ?> 年
                            <?PHP echo $resultChinaPatientinfo['beforeSurgeryMonth1']; ?> 月
                            <?PHP echo $resultChinaPatientinfo['beforeSurgeryDay1']; ?> 日
                          </p>
        <p align="center" style="line-height: 150%">
                            <img height="265" alt="Pedigree" src="<?PHP if(!empty($resultChinaPatientRecord['pedigree_graphics1'])){ echo $resultChinaPatientRecord['pedigree_graphics1']; }else{ echo 'images/user-pic.jpg'; } ?>" width="300" border="0">
                      </p>
                        </td>
                        <td style="border-style: solid; border-width: 1" colspan="2">
                          <FONT size=3>
          <p style="line-height: 150%" align="center"><b>〔治疗前〕<br></b>
                              拍照日：
                              <?PHP echo $resultChinaPatientinfo['beforeSurgeryYear2']; ?> 年
                              <?PHP echo $resultChinaPatientinfo['beforeSurgeryMonth2']; ?> 月
                              <?PHP echo $resultChinaPatientinfo['beforeSurgeryDay2']; ?> 日
                            </p>
          <p align="center" style="line-height: 150%">
                              <img height="265" alt="Pedigree" src="<?PHP if(!empty($resultChinaPatientRecord['pedigree_graphics2'])){ echo $resultChinaPatientRecord['pedigree_graphics2']; }else{ echo 'images/user-pic.jpg'; } ?>" width="300" border="0">
                           </p>
                              </td>

                    </tr>

                    <tr>

                      <td style="border-style: solid; border-width: 1" colspan="2"><FONT size=3>
            <p style="line-height: 150%" align="center">&nbsp;<b>〔治疗后〕</b><br>
            拍照日：
                                    <?PHP echo $resultChinaPatientinfo['afterSurgeryYear1']; ?> 年
                                    <?PHP echo $resultChinaPatientinfo['afterSurgeryMonth1']; ?> 月
                                    <?PHP echo $resultChinaPatientinfo['afterSurgeryDay1']; ?> 日
                                </p>
            <p align="center" style="line-height: 150%">
                                  <img height="265" alt="Pedigree" src="<?PHP if(!empty($resultChinaPatientRecord['pedigree_graphics3'])){ echo $resultChinaPatientRecord['pedigree_graphics3']; }else{ echo 'images/user-pic.jpg'; } ?>" width="300" border="0"><p align="center" style="line-height: 150%">
            </p>
                      </td>
                      <td style="border-style: solid; border-width: 1" colspan="2"><FONT size=3>
            <p style="line-height: 150%" align="center"><b>〔治疗后〕<br>
            </b>拍照日：
                                      <?PHP echo $resultChinaPatientinfo['afterSurgeryYear2']; ?> 年
                                      <?PHP echo $resultChinaPatientinfo['afterSurgeryMonth2']; ?> 月
                                      <?PHP echo $resultChinaPatientinfo['afterSurgeryDay2']; ?> 日
                                </p>
            <p align="center" style="line-height: 150%">
                                    <img height="265" alt="Pedigree" src="<?PHP if(!empty($resultChinaPatientRecord['pedigree_graphics4'])){ echo $resultChinaPatientRecord['pedigree_graphics4']; }else{ echo 'images/user-pic.jpg'; } ?>" width="300" border="0"><p align="center" style="line-height: 150%">                                             
                    </tr>      </p>

                    <tr>

                      <td style="border-style: solid; border-width: 1" colspan="4"><FONT
            size=3>
            <p style="line-height: 150%" align="center"><b>〔治疗后〕<br>
            </b>拍照日：
                                     <?PHP echo $resultChinaPatientinfo['afterSurgeryYear3']; ?> 年
                                      <?PHP echo $resultChinaPatientinfo['afterSurgeryMonth3']; ?> 月
                                      <?PHP echo $resultChinaPatientinfo['afterSurgeryDay3']; ?> 日</p>
            <p align="center" style="line-height: 150%">
                                    <img height="265" alt="Pedigree" src="<?PHP if(!empty($resultChinaPatientRecord['pedigree_graphics5'])){ echo $resultChinaPatientRecord['pedigree_graphics5']; }else{ echo 'images/user-pic.jpg'; } ?>" width="300" border="0"><p align="center" style="line-height: 150%">
                                </p>
            </td>

                    </tr>

                    </table>

                <div align="center">

          <table border="1" width="100%">
            <tr>
            <td width="136">
            <p style="line-height: 150%"><font size="3">&nbsp;社会资源使用情形</font></td>
            <td><font size="3">
            <p style="line-height: 150%">&nbsp;<input id="usageofSocialResources" value="Y" type="radio" name="usageofSocialResources" <? if($resultChinaPatientRecord['usageofSocialResources'] == "Y"){ echo "checked"; } ?>>有</p>
            <p style="line-height: 150%">
            &nbsp;&nbsp;&nbsp;&nbsp; 医疗补助：<input id="smileTrain" value="1" maxLength="20" type="checkbox" name="smileTrain" <? if($resultChinaPatientRecord['smileTrain'] == "1"){ echo "checked"; } ?>>微笑列车，项目 <?PHP echo $resultChinaPatientRecord['MSitem']; ?><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input id="MSOther" value="1" type="checkbox" name="MSOther" <? if($resultChinaPatientRecord['MSOther'] == "1"){ echo "checked"; } ?>>其他：<?PHP echo $resultChinaPatientRecord['MSOther_text']; ?></p>
            <p style="line-height: 150%">&nbsp;&nbsp;&nbsp;&nbsp; 生活补助：单位 － <?PHP echo $resultChinaPatientRecord['LAunit']; ?> 项目 － <?PHP echo $resultChinaPatientRecord['LAitem']; ?></p>
            <p style="line-height: 150%">&nbsp;&nbsp;&nbsp;&nbsp; 其他补助：单位 － <?PHP echo $resultChinaPatientRecord['MSOther_text']; ?> 项目 － <?PHP echo $resultChinaPatientRecord['MSOther_text']; ?></p>
            <p style="line-height: 150%">&nbsp;<input id="usageofSocialResources" value="N" type="radio" name="usageofSocialResources" <? if($resultChinaPatientRecord['usageofSocialResources'] == "N"){ echo "checked"; } ?>>无</font></td>
          </tr>

          </table>

        </div>
          <table border="1" bgcolor="#FFF3DE" cellspacing="1" width="100%" id="table50">
            <tr>
              <td>
                <div align="center">
                  <table border="0" cellspacing="1" width="100%" id="table51">
                    <tr>
                      <td style="border: 1px solid; width: 410px; " valign="top">
                          <FONT size=3>
            <p style="line-height: 150%"><i>
            <strong><font size="4">&nbsp;申请补助项目<br>
            【须检具医疗收据复印件、费用明细表复印件】</font></strong></i></td>
                      <td style="border-style: solid; border-width: 1">
                        <p style="line-height: 150%">
                            <FONT size=3>&nbsp;NCF补助编号：<?php echo $resultChinaPatientRecord['NCFMedicalNum'];  ?></td>
                    </tr>
                  </table>
                </div>

                <div align="center">
                  <table border="0" cellspacing="1" width="100%" id="table52">
                    <tr>
                      <td style="border: 1px solid; width: 410px; " valign="top">
          <FONT size=3>
                          <p style="line-height: 150%">
                          &nbsp;<input id="subsidiesforMedicalExpenses" type="checkbox" value="1" name="subsidiesforMedicalExpenses" <? if($resultChinaPatientRecord['subsidiesforMedicalExpenses'] == "1"){ echo "checked"; } ?>><strong>&#21307;&#30103;&#36153;&#34917;助：</strong></p>
              <p style="line-height: 150%">&nbsp;&nbsp;医疗费用总计：人民币 <?PHP echo $resultChinaPatientRecord['TotalSFME']; ?> 元</p>
              <p style="line-height: 150%">&nbsp; 1.申请NCF补助：人民币 <?PHP echo $resultChinaPatientRecord['NCFAllowance']; ?> 元，占医疗费用总金额 <?PHP echo $resultChinaPatientRecord['NCFProportion']; ?> %</p>
              <p style="line-height: 150%">&nbsp; 2.案家自付：人民币 <?PHP echo $resultChinaPatientRecord['PatientPay']; ?> 元，占医疗费用总金额 <?PHP echo $resultChinaPatientRecord['PatientProportion']; ?> %</p>
                      </td>
                     <td style="border-style: solid; border-width: 1" valign="top">
                          <FONT size=3>
              <p style="line-height: 150%">
                          <strong>&nbsp;<input id="transportationSubsidies" type="checkbox" value="1" name="transportationSubsidies" <? if($resultChinaPatientRecord['transportationSubsidies'] == "1"){ echo "checked"; } ?>>交通费补助：</strong></p>
              <p style="line-height: 150%">&nbsp;&nbsp;1.申请NCF补助：人民币 <?PHP if (isset($resultChinaPatientRecord['NCFSOT'])) { echo $resultChinaPatientRecord['NCFSOT']; } else { echo " 0 ";} ?> 元</p>
              <p style="line-height: 150%">&nbsp;&nbsp;2.案家自付：人民币 <?PHP if (isset($resultChinaPatientRecord['PatientSOT'])) { echo $resultChinaPatientRecord['PatientSOT']; } else { echo " 0 ";} ?> 元</p>
                      </td>
                    </tr>
                  </table>
                </div>
                <div align="center">
                  <table border="0" cellspacing="1" width="100%" id="table53">
                    <tr>
          <FONT size=3>
                      <td style="border-style: solid; border-width: 1" height="50">
                        <p align="center" style="line-height: 150%"><strong><font size="4">申请NCF补助费用总金额为：人民币 <?PHP echo $resultChinaPatientRecord['NCFTotalSubsidies']; ?> 元</font></strong></td>
                    </tr>
          </FONT>
                  </table>
                </div>
          <FONT size=3>
                <div align="center">
                  <table border="0" cellspacing="1" width="780px" id="table54">
                    <tr>
                      <td style="border-style: solid; border-width: 1; width: 780px;">
            <p align="center" style="line-height: 150%">
            <strong>上传其它资料</strong><FONT size=3><strong>【</strong></font><strong>注：病患签名处的补助凭证或其他票据在此上传</strong><FONT size=3><strong>】</strong></font></p>
            <p align="center" style="line-height: 150%; width: 780px;">
            <font size="3">
            附件一： <img src="<?PHP echo $resultChinaPatientRecord['pedigree_graphics_other1']; ?>" alt="" height="" width=""><br>
            </font>
            </p>
            <p align="center" style="line-height: 150%; width: 780px;">
            <FONT size=3>
            附件二： <img src="<?PHP echo $resultChinaPatientRecord['pedigree_graphics_other2']; ?>" alt="" height="" width=""><br>
            </font>
            </p>
            <p align="center" style="line-height: 150%; width: 780px;">
            <FONT size=3>
            附件三： <img src="<?PHP echo $resultChinaPatientRecord['pedigree_graphics_other3']; ?>" alt="" height="" width=""><br>
            </font>
            </p>
            <p align="center" style="line-height: 150%; width: 780px;">
            <FONT size=3>
            附件四： <img src="<?PHP echo $resultChinaPatientRecord['pedigree_graphics_other4']; ?>" alt="" height="" width=""><br>
            </font>
            </p>
            <p align="center" style="line-height: 150%; width: 780px;">
            <FONT size=3>
            附件五： <img src="<?PHP echo $resultChinaPatientRecord['pedigree_graphics_other5']; ?>" alt="" height="" width=""><br>
            </FONT></p>
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
                <tr>
                  <td style="border-style: solid; border-width: 1"><p><font size="4"><i><strong>NCF 核准补助：</strong></i></font></p></td>
                </tr>
                <tr>
                  <td style="border-style: solid; border-width: 1"><p><font size="3">1. 医疗费用补助：人民币 <?PHP echo $resultChinaPatientRecord['ncfAllMedicaid']; ?> 元</font></p></td>
                </tr>
                <tr>
                  <td style="border-style: solid; border-width: 1"><p><font size="3">2. 交通费用补助：人民币 <?PHP echo $resultChinaPatientRecord['ncfAllTransport']; ?> 元</font></p></td>
                </tr>
                <tr>
                  <td style="border-style: solid; border-width: 1"><p>&nbsp;</p></td>
                </tr>
                <tr>
                  <td style="border-style: solid; border-width: 1"><p><font size="3">NCF 补助费用总金额为：人民币 <?PHP echo $resultChinaPatientRecord['ncfAllTotal']; ?> 元</font></p></td>
                </tr>
                <tr>
                  <td style="border-style: solid; border-width: 1"><p><font size="3">意见：<?PHP echo $resultChinaPatientRecord['ncfAllRemark']; ?><br/></font></p></td>
                </tr>
                <tr>
                  <td style="border-style: solid; border-width: 1">
                    <font size="3">
                    <?
                      if($resultChinaPatientinfo["ncfAllStatus"] == "1"){
                        echo "<p align='right'>";
                        echo "同意送出 （".$seid."）&nbsp;&nbsp;&nbsp;&nbsp;日期（".$resultChinaPatientinfo["ncfAlltime"]."）";
                        echo "</p>";
                      }               
                    ?>
                    </font>
                  </td>
                </tr>
                </TBODY>
              </TABLE>
      </DIV>
                  <CENTER>
					<p style="line-height: 150%"></p>
					</CENTER></TD></TR></TBODY></TABLE></DIV></FONT></CENTER></TD></TR>
        <TR>
          <TD height=1 width="100%" align=middle>
            <HR color=#c0c0c0 SIZE=1 width="98%">

            <P align=center style="line-height: 150%"><I><FONT size=2><FONT color=#999999 face=Arial>The&nbsp; Web&nbsp; Best&nbsp; Browse&nbsp; Mode</FONT>
            <FONT color=#999999>： </FONT><FONT face=Arial><FONT color=#999999>Internet&nbsp; Explorer&nbsp; 6.02 (Or Update)&nbsp;/&nbsp; 800 x 600&nbsp; Resolution<BR>Copyright <span lang="zh-tw">©</span>&nbsp;&nbsp;</FONT><A href="http://www.nncf.org/" target=_blank><FONT color=#0066cc>Noordhoff&nbsp; Craniofacial&nbsp;Foundation</FONT></A></FONT></FONT></I></P></TD></TR></TBODY></TABLE></DIV></TD></TR></TBODY></TABLE></CENTER></DIV>
            </FORM></BODY></HTML>
<?PHP
      }else{
        echo "<Script Language='JavaScript'>";
        echo "alert('抱歉您现在无权限读取,请先登入')\;";
        echo " location.href=\'login.php\'\;";
        echo " </Script>";
      }
?>