<?php
$filename = substr(strrchr($_SERVER['SCRIPT_NAME'], "/"), 1); // Extract the current filename
$name = substr($filename, 0, strrpos($filename, ".")); // Remove the file extension
?>

<header id="pageHeader">
  <aside id="login">

    <?php
    if (isset($_SESSION['username'])) {
        echo "Welcome, " . $_SESSION['username'] . "! | <a href=\"logout.php?page=$name\">Logout</a>";
    } else {
        echo "<a href='login.php?page=$name'>Login</a>";
    }
    ?>

  </aside>
  <a href="index.php"><h1><span class="glyphicon glyphicon-ok"></span> The Advice Shop</h1></a>
</header>