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
<header>表示ページ
</header>
	<!-- 表用のタグ -->
<!-- <tr>
	<th>u_name</th>
	<th>age</th>
	<th>解答1</th>
	<th>解答2</th>
	<th>解答3</th>
</tr>
<br> -->
<?php
////////////////////////文章表示

	//   //データベース接続
	  try{
		$pdo=new PDO('mysql:dbname=ank;charset=utf8;host=localhost','root','');
	  }catch(PDOException $e){
	   exit('DbConnectError:'.$e->getMessage());
	  }

	//				DB登録から抽出			//
	$stmt = $pdo->prepare("SELECT uname,age,id,解答1,解答2,解答3 FROM user_info");
	$status = $stmt->execute();
	$view ="";
	if($status==false){
		$error = $stmt->errorInfo();
		exit("ErrorQuery:".$error[2]);
	}else{
		while($result=$stmt->fetch(PDO::FETCH_ASSOC)){
			$view .= '<p style="margin: 10px 4px 0 15px;">';
			$view .= $result["uname"]."(".$result["age"].")は".$result["解答1"]."の".$result["解答3"]."で".$result["解答2"]."を食べる" ;
			$view .= '<a href="index_fourth.php?id='.$result["id"].'">';
			$view .= '更新はこちら';
			$view .= '</a>';
			$view .= '　';
			$view .= '<a href="index_sixth.php?id='.$result["id"].'">';
			$view .= '削除はこちら';
			$view .= '</a>';
			$view .= '</p>';
		}
	}
	echo $view;
?>

</body>
</html>