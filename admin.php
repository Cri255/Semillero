<?php
session_start();
include('conexion.php');

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Administrador</title>
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
	

	<!-- navBar -->
	<div class="full-width navBar">
		<div class="full-width navBar-options">
			<i class="zmdi zmdi-more-vert btn-menu" id="btn-menu"></i>	
			<div class="mdl-tooltip" for="btn-menu">Menu</div>
			<nav class="navBar-options-list">
				<ul class="list-unstyle">
					
					<li class="btn-exit" id="btn-exit">
						<i class="zmdi zmdi-power"></i>
						<div class="mdl-tooltip" for="btn-exit">Cerrar Sesión</div>
					</li>
					<li class="text-condensedLight noLink" ><small>Nombre: <?php echo $_SESSION['nombre'] ?>
						</small></li>

						<li class="noLink">
						<figure>
							<?php if(isset($_SESSION['imagen'])): ?>
								<img src="<?php echo $_SESSION['imagen']; ?>" alt="Avatar" class="img-responsive">
							<?php else: ?>
								<img src="assets/img/avatar-male.png" alt="Avatar" class="img-responsive">
							<?php endif; ?>
						</figure>
						</li>

				</ul>
			</nav>
		</div>
	</div>

	<!-- navLateral -->
	<section class="full-width navLateral">
		<div class="full-width navLateral-bg btn-menu"></div>
		<div class="full-width navLateral-body">
			<div class="full-width navLateral-body-logo text-center tittles">
				<i class="zmdi zmdi-close btn-menu"></i> ProyectHub
			</div>
			<figure class="full-width" style="height: 77px;">
				<div class="navLateral-body-cl">
				<figure>
							<?php if(isset($_SESSION['imagen'])): ?>
								<img src="<?php echo $_SESSION['imagen']; ?>" alt="Avatar" class="img-responsive">
							<?php else: ?>
								<img src="assets/img/avatar-male.png" alt="Avatar" class="img-responsive">
							<?php endif; ?>
				</div>

				<figcaption class="navLateral-body-cr hide-on-tablet">
					<span>
					Nombre: <?php echo $_SESSION['nombre'] ?> <br>
						<small>Rol: <?php echo $_SESSION['rol'] ?> </small>
					</span>
				</figcaption>
			</figure>
			<div class="full-width tittles navLateral-body-tittle-menu">
				<i class="zmdi zmdi-desktop-mac"></i><span class="hide-on-tablet">&nbsp; DASHBOARD</span>
			</div>

