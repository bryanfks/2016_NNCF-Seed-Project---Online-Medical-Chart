<?PHP
    session_start();
    include 'db.php';
    $seid = $_SESSION["seid"];

    $sel_msg = "SELECT * FROM message";
    $query_msg = mysql_query($sel_msg);
    $result_msg = mysql_fetch_array($query_msg);
    $StrMessage = $result_msg['msg1'];
    echo $StrMessage."<br>";
 ?>
<div align="center">
  <center>
  <table border="0" cellpadding="0" cellspacing="0" width="760" background="images/top-3.gif">
    <tr>
      <td width="100%">
        <div align="center">
          <table border="0" cellpadding="0" cellspacing="0" width="100%" height="110">
            <tr>
              <td width="25%" valign="top" height="36"></td>
              <td width="44%" valign="top" height="36"></td>
              <td width="29%" height="36" align="left" valign="top">
                <p style="line-height: 100%"><font size="3">
                <font face="Arial">
                <br>
                <br>
                Hi ! <?PHP echo $seid; ?>&nbsp; :<br>    
                </font><font face="Arial"><? echo $StrMessage; ?> 
                </font></font></td>
              <td width="2%" valign="top" height="36"></td>
            </tr>
          </table>
        </div>
      </td>
    </tr>
  </table>
  </center>
</div>