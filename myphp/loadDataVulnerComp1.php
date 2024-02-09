<?php    
    include 'openConn.php';

    $id_vulner = $_GET['i'];
    $sono      = $_GET['s'];
    $id_scan   = $_GET['sc'];

    if ($sono == "") {
        $sql = "SELECT cv.id_comp, cv.sono, cv.id_vulner, cm.name, cm.user, cm.script_ok_datetime, cm.script_last_datetime, cm.maxreestr, cm.id_category, cm.esk_status
        FROM comp_vulner1 AS cv 
        LEFT JOIN comp AS cm ON cv.id_comp=cm.id
        WHERE cv.id_vulner=$id_vulner AND cv.on_off='1' AND id_scan=$id_scan
        ORDER BY cm.name";    
    } else {
        $sql = "SELECT cv.id_comp, cv.sono, cv.id_vulner, cm.name, cm.user, cm.script_ok_datetime, cm.script_last_datetime, cm.maxreestr, cm.id_category, cm.esk_status
        FROM comp_vulner1 AS cv 
        LEFT JOIN comp AS cm ON cv.id_comp=cm.id
        WHERE cv.id_vulner=$id_vulner AND cv.on_off='1' AND cv.sono LIKE '$sono' AND id_scan=$id_scan
        ORDER BY cm.name";    
    }

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $outp = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($outp);
    } else { echo "[]"; }
    
    $conn = null;
?>