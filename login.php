<?php
error_reporting(E_ALL);
include("dbconnect.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        $error = "Please fill in all fields.";

    } else {
        // Query database for username and password if field not empty
        $sql = "select * from users where username = :username AND password = :password";
        $result = $dbh->prepare($sql);
        $result->execute([
            'username' => $username,
            'password' => $password
        ]);
        $user = $result->fetch();

        if ($user) {
            $_SESSION['username'] = $username;

            header("Location: index.php");
            exit();
        } else {
            $error = "Invalid username or password.";
        }
    }
}
?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>The Advice Shop - Login</title>
    <link href="styles/mainstyles.css" rel="stylesheet" type="text/css" media="screen">
</head>

<body>
    <?php include("inc_header.php");
    include("inc_nav.php"); ?>
    <h2>Login</h2>
    <sectionsec id="content">
        <?php 
        if (isset($error))
            echo "<p>$error</p>"; 
        ?>
        <form method="POST" action="">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>
            <button type="submit">Login</button>
        </form>
        <?php include("inc_footer.php"); ?>
</body>

</html>