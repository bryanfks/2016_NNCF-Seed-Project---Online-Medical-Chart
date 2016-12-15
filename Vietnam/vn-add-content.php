<form name="MedicalRecord" enctype="multipart/form-data" method="post" action="vn-add-pinfo-save.php">
<div class="Content-Title">
    <table style="text-align: center; " class="Content-Title-2">
        <tr>
            <td class="TitleBar">
                <select size="1" name="hospital" title="">
                    <option value="" selected>Please select...</option>
                    <option value="">Odonto Maxillo Facial Hospital</option>
                </select>
                <b>Patient Subsidy Application</b>
            </td>
        </tr>
    </table>
</div>
<!--  開案時間與主治醫師名稱 -->
<div class="HospitalData">
    <table class="DiagnosisForm">
        <tr>
            <td style="width: 130px;">* Date of Intake</td> 
            <td colspan="2">
                <input type="text" name="caseYear" size="4" maxlength="4" value="" title="">/
                <input type="text" name="caseMonth" size="3" maxlength="2" value="" title="">/
                <input type="text" name="caseDay" size="3" maxlength="2" value="" title="">
                (YYYY/MM/DD)
            </td>
            <td>NCF Number</td>
            <td colspan="2">(NCF ID)</td>
        </tr>
        <tr>
            <td style="line-height: 20px">Name of Surgeon	</td>
            <td><input type="text" name="surgeryDrName" value="" title=""></td>
            <td style="line-height: 20px">Name of Speech Therapist</td>
            <td><input type="text" name="languageTherapist" value="" title=""></td>
            <td style="line-height: 20px"> Name of Orthodontist</td>
            <td><input type="text" name="orthodontics" value="" title=""></td>
        </tr>
        <tr></tr>
    </table>
</div>
<!--  個人資料 Part 1:Patient's General Information  -->
<div class="PersonalData">
    <table class="DiagnosisForm">
        <tr><td colspan="4" align="center"><b>&nbsp;&nbsp;Part 1: Patient's General Information</b></td></tr>
        <tr>
            <td width="170px"> * ID of Patient</td>
            <td width="160px"><input type="text" name="idno" value="" title=""></td>
            <td width="200px"> * Patient Record Number</td>
            <td width="200px"><input type="text" name="MedicalRecordNumber" value="" title=""></td>
        </tr>
        <tr>
            <td> * Name</td>
            <td><input type="text" name="name" value="" title=""></td>
            <td> * Gender</td>
            <td>
                <input type="radio" name="gender" value="M" title=""> Male <br>
                <input type="radio" name="gender" value="F" title=""> Female
            </td>
        </tr>
        <tr>
            <td> * Date of Birth</td>
            <td>
                <input type="text" name="birthYear" size="4" maxlength="4" value="" title="">/
                <input type="text" name="birthMonth" size="3" maxlength="2" value="" title="">/
                <input type="text" name="birthDay" size="3" maxlength="2" value="" title="">
                (YYYY/MM/DD)
            </td>
            <td> Occupation</td>
            <td><input type="text" name="profession" value="" title=""></td>
        </tr>
        <tr>
            <td> Telephone</td>
            <td><input type="text" name="tel" value="" title=""></td>
            <td> Education</td>
            <td><input type="text" name="education" value="" title=""></td>
        </tr>
        <tr>
            <td> * Address</td>
            <td colspan="3"><input type="text" name="address" size="90" maxlength="200" value="" title=""></td>
        </tr>
        <tr>
            <td> Name of Guardian</td>
            <td><input type="text" name="contactperson" value="" title=""></td>
            <td>Relationship to the Patient</td>
            <td><input type="text" name="relationship" value="" title=""></td>
        </tr>
        <tr>
            <td> Telephone</td>
            <td colspan="3"><input type="text" name="phone" size="90" maxlength="200" value="" title=""></td>
        </tr>
    </table>
