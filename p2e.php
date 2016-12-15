<?php
session_start();
/**
 * Created by PhpStorm.
 * User: Bryan
 * Date: 2016/4/14
 * Time: 下午6:06
 */
$seid = $_SESSION["seid"];
$sepwd = $_SESSION["sepwd"];
if(isset($seid) && isset($sepwd)){
    require_once 'Classes/PHPExcel.php';    //引入 PHPExcel 物件庫
    require_once 'Classes/PHPExcel/IOFactory.php';    //引入 PHPExcel_IOFactory 物件庫
    require_once 'db.php';



// 初始值：勾選項目->陣列運算用流水號
    $ArraysNum = 0;

// ASCII + 總Select欄位數 運用於迴圈計算
    $MaxSelectItem = 64 + $SelectItem;

// PHPExcel code
    $objPHPExcel = new PHPExcel();  //實體化Excel


// 初始值設定：計算 Select 被勾選數量
    $SelectItem = 0;

// 初始設定：用於儲存對應 Excel 欄位用之陣列變數
    $SelectItemArray = array();

// 初始值設定：用陣列方式儲存 Select 項目欄位名稱
    $SelItmName = array();

// 初始設定：$HaveItemArray => 記錄欄位有被列入 Select 項目，
//          用於輸出資料為 Null 時輸入 null值 以避免因沒有數值而在錯誤的欄位顯示其他數值
    $HaveItemArray = array();


    $SelItmNums = 0;


// 設定第一固定欄位值：NCF編號
    $codeSQL .= "`NCFID`";
//    $SelectItem += 1;
    $SelItmName = "NCF个案编号";
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
    $NCFID = 1;


    if ($_POST['school'] == 1) {
        if (!empty($codeSQL)) {
            $codeSQL .= ", `school`";
        } else {
            $codeSQL .= "`school`";
        }

        $SelectItem += 1;
        $SelItmName = "医院名称";
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);

        $school = 1;
    }


    if ($_POST['casedays'] == 1) {
        if (!empty($codeSQL)) {
            $codeSQL .= ", `caseYear`, `caseMonth`, `caseDay`";
        } else {
            $codeSQL .= "`caseYear`, `caseMonth`, `caseDay`";
        }

        $SelectItem += 1;
        $SelItmName = "接案日期-年份";
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);

        $SelectItem += 1;
        $SelItmName = "接案日期-月份";
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);

        $SelectItem += 1;
        $SelItmName = "接案日期-日期";
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);

        $caseYear = 1;
        $caseMonth = 1;
        $caseDay = 1;
    }
    if ($_POST['surgeryDrName'] == 1){
        if (!empty($codeSQL)) {
            $codeSQL .= ", `surgeryDrName`";
        } else {
            $codeSQL .= "`surgeryDrName`";
        }
        $SelectItem += 1;
        $SelItmName = "外科医师";
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
        $surgeryDrName = 1;
    }
    if ($_POST['languageTherapist'] == 1) {
        if (!empty($codeSQL)) {
            $codeSQL .= ", `languageTherapist`";
        } else {
            $codeSQL .= "`languageTherapist`";
        }
        $SelectItem += 1;
        $SelItmName = "语言治疗师";
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
        $languageTherapist = 1;
    }
    if ($_POST['orthodontics'] == 1) {
        if (!empty($codeSQL)) {
            $codeSQL .= ", `orthodontics`";
        } else {
            $codeSQL .= "`orthodontics`";
        }
        $SelectItem += 1;
        $SelItmName = "正畸科医师";
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
        $orthodontics = 1;
    }

    if ($_POST['idno'] == 1) {
        if (!empty($codeSQL)) {
            $codeSQL .= ", `idno`";
        } else {
            $codeSQL .= "`idno`";
        }
        $SelectItem += 1;
        $SelItmName = "身份证号";
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
        $idno = 1;
    }
    if ($_POST['MedicalRecordNumber'] == 1) {
        if (!empty($codeSQL)) {
            $codeSQL .= ", `MedicalRecordNumber`";
        } else {
            $codeSQL .= "`MedicalRecordNumber`";
        }
        $SelectItem += 1;
        $SelItmName = "病历号码";
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
        $MedicalRecordNumber = 1;
    }
    if ($_POST['name'] == 1) {
        if (!empty($codeSQL)) {
            $codeSQL .= ", `name`";
        } else {
            $codeSQL .= "`name`";
        }
        $SelectItem += 1;
        $SelItmName = "个案姓名";
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
        $name = 1;
    }
    if ($_POST['gender'] == 1) {
        if (!empty($codeSQL)) {
            $codeSQL .= ", `gender`";
        } else {
            $codeSQL .= "`gender`";
        }
        $SelectItem += 1;
        $SelItmName = "性别";
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
        $gender = 1;
    }
    if ($_POST['birthdays'] == 1) {
        if (!empty($codeSQL)) {
            $codeSQL .= ", `birthYear`, `birthMonth`, `birthDay`";
        } else {
            $codeSQL .= "`birthYear`, `birthMonth`, `birthDay`";
        }
        $SelectItem += 1;
        $SelItmName = "出生日期-年份";
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);

        $SelectItem += 1;
        $SelItmName = "出生日期-月份";
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);

        $SelectItem += 1;
        $SelItmName = "出生日期-日期";
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);

        $birthdays = 1;
    }
    if ($_POST['profession'] == 1) {
        if (!empty($codeSQL)) {
            $codeSQL .= ", `profession`";
        } else {
            $codeSQL .= "`profession`";
        }
        $SelectItem += 1;
        $SelItmName = "职业";
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
        $profession =1;
    }
    if ($_POST['tel'] == 1) {
        if (!empty($codeSQL)) {
            $codeSQL .= ", `tel`";
        } else {
            $codeSQL .= "`tel`";
        }
        $SelectItem += 1;
        $SelItmName = "电话";
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
        $tel = 1;
    }
    if ($_POST['education'] == 1) {
        if (!empty($codeSQL)) {
            $codeSQL .= ", `education`";
        } else {
            $codeSQL .= "`education`";
        }
        $SelectItem += 1;
        $SelItmName = "教育程度";
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
        $education =1;
    }
    if ($_POST['address'] == 1) {
        if (!empty($codeSQL)) {
            $codeSQL .= ", `address`";
        } else {
            $codeSQL .= "`address`";
        }
        $SelectItem += 1;
        $SelItmName = "住址";
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
        $address=1;
    }
    if ($_POST['contactperson'] == 1) {
        if (!empty($codeSQL)) {
            $codeSQL .= ", `contactperson`";
        } else {
            $codeSQL .= "`contactperson`";
        }
        $SelectItem += 1;
        $SelItmName = "重要联系人";
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
        $contactperson=1;
    }
    if ($_POST['relationship'] == 1) {
        if (!empty($codeSQL)) {
            $codeSQL .= ", `relationship`";
        } else {
            $codeSQL .= "`relationship`";
        }
        $SelectItem += 1;
        $SelItmName = "与个案关系";
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
        $relationship=1;
    }
    if ($_POST['phone'] == 1) {
        if (!empty($codeSQL)) {
            $codeSQL .= ", `phone`";
        } else {
            $codeSQL .= "`phone`";
        }
        $SelectItem += 1;
        $SelItmName = "连络电话(自宅)";
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
        $phone=1;
    }
    if ($_POST['cellphone'] == 1) {
        if (!empty($codeSQL)) {
            $codeSQL .= ", `cellphone`";
        } else {
            $codeSQL .= "`cellphone`";
        }
        $SelectItem += 1;
        $SelItmName = "连络电话(手机)";
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
        $cellphone=1;
    }
    if ($_POST['h2hdistance'] == 1) {
        if (!empty($codeSQL)) {
            $codeSQL .= ", `h2hdistance`";
        } else {
            $codeSQL .= "`h2hdistance`";
        }
        $SelectItem += 1;
        $SelItmName = "住家离医院距离";
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
        $h2hdistance=1;
    }
    if ($_POST['height'] == 1) {
        if (!empty($codeSQL)) {
            $codeSQL .= ", `height`";
        } else {
            $codeSQL .= "`height`";
        }
        $SelectItem += 1;
        $SelItmName = "身高";
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
        $height=1;
    }
    if ($_POST['weight'] == 1) {
        if (!empty($codeSQL)) {
            $codeSQL .= ", `weight`";
        } else {
            $codeSQL .= "`weight`";
        }
        $SelectItem += 1;
        $SelItmName = "体重";
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
        $weight=1;
    }
    if (!empty($_POST['mains']) && ($_POST['mains'] == 1)) {
        if (!empty($codeSQL)) {
            $codeSQL .= ", `diagnosis_unilateral_cleft_lip_1`, `diagnosis_unilateral_cleft_lip`, `diagnosis_bilateral_cleft_lip_2`, `diagnosis_bilateral_cleft_lip`, `CleftPalate`, `complete_main`, `incomplete`, `complete_main`, `complete`, `BoneGraft_main`, `BoneGraft_select`";
        } else {
            $codeSQL .= "`diagnosis_unilateral_cleft_lip_1`, `diagnosis_unilateral_cleft_lip`, `diagnosis_bilateral_cleft_lip_2`, `diagnosis_bilateral_cleft_lip`, `CleftPalate`, `complete_main`, `incomplete`, `complete_main`, `complete`, `BoneGraft_main`, `BoneGraft_select`";
        }
        $SelectItem += 1;
        $SelItmName = "单侧唇裂";    //
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
        $diagnosis_unilateral_cleft_lip_1=1;

        $SelectItem += 1;
        $SelItmName = "完全性/不完全性/隐裂";
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
        $diagnosis_unilateral_cleft_lip=1;

        $SelectItem += 1;
        $SelItmName = "双侧唇裂";
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
        $diagnosis_bilateral_cleft_lip_2=1;

        $SelectItem += 1;
        $SelItmName = "完全性/不完全性/混合裂";
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
        $diagnosis_bilateral_cleft_lip=1;

        $SelectItem += 1;
        $SelItmName = "颚裂";
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
        $CleftPalate=1;

        $SelectItem += 1;
        $SelItmName = "不完全性";
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
        $complete_main=1;

        $SelectItem += 1;
        $SelItmName = "粘膜下裂/悬雍垂裂/软颚裂/双侧裂";
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
        $incomplete=1;

    $SelectItem += 1;
    $SelItmName = "完全性";
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
    $complete_main=1;

    $SelectItem += 1;
    $SelItmName = "单侧/双侧";
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
    $complete=1;

        $SelectItem += 1;
        $SelItmName = "牙槽突裂";
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
        $BoneGraft_main=1;

        $SelectItem += 1;
        $SelItmName = "完全性/不完全性/隐裂";
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
        $BoneGraft_select=1;
    }
    if (!empty($_POST['Combined_with_other_craniofacial_disorders']) && ($_POST['Combined_with_other_craniofacial_disorders'] == 1)) {
        if (!empty($codeSQL)) {
            $codeSQL .= ", `Combined_with_other_craniofacial_disorders_text`";
        } else {
            $codeSQL .= "`Combined_with_other_craniofacial_disorders_text`";
        }
        $SelectItem += 1;
        $SelItmName = "合并其它颅颜病症";
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
        $Combined_with_other_craniofacial_disorders_text=1;
    }

