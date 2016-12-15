<?php

// session_start();
// include('db.php');
include('db_design.php');

require_once 'PHPExcel.php';    //引入 PHPExcel 物件庫
require_once 'PHPExcel/IOFactory.php';    //引入 PHPExcel_IOFactory 物件庫
require_once 'PHPExcel/Reader/Excel5.php' ;

/*
 * 判斷是否已經登入
 */

//    $seid = $_SESSION["seid"];
//    $sepwd = $_SESSION["sepwd"];
//    if(!empty($seid) && !empty($sepwd)){




/*
1. 取得 personalinfoContent 中勾選的參數值
2. 判斷 參數值是第一項次或續項次 
3. 搜尋 資料庫 patient-china -> KHpatient -> PKpatient 的病患個人資料
4. 輸出 匯出 勾選的項目與數值 並 存成 Excel 檔

取消：回到 main 頁
匯出後，畫面停留在 personalinfo 

MySQL 輸出 -> 匯出成 Excel 
=> 
1. 建立新 Excel 檔案 （考慮是否採用單一Excel檔案）
2. 開啟 Excel 檔 
	fopen
3. 依序寫入 china -> KH -> PK 資料
4. 關閉檔案
*/



/*
 * 初始值設定：被勾選項目
 */
$codeSQL = "";


/*
 * 初始值設定：計算 Select 被勾選數量
 */
$SelectItem = 0;


/*
 * 初始設定：用於儲存對應 Excel 欄位用之陣列變數
 */
$SelectItemArray = array();


/*
 * 初始值設定：用陣列方式儲存 Select 項目欄位名稱
 */
$SelItmName = array();


/*
 * 医院名称
 */
if ($_POST['school'] == 1) {
	$codeSQL .= "`school`";
	$SelectItem += 1;
	$SelItmName[] = "school";
}

/*
 * 接案日期
 */
if ($_POST['casedays'] == 1) {
	if (!empty($codeSQL)) {
		$codeSQL .= ", `caseYear`, `caseMonth`, `caseDay`";
	} else {
		$codeSQL .= "`caseYear`, `caseMonth`, `caseDay`";
	}
	$SelectItem += 3;
	$SelItmName[] = "caseYear";
	$SelItmName[] = "caseMonth";
	$SelItmName[] = "caseDay";
}
if ($_POST['surgeryDrName'] == 1){
	if (!empty($codeSQL)) {
		$codeSQL .= ", `surgeryDrName`";
	} else {
		$codeSQL .= "`surgeryDrName`";
	}
	$SelectItem += 1;
	$SelItmName[] = "surgeryDrName";
}
if ($_POST['languageTherapist'] == 1) {
	if (!empty($codeSQL)) {
		$codeSQL .= ", `languageTherapist`";
	} else {
		$codeSQL .= "`languageTherapist`";
	}
	$SelectItem += 1;
	$SelItmName[] = "languageTherapist";
}
if ($_POST['orthodontics'] == 1) {
	if (!empty($codeSQL)) {
		$codeSQL .= ", `orthodontics`";
	} else {
		$codeSQL .= "`orthodontics`";
	}
	$SelectItem += 1;
	$SelItmName[] = "orthodontics";
}