</div>
<!--  Part 2: Diagnosis  -->
<div class="DiagnosisData">
    <table class="DiagnosisForm">
        <tr>
            <td colspan="4" align="center"><b>&nbsp;&nbsp;Part 2: Diagnosis</b></td>
        </tr>
        <tr>
            <td> * Height</td>
            <td><input type="text" name="height" size="6" maxlength="10" value="" title=""> CM</td>
            <td> * Weight</td>
            <td><input type="text" name="weight" size="6" maxlength="10" value="" title=""> KG</td>
        </tr>
        <tr>
            <td colspan="4">
                * Main Diagnosis：<br>
                <label><input type="checkbox" name="diagnosis_unilateral_cleft_lip_1" value="UCL" <?php if(($resultPatientinfo['diagnosis_unilateral_cleft_lip_1'] == "UCL") || ($resultPatientinfo['diagnosis_unilateral_cleft_lip_1'] == "1")){ echo "checked"; } ?>>Unilateral Cleft Lip</label>
                (
                    <label><input type="radio" name="diagnosis_unilateral_cleft_lip" value="C" <?php if($resultPatientinfo['diagnosis_unilateral_cleft_lip'] == "C"){ echo "checked"; } ?>>Complete &nbsp;</label>
                    <label><input type="radio" name="diagnosis_unilateral_cleft_lip" value="IC" <?php if($resultPatientinfo['diagnosis_unilateral_cleft_lip'] == "IC"){ echo "checked"; } ?>>Incomplete &nbsp;</label>
                    <label><input type="radio" name="diagnosis_unilateral_cleft_lip" value="CK" <?php if($resultPatientinfo['diagnosis_unilateral_cleft_lip'] == "CK"){ echo "checked"; } ?>>Cracked &nbsp;</label>
                )<br>
                <label><input type="checkbox" name="diagnosis_bilateral_cleft_lip_2" value="BCL" <?php if(($resultPatientinfo['diagnosis_bilateral_cleft_lip_2'] == "BCL") || ($resultPatientinfo['diagnosis_bilateral_cleft_lip_2'] == "1")){ echo "checked"; } ?>>Bilateral Cleft Lip &nbsp;</label>
                (
                <label><input type="radio" name="diagnosis_bilateral_cleft_lip" value="C" <?php if($resultPatientinfo['diagnosis_bilateral_cleft_lip'] == "C"){ echo "checked"; } ?>>Complete &nbsp;</label>
                <label><input type="radio" name="diagnosis_bilateral_cleft_lip" value="IC" <?php if($resultPatientinfo['diagnosis_bilateral_cleft_lip'] == "IC"){ echo "checked"; } ?>>Incomplete &nbsp;</label>
                <label><input type="radio" name="diagnosis_bilateral_cleft_lip" value="MCK" <?php if($resultPatientinfo['diagnosis_bilateral_cleft_lip'] == "MCK"){ echo "checked"; } ?>>Cracked &nbsp;</label>
                )<br>
                <label><input type="checkbox" name="CleftPalate" value="CP" <?php if($resultPatientinfo['CleftPalate'] == "CP"){ echo "checked"; } ?>>Hard Palate ---</label>
                <label><input type="radio" name="incomplete_main" value="IC" <?php if($resultPatientinfo['incomplete_main'] == "IC"){ echo "checked"; } ?>>Incomplete</label>
                (
                <label><input type="radio" name="incomplete" value="SCC" <?php if($resultPatientinfo['incomplete'] == "SCC"){ echo "checked"; } ?>>Submucosal Cleft &nbsp;</label>
                <label><input type="radio" name="incomplete" value="CU" <?php if($resultPatientinfo['incomplete'] == "CU"){ echo "checked"; } ?>>Uvula Bifida &nbsp;</label>
                <label><input type="radio" name="incomplete" value="SP" <?php if($resultPatientinfo['incomplete'] == "SP"){ echo "checked"; } ?>>Soft Palate &nbsp;</label>
                <label><input type="radio" name="incomplete" value="BC" <?php if($resultPatientinfo['incomplete'] == "BC"){ echo "checked"; } ?>>Bilateral Cleft </label>
                )<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label><input type="radio" name="incomplete_main" value="C" <?php if($resultPatientinfo['incomplete_main'] == "C"){ echo "checked"; } ?>>Complete &nbsp;&nbsp;</label>
                (
                <label><input type="radio" name="complete" value="U" <?php if($resultPatientinfo['complete'] == "U"){ echo "checked"; } ?>>Unilateral &nbsp;</label>
                <label><input type="radio" name="complete" value="B" <?php if($resultPatientinfo['complete'] == "B"){ echo "checked"; } ?>>Bilateral </label>
                )<br>
                <label><input type="checkbox" name="BoneGraft_main" value="BoneGraft" <?php if($resultPatientinfo['BoneGraft_main'] == "BoneGraft"){ echo "checked"; } ?>>Alveolar Cleft &nbsp;</label>
                (
                <label><input type="radio" name="BoneGraft_select" value="C" <?php if($resultPatientinfo['BoneGraft_select'] == "C"){ echo "checked"; } ?>>Complete &nbsp;</label>
                <label><input type="radio" name="BoneGraft_select" value="IC" <?php if($resultPatientinfo['BoneGraft_select'] == "IC"){ echo "checked"; } ?>>Incomplete &nbsp;</label>
                <label><input type="radio" name="BoneGraft_select" value="CK" <?php if($resultPatientinfo['BoneGraft_select'] == "CK"){ echo "checked"; } ?>>Cracked &nbsp;</label>
                )<br>
                <label><input type="checkbox" name="Combined_with_other_craniofacial_disorders" value="Other" <?php if($resultPatientinfo['Combined_with_other_craniofacial_disorders'] == "Other"){ echo "checked"; } ?>> Combined with Other Craniofacial Deformities：<input type="text" name="Combined_with_other_craniofacial_disorders_text" size="60" maxlength="100"></label>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                * Did the patient have any treatment before?<br>
                <label><input type="radio" name="Cleft_lip_and_palate_surgery" value="Y" <?php if($resultPatientinfo['Cleft_lip_and_palate_surgery'] == "Y"){ echo "checked"; } ?>>Yes</label>
                <br>&nbsp;&nbsp;
                <label><input type="checkbox" name="beforeSurgery_1" value="1LNR" <?php if($resultPatientinfo['beforeSurgery_1'] == "1LNR"){ echo "checked"; } ?>>Primary Unilateral Lip/ Nose Repair</label>
                <label><input type="checkbox" name="beforeSurgery_2" value="1BLANR" <?php if($resultPatientinfo['beforeSurgery_2'] == "1BLANR"){ echo "checked"; } ?>>Primary Bilateral Lip/ Nose Repair</label>
                <br>&nbsp;&nbsp;
                <label><input type="checkbox" name="beforeSurgery_3" value="1CPR" <?php if($resultPatientinfo['beforeSurgery_3'] == "1CPR"){ echo "checked"; } ?>>Primary Cleft Palate Repair</label>
                <label><input type="checkbox" name="beforeSurgery_4" value="FHR" <?php if($resultPatientinfo['beforeSurgery_4'] == "FHR"){ echo "checked"; } ?>>Fistula Repair</label>
                <label><input type="checkbox" name="beforeSurgery_5" value="PF" <?php if($resultPatientinfo['beforeSurgery_5'] == "PF"){ echo "checked"; } ?>>Pharyngeal Flap Repair</label>
                <label><input type="checkbox" name="beforeSurgery_6" value="PBR" <?php if($resultPatientinfo['beforeSurgery_6'] == "PBR"){ echo "checked"; } ?>>Vomer Flap Repair</label>
                <br>&nbsp;&nbsp;
                <label><input type="checkbox" name="beforeSurgery_7" value="2CPR" <?php if($resultPatientinfo['beforeSurgery_7'] == "2CPR"){ echo "checked"; } ?>>Secondary Cleft Palate Repair</label>
                <label><input type="checkbox" name="beforeSurgery_8" value="LR" <?php if($resultPatientinfo['beforeSurgery_8'] == "LR"){ echo "checked"; } ?>>Lip Rhinoplasty Repair</label>
                <br>&nbsp;&nbsp;
                <label><input type="checkbox" name="beforeSurgery_9" value="AB" <?php if($resultPatientinfo['beforeSurgery_9'] == "AB"){ echo "checked"; } ?>>Alveolar Bone Graft</label>
                <label><input type="checkbox" name="beforeSurgery_10" value="PO" <?php if($resultPatientinfo['beforeSurgery_10'] == "PO"){ echo "checked"; } ?>>Pre-Surgery Molding</label>
                <label><input type="checkbox" name="beforeSurgery_11" value="SL" <?php if($resultPatientinfo['beforeSurgery_11'] == "SL"){ echo "checked"; } ?>>Speech Therapy</label>
                <br>&nbsp;&nbsp;
                <label><input type="checkbox" name="beforeSurgery_other" value="other" <?php if($resultPatientinfo['beforeSurgery_other'] == "other"){ echo "checked"; } ?>>Others, please specify：</label>
                <label><input type="text" size="85" maxlength="100" name="beforeSurgery_other_reason" value=""></label><br>
                <label><input type="radio" name="Cleft_lip_and_palate_surgery" value="N" <?php if($resultPatientinfo['Cleft_lip_and_palate_surgery'] == "N"){ echo "checked"; } ?>>No</label>
            </td>
        </tr>
    </table>
