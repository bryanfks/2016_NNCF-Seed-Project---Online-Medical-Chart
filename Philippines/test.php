<?PHP
	$flownum = 1234;
	
	if($flownum < 10){
		$flo_code = "000".$flownum;
	}elseif($flownum < 100){
		$flo_code = "00".$flownum;
	}elseif($flownum < 1000){
		$flo_code = "0".$flownum;
	}elseif($flownum < 10000){
		$flo_code = $flownum;
	}
	
	echo $flo_code;


?>