<?php
include '../Login/dbh.inc.php';
session_start();
$_SESSION['recipe'] = $_GET['id'];
?>
<script>var session_value='<%=Session["recipe"]%>';
console.log(session_value);
</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="RecipeStyle.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasty Web Recipes</title>
</head>

<body>
<?php
include '../header.php';
?>
<?php

$var = $_GET["id"];

$var2 = $var . ".xml";

$recipe = simplexml_load_file($var2) or die("Error: Cannot create object");

echo    "<h1>".$recipe->title."</h1>
        
        <img src='".$recipe->imagepath."'>
        
        <div id='preps'>Preparations: ".$recipe->preptime.", Cooktime: ".$recipe->cooktime.", Total time: ".$recipe->totaltime."</div>
        <h2>Ingredients</h2>
        <ul>";
foreach ($recipe->ingredient->li as $value){
    echo "<li>".$value."</li>";
}
echo    "</ul>
        <h2>Method</h2>
        <div id='method'>
        <ol>";
foreach ($recipe->recipetext->li as $value){
    echo "<li>".$value."</li>";
}
echo "</ol>
    </div>";

//echo "<div id='commentform'></div>";

if(isset($_SESSION['userid'])) {

    echo "<div id='commentform'></div>";

    echo "<form id='storecomment' action='store-entry.php' method='post'>
        <div>
            <label for='entry'>" . $_SESSION['username'] . "</label>
        </div>
        <div>
            <!--<input type='text' name='comment' size='100'/>-->
            <textarea rows = 5 cols = 50 name='comment' placeholder='Write your comment here.'></textarea>    
        </div>
        <div>
            <input type='submit' value='Send'/>
        </div>
    </form>";
}

?>

<form action="getcomments.php" id="getcomments">
    <button type="submit">Comments</button>
</form>

<div id="comments"></div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="/test.js"></script>
</body>
</html>