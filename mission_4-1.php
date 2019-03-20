
<?php
$dsn='nana.k';
$user='na7na7na7';
$password='shusho9hgc';
$pdo=new PDO($dsn,$user,$password,array(PDO::ATTR_ERRMODE=>
PDO::ERRMODE_WARNING));

$sql="CREATE TABLE IF NOT EXISTS mission4table1"
."("
."id INT auto_increment,primary key(id),"
."name char(32),"
."comment TEXT,"
."date TEXT ,"
."password TEXT"
.");";
$stmt=$pdo->query($sql);
?>
