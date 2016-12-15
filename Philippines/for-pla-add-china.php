<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
		<meta name="ProgId" content="FrontPage.Editor.Document">
		<title>NCF -- Patient Record Online Management System</title>
		
</head>
<body topmargin="2" onLoad="">

	<form name="ppls_form" enctype="multipart/form-data" method="post" action="">
		<div align="center">
  			<center>
				<table border="0" cellpadding="0" cellspacing="0" width="760">
				  <tr>
						<td width="100%">
							<div align="center">
								<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-style: solid; border-width: 2" height="1">
									<tr>
										<td width="100%" height="16" align="center"><font size="2" face="Arial"><?PHP include("top.php"); ?></font></td>
									</tr>
            						<tr>
              							<td width="100%" height="16" align="center"><font size="2" face="Arial"><?PHP include("select.php"); ?></font></td>
            						</tr>
                            	</table>
                            </div>
                            </td>
                            </tr>
            <tr>
              <td width="100%" height="100%" align="center">
                <div align="center">
                  <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                      <td width="103%">
                        <? if($res_Memberdata['authority']  == 'p'){ ?>
                        <div align="left">
                          <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                              <td width="20%"><font size="3" face="Arial"><a id="NCF_Partner" onClick="return checkPartner2()" href="#"><img border="0" src="images/label-11.gif" width="160" height="40"></a></font></td>
                              <td width="20%"><img border="0" src="images/label-22.gif" width="160" height="40"></td>
                              <?PHP //echo "<input type='hidden' id='partner_value' name='partner_value' value='".$patient_id."'> "; ?>
                              <td width="20%"></td>
                              <td width="20%"></td>
                              <td width="20%"></td>
                            </tr>
                          </table>
                        </div>
					  <?  } elseif ($res_Memberdata['authority']  == 'c') { ?>
                        <div align="left">
                          <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                              <td width="20%"><font size="3" face="Arial"><a id="NCF_Partner" onClick="return checkPartner2()" href="#"><img border="0" src="images/label-11.gif" width="160" height="40"></a></font></td>
                              <td width="20%"></td>
                              <td width="20%"><img border="0" src="images/label-23.gif" width="160" height="40"></td>
                              <?PHP //echo "<input type='hidden' id='partner_value' name='partner_value' value='".$patient_id."'> "; ?>
                              <td width="20%"></td>
                              <td width="20%"></td>
                            </tr>
                          </table>
                        </div>
                        <?  } elseif ($res_Memberdata['authority']  == 'n' || 'a') { ?>
                        <div align="left">
                          <table border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                              <td width="21%"><font size="3" face="Arial"><a id="NCF_Partner" onClick="return checkPartner2()" href="#"><img border="0" src="images/label-11.gif" width="160" height="40"></a></font></td>
                              <td width="19%"></td>
                              <td width="21%"></td>
                              <td width="21%"><img border="0" src="images/label-24.gif" width="160" height="40"></td>
                              <?PHP //echo "<input type='hidden' id='partner_value' name='partner_value' value='".$patient_id."'> "; ?>
                              <td width="18%"></td>
                            </tr>
                          </table>
                        </div>
                        <? } ?>
                      </td>
                    </tr>
  <center>
  <tr>
                <td width="103%" align="center" bgcolor="#F7EBC6">
              <font size="2">　</font>
              <div align="center">
                <table border="1" cellpadding="0" cellspacing="0" width="100%" bgcolor="#FF9966">
                  <tr>
                    <td width="100%">
                      <p align="center"><font face="Arial" color="#FFFFFF" size="3"><i><b>
                      西安交通大学口腔医院清寒唇腭裂患者补助申请表</b></i></font></td>        
                  </tr>
                </table>
              </div>
        </td>
          </tr>
          <tr>
            <td width="103%" align="center" bgcolor="#F7EBC6" valign="top">
              <div align="center">
                <center>
                <table border="0" cellpadding="0" cellspacing="0" width="90%" height="143" style="font-family: Arial; font-size: 12pt; color: #666666; border-collapse: collapse" bordercolor="#111111">
                  <tr>
                    <td width="100%" height="4" align="right" valign="top">
               <?PHP 
			   		//echo "Record Number: ".$record_nums;
			   ?>
              
				<p align="center" style="margin-left: 10; margin-right: 10">
					<div align="center">
						<center>
                        	<table border="1" width="100%">
                  				<tr>
                  				  <td align="center">接案日期</td>
                                  <td colspan="2">
                                    <input type="text" name="caseYear" id="caseYear" maxlength="4" size="5" value="" />年
                                    <input type="text" name="caseMonth" id="caseMonth" maxlength="2" size="3" value="" />月
                                    <input type="text" name="caseDay" id="caseDay" maxlength="2" size="3" value=""/>日
                                  </td>
                                  <td align="center">NCF编号</td>
                                  <td colspan="2">
                                    <input type="text" name="NCFID" id="NCFID" maxlength="20" size="20" value="" /></td>
                                  </tr>
                                <tr>
                  				  <td align="center">外科医师</td>
                                  <td>
                                    <input type="text" name="surgeryDrName" id="surgeryDrName" maxlength="20" size="20" value="" /></td>
                                  <td align="center">语言治疗师</td>
                                  <td>
                                    <input type="text" name="languageTherapist" id="languageTherapist" maxlength="20" size="20" value="" /></td>
                                  <td align="center">正畸科医师</td>
                                  <td>
                                    <input type="text" name="orthodontics" id="orthodontics" maxlength="20" size="20" value="" /></td>
                  				</tr>
                  			</table>
                            <br/>
                            <br/>
                            
                            <table border="1" cellspacing="1" width="100%">
                            	<tr>
									<td colspan="6" align="center"><strong>个案基本数据</strong></td>
								</tr>
                  				<tr>
									<td colspan="6"><p>&nbsp;</p>
									  <p><strong>个案基本数据</strong></p></td>
								</tr>
                  				<tr>
                  				  <td width="30%" align="center" valign="middle">*病历号码</td>
                  				  <td colspan="2" align="left"><label for="MedicalRecordNumber"></label>
                  				    <input type="text" name="MedicalRecordNumber" id="MedicalRecordNumber" value="" /></td>
                  				  <td width="0" align="center">身份证号</td>
                  				  <td colspan="2" align="left"><label for="idno"></label>
    	              			    <input type="text" name="idno" id="idno" value=""/></td>
                  				  </tr>
    	              			<tr>
    	              			  <td align="center" valign="middle">*个案姓名</td>
    	              			  <td colspan="2" align="left"><label for="name"></label>
    	              			    <input type="text" name="name" id="name" value="" /></td>
    	              			  <td align="center">性  别</td>
    	              			  <td colspan="2" align="left">
                                    <p>
                  				    <label><input type="radio" name="gender" value="男" id="gender_male" />男</label>
                  				    <label><input type="radio" name="gender" value="女" id="gender_female" />女</label>
                  				  </p>
                                    </td>
    	              			  </tr>
    	              			<tr>
    	              			  <td align="center" valign="middle">*出生年日期</td>
    	              			  <td colspan="2" align="left"><label for="birthYear"></label>
    	              			    <input type="text" name="birthYear" id="birthYear" maxlength="4" size="4" value="" />年  
    	              			    <label for="birthMonth"></label>
    	              			    <input type="text" name="birthMonth" id="birthMonth" maxlength="2" size="3" value=""/>月  
									<label for="birthDay"></label>
									<input type="text" name="birthDay" id="birthDay" maxlength="2" size="3" value=""/>日</td>
    	              			  <td align="center">职  业</td>
    	              			  <td colspan="2" align="left"><label for="profession"></label>
    	              			    <input type="text" name="profession" id="profession" value="" /></td>
    	              			  </tr>
    	              			<tr>
    	              			  <td align="center" valign="middle">*电   话</td>
    	              			  <td colspan="2" align="left"><label for="textfield11"></label>
    	              			    <input type="text" name="tel" id="tel" value="" /></td>
    	              			  <td align="center">教育程度</td>
    	              			  <td colspan="2" align="left"><label for="education"></label>
    	              			    <input type="text" name="education" id="education" value="" /></td>
    	              			  </tr>
    	              			<tr>
    	              			  <td align="center" valign="middle">*住   址</td>
    	              			  <td colspan="5" align="left"><label for="address"></label>
    	              			    <input type="text" name="address" id="address" maxlength="110" size="110" value="" /></td>
    	              			  </tr>
    	              			<tr>
    	              			  <td align="center" valign="middle">*重要联系人</td>
    	              			  <td colspan="2" align="left"><label for="contactperson"></label>
    	              			    <input type="text" name="contactperson" id="contactperson" value="" /></td>
    	              			  <td align="center">*与个案关系</td>
    	              			  <td colspan="2" align="left"><label for="relationship"></label>
    	              			    <input type="text" name="relationship" id="relationship" value="" /></td>
    	              			  </tr>
    	              			<tr>
    	              			  <td align="center" valign="middle">连络电话</td>
    	              			  <td colspan="5" align="left"><p>
    	              			    <label for="phone"></label>
    	              			    <input type="text" name="phone" id="phone" value="" />
    	              			  </p></td>
  	              			  </tr>
    	              			<tr>
    	              			  <td align="center" valign="middle"><p align="center">住家离 </p>
    	              			    医院距离</td>
    	              			  <td colspan="5" align="left"><p>
    	              			    <label>
    	              			      <input type="radio" name="h2hdistance" value="<100" id="h2hdistance" />
    	              			      少于100公里</label>
    	              			    <label>
    	              			      <input type="radio" name="h2hdistance" value="100-200" id="h2hdistance" />
    	              			      100-200公里</label>
    	              			    <label>
    	              			      <input type="radio" name="h2hdistance" value=">200" id="h2hdistance" />
    	              			      大于200公里</label>
    	              			    <br />
    	              			    </p>
    	              			    <label for="checkbox"></label></td>
  	              			  </tr>
    	              			<tr>
    	              			  <td colspan="6" align="left"><p>&nbsp;</p>
    	              			    <p><strong>医疗诊断</strong></p></td>
    	              			  </tr>
    	              			<tr>
    	              			  <td align="center">身 高</td>
    	              			  <td colspan="2" align="left"><label for="height"></label>
    	              			    <input type="text" name="height" id="height" maxlength="3" size="4" value="" />
    	              			    公分</td>
    	              			  <td align="center">体 重</td>
    	              			  <td colspan="2" align="left"><label for="weight"></label>
    	              			    <input type="text" name="weight" id="weight" maxlength="3" size="4" value="" />
    	              			    公斤</td>
    	              			  </tr>
    	              			<tr>
    	              			  <td rowspan="5" align="center">*主诊断(医学专有名词)</td>
    	              			  <td colspan="5" align="left">
                                  	<p>
    	              			    	<input type="checkbox" name="diagnosis_unilateral_cleft_lip_1" id="diagnosis_unilateral_cleft_lip_1" />单侧唇裂（
    	              			    	<input type="radio" name="diagnosis_unilateral_cleft_lip" id="diagnosis_unilateral_cleft_lip" value="完全性" />完全性
    	              			    	<input type="radio" name="diagnosis_unilateral_cleft_lip" id="diagnosis_unilateral_cleft_lip" value="不完全性"  />不完全性
    	              			    	<input type="radio" name="diagnosis_unilateral_cleft_lip" id="diagnosis_unilateral_cleft_lip" value="隐裂"  />隐裂）   
                                    </p></td>
    	              			  </tr>
								<tr>
									<td colspan="5" align="left">
                                  		<input type="checkbox" name="diagnosis_bilateral_cleft_lip_1" id="diagnosis_bilateral_cleft_lip_1" />双侧唇裂（
    	              			    	<input type="radio" name="diagnosis_bilateral_cleft_lip" id="diagnosis_bilateral_cleft_lip" value="完全性" />完全性
    	              			    	<input type="radio" name="diagnosis_bilateral_cleft_lip" id="diagnosis_bilateral_cleft_lip" value="不完全性" />不完全性
    	              			    	<input type="radio" name="diagnosis_bilateral_cleft_lip" id="diagnosis_bilateral_cleft_lip" value="混合裂" />混合裂）</td>
								</tr>
    	              			<tr>
    	              			  <td colspan="5" align="left">
                                  <p>
    	              			    <label for="checkbox9"><input type="checkbox" name="CleftPalate" id="CleftPalate" /></label>腭裂
    	              			    <label for="checkbox10"><input type="checkbox" name="incomplete_main" id="incomplete_main" /></label>不完全性（
    	              			    <label for="checkbox11"><input type="radio" name="incomplete" id="incomplete" value="粘膜下裂" /></label>粘膜下裂
    	              			    <label for="checkbox12"><input type="radio" name="incomplete" id="incomplete" value="悬雍垂裂" /></label>悬雍垂裂
    	              			    <label for="checkbox13"><input type="radio" name="incomplete" id="incomplete" value="软腭裂" /></label>软腭裂
    	              			    <input type="radio" name="incomplete" id="incomplete" value="双侧裂" />双侧裂）
                                  </p>
                                  </td>
    	              			  </tr>
    	              			<tr>
    	              			  <td colspan="5" align="left"> 
    	              			    <label for="complete_main"><input type="checkbox" name="complete_main" id="complete_main" /></label>
    	              			    完全性（<input type="radio" name="complete" id="complete" value="单侧"/>
    	              			    单侧 <input type="radio" name="complete" id="complete" value="双侧" />
    	              			    双侧）
                                  </td>
    	              			  </tr>
    	              			<tr>
    	              			  <td colspan="5" align="left">
                                  	<input type="checkbox" name="Combined_with_other_craniofacial_disorders" id="Combined_with_other_craniofacial_disorders"/>合并其他颅颜病症
                                  </td>
    	              			  </tr>
    	              			<tr>
    	              			  <td colspan="6" align="left">＊个案之前是否接受过任何唇腭裂手术？ 
									<label><input type="radio" name="Cleft_lip_and_palate_surgery" value="Y" id="Cleft_lip_and_palate_surgery" />是</label>
									<label><input type="radio" name="Cleft_lip_and_palate_surgery" value="N" id="Cleft_lip_and_palate_surgery" />否</label>
    	              			   </td>
    	              			  </tr>
    	              			<tr>
    	              			  <td colspan="6" align="left">＊如果是，个案曾经接受过何种手术？ </td>
    	              			  </tr>
    	              			<tr>
    	              			  <td colspan="6" align="left">
    	              			    <p>
    	              			      <label><input type="checkbox" name="beforeSurgery_1" value="一期单侧唇鼻修复" id="beforeSurgery_1" />一期单侧唇鼻修复</label>
    	              			      <label><input type="checkbox" name="beforeSurgery_2" value="一期双侧唇鼻修复" id="beforeSurgery_2" />一期双侧唇鼻修复</label>
    	              			      <label><input type="checkbox" name="beforeSurgery_3" value="一期腭裂修复" id="beforeSurgery_3" />一期腭裂修复</label>
    	              			      <label><input type="checkbox" name="beforeSurgery_4" value="廔孔修复" id="beforeSurgery_4" />廔孔修复</label>
    	              			      <label><input type="checkbox" name="beforeSurgery_5" value="咽瓣修复" id="beforeSurgery_5" />咽瓣修复</label>
    	              			      <label><input type="checkbox" name="beforeSurgery_6" value="梨骨瓣修复" id="beforeSurgery_6" />梨骨瓣修复</label>
    	              			    </p>    	              			    
                                    <p>
    	              			      <label for="beforeSurgery_7"><input type="checkbox" name="beforeSurgery_7" id="beforeSurgery_7" value="二期腭裂(腭咽)修复" />二期腭裂(腭咽)修复</label>
    	              			      <label for="beforeSurgery_8"><input type="checkbox" name="beforeSurgery_8" id="beforeSurgery_8" value="唇鼻整形" />唇鼻整形</label>
    	              			      <label for="beforeSurgery_9"><input type="checkbox" name="beforeSurgery_9" id="beforeSurgery_9" value="齿槽植骨" />齿槽植骨</label>
    	              			      <label for="beforeSurgery_10"><input type="checkbox" name="beforeSurgery_10" id="beforeSurgery_10" value="术前正畸" />术前正畸</label>
    	              			      <label for="beforeSurgery_other"><input type="checkbox" name="beforeSurgery_other" id="beforeSurgery_other" value="其他" />其他，请详述</label>
    	              			      <label for="beforeSurgery_other_reason"><input type="text" name="beforeSurgery_other_reason" id="beforeSurgery_other_reason" value="" /></label>
    	              			    </p>
								</td>
							</tr>
    	              			<tr>
    	              			  <td colspan="6" align="left"><p>&nbsp;</p>
    	              			    <p><strong>家庭经济状况</strong></p></td>
  	              			  </tr>
    	              			<tr>
    	              			  <td colspan="6" align="left">*家庭成员共
    	              			    <label for="familyMembers"></label>
    	              			    <input type="text" name="familyMembers" id="familyMembers" maxlength="3" size="4" value="" />
    	              			    人；同住
    	              			    <label for="live_together"></label>
    	              			    <input type="text" name="live_together" id="live_together" maxlength="3" size="4" value="" />
    	              			    人</td>
    	              			  </tr>
    	              			<tr>
    	              			  <td align="center">*父亲年龄</td>
    	              			  <td width="100%" align="left"><label for="fatherAge"></label>
    	              			    <input type="text" name="fatherAge" id="fatherAge" maxlength="3" size="4" value="" />
    	              			    岁</td>
    	              			  <td width="100%" align="center">*职 业</td>
    	              			  <td align="left"><label for="fatherProfession_main"></label>
    	              			    <input type="text" name="fatherProfession_main" id="fatherProfession_main" value="" /></td>
    	              			  <td width="100%" align="center">*教育程度</td>
    	              			  <td width="100%" align="left">
                                  <p>
    	              			    <label><input type="radio" name="fatherProfession" value="大专以上" id="fatherProfession" />大专以上</label>
    	              			    <br />
    	              			    <label><input type="radio" name="fatherProfession" value="中学(专)" id="fatherProfession" />中学(专) </label>
    	              			    <br />
    	              			    <label><input type="radio" name="fatherProfession" value="小学" id="fatherProfession" />小学</label>
    	              			    <br />
    	              			    <label><input type="radio" name="fatherProfession" value="识字" id="fatherProfession" />识字</label>
    	              			    <label><input type="radio" name="fatherProfession" value="不识字" id="fatherProfession" />不识字</label>
    	              			  </p>
                                  </td>
  	              			  </tr>
    	              			<tr>
    	              			  <td align="center">*母亲年龄</td>
    	              			  <td align="left"><label for="motherAge_main"></label>
    	              			    <input type="text" name="motherAge_main" id="motherAge_main" maxlength="3" size="4" value="" />
    	              			    岁</td>
    	              			  <td align="center">*职 业</td>
    	              			  <td align="left"><label for="motherProfession_main"></label>
    	              			    <input type="text" name="motherProfession_main" id="motherProfession_main" value="" /></td>
    	              			  <td align="center">*教育程度</td>
    	              			  <td align="left">
                                  <p>
    	              			    <label><input type="radio" name="motherProfession" value="大专以上" id="motherProfession" />大专以上</label>
    	              			    <br />
    	              			    <label><input type="radio" name="motherProfession" value="中学(专)" id="motherProfession" />中学(专) </label>
    	              			    <br />
    	              			    <label><input type="radio" name="motherProfession" value="小学" id="motherProfession" />小学</label>
    	              			    <br />
    	              			    <label><input type="radio" name="motherProfession" value="识字" id="motherProfession" />识字</label>
    	              			    <label><input type="radio" name="motherProfession" value="不识字" id="motherProfession" />不识字</label>
    	              			  </p>
                                  </td>
  	              			  </tr>
    	              			<tr>
    	              			  <td rowspan="2">*家系图</td>
    	              			  <td colspan="5" align="center">
                                  	<img border="0" src="<?PHP if(!empty($res_PatientRecord['prephoto_frontal'])){ echo $res_PatientRecord['prephoto_frontal']; }else{ echo 'images/user-pic.jpg'; } ?>" alt="Pedigree" width="290" height="250"></td>
  	              			  </tr>
    	              			<tr>
    	              			  <td>&nbsp;</td>
    	              			  <td colspan="3" align="center"><input type="file" name="pedigree_graphics" size="25" value=""></td>
    	              			  <td>&nbsp;</td>
  	              			  </tr>
    	              			<tr>
    	              			  <td align="center"><p align="center">*个案家庭情况说明</p></td>
    	              			  <td colspan="5" align="left"><label for="descriptionCaseFamily"></label>
    	              			    <textarea name="descriptionCaseFamily" id="descriptionCaseFamily" cols="80" rows="7"></textarea></td>
    	              			  </tr>
    	              			<tr>
    	              			  <td align="center">*主要经济/收入来源</td>
    	              			  <td colspan="2" align="left"><label for="mainSourceofIncome"></label>
    	              			    <input type="text" name="mainSourceofIncome" id="mainSourceofIncome" maxlength="26" size="30" /></td>
    	              			  <td align="center">*收 入</td>
    	              			  <td colspan="2" align="left">平均年收入
    	              			    <label for="income"></label>
    	              			    <input type="text" name="income" id="income" maxlength="7" size="9" />
    	              			    人民币</td>
    	              			  </tr>
    	              			<tr>
    	              			  <td align="center">*家中固定支出项目(福利院免填)</td>
    	              			  <td colspan="2" align="left"> 
    	              			    <label for="fixedExpenditure1">1. <input type="text" name="fixedExpenditure1" id="fixedExpenditure1" maxlength="30" size="30" /></label>
                                    <br/>
                                    <label for="fixedExpenditure2">2. <input type="text" name="fixedExpenditure2" id="fixedExpenditure2" maxlength="30" size="30" /></label>
    	              			    <br/>
                                    <label for="fixedExpenditure3">3. <input type="text" name="fixedExpenditure3" id="fixedExpenditure3" maxlength="30" size="30" /></label>
    	              			    <br/>
                                    <label for="fixedExpenditure4">4. <input type="text" name="fixedExpenditure4" id="fixedExpenditure4" maxlength="30" size="30" /></label>
    	              			    </td>
    	              			  <td align="center">*预估支出</td>
    	              			  <td colspan="2" align="left">平均每月生活支出
    	              			    <label for="extimatedExpenditures"></label>
    	              			    <input type="text" name="extimatedExpenditures" id="extimatedExpenditures" maxlength="7" size="9" />
    	              			    人民币</td>
  	              			  </tr>
    	              			<tr>
    	              			  <td align="center">*社会资源使用情形</td>
    	              			  <td colspan="5" align="left">
                                  <p>
    	              			    <input type="radio" name="usageofSocialResources" id="usageofSocialResources" value="Y" />有
    	              			    <br/>
    	              			    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;医疗补助：
    	              			    <input type="checkbox" name="smileTrain" id="smileTrain" value="微笑列車" />微笑列车，项目
    	              			    <input type="text" name="MSitem" id="MSitem" value="" />
    	              			    <input type="checkbox" name="Mother" id="Mother" />其他：
    	              			    <input type="text" name="Mother_text" id="Mother_text" /><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;生活补助：单位 -
    	              			    <input type="text" name="LAunit" id="LAunit" />项目- 
    	              			    <input type="text" name="LAitem" id="LAitem" /><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;其他补助：单位 - 
    	              			    <input type="text" name="OAunit" id="OAunit" />项目-
    	              			    <input type="text" name="OAitem" id="OAitem" />
                                    </p>
                                    <p>
                                    <input type="radio" name="usageofSocialResources" id="usageofSocialResources" value="N" />无
                                    </p>
                                    </td>
  	              			  </tr>
                              <tr>
                                <td align="center">*申请NCF补助</td>
                                <td colspan="5" align="left">
                                	<p>
                                		<input type="checkbox" name="surgicalAssistanceForMedicalExpenses" id="surgicalAssistanceForMedicalExpenses" />手术医疗费补助（
										<input type="radio" name="surgicalAssistanceForMedicalExpenses_sel" id="surgicalAssistanceForMedicalExpenses_sel" value="第一级" />第一级
										<input type="radio" name="surgicalAssistanceForMedicalExpenses_sel" id="surgicalAssistanceForMedicalExpenses_sel" value="第二级" />第二级
										<input type="radio" name="surgicalAssistanceForMedicalExpenses_sel" id="surgicalAssistanceForMedicalExpenses_sel" value="第三级" />第三级）
										<input type="checkbox" name="speechTherapySubsidies" id="speechTherapySubsidies" value="" />语言治疗费补助
                                  	</p>
                                    <p>
                                    	<input type="checkbox" name="transportationSubsidies" id="transportationSubsidies" value="交通费补助" />交通费补助
                                    	<input type="checkbox" name="preoperativeOrthodonticSubsidies" id="preoperativeOrthodonticSubsidies" value="术前正畸补助"/>术前正畸补助  
                                    	<input type="checkbox" name="NCFAssistance_Other" id="NCFAssistance_Other" value="" />其他
                                        <input type="text" name="NCFAssistance_Other_text" id="NCFAssistance_Other_text" />
                                    </p>
                                  	填表人：<input type="text" name="signature" id="signature" />
                                  </td>
                              </tr>
                              </table>
                            <br/>
                            <br/>
                            <br/>
                            <br/>
                            <table border="1" cellspacing="1" width="100%">
								<tr>
    	              			  <td colspan="4"><strong>手术医疗暨交通费补助申请表</strong></td>
    	              			  </tr>
                              <tr>
    	              			  <td align="center" width="15%"><strong>NCF个案编号</strong></td>
    	              			  <td align="left" width="35%">
    	              			    <input type="text" name="NCFNum" id="NCFNum" value="" /></td>
    	              			  <td align="center" width="15%"><strong>个案姓名</strong></td>
    	              			  <td align="left" width="35%">
    	              			    <input type="text" name="patientName" id="patientName" value="" /></td>
  	              			  </tr>
                              <tr>
    	              			  <td colspan="4" align="left"><strong>手术治疗</strong></td>
    	              			  </tr>
                              <tr>
    	              			  <td align="center">住院时间</td>
    	              			  <td align="left">
    	              			  	<input type="text" name="BIHosTimeYear" id="BIHosTimeYear" maxlength="4" size="5" value="" />年
    	              			    <input type="text" name="BIHosTimeMonth" id="BIHosTimeMonth" maxlength="2" size="3" value="" />月
    	              			    <input type="text" name="BIHosTimeDay" id="BIHosTimeDay" maxlength="2" size="3" value="" />日
                                  </td>
    	              			  <td align="center">开刀时间</td>
    	              			  <td align="left">
                                  	<input type="text" name="surgeryTimeYear" id="surgeryTimeYear" maxlength="4" size="5" value="" />年
    	              			    <input type="text" name="surgeryTimeMonth" id="surgeryTimeMonth" maxlength="2" size="3" value="" />月
    	              			    <input type="text" name="surgeryTimeDay" id="surgeryTimeDay" maxlength="2" size="3" value="" />日
                                  </td>
  	              			  </tr>
                              <tr>
    	              			  <td align="center">出院时间</td>
    	              			  <td align="left">
                                  	<input type="text" name="LHosTimeYear" id="LHosTimeYear" maxlength="4" size="5" value="" />年
    	              			    <input type="text" name="LHosTimeMonth" id="LHosTimeMonth" maxlength="2" size="3" value="" />月
    	              			    <input type="text" name="LHosTimeDay" id="LHosTimeDay" maxlength="2" size="3" value="" />日
                                  </td>
    	              			  <td align="center">麻醉方法</td>
    	              			  <td align="left"><p>
    	              			    <label>
    	              			      <input type="radio" name="Anesthesia" id="Anesthesia" value="全身麻醉" />全身麻醉
                                    </label>
    	              			    <label>
    	              			      <input type="radio" name="Anesthesia" id="Anesthesia" value="局部麻醉" />局部麻醉
                                    </label>
    	              			  </p></td>
  	              			  </tr>
                              <tr>
    	              			  <td align="center">外科医师</td>
    	              			  <td align="left">
    	              			    <input type="text" name="surgeon" id="surgeon" value="" /></td>
    	              			  <td align="center">麻醉科医师</td>
    	              			  <td align="left">
    	              			    <input type="text" name="anesthesiologist" id="anesthesiologist" value="" /></td>
  	              			  </tr>
                              <tr>
                                <td align="center">手术类型</td>
                                <td colspan="3" align="left">
                                	<p>
                                  		<input type="checkbox" name="surgeryType1" id="surgeryType1" value="一期单侧唇鼻修复" />一期单侧唇鼻修复
                                  		<input type="checkbox" name="surgeryType2" id="surgeryType2" value="一期双侧唇鼻修复" />一期双侧唇鼻修复
                                  		<input type="checkbox" name="surgeryType3" id="surgeryType3" value="一期腭裂修复" />一期腭裂修复
                                  		<input type="checkbox" name="surgeryType4" id="surgeryType4" value="廔孔修复" />廔孔修复
                                	</p>
                                	<p>
                                    	<input type="checkbox" name="surgeryType5" id="surgeryType5"  value="二期腭裂(腭咽)修复"/>二期腭裂(腭咽)修复
                                    	<input type="checkbox" name="surgeryType6" id="surgeryType6" value="唇鼻整形" />唇鼻整形
                                    	<input type="checkbox" name="surgeryType7" id="surgeryType7" value="齿槽植骨" />齿槽植骨
                                    	<input type="checkbox" name="surgeryType8" id="surgeryType8" value="咽瓣修复" />咽瓣修复
                                    	<input type="checkbox" name="surgeryType9" id="surgeryType9" value="梨骨瓣修复" />梨骨瓣修复
                                  	</p>
                                  	<p>
										<input type="checkbox" name="surgeryTypeOther" id="surgeryTypeOther" />其他：
                                    	<input type="text" name="surgeryTypeOther_text" id="surgeryTypeOther_text" value="" />
                                  </p></td>
                              </tr>
                              <tr>
                                <td rowspan="3" align="center">修补类型</td>
                                <td colspan="3" align="left"><p><strong>单侧唇裂</strong>：</p>
                                  <p>
                                    <label><input type="radio" name="repairTypeUnilateralcleftlip" id="repairTypeUnilateralcleftlip" value="Rotation-Advancement Variant" />Rotation-Advancement Variant</label>
                                    <label><input type="radio" name="repairTypeUnilateralcleftlip" id="repairTypeUnilateralcleftlip" value="Triangular Variant" />Triangular Variant</label>
                                    <label><input type="radio" name="repairTypeUnilateralcleftlip" id="repairTypeUnilateralcleftlip" value="Mohler" />Mohler</label>
                                  </p>
                                  <p>
                                    <label><input type="radio" name="repairTypeUnilateralcleftlip" id="repairTypeUnilateralcleftlip" value="Others" />Others:</label>
                                    <input type="text" name="repairTypeUnilateralcleftlip_text" id="repairTypeUnilateralcleftlip_text" value=""/>
                                  </p>
								</td>
                              </tr>
                              <tr>
                                <td colspan="3" align="left"><p><strong>双侧唇裂：</strong></p>
                                  <p>
                                    <input type="checkbox" name="repairTypeBilateralcleftlip" id="repairTypeBilateralcleftlip" value="Straight Line" />Straight Line
                                    <input type="checkbox" name="repairTypeBilateralcleftlip" id="repairTypeBilateralcleftlip" value="Forked Flap" />Forked Flap
                                    <input type="checkbox" name="repairTypeBilateralcleftlip" id="repairTypeBilateralcleftlip" value="Others" />Others：
                                    <input type="text" name="repairTypeBilateralcleftlip_text" id="repairTypeBilateralcleftlip_text" />
                                  </p></td>
                              </tr>
                              <tr>
                                <td colspan="3" align="left"><p><strong>腭裂</strong>：</p>
                                  <p>
                                    <input type="checkbox" name="repairTypeCleftpalate" id="repairTypeCleftpalate" value="Langenbeck Variant" />Langenbeck Variant
                                    <input type="checkbox" name="repairTypeCleftpalate" id="repairTypeCleftpalate" value="Pushback Variant" />Pushback Variant
                                    <input type="checkbox" name="repairTypeCleftpalate" id="repairTypeCleftpalate" value="Furlow" />Furlow
                                    <input type="checkbox" name="repairTypeCleftpalate" id="repairTypeCleftpalate" value="PF" />PF
                                  </p>
                                  <p>
                                  	<input type="checkbox" name="repairTypeCleftpalate" id="repairTypeCleftpalate" value="Furlow+PF" />Furlow+PF
                                  	<input type="checkbox" name="repairTypeCleftpalate" id="repairTypeCleftpalate" />Others：
                                 	<input type="text" name="repairTypeCleftpalate_text" id="repairTypeCleftpalate_text" value="" />
                              	  </p>	
                                </td>
                              </tr>
                              <tr>
                                <td colspan="4" align="left"><p>&nbsp;</p>
                                  <p><strong>手术结果评估说明：</strong></p></td>
                                </tr>
                              <tr>
    	              			  <td rowspan="3" align="center">手术前</td>
    	              			  <td>
                                  （拍照日：
    	              			    <input type="text" name="beforeSurgeryYear" id="beforeSurgeryYear" maxlength="4" size="5" value="" />年
    	              			    <input type="text" name="beforeSurgeryMonth" id="beforeSurgeryMonth" maxlength="2" size="3" value="" />月
    	              			    <input type="text" name="beforeSurgeryDay" id="beforeSurgeryDay" maxlength="2" size="3" value="" />日
                                    ）
                                  </td>
    	              			  <td rowspan="3" align="center">手术后</td>
    	              			  <td>
                                  （拍照日：
                                    <input type="text" name="afterSurgeryYear" id="afterSurgeryYear" maxlength="4" size="5" value="" />年
    	              			    <input type="text" name="afterSurgeryMonth" id="afterSurgeryMonth" maxlength="2" size="3" value="" />月
    	              			    <input type="text" name="afterSurgeryDay" id="afterSurgeryDay" maxlength="2" size="3" value="" />日
                                    ）
                                  </td>
  	              			  </tr>
                              <tr>
    	              			  <td align="center"><img border="0" src="<?PHP //if(!empty($res_PatientRecord['prephoto_frontal'])){ echo $res_PatientRecord['prephoto_frontal']; }else{ echo 'images/user-pic.jpg'; } ?>" alt="Pedigree" width="290" height="250" /></td>
    	              			  <td align="center"><img border="0" src="<?PHP //if(!empty($res_PatientRecord['prephoto_frontal'])){ echo $res_PatientRecord['prephoto_frontal']; }else{ echo 'images/user-pic.jpg'; } ?>" alt="Pedigree" width="290" height="250" /></td>
  	              			  </tr>
                              <tr>
    	              			  <td align="center"><input type="file" name="pedigree_graphics2" size="25" value="" /></td>
    	              			  <td align="center"><input type="file" name="pedigree_graphics3" size="25" value="" /></td>
  	              			  </tr>
                              <tr>
    	              			  <td colspan="4"><p>&nbsp;</p>
    	              			    <p><strong>申请补助项目【*须检具医疗收据复印件、费用明细表复印件】</strong></p></td>
    	              			  </tr>
                              <tr>
                                <td colspan="2">
                                	<p>
                                  		<input type="checkbox" name="subsidiesforMedicalExpenses" id="subsidiesforMedicalExpenses" value="1" /><strong>医疗费补助：</strong>
                                  	</p>
                                  	<p>医疗费用总计：人民币<input type="text" name="TotalSFME" id="TotalSFME" maxlength="6" size="6" value="" />元</p>
                                  	<p>1.申请NCF补助：人民币<input type="text" name="NCFAllowance" id="NCFAllowance" maxlength="6" size="6" value="" />元，占医疗费用总金额
                                    	<input type="text" name="NCFProportion" id="NCFProportion" maxlength="3" size="4" value="" />％
                                    </p>
                                  	<p>2.案家自付：人民币<input type="text" name="PatientPay" id="PatientPay" maxlength="6" size="6" value="" />元，占医疗费用总金额
                                    	<input type="text" name="PatientProportion" id="textfield18" maxlength="3" size="4" value="" />％
                                    </p>
                                </td>
                                <td colspan="2" valign="top">
                                	<p><strong><input type="checkbox" name="transportationSubsidies" id="transportationSubsidies" value="1" />交通费补助：</strong></p>
                                  	<p>1.申请NCF补助：人民币<input type="text" name="NCFSOT" id="NCFSOT" value="" />元 </p>
                                  	<p>2.案家自付：人民币<input type="text" name="PatientSOT" id="PatientSOT" value="" />元</p>
                                </td>
                              </tr>
                              <tr>
                                <td colspan="4" align="center">
                                	<strong>申请NCF补助费用总金额为：人民币<input type="text" name="NCFTotalSubsidies" id="NCFTotalSubsidies" value="" />元</strong>
                                </td>
                              </tr>
                              <tr>
    	              			  <td colspan="2"><p><strong>主治医师签名：</strong><strong> </strong></p>
    	              			    <p>&nbsp;</p>
    	              			    <p>&nbsp;</p>
    	              			    <p>（日期：     /      /     ）</p></td>
    	              			  <td colspan="2"><p><strong>家长或患者签名：</strong>(未成年者由家长签名)<strong> </strong></p>
    	              			    <p>&nbsp;</p>
    	              			    <p>&nbsp;</p>
    	              			    <p>（日期：     /      /     ）</p></td>
    	              			  </tr>
                              <tr>
    	              			  <td colspan="4" align="center"><p>（粘贴出院明细处 ）</p>
    	              			    <p>&nbsp;</p>
    	              			    <p>&nbsp;</p>
    	              			    <p>&nbsp;</p>
    	              			    <p>&nbsp;</p>
    	              			    <p>&nbsp;</p>
    	              			    <p>&nbsp;</p></td>
    	              			  </tr>
                              <tr>
    	              			  <td>&nbsp;</td>
    	              			  <td align="right"><input type="submit" name="button" id="button" value="Submit" /></td>
    	              			  <td align="left"><input type="submit" name="button2" id="button2" value="Submit" /></td>
    	              			  <td>&nbsp;</td>
  	              			  </tr>
                            </table>
						</center>
					</div>
				</p>
                
                
              
              <p align="center" style="margin-left: 10; margin-right: 10">
              &nbsp;
				<div align="center">
                	<center>
                		<table border="1" cellspacing="1" width="90%">
                  			<tr>
		                    	<td width="100%">&nbsp;</td>    
							</tr>
                  			<tr>
                    			<td width="100%">&nbsp;</td>
                  			</tr>
                		</table>
                	</center>
              	</div>
                </p>
                    </td>
                  </tr>
                  </table>
                </center>
              </div>
              <p style="margin-left: 10; margin-right: 10">
              　</td>
  </tr>
                    </table>
                  </div>
                </td>
            </tr>
            
            <tr>
              <td width="100%" height="1" align="center">
                <hr size="1" color="#C0C0C0" width="98%">
                <p align="center"><i><font size="2"><font face="Arial" color="#999999">The&nbsp;           
                Web&nbsp; Best&nbsp; Browse&nbsp; Mode </font><font color="#999999">：           
                </font><font face="Arial"><font color="#999999">Internet&nbsp;           
                Explorer&nbsp; 6.02 (Or Update)&nbsp; /&nbsp; 800 x 600&nbsp;           
                Resolution<br>
                Copyright © 2008&nbsp; </font><a href="http://www.nncf.org/" target="_blank"><font color="#0066CC">Noordhoff&nbsp;          
                Craniofacial&nbsp; Foundation<br>         
                <br>
                </font></a></font></font></i></td>
            </tr>
          </table>
        </div>
      </td>
    </tr>
  </table>
</div>
				  <input type="hidden" name="patient_id" value="<?PHP //echo $patient_id; ?>">
				  <input type="hidden" name="serialcode" value="<?PHP //if (!empty($res_PatientRecord["serialcode"])) {echo $res_PatientRecord["serialcode"];} else {echo $serialcode;} ?>">
		</form>
	</body>
</html>
