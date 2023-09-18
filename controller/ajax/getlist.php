<?php

if(strtolower($_SERVER['HTTP_X_REQUESTED_WITH'] ?? '') != 'xmlhttprequest' && !isset($_GET['dev']))
{    
    http_response_code(401);
    exit;
}

require_once('../db.php');

//$sql = $db->prepare("SELECT * FROM sources WHERE UPPER(name) LIKE UPPER('%opPe%')");
$sql = $db->prepare("SELECT identifier, name, image FROM sources");
$sql->execute();

$list = array();

while($res = $sql->fetch()) {
    $source = array('identifier'=>$res['identifier'], 'name'=>$res['name'], 'image'=>$res['image']);
    array_push($list, $source);
}

$ret = array('status'=>'success', 'list'=>$list);

if(count($list) == 0) {
    $ret = array('status'=>'error', 'message'=>'Aucun film disponible.');
}
echo json_encode($ret)
;?>