<?php 
    $db = mysqli_connect("89.187.86.8", "msdigita_main_php", "q1w2e3r417", "msdigita_main");

    $searchTerm = $_POST['input'];
    $queryType = $_POST['search_by'];
    $resultData = array();

    if ($queryType == "symptom") {
        $searchQuery = $db->query("SELECT * FROM `Tools` a, `Tool_Symptoms` b, `Symptoms` c WHERE a.`tool_id`=b.`tool_id` AND b.`symptom_id`=c.`symptom_id` AND c.`symptom_name` LIKE '%".$searchTerm."%'");
    }
    else if ($queryType == "language") {
        $searchQuery = $db->query("SELECT * FROM `Tools` a, `Tool_Language` b, `Language` c WHERE a.`tool_id`=b.`tool_id` AND b.`language_id`=c.`language_id` AND c.`language_name` LIKE '%".$searchTerm."%'");
    }
    else if ($queryType == "ms-type") {
        $searchQuery = $db->query("SELECT * FROM `Tools` a, `Tool_MS_Type` b, `MS_Type` c WHERE a.`tool_id`=b.`tool_id` AND b.`ms_type_id`=c.`ms_type_id` AND c.`ms_type_name` LIKE '%".$searchTerm."%'");
    }
    else if ($queryType == "tool-type") {

    }
    else if ($queryType == "all") {
        $tempResultArray = array();

        $searchQuerySymptom = $db->query("SELECT * FROM `Tools` a, `Tool_Symptoms` b, `Symptoms` c WHERE a.`tool_id`=b.`tool_id` AND b.`symptom_id`=c.`symptom_id` AND c.`symptom_name` LIKE '%".$searchTerm."%'");
        $searchQueryLanguage = $db->query("SELECT * FROM `Tools` a, `Tool_Language` b, `Language` c WHERE a.`tool_id`=b.`tool_id` AND b.`language_id`=c.`language_id` AND c.`language_name` LIKE '%".$searchTerm."%'");
        $searchQueryMSType = $db->query("SELECT * FROM `Tools` a, `Tool_MS_Type` b, `MS_Type` c WHERE a.`tool_id`=b.`tool_id` AND b.`ms_type_id`=c.`ms_type_id` AND c.`ms_type_name` LIKE '%".$searchTerm."%'");
        $searchQueryNameDescrip = $db->query("SELECT * FROM `Tools` WHERE tool_description LIKE '%".$searchTerm."%' OR tool_name LIKE '%".$searchTerm."%' ORDER BY tool_name ASC");

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
    <link rel="stylesheet" href="css/symptom.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body>

    <?php
        include('includes/html/header.inc.php');
    ?>

    <div class="main-body">
        <div class="left-column">
            <?php
                foreach($resultData as $tool) {
            ?>
            <div class="tool-container">
                <div class="tool-image">
                    <img src="images/icon.png" alt="icon">
                </div>
                <div class="tool-info">
                    <h3 class="tool-name">
                        <?php
                            echo $tool['tool_name'];
                        ?>
                    </h3>
                    <p class="description">
                        <?php
                            echo $tool['tool_description'];
                        ?>
                    </p>
                    <div class="tool-price-owner">
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
                    <?php
                        if ($tool['tool_type'] == "app") {

                    ?>
                    <div class="tool-app">
                        <img class="app-store" src="images/appstore.svg" alt="app store">
                        <img class="google-play" src="images/googleplay.svg" alt="google play">
                    </div>
                    <?php
                        }
                        else if ($tool['tool_type'] == "link") {
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