// 个案之前接受过任何唇颚裂治疗
    if (!empty($_POST['Cleft_lip_and_palate_surgery']) && ($_POST['Cleft_lip_and_palate_surgery'] == 1)) {
        if (!empty($codeSQL)) {
            $codeSQL .= ", `beforeSurgery_1`,`beforeSurgery_2`,`beforeSurgery_3`,`beforeSurgery_4`,`beforeSurgery_5`,`beforeSurgery_6`,`beforeSurgery_7`,`beforeSurgery_8`,`beforeSurgery_9`,`beforeSurgery_10`,`beforeSurgery_11`,`beforeSurgery_other`,`beforeSurgery_other_reason`";
        } else {
            $codeSQL .= "`beforeSurgery_1`,`beforeSurgery_2`,`beforeSurgery_3`,`beforeSurgery_4`,`beforeSurgery_5`,`beforeSurgery_6`,`beforeSurgery_7`,`beforeSurgery_8`,`beforeSurgery_9`,`beforeSurgery_10`,`beforeSurgery_11`,`beforeSurgery_other`,`beforeSurgery_other_reason`";
        }
        $SelectItem += 1;
        $SelItmName = "一期唇鼻修复";
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
        $beforeSurgery_1=1;

        $SelectItem += 1;
        $SelItmName = "一期双侧唇鼻修复";
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
        $beforeSurgery_2=1;

        $SelectItem += 1;
        $SelItmName = "一期颚裂修复";
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
        $beforeSurgery_3=1;

        $SelectItem += 1;
        $SelItmName = "廔孔修复";
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
        $beforeSurgery_4=1;

        $SelectItem += 1;
        $SelItmName = "咽瓣修复";
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
        $beforeSurgery_5=1;

        $SelectItem += 1;
        $SelItmName = "梨骨瓣修复";
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
        $beforeSurgery_6=1;

        $SelectItem += 1;
        $SelItmName = "二期颚裂(颚咽)修复";
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
        $beforeSurgery_7=1;

        $SelectItem += 1;
        $SelItmName = "唇鼻整形";
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
        $beforeSurgery_8=1;

        $SelectItem += 1;
        $SelItmName = "齿槽植骨";
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
        $beforeSurgery_9=1;

        $SelectItem += 1;
        $SelItmName = "术前正畸";
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
        $beforeSurgery_10=1;

        $SelectItem += 1;
        $SelItmName = "语言治疗";
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
        $beforeSurgery_11=1;

        $SelectItem += 1;
        $SelItmName = "其它，请详述";
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
        $beforeSurgery_other=1;

        $Cleft_lip_and_palate_surgery = "1";
    }


    if (!empty($_POST['familyMembers']) && ($_POST['familyMembers'] == 1)) {
        if (!empty($codeSQL)) {
            $codeSQL .= ", `familyMembers`";
        } else {
            $codeSQL .= "`familyMembers`";
        }
        $SelectItem += 1;
        $SelItmName = "家庭成员";
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
        $familyMembers=1;
    }
    if (!empty($_POST['fatherAge']) && ($_POST['fatherAge'] == 1)) {
        if (!empty($codeSQL)) {
            $codeSQL .= ", `fatherAge`";
        } else {
            $codeSQL .= "`fatherAge`";
        }
        $SelectItem += 1;
        $SelItmName = "父亲年龄";
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
        $fatherAge=1;
    }
    if (!empty($_POST['fatherProfession_main']) && ($_POST['fatherProfession_main'] == 1)) {
        if (!empty($codeSQL)) {
            $codeSQL .= ", `fatherProfession_main`";
        } else {
            $codeSQL .= "`fatherProfession_main`";
        }
        $SelectItem += 1;
        $SelItmName = "父亲职业";
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
        $fatherProfession_main=1;
    }
    if (!empty($_POST['fatherProfession']) && ($_POST['fatherProfession'] == 1)) {
        if (!empty($codeSQL)) {
            $codeSQL .= ", `fatherProfession`";
        } else {
            $codeSQL .= "`fatherProfession`";
        }
        $SelectItem += 1;
        $SelItmName = "父亲教育程度";
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
        $fatherProfession=1;
    }
    if (!empty($_POST['motherAge']) && ($_POST['motherAge'] == 1)) {
        if (!empty($codeSQL)) {
            $codeSQL .= ", `motherAge`";
        } else {
            $codeSQL .= "`motherAge`";
        }
        $SelectItem += 1;
        $SelItmName = "母亲年龄";
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
        $motherAge=1;
    }
    if (!empty($_POST['motherProfession_main']) && ($_POST['motherProfession_main'] == 1)) {
        if (!empty($codeSQL)) {
            $codeSQL .= ", `motherProfession_main`";
        } else {
            $codeSQL .= "`motherProfession_main`";
        }
        $SelectItem += 1;
        $SelItmName = "母亲职业";
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
        $motherProfession_main=1;
    }
    if (!empty($_POST['motherProfession']) && ($_POST['motherProfession'] == 1)) {
        if (!empty($codeSQL)) {
            $codeSQL .= ", `motherProfession`";
        } else {
            $codeSQL .= "`motherProfession`";
        }
        $SelectItem += 1;
        $SelItmName = "母亲教育程度";
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
        $motherProfession=1;
    }
    if (!empty($_POST['descriptionCaseFamily']) && ($_POST['descriptionCaseFamily'] == 1)) {
        if (!empty($codeSQL)) {
            $codeSQL .= ", `descriptionCaseFamily`";
        } else {
            $codeSQL .= "`descriptionCaseFamily`";
        }
        $SelectItem += 1;
        $SelItmName = "个案家庭情况说明";
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
        $descriptionCaseFamily=1;
    }
    if (!empty($_POST['mainSourceofIncome']) && ($_POST['mainSourceofIncome'] == 1)) {
        if (!empty($codeSQL)) {
            $codeSQL .= ", `mainSourceofIncome`";
        } else {
            $codeSQL .= "`mainSourceofIncome`";
        }
        $SelectItem += 1;
        $SelItmName = "主要经济/收入来源";
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
        $mainSourceofIncome=1;
    }
    if (!empty($_POST['income']) && ($_POST['income'] == 1)) {
        if (!empty($codeSQL)) {
            $codeSQL .= ", `income`";
        } else {
            $codeSQL .= "`income`";
        }
        $SelectItem += 1;
        $SelItmName = "平均年收入";
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
        $income=1;
    }
    if (!empty($_POST['fixedExpenditure']) && ($_POST['fixedExpenditure'] == 1)) {
        if (!empty($codeSQL)) {
            $codeSQL .= ", `fixedExpenditure1`, `fixedExpenditure2`, `fixedExpenditure3`, `fixedExpenditure4`";
        } else {
            $codeSQL .= "`fixedExpenditure1`, `fixedExpenditure2`, `fixedExpenditure3`, `fixedExpenditure4`";
        }
        $SelectItem += 1;
        $SelItmName = "家中固定支出项目1";
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
        $fixedExpenditure1=1;

        $SelectItem += 1;
        $SelItmName = "家中固定支出项目2";
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
        $fixedExpenditure2=1;

        $SelectItem += 1;
        $SelItmName = "家中固定支出项目3";
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
        $fixedExpenditure3=1;

        $SelectItem += 1;
        $SelItmName = "家中固定支出项目4";
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
        $fixedExpenditure4=1;
    }
    if (!empty($_POST['extimatedExpenditures']) && ($_POST['extimatedExpenditures'] == 1)) {
        if (!empty($codeSQL)) {
            $codeSQL .= ", `extimatedExpenditures`";
        } else {
            $codeSQL .= "`extimatedExpenditures`";
        }
        $SelectItem += 1;
        $SelItmName = "预估支出(平均每月生活支出)";
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
        $extimatedExpenditures=1;
    }


