<?php  
 echo "<style type='text/css' >
body{

}
#content_table{
    border-collapse:collapse;
    border-spacing:2px;
    border-color:gray;
    border:1px solid #FFFFFF;     
}

tr{
    display:table-row;
    border-color:inherit;
}

th,td{
    display:table-cell;
    margin:2px;
    padding:0.2em;
    text-shadow: 0 1px 0 #FFFFFF;
                }

th.thodd{
    border-right:1px solid #FFFFFF;
 }

.data{
    margin:0 0 12px 0;
    border-right:1px solid; 
  }

 td.data{
    border-right:1px solid #BBBBBB;
    color:#444;
 }

.nowrap{
    white-space:nowrap;
  }

tr.odd{
    background:#DFDFDF;
 }

</style>";
$connect=mysql_connect("localhost","root","fooxkcdpgh") ;
if($connect)
{
	mysql_select_db("glupaste");
    $var=$_POST['glug_search'];
    $queryid="select * from record where id=$var";
    $queryauthor="select id from record where author='$var'";
    $rowid=mysql_query($queryid);
    $rowauth=mysql_query($queryauthor);
    $aut = mysql_fetch_array($rowauth);
    $id1 = mysql_fetch_array($rowid);
    $id = $id1['id'];
    if($id !="")
	        header("Location: $id");
    else{
         if($aut != ""){
            $kir = mysql_query("select count(*) from record where author='$var'");
            $num = mysql_fetch_array($kir);
            $id = $aut[0];
            if($num[0] == 1)
                header("Location: $id");
            else{
            echo "<body>";
            include_once('includes/header.php');
            $inputquery="select * from record where author='$var' order by c_date desc";
            $arr= mysql_query( $inputquery);
				 		echo "<center><table width=75%  cellspacing='0' cellpadding='0'>";
						echo "<caption><h2>Paste History</h2></caption>";
						echo "<thead><tr class='odd'>";
						echo "<th class='thodd'>Post #</td>";
						echo "<th class='thodd'>Post Title </th>";
						echo "<th class='thodd'>Post Author</th>";
						echo "<th class='thodd'>Creation Date</th>";
						echo "</tr></thead>";
            $i=1;
            while($row = mysql_fetch_array($arr)){
								 if($i%2)
          				  $class= even;
        				 else
            			 $class=odd;
         				$i++;
                $id = $row['id'];
                $author = $row['author'];
                $title = $row['title'];
                $dd = $row['c_date'];
                echo "<tr align='center' class=' $class'>";
        			  echo "<td class='data nowrap $class'> <a href='http://glug.nith.ac.in/paste/$id'>$id</a> </td>";
         				echo "<td class=' data nowrap $class '> $title  </td>";
      			    echo"<td class=' data nowrap $class'><pre> $author</pre> </td>";
         				echo "<td class=' data nowrap $class'> $dd </td>";
          			echo "</tr>";}
          		  echo "</table> </center><br /><br /><hr />";
          	    include_once('includes/footer.php');
             		echo "</body>";
             }
         }
         else
             header("Location: /paste");
	        
    }
}
?>



