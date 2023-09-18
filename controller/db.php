<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=streamflix', 'root', '');
} catch(PDOException $e) {
    if(isset($_GET['dev'])) { echo $e->getMessage().'<br/>'; }
    $res = array('status' => 'error', 'message' => 'Database connection error');
    echo json_encode($res);
    exit;
}
?>