<!DOCTYPE hmtl>

<html>
	<head>
		<meta charset="UTF-8">
		<title>
			<?php
				echo "Pierwszy skrypt w PHP"
			?>
		</title>
	</head>
	<body>
		<?php
			echo "<h2>Pierwszy skrypt PHP</h2>";
			$n = 4567;
			$x = 10.123456789;
			echo "Domyślny format: n=".$n.", x=".$x
			."<br \> Zaokrąglenie do liczby całkowitej x=".round($x)
			."<br \>Z trzema cyframi po kropce x=".round($x,3)."<br \>";
			$nazwa='obraz1';
			print("<img src='miniaturki/$nazwa.JPG' alt='$nazwa' />");
		?>
	</body>
</html>