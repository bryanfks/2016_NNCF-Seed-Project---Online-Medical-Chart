<?php
session_start();
/**
 * Created by PhpStorm.
 * User: Bryan
 * Date: 2016/4/11
 * Time: 下午9:59
 */
$seid = $_SESSION["seid"];
$sepwd = $_SESSION["sepwd"];
if(isset($seid) && isset($sepwd)){
    

require_once 'Classes/PHPExcel.php';    //引入 PHPExcel 物件庫
require_once 'Classes/PHPExcel/IOFactory.php';    //引入 PHPExcel_IOFactory 物件庫
//require_once 'db_design.php';
require_once 'db.php';

/*
 * 
 * 本專案說明：
 * 目前已解決資料寫入 Excel 問題。
 * 尚待解決：
 * 1. 當 CN 資料寫入 Excel 表後，$HNum & $VNum 各 +1 後再當 KH 起始位置。 對 PK 來說也須執行同樣步驟
 * 2. 主診斷部分要轉譯
 * 3. KH, PK 醫院名稱要轉譯
 *
 *
 */



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


/*
 * 医院名称
 */
if ($_POST['school'] == 1) {
    $codeSQL .= "`school`";
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
    $SelItmName = "不完全性/完全性";
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
    $complete_main=1;

    $SelectItem += 1;
    $SelItmName = "粘膜下裂/悬雍垂裂/软颚裂/双侧裂/单侧/双侧";
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
    $incomplete=1;

//    $SelectItem += 1;
//    $SelItmName = "complete_main";
//    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
//    $complete_main=1;
//
//    $SelectItem += 1;
//    $SelItmName = "complete";
//    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
//    $complete=1;

    $SelectItem += 1;
    $SelItmName = "牙槽突裂";
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
    $BoneGraft_main=1;

    $SelectItem += 1;
    $SelItmName = "完全性/不完全性/隐裂";
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($SelectItem, 1, $SelItmName);
    $BoneGraft_select=1;
}
if (!empty($_POST['Combined_with_other_craniofacial_disorders_text']) && ($_POST['Combined_with_other_craniofacial_disorders_text'] == 1)) {
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


// *********************************************  CN 資料寫入區  Start  *************************************************

$fullSQL_CN = "SELECT ".$codeSQL." FROM `patient-china`";
$CN = mysql_query($fullSQL_CN);
$HNum = 2;

while ($CNARR = mysql_fetch_array($CN)){

    $VNum = 1;

    if ((!empty($CNARR['school']) || (!empty($school)))) {
        $TmpDataCN1 = $CNARR['school'];
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

    if ((!empty($CNARR['caseYear']) || (!empty($caseYear)))) {
        $ArrayData = $CNARR['caseYear'];
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
        $VNum += 1;

        $ArrayData = $CNARR['caseMonth'];
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
        $VNum += 1;

        $ArrayData = $CNARR['caseDay'];
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
        $VNum += 1;
    }

    if ((!empty($CNARR['surgeryDrName']) || (!empty($surgeryDrName)))) {
        $ArrayData = $CNARR['surgeryDrName'];
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
        $VNum += 1;
    }

    if ((!empty($CNARR['languageTherapist']) || (!empty($languageTherapist)))) {
        $ArrayData = $CNARR['languageTherapist'];
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
        $VNum += 1;
    }

    if (!empty($CNARR['orthodontics']) || (!empty($orthodontics))) {
        $ArrayData = $CNARR['orthodontics'];
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
        $VNum += 1;
    }

    if ((!empty($CNARR['idno']) || (!empty($idno)))) {
        $ArrayData = $CNARR['idno'];
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
        $VNum += 1;
    }

    if (!empty($CNARR['MedicalRecordNumber']) || (!empty($MedicalRecordNumber))) {
        $ArrayData = $CNARR['MedicalRecordNumber'];
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
        $VNum += 1;
    }

    if (!empty($CNARR['name']) || (!empty($name))) {
        $ArrayData = $CNARR['name'];
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
        $VNum += 1;
    }

    if ((!empty($CNARR['gender']) || (!empty($gender)))) {
        $TmpData = $CNARR['gender'];
        if($TmpData == "M"){
            $ArrayData = "男";
        }else{
            $ArrayData = "女";
        }
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
        $VNum += 1;
    }

    if ((!empty($CNARR['birthYear']) || (!empty($birthdays)))) {
        if (empty($CNARR['birthYear'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $CNARR['birthYear'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if (empty($CNARR['birthMonth'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $CNARR['birthMonth'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if (empty($CNARR['birthDay'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $CNARR['birthDay'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }

    if ((!empty($CNARR['profession']) || (!empty($profession)))) {
        if (empty($CNARR['profession'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $CNARR['profession'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }
    if ((!empty($CNARR['tel']) || (!empty($tel)))) {
        if (empty($CNARR['tel'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $CNARR['tel'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }
    if ((!empty($CNARR['education']) || (!empty($education)))) {
        if (empty($CNARR['education'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $CNARR['education'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }
    if ((!empty($CNARR['address']) || (!empty($address)))) {
        if (empty($CNARR['address'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $CNARR['address'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }
    if ((!empty($CNARR['contactperson']) || (!empty($contactperson)))) {
        if (empty($CNARR['contactperson'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $CNARR['contactperson'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }
    if ((!empty($CNARR['relationship']) || (!empty($relationship)))) {
        if (empty($CNARR['relationship'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $CNARR['relationship'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }

    }
    if ((!empty($CNARR['phone']) || (!empty($phone)))) {
        if (empty($CNARR['phone'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $CNARR['phone'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }

    }
    if ((!empty($CNARR['cellphone']) || (!empty($cellphone)))) {
        if (empty($CNARR['cellphone'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $CNARR['cellphone'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }
    if ((!empty($CNARR['h2hdistance']) || (!empty($h2hdistance)))) {
        if (empty($CNARR['h2hdistance'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $CNARR['h2hdistance'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }
    if ((!empty($CNARR['height']) || (!empty($height)))) {
        if (empty($CNARR['height'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $CNARR['height'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }
    if ((!empty($CNARR['weight']) || (!empty($weight)))) {
        if (empty($CNARR['weight'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $CNARR['weight'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }


// 主诊断
    if ((!empty($CNARR['diagnosis_unilateral_cleft_lip_1']) || (!empty($mains)))) {
        if (empty($CNARR['diagnosis_unilateral_cleft_lip_1'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if (empty($CNARR['diagnosis_unilateral_cleft_lip'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if (empty($CNARR['diagnosis_bilateral_cleft_lip_2'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if (empty($CNARR['diagnosis_bilateral_cleft_lip'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if (empty($CNARR['CleftPalate'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if (empty($CNARR['complete_main'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if (empty($CNARR['incomplete'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
//        if (empty($CNARR['complete_main'])) {
//            $ArrayData = "-";
//            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
//            $VNum += 1;
//        } else {
//            $ArrayData = "●";
//            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
//            $VNum += 1;
//        }
        if (empty($CNARR['complete'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if (empty($CNARR['BoneGraft_main'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if (empty($CNARR['BoneGraft_select'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }


    if ((!empty($CNARR['Combined_with_other_craniofacial_disorders']) || (!empty($Combined_with_other_craniofacial_disorders)))) {
        if (empty($CNARR['Combined_with_other_craniofacial_disorders_text'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $CNARR['Combined_with_other_craniofacial_disorders_text'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }


    if ((!empty($CNARR['Cleft_lip_and_palate_surgery']) || (!empty($Cleft_lip_and_palate_surgery)))) {

        if(empty($CNARR['beforeSurgery_1'])){
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if(empty($CNARR['beforeSurgery_2'])){
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if(empty($CNARR['beforeSurgery_3'])){
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }

        if(empty($CNARR['beforeSurgery_4'])){
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if(empty($CNARR['beforeSurgery_5'])){
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if(empty($CNARR['beforeSurgery_6'])){
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if(empty($CNARR['beforeSurgery_7'])){
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if(empty($CNARR['beforeSurgery_8'])){
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if(empty($CNARR['beforeSurgery_9'])){
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if(empty($CNARR['beforeSurgery_10'])){
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if(empty($CNARR['beforeSurgery_11'])){
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if(empty($CNARR['beforeSurgery_other'])){
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $CNARR['beforeSurgery_other_reason'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    } else {

    }

    if ((!empty($CNARR['familyMembers']) || (!empty($familyMembers)))) {
        if (empty($CNARR['familyMembers'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $CNARR['familyMembers'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }
    if ((!empty($CNARR['fatherAge']) || (!empty($fatherAge)))) {
        if (empty($CNARR['fatherAge'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $CNARR['fatherAge'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }
    if ((!empty($CNARR['fatherProfession_main']) || (!empty($fatherProfession_main)))) {
        if (empty($CNARR['fatherProfession_main'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $CNARR['fatherProfession_main'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }
    if ((!empty($CNARR['fatherProfession']) || (!empty($fatherProfession)))) {
        if (empty($CNARR['fatherProfession'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $CNARR['fatherProfession'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }
    if ((!empty($CNARR['motherAge']) || (!empty($motherAge)))) {
        if (empty($CNARR['motherAge'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $CNARR['motherAge'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }
    if ((!empty($CNARR['motherProfession_main']) || (!empty($motherProfession_main)))) {
        if (empty($CNARR['motherProfession_main'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $CNARR['motherProfession_main'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }
    if ((!empty($CNARR['motherProfession']) || (!empty($motherProfession)))) {
        if (empty($CNARR['motherProfession'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $CNARR['motherProfession'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }
    if ((!empty($CNARR['descriptionCaseFamily']) || (!empty($descriptionCaseFamily)))) {
        if (empty($CNARR['descriptionCaseFamily'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $CNARR['descriptionCaseFamily'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }
    if ((!empty($CNARR['mainSourceofIncome']) || (!empty($mainSourceofIncome)))) {
        if (empty($CNARR['mainSourceofIncome'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $CNARR['mainSourceofIncome'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }
    if ((!empty($CNARR['income']) || (!empty($income)))) {
        if (empty($CNARR['income'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $CNARR['income'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }
    if ((!empty($CNARR['fixedExpenditure1']) || (!empty($fixedExpenditure)))) {
        if (empty($CNARR['fixedExpenditure1'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $CNARR['fixedExpenditure1'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }

        if (empty($CNARR['fixedExpenditure2'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $CNARR['fixedExpenditure2'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }

        if (empty($CNARR['fixedExpenditure3'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $CNARR['fixedExpenditure3'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }

        if (empty($CNARR['fixedExpenditure4'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $CNARR['fixedExpenditure4'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }

    if ((!empty($CNARR['extimatedExpenditures']) || (!empty($extimatedExpenditures)))) {
        if (empty($CNARR['extimatedExpenditures'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $CNARR['extimatedExpenditures'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }

        $ArrayData = $CNARR['extimatedExpenditures'];
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
        $VNum += 1;
    }
    $HNum += 1;
}

// ************************************************  CN 資料寫入區  End  ************************************************

// ************************************************  KH 資料寫入區  Start  **********************************************
$fullSQL_KH = "SELECT ".$codeSQL." FROM KHpatient";
$KH = mysql_query($fullSQL_KH);

while ($KHARR = mysql_fetch_array($KH)){

    $VNum = 1;

    if ((!empty($KHARR['school']) || (!empty($school)))) {
        $TmpDataCN1 = $KHARR['school'];
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

    if ((!empty($KHARR['caseYear']) || (!empty($caseYear)))) {
        $ArrayData = $KHARR['caseYear'];
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
        $VNum += 1;

        $ArrayData = $KHARR['caseMonth'];
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
        $VNum += 1;

        $ArrayData = $KHARR['caseDay'];
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
        $VNum += 1;
    }

    if ((!empty($KHARR['surgeryDrName']) || (!empty($surgeryDrName)))) {
        $ArrayData = $KHARR['surgeryDrName'];
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
        $VNum += 1;
    }

    if ((!empty($KHARR['languageTherapist']) || (!empty($languageTherapist)))) {
        $ArrayData = $KHARR['languageTherapist'];
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
        $VNum += 1;
    }

    if (!empty($KHARR['orthodontics']) || (!empty($orthodontics))) {
        $ArrayData = $KHARR['orthodontics'];
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
        $VNum += 1;
    }

    if ((!empty($KHARR['idno']) || (!empty($idno)))) {
        $ArrayData = $KHARR['idno'];
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
        $VNum += 1;
    }

    if (!empty($KHARR['MedicalRecordNumber']) || (!empty($MedicalRecordNumber))) {
        $ArrayData = $KHARR['MedicalRecordNumber'];
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
        $VNum += 1;
    }

    if (!empty($KHARR['name']) || (!empty($name))) {
        $ArrayData = $KHARR['name'];
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
        $VNum += 1;
    }

    if ((!empty($KHARR['gender']) || (!empty($gender)))) {
        $TmpData = $KHARR['gender'];
        if($TmpData == "M"){
            $ArrayData = "男";
        }else{
            $ArrayData = "女";
        }
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
        $VNum += 1;
    }

    if ((!empty($KHARR['birthYear']) || (!empty($birthdays)))) {
        if (empty($KHARR['birthYear'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $KHARR['birthYear'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if (empty($KHARR['birthMonth'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $KHARR['birthMonth'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if (empty($KHARR['birthDay'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $KHARR['birthDay'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }

    if ((!empty($KHARR['profession']) || (!empty($profession)))) {
        if (empty($KHARR['profession'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $KHARR['profession'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }
    if ((!empty($KHARR['tel']) || (!empty($tel)))) {
        if (empty($KHARR['tel'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $KHARR['tel'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }
    if ((!empty($KHARR['education']) || (!empty($education)))) {
        if (empty($KHARR['education'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $KHARR['education'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }
    if ((!empty($KHARR['address']) || (!empty($address)))) {
        if (empty($KHARR['address'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $KHARR['address'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }
    if ((!empty($KHARR['contactperson']) || (!empty($contactperson)))) {
        if (empty($KHARR['contactperson'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $KHARR['contactperson'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }
    if ((!empty($KHARR['relationship']) || (!empty($relationship)))) {
        if (empty($KHARR['relationship'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $KHARR['relationship'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }

    }
    if ((!empty($KHARR['phone']) || (!empty($phone)))) {
        if (empty($KHARR['phone'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $KHARR['phone'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }

    }
    if ((!empty($KHARR['cellphone']) || (!empty($cellphone)))) {
        if (empty($KHARR['cellphone'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $KHARR['cellphone'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }
    if ((!empty($KHARR['h2hdistance']) || (!empty($h2hdistance)))) {
        if (empty($KHARR['h2hdistance'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $KHARR['h2hdistance'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }
    if ((!empty($KHARR['height']) || (!empty($height)))) {
        if (empty($KHARR['height'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $KHARR['height'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }
    if ((!empty($KHARR['weight']) || (!empty($weight)))) {
        if (empty($KHARR['weight'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $KHARR['weight'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }


// 主诊断
    if ((!empty($KHARR['diagnosis_unilateral_cleft_lip_1']) || (!empty($mains)))) {
        if (empty($KHARR['diagnosis_unilateral_cleft_lip_1'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if (empty($KHARR['diagnosis_unilateral_cleft_lip'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if (empty($KHARR['diagnosis_bilateral_cleft_lip_2'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if (empty($KHARR['diagnosis_bilateral_cleft_lip'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if (empty($KHARR['CleftPalate'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if (empty($KHARR['complete_main'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if (empty($KHARR['incomplete'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if (empty($KHARR['complete_main'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if (empty($KHARR['complete'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if (empty($KHARR['BoneGraft_main'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if (empty($KHARR['BoneGraft_select'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }


    if ((!empty($KHARR['Combined_with_other_craniofacial_disorders']) || (!empty($Combined_with_other_craniofacial_disorders)))) {
        if (empty($KHARR['Combined_with_other_craniofacial_disorders_text'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $KHARR['Combined_with_other_craniofacial_disorders_text'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }


    if ((!empty($KHARR['Cleft_lip_and_palate_surgery']) || (!empty($Cleft_lip_and_palate_surgery)))) {

        if(empty($KHARR['beforeSurgery_1'])){
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if(empty($KHARR['beforeSurgery_2'])){
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if(empty($KHARR['beforeSurgery_3'])){
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }

        if(empty($KHARR['beforeSurgery_4'])){
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if(empty($KHARR['beforeSurgery_5'])){
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if(empty($KHARR['beforeSurgery_6'])){
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if(empty($KHARR['beforeSurgery_7'])){
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if(empty($KHARR['beforeSurgery_8'])){
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if(empty($KHARR['beforeSurgery_9'])){
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if(empty($KHARR['beforeSurgery_10'])){
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if(empty($KHARR['beforeSurgery_11'])){
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if(empty($KHARR['beforeSurgery_other'])){
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $KHARR['beforeSurgery_other_reason'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    } else {

    }

    if ((!empty($KHARR['familyMembers']) || (!empty($familyMembers)))) {
        if (empty($KHARR['familyMembers'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $KHARR['familyMembers'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }
    if ((!empty($KHARR['fatherAge']) || (!empty($fatherAge)))) {
        if (empty($KHARR['fatherAge'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $KHARR['fatherAge'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }
    if ((!empty($KHARR['fatherProfession_main']) || (!empty($fatherProfession_main)))) {
        if (empty($KHARR['fatherProfession_main'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $KHARR['fatherProfession_main'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }
    if ((!empty($KHARR['fatherProfession']) || (!empty($fatherProfession)))) {
        if (empty($KHARR['fatherProfession'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $KHARR['fatherProfession'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }
    if ((!empty($KHARR['motherAge']) || (!empty($motherAge)))) {
        if (empty($KHARR['motherAge'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $KHARR['motherAge'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }
    if ((!empty($KHARR['motherProfession_main']) || (!empty($motherProfession_main)))) {
        if (empty($KHARR['motherProfession_main'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $KHARR['motherProfession_main'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }
    if ((!empty($KHARR['motherProfession']) || (!empty($motherProfession)))) {
        if (empty($KHARR['motherProfession'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $KHARR['motherProfession'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }
    if ((!empty($KHARR['descriptionCaseFamily']) || (!empty($descriptionCaseFamily)))) {
        if (empty($KHARR['descriptionCaseFamily'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $KHARR['descriptionCaseFamily'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }
    if ((!empty($KHARR['mainSourceofIncome']) || (!empty($mainSourceofIncome)))) {
        if (empty($KHARR['mainSourceofIncome'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $KHARR['mainSourceofIncome'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }
    if ((!empty($KHARR['income']) || (!empty($income)))) {
        if (empty($KHARR['income'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $KHARR['income'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }
    if ((!empty($KHARR['fixedExpenditure1']) || (!empty($fixedExpenditure)))) {
        if (empty($KHARR['fixedExpenditure1'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $KHARR['fixedExpenditure1'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }

        if (empty($KHARR['fixedExpenditure2'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $KHARR['fixedExpenditure2'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }

        if (empty($KHARR['fixedExpenditure3'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $KHARR['fixedExpenditure3'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }

        if (empty($KHARR['fixedExpenditure4'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $KHARR['fixedExpenditure4'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }

    if ((!empty($KHARR['extimatedExpenditures']) || (!empty($extimatedExpenditures)))) {
        if (empty($KHARR['extimatedExpenditures'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $KHARR['extimatedExpenditures'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }

        $ArrayData = $KHARR['extimatedExpenditures'];
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
        $VNum += 1;
    }
    $HNum += 1;
}

//*********************************** KH 資料寫入區  End  ******************************************************

//*********************************** PK 資料寫入區  Start  ****************************************************
$fullSQL_PK = "SELECT ".$codeSQL." FROM PKpatient";
$PK = mysql_query($fullSQL_PK);

while ($PKARR = mysql_fetch_array($PK)){

    $VNum = 1;

    if ((!empty($PKARR['school']) || (!empty($school)))) {
        $TmpDataCN1 = $PKARR['school'];
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

    if ((!empty($PKARR['caseYear']) || (!empty($caseYear)))) {
        $ArrayData = $PKARR['caseYear'];
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
        $VNum += 1;

        $ArrayData = $PKARR['caseMonth'];
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
        $VNum += 1;

        $ArrayData = $PKARR['caseDay'];
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
        $VNum += 1;
    }

    if ((!empty($PKARR['surgeryDrName']) || (!empty($surgeryDrName)))) {
        $ArrayData = $PKARR['surgeryDrName'];
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
        $VNum += 1;
    }

    if ((!empty($PKARR['languageTherapist']) || (!empty($languageTherapist)))) {
        $ArrayData = $PKARR['languageTherapist'];
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
        $VNum += 1;
    }

    if (!empty($PKARR['orthodontics']) || (!empty($orthodontics))) {
        $ArrayData = $PKARR['orthodontics'];
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
        $VNum += 1;
    }

    if ((!empty($PKARR['idno']) || (!empty($idno)))) {
        $ArrayData = $PKARR['idno'];
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
        $VNum += 1;
    }

    if (!empty($PKARR['MedicalRecordNumber']) || (!empty($MedicalRecordNumber))) {
        $ArrayData = $PKARR['MedicalRecordNumber'];
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
        $VNum += 1;
    }

    if (!empty($PKARR['name']) || (!empty($name))) {
        $ArrayData = $PKARR['name'];
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
        $VNum += 1;
    }

    if ((!empty($PKARR['gender']) || (!empty($gender)))) {
        $TmpData = $PKARR['gender'];
        if($TmpData == "M"){
            $ArrayData = "男";
        }else{
            $ArrayData = "女";
        }
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
        $VNum += 1;
    }

    if ((!empty($PKARR['birthYear']) || (!empty($birthdays)))) {
        if (empty($PKARR['birthYear'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $PKARR['birthYear'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if (empty($PKARR['birthMonth'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $PKARR['birthMonth'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if (empty($PKARR['birthDay'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $PKARR['birthDay'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }

    if ((!empty($PKARR['profession']) || (!empty($profession)))) {
        if (empty($PKARR['profession'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $PKARR['profession'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }
    if ((!empty($PKARR['tel']) || (!empty($tel)))) {
        if (empty($PKARR['tel'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $PKARR['tel'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }
    if ((!empty($PKARR['education']) || (!empty($education)))) {
        if (empty($PKARR['education'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $PKARR['education'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }
    if ((!empty($PKARR['address']) || (!empty($address)))) {
        if (empty($PKARR['address'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $PKARR['address'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }
    if ((!empty($PKARR['contactperson']) || (!empty($contactperson)))) {
        if (empty($PKARR['contactperson'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $PKARR['contactperson'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }
    if ((!empty($PKARR['relationship']) || (!empty($relationship)))) {
        if (empty($PKARR['relationship'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $PKARR['relationship'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }

    }
    if ((!empty($PKARR['phone']) || (!empty($phone)))) {
        if (empty($PKARR['phone'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $PKARR['phone'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }

    }
    if ((!empty($PKARR['cellphone']) || (!empty($cellphone)))) {
        if (empty($PKARR['cellphone'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $PKARR['cellphone'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }
    if ((!empty($PKARR['h2hdistance']) || (!empty($h2hdistance)))) {
        if (empty($PKARR['h2hdistance'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $PKARR['h2hdistance'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }
    if ((!empty($PKARR['height']) || (!empty($height)))) {
        if (empty($PKARR['height'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $PKARR['height'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }
    if ((!empty($PKARR['weight']) || (!empty($weight)))) {
        if (empty($PKARR['weight'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $PKARR['weight'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }


// 主诊断
    if ((!empty($PKARR['diagnosis_unilateral_cleft_lip_1']) || (!empty($mains)))) {
        if (empty($PKARR['diagnosis_unilateral_cleft_lip_1'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if (empty($PKARR['diagnosis_unilateral_cleft_lip'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if (empty($PKARR['diagnosis_bilateral_cleft_lip_2'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if (empty($PKARR['diagnosis_bilateral_cleft_lip'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if (empty($PKARR['CleftPalate'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if (empty($PKARR['complete_main'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if (empty($PKARR['incomplete'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if (empty($PKARR['complete_main'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if (empty($PKARR['complete'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if (empty($PKARR['BoneGraft_main'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if (empty($PKARR['BoneGraft_select'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }


    if ((!empty($PKARR['Combined_with_other_craniofacial_disorders']) || (!empty($Combined_with_other_craniofacial_disorders)))) {
        if (empty($PKARR['Combined_with_other_craniofacial_disorders_text'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $PKARR['Combined_with_other_craniofacial_disorders_text'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }


    if ((!empty($PKARR['Cleft_lip_and_palate_surgery']) || (!empty($Cleft_lip_and_palate_surgery)))) {

        if(empty($PKARR['beforeSurgery_1'])){
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if(empty($PKARR['beforeSurgery_2'])){
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if(empty($PKARR['beforeSurgery_3'])){
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }

        if(empty($PKARR['beforeSurgery_4'])){
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if(empty($PKARR['beforeSurgery_5'])){
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if(empty($PKARR['beforeSurgery_6'])){
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if(empty($PKARR['beforeSurgery_7'])){
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if(empty($PKARR['beforeSurgery_8'])){
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if(empty($PKARR['beforeSurgery_9'])){
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if(empty($PKARR['beforeSurgery_10'])){
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if(empty($PKARR['beforeSurgery_11'])){
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = "●";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
        if(empty($PKARR['beforeSurgery_other'])){
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $PKARR['beforeSurgery_other_reason'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    } else {

    }

    if ((!empty($PKARR['familyMembers']) || (!empty($familyMembers)))) {
        if (empty($PKARR['familyMembers'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $PKARR['familyMembers'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }
    if ((!empty($PKARR['fatherAge']) || (!empty($fatherAge)))) {
        if (empty($PKARR['fatherAge'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $PKARR['fatherAge'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }
    if ((!empty($PKARR['fatherProfession_main']) || (!empty($fatherProfession_main)))) {
        if (empty($PKARR['fatherProfession_main'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $PKARR['fatherProfession_main'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }
    if ((!empty($PKARR['fatherProfession']) || (!empty($fatherProfession)))) {
        if (empty($PKARR['fatherProfession'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $PKARR['fatherProfession'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }
    if ((!empty($PKARR['motherAge']) || (!empty($motherAge)))) {
        if (empty($PKARR['motherAge'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $PKARR['motherAge'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }
    if ((!empty($PKARR['motherProfession_main']) || (!empty($motherProfession_main)))) {
        if (empty($PKARR['motherProfession_main'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $PKARR['motherProfession_main'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }
    if ((!empty($PKARR['motherProfession']) || (!empty($motherProfession)))) {
        if (empty($PKARR['motherProfession'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $PKARR['motherProfession'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }
    if ((!empty($PKARR['descriptionCaseFamily']) || (!empty($descriptionCaseFamily)))) {
        if (empty($PKARR['descriptionCaseFamily'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $PKARR['descriptionCaseFamily'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }
    if ((!empty($PKARR['mainSourceofIncome']) || (!empty($mainSourceofIncome)))) {
        if (empty($PKARR['mainSourceofIncome'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $PKARR['mainSourceofIncome'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }
    if ((!empty($PKARR['income']) || (!empty($income)))) {
        if (empty($PKARR['income'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $PKARR['income'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }
    if ((!empty($PKARR['fixedExpenditure1']) || (!empty($fixedExpenditure)))) {
        if (empty($PKARR['fixedExpenditure1'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $PKARR['fixedExpenditure1'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }

        if (empty($PKARR['fixedExpenditure2'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $PKARR['fixedExpenditure2'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }

        if (empty($PKARR['fixedExpenditure3'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $PKARR['fixedExpenditure3'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }

        if (empty($PKARR['fixedExpenditure4'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $PKARR['fixedExpenditure4'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }
    }

    if ((!empty($PKARR['extimatedExpenditures']) || (!empty($extimatedExpenditures)))) {
        if (empty($PKARR['extimatedExpenditures'])) {
            $ArrayData = "-";
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        } else {
            $ArrayData = $PKARR['extimatedExpenditures'];
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
            $VNum += 1;
        }

        $ArrayData = $PKARR['extimatedExpenditures'];
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($VNum, $HNum, $ArrayData);
        $VNum += 1;
    }
    $HNum += 1;
}
//*********************************** PK 資料寫入區  End ****************************************************



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