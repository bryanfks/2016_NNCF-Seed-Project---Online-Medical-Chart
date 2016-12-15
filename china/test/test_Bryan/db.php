<?PHP
	
	$DBHOST = "db01.coowo.com:3340";
	$DBUSER = "seed-nncf.org";
	$DBPWD  = "g233a03i6ns";
	$DBNAME = "seed-nncforg";
	$db = mysql_connect("$DBHOST","$DBUSER","$DBPWD");
	@mysql_select_db($DBNAME);
	
?>
