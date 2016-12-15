<?PHP
session_start();
include "db.php";
$seid = $_SESSION["seid"];
$sepwd = $_SESSION["sepwd"];
if (isset($seid) && isset($sepwd)) {
	?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>

<HEAD>
    <TITLE>NCF -- Patient Record Online Management System</TITLE>
    <META content="text/html; charset=utf-8" http-equiv=Content-Type>
    <SCRIPT language=javascript>
    <!--
    function saveData(opt) {
        //alert (opt);
        if (opt == "save") {
            // 警示未填写必要输入项资料
            document.china_medical.submit();
        } else if (opt == "close") {
            document.china_medical.submit();
        } else if (opt == "cancelAdd") {
            // location.href = 'for-pla-add-china-search.php';
            location.href = 'main.php';
        }
    }

    //-->
    </SCRIPT>
</HEAD>

<BODY topMargin=2>
    <FORM encType=multipart/form-data method="post" name="china_medical" action="statisticsList.php">
        <DIV align=center>
            <CENTER>
                <TABLE border=0 cellSpacing=0 cellPadding=0 width=760 id="table11">
                    <TR>
                    <TBODY>
                        <TD width="100%">
                            <DIV align=center>
                               <TABLE style="BORDER-BOTTOM: 2px solid; BORDER-LEFT: 2px solid; BORDER-TOP: 2px solid; BORDER-RIGHT: 2px solid" border=0 cellSpacing=0 cellPadding=0 width="100%" height=1 id="table11">
                                    <tr>
                                        <td width="100%" height="16" align="center"><?PHP include "top.php";?></td>
                                    </tr>
                                    <tr>
                                        <td width="100%" height="16" align="center"><?PHP include "select.php";?></td>
                                    </tr>
                                </table>
                                    <TABLE style="BORDER-BOTTOM: 2px solid; BORDER-LEFT: 2px solid; BORDER-TOP: 2px solid; BORDER-RIGHT: 2px solid" border=0 cellSpacing=0 cellPadding=0 width="100%" height=1 id="table12">

                                        <TBODY>
                                            <TR>

                                                <TD bgColor=#fff3de height=300 width="100%" align=middle>
                                                    <DIV align=center>
                                                        <CENTER>

                                                            <TABLE border=0 cellSpacing=0 cellPadding=0 width=780 id="table13">
                                                                <TBODY>
                                                                    <TR>
                                                                        <TD align=left>
                                                                            <DIV align=center>
                                                                                <TABLE border=1 cellSpacing=0 cellPadding=0 width="100%" bgColor=#ff9966 height=40 id="table14">
                                                                                    <TBODY>
                                                                                        <TR>
                                                                                            <TD>
                                                                                                <p align="center" style="line-height: 200%">
                                                                                                    <SPAN id="result_box"><b><i><font color="#000000" size="4" face="新細明體">统计功能（补助申请表）</font></i></b></SPAN>
                                                                                                </p>
                                                                                            </TD>
                                                                                        </TR>
                                                                                    </TBODY>
                                                                                </TABLE>
                                                                            </DIV>
                                                                            <FONT size=3>
                                                                                &nbsp;
                                                                                <DIV align=center>
                                                                                    <TABLE border=1 cellSpacing=1 width=780 id="table15">
                                                                                        <TBODY>
                                                                                            <TR>
                                                                                                <TD>
                                                                                                    <DIV align=center>
                                                                                                        <TABLE border=0 cellSpacing=1 width=780 id="table16">
                                                                                                            <TBODY>
                                                                                                                <TR>
                                                                                                                    <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=145 align="center">
                                                                                                                        <p style="line-height: 200%">
                                                                                                                            <FONT size=3 face="新細明體">统计项目</FONT>
                                                                                                                        </p>
                                                                                                                    </TD>
                                                                                                                    <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=624 align="center">
                                                                                                                        <p style="line-height: 200%">
                                                                                                                            <font face="新細明體">内&nbsp; 容</font>
                                                                                                                        </p>
                                                                                                                    </TD>
                                                                                                                </TR>
                                                                                                                <TR>
                                                                                                                    <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=145>
                                                                                                                        <p style="line-height: 200%">
                                                                                                                            <font size="3" face="新細明體">&nbsp;</font>
                                                                                                                            <font face="細明體" size="3">
                                                                                                                                <INPUT id="GenderType" value="1" type="checkbox" name="GenderType" />
                                                                                                                            </font>
                                                                                                                            <font size="3" face="新細明體">&nbsp;性&nbsp; 别</font>
                                                                                                                        </p>
                                                                                                                    </TD>
                                                                                                                    <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=624>
                                                                                                                        <p style="line-height: 200%">
                                                                                                                            <font size="3" face="新細明體">&nbsp;</font>
                                                                                                                            <font face="細明體" size="3">
                                                                                                                                <INPUT id="gender_male" value="男" type="radio" name="gender" />
                                                                                                                            </font>
                                                                                                                            <font size="3" face="新細明體">男&nbsp;
                                                                                                                            </font>
                                                                                                                            <font face="細明體" size="3">
                                                                                                                                <font face="新細明體">
                                                                                                                                    <INPUT id="gender_female" value="女" type=radio name="gender" />
                                                                                                                                </font>
                                                                                                                                <font size="3" face="新細明體">女</font>
                                                                                                                            </font>
                                                                                                                        </p>
                                                                                                                    </TD>
                                                                                                                </TR>
                                                                                                                <TR>
                                                                                                                    <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=145>
                                                                                                                        <p style="line-height: 200%">
                                                                                                                            <font face="新細明體">&nbsp;</font>
                                                                                                                            <font face="新細明體" size="3">
                                                                                                                                <INPUT id="Birthday" value="1" type=checkbox name="Birthday" />
                                                                                                                            </font>
                                                                                                                            <span lang="ZH-CN" style="font-family: 新細明體">&nbsp;出生日期</span>
                                                                                                                        </p>
                                                                                                                    </TD>
                                                                                                                    <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=624>
                                                                                                                        <p style="line-height: 200%">
                                                                                                                            <font face="新細明體">&nbsp;</font>
                                                                                                                            <font face="新細明體" size="3">
                                                                                                                                <INPUT id="BirthdayStart" maxLength=8 size=10 name="BirthdayStart" value="" /> ～
                                                                                                                            </font>
                                                                                                                            <font face="細明體" size="3">
                                                                                                                                <INPUT id="BirthdayEnd" maxLength=8 size=10 name="BirthdayEnd" value="" />
                                                                                                                            </font>
                                                                                                                            <font face="新細明體">( 例：若公元2015年1月31日出生，请填入 20150131 )</font>
                                                                                                                        </p>
                                                                                                                    </TD>
                                                                                                                </TR>
                                                                                                                <TR>
                                                                                                                    <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=145>
                                                                                                                        <p style="line-height: 200%">
                                                                                                                            <font size="3" face="新細明體">&nbsp;</font>
                                                                                                                            <font face="細明體" size="3">
                                                                                                                                <INPUT id="Distance" value="1" type=checkbox name="Distance" />
                                                                                                                            </font>
                                                                                                                            <font size="3" face="新細明體">住家离医院距离</font>
                                                                                                                        </p>
                                                                                                                    </TD>
                                                                                                                    <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid">
                                                                                                                        <p style="line-height: 200%">
                                                                                                                            <font size="3" face="新細明體">&nbsp;</font>
                                                                                                                            <font face="細明體" size="3">
                                                                                                                                <input id="h2hdistance" type="radio" value="100" name="h2hdistance">
                                                                                                                            </font>
                                                                                                                            <font size="3" face="新細明體">少于100公里&nbsp;
                                                                                                                            </font>
                                                                                                                            <font face="細明體" size="3">
                                                                                                                                <font face="新細明體">
                                                                                                                                    <input id="h2hdistance" type="radio" value="100-200" name="h2hdistance">
                                                                                                                                </font>
                                                                                                                                <font size="3" face="新細明體">100-200公里&nbsp;
                                                                                                                                </font>
                                                                                                                                <font face="新細明體">
                                                                                                                                    <input id="h2hdistance" type="radio" value="200" name="h2hdistance">
                                                                                                                                </font>
                                                                                                                                <font size="3" face="新細明體">大于200公里</font>
                                                                                                                            </font>
                                                                                                                        </p>
                                                                                                                    </TD>
                                                                                                                </TR>
                                                                                                                <TR>
                                                                                                                    <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=145>
                                                                                                                        <p style="line-height: 200%">
                                                                                                                            <font face="新細明體">&nbsp;</font>
                                                                                                                            <font face="新細明體" size="3">
                                                                                                                                <INPUT id="DiagnosisType" value="1" type="checkbox" name="DiagnosisType">
                                                                                                                            </font>
                                                                                                                            <font face="新細明體">&nbsp;主诊断类型</font>
                                                                                                                    </TD>
                                                                                                                    <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=624>
                                                                                                                        <FONT size=3>
                                                                                                                            <p style="line-height: 200%">
                                                                                                                                <font face="新細明體">&nbsp;
                                                                                                                                    <INPUT id="diagnosis_unilateral_cleft_lip_1" value="UCL" type=checkbox name="diagnosis_unilateral_cleft_lip_1">&nbsp;单侧唇裂 (
                                                                                                                                    <INPUT id="diagnosis_unilateral_cleft_lip" value="C" type=radio name="diagnosis_unilateral_cleft_lip">完全性&nbsp;
                                                                                                                                    <INPUT id="diagnosis_unilateral_cleft_lip" value="IC" type=radio name="diagnosis_unilateral_cleft_lip">不完全性&nbsp;
                                                                                                                                    <INPUT id="diagnosis_unilateral_cleft_lip" value="CK" type=radio name="diagnosis_unilateral_cleft_lip">隐裂 )
                                                                                                                                </font>
                                                                                                                            </p>
                                                                                                                            <p style="line-height: 200%">
                                                                                                                                <font face="新細明體">&nbsp;
                                                                                                                                    <INPUT id="diagnosis_bilateral_cleft_lip_2" value="BCL" type=checkbox name="diagnosis_bilateral_cleft_lip_2">
                                                                                                                                    双侧唇裂 (
                                                                                                                                    <INPUT id="diagnosis_bilateral_cleft_lip" value="C" type=radio name="diagnosis_bilateral_cleft_lip">完全性&nbsp;
                                                                                                                                    <INPUT id="diagnosis_bilateral_cleft_lip" value="IC" type=radio name="diagnosis_bilateral_cleft_lip">不完全性&nbsp;
                                                                                                                                    <INPUT id="diagnosis_bilateral_cleft_lip" value="MCK" type=radio name="diagnosis_bilateral_cleft_lip">混合裂 )
                                                                                                                                </font>
                                                                                                                            </p>
                                                                                                                            <P style="line-height: 200%">
                                                                                                                                <font face="新細明體">&nbsp;
                                                                                                                                    <font face="細明體">
                                                                                                                                        <INPUT id="CleftPalate" value="CP" type=checkbox name="CleftPalate">
                                                                                                                                    </font>颚裂&nbsp; ---
                                                                                                                                    <INPUT id="incomplete" value="IC" type=radio name="complete_main">不完全性 (
                                                                                                                                    <INPUT id="incomplete" value="SCC" type=radio name="incomplete">粘膜下裂&nbsp;
                                                                                                                                    <INPUT id="incomplete" value="CU" type=radio name="incomplete">悬雍垂裂&nbsp;
                                                                                                                                    <INPUT id="incomplete" value="SP" type=radio name="incomplete">软颚裂&nbsp;
                                                                                                                                    <INPUT id="incomplete" value="BC" type=radio name="incomplete">双侧裂 )
                                                                                                                                    <BR>&nbsp;&nbsp;&nbsp;&nbsp;　　　　---
                                                                                                                                    <INPUT id="incomplete" value="C" type=radio name="complete_main"> 完全性 (
                                                                                                                                    <INPUT id="complete" value="U" type=radio name="complete">单侧&nbsp;
                                                                                                                                    <INPUT id="complete" value="B" type=radio name="complete">双侧 )</font>
                                                                                                                            </P>
                                                                                                                            <P style="line-height: 200%">
                                                                                                                                <font face="新細明體">&nbsp;
                                                                                                                                    <font face="細明體">
                                                                                                                                        <INPUT id="beforeSurgery" value="BoneGraft" type=checkbox name="BoneGraft_main">
                                                                                                                                    </font>牙槽突裂 (
                                                                                                                                    <INPUT id="BoneGraft_select" value="C" type=radio name="BoneGraft_select">完全性&nbsp;
                                                                                                                                    <INPUT id="BoneGraft_select" value="IC" type=radio name="BoneGraft_select">不完全性&nbsp;
                                                                                                                                    <INPUT id="BoneGraft_select" value="CK" type=radio name="BoneGraft_select">隐裂 )</font>
                                                                                                                            </P>
                                                                                                                            <P style="line-height: 200%">
                                                                                                                                <font face="新細明體">&nbsp;
                                                                                                                                    <font face="細明體">
                                                                                                                                        <INPUT id="Combined_with_other_craniofacial_disorders" value="Other" type=checkbox name="Combined_with_other_craniofacial_disorders">
                                                                                                                                    </font>合并其它颅颜病症 ：
                                                                                                                                    <INPUT id="Combined_with_other_craniofacial_disorders_text" maxLength=30 size=50 name="Combined_with_other_craniofacial_disorders_text">
                                                                                                                                </font>
                                                                                                                            </P>
                                                                                                                        </FONT>
                                                                                                                    </TD>
                                                                                                                </TR>
                                                                                                                <TR>
                                                                                                                    <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=145>
                                                                                                                        <p style="line-height: 200%">
                                                                                                                            <font size="3" face="新細明體">&nbsp;</font>
                                                                                                                            <font face="細明體" size="3">
                                                                                                                                <INPUT id="AnnualIncome" value="1" type=checkbox name="AnnualIncome">
                                                                                                                            </font>
                                                                                                                            <font size="3" face="新細明體">平均年收入&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                                                            </font>
                                                                                                                    </TD>
                                                                                                                    <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=624>
                                                                                                                        <p style="line-height: 200%">
                                                                                                                            <font size="3" face="新細明體">&nbsp;</font>
                                                                                                                            <font face="細明體" size="3">
                                                                                                                                <INPUT id="AnnualIncomeStart" maxLength=30 size=10 name="AnnualIncomeStart" value="">
                                                                                                                            </font>
                                                                                                                            <font size="3" face="新細明體">
                                                                                                                                ～ </font>
                                                                                                                            <font face="細明體" size="3">
                                                                                                                                <font face="新細明體">
                                                                                                                                    <INPUT id="AnnualIncomeEnd" maxLength=30 size=10 name="AnnualIncomeEnd" value="">
                                                                                                                                </font>
                                                                                                                                <font size="3" face="新細明體">
                                                                                                                                    ( 人民币 )</font>
                                                                                                                            </font>
                                                                                                                    </TD>
                                                                                                                </TR>
                                                                                                                <TR>
                                                                                                                    <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=145>
                                                                                                                        <p style="line-height: 200%">
                                                                                                                            <font face="新細明體">&nbsp;</font>
                                                                                                                            <font face="新細明體" size="3">
                                                                                                                                <INPUT id="Occupancy" value="1" type=checkbox name="Occupancy" />
                                                                                                                            </font>
                                                                                                                            <span lang="ZH-CN" style="font-family: 新細明體">&nbsp;家庭居住地</span>
                                                                                                                        </p>
                                                                                                                    </TD>
                                                                                                                    <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=624>
                                                                                                                        <p style="line-height: 200%">
                                                                                                                            <font size="3" face="新細明體">&nbsp;
                                                                                                                                <INPUT id="OccupancyAddress" maxLength=30 size=20 name="OccupancyAddress" />
                                                                                                                            </font>
                                                                                                                        </p>
                                                                                                                    </TD>
                                                                                                                </TR>
                                                                                                                <TR>
                                                                                                                    <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=145>
                                                                                                                        <p style="line-height: 200%">
                                                                                                                            <font face="新細明體">&nbsp;</font>
                                                                                                                            <font face="新細明體" size="3">
                                                                                                                                <INPUT id="SurgeryType" value="1" type=checkbox name="SurgeryType" />
                                                                                                                            </font>
                                                                                                                            <font face="新細明體">&nbsp;手术类型</font>
                                                                                                                        </p>
                                                                                                                    </TD>
                                                                                                                    <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=624>
                                                                                                                        <FONT size=3>
                                                                                                                            <P style="line-height: 200%">
                                                                                                                                <font face="新細明體">&nbsp;
                                                                                                                                    <INPUT id="beforeSurgery" value="M1LNR" type=checkbox name="surgeryType1">一期单侧唇鼻修复&nbsp;
                                                                                                                                    <INPUT id="beforeSurgery" value="M1BLANR" type=checkbox name="surgeryType2">一期双侧唇鼻修复&nbsp;
                                                                                                                                    <INPUT id="beforeSurgery" value="M1CPR" type=checkbox name="surgeryType3">一期颚裂修复&nbsp;
                                                                                                                                    <INPUT id="beforeSurgery" value="MFHR" type=checkbox name="surgeryType4">廔孔修复&nbsp;
                                                                                                                                    <INPUT id="beforeSurgery" value="MPF" type=checkbox name="surgeryType8">咽瓣修复</font>
                                                                                                                            </P>
                                                                                                                            <P style="line-height: 200%">
                                                                                                                                <font face="新細明體">&nbsp;
                                                                                                                                    <font face="細明體">
                                                                                                                                    <INPUT id="beforeSurgery" value="MPBR" type=checkbox name="surgeryType9">梨骨瓣修复&nbsp;
                                                                                                                                    &nbsp;&nbsp;<INPUT id="beforeSurgery" value="M2CPR" type=checkbox name="surgeryType5">二期颚裂(颚咽)修复&nbsp;
                                                                                                                                    <INPUT id="beforeSurgery" value="MLR" type=checkbox name="surgeryType6">唇鼻整形&nbsp;
                                                                                                                                    <INPUT id="beforeSurgery" value="MAB" type=checkbox name="surgeryType7">齿槽植骨&nbsp;
                                                                                                                                </font>
                                                                                                                            </P>
                                                                                                                            <P style="line-height: 200%">
                                                                                                                                <font face="新細明體">&nbsp;
                                                                                                                                    <font face="細明體">
                                                                                                                                        &nbsp;&nbsp;&nbsp;&nbsp;<INPUT id="surgeryType10" value="other" type=checkbox name="surgeryType10">其它
                                                                                                                                    </INPUT>
                                                                                                                                    <INPUT id="surgeryTypeOther_text" maxLength=60 size=60 name="surgeryTypeOther_text">
                                                                                                                                </font>
                                                                                                                            </P>
                                                                                                                        </FONT>
                                                                                                                    </TD>
                                                                                                                </TR>
                                                                                                                <TR>
                                                                                                                    <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=145>
                                                                                                                        <p style="line-height: 200%">
                                                                                                                            <font face="新細明體" size="3">
                                                                                                                                &nbsp;&nbsp;<INPUT id="AllowanceType" value="1" type=checkbox name="AllowanceType">
                                                                                                                            </font>
                                                                                                                            <font face="新細明體">&nbsp;申请补助类型</font>
                                                                                                                    </TD>
                                                                                                                    <TD style="BORDER-BOTTOM: 1px solid; BORDER-LEFT: 1px solid; BORDER-TOP: 1px solid; BORDER-RIGHT: 1px solid" width=624>
                                                                                                                        <p style="line-height: 200%">
                                                                                                                            <font size="3" face="新細明體">&nbsp;</font>
                                                                                                                            <font face="細明體" size="3">
                                                                                                                                <INPUT id="ps" value="ps" type=checkbox name="ps">
                                                                                                                            </font>
                                                                                                                            <font size="3" face="新細明體">整形外科&nbsp;
                                                                                                                            </font>
                                                                                                                            <font face="細明體" size="3">
                                                                                                                                <font face="新細明體">
                                                                                                                                    <INPUT id="po" value="po" type=checkbox name="po">
                                                                                                                                </font>
                                                                                                                                <font size="3" face="新細明體">术前正畸&nbsp;
                                                                                                                                </font>
                                                                                                                                <font face="新細明體">
                                                                                                                                    <INPUT id="st" value="st" type=checkbox name="st">
                                                                                                                                </font>
                                                                                                                                <font size="3" face="新細明體">语言治疗</font>
                                                                                                                            </font>
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
                                                                                    <TABLE border=0 cellSpacing=1 width=780 id="table36">
                                                                                        <TBODY>
                                                                                            <TR>
                                                                                                <TD>
                                                                                                    <P align=center style="line-height: 200%">
                                                                                                        <font face="新細明體" size="3">
                                                                                                            <INPUT id=save0 onclick="return saveData('save')" value=統計 type=button name=save> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                                        </font>
                                                                                                        <font face="細明體" size="3">
                                                                                                            <font face="新細明體">
                                                                                                                <INPUT id=close0 onclick="return saveData('cancelAdd')" value=取消 type=button name=close>
                                                                                                            </font>
                                                                                                            <font size="3" face="新細明體">
                                                                                                            </font>
                                                                                                        </font>
                                                                                                    </P>
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
                                                    <font face="新細明體">
                                                    </FONT>
                                                    </CENTER>
                                                    </font>
                                                </TD>
                                            </TR>
                                            <TR>
                                                <TD height=1 width="100%" align=middle>
                                                    <HR color=#c0c0c0 SIZE=1 width="98%">
                                                    <P align=center style="line-height: 200%">
                                                        <I><FONT size=2>
      <FONT color=#999999
            face=新細明體>The&nbsp; Web&nbsp; Best&nbsp; Browse&nbsp; Mode
            ：
            </FONT><FONT face=新細明體><FONT
            color=#999999>Internet&nbsp; Explorer&nbsp; 6.02 (Or Update)&nbsp;
            /&nbsp; 800 x 600&nbsp; Resolution<BR>Copyright <span lang="zh-tw">©</span>&nbsp;&nbsp;
            </FONT><A href="http://www.nncf.org/" target=_blank><FONT
            color=#0066cc>Noordhoff&nbsp; Craniofacial&nbsp;
            Foundation<BR><BR></FONT></A></FONT></FONT></I>
                                                    </P>
                                                </TD>
                                            </TR>
                                        </TBODY>
                                    </TABLE>
                                </DIV>
                            </TD>
                        </TR>
                    </TBODY>
                </TABLE>
            </CENTER>
        </DIV>
        <font face="新細明體">
            <INPUT value="cn01001" type=hidden name="patientID">
            <INPUT type=hidden name="remark">
            <INPUT value="" type=hidden name="NCFID">
            <INPUT value="" type=hidden name="NCFMedicalNum">
            <INPUT value="1" type=hidden name="branch">
            <INPUT value="1" type=hidden name="serialcode"> </font>
    </FORM>
</BODY>

</HTML>
<?PHP
} else {
	echo "<Script Language='JavaScript'>";
	echo "alert('抱歉您现在无权限读取，请先登入')\;";
	echo " location.href=\'login.php\'\;";
	echo " </Script>";
}
?>