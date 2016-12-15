<?PHP
	/*
	$DBHOST = "db01.coowo.com:3340";
	$DBUSER = "seed-nncf.org";
	$DBPWD  = "g233a03i6ns";
	$DBNAME = "seed-nncforg";
	$db = mysql_connect("$DBHOST","$DBUSER","$DBPWD");
	@mysql_select_db($DBNAME);
	*/
	$DBHOST = "db01.coowo.com:3340";
	$DBUSER = "seed-nncf.org";
	$DBPWD  = "g233a03i6ns"; 
	$DBNAME = "seed-nncforg";
	$db = mysql_connect("$DBHOST","$DBUSER","$DBPWD");
	//$db = mysql_connect("db01.coowo.com:3340","seed-nncf.org","g233a03i6ns");
	@mysql_query('SET NAMES UTF8');
	@mysql_select_db($DBNAME);
?>
