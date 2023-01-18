<?php
// //データベース接続
try{
	$pdo=new PDO('mysql:dbname=ank;charset=utf8;host=localhost','root','');
	}catch(PDOException $e){
	 exit('DbConnectError:'.$e->getMessage());
	 }
//データを受け取り
$id = $_POST["id"];
$uname = $_POST["uname"];
$age = $_POST["age"];
$ans_one = $_POST["ans_one"];
$ans_two = $_POST["ans_two"];
$ans_three = $_POST["ans_three"];
//////////更新処理
$update = $pdo->prepare("UPDATE user_info SET uname=:uname,age=:age,解答1=:ans_one,解答2=:ans_two,解答3=:ans_three WHERE id=:id");
$update->bindValue(':uname',$uname,PDO::PARAM_STR);
$update->bindValue(':age',$age,PDO::PARAM_INT);
$update->bindValue(':ans_one',$ans_one,PDO::PARAM_STR);
$update->bindValue(':ans_two',$ans_two,PDO::PARAM_STR);
$update->bindValue(':ans_three',$ans_three,PDO::PARAM_STR);
$update->bindValue(':id',$id,PDO::PARAM_INT);
$status = $update->execute();
//ページ遷移
header("Location: index_third.php");
?>