// *********************************************  依國別碼選擇 資料庫查詢  Start  *****************************************
    Switch ($_POST['CountryCode']) {
        case "CN":
            $SQLCode = "SELECT ".$codeSQL." FROM `patient-china`";
            break;
        case "KH":
            $SQLCode = "SELECT ".$codeSQL." FROM KHpatient";
            break;
        case "PK":
            $SQLCode = "SELECT ".$codeSQL." FROM PKpatient";
            break;
        case "VN":
            $SQLCode = "SELECT ".$codeSQL." FROM `patient-vn`";
            break;
    }
    $SQLCodeQuery = mysql_query($SQLCode);
    $HNum = 2;


//    echo $SQLCode.'<br/>';



// *********************************************  依國別碼選擇 資料庫查詢  End  *****************************************


// *********************************************  資料寫入 Excel - Start  *************************************************
    while ($ExcelArrays = mysql_fetch_array($SQLCodeQuery)){

//        $VNum = 1;
        $VNum = 0;

// 寫入 NCF個案編號
        $ArrayData = $ExcelArrays['NCFID'];
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
        $VNum += 1;


        if ((!empty($ExcelArrays['school']) || (!empty($school)))) {
            $TmpDataCN1 = $ExcelArrays['school'];
            if($TmpDataCN1 == "C"){
                $ArrayData = "西安交通大学口腔医院";
            }elseif ($TmpDataCN1 == "西安交通大学口腔医院"){
                $ArrayData = "西安交通大学口腔医院";
            }elseif ($TmpDataCN1 == "中国医学科学院北京协和医院") {
                $ArrayData = "中国医学科学院北京协和医院";
            }else {
                $ArrayData = " ";
            }
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }

        if ((!empty($ExcelArrays['caseYear']) || (!empty($caseYear)))) {
            $ArrayData = $ExcelArrays['caseYear'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;

            $ArrayData = $ExcelArrays['caseMonth'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;

            $ArrayData = $ExcelArrays['caseDay'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }

        if ((!empty($ExcelArrays['surgeryDrName']) || (!empty($surgeryDrName)))) {
            $ArrayData = $ExcelArrays['surgeryDrName'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }

        if ((!empty($ExcelArrays['languageTherapist']) || (!empty($languageTherapist)))) {
            $ArrayData = $ExcelArrays['languageTherapist'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }

        if (!empty($ExcelArrays['orthodontics']) || (!empty($orthodontics))) {
            $ArrayData = $ExcelArrays['orthodontics'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }

        if ((!empty($ExcelArrays['idno']) || (!empty($idno)))) {
            $ArrayData = $ExcelArrays['idno'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }

        if (!empty($ExcelArrays['MedicalRecordNumber']) || (!empty($MedicalRecordNumber))) {
            $ArrayData = $ExcelArrays['MedicalRecordNumber'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }

        if (!empty($ExcelArrays['name']) || (!empty($name))) {
            $ArrayData = $ExcelArrays['name'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }

        if ((!empty($ExcelArrays['gender']) || (!empty($gender)))) {
            $TmpData = $ExcelArrays['gender'];
            if($TmpData == "M"){
                $ArrayData = "男";
            }else{
                $ArrayData = "女";
            }
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }

        if ((!empty($ExcelArrays['birthYear']) || (!empty($birthdays)))) {
            if (empty($ExcelArrays['birthYear'])) {
                $ArrayData = "-";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            } else {
                $ArrayData = $ExcelArrays['birthYear'];
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            }
            if (empty($ExcelArrays['birthMonth'])) {
                $ArrayData = "-";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            } else {
                $ArrayData = $ExcelArrays['birthMonth'];
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            }
            if (empty($ExcelArrays['birthDay'])) {
                $ArrayData = "-";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            } else {
                $ArrayData = $ExcelArrays['birthDay'];
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            }
        }

        if ((!empty($ExcelArrays['profession']) || (!empty($profession)))) {
            if (empty($ExcelArrays['profession'])) {
                $ArrayData = "-";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            } else {
                $ArrayData = $ExcelArrays['profession'];
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            }
        }
        if ((!empty($ExcelArrays['tel']) || (!empty($tel)))) {
            if (empty($ExcelArrays['tel'])) {
                $ArrayData = "-";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            } else {
                $ArrayData = $ExcelArrays['tel'];
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            }
        }
        if ((!empty($ExcelArrays['education']) || (!empty($education)))) {
            if (empty($ExcelArrays['education'])) {
                $ArrayData = "-";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            } else {
                $ArrayData = $ExcelArrays['education'];
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            }
        }
        if ((!empty($ExcelArrays['address']) || (!empty($address)))) {
            if (empty($ExcelArrays['address'])) {
                $ArrayData = "-";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            } else {
                $ArrayData = $ExcelArrays['address'];
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            }
        }
        if ((!empty($ExcelArrays['contactperson']) || (!empty($contactperson)))) {
            if (empty($ExcelArrays['contactperson'])) {
                $ArrayData = "-";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            } else {
                $ArrayData = $ExcelArrays['contactperson'];
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            }
        }
        if ((!empty($ExcelArrays['relationship']) || (!empty($relationship)))) {
            if (empty($ExcelArrays['relationship'])) {
                $ArrayData = "-";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            } else {
                $ArrayData = $ExcelArrays['relationship'];
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            }

        }
        if ((!empty($ExcelArrays['phone']) || (!empty($phone)))) {
            if (empty($ExcelArrays['phone'])) {
                $ArrayData = "-";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            } else {
                $ArrayData = $ExcelArrays['phone'];
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            }

        }
        if ((!empty($ExcelArrays['cellphone']) || (!empty($cellphone)))) {
            if (empty($ExcelArrays['cellphone'])) {
                $ArrayData = "-";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            } else {
                $ArrayData = $ExcelArrays['cellphone'];
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            }
        }
        if ((!empty($ExcelArrays['h2hdistance']) || (!empty($h2hdistance)))) {
            if (empty($ExcelArrays['h2hdistance'])) {
                $ArrayData = "-";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            } else {
                $ArrayData = $ExcelArrays['h2hdistance'];
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            }
        }
        if ((!empty($ExcelArrays['height']) || (!empty($height)))) {
            if (empty($ExcelArrays['height'])) {
                $ArrayData = "-";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            } else {
                $ArrayData = $ExcelArrays['height'];
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            }
        }
        if ((!empty($ExcelArrays['weight']) || (!empty($weight)))) {
            if (empty($ExcelArrays['weight'])) {
                $ArrayData = "-";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            } else {
                $ArrayData = $ExcelArrays['weight'];
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            }
        }


// 主诊断
        if ((!empty($ExcelArrays['diagnosis_unilateral_cleft_lip_1']) || (!empty($mains)))) {
            if (empty($ExcelArrays['diagnosis_unilateral_cleft_lip_1'])) {
                $ArrayData = "-";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            } else {
                $ArrayData = "●";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            }
            if (empty($ExcelArrays['diagnosis_unilateral_cleft_lip'])) {
                $ArrayData = "-";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            } else {
                switch ($ExcelArrays['diagnosis_unilateral_cleft_lip']){
                    case "C":
                        $ArrayData = "完全性";
                        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                        $VNum += 1;
                        break;
                    case "IC":
                        $ArrayData = "不完全性";
                        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                        $VNum += 1;
                        break;
                    case "CK":
                        $ArrayData = "隐裂";
                        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                        $VNum += 1;
                        break;
                }
//                $ArrayData = "●";
//                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
//                $VNum += 1;
            }
            if (empty($ExcelArrays['diagnosis_bilateral_cleft_lip_2'])) {
                $ArrayData = "-";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            } else {
                $ArrayData = "●";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            }
            if (empty($ExcelArrays['diagnosis_bilateral_cleft_lip'])) {
                $ArrayData = "-";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            } else {
                switch ($ExcelArrays['diagnosis_bilateral_cleft_lip']){
                    case "C":
                        $ArrayData = "完全性";
                        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                        $VNum += 1;
                        break;
                    case "IC":
                        $ArrayData = "不完全性";
                        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                        $VNum += 1;
                        break;
                    case "MCK":
                        $ArrayData = "混合裂";
                        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                        $VNum += 1;
                        break;
                }
//                $ArrayData = "●";
//                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
//                $VNum += 1;
            }
            if (empty($ExcelArrays['CleftPalate'])) {
                $ArrayData = "-";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            } else {
                $ArrayData = "●";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            }
            if (empty($ExcelArrays['complete_main'])) {
                $ArrayData = "-";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            } else {
                $ArrayData = "●";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            }
            if (empty($ExcelArrays['incomplete'])) {
                $ArrayData = "-";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            } else {
                switch ($ExcelArrays['incomplete']){
                    case "SC":
                        $ArrayData = "粘膜下裂";
                        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                        $VNum += 1;
                        break;
                    case "CU":
                        $ArrayData = "悬雍垂裂";
                        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                        $VNum += 1;
                        break;
                    case "SP":
                        $ArrayData = "软颚裂";
                        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                        $VNum += 1;
                        break;
                    case "BC":
                        $ArrayData = "双侧裂";
                        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                        $VNum += 1;
                        break;
                }
//                $ArrayData = "●";
//                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
//                $VNum += 1;
            }
        if (empty($ExcelArrays['incomplete_main'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
            if (empty($ExcelArrays['complete'])) {
                $ArrayData = "-";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            } else {
                switch ($ExcelArrays['complete']){
                    case "U":
                        $ArrayData = "单侧";
                        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                        $VNum += 1;
                        break;
                    case "B":
                        $ArrayData = "双侧";
                        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                        $VNum += 1;
                        break;
                }
//                $ArrayData = "●";
//                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
//                $VNum += 1;
            }
            if (empty($ExcelArrays['BoneGraft_main'])) {
                $ArrayData = "-";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            } else {
                $ArrayData = "●";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            }
            if (empty($ExcelArrays['BoneGraft_select'])) {
                $ArrayData = "-";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            } else {
                $ArrayData = "●";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            }
        }


        if ((!empty($ExcelArrays['Combined_with_other_craniofacial_disorders']) || (!empty($Combined_with_other_craniofacial_disorders)))) {
            if (empty($ExcelArrays['Combined_with_other_craniofacial_disorders_text'])) {
                $ArrayData = "-";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            } else {
                $ArrayData = $ExcelArrays['Combined_with_other_craniofacial_disorders_text'];
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            }
        }


        if ((!empty($ExcelArrays['Cleft_lip_and_palate_surgery']) || (!empty($Cleft_lip_and_palate_surgery)))) {

            if(empty($ExcelArrays['beforeSurgery_1'])){
                $ArrayData = "-";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            } else {
                $ArrayData = "●";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            }
            if(empty($ExcelArrays['beforeSurgery_2'])){
                $ArrayData = "-";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            } else {
                $ArrayData = "●";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            }
            if(empty($ExcelArrays['beforeSurgery_3'])){
                $ArrayData = "-";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            } else {
                $ArrayData = "●";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            }

            if(empty($ExcelArrays['beforeSurgery_4'])){
                $ArrayData = "-";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            } else {
                $ArrayData = "●";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            }
            if(empty($ExcelArrays['beforeSurgery_5'])){
                $ArrayData = "-";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            } else {
                $ArrayData = "●";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            }
            if(empty($ExcelArrays['beforeSurgery_6'])){
                $ArrayData = "-";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            } else {
                $ArrayData = "●";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            }
            if(empty($ExcelArrays['beforeSurgery_7'])){
                $ArrayData = "-";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            } else {
                $ArrayData = "●";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            }
            if(empty($ExcelArrays['beforeSurgery_8'])){
                $ArrayData = "-";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            } else {
                $ArrayData = "●";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            }
            if(empty($ExcelArrays['beforeSurgery_9'])){
                $ArrayData = "-";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            } else {
                $ArrayData = "●";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            }
            if(empty($ExcelArrays['beforeSurgery_10'])){
                $ArrayData = "-";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            } else {
                $ArrayData = "●";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            }
            if(empty($ExcelArrays['beforeSurgery_11'])){
                $ArrayData = "-";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            } else {
                $ArrayData = "●";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            }
            if(empty($ExcelArrays['beforeSurgery_other'])){
                $ArrayData = "-";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            } else {
                $ArrayData = $ExcelArrays['beforeSurgery_other_reason'];
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            }
        }

        if ((!empty($ExcelArrays['familyMembers']) || (!empty($familyMembers)))) {
            if (empty($ExcelArrays['familyMembers'])) {
                $ArrayData = "-";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            } else {
                $ArrayData = $ExcelArrays['familyMembers'];
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            }
        }
        if ((!empty($ExcelArrays['fatherAge']) || (!empty($fatherAge)))) {
            if (empty($ExcelArrays['fatherAge'])) {
                $ArrayData = "-";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            } else {
                $ArrayData = $ExcelArrays['fatherAge'];
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            }
        }
        if ((!empty($ExcelArrays['fatherProfession_main']) || (!empty($fatherProfession_main)))) {
            if (empty($ExcelArrays['fatherProfession_main'])) {
                $ArrayData = "-";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            } else {
                $ArrayData = $ExcelArrays['fatherProfession_main'];
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            }
        }
        if ((!empty($ExcelArrays['fatherProfession']) || (!empty($fatherProfession)))) {
            if (empty($ExcelArrays['fatherProfession'])) {
                $ArrayData = "-";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            } else {
                $ArrayData = $ExcelArrays['fatherProfession'];
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            }
        }
        if ((!empty($ExcelArrays['motherAge']) || (!empty($motherAge)))) {
            if (empty($ExcelArrays['motherAge'])) {
                $ArrayData = "-";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            } else {
                $ArrayData = $ExcelArrays['motherAge'];
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            }
        }
        if ((!empty($ExcelArrays['motherProfession_main']) || (!empty($motherProfession_main)))) {
            if (empty($ExcelArrays['motherProfession_main'])) {
                $ArrayData = "-";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            } else {
                $ArrayData = $ExcelArrays['motherProfession_main'];
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            }
        }
        if ((!empty($ExcelArrays['motherProfession']) || (!empty($motherProfession)))) {
            if (empty($ExcelArrays['motherProfession'])) {
                $ArrayData = "-";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            } else {
                $ArrayData = $ExcelArrays['motherProfession'];
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            }
        }
        if ((!empty($ExcelArrays['descriptionCaseFamily']) || (!empty($descriptionCaseFamily)))) {
            if (empty($ExcelArrays['descriptionCaseFamily'])) {
                $ArrayData = "-";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            } else {
                $ArrayData = $ExcelArrays['descriptionCaseFamily'];
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            }
        }
        if ((!empty($ExcelArrays['mainSourceofIncome']) || (!empty($mainSourceofIncome)))) {
            if (empty($ExcelArrays['mainSourceofIncome'])) {
                $ArrayData = "-";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            } else {
                $ArrayData = $ExcelArrays['mainSourceofIncome'];
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            }
        }
        if ((!empty($ExcelArrays['income']) || (!empty($income)))) {
            if (empty($ExcelArrays['income'])) {
                $ArrayData = "-";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            } else {
                $ArrayData = $ExcelArrays['income'];
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            }
        }
        if ((!empty($ExcelArrays['fixedExpenditure1']) || (!empty($fixedExpenditure)))) {
            if (empty($ExcelArrays['fixedExpenditure1'])) {
                $ArrayData = "-";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            } else {
                $ArrayData = $ExcelArrays['fixedExpenditure1'];
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            }

            if (empty($ExcelArrays['fixedExpenditure2'])) {
                $ArrayData = "-";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            } else {
                $ArrayData = $ExcelArrays['fixedExpenditure2'];
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            }

            if (empty($ExcelArrays['fixedExpenditure3'])) {
                $ArrayData = "-";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            } else {
                $ArrayData = $ExcelArrays['fixedExpenditure3'];
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            }

            if (empty($ExcelArrays['fixedExpenditure4'])) {
                $ArrayData = "-";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            } else {
                $ArrayData = $ExcelArrays['fixedExpenditure4'];
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            }
        }

        if ((!empty($ExcelArrays['extimatedExpenditures']) || (!empty($extimatedExpenditures)))) {
            if (empty($ExcelArrays['extimatedExpenditures'])) {
                $ArrayData = "-";
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            } else {
                $ArrayData = $ExcelArrays['extimatedExpenditures'];
                $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
                $VNum += 1;
            }

        }
        $HNum += 1;
    }

// ************************************************  CN 資料寫入區  End  ************************************************

//---------- 以日期為首，當作檔案名稱 -----------//
    $ExcelFileName = date('Ymd')."_SEED_NNCF.xls";

//建立工作表並指定名稱
    $objPHPExcel->setActiveSheetIndex(0);  //設定預設顯示的工作表
    $objActSheet = $objPHPExcel->getActiveSheet(); //指定預設工作表為 $objActSheet
    $objActSheet->setTitle("線上病歷表-個人資料");  //設定標題
    $objPHPExcel->createSheet(); //建立新的工作表，上面那三行再來一次，編號要改

////設定文字、儲存格樣式及對齊方向
    $objPHPExcel->getDefaultStyle()->getFont()->setName('標楷體');
    $objPHPExcel->getDefaultStyle()->getFont()->setSize(16);
//$objActSheet->getStyle('A1:I1')->getFill()->setFillType(PHPExcel_Style_Fill:: FILL_SOLID)->getStartColor()->setRGB('00DC71');

//---------- 資料寫入 Excel -----------//
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename='.$ExcelFileName);
    header('Cache-Control: max-age=0');
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
//$objWriter->setPreCalculateFormulas(false);
    $objWriter->save('php://output');
    exit;



}else{
    echo "<Script Language='JavaScript'>";
    echo "alert('抱歉您現在無權限讀取,請先登入')\;";
    echo " location.href=\'login.php\'\;";
    echo " </Script>";
}

?>