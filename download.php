<?php

	$id=$_GET['id'];
	
	if($id==''){
		echo "No argument provided\n";
		return;
	}
	$file = 'data/'.$id;
	
	$connect=mysql_connect("localhost","root","fooxkcdpgh") ;
	if($connect){
		mysql_select_db("glupaste");
		$inputquery="select * from record where id='$id';";
		$arr= mysql_query( $inputquery);
		$row = mysql_fetch_array($arr);
		$lang= $row['lang'];
        	$author = $row['author'];
          	$title = $row['title'];
          	$dd = $row['c_date'];

		header('Content-type: text/plain');
		header('Content-Length: '.filesize($file));
		header('Content-Disposition: attachment; filename='.$author.'_'.$title.'.'.$lang);
		readfile($file);
	}


?>
