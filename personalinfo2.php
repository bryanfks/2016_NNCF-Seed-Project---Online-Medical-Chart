
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Personal Information</title>
        <link rel="stylesheet" href="../css/selectBar.css">
        <link rel="stylesheet" href="../css/personalInfoContent.css">
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
            <div><?PHP include('selectBar.php'); <?></div>
        </nav>
        <section>
            <div class="layer1"><?PHP include('personalInfoContent.php'); <?></div>
        </section>
        <footer>
            <div>The  Web  Best  Browse  Mode ： Internet Explorer 9 (Or Update)  /  800 x 600  Resolution<br>
                Copyright © 2006~2016  <a href="http://www.nncf.org/" target="_blank">Noordhoff  Craniofacial  Foundation</a></div>
        </footer>
    </body>
</html>
<?PHP
/*
    }else{
        echo "<Script Language='JavaScript'>";
        echo "alert('抱歉您現在無權限讀取,請先登入')\;";
        echo " location.href=\'login.php\'\;";
        echo " </Script>";
    }
    */
?>