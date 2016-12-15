<html>
	<head>
		<title>Testing Disabled fun.</title>
		<SCRIPT language="Javascript">
			<!--
				function Indata2_onchange() {
					//onLoad="return Indata2_onchange()"
					if(document.myform.nationality.options.value == "OTHER"){
						document.myform.nationalitys.disabled = false;
					}else{
						document.myform.nationalitys.disabled = true;
					}
				}
				
				function Indata3_onchange() {
					//if(window.event.srcElement.options[window.event.srcElement.selectedIndex].text == 'Other'){
					if(document.myform.hospital.options.value == "OTHER"){
						document.myform.hospitals.disabled = false;
					}else{
						document.myform.hospitals.disabled = true;
					}
				}
			//-->
		</SCRIPT>
	</head>
	<body>
		<form name="myform">
		 <tr>
                    <td width="20%" style="border-top: 1 solid #C0C0C0" height="24">
                      <p style="line-height: 200%"><font size="2"><font color="#666666" face="Arial">&nbsp;Nationality of birth</font><font color="#666666">¡G</font></font></td>
                    <td width="80%" style="border-top: 1 solid #C0C0C0" height="24" colspan="2" bgcolor="#F7E3AD">
                      <p style="line-height: 200%">
                        <font size="2">
                        <font color="#666666"><select size="1" name="nationality" onChange="return Indata2_onchange()">
                          <option value="" selected>Please select...</option>
                        </font>
                        <font face="Arial" size="3" color="#666666">
                          <option value="CAM" <? if($nat == "Cambodia"){ echo "SELECTED"; }?>>Cambodia</option>
                          <option value="VIE" <? if($nat == "Vietnam"){ echo "SELECTED"; }?>>Vietnam</option>
                          <option value="PHI" <? if($nat == "Philippines"){ echo "SELECTED"; }?>>Philippines</option>
                          <option value="CHI" <? if($nat == "China"){ echo "SELECTED"; }?>>China</option>
                          <option value="MYA" <? if($nat == "Myanmar"){ echo "SELECTED"; }?>>Myanmar</option>
                          <option value="IND" <? if($nat == "India"){ echo "SELECTED"; }?>>India</option>
                          <option value="INS" <? if($nat == "Indonesia"){ echo "SELECTED"; }?>>Indonesia</option>
                          <option value="PAK" <? if($nat == "Pakistan"){ echo "SELECTED"; }?>>Pakistan</option>
                          <option value="DOM" <? if($nat == "Dominican Republic"){ echo "SELECTED"; }?>>Dominican Republic</option>
                          <option value="OTHER" <? if(($nat != "Cambodia") && ($nat != "Vietnam") && ($nat != "Philippines") && ($nat != "China") && ($nat != "Myanmar") && ($nat != "India") && ($nat != "Indonesia") && ($nat != "Pakistan") && ($nat != "Dominican Republic") && ($nat != "")){ echo "SELECTED"; }?>>Other</option>
                        </font>
                        </select><input type="text" size="50" name="nationalitys" value="" disabled></font></td>
                  </tr>
                  <tr>
                    <td width="20%" style="border-top: 1 solid #C0C0C0" height="25">
                      <p style="line-height: 200%"><font size="2"><font color="#666666" face="Arial">&nbsp;For present institute /<br> &nbsp; Hospital</font><font color="#666666">¡G</font></font></td>               
                    <td width="80%" style="border-top: 1 solid #C0C0C0" height="25" colspan="2" bgcolor="#F7E3AD">
                      <p style="line-height: 200%">
                        <font size="2">
                        <font color="#666666"><select size="1" name="hospital" onChange="return Indata3_onchange()">
                          <option value="" <? if($result['hospital'] == ""){ echo "selected"; }?> >Please select...</option>
                        </font>
                        <font face="Arial" size="3" color="#666666">
                          <option value="NPH" <? if($result['hospital'] == "National pediatric hospital (NPH)"){ echo "selected"; }?> >National pediatric hospital (NPH)</option>
                          <option value="OTHER" <? if($result['hospital'] != "National pediatric hospital (NPH)"){ echo "selected"; }?> >Other</option>
                        </font>
                        </select><input type="text" name="hospitals" size="50" value="" disabled></font></td>
                  </tr>
		
		
		
		
		
		
		</form>
	</body>
</html>