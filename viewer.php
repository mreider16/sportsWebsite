<?php
$link = mysqli_connect('localhost', 'mreider16', 'way59car', 'sports_website');
$view = $_GET['page'];
$viewer = mysqli_query($link,"SELECT Article_ID ,Article_Name, Content, Picture, Length, Width FROM Article WHERE Article_ID = $view");
//is there an easier way to do this because I'm just dealing with one article?
while($viewpage = mysqli_fetch_array($viewer)) {
        $content = $viewpage['Content'];
        $fileExtension = $viewpage['Picture'];
        
        $uploadfile = "pictures/article_image_" . $view . "." . $fileExtension;
        
        $imageProperties = getimagesize("$uploadfile");
        
        print_r($imageProperties);
        
        $title = '<p><font size ="16"><b>' . $viewpage['Article_Name'] . '</p></font></b>';
        echo "$title";
        echo '<img src=' . "pictures/article_image_" . $view . "." . $fileExtension . ' width="' . $imageProperties[0] . '" height="' . $imageProperties[1] . '" >';
        //scaling and cropping the image
        //store width and height
        echo "$content";
    }
echo "<br><br>";
echo '<a href="index.php">Return to the homepage</a>';
//php proportionally scale image
//php substring breaking on word boundary
?>