</div>
<!--  Part 3: Family Information  -->
<div class="FamilyData">
    <table class="FamilyDiagnosisForm">
        <tr><td colspan="6" align="center"><b>&nbsp;&nbsp;Part 3: Family Information</b></td></tr>
        <tr>
            <td>Family Members</td>
            <td colspan="5"> Total
                <input type="text" size="4" maxlength="4" name="familyMembers" value="" title=""> person(s) ; Living with
                <input type="text" size="4" maxlength="4" name="live_together" value="" title=""> person(s)
            </td>
        </tr>
        <tr>
            <td>Father's Age</td>
            <td><label><input type="text" size="5" maxlength="5" name="fatherAge" value=""></label></td>
            <td>Occupation</td>
            <td><label><input type="text" size="25" maxlength="25" name="fatherProfession_main" value=""></label></td>
            <td>Education</td>
            <td>
                <label><input type="radio" name="fatherProfession" value="1">College/ University</label><br>
                <label><input type="radio" name="fatherProfession" value="2">High School</label><br>
                <label><input type="radio" name="fatherProfession" value="3">Elementary School</label><br>
                <label><input type="radio" name="fatherProfession" value="4">CLiterate</label><br>
                <label><input type="radio" name="fatherProfession" value="5">Preliterate</label>
            </td>
        </tr>
        <tr>
            <td>Moher's Age</td>
            <td><label><input type="text" size="5" maxlength="5" name="motherAge" value=""></label></td>
            <td>Occupation</td>
            <td><label><input type="text" size="25" maxlength="25" name="motherProfession_main" value=""></label></td>
            <td>Education</td>
            <td>
                <label><input type="radio" name="motherProfession" value="1" title="">College/ University</label><br>
                <label><input type="radio" name="motherProfession" value="2" title="">High School</label><br>
                <label><input type="radio" name="motherProfession" value="3" title="">Elementary School</label><br>
                <label><input type="radio" name="motherProfession" value="4" title="">CLiterate</label><br>
                <label><input type="radio" name="motherProfession" value="5" title="">Preliterate</label>
            </td>
        </tr>
        <tr>
            <td colspan="2">Description of Family Condition</td>
            <td colspan="4"><textarea name="descriptionCaseFamily" rows="5" cols="70" title=""></textarea></td>
        </tr>
        <tr>
            <td colspan="1">Major Income Source</td>
            <td colspan="2"><input type="text" size="25" maxlength="25" name="mainSourceofIncome" value="" title=""></td>
            <td colspan="1">Annual Income (average)</td>
            <td colspan="2">US$ <input type="text" size="25" maxlength="25" name="income" value="" title=""></td>
        </tr>
        <tr>
            <td colspan="1">Family Fixed Expenses</td>
            <td colspan="2">
                1. <input type="text" size="20" maxlength="20" name="fixedExpenditure1" value="" title=""><br>
                2. <input type="text" size="20" maxlength="20" name="fixedExpenditure2" value="" title=""><br>
                3. <input type="text" size="20" maxlength="20" name="fixedExpenditure3" value="" title=""><br>
                4. <input type="text" size="20" maxlength="20" name="fixedExpenditure4" value="" title="">
            </td>
            <td colspan="1">Monthly Living Expenses (average)</td>
            <td colspan="2">US$ <input type="text" size="25" maxlength="25" name="extimatedExpenditures" value="" title=""></td>
        </tr>
    </table>
