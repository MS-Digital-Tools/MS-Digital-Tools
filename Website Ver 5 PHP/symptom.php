<?php 
    $db = mysqli_connect("89.187.86.8", "msdigita_main_php", "q1w2e3r417", "msdigita_main");
    $symp_ident = $_REQUEST['ident'];
    //All tools with ident ^^
    $symp_tools_query = $db->query("SELECT * FROM `Tools` a, `Tool_Symptoms` b, `Symptoms` c, `Tool_Assets` d WHERE a.`tool_id`=b.`tool_id`
     AND b.`symptom_id`=c.`symptom_id` AND a.`tool_id`=d.`tool_id` AND c.`symptom_ident`='".$symp_ident."'");
    $symp_detail_query = $db->query("SELECT `symptom_description` FROM `Symptoms` WHERE `symptom_ident`='".$symp_ident."'");
    $symptom_details = mysqli_fetch_assoc($symp_detail_query);
    $symp_url_query = $db->query("SELECT `symptom_more_info_link` FROM `Symptoms` WHERE `symptom_ident`='".$symp_ident."'");
    $symptom_info_url = mysqli_fetch_assoc($symp_url_query);
    $symp_title_query = $db->query("SELECT symptom_name FROM `Symptoms` WHERE `symptom_ident`='".$symp_ident."'");
    $symptom_title = mysqli_fetch_assoc($symp_title_query);

    $resultData = array();

    if($symp_tools_query->num_rows > 0) {
        while($row = $symp_tools_query->fetch_assoc()) {
            array_push($resultData, $row);
        }
    }
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
                    foreach($resultData as $tool) {
                ?>
                <div class="tool-container container">
                    <div class="row">
                    <div class="d-flex">
                            <div class="tool-image flex-fill">
                                <?php
                                    $toolImage = $tool['tool_image_url'];

                                    if ($toolImage == NULL) {
                                        $toolImage = 'images/icon.png';
                                    }

                                ?>
                                <img src="<?php echo $toolImage ?>" alt="icon">
                            </div>
                            <div class="flex-fill pt-2 pl-2">
                                <div class="tool-info">
                                    <h3 class="tool-name row pr-4">
                                        <?php
                                            echo $tool['tool_name'];
                                        ?>
                                    </h3>
                                    <p class="description row pr-4">
                                        <?php
                                            echo $tool['tool_description'];
                                        ?>
                                    </p>
                                    <div class="tool-price-owner row">
                                        <p class="price">
                                            <?php
                                                echo $tool['tool_price'];
                                            ?>
                                        </p>
                                        <p class="owner">
                                            <?php
                                                echo $tool['tool_owner'];
                                            ?>
                                        </p>
                                    </div>
                                    <div class="tool-app row">
                                        <?php
                                            $toolURL = $tool['tool_url'];
                                            if ($tool['tool_type'] == "iOS") {
                                        ?>
                                        <a href="<?php echo $toolURL ?>" target="_blank"><img class="app-store" src="images/appstore.svg" alt="App Store"></a>
                                        <?php
                                            }
                                            else if ($tool['tool_type'] == "Android") {
                                        ?>
                                        <a href="<?php echo $toolURL ?>" target="_blank"><img class="app-store" src="images/googleplay.svg" alt="Google Play"></a>
                                        <?php
                                            }
                                            else if ($tool['tool_type'] == "Video") {
                                        ?>
                                        <p>Link to Video <a href="<?php echo $toolURL ?>" target="_blank"><img class="image" src="images/play-button.svg" alt="Play Button"></p></a>
                                        <?php
                                            }
                                            else if ($tool['tool_type'] == "PDF") {
                                        ?>
                                        <p>Link to PDF <a href="<?php echo $toolURL ?>" target="_blank"><img class="image" src="images/pdf.svg" alt="PDF"></p></a>
                                        <?php
                                            }
                                            else if ($tool['tool_type'] == "Chatbot") {
                                        ?>
                                        <p>Link to Chatbot <a href="<?php echo $toolURL ?>" target="_blank"><img class="image" src="images/robot.svg" alt="Chatbot"></p></a>
                                        <?php
                                            }
                                            else {
                                        ?>
                                        <p><a href="<?php echo $toolURL ?>" target="_blank">Link to <?php echo $tool['tool_name'] ?></a></p>
                                        <?php
                                            }
                                        ?>
                                    </div>
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
                <h4>What is <?php echo $symptom_title['symptom_name']; ?>?</h3>
                <?php
                    echo $symptom_details['symptom_description'];
                ?>
                <p>For more information click the <a href="<?php echo $symptom_info_url['symptom_more_info_link'] ?>" target="_blank">link</a>.</p>
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