<div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Calendar/calendar.php">Calendar</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Recipes
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/Recipes/recipe.php?id=meatballs">Swedish meatballs</a>
                        <a class="dropdown-item" href="/Recipes/recipe.php?id=pancakes">Swedish pancakes</a>
                    </div>
                </li>
            </ul>
        </div>
        <?php
        if(!isset($_SESSION['userid'])){
            echo '<form action="Login/login.inc.php" class="form-inline my-2 my-lg-0" id="loginform" method="post">
            <input class="form-control mr-sm-2" type="text" name="username" placeholder="Username">
            <input class="form-control mr-sm-2" type="text" name="pwd" placeholder="Password">
            <button class="btn  my-2 my-sm-0" type="submit" name="login-submit">Login</button>
            <!--<button class="btn  my-2 my-sm-0" type="submit" name="signup-submit">Sign up</button>-->
            </form>';
        }
        ?>
        <button id="signin" class="btn  my-2 my-sm-0" style="color: aliceblue"><a href="Signup/signup.php">Sign up</a></button>

        <form class="form-inline my-2 my-lg-0" id="logoutform" action="Logout/logout.inc.php" method="post">
            <button class="btn  my-2 my-sm-0" type="submit" name="logout-submit">Logout</button>
        </form>
    </nav>
</div>