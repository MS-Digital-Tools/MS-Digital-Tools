<?php 
    $db = mysqli_connect("89.187.86.8", "msdigita_main_php", "q1w2e3r417", "msdigita_main");
    $symp_ident = $_REQUEST['ident'];
    //All tools with ident ^^
    $symp_tools_query = $db->query("SELECT * FROM `Tools` a, `Tool_Symptoms` b, `Symptoms` c
    WHERE a.`tool_id`=b.`tool_id` AND b.`symptom_id`=c.`symptom_id` AND c.`symptom_ident`='".$symp_ident."'");
    //Symptom information
    $symp_detail_query = $db->query("SELECT * FROM `Symptoms` WHERE `symptom_ident`='".$symp_ident."'");
    $symptom_details = mysqli_fetch_assoc($symp_detail_query);
    $symp_title_query = $db->query("SELECT symptom_name FROM `Symptoms` WHERE `symptom_ident`='".$symp_ident."'");
    $symptom_title = mysqli_fetch_assoc($symp_title_query);
    //Wrong
    $tools_url_query = $db->query("SELECT * FROM `Tools_Urls` WHERE `tool_id`='".$tool_id."'");
    $tool_url = mysqli_fetch_assoc($tools_url_query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        <?php
            echo $symptom_title['symptom_name'];   
        ?>
        - MSDT
    </title>
    <link rel="stylesheet" href="css/symptom.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body>
    <?php
        include('includes/html/header.inc.php');
    ?>

    <div class="breadcrumbs">
        <p><a href="index.php">Home</a> <i class="fa fa-caret-right"></i> <?php echo $symptom_title['symptom_name']; ?></p>
    </div>

    <div class="main-body">
        <div class="left-column">
            <?php
                while($symp_tool = mysqli_fetch_assoc($symp_tools_query)) {
            ?>
            <div class="tool-container">
                <div class="tool-image">
                    <img src="images/icon.png" alt="icon">
                </div>
                <div class="tool-info">
                    <h3 class="tool-name">
                        <?php
                            echo $symp_tool['tool_name'];
                        ?>
                    </h3>
                    <p class="description">
                        <?php
                            echo $symp_tool['tool_description'];
                        ?>
                    </p>
                    <div class="tool-price-owner">
                        <p class="price">
                            <?php
                                echo $symp_tool['tool_price'];
                            ?>
                        </p>
                        <p class="owner">
                            <?php
                                echo $symp_tool['tool_owner'];
                            ?>
                        </p>
                    </div>
                    <?php
                        if ($symp_tool['tool_type'] == "app") {

                    ?>
                    <div class="tool-app">
                        <img class="app-store" src="images/appstore.svg" alt="app store">
                        <img class="google-play" src="images/googleplay.svg" alt="google play">
                    </div>
                    <?php
                        }
                        else if ($symp_tool['tool_type'] == "link") {
                    ?>
                    <div class="tool-link">
                        <p><a href="<?php echo $tool_url['tool_url']; ?>">Click here for Link</a></p>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
        <div class="right-column">
            <?php
                echo $symptom_details['symptom_description'];
            ?>
        </div>
    </div>

    <?php
        include('includes/html/footer.inc.php');
    ?>

</body>
</html>
<?php
    mysqli_close($db);
?>