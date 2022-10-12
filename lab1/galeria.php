<!DOCTYPE hmtl>

<html>
	<head>
		<meta charset="UTF-8">
		<title>
			<?php
				echo "Galeria"
			?>
		</title>
	</head>
	<body>
		<?php
			function galeria($rows, $cols)
            {
                $nazwa = "obraz";
                for ($i=1; $i<=$rows; $i++){
                    for ($j=1; $j<=$cols; $j++){
                        print("<img src='miniaturki/$nazwa$j.JPG' alt='$nazwa$j' />");
                    }
                    print("<br \>");
                }
            }
            galeria(3,3);
            galeria(4,2);
            galeria(2,4);
		?>
	</body>
</html>