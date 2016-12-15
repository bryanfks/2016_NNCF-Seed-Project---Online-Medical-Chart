<?PHP
    
    $seid = $_SESSION["seid"];
    $sepwd = $_SESSION["sepwd"];
    if(!empty($seid) && !empty($sepwd)){
    
    $select_member  =   "SELECT * FROM member WHERE id='".$seid."' AND pwd='".$sepwd."' ";
    $query_member   =   mysql_query($select_member);
    $result_member  =   mysql_fetch_array($query_member);
    $auth_member    =   $result_member['authority'];
    $auth_specialty =   $result_member['specialty'];
?>
<ul>
<li>
    <select size="1" name="select1" onChange="location = this.options[this.selectedIndex].value;">
        <option value="#" selected>Record Management</option>
        <!-- <option value="http://www.seed-nncf.org/rec-sea-pat.php">Search Patient</option> -->
        <option value="rec-sea-pat-nat.php">Search Patient</option> <!-- 2015-0427 修訂  -->
        <!-- <option value="rec-add-pat.php">Add Patient</option> -->
    </select>
</li>
<li>
    <select size="1" name="select2" onChange="location = this.options[this.selectedIndex].value;">
        <option value="#" selected>Other Function</option>
        <!-- <option value="oth-acc-rev.php">Edit Personal Info</option> -->
        <option value="statistics.php">统计功能（补助申请表）</option>
        <option value="personalinfo.php">个案基本资料汇出功能</option>
        <option value="oth-acc-inf.php">Edit Personal Info</option>
    </select>
</li>
<li>
    <?PHP 
        if(($auth_specialty == "ncfa") && ($auth_member == "a")){ 
            //echo "<select size='1' name='select4' onChange='javascript:location.href=this.options.value'>";
            echo "<select size='1' name='select4' onChange='location = this.options[this.selectedIndex].value;'>";
            echo "<option value='#' selected>System Management</option>";
            echo "<option value='http://www.seed-nncf.org/sys-add-acc.php'>Add Account</option>";
            echo "<option value='http://www.seed-nncf.org/sys-mai-acc.php'>Edit Account</option>";
            echo "<option value='http://www.seed-nncf.org/sys-del-acc.php'>Delete Account</option>";
            echo "<option value='http://www.seed-nncf.org/sys-set-mes.php'>Set Real-time message</option>";
            echo "<option value='http://www.seed-nncf.org/sys-assign.php'>Assign E-mail</option>";
            //echo "<option value='sys-del-pat.php'>Delete Patient</option>";
            echo "<option value='http://www.seed-nncf.org/sel-sys-del-pat.php'>Delete Patient</option>";
            echo "</select>";
        }
    ?>
</li>
<li>
    <input type="button" value="LOGOUT" name="logout" onClick="javascript:location.href='logout.php'">
</li>
</ul>
<?PHP
    }else{
        echo "<Script Language='JavaScript'>";
        echo "alert('抱歉您現在無權限讀取,請先登入');";
        echo " location.href='login.php';";
        echo " </Script>";
    }
?>