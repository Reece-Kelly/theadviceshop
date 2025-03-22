<?php include( "dbconnect.php" ); ?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>The Advice Shop - Success Stories</title>
    <link href="styles/mainstyles.css" rel="stylesheet" type="text/css" media="screen">
</head>

<body>
<?php 
include( "inc_header.php" );
include( "inc_nav.php" ); 
?>

<section id="content">
    <h2>Success Stories</h2>

    <p><strong>Don't just take our word for it! Read our customer's experiences!</strong>.</p>
    <p>We understand that you may be sceptical about subscribing to our advice service, so we have provided these customer success stories to show you how successful our advice can make you!</p>

    <p><a href="subscribe.php">Subscribe now to our professional advice service.</a></p>

    <?php
    // Function to fetch stories from the database
    function getSuccessStories($dbh) {
        $stories = [];
        $query = "select * from success_stories";
        $result = $dbh->query($query);
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $stories[] = $row;
        }
        return $stories;
    }

    $stories = getSuccessStories($dbh);

    if (empty($stories)) {
        echo "<p>No success stories found in database.</p>";
    } else {
        // Loop through stories and display them using foreach
        foreach ($stories as $story) {
            echo "<div class='story'>";
            echo "<h3>{$story['customer_name']}</h3>";
            echo "<p>{$story['story_content']}</p>";
            echo "</div>";
        }
    }
    ?>


</section>
<?php include( "inc_footer.php" ); ?>
</body>
</html>
