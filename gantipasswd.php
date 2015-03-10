<?php
	session_start();
	if(isset($_SESSION["usr"])){
	require("config.php");
	if(isset($_REQUEST["gantipasswd"])){
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
			if($_REQUEST["pasbr"]==$_REQUEST["paskonf"]){
				$query = "UPDATE ADMIN SET Password='".$_REQUEST["pasbr"]."' where Username='".$_REQUEST["usr"]."'";
				$UPDATE=mysql_query($query);
				if(!$UPDATE){
					echo "Gagal Update Password".mysql_error();
					}
				else{
					echo "Update Password Berhasil";
					}
			
			
			}
		}else{
			echo "Username atau Password Salah";
		}
	}
		}
	
		else {
					header("location:index.php");
				}
?>
<html>
	<body>
		<center>
			<form action="gantipasswd.php" method="POST">
				<h2>Password</h2>
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
					<tr>
						<td>Password Baru</td>
						<td>:</td>
						<td><input type="password" name="pasbr" id="pasbr"/></td>
					</tr>
					<tr>
						<td>Konfirm Password</td>
						<td>:</td>
						<td><input type="password" name="paskonf" id="paskonf"/></td>
					</tr>
				</table>
				<input type="submit" name="gantipasswd" value="Submit"/>
			</form>
		</center>
	</body>
</html>