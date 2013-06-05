<?php

//Dispatch URL function to get the needed part of the URL. 
// Eg: glug.nith.ac.in/paste/things will feth you things.
function get_id($url) {
	     // Split the URL into its constituent parts.
	     $parse = parse_url($url);

	     // Remove the leading forward slash, if there is one.
	     $path = ltrim($parse['path'], '/');

	     // Put each element into an array.
	     $elements = explode('/', $path);

	     return (string)$elements[1];
}

function print_highlighted($lang){
	 //The GeSHI syntax highlighter is included.
	 include_once 'geshi/geshi.php'; 
	 //The string returned is stored in a variable.
	 $filename = get_id($_SERVER['REQUEST_URI']);

	 //If file does not exist then it redirects the user to the home page.
	 $file=fopen("data/$filename","r") or header("Location: /");
	 $source='';

	 while(!feof($file)){
	    $source=$source . fgets($file);
	    }

	    //The object created is passed two arguments for syntax highlighting.
	    $geshi = new GeSHi($source, $lang);
            $geshi->set_overall_style('background-color: #f2f2f2; margin: 0px 40px; border: 1px dotted;', true);
            //$geshi->set_header_type(GESHI_HEADER_PRE_VALID);
	    $geshi->set_header_type(GESHI_HEADER_DIV);
	    //The flag below shows the line numbers. See GeSHI docs for more options.
	    $flag = GESHI_NORMAL_LINE_NUMBERS;      
	    $geshi->enable_line_numbers($flag);
    $geshi->set_line_style('padding: 0px 15px;');
	    //The <pre> tags are included for maintaining the indentation.
	   // echo "<pre>";
	    echo $geshi->parse_code();
	   // echo "</pre></div>";
	    return 0;
}

function new_entry($filename,$data){
	 $fh = fopen("data/$filename", 'w+') or die('Cannot open file:  '.$filename);
	 fwrite($fh,$data);
	 fclose($fh);
	 header("Location: $filename");
}


//$arg=get_id($_SERVER["REQUEST_URI"]);
//echo $arg;
/*if ($arg=="")
   new_entry("ddps","asdf asdf sdfs dfsd "); 
else
	print_highlighted("c");
*/


?>
