<?php    
    include 'openConn.php';
    
    $sql = "SELECT * FROM group_of_users ORDER BY name";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $outp = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($outp);
    } else { echo "[]"; }
    
    $conn = null;
?>