if ($_POST['idno'] == 1) {
	if (!empty($codeSQL)) {
		$codeSQL .= ", `idno`";
	} else {
		$codeSQL .= "`idno`";
	}
	$SelectItem += 1;
	$SelItmName[] = "idno";
}
if ($_POST['MedicalRecordNumber'] == 1) {
	if (!empty($codeSQL)) {
		$codeSQL .= ", `MedicalRecordNumber`";
	} else {
		$codeSQL .= "`MedicalRecordNumber`";
	}
	$SelectItem += 1;
	$SelItmName[] = "MedicalRecordNumber";
}
if ($_POST['name'] == 1) {
	if (!empty($codeSQL)) {
		$codeSQL .= ", `name`";
	} else {
		$codeSQL .= "`name`";
	}
	$SelectItem += 1;
	$SelItmName[] = "name";
}
if ($_POST['gender'] == 1) {
	if (!empty($codeSQL)) {
		$codeSQL .= ", `gender`";
	} else {
		$codeSQL .= "`gender`";
	}
	$SelectItem += 1;
	$SelItmName[] = "gender";
}
if ($_POST['birthdays'] == 1) {
	if (!empty($codeSQL)) {
		$codeSQL .= ", `birthYear`, `birthMonth`, `birthDay`";
	} else {
		$codeSQL .= "`birthYear`, `birthMonth`, `birthDay`";
	}
	$SelectItem += 3;
	$SelItmName[] = "birthYear";
	$SelItmName[] = "birthMonth";
	$SelItmName[] = "birthDay";
}
if ($_POST['profession'] == 1) {
	if (!empty($codeSQL)) {
		$codeSQL .= ", `profession`";
	} else {
		$codeSQL .= "`profession`";
	}
	$SelectItem += 1;
	$SelItmName[] = "profession";
}
if ($_POST['tel'] == 1) {
	if (!empty($codeSQL)) {
		$codeSQL .= ", `tel`";
	} else {
		$codeSQL .= "`tel`";
	}
	$SelectItem += 1;
	$SelItmName[] = "tel";
}
if ($_POST['education'] == 1) {
	if (!empty($codeSQL)) {
		$codeSQL .= ", `education`";
	} else {
		$codeSQL .= "`education`";
	}
	$SelectItem += 1;
	$SelItmName[] = "education";
}
if ($_POST['address'] == 1) {
	if (!empty($codeSQL)) {
		$codeSQL .= ", `address`";
	} else {
		$codeSQL .= "`address`";
	}
	$SelectItem += 1;
	$SelItmName[] = "address";
}
if ($_POST['contactperson'] == 1) {
	if (!empty($codeSQL)) {
		$codeSQL .= ", `contactperson`";
	} else {
		$codeSQL .= "`contactperson`";
	}
	$SelectItem += 1;
	$SelItmName[] = "contactperson";
}
if ($_POST['relationship'] == 1) {
	if (!empty($codeSQL)) {
		$codeSQL .= ", `relationship`";
	} else {
		$codeSQL .= "`relationship`";
	}
	$SelectItem += 1;
	$SelItmName[] = "relationship";
}
if ($_POST['phone'] == 1) {
	if (!empty($codeSQL)) {
		$codeSQL .= ", `phone`";
	} else {
		$codeSQL .= "`phone`";
	}
	$SelectItem += 1;
	$SelItmName[] = "phone";
}
if ($_POST['cellphone'] == 1) {
	if (!empty($codeSQL)) {
		$codeSQL .= ", `cellphone`";
	} else {
		$codeSQL .= "`cellphone`";
	}
	$SelectItem += 1;
	$SelItmName[] = "cellphone";
}
if ($_POST['h2hdistance'] == 1) {
	if (!empty($codeSQL)) {
		$codeSQL .= ", `h2hdistance`";
	} else {
		$codeSQL .= "`h2hdistance`";
	}
	$SelectItem += 1;
	$SelItmName[] = "h2hdistance";
}
if ($_POST['height'] == 1) {
	if (!empty($codeSQL)) {
		$codeSQL .= ", `height`";
	} else {
		$codeSQL .= "`height`";
	}
	$SelectItem += 1;
	$SelItmName[] = "height";
}
if ($_POST['weight'] == 1) {
	if (!empty($codeSQL)) {
		$codeSQL .= ", `weight`";
	} else {
		$codeSQL .= "`weight`";
	}
	$SelectItem += 1;
	$SelItmName[] = "weight";
}