</div>
<!--  Part 4: Patient’s Information of Surgery and Transportation  -->
<div class="SurgeryTransportationData">
    <table class="DiagnosisForm">
        <tr><td colspan="6" align="center"><b>&nbsp;&nbsp;Part 4: Patient’s Information of Surgery and Transportation</b></td></tr>
        <tr>
            <td colspan="2"> Subsidy Number (NCF)</td>
            <td colspan="2"> (KH16008311)</td>
        </tr>
        <tr>
            <td> * Date of Admission</td>
            <td>
                <input type="text" size="4" maxlength="4" name="BIHosTimeYear" value="" title="">/
                <input type="text" size="2" maxlength="2" name="BIHosTimeMonth" value="" title="">/
                <input type="text" size="2" maxlength="2" name="BIHosTimeDay" value="" title=""> (YYYY/MM/DD)
            </td>
            <td> * Date of Surgery</td>
            <td>
                <input type="text" size="4" maxlength="4" name="surgeryTimeYear" value="" title="">/
                <input type="text" size="2" maxlength="2" name="surgeryTimeMonth" value="" title="">/
                <input type="text" size="2" maxlength="2" name="surgeryTimeDay" value="" title=""> (YYYY/MM/DD)
            </td>
        </tr>
        <tr>
            <td> * Date of Discharge</td>
            <td>
                <input type="text" size="4" maxlength="4" name="LHosTimeYear" value="" title="">/
                <input type="text" size="2" maxlength="2" name="LHosTimeMonth" value="" title="">/
                <input type="text" size="2" maxlength="2" name="LHosTimeDay" value="" title=""> (YYYY/MM/DD)
            </td>
            <td> Type of Anesthesia</td>
            <td>
                <label><input type="radio" name="Anesthesia" value="GA" title="">General Anesthesia</label><br>
                <label><input type="radio" name="Anesthesia" value="LA" title="">Local Anesthesia</label>
            </td>
        </tr>
        <tr>
            <td> * Name of Surgeon</td>
            <td><input type="text" size="25" maxlength="25" name="surgeon" value="" title=""></td>
            <td> Name of Anesthesiologist</td>
            <td><input type="text" size="25" maxlength="25" name="anesthesiologist" value="" title=""></td>
        </tr>
        <tr>
            <td>Type of Surgery</td>
            <td colspan="3">
                <label><input type="radio" name="surgeryType" value="M1LNR" title="">Primary Unilateral Lip/Nose Repair</label>
                <label><input type="radio" name="surgeryType" value="M1BLANR" title="">Bilateral Lip/ Nose Repair</label><br>
                <label><input type="radio" name="surgeryType" value="M1CPR" title="">Primary Cleft Palate Repair</label>
                <label><input type="radio" name="surgeryType" value="MFHR" title="">Fistula Repair</label><br>
                <label><input type="radio" name="surgeryType" value="M2CPR" title="">Secondary Cleft Palate Repair</label>
                <label><input type="radio" name="surgeryType" value="MLR" title="">Lip and/or Nose Revision</label><br>
                <label><input type="radio" name="surgeryType" value="MAB" title="">Alveolar Bone Graft</label>
                <label><input type="radio" name="surgeryType" value="MPF" title="">Pharyngeal Flap Repair</label><br>
                <label><input type="radio" name="surgeryType" value="MPBR" title="">Vomer Flap Repair</label><br>
                <label><input type="radio" name="surgeryType" value="MOTH" title="">Others：</label>
                <input type="text" size="65" maxlength="65" name="surgeryTypeOther_text" value="" title="">
            </td>
        </tr>
        <tr>
            <td rowspan="4">Type of Repair</td>
            <td colspan="3">
                Unilateral Cleft Lip：<br>
                <label><input type="radio" name="repairTypeUnilateralcleftlip" value="Rotation-AdvancementVariant" title="">Rotation-Advancement Variant</label>
                <label><input type="radio" name="repairTypeUnilateralcleftlip" value="TriangularVariant" title="">Triangular Variant</label>
                <label><input type="radio" name="repairTypeUnilateralcleftlip" value="Mohler" title="">Mohler</label><br>
                <label><input type="radio" name="repairTypeUnilateralcleftlip" value="Others" title="">Others：</label>
                <input type="text" size="30" maxlength="200" name="repairTypeUnilateralcleftlip_text" value="" title="">
            </td>
        </tr>
        <tr>
            <td colspan="3">
                Bilateral Cleft Lip：<br>
                <label><input type="radio" name="repairTypeBilateralcleftlip" value="StraightLine" title="">Straight Line</label>
                <label><input type="radio" name="repairTypeBilateralcleftlip" value="ForkedFlap" title="">Forked Flap</label>
                <label><input type="radio" name="repairTypeBilateralcleftlip" value="Others" title="">Others：</label>
                <input type="text" size="30" maxlength="200" name="repairTypeBilateralcleftlip_text" value="" title="">
            </td>
        </tr>
        <tr>
            <td colspan="3">
                Cleft Palate：<br>
                <label><input type="radio" name="repairTypeCleftpalate" value="LangenbeckVariant" title="">Langenbeck Variant</label>
                <label><input type="radio" name="repairTypeCleftpalate" value="PushbackVariant" title="">Pushback Variant</label>
                <label><input type="radio" name="repairTypeCleftpalate" value="Furlow" title="">Furlow</label>
                <label><input type="radio" name="repairTypeCleftpalate" value="PF" title="">PF</label>
                <label><input type="radio" name="repairTypeCleftpalate" value="FurlowPF" title="">Furlow+PF</label><br>
                <label><input type="radio" name="repairTypeCleftpalate" value="Others" title="">Others：</label>
                <input type="text" size="30" maxlength="200" name="repairTypeCleftpalate_text" value="" title="">
            </td>
        </tr>
        <tr>
            <td colspan="3">
                Alveolar Cleft：<br>
                <label><input type="radio" name="BoneGraft" value="BoneGraft" title="">Bone Graft</label>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                &nbsp;&nbsp;Patient’s Photo：<br>
                &nbsp;&nbsp;-- Date (Pre-Surgery)：
                <input type="text" size="4" maxlength="4" name="beforeSurgeryYear" value="" title="">/
                <input type="text" size="2" maxlength="2" name="beforeSurgeryMonth" value="" title="">/
                <input type="text" size="2" maxlength="2" name="beforeSurgeryDay" value="" title=""> (YYYY/MM/DD)
            </td>
        </tr>
        <tr align="center">
            <td colspan="2" width="50%" height="210px" valign="top">
                Frontal<br>
                <input type="file" name="pedigree_graphics1" size="25" title="">
            </td>
            <td colspan="2" width="50%" height="210px" valign="top">
                Side<br>
                <input type="file" name="pedigree_graphics4" size="25" title="">
            </td>
        </tr>
        <tr align="center">
            <td colspan="2" width="50%" height="210px" valign="top">
                Shape of nose’s hole<br>
                <input type="file" name="pedigree_graphics3" size="25" title="">
            </td>
            <td colspan="2" width="50%" height="210px" valign="top">
                Others<br>
                <input type="file" name="pedigree_graphics5" size="25" title="">
            </td>
        </tr>
        <tr>
            <td colspan="4">
                &nbsp;&nbsp;-- Date (Post-Surgery)：
                <input type="text" size="4" maxlength="4" name="afterSurgeryYear" value="" title="">/
                <input type="text" size="2" maxlength="2" name="afterSurgeryMonth" value="" title="">/
                <input type="text" size="2" maxlength="2" name="afterSurgeryDay" value="" title=""> (YYYY/MM/DD)
            </td>
        </tr>
        <tr align="center">
            <td colspan="2" width="50%" height="210" valign="top">
                Frontal<br>
                <input type="file" name="pedigree_graphics2" size="25" title="">
            </td>
            <td colspan="2" width="50%" height="210px" valign="top">
                Side<br>
                <input type="file" name="pedigree_graphics7" size="25" title="">
            </td>
        </tr>
        <tr align="center">
            <td colspan="2" width="50%" height="210px" valign="top">
                Shape of nose’s hole<br>
                <input type="file" name="pedigree_graphics6" size="25" title="">
            </td>
            <td colspan="2" width="50%" height="210px" valign="top">
                Others<br>
                <input type="file" name="pedigree_graphics8" size="25" title="">
            </td>
        </tr>
        <tr>
            <td>Subsidy from Others Organization</td>
            <td colspan="3">
                <label><input type="radio" name="usageofSocialResources" value="Y" title=""> Yes</label><br>
                &nbsp;&nbsp;Medical Subsidy：
                <label><input type="checkbox" name="smileTrain" value="1" title=""> Smile Train, Project name：</label>
                <input type="text" size="22" maxlength="50" name="MSitem" value="" title=""><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label><input type="checkbox" name="MSOther" value="1" title=""> Others：</label>
                <input type="text" size="45" maxlength="45" name="MSOther_text" value="" title=""><br>

                &nbsp;&nbsp;Living Allowance：from organization of
                <input type="text" size="36" maxlength="50" name="LAunit" value="" title=""> ;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Project Name：
                <input type="text" size="41" maxlength="45" name="LAitem" value="" title=""><br>

                &nbsp;&nbsp;Others Subsidy：from organization of
                <input type="text" size="37" maxlength="50" name="OAunit" value="" title=""> ;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Project Name：
                <input type="text" size="42" maxlength="45" name="OAitem" value="" title=""><br>
                <label><input type="radio" name="usageofSocialResources" value="N" title=""> No</label>
            </td>
        </tr>
        <tr>
            <td>
                Distance from Home to Hospital
            </td>
            <td colspan="3">
                <label><input type="radio" name="h2hdistance" value="100" title=""> Less than 100 KM</label>
                <label><input type="radio" name="h2hdistance" value="100-200" title=""> 100~200 KM </label>
                <label><input type="radio" name="h2hdistance" value="200" title=""> More than 200 KM</label>
            </td>
        </tr>
    </table>
