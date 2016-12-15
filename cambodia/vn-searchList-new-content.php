<div class="Content-Title">
    <table style="text-align: center; " class="Content-Title-2">
        <tr>
            <td style="vertical-align:middle;" class="TitleBar">
                <b>Search Patient</b>
            </td>
        </tr>
    </table>
</div>
<!-- Search List --> 
<div class="HospitalData">
    <table class="DiagnosisForm">
        <tr align="center">
            <td>Subsidy Number(NCF)</td>
            <td>NCF Number</td>
            <td>Name</td>
            <td>Hospital</td>
            <td>Patient Record Number(Hospital)</td>
            <td>Status</td>
            <td style="width: 130px;"></td>
        </tr>
        <tr>
            <?PHP
                $SelCode = "SELECT * FROM `patient-vn-record` ORDER BY `NCFMedicalNum` DESC";
                $QueryCode = mysql_query($SelCode);
                
                $i = 1;
                while($ResData = mysql_fetch_array($QueryCode)){
                        $SelVNPinfo = "SELECT * FROM `patient-vn` WHERE `NCFID`='".$ResData['NCFID']."'";
                        $QueryVNPinfo = mysql_query($SelVNPinfo);
                        $ResVNPinfo = mysql_fetch_array($QueryVNPinfo);
                        //echo $selChinaPatientinfo."<br/>";


                        $remarks = $ResData["remark"];
                        if($remarks == "0" || $remarks == 0){
                            $remark2 = "Waiting for Approval";
                        }else if($remarks == "1" || $remarks == 1){
                            $remark2 = "Incomplete";
                        }else if($remarks == "2" || $remarks == 2){
                            $remark2 = "Complete";
                        }
                        echo "<tr>";
                            echo "<td width='16%' align='center' valign='middle'>".$ResData["NCFMedicalNum"]."</td>";
                            echo "<td width='16%' align='center' valign='middle'>".$ResData["NCFID"]."</td>";
                            echo "<td width='17%' align='center' valign='middle'>".$ResVNPinfo["name"]."</td>";
                            echo "<td width='17%' align='center' valign='middle'>".$ResVNPinfo["school"]."</td>";
                            echo "<td width='17%' align='center' valign='middle'>".$ResVNPinfo["MedicalRecordNumber"]."</td>";
                            echo "<td width='17%' align='center' valign='middle'>".$remark2."</td>";
                            $values = $ResData['num'];
                            echo "<td width='17%' align='center' valign='middle'><font size='3'><input type='button' value='Enter' name='search' onClick='fetch_Data(".$values.")'></font></td>";
                        echo "</tr>";
                        //echo $i."<br/>";
                        $i++;
                }
            ?>
        </tr>
        <tr>
            <td>
                <p><input type="button" name="addNewRecord" value="Add New Patient" onClick="return addData()"></p>
            </td>
        </tr>
    </table>
</div>
