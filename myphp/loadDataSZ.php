<?php    
    include 'openConn.php';
    
    $sql = "SELECT *,DATE_FORMAT(date,'%d.%m.%Y') AS szdate FROM kadri_change ORDER BY date DESC";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $outp = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($outp);
    } else { echo "[]"; }
    
    $conn = null;
?>