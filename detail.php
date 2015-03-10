<html>
	<body>
		<center>
			<?php
			session_start();
			if(isset($_SESSION["usr"])){
				if(isset($_REQUEST["id"])){
					require("config.php");
					$query = "SELECT * FROM TOKO WHERE Status=1";
					$res = mysql_query($query);
					while($baris = mysql_fetch_array($res)){
						if($_REQUEST["id"]==$baris[0]){
							echo $baris[1]."<br>";
							echo $baris[5]."<br>";
							echo "Nama : ".$baris[1]."<br>";
							echo "Alamat : ".$baris[2]."<br>";
							echo "Nomer Telp : ".$baris[3]."<br>";
							echo "Jam Oprasional : ".$baris[4]."<br>";
							echo "Rating"."<br>";
							break;
						}
					}
				}
				}
				
				else {
					header("location:index.php");
				}
			?>
		</center>
	</body>
</html>