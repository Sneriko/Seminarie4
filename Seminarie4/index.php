<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/homestyle.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasty Web Recipes</title>
</head>

<?php
include 'header.php';
?>

<script>
    function openForm() {
        document.getElementById("signup-form").style.display = "block";
    }

    function closeForm() {
        document.getElementById("signup-form").style.display = "none";
    }
</script>

<div class="header">
    <h1>Tasty Web Recipes</h1>
</div>

<div class="about">
    <p>Welcome to my world of food. When I'm saying "world" I really mean cold, unwelcoming Scandinaiva,
        or Sweden, to be precise, where winters are harsh and food is... well, pretty damn bland they
        usually say, but I would prefere a description more in line with "subtle", or "discreet", or
        "nuanced". The food doesn't explode in your mouth, or make your eyes pour, or sets off any
        kind of intense sensation really, but it develops slowly and humbly. I wont say it's the most special
        kitchen in the world, or the most innovative, or creative, or any of the sort, but if you give it
        a chance it might just grow on you.
    </p>
</div>

<script>
    var txt2 = $("<p></p>").text("Text.");
    $("h1").append(txt2);
    var cookie = document.cookie;
    console.log(cookie);
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="test.js"></script>
</body>
</html>