</div>

<!--  Part 5: Subsidy Details  -->
<div class="SubsidyDetails">
    <table class="DiagnosisForm">
        <tr><td colspan="2" align="center"><b>&nbsp;&nbsp;Part 5: Subsidy Details</b></td></tr>
        <tr>
            <td width="420px">
                <label><input type="checkbox" name="subsidiesforMedicalExpenses" value="1" title=""> Medical Expenses Subsidy</label><br>
                &nbsp;Total amount of medical expenses: US$ <input type="text" size="10" maxlength="10" name="TotalSFME" value="" title=""><br>
                &nbsp;1.NCF supports: US$ <input type="text" size="6" maxlength="10" name="NCFAllowance" value="" title=""> ;
                <input type="text" size="5" maxlength="10" name="NCFProportion" value="" title=""> ％ of total expense<br>
                &nbsp;2.Patient pays: US$ <input type="text" size="6" maxlength="10" name="PatientPay" value="" title=""> ;
                <input type="text" size="5" maxlength="10" name="PatientProportion" value="" title=""> ％ of total expense
            </td>
            <td>
                <label><input type="checkbox" name="transportationSubsidies" value="1" title=""> Transportation Subsidy</label><br>
                &nbsp;1.NCF supports：US$ <input type="text" size="5" maxlength="10" name="NCFSOT" value="" title=""><br>
                &nbsp;2.Patient pays：US$ <input type="text" size="5" maxlength="10" name="PatientSOT" value="" title=""><br>
                &nbsp;3.Others：US$ <input type="text" size="5" maxlength="10" name="OtherPay" value="" title="">
            </td>
        </tr>
    </table>
