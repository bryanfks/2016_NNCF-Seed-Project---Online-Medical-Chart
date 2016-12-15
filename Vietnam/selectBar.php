<ul>
    <li>
        <select size="1" name="select1" onChange="location = this.options[this.selectedIndex].value;">
            <option value="#" selected>Patient Record Management</option>
            <option value="http://www.seed-nncf.org/Vietnam/vn-searchList.php">List of Application</option>
            <option value="http://www.seed-nncf.org/Vietnam/vn-searchpage.php">Add New Application</option>
        </select> 
    </li>
    <li>
        <select size="1" name="select2" onChange="location = this.options[this.selectedIndex].value;">
            <option value="#" selected>Other Function</option>
            <!-- <option value="oth-acc-rev.php">Edit Personal Info</option> -->
            <!-- <option value="statistics.php">统计功能（补助申请表）</option>
            <option value="personalinfo">个案基本资料汇出功能</option> -->
            <option value="oth-acc-inf.php">Edit Personal Info</option>
        </select>
    </li>
    <!-- <li>
        <select size='1' name='select4' onChange='location = this.options[this.selectedIndex].value;'>"
            <option value='#' selected>System Management</option>
            <option value='sys-add-acc.php'>Add Account</option>
            <option value='sys-mai-acc.php'>Edit Account</option>
            <option value='sys-del-acc.php'>Delete Account</option>
            <option value='sys-set-mes.php'>Set Real-time message</option>
            <option value='sys-assign.php'>Assign E-mail</option>
            <option value='sys-del-pat.php'>Delete Patient</option>
            <option value='sel-sys-del-pat.php'>Delete Patient</option>
        </select>
        </li>-->
    <li>
        <input type="button" value="LOGOUT" name="logout" onClick="javascript:location.href='logout.php'">
    </li>
</ul>