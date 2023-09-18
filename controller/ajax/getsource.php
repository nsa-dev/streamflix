<?php

if(strtolower($_SERVER['HTTP_X_REQUESTED_WITH'] ?? '') != 'xmlhttprequest' && !isset($_GET['dev']))
{    
    http_response_code(401);
    exit;
}

if(!isset($_GET['identifier']) || empty($_GET['identifier'])) exit;

require_once('../db.php');

//$sql = $db->prepare("SELECT * FROM sources WHERE UPPER(name) LIKE UPPER('%opPe%')");
$sql = $db->prepare("SELECT name, image, src FROM sources WHERE identifier=?");
$sql->execute(array(htmlspecialchars($_GET['identifier'])));

$list = array();

while($res = $sql->fetch()) {
    $source = array('name'=>$res['name'], 'image'=>$res['image'], 'src'=>$res['src']);
    array_push($list, $source);
}



if(count($list) == 0) $ret = array('status'=>'error', 'message'=>'Film non disponible.');
else $ret = array('status'=>'success', 'source'=>$source);
echo json_encode($ret)
;?>