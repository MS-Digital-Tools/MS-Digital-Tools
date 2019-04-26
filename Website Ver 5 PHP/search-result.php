<?php 
    $db = mysqli_connect("89.187.86.8", "msdigita_main_php", "q1w2e3r417", "msdigita_main");

    $searchTerm = $_POST['input'];
    $queryType = $_POST['search_by'];
    $resultData = array();

    if ($queryType == "symptom") {
        $searchQuery = $db->query("SELECT * FROM `Tools` a, `Tool_Symptoms` b, `Symptoms` c, `Tool_Assets` d WHERE a.`tool_id`=b.`tool_id` AND b.`symptom_id`=c.`symptom_id` AND a.`tool_id`=d.`tool_id` AND c.`symptom_name` LIKE '%".$searchTerm."%'");
    }
    else if ($queryType == "language") {
        $searchQuery = $db->query("SELECT * FROM `Tools` a, `Tool_Language` b, `Language` c, `Tool_Assets` d WHERE a.`tool_id`=b.`tool_id` AND b.`language_id`=c.`language_id` AND a.`tool_id`=d.`tool_id` AND c.`language_name` LIKE '%".$searchTerm."%'");
    }
    else if ($queryType == "ms-type") {
        $searchQuery = $db->query("SELECT * FROM `Tools` a, `Tool_MS_Type` b, `MS_Type` c, `Tool_Assets` d WHERE a.`tool_id`=b.`tool_id` AND b.`ms_type_id`=c.`ms_type_id` AND a.`tool_id`=d.`tool_id` AND c.`ms_type_name` LIKE '%".$searchTerm."%'");
    }
    else if ($queryType == "tool-type") {
        $searchQuery = $db->query("SELECT * FROM `Tools` a, `Tool_Assets` b WHERE a.`tool_id`=b.`tool_id` AND b.`tool_type` LIKE '%".$searchTerm."%'");
    }
    else if ($queryType == "all") {
        $tempResultArray = array();

        $searchQuerySymptom = $db->query("SELECT * FROM `Tools` a, `Tool_Symptoms` b, `Symptoms` c, `Tool_Assets` d WHERE a.`tool_id`=b.`tool_id` AND b.`symptom_id`=c.`symptom_id` AND a.`tool_id`=d.`tool_id` AND c.`symptom_name` LIKE '%".$searchTerm."%'");
        $searchQueryLanguage = $db->query("SELECT * FROM `Tools` a, `Tool_Language` b, `Language` c, `Tool_Assets` d WHERE a.`tool_id`=b.`tool_id` AND b.`language_id`=c.`language_id` AND a.`tool_id`=d.`tool_id` AND c.`language_name` LIKE '%".$searchTerm."%'");
        $searchQueryMSType = $db->query("SELECT * FROM `Tools` a, `Tool_MS_Type` b, `MS_Type` c, `Tool_Assets` d WHERE a.`tool_id`=b.`tool_id` AND b.`ms_type_id`=c.`ms_type_id` AND a.`tool_id`=d.`tool_id` AND c.`ms_type_name` LIKE '%".$searchTerm."%'");
        $searchQueryNameDescrip = $db->query("SELECT * FROM `Tools` a, `Tool_Assets` b WHERE a.`tool_id`=b.`tool_id` AND (tool_description LIKE '%".$searchTerm."%' OR tool_name LIKE '%".$searchTerm."%') ORDER BY tool_name ASC");
        $searchQueryToolType = $db->query("SELECT * FROM `Tools` a, `Tool_Assets` b WHERE a.`tool_id`=b.`tool_id` AND b.`tool_type` LIKE '%".$searchTerm."%'");

        while($row = $searchQuerySymptom->fetch_assoc()) {
            array_push($tempResultArray, $row);
        }

        while($row = $searchQueryLanguage->fetch_assoc()) {
            array_push($tempResultArray, $row);
        }

        while($row = $searchQueryMSType->fetch_assoc()) {
            array_push($tempResultArray, $row);
        }

        while($row = $searchQueryNameDescrip->fetch_assoc()) {
            array_push($tempResultArray, $row);
        }

        while($row = $searchQueryToolType->fetch_assoc()) {
            array_push($tempResultArray, $row);
        }

        $resultData = $tempResultArray;

    }

    if ($queryType != "all"){
        if($searchQuery->num_rows > 0) {
            while($row = $searchQuery->fetch_assoc()) {
                array_push($resultData, $row);
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search Results</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/search-result.css">
</head>
<body>

    <?php
        include('includes/html/header.inc.php');
    ?>

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
                                    <div class="tool-app row pb-3">
                                        <?php
                                            $toolURL = $tool['tool_url'];
                                            if ($tool['tool_type'] == "iOS") {
                                        ?>
                                        <a href="<?php echo $toolURL ?>" target="_blank"><img src="images/appstore.svg" alt="App Store"></a>
                                        <?php
                                            }
                                            else if ($tool['tool_type'] == "Android") {
                                        ?>
                                        <a href="<?php echo $toolURL ?>" target="_blank"><img src="images/googleplay.svg" alt="Google Play"></a>
                                        <?php
                                            }
                                            else if ($tool['tool_type'] == "Video") {
                                        ?>
                                        <p>Link to Video <a href="<?php echo $toolURL ?>" target="_blank"><img src="images/play-button.svg" alt="Play Button"></p></a>
                                        <?php
                                            }
                                            else if ($tool['tool_type'] == "PDF") {
                                        ?>
                                        <p>Link to PDF <a href="<?php echo $toolURL ?>" target="_blank"><img src="images/pdf.svg" alt="PDF"></p></a>
                                        <?php
                                            }
                                            else if ($tool['tool_type'] == "Chatbot") {
                                        ?>
                                        <p>Link to Chatbot <a href="<?php echo $toolURL ?>" target="_blank"><img src="images/robot.svg" alt="Chatbot"></p></a>
                                        <?php
                                            }
                                            else {
                                        ?>
                                        <p><a href="<?php echo $toolURL ?>" target="_blank"><?php echo $tool['tool_name'] ?></a></p>
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