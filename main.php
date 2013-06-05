<?php 
	include_once "includes/header.php";
?>

<html>
<head>
<title>gluPaste</title>
    <script>
 function validateForm()
 {
  var y=document.forms["form_main"]["paste_author"].value;
   var yy=document.forms["form_main"]["paste_title"].value;
   if(yy==""){
    alert("Title is a must. Cannot be left blank.");
        return false;
    }
   if(/[^0-9a-zA-Z]/.test(y) || /[^0-9a-zA-Z]/.test(yy)){
           alert("Author or Title contains invalid things.\nAnyways nice try ! :p\nHappy hacking !");
                   return false;
                   }else{
                           return true;
                           }

}
</script>

 <link rel="stylesheet" href="codemirror/lib/codemirror.css">
  <script src="codemirror/lib/codemirror.js"></script>
        <script src="codemirror/mode/clike/clike.js"></script>

             <script src="codemirror/addon/selection/active-line.js"></script>
<script src="codemirror/addon/edit/matchbrackets.js"></script>

<!--                 <link rel="stylesheet" href="codemirror/doc/docs.css"> -->

                     <style type="text/css">
                           .CodeMirror {border-top: 1px solid black; border-bottom: 1px solid black; border-left: 1px solid black; border-right: 1px solid black; }
                                 .CodeMirror-activeline-background {background: #e8f2ff !important;}
                                     </style>


</head>

<body>
	<form id="form_main" name="form_main" action="insert.php" method="post" onsubmit="return validateForm()">
	<div id="paste_main" >
		<table id="paste_content" width=80% border="0" >
		<tr>
            <td align="right" valign="center" height="45"><b>Title:</b> </td>
            <td><input type="text" name="paste_title" size="20" placeholder="Title"></td>
        </tr>
        <tr>
            <td align="right" valign="center" ><b>Author:</b> </td>
            <td><input type="text" name="paste_author" placeholder="Author (Optional)" ></td>
        </tr>
        <tr>
            <td align="right" valign="45" height="45"> <b>Choose Language:</b> </td>
            <td><select name="paste_language" width="20">
	    	    <option value="txt" id="plaintxt"> Plain Text </option>
		    <option value="c" id="c" selected="selected"> C </option>
		    <option value="cpp" id="c++"> Cpp </option>
		    <option value="py" id="python"> Python </option>
		    <option value="php" id="php"> PHP </option>
		    <option value="js" id="javascript">JavaScript </option>
		    <option value="java" id="java"> Java</option>
		    <option value="bash" id="bash"> BASH</option>
		    <option value="awk" id="awk"> AWK </option>
                    <option value="matlab" id="matlab"> Matlab </option>
                    <option value="make" id="make"> Make </option>
                    <option value="tcl" id="tcl"> TCL </option>
                    <option value="sql" id="sql">SQL </option>
                    <option value="email" id="email"> EMAIL</option>
                    <option value="xml" id="xml"> XML</option>

				</select></td>
         </tr>
         <tr>
            <td align="right"><b>Content:</b> </td>
		    <td width=80% style="max-width:200px; "> <textarea id="code" name="content_file"></textarea></td>
        </tr>
        <tr>
	    <td></td>
        <td valign="center" height="45"><input name="submit" type="submit" value="Paste"/></td>
         </tr>
        </table>
    </div>
	</form>

    <script>
 var editor = CodeMirror.fromTextArea(document.getElementById("code"), {
         lineNumbers: true,
                 matchBrackets: true,
                         mode: "text/x-csrc"
                               });
     //editor.setOption("mode","application/xml");

</script>


</body>
</html>

<?php
	include_once "includes/footer.php";
?>































