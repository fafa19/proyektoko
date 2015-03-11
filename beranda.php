<html>
	<body>
		<center>
			<?php
				session_start();
				if(isset($_SESSION["usr"])){
					require("config.php");
					echo "Toko Buku Paling Sering Dilihat <br>";
					$temp=0;
					$query = "SELECT T.Id_Toko, T.Nama, T.Gambar FROM POPULER P, TOKO T WHERE P.Id_Toko=T.Id_Toko AND T.Status=1 ORDER BY P.View DESC";
					$res = mysql_query($query);
					while($baris = mysql_fetch_array($res)){
						if($temp<=3){
							echo $baris[1]."<br>";
							echo "<a href='detail.php?id=$baris[0]'>".$baris[2]."</a><br>"."<br>"."<br>"."<br>";
						}else{
							break;
						}
					}
					echo "<br><br><br>";
					echo "Toko Buku Dengan Rating Tertinggi <br>";
					$temp1=0;
					$query1 = "SELECT T.Id_Toko, T.Nama, T.Gambar FROM RATING R, TOKO T WHERE R.Id_Toko=T.Id_Toko AND T.Status=1 ORDER BY R.RATING DESC";
					$res1 = mysql_query($query1);
					while($baris1 = mysql_fetch_array($res1)){
						if($temp1<=3){
							echo $baris1[1]."<br>";
							echo "<a href='detail.php?id=$baris1[0]'>".$baris1[2]."</a><br>"."<br>"."<br>"."<br>";
						}else{
							break;
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