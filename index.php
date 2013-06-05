<?php
	include "includes/libpaste.php";
	$arg=get_id($_SERVER["REQUEST_URI"]);
	if($arg!=""){

		$connect=mysql_connect("localhost","root","fooxkcdpgh") ;
		if($connect)
		{
			mysql_select_db("glupaste");

			$inputquery="select * from record where id='$arg';";
			$arr= mysql_query( $inputquery);
			$row = mysql_fetch_array($arr);
			$lang= $row['lang'];
            		$author = $row['author'];
            		$title = $row['title'];
            		$dd = $row['c_date'];
			echo "<body>";
			include_once "includes/header.php";
			echo "<center><h2>Paste #$arg </h2></center><br />";
			echo "<center><h2>$title</h2></center><br />";
			echo "<center><h4>Paste from $author on $dd</h4></center><br />";
			echo "<center><h4><a href='download.php?id=$arg'>Download this file</a></h4></center><br />";
			echo "<hr/><br />";
			print_highlighted($lang);
			echo "<br /><hr/><br />";
			include_once "includes/footer.php";
			echo "</body>";

		}
	}else{
include_once "main.php";
}
?>