/*  主診斷
* diagnosis_unilateral_cleft_lip_1 == UCL
* diagnosis_unilateral_cleft_lip == C, IC, CK
*
* diagnosis_bilateral_cleft_lip_2 == BCL
* diagnosis_bilateral_cleft_lip == C, IC, MCK
*
* CleftPalate == CP
* complete_main == IC
* incomplete == SCC, CU, SP, BC
* complete_main == C
* complete == U, B
* BoneGraft_main == BoneGraft
* BoneGraft_select == C, IC, CK
*
*/
if (!empty($_POST['mains']) && ($_POST['mains'] == 1)) {
	if (!empty($codeSQL)) {
		$codeSQL .= ", `diagnosis_unilateral_cleft_lip_1`, `diagnosis_unilateral_cleft_lip`, `diagnosis_bilateral_cleft_lip_2`, `diagnosis_bilateral_cleft_lip`, `CleftPalate`, `complete_main`, `incomplete`, `complete_main`, `complete`, `BoneGraft_main`, `BoneGraft_select`";
	} else {
		$codeSQL .= "`diagnosis_unilateral_cleft_lip_1`, `diagnosis_unilateral_cleft_lip`, `diagnosis_bilateral_cleft_lip_2`, `diagnosis_bilateral_cleft_lip`, `CleftPalate`, `complete_main`, `incomplete`, `complete_main`, `complete`, `BoneGraft_main`, `BoneGraft_select`";
	}
	$SelectItem += 11;
	$SelItmName[] = "diagnosis_unilateral_cleft_lip_1";
	$SelItmName[] = "diagnosis_unilateral_cleft_lip";
	$SelItmName[] = "diagnosis_bilateral_cleft_lip_2";
	$SelItmName[] = "diagnosis_bilateral_cleft_lip";
	$SelItmName[] = "CleftPalate";
	$SelItmName[] = "complete_main";
	$SelItmName[] = "incomplete";
	$SelItmName[] = "complete_main";
	$SelItmName[] = "complete";
	$SelItmName[] = "BoneGraft_main";
	$SelItmName[] = "BoneGraft_select";
}
if (!empty($_POST['Combined_with_other_craniofacial_disorders']) && ($_POST['Combined_with_other_craniofacial_disorders'] == 1)) {
	if (!empty($codeSQL)) {
		$codeSQL .= ", `Combined_with_other_craniofacial_disorders`";
	} else {
		$codeSQL .= "`Combined_with_other_craniofacial_disorders`";
	}
	$SelectItem += 1;
	$SelItmName[] = "Combined_with_other_craniofacial_disorders";
}
if (!empty($_POST['Cleft_lip_and_palate_surgery']) && ($_POST['Cleft_lip_and_palate_surgery'] == 1)) {
	if (!empty($codeSQL)) {
		$codeSQL .= ", `Cleft_lip_and_palate_surgery`";
	} else {
		$codeSQL .= "`Cleft_lip_and_palate_surgery`";
	}
	$SelectItem += 1;
	$SelItmName[] = "Cleft_lip_and_palate_surgery";
}
if (!empty($_POST['beforeSurgery_other']) && ($_POST['beforeSurgery_other'] == 1)) {
	if (!empty($codeSQL)) {
		$codeSQL .= ", `beforeSurgery_other`";
	} else {
		$codeSQL .= "`beforeSurgery_other`";
	}
	$SelectItem += 1;
	$SelItmName[] = "beforeSurgery_other";
}
if (!empty($_POST['familyMembers']) && ($_POST['familyMembers'] == 1)) {
	if (!empty($codeSQL)) {
		$codeSQL .= ", `familyMembers`";
	} else {
		$codeSQL .= "`familyMembers`";
	}
	$SelectItem += 1;
	$SelItmName[] = "familyMembers";
}
if (!empty($_POST['fatherAge']) && ($_POST['fatherAge'] == 1)) {
	if (!empty($codeSQL)) {
		$codeSQL .= ", `fatherAge`";
	} else {
		$codeSQL .= "`fatherAge`";
	}
	$SelectItem += 1;
	$SelItmName[] = "fatherAge";
}
if (!empty($_POST['fatherProfession_main']) && ($_POST['fatherProfession_main'] == 1)) {
	if (!empty($codeSQL)) {
		$codeSQL .= ", `fatherProfession_main`";
	} else {
		$codeSQL .= "`fatherProfession_main`";
	}
	$SelectItem += 1;
	$SelItmName[] = "fatherProfession_main";
}
if (!empty($_POST['fatherProfession']) && ($_POST['fatherProfession'] == 1)) {
	if (!empty($codeSQL)) {
		$codeSQL .= ", `fatherProfession`";
	} else {
		$codeSQL .= "`fatherProfession`";
	}
	$SelectItem += 1;
	$SelItmName[] = "fatherProfession";
}
if (!empty($_POST['motherAge']) && ($_POST['motherAge'] == 1)) {
	if (!empty($codeSQL)) {
		$codeSQL .= ", `motherAge`";
	} else {
		$codeSQL .= "`motherAge`";
	}
	$SelectItem += 1;
	$SelItmName[] = "motherAge";
}
if (!empty($_POST['motherProfession_main']) && ($_POST['motherProfession_main'] == 1)) {
	if (!empty($codeSQL)) {
		$codeSQL .= ", `motherProfession_main`";
	} else {
		$codeSQL .= "`motherProfession_main`";
	}
	$SelectItem += 1;
	$SelItmName[] = "motherProfession_main";
}
if (!empty($_POST['motherProfession']) && ($_POST['motherProfession'] == 1)) {
	if (!empty($codeSQL)) {
		$codeSQL .= ", `motherProfession`";
	} else {
		$codeSQL .= "`motherProfession`";
	}
	$SelectItem += 1;
	$SelItmName[] = "motherProfession";
}
if (!empty($_POST['descriptionCaseFamily']) && ($_POST['descriptionCaseFamily'] == 1)) {
	if (!empty($codeSQL)) {
		$codeSQL .= ", `descriptionCaseFamily`";
	} else {
		$codeSQL .= "`descriptionCaseFamily`";
	}
	$SelectItem += 1;
	$SelItmName[] = "descriptionCaseFamily";
}
if (!empty($_POST['mainSourceofIncome']) && ($_POST['mainSourceofIncome'] == 1)) {
	if (!empty($codeSQL)) {
		$codeSQL .= ", `mainSourceofIncome`";
	} else {
		$codeSQL .= "`mainSourceofIncome`";
	}
	$SelectItem += 1;
	$SelItmName[] = "mainSourceofIncome";
}
if (!empty($_POST['income']) && ($_POST['income'] == 1)) {
	if (!empty($codeSQL)) {
		$codeSQL .= ", `income`";
	} else {
		$codeSQL .= "`income`";
	}
	$SelectItem += 1;
	$SelItmName[] = "income";
}
if (!empty($_POST['fixedExpenditure']) && ($_POST['fixedExpenditure'] == 1)) {
	if (!empty($codeSQL)) {
		$codeSQL .= ", `fixedExpenditure1`, `fixedExpenditure2`, `fixedExpenditure3`, `fixedExpenditure4`";
	} else {
		$codeSQL .= "`fixedExpenditure1`, `fixedExpenditure2`, `fixedExpenditure3`, `fixedExpenditure4`";
	}
	$SelectItem += 4;
	$SelItmName[] = "fixedExpenditure1";
	$SelItmName[] = "fixedExpenditure2";
	$SelItmName[] = "fixedExpenditure3";
	$SelItmName[] = "fixedExpenditure4";
}
if (!empty($_POST['extimatedExpenditures']) && ($_POST['extimatedExpenditures'] == 1)) {
	if (!empty($codeSQL)) {
		$codeSQL .= ", `extimatedExpenditures`";
	} else {
		$codeSQL .= "`extimatedExpenditures`";
	}
	$SelectItem += 1;
	$SelItmName[] = "extimatedExpenditures";
}



