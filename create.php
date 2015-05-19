<?php
$link = mysqli_connect('localhost', 'mreider16', 'way59car', 'sports_website');
if (isset($_POST['submit'])) {
    
    if (isset($_POST['article'], $_POST['title'],$_FILES['upload_picture'])) {
    if($_FILES['upload_picture']['error']==0) {
        //have seperate image upload error message
        //for title, body, photo, and tag
        $stU  = strlen($_POST['article']);
        $stUT = strlen($_POST['title']);
        if ($stU > 5 && $stUT > 1) {
            $articlePost  = $_POST['article'];
            $articleTitle = $_POST['title'];
            $date = date("Y-m-d");
        
            $originalName       = $_FILES['upload_picture']['name'];
            $originalDirectory  = $_FILES['upload_picture']['tmp_name'];
            $fileExtensionParse = explode(".", $originalName);
            $fileExtension      = end($fileExtensionParse);
            
            $insert = mysqli_query($link, "INSERT INTO Article (Article_Name,Content,Date,Picture) 
            VALUES ('$articleTitle','$articlePost','$date','$fileExtension')");
            //print_r($insert);

            $id = mysqli_insert_id($link);
            //only do this if tags are submitted
            foreach ($_POST['tag'] as $tag) {
            
                $insertTag = mysqli_query($link, "INSERT INTO ArticleTag (Article_ID, Tag_ID) VALUES ('$id','$tag')");
            
            }
            $target_dir = "pictures/";
            $uploadfile = $target_dir . "article_image_" . $id . "." . $fileExtension;
            move_uploaded_file($originalDirectory, $uploadfile);
        //print_r($_FILES);
        //no echos before the header
            header("location:viewer.php?page=" . $id . "");
        }
        }
        else {
            echo '<div class="alert alert-danger">Make sure that your article is 5 characters long</div>';
        }
        
    
    }
    else {
        echo '<div class="alert alert-danger">Please fill out all of the fields</div>';
    }
    
}
?>
<html>
<head><!-- CDN hosted by Cachefly -->
<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<script>tinymce.init({selector:'textarea',fontsize_formats: "8pt 9pt 10pt 11pt 12pt 26pt 36pt",
         theme: 'modern', toolbar: "undo redo pastetext | styleselect | fontselect | fontsizeselect | bold",  menubar : false});</script>
</head>
<body>

<form action="create.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
<!-- go to the viewer -->

<input placeholder="Title" type="text" name="title"><br>
<textarea rows="20" name ="article"></textarea>
<input type = "file" name = "upload_picture">

<?php

$link       = mysqli_connect('localhost', 'mreider16', 'way59car', 'sports_website');
$result_tag = mysqli_query($link, "SELECT * FROM Tags");
//check if it is submitted and if there are any errors
//3 states:
//just opened the page
//submitted with errors
//submitted without errors

while ($row = mysqli_fetch_array($result_tag)) {
    echo '<input type = "checkbox" name = "tag[]" value =' . $row['Tag_ID'] . '>' . $row['Tag'];
    echo "<br>";
}

?>

<input name="submit" type = "submit">
</div>
</form>

<?php
//form is submitting everytime I load the page
//is having a string counter the best solution?
//how do i put title




//go directly to the viewpage




//don't submit article with empty title
//add title field to form
//image optional?
//append file extention to uploaded file (explode function)
//view page: display image to corresponding article. build the file name for the html image tag
//maybe store file name in database as well as appending file name


?>

<a href="index.php">Return to homepage</a>

</body>
</html>