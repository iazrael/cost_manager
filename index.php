<?php
    /**
     * cost manager
     **/
     require_once('server/check-right.php');
     require_once('server/tb-db.php');
     
     $sql = 'SELECT * FROM record ';
     $result = $tbdb->query($sql);
     
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>COST</title>
    <link type="text/css" rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="wrapper">
        <h2 class="title">cost manager</h2>
        <div class="session">
            <h2 class="title">list</h2>
            <table id="costTable" class="cost-table">
                <thead>
                    <tr>
                        <th class="no"></th>
                        <th class="cost-time">消费时间</th>
                        <th class="name">消费项目</th>
                        <th class="amount">价格</th>
                        <th class="average-people">均摊人</th>
                        <th class="payer">付款人</th>
                        <th class="remark">备注</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $no = 1;
                    while($row=$tbdb->getarray($result)){
	 	$typeArr[$row[id]] = array('id'=>"$row[id]",'name'=>"$row[name]");
                ?>
                    <tr>
                        <td class="no"><?php echo $no++;?></td>
                        <td class="cost-time"><?php echo $row[costtime];?></td>
                        <td class="name"><?php echo $row[purchase];?></td>
                        <td class="amount"><?php echo $row[amount];?></td>
                        <td class="average-people"><?php echo $row[averagepeople];?></td>
                        <td class="payer"><?php echo $row[payer];?></td>
                        <td class="remark"><?php echo $row[remark];?></td>
                    </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td class="no"></td>
                        <td class="cost-time"><input id="costTime" name="cost-time" type="date" pattern="\d{4}-\d{1,2}-\d{1,2}"></td>
                        <td class="name"><input id="purchase" type="text"></td>
                        <td class="amount"><input id="amount" type="text"></td>
                        <td class="average-people">
                            <select id="averagePeople" multiple>
                                <option value="azrael">azrael</option>
                                <option value="cece">cece</option>
                                <option value="mia">mia</option>
                            </select>
                        </td>
                        <td class="payer">
                            <select id="payer">
                                <option value="azrael">azrael</option>
                                <option value="cece">cece</option>
                                <option value="mia">mia</option>
                            </select>
                        </td>
                        <td class="remark"><textarea id="remark"></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="7" class="cost-action">
                            <button id="addRecord" cmd="addRecord">save</button>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="session">
            <h2 class="title">clearing</h2>
            <div ></div>
        </div>
    </div>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/common.js"></script>
<script type="text/javascript" src="js/cost.js"></script>
</body>
</html>