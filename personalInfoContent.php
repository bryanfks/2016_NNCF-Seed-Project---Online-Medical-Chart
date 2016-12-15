<!-- <form method="post" name="personalinfo" action="searchinfos.php"> -->
<form method="post" name="personalinfo" action="P2E.php" xmlns:javascript="http://www.w3.org/1999/xhtml">
<div class="Content-Title">
    <table style="text-align: center;" class="Content-Title-2">
        <tr>
            <td style="vertical-align:middle;"><b>个案基本资料汇出功能</b></td>
        </tr>
    </table>
</div>
<div class="CountrySelect">
    <table class="DiagnosisForm">
        <tr><td colspan="3" align="center">&nbsp;&nbsp;<b>选择汇出资料国别</b></td></tr>
        <tr>
            <td colspan="3" align="center">
                <select size="1" name="CountryCode">
                    <option value="CN">China</option>
                    <option value="KH">Cambodia</option>
                    <option value="PK">Pakistan</option>
                    <option value="VN">Vietnam</option>
                </select>
            </td>
        </tr>
    </table>
</div>
<div class="HospitalData">
    <table class="DiagnosisForm">
        <tr><td colspan="3">&nbsp;&nbsp;<b>接案医院资料</b></td></tr>
        <tr>
            <td><input type="checkbox" name="school" value="1" title=""> 医院名称</td>
            <td colspan="2"><input type="checkbox" name="casedays" value="1" title=""> 接案日期</td>
        </tr>
        <tr>
            <td><input type="checkbox" name="surgeryDrName" value="1" title=""> 外科医师</td>
            <td><input type="checkbox" name="languageTherapist" value="1" title=""> 语言治疗师</td>
            <td><input type="checkbox" name="orthodontics" value="1" title=""> 正畸科医师</td>
        </tr>
    </table>
</div>
<div class="PersonalData">
    <table class="DiagnosisForm">
        <tr><td colspan="2">&nbsp;&nbsp;<b>个案基本数据</b></td></tr>
        <tr>
            <td style="width: 360px;"><input type="checkbox" name="idno" value="1" title=""> 身份证号</td>
            <td><input type="checkbox" name="MedicalRecordNumber" value="1" title=""> 病历号码</td>
        </tr>
        <tr>
            <td style="width: 360px;"><input type="checkbox" name="name" value="1" title=""> 个案姓名</td>
            <td><input type="checkbox" name="gender" value="1" title=""> 性别</td>
        </tr>
        <tr>
            <td style="width: 360px;"><input type="checkbox" name="birthdays" value="1" title=""> 出生日期</td>
            <td><input type="checkbox" name="profession" value="1" title=""> 职业</td>
        </tr>
        <tr>
            <td style="width: 360px;"><input type="checkbox" name="tel" value="1" title=""> 电话</td>
            <td><input type="checkbox" name="education" value="1" title=""> 教育程度</td>
        </tr>
        <tr>
            <td colspan="2"><input type="checkbox" name="address" value="1" title=""> 住址</td>
        </tr>
        <tr>
            <td colspan="2"><input type="checkbox" name="contactperson" value="1" title="">&nbsp;重要联系人&nbsp;&nbsp;<input type="checkbox" name="relationship" value="1" title="">&nbsp;与个案关系&nbsp;&nbsp;<input type="checkbox" name="phone" value="1" title="">&nbsp;连络电话(自宅)&nbsp;&nbsp;<input type="checkbox" name="cellphone" value="1" title="">&nbsp;&nbsp;连络电话(手机)</td>
        </tr>
        <tr>
            <td colspan="2"><input type="checkbox" name="h2hdistance" value="1" title=""> 住家离医院距离</td>
        </tr>
    </table>
</div>
<div class="DiagnosisData">
    <table class="DiagnosisForm">
        <tr><td colspan="2" style="line-height: 30px;">&nbsp;&nbsp;<b>医疗诊断</b></td></tr>
        <tr>
            <td style="width: 360px;"><input type="checkbox" name="height" value="1" title="">&nbsp;身高</td>
            <td><input type="checkbox" name="weight" value="1" title="">&nbsp;体重</td>
        </tr>
        <tr>
            <td colspan="2"><input type="checkbox" name="mains" value="1" title="">&nbsp;主诊断&nbsp;&nbsp;<input type="checkbox" name="Combined_with_other_craniofacial_disorders" value="1" title="">&nbsp;合并其它颅颜病症</td>
        </tr>
        <tr>
            <td colspan="2"><input type="checkbox" name="Cleft_lip_and_palate_surgery" value="1" title="">&nbsp;个案之前接受过任何唇颚裂治疗&nbsp;&nbsp;<input type="checkbox" name="beforeSurgery_other" value="1" title="">&nbsp;其它，请详述</td>
        </tr>
    </table>
</div>
<div class="FamilyData">
    <table class="DiagnosisForm">
        <tr><td colspan="2" style="line-height: 30px;">&nbsp;&nbsp;<b>家庭状况</b></td></tr>
        <tr>
            <td colspan="2"><input type="checkbox" name="familyMembers" value="1" title="">&nbsp;家庭成员</td>
        </tr>
        <tr>
            <td colspan="2"><input type="checkbox" name="fatherAge" value="1" title="">&nbsp;父亲年龄　<input type="checkbox" name="fatherProfession_main" value="1" title="">&nbsp;职业　<input type="checkbox" name="fatherProfession" value="1" title="">&nbsp;教育程度</td>
        </tr>
        <tr>
            <td colspan="2"><input type="checkbox" name="motherAge" value="1" title="">&nbsp;母亲年龄　<input type="checkbox" name="motherProfession_main" value="1" title="">&nbsp;职业　<input type="checkbox" name="motherProfession" value="1" title="">&nbsp;教育程度</td>
        </tr>
        <tr>
            <td colspan="2"><input type="checkbox" name="descriptionCaseFamily" value="1" title="">&nbsp;个案家庭情况说明</td>
        </tr>
        <tr>
            <td style="width: 360px;"><input type="checkbox" name="mainSourceofIncome" value="1" title="">&nbsp;主要经济 / 收入来源</td>
            <td><input type="checkbox" name="income" value="1" title="">&nbsp;平均年收入</td>
        </tr>
        <tr>
            <td><input type="checkbox" name="fixedExpenditure" value="1" title="">&nbsp;家中固定支出项目</td>
            <td><input type="checkbox" name="extimatedExpenditures" value="1" title="">&nbsp;预估支出 (平均每月生活支出)</td>
        </tr>
    </table>
</div>
<div class="ButtonZone">
    <table style="text-align: center" class="ButtonZone">
        <tr class="ButtonZone">
            <td style="vertical-align:middle;" class="ButtonZone">
                <input class="FormBT" type="submit" name="OutputData" value="汇出资料" style="border: 1px solid #73808c; width: 80px;" title="">
                <input class="FormBT" type="button" name="Cancel" value="取消" style="border: 1px solid #73808c; width: 80px;" title="" onclick="cancels()">
            </td>
        </tr>
    </table>
</div>
</form>