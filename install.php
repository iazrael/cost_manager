<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Install Tally Book</title>
    <style type="text/css">
    	p{
    		text-align: center;
    	}
    	.info{
    		color: #000;
    	}
    	.error{
    		color: #ff0000;
    	}
    	.success{
    	   color: #369;
    	}
    </style>
</head>
<body>
<?php

require_once('server/db-config.php');

$connect = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);

 if(mysql_select_db(DB_NAME,$connect)){
	echo '<p class="info">数据库已经存在.</p>';
}else{
	if(mysql_query("CREATE DATABASE ".DB_NAME , $connect)){
		echo '<p class="info">创建数据库成功.</p>';
	}else{
		echo '<p class="error">创建数据库出错,请检查配置!<br/>'.mysql_error().'</p>';
		return;
	}
}
mysql_query("SET NAMES 'utf8'") or startUpError('SET NAMES Error.');
if(mysql_select_db(DB_NAME,$connect)){
	/* if(!mysql_query("CREATE TABLE `app_cost_reconciliation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `records` varchar(200) NOT NULL,
  `result` varchar(200) NOT NULL,
  `createtime` date NOT NULL,
  `creator` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;")){
		echo "<p class='error'>创建表 reconciliation 出错: ".mysql_error()."</p>";
		return;
	}else if(!mysql_query("CREATE TABLE `app_cost_record` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `costtime` date NOT NULL,
  `purchase` varchar(200) NOT NULL,
  `amount` float NOT NULL,
  `averagepeople` varchar(200) NOT NULL,
  `payer` varchar(45) NOT NULL,
  `remark` varchar(200) NOT NULL,
  `createtime` datetime NOT NULL,
  `creator` varchar(45) NOT NULL,
  `isreconciled` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;")){
		echo "<p class='error'>record 出错: ".mysql_error()."</p>";
		return;
	}else if(!mysql_query("CREATE TABLE `app_cost_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` varchar(45) NOT NULL,
  `pwd` varchar(45) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;")){
		echo "<p class='error'>user 失败!</p>";
        return;
	}else  */if(!mysql_query("INSERT INTO `app_cost_user` (`id`,`uid`,`pwd`,`name`) VALUES 
 (1,'azrael','asdf3.14',NULL),
 (2,'cece','tencent',NULL),
 (3,'mia','tencent',NULL);")){
		echo "<p class='error'>添加user 失败!".mysql_error()."</p>";
        return;
	}else{
        echo "<p class='error'>成功!</p>";
    }
	
	echo '<p class="success">数据库初始化成功!<br/><br/>你现在可以开始使用了!</p><p class="success">点击<a href="./" >这里</a>回到首页</p>';
}else{
	echo '<p class="error">选择数据库出错!<br/>'.mysql_error().'</p>';
	return;
} 
?>
</body>
</html>