<!----------------------------------------------------------------SECCIÓN DE ADMIN---------------------------------------------------------------->

						<?php
							if($_SESSION['tipo'] == 3){ // Numero 3 Admin

						?>

			<nav class="full-width">
				<ul class="full-width list-unstyle menu-principal">
					<li class="full-width">
						<a href="home.php" class="full-width">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-view-dashboard"></i>
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								INICIO
							</div>
						</a>
					</li>
					<li class="full-width divider-menu-h"></li>
					<li class="full-width">

						

						<a href="#!" class="full-width btn-subMenu">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-face"></i>
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								USUARIOS
							</div>
							<span class="zmdi zmdi-chevron-left"></span>
						</a>
						<ul class="full-width menu-principal sub-menu-options">
							<li class="full-width">
								<a href="admin.php" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-account"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										ADMINISTRADOR
									</div>
								</a>
							</li>
							<li class="full-width">
								<a href="profesor.php" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-accounts"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										PROFESORES
									</div>
								</a>
							</li>
							<li class="full-width">
								<a href="estudiante.php" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-accounts"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										ESTUDIANTES
									</div>
								</a>
							</li>
						</ul>


					<li class="full-width">
						<a href="subir_archivos/lista_archivos.php" class="full-width">
							<div class="navLateral-body-cl">
								<i class="fas fa-book"></i>
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								Visualizar Proyectos
							</div>
						</a>
					</li>


					<li class="full-width">
						<a href="./change_pass/cambiarpass.php" class="full-width">
							<div class="navLateral-body-cl">
								<i class="fas fa-key"></i> 
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								Cambiar Contraseña
							</div>
						</a>
					</li>
					
					<li class="full-width">
						<a href="informe_prof.php" class="full-width">
							<div class="navLateral-body-cl">
								<i class="fas fa-file-alt"></i> <!-- Cambiado el ícono aquí -->
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								Generar Informe Profesor 
							</div>
						</a>
					</li>
					
					<li class="full-width">
						<a href="informe_estu.php" class="full-width">
							<div class="navLateral-body-cl">
								<i class="fas fa-file-alt"></i> 
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								Generar Informe Estudiante
							</div>
						</a>
					</li>

					<li class="full-width">
						<a href="CRUD/Tabla_usuarios.php" class="full-width">
							<div class="navLateral-body-cl">
								<i class="fas fa-users"></i> 
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								Mostrar Usuarios
							</div>
						</a>
					</li>


				<li class="full-width divider-menu-h"></li>
				<li class="full-width">

								<a href="#!" class="full-width btn-subMenu">
				<div class="navLateral-body-cl">
					<i class="zmdi zmdi-folder"></i> <!-- Icono de Proyectos -->
				</div>
				<div class="navLateral-body-cr hide-on-tablet">
					Información Proyectos
				</div>
				<span class="zmdi zmdi-chevron-left"></span>
			</a>



			<ul class="full-width menu-principal sub-menu-options">
				<li class="full-width">
					<a href="./Ciudades/index_ciu.php" class="full-width">
						<div class="navLateral-body-cl">
							<i class="zmdi zmdi-pin-drop"></i> <!-- Icono de Ciudad -->
						</div>
						<div class="navLateral-body-cr hide-on-tablet">
							Ciudades
						</div>
					</a>
				</li>
				<li class="full-width">
					<a href="./Departamentos/Index_dep.php" class="full-width">
						<div class="navLateral-body-cl">
							<i class="zmdi zmdi-city"></i> <!-- Icono de Departamento -->
						</div>
						<div class="navLateral-body-cr hide-on-tablet">
							Departamentos
						</div>
					</a>
				</li>

				<li class="full-width">
					<a href="./Tipos_de_proyectos/Formulario.php" class="full-width">
						<div class="navLateral-body-cl">
							<i class="zmdi zmdi-folder"></i> <!-- Icono de Proyecto -->
						</div>
						<div class="navLateral-body-cr hide-on-tablet">
							Tipos de Proyectos
						</div>
					</a>
				</li>

				<li class="full-width">
					<a href="./Investigacion/Index_invest.php" class="full-width">
						<div class="navLateral-body-cl">
							<i class="zmdi zmdi-search"></i> <!-- Icono de Investigación -->
						</div>
						<div class="navLateral-body-cr hide-on-tablet">
							Lineas de Investigación
						</div>
					</a>
				</li>

				<li class="full-width">
					<a href="./Semilleros/Index.php" class="full-width">
						<div class="navLateral-body-cl">
							<i class="zmdi zmdi-search"></i> <!-- Icono de Investigación -->
						</div>
						<div class="navLateral-body-cr hide-on-tablet">
							Semilleros de investigación
						</div>
					</a>
				</li>

				<li class="full-width">
					<a href="./programas_academicos/index.php" class="full-width">
						<div class="navLateral-body-cl">
							<i class="zmdi zmdi-library"></i> <!-- Icono de Programas Académicos -->
						</div>
						<div class="navLateral-body-cr hide-on-tablet">
							Programas Académicos
						</div>
					</a>
				</li>
			</ul>			

			</ul>
			
					
						<?php
							}
						?>	
						
