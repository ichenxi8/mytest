<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title></title>
</head>
<body>
	<?php
		$file_path = "info.txt";
		if(file_exists($file_path)){
			$fp = fopen($file_path, "w");
			$str = $_POST["id"] . PHP_EOL . $_POST["name"] . PHP_EOL . $_POST["password"] .PHP_EOL . $_POST["phone"] .PHP_EOL . $_POST["IpAddress"];
			fwrite($fp, $str);
			
		}
		fclose($fp);
	?>
	<?php
			$mydbhost = "localhost";
			$mydbuser = "root";
			$mydbpass = '123456';
			$ip = $_SERVER["REMOTE_ADDR"];
			$conn = mysqli_connect($mydbhost, $mydbuser, $mydbpass);
			if(! $conn){
				die("connect error: " . mysqli_error($conn));
			}
			 else
			{ 
				/*echo ('用户信息注册成功！')."<br/>"; */  /* Close the connection 关闭连接*/
				 	$url='../login/login.html';
					echo "<script>location.href='$url'</script>";
			}
			mysqli_select_db( $conn, 'qqpass');
			$sql="INSERT INTO information (id, name, password , phone, qauto, remember, lastlogin, readpolicy, IpAddress, showstatus, loginflag, showlogin,email)
			VALUES
			('$_POST[id]','$_POST[name]','$_POST[password]','$_POST[phone]' ,'1','1','0','1','$ip','离线','2','0', '$_POST[id]@qq.com')";
			$retval = mysqli_query($conn, $sql);
			if(! $retval){
				die("create error" . mysqli_error($conn));
			}
			mysqli_close($conn);
		?>
</body>
</html>
