<?PHP
    session_start();
    $seid = $_SESSION["seid"];
    $sepwd = $_SESSION["sepwd"];
    if(isset($seid) && isset($sepwd)){
        include("db.php");
        include("db_design.php");
    //現在需要修改載入檔案 select.php 的類型為何
    //利用會員權限來判斷
    
    $select_member  =   "SELECT * FROM member WHERE id='".$seid."' AND pwd='".$sepwd."' ";
    $query_member   =   mysql_query($select_member);
    $result_member  =   mysql_fetch_array($query_member);
    $auth_member    =   $result_member["specialty"];


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Personal Information</title>
        <link rel="stylesheet" href="css/selectBarPinfo.css">
        <link rel="stylesheet" href="css/personalInfoContent.css">
        <Script>
            function cancels(){
                location.href='main.php';
            }
        </Script>
    </head>
    <body>
        <header>
            <div class="RealTimeMsg">
                <div class="RTMsg">
                    Welcome Sir.
                </div>
            </div>
        </header>
        <nav>
            <!-- 載入 選項列  -->
            <div><?PHP include('selectBar.php'); ?></div>
        </nav>
        <section>
            <!--  載入 個人資訊勾選表單  -->
            <div class="layer1"><?PHP include('personalInfoContent.php'); ?></div>
        </section>
        <footer>
            <div>The  Web  Best  Browse  Mode ： Internet Explorer 9 (Or Update)  /  800 x 600  Resolution<br>
                Copyright © 2006~2016  <a href="http://www.nncf.org/" target="_blank">Noordhoff  Craniofacial  Foundation</a></div>
        </footer>
    </body>
</html>
<?PHP
     }else{
         echo "<Script Language='JavaScript'>";
         echo "alert('抱歉您現在無權限讀取,請先登入')\;";
         echo " location.href=\'login.php\'\;";
         echo " </Script>";
     }
?>