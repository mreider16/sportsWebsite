<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>
<body>
<table border=1 class="table">
<!-- <body background="pictures/LionsRoar.gif"> -->

<tr class="warning">
<td>Welcome To The Sports Blog</td><td>Marty Reider</td>
</tr>
</table>

<?php
echo '<a href="create.php">Create an article</a>';
echo "<br>";
echo '<a href="tags.php">Create a tag</a>';
echo "<br><br><br><br>";
//github question: branches and push and pull requests
$link = mysqli_connect('localhost', 'mreider16', 'way59car', 'sports_website');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
//echo 'Connected successfully<br><br>';
//background-image: url("pictures/LionsRoar.gif");

/*
while($rowsid = mysqli_fetch_array($result)) {
$article_id = $rowsid['Article_ID'];
$article_title = $rowsid['Article_Name'];
$article_content = $rowsid['Content'];
//what if you just wanted to print the name of the first article
echo $article_id . "<br>";
echo '<a href=page.php?aid='.$article_id.'>'.$article_title.'</a>';
echo "<br><br>";
echo "Article Name: $article_title <br>";
echo "Article Content: $article_content <br><br>";
}
*/

/*
$tags = mysqli_query($link,"SELECT * FROM Tags");

while($rows = mysqli_fetch_array($tags)) {


    $tag = $rows['Tag_ID'];
    $tagid = $rows['Tag'];
    $sql = 'UPDATE Tags SET Tag = \''.$tag. "helloWorld".'\' WHERE Tag_ID = '. $tagid;
    $update = mysqli_query($link,$sql);
}
//to do:
//figure out MYSQL_ASSOC
//figure out how to take every row in a certain table and change it
//for example: take every tag and add hello world to the end of it
*/
    

$result_tag = mysqli_query($link,"SELECT * FROM Tags");

while ($row = mysqli_fetch_array($result_tag)) {
        //echo '<a href="index.php?page=">$row['Tag']</a>';
        echo '<a href=' . '"index.php?page=' . $row['Tag'] . '"' . '>' . $row['Tag'] . '</a>';
        
        //echo '<option value=' . $row['username']. '>' . $row['username'] . '</option>';
        echo "<br>";
}
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
//put isset
//why is it default set to knicks?

if (isset($page)) {

//echo "$page are the best team";

    echo "<br><br><br><br>";
    $tag = mysqli_query($link,"SELECT Article_Name, Content, Tag FROM Article, Tags, ArticleTag WHERE ArticleTag.Article_ID 
    = Article.Article_ID and ArticleTag.Tag_ID = Tags.Tag_ID AND Tags.Tag = '$page' ORDER BY Date DESC");
    //joining
    //print_r($tag);

    while($articleorder = mysqli_fetch_array($tag)) {
        $Article_title = $articleorder['Article_Name'];
        $Article_content = $articleorder['Content'];

        echo "<br><br>";
        echo "Article Name: $Article_title <br>";
        echo "Article Content: $Article_content <br><br>";
    }
}

else {

    echo "<br><br><br><br>";
    //sorting articles chronologically
    //is this the easiest way to display the column?
    $order = mysqli_query($link,"SELECT Article_ID, Article_Name, Content, Picture FROM Article ORDER BY Date DESC");

    while($rowsorder = mysqli_fetch_array($order)) {
    $orderArticle_id = $rowsorder['Article_ID'];
    $orderArticle_title = $rowsorder['Article_Name'];
    $orderArticle_content = $rowsorder['Content'];
    $orderArticle_picture = $rowsorder['Picture'];

    $uploadfile = "pictures/article_image_" . $orderArticle_id . "." . $orderArticle_picture;
    $imageProperties = getimagesize("$uploadfile");
    echo '<img src=' . "pictures/article_image_" . $orderArticle_id . "." . $orderArticle_picture . ' width="' . $imageProperties[0] . '" height="' . $imageProperties[1] . '" >';
    
    echo '<a href=' . '"viewer.php?page=' . $orderArticle_id . '"' . '>' . "$orderArticle_title" . '</a>';
    echo "<br>";
    $strArticleContent = strip_tags(substr("$orderArticle_content",0,20)) . "...";
    echo "              " . "$strArticleContent";
    //articles are getting cut off
    echo "<br>";
    //very confused: articles are showing up on the main page and they're not showing up in the database?
    echo '<a href=' . '"edit.php?id=' . $orderArticle_id . '"' . '>Edit</a>';
    echo "<br>";
    echo '<a href=' . '"delete.php?id=' . $orderArticle_id . '"' . '>Delete</a>';

    //echo '<a href=' . '"edit.php?page=' . $rowsorder['Article_Name'] . '"' . '>' . $rowsorder['Article_Name'] . '</a>';
    echo "<br><br>";
    }
}

//sorting articles by tag
//THINGS TO GO OVER
//default (11) int
//primary
//I want the example article to show up when this runs -- combining three SQL tables
//figure out whether the artiles should be uploaded from microsoft word or typed into the website itself

/*
$test = mysqli_query($link,"SELECT Article_Name FROM Article");
$articleTag = mysqli_query($link,"SELECT * FROM Tags WHERE Tag = 'Knicks'");
if (mysqli_num_rows($articleTag)==1)
{
    echo "yes";
}
*/

//if it doesnt see a particular tag, display all articles in date order
//if I get parameter with a tag id is passed in it filters based off the ID
//step 1: get a list of tags and their ID's and build a url
//use GET in order to bring the TAG_ID from the URL back down to the code which I place in a SQL query
//INCLUDE statement
//building a link in code to show a list of tags linked to the page that shows articles



//filtering for tags
//sorting for most favorites
//why doesn't it default for the date when you make a new row


?>

</body>
</html>