<?php

session_start();
include('conexion.php');

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/sweetalert2.css">
	<link rel="stylesheet" href="css/material.min.css">
	<link rel="stylesheet" href="css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="css/jquery.mCustomScrollbar.css">
	<link rel="stylesheet" href="css/main.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
	<script>window.jQuery || document.write('<script src="js/jquery-1.11.2.min.js"><\/script>')</script>
	<script src="js/material.min.js" ></script>
	<script src="js/sweetalert2.min.js" ></script>
	<script src="js/jquery.mCustomScrollbar.concat.min.js" ></script>
	<script src="js/main.js" ></script>
</head>
<body>
	
	<section>
	<!-- navBar -->
	
	
		<!-- pageContent -->
		<section class="full-width pageContent">
			<section class="full-width text-center" style="padding: 20px 0;">
				<h3 class="text-center tittles">Información</h3>
				<!-- Tiles -->


				<?php

				$sql = "SELECT tipopersonas.nombre_tip, COUNT(personas.documento_per ) as total FROM personas INNER JOIN tipopersonas ON personas.codigo_tip = tipopersonas.codigo_tip  GROUP BY tipopersonas.nombre_tip";
				//echo $sql;
				// card con base de datos integrado con numero de Roles de Usuario registrados en la db
				$resultado = $conn->query($sql);

				// Comprobar si hay resultados
				if ($resultado->num_rows > 0) {
					// Output data of each row
					while($row = $resultado->fetch_assoc()) {

						echo '<article class="full-width tile">
								<div class="tile-text">
									<span class="text-condensedLight">
										'.$row["total"].'<br></br>
										<small>'.$row["nombre_tip"].'</small>
									</span>
								</div>
								<i class="zmdi zmdi-accounts tile-icon"></i>
							</article>';
					}
				} else {
					echo "0 results";
				}

				?>
				
			</section>
		</section>
	</section>
</body>
</html>