/*
 * 顯示： 統計被勾選的項目數量 =>>> $SelectItem
 */
echo "勾選項目總數: ".$SelectItem."<br><br>";



/*
 * 顯示：Select 項目名稱
 */
for ($SelLoopNum = 0; $SelLoopNum <= $SelectItem; $SelLoopNum++){
	echo $SelItmName[$SelLoopNum]."<br><br>";
}



// 顯示： 陣列
//echo $SelectItemArray;



/*
 * 動作：
 * 1. 取得勾選項目總數量
 * 2. 利用 for 迴圈加 ASCII A~Z = 65~90 來處理 Excel 欄位值
 */



/*
 * 初始值：勾選項目->陣列運算用流水號
 */
$ArraysNum = 0;



/*
 * ASCII + 總Select欄位數 運用於迴圈計算
 */
$MaxSelectItem = 64 + $SelectItem;
//echo "Max Select Item: ".$MaxSelectItem."<br><br>";


/*
 * 製作存放 Excel 第一欄欄位值用  例如：A1,B1 ... ZZ1
 * 目前字母上限到 Z 為止，但設計上限為 60 欄
 */
for ($SelArrayRows = 65; $SelArrayRows <= $MaxSelectItem; $SelArrayRows++) {

	// 當欄位數大於 90(Z) 時，須變更為 AA, AB, AC ...
	if (($SelArrayRows > 90) && ($SelArrayRows < 116)) {
		$TmpASCII = $SelArrayRows - 90;    // 計算：算出第二代號號碼 ex:
		$NewASCII = 64 + $TmpASCII;    // 換算：換算第二代號 ASCII code
		$SecSelectItemArray = chr($NewASCII);    // 轉換：第二代號 ASCII CODE
		$ChrASCII = "A";
		$SelectItemArray[$ArraysNum] = $ChrASCII . $SecSelectItemArray . "1";    // 置入第二位代碼值 Ex: a[27]='AA1', a[28]='AB1'
	} elseif ($SelArrayRows >= 116) {
		$TmpASCII = $SelArrayRows - 115;    // 計算：算出第二代號號碼 ex:
		$NewASCII = 64 + $TmpASCII;    // 換算：換算第二代號 ASCII code
		$SecSelectItemArray = chr($NewASCII);    // 轉換：第二代號 ASCII CODE
		$ChrASCII = "B";
		$SelectItemArray[$ArraysNum] = $ChrASCII . $SecSelectItemArray . "1";    // 變更第一位代碼值 Ex: a[27]='BA1', a[28]='BB1'
	} else {
		$ChrASCII = chr($SelArrayRows);    // 轉換：數字 => ASCII
		$SelectItemArray[$ArraysNum] = $ChrASCII."1";    // 設定：對應 Excel 欄位位址用轉換  例如：65."1" => "A1" // 結果：a[0]='A1', a[1]='B1',...
	}
	echo $ChrASCII." -- ".$ArraysNum." -- Array Value: ".$SelectItemArray[$ArraysNum]."<br>";
	$ArraysNum++;
}

