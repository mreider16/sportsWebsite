<html>
<head><!-- CDN hosted by Cachefly -->
<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script>tinymce.init({selector:'textarea',fontsize_formats: "8pt 9pt 10pt 11pt 12pt 26pt 36pt",
         theme: 'modern', toolbar: "undo redo pastetext | styleselect | fontselect | fontsizeselect | bold",  menubar : false});</script>
</head>
<body>

<?php
$link = mysqli_connect('localhost', 'mreider16', 'way59car', 'sports_website');
$result = mysqli_query($link,"SELECT Article_Name FROM Article");
//have the editing for the admin on the main article page?
//echo '<form action="edit.php" method="POST"> <select name="articleEdit">';
$num_rows = mysqli_num_rows($result);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

if (isset($_POST['article'])) {
    $updated = $_POST['article'];
    echo "$updated";
    $id = $_GET['id'];
    echo "$id";
    $update = mysqli_query($link,"UPDATE Article SET Content = '$updated' WHERE Article_ID = '$id'");
    echo '<a href="index.php">Return to the homepage</a>';
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $edit = mysqli_query($link,"SELECT Content FROM Article WHERE Article_ID = $id");

    while($editor = mysqli_fetch_array($edit)) {
        $content = $editor['Content'];
        //echo "$content";
    }
}

//echo "</select>"; 
//echo '<input type="submit" value="Submit">';
//echo "</form>"; 
?>

<form action="edit.php?id=<?php echo "$id";?>" method="POST">
<textarea rows="20" name ="article"><?php if(isset($content)) {echo $content;}?></textarea>
<input name="submit" type = "submit">
</form>

</body>
</html>