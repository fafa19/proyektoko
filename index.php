<?php
	session_start();
	require("config.php");
	if(isset($_REQUEST["log"])){
		$cek=0;
		$query = "SELECT * FROM ADMIN";
		$res = mysql_query($query);
		while($baris = mysql_fetch_array($res)){
			if($baris[3]==1){
				if($_REQUEST["usr"]==$baris[0] && $_REQUEST["pas"]==$baris[1]){
					$cek=1;
					$_SESSION["usr"]=$baris[0];
					$_SESSION["nama"]=$baris[2];
					break;
				}
			}
		}
		if($cek==1){
			header("location:beranda.php");
		}else{
			echo "Gagal Login";
		}
	}
?>
<html>
	<body>
		<center>
			<form action="index.php" method="POST">
				<h2>Login</h2>
				<table>
					<tr>
						<td>Username</td>
						<td>:</td>
						<td><input type="input" name="usr" id="usr"/></td>
					</tr>
					<tr>
						<td>Password</td>
						<td>:</td>
						<td><input type="password" name="pas" id="pas"/></td>
					</tr>
				</table>
				<input type="submit" name="log" value="Login In"/>
			</form>
		</center>
	</body>
</html>