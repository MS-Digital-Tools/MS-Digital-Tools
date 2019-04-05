<?php 
    $db = mysqli_connect("89.187.86.8", "msdigita_main_php", "q1w2e3r417", "msdigita_main");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Using This Site - MSDT</title>
    <link rel="stylesheet" href="css/info.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body>

    <?php
        include('includes/html/header.inc.php');
    ?>
    
    <div class="main-body">
        <img class="cog-img" src="images/cog.svg" alt="Cog">
        <h3>Sorry, this page is still under construction!</h3>
        <p>Please check back later for more information, thanks!</p>
    </div>

    <?php
        include('includes/html/footer.inc.php');
    ?>
    
</body>
</html>
<?php
    mysqli_close($db);
?>