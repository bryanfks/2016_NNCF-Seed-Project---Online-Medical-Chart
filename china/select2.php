<div align="center">
  <center>
  <table border="0" cellpadding="0" cellspacing="0" width="760">
    <tr>
      <td width="100%" height="1">
        
          <tr>
            <td width="100%" align="center" height="29">
              <div align="center">
                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                  <tr>
                    <td width="20%" align="center">
                      <font size="3" face="Arial">
                        <select size="1" name="select1" onChange="location = this.options[this.selectedIndex].value;">
                            <option value="#" selected>病历管理</option>
                                <?  
                                  //if($idchk1 = "cn") echo "<option value='http://www.seed-nncf.org/china/searchList.php'>查询 患者补助申请表</option>"; 
                                  if($idchk1 = "cn") echo "<option value='http://www.seed-nncf.org/china/src-record.php'>查询 患者补助申请表</option>"; 
                                ?>
                                <option value="http://www.seed-nncf.org/china/for-pla-add-china-search.php">新增 患者补助申请表</option>
                          </select>
                        </font>
                    </td>
                    <td width="20%" align="center"><font size="3" face="Arial"><select size="1" name="select2" onChange="location = this.options[this.selectedIndex].value;">
                        <option value="#" selected>Other Function</option>
                        <!-- <option value="oth-acc-rev.php">Edit Personal Info</option> -->
                        <option value="http://www.seed-nncf.org/china/oth-acc-inf.php">Edit Personal Info</option>
                      </select></font></td>
                    </td>
                    <td width="20%" align="center"></td>
                    <td width="20%" align="center"><font size="3" face="Arial">
                   
                    </font></td>
                    <td width="20%" align="center"><font size="3" face="Arial"><input type="button" value="LOGOUT" name="logout" onClick="javascript:location.href='logout.php'"></font></td>
                  </tr>
                </table>
              </div>
            </td>
          </tr>
      </tr>
  </table>
  </center>
</div>