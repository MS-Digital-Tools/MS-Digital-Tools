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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/symptom.css">
</head>
<body>
    <?php
        include('includes/html/header.inc.php');
    ?>

    <div class="breadcrumbs container-fluid">
        <div class="row justify-content-center">
            <div class="breadcrumb-text col-12 justify-content-start">
                <p><a href="index.php">Home</a> <i class="fa fa-caret-right"></i> <?php echo $symptom_title['symptom_name']; ?></p>
            </div>
        </div>
    </div>

    <div class="main-body col-11">
        <div class="row">
            <div class="left-column col-md-8 col-sm-12">
                <?php
                    while($symp_tool = mysqli_fetch_assoc($symp_tools_query)) {
                ?>
                <div class="tool-container container">
                    <div class="row">
                        <div class="d-flex">
                            <div class="tool-image flex-fill">
                                <img src="images/icon.png" alt="icon">
                            </div>
                            <div class="flex-fill pt-2 pl-2">
                                <div class="tool-info">
                                    <h3 class="tool-name row">
                                        <?php
                                            echo $symp_tool['tool_name'];
                                        ?>
                                    </h3>
                                    <p class="description row pr-4">
                                        <?php
                                            echo $symp_tool['tool_description'];
                                        ?>
                                    </p>
                                    <div class="tool-price-owner row">
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
                                    <div class="tool-app row">
                                        <img class="app-store" src="images/appstore.svg" alt="app store">
                                        <img class="google-play" src="images/googleplay.svg" alt="google play">
                                    </div>
                                    <?php
                                        }
                                        else if ($symp_tool['tool_type'] == "link") {
                                    ?>
                                    <div class="tool-link row">
                                        <p><a href="<?php echo $tool_url['tool_url']; ?>">Click here for Link</a></p>
                                    </div>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>
            <div class="right-column col-md-4 .d-none .d-sm-block">
                <?php
                    echo $symptom_details['symptom_description'];
                ?>
            </div>
        </div>
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