</div>
<!--  Part 6: Files Upload  -->
<div class="FilesUpload">
    <table class="DiagnosisForm">
        <tr><td align="center"><b>&nbsp;&nbsp;Part 6: Files Upload</b></td></tr>
        <tr><td align="center"> * Part 6A：Expense Receipt (issued by hospital)</td></tr>
        <tr><td align="center" valign="top" height="500px" width="700px"><input type="file" name="pedigree_graphics_other" size="25" title=""></td></tr>
        <tr><td align="center"> * Part 6B：Receipt of NCF grant<br>(containing signature of patient, coordinator and program director)</td></tr>
        <tr><td align="center" valign="top" height="500px" width="700px"><input type="file" name="pedigree_graphics9" size="25" title=""></td></tr>
        <tr><td align="center"> Part 6C：Others receipt (1)</td></tr>
        <tr><td align="center" valign="top" height="210px" width="700px"><input type="file" name="pedigree_graphics10" size="25" title=""></td></tr>
        <tr><td align="center"> Part 6D：Others receipt (2)</td></tr>
        <tr><td align="center" valign="top" height="210px" width="700px"><input type="file" name="pedigree_graphics11" size="25" title=""></td></tr>
        <tr><td align="center"> Part 6E：Others receipt (3)</td></tr>
        <tr><td align="center" valign="top" height="210px" width="700px"><input type="file" name="pedigree_graphics12" size="25" title=""></td></tr>
    </table>
</div>

<div class="ButtonZone">
    <table style="text-align: center" class="ButtonZone">
        <tr class="ButtonZone">
            <td style="vertical-align:middle;" class="ButtonZone">
                <input type="button" name="Save" value="Save" style="border: 1px solid #73808c; width: 80px;" title=""  onClick="return saveData('save')">
                <input type="button" name="Cancel" value="Cancel" style="border: 1px solid #73808c; width: 80px;" title=""  onClick="return saveData('cancelAdd')">
                <input type="hidden" size="5" maxlength="10" name="remark" value="" title="">
            </td>
        </tr>
    </table>
</div>
</form>