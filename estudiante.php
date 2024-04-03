<?php
session_start();
include('conexion.php');
?>


<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Estudiante</title>
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
								<img src="./assets/img/avatar-female.png" alt="Avatar" class="img-responsive">
							<?php endif; ?>
						</figure>
				</div>
				<figcaption class="navLateral-body-cr hide-on-tablet">
					<span>
					Nombre: <?php echo $_SESSION['nombre'] ?> <br>
						<small>Rol: <?php echo $_SESSION['rol'] ?> </small>
					</span>
					</figcaption>
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
                <figure class="full-width" style="height: 77px;">
				<div class="navLateral-body-cl">
				<figure>
							<?php if(isset($_SESSION['imagen'])): ?>
								<img src="<?php echo $_SESSION['imagen']; ?>" alt="Avatar" class="img-responsive">
							<?php else: ?>
								<img src="./assets/img/avatar-female.png" alt="Avatar" class="img-responsive">
							<?php endif; ?>
				</div>
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
            
<!----------------------------------------------------------------OPCIONES ESTUDIANTE---------------------------------------------------------------->          
            
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
						<a href="./subir_archivos/lista_archivos.php" class="full-width">
							<div class="navLateral-body-cl">
								<i class="fas fa-book"></i> 
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								Visualizar Proyectos
							</div>
						</a>

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
				</li>			

			</ul>			
			
			</ul>			

                    </li>    
                </ul>
            </nav>
        </div>
    </section>

<!----------------------------------------------------------------CRUD ESTUDIANTE---------------------------------------------------------------->

