<?php 
    $db = mysqli_connect("89.187.86.8", "msdigita_main_php", "q1w2e3r417", "msdigita_main");
    $symp_ident = $_REQUEST['ident'];
    //All tools with ident ^^
    $symp_tools_query = $db->query("SELECT * FROM `Tools` a, `Tool_Symptoms` b, `Symptoms` c
    WHERE a.`tool_id`=b.`tool_id` AND b.`symptom_id`=c.`symptom_id` AND c.`symptom_ident`='".$symp_ident."'");
    //Symptom information
    $symp_detail_query = $db->query("SELECT * FROM `Symptoms` WHERE `symptom_ident`='".$symp_ident."'");
    $symptom_details = mysqli_fetch_assoc($symp_detail_query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anxiety & Depression</title>
    <link rel="stylesheet" href="../css/symptoms.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body>
    <?php
        include('includes/html/header.inc.php');
    ?>

    <div class="main-body">
        <div class="left-column">
            <?php
                while($symp_tool = mysqli_fetch_assoc($symp_tools_query)) {
                    var_dump ($symp_tool);
                    echo $symp_tool['tool_name'];
                }
            ?>
        </div>
        <div class="right-column">
            <?php
                echo $symptom_details['symptom_description'];
            ?>
        </div>
    </div>

    <footer>
        <div class="footer">
            <div class="footer-wrapper">
                <div class="BU-logo">
                    <img src="../images/BU-Logo.png" alt="Bournemouth University Logo">
                </div>
                <div class="right-footer">
                    <div class="social-media">
                        <a href="#"><img src="../images/facebook-icon.png" alt="Facebook Link"></a>
                        <a href="#"><img src="../images/twitter-icon.png" alt="Twitter Link"></a>
                        <a href="#"><img src="../images/instagram-icon.png" alt="Instagram Link"></a>
                    </div>
                    <div class="tc-pp">
                        <li><a href="#">Terms & Conditions</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
<?php
    mysqli_close($db);
?>