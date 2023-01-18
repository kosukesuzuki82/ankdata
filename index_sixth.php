<?php
// //データベース接続
try{
	$pdo=new PDO('mysql:dbname=ank;charset=utf8;host=localhost','root','');
	}catch(PDOException $e){
	 exit('DbConnectError:'.$e->getMessage());
	 }
//データを受け取り
$id = $_GET["id"];
//////////更新処理
$sql = "DELETE FROM user_info WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id',$id,PDO::PARAM_INT);
$status = $stmt->execute();

//データ判定・遷移
if($status==false){
	$error = $stmt->errorInfo();
	exit("ErrorQuery:".$error[2]);
}else{
	header("Location: index_third.php");	
	}

?>
