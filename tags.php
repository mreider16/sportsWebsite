<?php
$link = mysqli_connect('localhost', 'mreider16', 'way59car', 'sports_website');

$tags = mysqli_query($link,"SELECT * FROM Tags");

if (isset($_POST['tag'])) {
    $newTag = $_POST['tag'];
    $insertTag = mysqli_query($link, "INSERT INTO Tags (Tag) 
            VALUES ('$newTag')");
}

echo "Current Tags:";
echo "<br><br>";


while ($row = mysqli_fetch_array($tags)) {

        echo $row['Tag'];
        echo "<br>";

}
echo "<br>";
?>

<form action="tags.php" method="POST">
<input placeholder="Tag" type="text" name="tag"><br>
<input name="submit" type = "submit">
</form>