<!----------------------------------------------------------------SECCIÓN DE ESTUDIANTE---------------------------------------------------------------->

					<?php
			if($_SESSION['tipo'] == 1){ //Numero 1 estudiante

				?>
         <br></br>
		<a href="./subir_archivos/formulario.php" class="full-width" style="color: black;">
			<div class="navLateral-body-cl" style="margin-top: 10px; display: inline-block; vertical-align: middle;">
				<i class="zmdi zmdi-upload" style="font-size: 24px; vertical-align: middle;"></i>
			</div>
			<div class="navLateral-body-cr hide-on-tablet" style="display: inline-block; vertical-align: middle; margin-top: 10px;">
				Envio del Proyecto
			</div>
		</a>

		<a href="./Proyectos/est_proyectos.php" class="full-width" style="color: black;">
    <div class="navLateral-body-cl" style="margin-top: 10px; display: inline-block; vertical-align: middle;">
        <i class="fas fa-search" style="font-size: 24px; vertical-align: middle;"></i> <!-- Icono de investigación -->
    </div>
    <div class="navLateral-body-cr hide-on-tablet" style="display: inline-block; vertical-align: middle; margin-top: 10px;">
        Envio del Proyecto #2
    </div>
		</a>



		<a href="#" class="full-width" style="color: black;">
			<div class="navLateral-body-cl" style="margin-top: 10px; display: inline-block; vertical-align: middle;">
				<i class="fas fa-chalkboard-teacher" style="font-size: 24px; vertical-align: middle;"></i>
			</div>
			<div class="navLateral-body-cr hide-on-tablet" style="display: inline-block; vertical-align: middle; margin-top: 10px;">
				Mi Tutor
			</div>
		</a>


			<a href="./change_pass/cambiarpass.php" class="full-width" style="color: black;">
				<div class="navLateral-body-cl" style="margin-top: 10px; display: inline-block; vertical-align: middle;">
					<i class="fas fa-key" style="font-size: 24px; vertical-align: middle;"></i> <!-- Cambiado a la clase del icono de cambio de contraseña -->
				</div>
				<div class="navLateral-body-cr hide-on-tablet" style="display: inline-block; vertical-align: middle; margin-top: 10px;">
					Cambiar Contraseña
				</div>
			</a>

			
			<?php
							}
						?>

<!----------------------------------------------------------------SECCIÓN DE PROFESOR---------------------------------------------------------------->

			<?php
			if($_SESSION['tipo'] == 2){ //Numero 2 profesor

				?>
			
					<li class="full-width">
						<a href="subir_archivos/lista_archivos_profesor.php" class="full-width">
							<div class="navLateral-body-cl">
								<i class="fas fa-book"></i> 
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								Visualizar Proyectos
							</div>
						</a>
					</li>

					

					<li class="full-width">
						<a href="./change_pass/cambiarpass.php" class="full-width">
							<div class="navLateral-body-cl">
								<i class="fas fa-key"></i> 
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								Cambiar Contraseña
							</div>
						</a>
					</li>


					<?php
							}
						?>		


	</section>
	<!-- pageContent -->

<!----------------------------------------------------------------CRUD ADMINISTRADOR--------------------------------------------------------------->

<?php
	if($_SESSION['tipo'] == 3){ //Numero 3 Admin

// Procesar datos del formulario cuando se envíe
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cedula = $_POST['cedulaAdmin'];
    $nombre = $_POST['NameAdmin'];
    $apellido = $_POST['LastNameAdmin'];
    $fechanacimiento = $_POST['fech_nacimiento_admin'];
    $telefono = $_POST['phoneAdmin'];
    $foto = $_FILES['fileToUpload']['name']; // Nombre del archivo de la imagen
    $email = $_POST['emailAdmin'];
    $estado = $_POST['estadoAdmin'];
    $password = $_POST['passwordAdmin'];
	$tipo_identificador = '3'; 
	$codigo_semillero = '1';


    // Insertar datos en la base de datos
    $sql = "INSERT INTO personas (documento_per, nombre_per, apellidos_per, fechanacimiento, telefono_per, foto_per, email_per, estado_per, password_per, codigo_tip, codigo_sem )
    VALUES ('$cedula', '$nombre', '$apellido', '$fechanacimiento', '$telefono', '$foto','$email','$estado', '$password', '$tipo_identificador', '$codigo_semillero')";
 // Insertar datos en la base de datos
 $sql = "INSERT INTO personas (documento_per, nombre_per, apellidos_per, fechanacimiento, telefono_per, foto_per, email_per, estado_per, password_per, codigo_tip, codigo_sem)
 VALUES ('$cedula', '$nombre', '$apellido', '$fechanacimiento', '$telefono', '$foto', '$email', '$estado', '$password', '$tipo_identificador', '$codigo_semillero')";

 if ($conn->query($sql) === TRUE) {
	 echo "Registro de profesor exitoso";
	 
	 $target_dir = "./fotos_perfil/"; // Directorio donde se almacenará la imagen
	 $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	 $uploadOk = 1;
	 $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

	 if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		 // El archivo se ha subido correctamente, ahora inserta la ruta en la base de datos
		 $ruta_imagen = $target_file;

		 $sql_update = "UPDATE personas SET foto_per = '$ruta_imagen' WHERE documento_per = '$cedula'"; // O INSERT INTO si es un nuevo registro

		 if ($conn->query($sql_update) === TRUE) {
			 echo "El archivo " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " ha sido subido y la ruta ha sido guardada en la base de datos.";
		 } else {
			 echo "Hubo un error al guardar la ruta en la base de datos: " . $conn->error;
		 }
	 } else {
		 echo "Lo siento, hubo un error al subir el archivo.";
	 }
 } else {
	 echo "Error en la inserción: " . $conn->error;
 }
}
}
?>