/*
 * 顯示 Excel 第一列（標題）值
 */
foreach ($SelectItemArray as $key => $value){
	echo "Key= ".$key." -- "."Value= ".$value."<br>";
}

/*
 * 將 Select 項目寫入陣列
 *
 */



/*
 * MySQL Query Data
 */

$fullSQL_CN = "SELECT ".$codeSQL." FROM `patient-china`";
$fullSQL_KH = "SELECT ".$codeSQL." FROM KHpatient";
$fullSQL_PK = "SELECT ".$codeSQL." FROM PKpatient";

echo "<br><br>".$fullSQL_CN."<br><br>";

$CN = mysql_query($fullSQL_CN);
$CNARR = mysql_fetch_array($CN);


$KH = mysql_query($fullSQL_KH);
$KHARR = mysql_fetch_array($KH);

$PK = mysql_query($fullSQL_PK);
$PKARR = mysql_fetch_array($PK);

//echo $CN."<br><br>".$KH."<br><br>".$PK."<br><br>";

//$ArrayPushs = array_merge($CNARR, $KHARR, $PKARR);
$countArray = mysql_num_rows($CN);

echo "總資料筆數: ".$countArray."<br><br>";



//---------- 以日期為首，當作檔案名稱 -----------//
$ExcelFiles = date('Ymd')."_SEED_NNCF.xls";



/*
 * 匯出 資料並寫入 Excel
 */
$objPHPExcel = new PHPExcel();  //實體化Excel

//建立工作表並指定名稱
$objPHPExcel->setActiveSheetIndex(0);  //設定預設顯示的工作表
$objActSheet = $objPHPExcel->getActiveSheet(); //指定預設工作表為 $objActSheet
$objActSheet->setTitle("線上病例個人資料");  //設定標題
$objPHPExcel->createSheet(); //建立新的工作表，上面那三行再來一次，編號要改



//指定儲存格內容(類型：TYPE_BOOL、TYPE_ERROR、TYPE_FORMULA、TYPE_INLINE、TYPE_NULL、TYPE_NUMERIC、TYPE_STRING)
$objActSheet->setCellValue("A1", '姓名')->setCellValue("B1", '電話');

for ($x=2; $x <= 10; $x++){
    $objActSheet->setCellValueExplicit("B".$x, $x,PHPExcel_Cell_DataType:: TYPE_STRING);
}

for ($j=2; $j<=10; $j++){
    $objActSheet->setCellValueExplicit("C".$j, $j,PHPExcel_Cell_DataType:: TYPE_STRING);
}



//調整儲存格欄寬
$objActSheet->getColumnDimension('A')->setWidth(8);  //固定寬度8
$objActSheet->getColumnDimension('B')->setAutoSize(true);  //自動寬度

//設定文字、儲存格樣式及對齊方向
//$objPHPExcel->getDefaultStyle()->getFont()->setName('標楷體');
$objPHPExcel->getDefaultStyle()->getFont()->setSize(16);
$objActSheet->getStyle('A1:I1')->getFill()->setFillType(PHPExcel_Style_Fill:: FILL_SOLID)->getStartColor()->setRGB('00DC71');

//---------- 產生動態檔案供下載 ----------//
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename='.$ExcelFiles);
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->setPreCalculateFormulas(false);
$objWriter->save('php://output');
exit;
?>

?>