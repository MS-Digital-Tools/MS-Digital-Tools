<?php 
    $db = mysqli_connect("89.187.86.8", "msdigita_main_php", "q1w2e3r417", "msdigita_main");

    $searchTerm = $_GET['term'];
    $queryType = $_GET['type'];

    $resultData = array();

    if ($queryType == "symptom") {
        $searchQuery = $db->query("SELECT * FROM Symptoms WHERE symptom_name LIKE '%".$searchTerm."%' ORDER BY symptom_name ASC");

        if($searchQuery->num_rows > 0) {
            while($row = $searchQuery->fetch_assoc()) {
                $data['result_id'] = $row['symptom_id'];
                $data['value'] = $row['symptom_name'];
                $data['category'] = '';
                array_push($resultData, $data);
            }
        }
    }
    else if ($queryType == "language") {
        $searchQuery = $db->query("SELECT * FROM `Language` WHERE language_name LIKE '%".$searchTerm."%' ORDER BY language_name ASC");

        if($searchQuery->num_rows > 0) {
            while($row = $searchQuery->fetch_assoc()) {
                $data['result_id'] = $row['language_id'];
                $data['value'] = $row['language_name'];
                $data['category'] = '';
                array_push($resultData, $data);
            }
        }
    }
    else if ($queryType == "ms-type") {
        $searchQuery = $db->query("SELECT * FROM MS_Type WHERE ms_type_name LIKE '%".$searchTerm."%' ORDER BY ms_type_name ASC");
        
        if($searchQuery->num_rows > 0) {
            while($row = $searchQuery->fetch_assoc()) {
                $data['result_id'] = $row['ms_type_id'];
                $data['value'] = $row['ms_type_name'];
                $data['category'] = '';
                array_push($resultData, $data);
            }
        }
    }
    else if ($queryType == "tool-type") {
        $searchQuery = $db->query("SELECT * FROM `Tool_Assets` WHERE tool_type LIKE '%".$searchTerm."%'");
        
        if($searchQuery->num_rows > 0) {
            while($row = $searchQuery->fetch_assoc()) {
                $data['result_id'] = '';
                $data['value'] = $row['tool_type'];
                $data['category'] = '';
                array_push($resultData, $data);
            }
        }

        $resultData = array_unique($resultData);
    }
    else if ($queryType == "all") {
        $tempSymptom = array();
        $tempLanguage = array();
        $tempMSType = array();
        $tempToolType = array();

        $searchQuerySymptom = $db->query("SELECT * FROM Symptoms WHERE symptom_name LIKE '%".$searchTerm."%' ORDER BY symptom_name ASC");
        $searchQueryLanguage = $db->query("SELECT * FROM `Language` WHERE language_name LIKE '%".$searchTerm."%' ORDER BY language_name ASC");
        $searchQueryMSType = $db->query("SELECT * FROM MS_Type WHERE ms_type_name LIKE '%".$searchTerm."%' ORDER BY ms_type_name ASC");
        $searchQueryToolType = $db->query("SELECT * FROM `Tool_Assets` WHERE tool_type LIKE '%".$searchTerm."%'");
        

        while($row = $searchQuerySymptom->fetch_assoc()) {
            $data['result_id'] = $row['symptom_id'];
            $data['value'] = $row['symptom_name'];
            $data['category'] = 'symptom';
            array_push($tempSymptom, $data);
        }

        while($row = $searchQueryLanguage->fetch_assoc()) {
            $data['result_id'] = $row['language_id'];
            $data['value'] = $row['language_name'];
            $data['category'] = 'language';
            array_push($tempLanguage, $data);
        }

        while($row = $searchQueryMSType->fetch_assoc()) {
            $data['result_id'] = $row['ms_type_id'];
            $data['value'] = $row['ms_type_name'];
            $data['category'] = 'MS type';
            array_push($tempMSType, $data);
        }
        
        while($row = $searchQueryToolType->fetch_assoc()) {
            $data['result_id'] = '';
            $data['value'] = $row['tool_type'];
            $data['category'] = 'tool type';
            array_push($tempToolType, $data);
        }

        $resultData = array_merge($tempSymptom, $tempLanguage, $tempMSType, array_unique($tempToolType));

    }

    echo json_encode($resultData);

    mysqli_close($db);
?>