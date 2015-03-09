<?php
//github question: branches and push and pull requests
$link = mysqli_connect('localhost', 'mreider16', 'way59car', 'sports_website');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully<br><br>';

$result = mysqli_query($link,"SELECT * FROM Article");
//sorting articles by ID

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


$test = mysqli_query($link,"SELECT Article_Name FROM Article");
$articleTag = mysqli_query($link,"SELECT * FROM Tags WHERE Tag = 'Knicks'");
if (mysqli_num_rows($articleTag)==1)
{
    echo "yes";
}

echo "<br><br><br><br>";
//if it doesnt see a particular tag, display all articles in date order
//if I get parameter with a tag id is passed in it filters based off the ID
//step 1: get a list of tags and their ID's and build a url
//use GET in order to bring the TAG_ID from the URL back down to the code which I place in a SQL query
//INCLUDE statement
//building a link in code to show a list of tags linked to the page that shows articles

$result_tag = mysqli_query($link,"SELECT * FROM Tags");

while ($row = mysqli_fetch_array($result_tag)) {
        //echo '<a href="test2.php?page=">$row['Tag']</a>';
        echo '<a href=' . '"test2.php?page=' . $row['Tag'] . '"' . '>' . $row['Tag'] . '</a>';
        
       // echo '<option value=' . $row['username']. '>' . $row['username'] . '</option>';
        echo "<br>";
    }
$page = $_GET['page'];
//why is it default set to knicks?

echo "$page are the best team";

echo "<br><br><br><br>";
$tag = mysqli_query($link,"SELECT Article_Name, Content, Tag FROM Article, Tags, ArticleTag WHERE ArticleTag.Article_ID = Article.Article_ID and ArticleTag.Tag_ID = Tags.Tag_ID AND Tags.Tag = '$page' ORDER BY Date DESC");
//joining
//print_r($tag);

while($articleorder = mysqli_fetch_array($tag)) {
    $Article_title = $articleorder['Article_Name'];
    $Article_content = $articleorder['Content'];

    echo "<br><br>";
    echo "Article Name: $Article_title <br>";
    echo "Article Content: $Article_content <br><br>";
}

//filtering for tags
//sorting for most favorites
//why doesn't it default for the date when you make a new row
?>