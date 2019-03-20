<?php
$dsn='nana.k';
	$user='na7na7na7';
	$password='shusho9hgc';
	$pdo=new PDO($dsn,$user,$password,array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING));

  if(!empty($_POST['edit']) && !empty($_POST['password_e'])) {
	
	$sql='SELECT*FROM mission4table1';
	$stmt=$pdo->query($sql);
	foreach($stmt as $value){
		if($_POST['edit'] == $value[id] && $_POST['password_e'] == $value[password]){
				$editid=$value[id];
				$editname=$value[name];
				$editcomment=$value[comment];
				break;
				}
		}
	}
?>


<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>mission_4</title>
  </head>

  <body>
   <form action="mission_4-0.php" method="post">
   <p><input type="text" name="name" value="<?php echo $editname; ?>" placeholder="名前"></p>
   <p><input type="text" name="comment" value="<?php echo $editcomment; ?>" placeholder="コメント"></p>
   <p><input type="text" name="password" placeholder="パスワード"></p> <p><input type="submit" value="送信"></p>
   <p><input type="text" name="hide" value="<?php echo $editid; ?>"></p>
   </form>

	<form action="mission_4-0.php" method="post">
	<p><input type="text" name="delete" placeholder="削除対象番号"> 
	<p><input type="text" name="password_d" placeholder="パスワード"></p> <input type="submit" value="削除"></p>
	</form>  
  <form action="mission_4-0.php" method="post">
  <p><input type="text" name="edit" placeholder="編集対象番号" >
  <p><input type="text" name="password_e" placeholder="パスワード"></p> <input type="submit"value="編集"></p>
  </form>

  </body>
</html>






<?php  

//以下3-5利用 編集(3-7)と削除
$dsn='mysql:dbname=tt_833_99sv_coco_com;host=localhost';
$user='tt-833.99sv-coco';
$password='v3ReE2ju';
$pdo=new PDO($dsn,$user,$password,array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING));

 if(!empty($_POST['hide'])){
   	$id = $_POST['hide'];
   	$name = $_POST['name'];
   	$comment = $_POST['comment'];
   	$date = date('Y/m/d H:i:s');

	$sql='update mission4table1 set name=:name,comment=:comment,date=:date,password=:password where id=:id';
	$stmt=$pdo -> prepare($sql);
	$stmt->bindParam(':name',$name,PDO::PARAM_STR);
	$stmt->bindParam(':comment',$comment,PDO::PARAM_STR);
	$stmt->bindParam(':date',$date,PDO::PARAM_STR);
	$stmt->bindParam(':id',$id,PDO::PARAM_INT);
	$stmt->bindParam(':password',$password,PDO::PARAM_STR);
	$stmt->execute();
  }elseif(!empty($_POST['name']) && !empty($_POST['comment']) && !empty($_POST['password'])){

	$sql=$pdo -> prepare("INSERT INTO mission4table1(name,comment,date,password) VALUES(:name,:comment,:date,:password)");
	$sql -> bindParam(':name',$name,PDO::PARAM_STR);
	$sql -> bindParam(':comment',$comment,PDO::PARAM_STR);
	$sql -> bindParam(':date',$date,PDO::PARAM_STR);
	$sql -> bindParam(':password',$password,PDO::PARAM_STR);
	
	$name= $_POST['name'];
	$comment=$_POST['comment'];
	$date = date('Y/m/d H:i:s');
 	$password = $_POST['password'];
	$sql -> execute();
  }

//以上3-5
if (!empty($_POST['delete']) && !empty($_POST['password_d'])){
	$sql2='SELECT*FROM mission4table1';
	$stmt=$pdo->query($sql2);
 	foreach ($stmt as $value) {
 		if ($_POST['password_d'] == $value[password]){
 			$id = $_POST['delete'];
 			$sql = 'delete from mission4table1 where id=:id';
			$stmt = $pdo -> prepare($sql);
 			$stmt -> bindParam(':id',$id,PDO::PARAM_INT);
 			$stmt -> execute();
 			}
 		}
 }

//以下表示
$sql3='SELECT*FROM mission4table1';
$stmt = $pdo -> query($sql3);
$results=$stmt -> fetchAll();
 foreach($results as $row){
 	echo $row['id'].',';
 	echo $row['name'].',';
 	echo $row['comment'].',';
 	echo $row['date'].',';
 	echo $row['password'].'<br>';
 	}  


?>