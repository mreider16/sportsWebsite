<?php

$link = mysqli_connect('localhost', 'mreider16', 'way59car', 'sports_website');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully<br><br>';

$result = mysqli_query($link,"SELECT * FROM Article");
//sorting articles by ID

while($rowsid = mysqli_fetch_array($result)) {
$article_id = $rowsid['Article_ID'];
$article_title = $rowsid['Article_Name'];
$article_content = $rowsid['Content'];
//what if you just wanted to print the name of the first article
echo $article_id;
echo "<br><br>";
echo "Article Name: $article_title <br>";
echo "Article Content: $article_content <br><br>";
}


//sorting articles chronologically
//is this the easiest way to display the column?
$order = mysqli_query($link,"SELECT Article_ID, Article_Name, Content FROM Article ORDER BY Date DESC");

while($rowsorder = mysqli_fetch_array($order)) {
$orderArticle_id = $rowsorder['Article_ID'];
$orderArticle_title = $rowsorder['Article_Name'];
$orderArticle_content = $rowsorder['Content'];

echo $orderArticle_id;
echo "<br><br>";
echo "Article Name: $orderArticle_title <br>";
echo "Article Content: $orderArticle_content <br><br>";
}


//sorting articles by tag
//THINGS TO GO OVER
//default (11) int
//primary
//I want the example article to show up when this runs -- combining three SQL tables
//figure out whether the artiles should be uploaded from microsoft word or typed into the website itself
$tag = mysqli_query($link,"SELECT Article_Name, Tag FROM Article, Tags, ArticleTag WHERE ArticleTag.Article_ID = Article.Article_ID and ArticleTag.Tag_ID = Tags.Tag_ID AND Tags.Tag = 'Knicks'");
$test = mysqli_query($link,"SELECT Article_Name FROM Article");
$articleTag = mysqli_query($link,"SELECT * FROM Tags WHERE Tag = 'Knicks'");
if (mysqli_num_rows($articleTag)==1)
{
    echo "yes";
}

?>