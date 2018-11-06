

<head>
 <h1 align = "center">Library System</h1> 

<p colspan = "2" align = "center"><input type = "button" value = "search and reserve" onclick="location.href='search.php'    ">
<input type="button" value="Logout" onclick="location.href='logout.php'; return false    "> 
 <input type = "button" value = "Reservation and return" onclick="location.href='reservation.php' "></p>
 </head>
 <body bgcolor= "SANDYBROWN">
<h2 align = "center">Books Display</h2>
<?php
session_start();
if(!isset($_SESSION['userName']))
{
	header('Location: login.php');
}

$db = mysqli_connect('localhost', 'root', '') or die(mysqli_error());
mysqli_select_db($db ,"ca") or die(mysqli_error());

//paging
echo '<table border="0" align = "center"><tr><td>';
$sql1 = mysqli_query($db, "select * from books");
$totalrow=mysqli_num_rows($sql1);
$rowperpage = 5;
$totalpage = ceil($totalrow / $rowperpage);
if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {
   $currentpage = (int) $_GET['currentpage'];
} else {
   $currentpage = 1;
} 
if ($currentpage > $totalpage) {
   $currentpage = $totalpage;
} 
if ($currentpage < 1) {
   $currentpage = 1;
} 
$offset = ($currentpage -1) * $rowperpage;




   $prevpage = $currentpage - 1;
 
   echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$prevpage'>Prevpage</a> ";
 echo " [<b>$currentpage</b>] ";
   $nextpage = $currentpage + 1;
   echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$nextpage'>Nextpage</a> ";


	
	echo '</td></tr></table>';

//////////////////////////////////////////////////////////////////////////////////////////////////////////////

$result = mysqli_query($db, "select * from books LIMIT $offset, $rowperpage");
echo '<table border = "1" align = "center" bgcolor = "AQUA">'."\n";
  echo "<th>ISBN</th>"; 
    echo "<th>BookTitle</th>"; 
    echo "<th>Author</th>"; 
	echo "<th>Edition</th>"; 
	echo "<th>Year</th>"; 
	echo "<th>Category</th>"; 
	echo "<th>Rese</th>"; 
while ($row = mysqli_fetch_row($result))
	{
	echo '<tr><td>';
	echo($row[0]);
	echo('</td><td>');
	echo($row[1]);
	echo('</td><td>');
	echo($row[2]);
	echo('</td><td>');
	echo($row[3]);
	echo('</td><td>');
	echo($row[4]);
	echo('</td><td>');
	echo($row[5]);
	echo('</td><td>');
	echo($row[6]);

	echo('</td></tr>');
	
	}
	echo '</table> ';
	
?>
</body>