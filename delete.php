<html>
<body>


<?php
$link = mysqli_connect('localhost', 'mreider16', 'way59car', 'sports_website');

//echo '<form action="delete.php" method="POST"> <select name="articleDelete">';

//should i just do this with an isset in the index
$id = $_GET['id'];
//Have a confirm on the delete
$delete = mysqli_query($link, "DELETE FROM Article WHERE Article_ID = $id");
echo '<a href="index.php">Return to the homepage</a>';
//finish delete
//link every article title to a view page
//edit page passing thru ID and use update statement (works with create page)


//echo "</select>"; 
//echo '<input type="submit" value="Submit">';
//echo "</form>"; 
?>

</body>
</html>