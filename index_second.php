<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
	<title>Document</title>
</head>
<body>
<p>登録完了</p>

<?php
    //データのPOST
	$name = $_POST["name"];
	$age = $_POST["age"];
	$ans_one = $_POST["ans_one"];
	$ans_two = $_POST["ans_two"];
	$ans_three = $_POST["ans_three"];
?>
<?php
	//				DB登録の処理					//
    //受信してなければ、処理を止める
	// if(
	// 	!isset($_POST["name"]) || $_POST["name"]=="" ||
	// 	!isset($_POST["age"]) || $_POST["age"]=="" ||
	// 	!isset($_POST["id"]) || $_POST["id"]=="" ||
	// 	!isset($_POST["ans_one"]) || $_POST["ans_one"]=="" ||
	// 	!isset($_POST["ans_two"]) || $_POST["ans_two"]=="" ||
	// 	!isset($_POST["ans_three"]) || $_POST["ans_three"]==""
	//   ){
	// 	  exit('ParamError');
	//   }
	  //データベース接続
	  try{
		$pdo=new PDO('mysql:dbname=ank;charset=utf8;host=localhost','root','');
	  }catch(PDOException $e){
	   exit('DbConnectError:'.$e->getMessage());
	  }
	  //データ登録SQL作成→ユーザーネーム/年齢を登録
	  $sql = "INSERT INTO user_info(uname,age,id,解答1,解答2,解答3)
			  VALUES(:a1,:a2,NULL,:a4,:a5,:a6)";
	  $stmt = $pdo->prepare($sql);
	  $stmt->bindValue(':a1',$name,PDO::PARAM_STR);
	  $stmt->bindValue(':a2',$age,PDO::PARAM_INT);
	  $stmt->bindValue(':a4',$ans_one,PDO::PARAM_STR);
	  $stmt->bindValue(':a5',$ans_two,PDO::PARAM_STR);
	  $stmt->bindValue(':a6',$ans_three,PDO::PARAM_STR);
	  $status = $stmt->execute();
	  //データ登録処理後
	  if($status==false){
		  //SQLにエラーがある場合
		  $error = $stmt->errorInfo();
		  exit("QueryError:".$error[2]);
	  }else{
		  //処理が終わると飛ぶサイトを指定
		  header("Location: index_third.php");
		  exit;
	  }
	//				DB登録の処理終了				//
?>

</body>
</html>