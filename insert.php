<?php 
$ans=9;
include "includes/libpaste.php";
$connect=mysql_connect("localhost","root","fooxkcdpgh") ;
if($connect)
{
/*
	//pattern matching goes here:
		$pattern = '/^14.139.\d{1,3}.\d{1,3}\z/';
		$pattern1 = '/^172.16.\d{1,3}.\d{1,3}\z/';		
        $pattern2 = '/^127.0.\d{1,3}.\d{1,3}\z/';
 $val = preg_match($pattern, $_SERVER['REMOTE_ADDR'], $matches);
 $val1 = preg_match($pattern1, $_SERVER['REMOTE_ADDR'], $matches);
 $val2 = preg_match($pattern2, $_SERVER['REMOTE_ADDR'], $matches);
		if(!($val || $val1 || $val2))
		     exit('Access denied for your IP address :'. $_SERVER['REMOTE_ADDR'] . '. You need to be from the NITH network to access this facility. However you can still view the pastes from outside network.');
		
		

*/
$captcha=$_POST['paste_captcha'];
if($captcha!=$ans)
     exit('Captcha verification failed.');
	

	mysql_select_db("glupaste");
	if(isset($_POST['submit']))
	{
		$c_time=time(); 
		$e_time=time()+(30*24*60*60);
		$id=substr($c_time,3);
		//echo "your ip is :".$_SERVER['REMOTE_ADDR']."<br>";
		$c_date= date('Y-m-d',$c_time);
		$e_date= date('Y-m-d',$e_time);
        $var=$_POST['paste_author'];
          if($var=='')
            $var='Anonymous';
		$inputquery="insert into record values ($id,'$_POST[paste_title]','$var','$_SERVER[REMOTE_ADDR]','$_POST[paste_language]','$c_date','$e_date',$c_time)";

	 mysql_query( $inputquery);
	 $data=$_POST['content_file'];
 $fh = fopen("data/$id", 'w+') or die('Cannot open file:  '.$id);
	 fwrite($fh,$data);
	 fclose($fh);
	 header("Location: $id");
	}
}


?>



