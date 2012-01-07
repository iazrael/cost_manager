<?php
require_once('check-right2.php');
require_once('tb-db.php');
require_once('JSON.php');
require_once('functions.php');

header('Content-Type: application/json; charset=UTF-8');
$json = new Services_JSON();
$result = array();

$user = $_SESSION['loginuser'];
$costTime = escape_string($_POST['costTime']);
$purchase = escape_string($_POST['purchase']);
$amount = escape_string($_POST['amount']);
$averagePeople = escape_string($_POST['averagePeople']);
$payer = escape_string($_POST['payer']);
$remark = escape_string($_POST['remark']);

$sql = "INSERT INTO record(costtime,purchase,amount,averagepeople,payer,remark,createtime,creator) 
				VALUES('$costTime','$purchase',$amount,'$averagePeople','$payer','$remark',now(),'$user')";

if($tbdb->insert($sql)){
    $result[success] = 1;
    $result[id] = $tbdb->getid();
    print($json->encode($result));
}else{
    $result[success] = 0;
    print($json->encode($result));
}

?>
