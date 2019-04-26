<?php 
    $db = mysqli_connect("89.187.86.8", "msdigita_main_php", "q1w2e3r417", "msdigita_main");
    $searchTerm = $_GET['term'];
    $searchQuery = $db->query("SELECT * FROM Symptoms WHERE symptom_name LIKE '%".$searchTerm."%' ORDER BY symptom_name ASC");
    $symptomData = array();
    if($searchQuery->num_rows > 0) {
        while($row = $searchQuery->fetch_assoc()) {
            $data['symptom_id'] = $row['symptom_id'];
            $data['value'] = $row['symptom_name'];
            array_push($symptomData, $data);
        }
    }
    echo json_encode($symptomData);
    mysqli_close($db);
?>