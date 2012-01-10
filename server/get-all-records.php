<?php
require_once('check-right2.php');
require_once('tb-db.php');
require_once('JSON.php');
require_once('functions.php');

header('Content-Type: application/json; charset=UTF-8');
$json = new Services_JSON();
$result = array();

$sql = "SELECT * FROM record WHERE isreconciled=0 ORDER BY costtime DESC";

$queryResult = $tbdb->query($sql);
$records = array();
while($row=$tbdb->getarray($queryResult)){
    $records[] = array(
        id=>$row[id],
        costtime=>$row[costtime],
        purchase=>$row[purchase],
        amount=>$row[amount],
        averagepeople=>$row[averagepeople],
        payer=>$row[payer],
        remark=>$row[remark],
        createtime=>$row[createtime],
        creator=>$row[creator],
        isreconciled=>$row[isreconciled]
    );
}

$result[success] = 1;
$result[records] = $records;
print($json->encode($result));

?>
