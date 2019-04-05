<?php 
    $db = mysqli_connect("89.187.86.8", "msdigita_main_php", "q1w2e3r417", "msdigita_main");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Suggest a Tool - MSDT</title>
    <link rel="stylesheet" href="css/info.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body>

    <?php
        include('includes/html/header.inc.php');
    ?>

    <div class="main-body">
        <h1>Suggest a Tool</h1>
        <h3>Is there a tool that you find useful and think would be a good addition to the MS Digital Tool Library?</h3>
        <p>Please send an email to us at <a href="#">msdigitaltools@gmail.com</a> with the name of the tool, where to find the tool and what aspect of your MS it has assisted you with. </p>
        <p>Thank you again for supporting us and providing your knowledge to help us create the most useful version of MS Digital Tools for you! </p>
    </div>

    <?php
        include('includes/html/footer.inc.php');
    ?>
    
</body>
</html>
<?php
    mysqli_close($db);
?>