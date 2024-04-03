
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
    <link rel="stylesheet" href="admin.css">
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
								<img src="./assets/img/avatar-female.png" alt="Avatar" class="img-responsive">
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
								<img src="./assets/img/avatar-female.png" alt="Avatar" class="img-responsive">
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

			<script>
				function cargarPagina(url) {
				document.getElementById("iframeContenedor").src = url;
				}
			</script>

			<nav class="full-width">
    <ul class="full-width list-unstyle menu-principal">
        <li class="full-width">
            <a href="#" onclick="cargarPagina('home.php'); return false;" class="full-width">
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
            <a href="#" class="full-width btn-subMenu">
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
                    <a href="#" onclick="cargarPagina('registro_usuarios/administrador.php'); return false;" class="full-width">
                        <div class="navLateral-body-cl">
                            <i class="zmdi zmdi-account"></i>
                        </div>
                        <div class="navLateral-body-cr hide-on-tablet">
                            ADMINISTRADOR
                        </div>
                    </a>
                </li>
                <li class="full-width">
                    <a href="#" onclick="cargarPagina('registro_usuarios/profesores.php'); return false;" class="full-width">
                        <div class="navLateral-body-cl">
                            <i class="zmdi zmdi-accounts"></i>
                        </div>
                        <div class="navLateral-body-cr hide-on-tablet">
                            PROFESORES
                        </div>
                    </a>
                </li>
                <li class="full-width">
                    <a href="#" onclick="cargarPagina('registro_usuarios/estudiantes.php'); return false;" class="full-width">
                        <div class="navLateral-body-cl">
                            <i class="zmdi zmdi-accounts"></i>
                        </div>
                        <div class="navLateral-body-cr hide-on-tablet">
                            ESTUDIANTES
                        </div>
                    </a>
                </li>
            </ul>
        </li>
		
						<li class="full-width">
						<a href="#" onclick="cargarPagina('subir_archivos/lista_archivos.php'); return false;" class="full-width">
							<div class="navLateral-body-cl">
								<i class="fas fa-book"></i>
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								Visualizar Proyectos
							</div>
						</a>
						</li>

        <li class="full-width">
            <a href="#" onclick="cargarPagina('./change_pass/cambiarpass.php'); return false;" class="full-width">
                <div class="navLateral-body-cl">
                    <i class="fas fa-key"></i> 
                </div>
                <div class="navLateral-body-cr hide-on-tablet">
                    Cambiar Contraseña
                </div>
            </a>
        </li>
					
<li class="full-width">
    <a href="#" onclick="cargarPagina('informe_prof.php'); return false;" class="full-width">
        <div class="navLateral-body-cl">
            <i class="fas fa-file-alt"></i>
        </div>
        <div class="navLateral-body-cr hide-on-tablet">
            Generar listado de Profesorres
        </div>
    </a>
</li>

<li class="full-width">
    <a href="#" onclick="cargarPagina('informe_estu.php'); return false;" class="full-width">
        <div class="navLateral-body-cl">
            <i class="fas fa-file-alt"></i>
        </div>
        <div class="navLateral-body-cr hide-on-tablet">
            Generar listado de Estudiantes
        </div>
    </a>
</li>