<?php
	if($_SESSION['tipo'] == 3){ //Numero 3 Admin
		?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulario</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
	<section class="full-width pageContent">
		<section class="full-width header-well">
		
		</section>
		<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
			<div class="mdl-tabs__tab-bar">
				<a href="#tabNewAdmin" class="mdl-tabs__tab is-active">Agregar un nuevo Administrador</a>
			</div>
			<div class="mdl-tabs__panel is-active" id="tabNewAdmin">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-primary text-center tittles">
								Nuevo Administrador
							</div>

						<div class="full-width panel-content">
								<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

							<div class="full-width panel-content">
								<form method="post">
									<div class="mdl-grid">
										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
											<h5 class="text-condensedLight">Información del Administrador</h5>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="number" pattern="-?[0-9]*(\.[0-9]+)?" id="cedulaAdmin" name="cedulaAdmin">
												<label class="mdl-textfield__label" for="cedulaAdmin">Documento</label>
												<span class="mdl-textfield__error">Invalid number</span>
											</div>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-záéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="NameAdmin" name="NameAdmin">
												<label class="mdl-textfield__label" for="NameAdmin">Nombre</label>
												<span class="mdl-textfield__error">Invalid name</span>
											</div>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="text" pattern="-?[A-Za-záéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="LastNameAdmin" name="LastNameAdmin">
												<label class="mdl-textfield__label" for="LastNameAdmin">Apellido</label>
												<span class="mdl-textfield__error">Invalid last name</span>
											</div>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="date" id="fech_nacimiento_admin" name="fech_nacimiento_admin">
												<label class="mdl-textfield__label" for="fech_nacimiento_admin"></label>
											</div>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="tel" pattern="-?[0-9+()- ]*(\.[0-9]+)?" id="phoneAdmin" name="phoneAdmin">
												<label class="mdl-textfield__label" for="phoneAdmin">Telefono</label>
												<span class="mdl-textfield__error">Invalid phone number</span>
											</div>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
											<input class="mdl-textfield__input" type="email" id="emailAdmin" name="emailAdmin">
												<label class="mdl-textfield__label" for="emailAdmin">Correo Electronico</label>
												<span class="mdl-textfield__error">Invalid E-mail</span>
											</div>
											
										</div>
										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
											<h5 class="text-condensedLight">Detalles de la cuenta</h5>

											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
													<label class="mdl-textfield__label" for="estadoAdmin">Estado</label>
													<select class="mdl-textfield__input" id="estadoAdmin" name="estadoAdmin">
														<option value="Activo">Activo</option>
														<option value="Inactivo">Inactivo</option>
													</select>
													<span class="mdl-textfield__error">Nombre de usuario inválido</span>
												</div>

											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
											<input class="mdl-textfield__input" type="password" id="passwordAdmin" name="passwordAdmin">
												<label class="mdl-textfield__label" for="passwordAdmin">Contraseña</label>
												<span class="mdl-textfield__error">Invalid password</span>
											</div>

											<style>

														body, html {
															height: 100%;
															margin: 0;
															display: flex;
															justify-content: center;
															align-items: center;
														}

														.container {
															text-align: center;
														}
													</style>
												</head>
												<body>
													<div class="container">
														<h3>Subir Foto de Perfil</h3>
														</form>
																<input type="file" name="fileToUpload" id="fileToUpload">
																<input type="submit" value="Enviar" name="submit">
															</form>
										</div>
									</div>
									</div>
									<p class="text-center">

									</p>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<?php
							}
						?>		

	</section>
</body>
</html>