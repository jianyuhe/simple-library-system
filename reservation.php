

<head>
 <h1 align = "center">Library System</h1> 

<p align = "center"><input type="button" value="Logout" onclick="location.href='logout.php'; return false ">
<input type = "button" value = "display" onclick="location.href='display.php' ">
<input type = "button" value = "search and reserve" onclick="location.href='search.php' "></p>
</head>
<body bgcolor = "LIGHTSKYBLUE">
<h2 align = "center"> Reservation Books </h2>
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
$sql1 = mysqli_query($db, "select * from books where rese = 'Y'");
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
$offset = ($currentpage - 1) * $rowperpage;

   $prevpage = $currentpage - 1;
 
   echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$prevpage'>Prevpage</a> ";
 echo " [<b>$currentpage</b>] ";
   $nextpage = $currentpage + 1;
   echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$nextpage'>Nextpage</a> ";


	
	echo '</td></tr></table>';

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
$resebook = mysqli_query($db, "select * from books where rese = 'Y' LIMIT $offset, $rowperpage");
echo '<table border = "1" align = "center" bgcolor = "AQUA">'."\n";
echo "<th>ISBN</th>"; 
    echo "<th>BookTitle</th>"; 
    echo "<th>Author</th>"; 
	echo "<th>Edition</th>"; 
	echo "<th>Year</th>"; 
	echo "<th>Category</th>"; 
	echo "<th>Rese</th>"; 
while ($row = mysqli_fetch_row($resebook))
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
<h1 align = "center">Return books</h1>
<p align = "center">Please insert book title or book author to return book </p>
<form action="reservation.php" method="POST" align = "center">
    <input type="text" name="return" placeholder = "return book" />
    <button type="submit" name = "book-return" >return</button>
</form>
<?php
$db = mysqli_connect('localhost', 'root', '') or die(mysqli_error());
mysqli_select_db($db ,"ca") or die(mysqli_error());

if ( isset($_POST['book-return']) ) 
{ 
$return = $_POST['return']; 
$update1 = "update books set rese = 'N' where bookTitle ='$return' or author like '$return'";
$find = "select * from books where (bookTitle ='$return' or author like '$return') and (rese = 'Y')";

$e = mysqli_query($db, $find);
    
if(mysqli_num_rows($e) >0)
{
	 mysqli_query($db, $update1);
	echo '<p align = "center" style="color:green">your book return is successfull</p>';
		return;

}
else
{
	 echo '<p align = "center" style="color:red"> incorrect information please try again </p>';
		return;
}
}
?>
</body>