
<script language="javascript">
			<!--
				function inputData(){
//病患個人資料
document.china_medical.caseYear.value = "<?php echo $resultChinaPatientinfo['caseYear'];  ?>";
document.china_medical.surgeryDrName.value = "<?php echo $resultChinaPatientinfo['surgeryDrName'];  ?>";
document.china_medical.languageTherapist.value = "<?php echo $resultChinaPatientinfo['languageTherapist'];  ?>";
document.china_medical.orthodontics.value = "<?php echo $resultChinaPatientinfo[''];  ?>";
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
document.china_medical.descriptionCaseFamily.value = "<?php echo $resultChinaPatientinfo['descriptionCaseFamily'];  ?>";
document.china_medical.mainSourceofIncome.value = "<?php echo $resultChinaPatientinfo['mainSourceofIncome'];  ?>";
document.china_medical.income.value = "<?php echo $resultChinaPatientinfo['income'];  ?>";
document.china_medical.fixedExpenditure1.value = "<?php echo $resultChinaPatientinfo['fixedExpenditure1'];  ?>";
document.china_medical.fixedExpenditure2.value = "<?php echo $resultChinaPatientinfo['fixedExpenditure2'];  ?>";
document.china_medical.fixedExpenditure3.value = "<?php echo $resultChinaPatientinfo['fixedExpenditure3'];  ?>";
document.china_medical.fixedExpenditure4.value = "<?php echo $resultChinaPatientinfo['fixedExpenditure4'];  ?>";
document.china_medical.extimatedExpenditures.value = "<?php echo $resultChinaPatientinfo['extimatedExpenditures'];  ?>";
					
					
					
//病歷表資料					
document.china_medical.BIHosTimeYear.value = "<?php echo $resultChinaPatientRecord['BIHosTimeYear'];  ?>";
document.china_medical.surgeryTimeYear.value = "<?php echo $resultChinaPatientRecord['surgeryTimeYear'];  ?>";
document.china_medical.LHosTimeYear.value = "<?php echo $resultChinaPatientRecord['LHosTimeYear'];  ?>";
document.china_medical.surgeon.value = "<?php echo $resultChinaPatientRecord['surgeon'];  ?>";
document.china_medical.anesthesiologist.value = "<?php echo $resultChinaPatientRecord['anesthesiologist'];  ?>";
document.china_medical.surgeryTypeOther_text.value = "<?php echo $resultChinaPatientRecord['surgeryTypeOther_text'];  ?>";
document.china_medical.repairTypeUnilateralcleftlip_text.value = "<?php echo $resultChinaPatientRecord['repairTypeUnilateralcleftlip_text'];  ?>";
document.china_medical.repairTypeBilateralcleftlip_text.value = "<?php echo $resultChinaPatientRecord['repairTypeBilateralcleftlip_text'];  ?>";
document.china_medical.repairTypeCleftpalate_text.value = "<?php echo $resultChinaPatientRecord['repairTypeCleftpalate_text'];  ?>";
document.china_medical.beforeSurgeryYear.value = "<?php echo $resultChinaPatientRecord['beforeSurgeryYear'];  ?>";
document.china_medical.afterSurgeryYear.value = "<?php echo $resultChinaPatientRecord[afterSurgeryYear];  ?>";
document.china_medical.MSitem.value = "<?php echo $resultChinaPatientRecord['MSitem'];  ?>";
document.china_medical.MSOther_text.value = "<?php echo $resultChinaPatientRecord['MSOther_text'];  ?>";
document.china_medical.LAunit.value = "<?php echo $resultChinaPatientRecord['LAunit'];  ?>";
document.china_medical.LAitem.value = "<?php echo $resultChinaPatientRecord['LAitem'];  ?>";
document.china_medical.OAunit.value = "<?php echo $resultChinaPatientRecord['OAunit'];  ?>";
document.china_medical.OAitem.value = "<?php echo $resultChinaPatientRecord['OAitem'];  ?>";
document.china_medical.TotalSFME.value = "<?php echo $resultChinaPatientRecord['TotalSFME'];  ?>";
document.china_medical.NCFAllowance.value = "<?php echo $resultChinaPatientRecord['NCFAllowance'];  ?>";
document.china_medical.NCFProportion.value = "<?php echo $resultChinaPatientRecord['NCFProportion'];  ?>";
document.china_medical.PatientPay.value = "<?php echo $resultChinaPatientRecord['PatientPay'];  ?>";
document.china_medical.PatientProportion.value = "<?php echo $resultChinaPatientRecord[''];  ?>";
document.china_medical.NCFSOT.value = "<?php echo $resultChinaPatientRecord['NCFSOT'];  ?>";
document.china_medical.PatientSOT.value = "<?php echo $resultChinaPatientRecord['PatientSOT'];  ?>";
document.china_medical.NCFTotalSubsidies.value = "<?php echo $resultChinaPatientRecord['NCFTotalSubsidies'];  ?>";
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
						document.china_medical.caseYear.value = "<?php echo $resultChinaPatientinfo['caseYear'];  ?>";
						document.china_medical.surgeryDrName.value = "<?php echo $resultChinaPatientinfo['surgeryDrName'];  ?>";
						document.china_medical.languageTherapist.value = "<?php echo $resultChinaPatientinfo['languageTherapist'];  ?>";
						document.china_medical.orthodontics.value = "<?php echo $resultChinaPatientinfo['orthodontics'];  ?>";
						
						document.china_medical.MedicalRecordNumber.value = "<?php echo $resultChinaPatientinfo['MedicalRecordNumber'];  ?>";
						document.china_medical.idno.value = "<?php echo $resultChinaPatientinfo['idno'];  ?>";
						document.china_medical.name.value = "<?php echo $resultChinaPatientinfo['name'];  ?>";
						document.china_medical.birthYear.value = "<?php echo $resultChinaPatientinfo['birthYear'];  ?>";
						document.china_medical.profession.value = "<?php echo $resultChinaPatientinfo['profession'];  ?>";
						document.china_medical.tel.value = "<?php echo $resultChinaPatientinfo['tel'];  ?>";
						document.china_medical.education.value = "<?php echo $resultChinaPatientinfo['education'];  ?>";
						document.china_medical.address.value = "<?php echo $resultChinaPatientinfo['address'];  ?>";
						document.china_medical.contactperson.value = "<?php echo $resultChinaPatientinfo['contactperson'];  ?>";
						document.china_medical.relationship.value = "<?php echo $resultChinaPatientinfo['relationship'];  ?>";
						document.china_medical.phone.value = "<?php echo $resultChinaPatientinfo['phone'];  ?>";
						
						
						document.china_medical.height.value = "<?php echo $resultChinaPatientinfo['height'];  ?>";
						document.china_medical.weight.value = "<?php echo $resultChinaPatientinfo['weight'];  ?>";
						document.china_medical.diagnosis_unilateral_cleft_lip.value = "<?php echo $resultChinaPatientinfo['diagnosis_unilateral_cleft_lip'];  ?>";
						
						document.china_medical.diagnosis_bilateral_cleft_lip.value = "<?php echo $resultChinaPatientinfo['diagnosis_bilateral_cleft_lip'];  ?>";
						document.china_medical.CleftPalate.value = "<?php echo $resultChinaPatientinfo['CleftPalate'];  ?>";
						document.china_medical.incomplete_main.value = "<?php echo $resultChinaPatientinfo['incomplete_main'];  ?>";
						
						document.china_medical.Combined_with_other_craniofacial_disorders_text.value = "<?php echo $resultChinaPatientinfo['Combined_with_other_craniofacial_disorders_text'];  ?>";
						
						
						document.china_medical.beforeSurgery_other.value = "<?php echo $resultChinaPatientinfo['beforeSurgery_other'];  ?>";
						document.china_medical.beforeSurgery_other_reason.value = "<?php echo $resultChinaPatientinfo['beforeSurgery_other_reason'];  ?>";
						
						document.china_medical.familyMembers.value = "<?php echo $resultChinaPatientinfo['familyMembers'];  ?>";
						document.china_medical.live_together.value = "<?php echo $resultChinaPatientinfo['live_together'];  ?>";
						document.china_medical.fatherAge.value = "<?php echo $resultChinaPatientinfo['fatherAge'];  ?>";
						document.china_medical.fatherProfession_main.value = "<?php echo $resultChinaPatientinfo['fatherProfession_main'];  ?>";
						
						document.china_medical.fatherProfession.value = "<?php echo $resultChinaPatientinfo['fatherProfession'];  ?>";
						
						document.china_medical.motherAge.value = "<?php echo $resultChinaPatientinfo['motherAge'];  ?>";
						document.china_medical.motherProfession_main.value = "<?php echo $resultChinaPatientinfo['motherProfession_main'];  ?>";
						
						document.china_medical.motherProfession.value = "<?php echo $resultChinaPatientinfo['motherProfession'];  ?>";
						
						document.china_medical.descriptionCaseFamily.value = "<?php echo $resultChinaPatientinfo['descriptionCaseFamily'];  ?>";
						document.china_medical.mainSourceofIncome.value = "<?php echo $resultChinaPatientinfo['mainSourceofIncome'];  ?>";
						document.china_medical.income.value = "<?php echo $resultChinaPatientinfo['income'];  ?>";
						document.china_medical.fixedExpenditure1.value = "<?php echo $resultChinaPatientinfo['fixedExpenditure1'];  ?>";
						document.china_medical.fixedExpenditure2.value = "<?php echo $resultChinaPatientinfo['fixedExpenditure2'];  ?>";
						document.china_medical.fixedExpenditure3.value = "<?php echo $resultChinaPatientinfo['fixedExpenditure3'];  ?>";
						document.china_medical.fixedExpenditure4.value = "<?php echo $resultChinaPatientinfo['fixedExpenditure4'];  ?>";
						document.china_medical.extimatedExpenditures.value = "<?php echo $resultChinaPatientinfo['extimatedExpenditures'];  ?>";
						document.china_medical.usageofSocialResources.value = "<?php echo $resultChinaPatientinfo['usageofSocialResources'];  ?>";
						document.china_medical.smileTrain.value = "<?php echo $resultChinaPatientinfo['smileTrain'];  ?>";
						document.china_medical.MSitem.value = "<?php echo $resultChinaPatientinfo['MSitem'];  ?>";
						
						document.china_medical.MSOther.value = "<?php echo $resultChinaPatientinfo['MSOther'];  ?>";
						
						document.china_medical.MSOther_text.value = "<?php echo $resultChinaPatientinfo['MSOther_text'];  ?>";
						document.china_medical.LAunit.value = "<?php echo $resultChinaPatientinfo['LAunit'];  ?>";
						document.china_medical.LAitem.value = "<?php echo $resultChinaPatientinfo['LAitem'];  ?>";
						document.china_medical.OAunit.value = "<?php echo $resultChinaPatientinfo['OAunit'];  ?>";
						document.china_medical.OAitem.value = "<?php echo $resultChinaPatientinfo['OAitem'];  ?>";
						
						document.china_medical.surgicalAssistanceForMedicalExpenses.value = "<?php echo $resultChinaPatientinfo['surgicalAssistanceForMedicalExpenses'];  ?>";
						document.china_medical.surgicalAssistanceForMedicalExpenses_sel.value = "<?php echo $resultChinaPatientinfo['surgicalAssistanceForMedicalExpenses_sel'];  ?>";
						document.china_medical.speechTherapySubsidies.value = "<?php echo $resultChinaPatientinfo['speechTherapySubsidies'];  ?>";
						document.china_medical.transportationSubsidies.value = "<?php echo $resultChinaPatientinfo['transportationSubsidies'];  ?>";
						document.china_medical.preoperativeOrthodonticSubsidies.value = "<?php echo $resultChinaPatientinfo['preoperativeOrthodonticSubsidies'];  ?>";
						document.china_medical.NCFAssistance_Other.value = "<?php echo $resultChinaPatientinfo['NCFAssistance_Other'];  ?>";
						document.china_medical.NCFAssistance_Other_text.value = "<?php echo $resultChinaPatientinfo['NCFAssistance_Other_text'];  ?>";
						document.china_medical.signature.value = "<?php echo $resultChinaPatientinfo['signature'];  ?>";
						
						
						//document.china_medical.patientName.value = "<?php echo $resultChinaPatientRecord['patientName'];  ?>";
						//病例表部分
						document.china_medical.BIHosTimeYear.value = "<?php echo $resultChinaPatientRecord['BIHosTimeYear'];  ?>";
						document.china_medical.surgeryTimeYear.value = "<?php echo $resultChinaPatientRecord['surgeryTimeYear'];  ?>";
						document.china_medical.LHosTimeYear.value = "<?php echo $resultChinaPatientRecord['LHosTimeYear'];  ?>";
						document.china_medical.Anesthesia.value = "<?php echo $resultChinaPatientRecord['Anesthesia'];  ?>";
						document.china_medical.surgeon.value = "<?php echo $resultChinaPatientRecord['surgeon'];  ?>";
						document.china_medical.anesthesiologist.value = "<?php echo $resultChinaPatientRecord['anesthesiologist'];  ?>";
						
						//document.china_medical.surgeryType.value = "<?php echo $resultChinaPatientRecord['surgeryType'];  ?>";
						document.china_medical.surgeryTypeOther_text.value = "<?php echo $resultChinaPatientRecord['surgeryTypeOther_text'];  ?>";
						//document.china_medical.repairTypeUnilateralcleftlip.value = "<?php echo $resultChinaPatientRecord['repairTypeUnilateralcleftlip'];  ?>";
						document.china_medical.repairTypeUnilateralcleftlip_text.value = "<?php echo $resultChinaPatientRecord['repairTypeUnilateralcleftlip_text'];  ?>";
						document.china_medical.repairTypeBilateralcleftlip.value = "<?php echo $resultChinaPatientRecord['repairTypeBilateralcleftlip'];  ?>";
						document.china_medical.repairTypeBilateralcleftlip_text.value = "<?php echo $resultChinaPatientRecord['repairTypeBilateralcleftlip_text'];  ?>";
						document.china_medical.repairTypeCleftpalate.value = "<?php echo $resultChinaPatientRecord['repairTypeCleftpalate'];  ?>";
						document.china_medical.repairTypeCleftpalate_text.value = "<?php echo $resultChinaPatientRecord['repairTypeCleftpalate_text'];  ?>";
						document.china_medical.beforeSurgeryYear.value = "<?php echo $resultChinaPatientRecord['beforeSurgeryYear'];  ?>";
						//document.china_medical.beforeSurgeryMonth.value = "<?php echo $resultChinaPatientRecord['beforeSurgeryMonth'];  ?>";
						//document.china_medical.beforeSurgeryDay.value = "<?php echo $resultChinaPatientRecord['beforeSurgeryDay'];  ?>";
						
						document.china_medical.pedigree_graphics1.value = "<?php echo $resultChinaPatientRecord['pedigree_graphics1'];  ?>";
						
						document.china_medical.afterSurgeryYear.value = "<?php echo $resultChinaPatientRecord['afterSurgeryYear'];  ?>";
						document.china_medical.afterSurgeryMonth.value = "<?php echo $resultChinaPatientRecord['afterSurgeryMonth'];  ?>";
						document.china_medical.afterSurgeryDay.value = "<?php echo $resultChinaPatientRecord['afterSurgeryDay'];  ?>";
						document.china_medical.pedigree_graphics2.value = "<?php echo $resultChinaPatientRecord['pedigree_graphics2'];  ?>";
						document.china_medical.TotalSFME.value = "<?php echo $resultChinaPatientRecord['TotalSFME'];  ?>";
						document.china_medical.NCFAllowance.value = "<?php echo $resultChinaPatientRecord['NCFAllowance'];  ?>";
						document.china_medical.NCFProportion.value = "<?php echo $resultChinaPatientRecord['NCFProportion'];  ?>";
						document.china_medical.PatientPay.value = "<?php echo $resultChinaPatientRecord['PatientPay'];  ?>";
						document.china_medical.PatientProportion.value = "<?php echo $resultChinaPatientRecord['PatientProportion'];  ?>";
						
						document.china_medical.transportationSubsidies.value = "<?php echo $resultChinaPatientRecord['transportationSubsidies'];  ?>";
						document.china_medical.NCFSOT.value = "<?php echo $resultChinaPatientRecord['NCFSOT'];  ?>";
						document.china_medical.PatientSOT.value = "<?php echo $resultChinaPatientRecord['PatientSOT'];  ?>";
						document.china_medical.NCFTotalSubsidies.value = "<?php echo $resultChinaPatientRecord['NCFTotalSubsidies'];  ?>";
				}
				
						//-->
			</script>