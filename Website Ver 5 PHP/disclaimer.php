<?php 
    $db = mysqli_connect("89.187.86.8", "msdigita_main_php", "q1w2e3r417", "msdigita_main");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Disclaimer - MSDT</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/info.css">
</head>
<body>
    <?php
        include('includes/html/header.inc.php');
    ?>
    
    <div class="main-body">
        <h3>Tool Disclaimer</h3>
        <p>The app providers are solely responsible for the compliance and fitness for purpose of their apps and content.</p>
        <p>MS Digital Tools are not the creators, owners, editors, managers or providers of the tools/apps (and any information and content contained therein) listed in the MS Digital Tools library. </p>
        <p>MS Digital Tools have set standards for reviewing the tools/apps as detailed in this library. This does not mean that MS Digital Tools have identified all aspects to be considered, or reviewed and verified all aspects of all versions of (including any updates) of the tools/apps, or that the tools/apps are suitable for use by all types of end user.</p>
        <p>The named supplier of the tools/apps listed is the entity solely responsible for the content, advice, production and maintenance (including all required updates) of the tools/apps.</p>
        <p>Users must exercise their own skill and judgement when using the tools/apps. Users acknowledge that MS Digital Tools have no liability for any damage or loss howsoever caused (including damage and loss caused by (but not limited to) any errors, loss of data, inaccuracies or omissions in any information, advice, instructions, content or scripts provided by the named supplier to users independently of the tools/apps or contained within the tools/apps itself) by a user’s use of or reliance on the tools/apps.</p>
        <p>MS Digital Tools are not responsible or liable for any advice, services or products that you obtain through the use of the tools/apps listed on the MS Digital Tools Library.</p>
        <p>The MS Digital Tools Library is intended to provide supportive relevant information only. It should be treated as a guide which aids users to identify relevant tools/apps that may be used. The tools/apps should be treated as complementary to any advice users have been provided with by a qualified medical professional. If a user feels their symptoms are not improving or has concerns about their health, then professional medical advice should be sought. If there is any concern, or defect as to the content of the tools/apps, or issues of any other kind with the tools/apps, then users should contact the named supplier without delay.</p>
        <p>For less urgent health needs, contact your GP or local pharmacist in the usual way. If you have an urgent medical need you should call 111. If a life is at risk, call 999.</p>
    </div>

    <?php
        include('includes/html/footer.inc.php');
    ?>
    
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>
<?php
    mysqli_close($db);
?>