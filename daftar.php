<html>
	<body>
		<center>
			<?php
				session_start();
				if(isset($_SESSION["usr"])){
				require("config.php");
				$query = "SELECT * FROM TOKO WHERE Status=1";
				$res = mysql_query($query);
				echo "<table>";
				echo "<tr>";
					echo "<td>Nama</td>";
					echo "<td>Alamat</td>";
					echo "<td>Nomer Telp</td>";
					echo "<td>Jam Oprasional</td>";
					echo "<td>Operasi</td>";
				echo "</tr>";
				while($baris = mysql_fetch_array($res)){
					echo "<tr>";
						echo "<td>".$baris[1]."</td>";
						echo "<td>".$baris[2]."</td>";
						echo "<td>".$baris[3]."</td>";
						echo "<td>".$baris[4]."</td>";
						echo "<td>Update Delete</td>";
					echo "</tr>";
				}
				echo "</table>";
				
				}
				
				else {
					header("location:index.php");
				}
			?>
		</center>
	</body>
</html>