<li class="full-width">
    <a href="#" onclick="cargarPagina('CRUD/Tabla_usuarios.php'); return false;" class="full-width">
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
    <a href="#" class="full-width btn-subMenu">
        <div class="navLateral-body-cl">
            <i class="zmdi zmdi-folder"></i>
        </div>
        <div class="navLateral-body-cr hide-on-tablet">
            Información Proyectos
        </div>
        <span class="zmdi zmdi-chevron-left"></span>
    </a>

    <ul class="full-width menu-principal sub-menu-options">
        <li class="full-width">
            <a href="#" onclick="cargarPagina('./Ciudades/index_ciu.php'); return false;" class="full-width">
                <div class="navLateral-body-cl">
                    <i class="zmdi zmdi-pin-drop"></i>
                </div>
                <div class="navLateral-body-cr hide-on-tablet">
                    Ciudades
                </div>
            </a>
        </li>
        <li class="full-width">
            <a href="#" onclick="cargarPagina('./Departamentos/Index_dep.php'); return false;" class="full-width">
                <div class="navLateral-body-cl">
                    <i class="zmdi zmdi-city"></i>
                </div>
                <div class="navLateral-body-cr hide-on-tablet">
                    Departamentos
                </div>
            </a>
        </li>
        <li class="full-width">
            <a href="#" onclick="cargarPagina('./Tipos_de_proyectos/Formulario.php'); return false;" class="full-width">
                <div class="navLateral-body-cl">
                    <i class="zmdi zmdi-folder"></i>
                </div>
                <div class="navLateral-body-cr hide-on-tablet">
                    Tipos de Proyectos
                </div>
            </a>
        </li>
        <li class="full-width">
            <a href="#" onclick="cargarPagina('./Investigacion/Index_invest.php'); return false;" class="full-width">
                <div class="navLateral-body-cl">
                    <i class="zmdi zmdi-search"></i>
                </div>
                <div class="navLateral-body-cr hide-on-tablet">
                    Lineas de Investigación
                </div>
            </a>
        </li>
        <li class="full-width">
            <a href="#" onclick="cargarPagina('./Semilleros/Index.php'); return false;" class="full-width">
                <div class="navLateral-body-cl">
                    <i class="zmdi zmdi-search"></i>
                </div>
                <div class="navLateral-body-cr hide-on-tablet">
                    Semilleros de investigación
                </div>
            </a>
        </li>
        <li class="full-width">
            <a href="#" onclick="cargarPagina('./programas_academicos/index.php'); return false;" class="full-width">
                <div class="navLateral-body-cl">
                    <i class="zmdi zmdi-library"></i>
                </div>
                <div class="navLateral-body-cr hide-on-tablet">
                    Programas Académicos
                </div>
            </a>
        </li>
    </ul>
</li>			
						<?php
							}
						?>	
						
<!----------------------------------------------------------------SECCIÓN DE ESTUDIANTE---------------------------------------------------------------->

					<?php
			if($_SESSION['tipo'] == 1){ //Numero 1 estudiante

				?>
                <script>
				function cargarPagina(url) {
				document.getElementById("iframeContenedor").src = url;
				}
			</script>

         <br></br>
         <a href="#" onclick="cargarPagina('./subir_archivos/formulario.php'); return false;" class="full-width" style="color: black;">
    <div class="navLateral-body-cl" style="margin-top: 10px; display: inline-block; vertical-align: middle;">
        <i class="zmdi zmdi-upload" style="font-size: 24px; vertical-align: middle;"></i>
    </div>
    <div class="navLateral-body-cr hide-on-tablet" style="display: inline-block; vertical-align: middle; margin-top: 10px;">
        Envio del Proyecto
    </div>
        </a>


		<a href="#" onclick="cargarPagina('./Proyectos/est_proyectos.php'); return false;" class="full-width" style="color: black;">
    <div class="navLateral-body-cl" style="margin-top: 10px; display: inline-block; vertical-align: middle;">
        <i class="fas fa-search" style="font-size: 24px; vertical-align: middle;"></i>
    </div>
    <div class="navLateral-body-cr hide-on-tablet" style="display: inline-block; vertical-align: middle; margin-top: 10px;">
        Envio del Proyecto #2
    </div>
        </a>


		<a href="#" onclick="cargarPagina('#'); return false;" class="full-width" style="color: black;">
    <div class="navLateral-body-cl" style="margin-top: 10px; display: inline-block; vertical-align: middle;">
        <i class="fas fa-chalkboard-teacher" style="font-size: 24px; vertical-align: middle;"></i>
    </div>
    <div class="navLateral-body-cr hide-on-tablet" style="display: inline-block; vertical-align: middle; margin-top: 10px;">
        Mi Tutor
    </div>
        </a>



        <a href="#" onclick="cargarPagina('./change_pass/cambiarpass.php'); return false;" class="full-width" style="color: black;">
    <div class="navLateral-body-cl" style="margin-top: 10px; display: inline-block; vertical-align: middle;">
        <i class="fas fa-key" style="font-size: 24px; vertical-align: middle;"></i>
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
			
            <script>
				function cargarPagina(url) {
				document.getElementById("iframeContenedor").src = url;
				}
			</script>

                    <li class="full-width">
                <a href="#" onclick="cargarPagina('subir_archivos/lista_archivos_profesor.php'); return false;" class="full-width">
                    <div class="navLateral-body-cl">
                        <i class="fas fa-book"></i> 
                    </div>
                    <div class="navLateral-body-cr hide-on-tablet">
                        Visualizar Proyectos
                    </div>
                </a>
            </li>


             <li class="full-width">
                <a href="#" onclick="cargarPagina('./change_pass/cambiarpass.php'); return false;" class="full-width">
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
<iframe id="iframeContenedor" src="" frameborder="0" width="100%" height="100%"></iframe>