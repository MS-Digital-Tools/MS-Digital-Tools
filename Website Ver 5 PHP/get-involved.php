<?php 
    $db = mysqli_connect("89.187.86.8", "msdigita_main_php", "q1w2e3r417", "msdigita_main");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Get Involved - MSDT</title>
    <link rel="stylesheet" href="css/info.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body>
    <?php
        include('includes/html/header.inc.php');
    ?>

    <div class="main-body">
        <h1>Get Involved!</h1>
        <h3>Thank you for your interest in helping us with the development of MS Digital Tools!</h3>
        <p>We're currently inviting users to fill in questionnaires that will help us create this website with you as the user in mind. If you would like to fill out a questionnaire as an MS Patient, MS Carer or Health Care Professional (HCP), please click one of the links below.</p>
        <div class="questionnaire-buttons">
            <form action="https://bournemouth.onlinesurveys.ac.uk/ms-digital-tools-people-with-ms-survey" target="_blank">
                <button type="submit">MS Patient Questionnaire</button>
            </form>
            <form action="https://bournemouth.onlinesurveys.ac.uk/ms-digital-tools-ms-carers-survey" target="_blank">
                <button type="submit">MS Carer Questionnaire</button>
            </form>
            <form action="https://bournemouth.onlinesurveys.ac.uk/ms-digital-tools-health-care-professionals-survey" target="_blank">
                <button type="submit">HCP Questionnaire</button>
            </form>
        </div>
        <p>If you would not like to fill in a questionnaire right now, but would be interested in us contacting you at a later date to take part in other ways, please send an email expressing an interest to <a href="#">msdigitaltools@gmail.com</a>.</p>
        <p>Thank you again for supporting us and providing your knowledge to help us create the most useful version of MS Digital Tools for you!</p>
    </div>

    <?php
        include('includes/html/footer.inc.php');
    ?>

</body>
</html>
<?php
    mysqli_close($db);
?>