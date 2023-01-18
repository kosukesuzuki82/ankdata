

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
  <header>アンケートアプリ</header>
    <?php
	//POSTデータの受信
	$name = $_POST["name"];
	$age = $_POST["age"];
	echo $name;
	echo "さんこんにちは！！";
	//受信してなければ、処理を止める
	if(
		!isset($_POST["name"]) || $_POST["name"]=="" ||
		!isset($_POST["age"]) || $_POST["age"]==""
	  ){
		  exit('ParamError');
	  }
	  //データベース接続
	  try{
		  $pdo=new PDO('mysql:dbname=ank;charset=utf8;host=localhost','root','');
	  }catch(PDOException $e){
	   exit('DbConnectError:'.$e->getMessage());
	  }
	  //質問1
	  $stmt = $pdo->prepare("SELECT * FROM ques_db WHERE number = 1");
	  $status = $stmt->execute();
	  $view = "";
	  if($status==false){
		$error = $stmt->errorInfo();
		exit("ErrorQuery:".$error[2]);
	  }else{
		while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
			$view .= '<p>';
			$view .= $result["number"].":".$result["質問"];
			$view .= '</p>';
		}
	  }
	  //質問2
	  $stmt_ = $pdo->prepare("SELECT * FROM ques_db WHERE number = 2");
	  $status_ = $stmt_->execute();
	  $view_ = "";
	  if($status==false){
		$error = $stmt_->errorInfo();
		exit("ErrorQuery:".$error[2]);
	  }else{
		while($result = $stmt_->fetch(PDO::FETCH_ASSOC)){
			$view_ .= '<p>';
			$view_ .= $result["number"].":".$result["質問"];
			$view_ .= '</p>';
		}
	  }
	  //質問2
	  $stmt__ = $pdo->prepare("SELECT * FROM ques_db WHERE number = 3");
	  $status__ = $stmt__->execute();
	  $view__ = "";
	  if($status__==false){
		$error = $stmt__->errorInfo();
		exit("ErrorQuery:".$error[2]);
		}else{
			while($result = $stmt__->fetch(PDO::FETCH_ASSOC)){
			$view__ .= '<p>';
			$view__ .= $result["number"].":".$result["質問"];
			$view__ .= '</p>';
			}
		}
	//解答
		$stmt1 = $pdo->prepare("SELECT * FROM ques_db WHERE number =1");
		$status1 = $stmt1->execute();
		$view1 = "";
		$stmt2 = $pdo->prepare("SELECT * FROM ques_db WHERE number =1");
		$status2 = $stmt2->execute();
		$view2 = "";
		$stmt3 = $pdo->prepare("SELECT * FROM ques_db WHERE number =1");
		$status3 = $stmt3->execute();
		$view3 = "";
		if($status1==false){
			$error = $stmt1->errorInfo();
			$error = $stmt2->errorInfo();
			$error = $stmt3->errorInfo();
			exit("ErrorQuery:".$error[2]);
		}else{
			while($result = $stmt1->fetch(PDO::FETCH_ASSOC)){
				$view1 .= '<p>';
				$view1 .= $result["選択肢1"].//":".$result["質問"];
				$view1 .= '</p>';
				$view2 .= '<p>';
				$view2 .= $result["選択肢2"].//":".$result["質問"];
				$view2 .= '</p>';
				$view3 .= '<p>';
				$view3 .= $result["選択肢3"].//":".$result["質問"];
				$view3 .= '</p>';
			}
		}
		$stmt4 = $pdo->prepare("SELECT * FROM ques_db WHERE number = 2");
		$status4 = $stmt4->execute();
		$view4 = "";
		$stmt5 = $pdo->prepare("SELECT * FROM ques_db WHERE number = 2");
		$status5 = $stmt5->execute();
		$view5 = "";
		$stmt6 = $pdo->prepare("SELECT * FROM ques_db WHERE number = 2");
		$status6 = $stmt6->execute();
		$view6 = "";
		if($status4==false){
			$error = $stmt4->errorInfo();
			$error = $stmt5->errorInfo();
			$error = $stmt6->errorInfo();
			exit("ErrorQuery:".$error[2]);
		}else{
			while($result = $stmt4->fetch(PDO::FETCH_ASSOC)){
				$view4 .= '<p>';
				$view4 .= $result["選択肢1"].//":".$result["質問"];
				$view4 .= '</p>';
				$view5 .= '<p>';
				$view5 .= $result["選択肢2"].//":".$result["質問"];
				$view5 .= '</p>';
				$view6 .= '<p>';
				$view6 .= $result["選択肢3"].//":".$result["質問"];
				$view6 .= '</p>';
			}
		}
		$stmt7 = $pdo->prepare("SELECT * FROM ques_db WHERE number = 3");
		$status7 = $stmt7->execute();
		$view7 = "";
		$stmt8 = $pdo->prepare("SELECT * FROM ques_db WHERE number = 3");
		$status8 = $stmt8->execute();
		$view8 = "";
		if($status7==false){
			$error = $stmt7->errorInfo();
			$error = $stmt8->errorInfo();
			exit("ErrorQuery:".$error[2]);
		}else{
			while($result = $stmt7->fetch(PDO::FETCH_ASSOC)){
				$view7 .= '<p>';
				$view7 .= $result["選択肢1"].//":".$result["質問"];
				$view7 .= '</p>';
				$view8 .= '<p>';
				$view8 .= $result["選択肢2"].//":".$result["質問"];
				$view8 .= '</p>';

			}
		}
	  ?>
     <form method="post" action="index_second.php" style="width:100%">
		<div style="display:flex; justify-content:center;">
	    <select name="name" hidden>
		<option><?= $name?></option>
    	</select>
		<select name="age" hidden>
		<option><?= $age?></option>
    	</select>
		<div style="margin:10px 10px 1px 10px;">
		<img src="img/tizu.jpeg" style="width:300px;height:250px">
		<p><?php echo $view ?></p>
		<select style="width:50%" name="ans_one">
			<option><?= $view1 ?></option>
			<option><?= $view2 ?></option>
			<option><?= $view3 ?></option>
		</select>
	    </div>
		<div style="margin:10px 10px 1px 10px;">
		<img src="img/food.png" style="width:300px;height:250px">
		<p><?php echo $view_ ?></p>
		<select style="width:50%" name="ans_two">
			<option><?= $view4 ?></option>
			<option><?= $view5 ?></option>
			<option><?= $view6 ?></option>
		</select>
	    </div>
		<div style="margin:10px 10px 1px 10px;">
		<img src="img/or.jpeg" style="width:300px;height:250px">
		<p><?php echo $view__ ?></p>
		<select style="width:50%" name="ans_three">
			<option><?= $view7 ?></option>
			<option><?= $view8 ?></option>
		</select>
	    </div>
        </div>
		<div style="text-align:center; margin-top:50px"><input type="submit" value="送信" style="width:100px"></div>
     </form>

</body>
</html>