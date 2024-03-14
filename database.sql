CREATE TABLE programas (
  codigo_pro integer PRIMARY KEY,
  nombre_pro varchar(80)
);

CREATE TABLE semilleros (
  codigo_sem integer PRIMARY KEY,
  nombre_sem varchar(80),
  fechacreacion_sem date,
  estado_sem char(10),
  codigo_pro integer
);

CREATE TABLE personas (
  documento_per varchar(15) PRIMARY KEY,
  nombre_per varchar(30),
  apellidos_per varchar(30),
  fechanacimiento date,
  email_per varchar(100),
  telefono_per varchar(15),
  foto_per varchar(100),
  estado_per char(10),
  password_per varchar(50),
  codigo_tip integer,
  codigo_sem integer
);

CREATE TABLE tipopersonas (
  codigo_tip integer PRIMARY KEY,
  nombre_tip varchar(100)
);

CREATE TABLE lineas (
  codigo_lin integer PRIMARY KEY,
  nombre_lin varchar(100),
  estado_lin char(10),
  codigo_sem integer
);

CREATE TABLE proyectos (
  codigo_pro integer PRIMARY KEY,
  tiutlo_pro varchar(150),
  estado_pro char(10),
  anio_pro integer,
  mes_pro integer,
  palabras_pro varchar(150),
  codigo_ciu integer,
  duracion_pro integer,
  codigo_tip_pro integer,
  horassemanalider_pro integer,
  resumen varchar(700),
  planteamientoproblema varchar(999),
  justificacion varchar(999),
  preguntainvestigacion varchar(200),
  marcoteorico varchar(999),
  estadoarte varchar(999),
  objetivogeneral varchar(200),
  objetivosespecificos varchar(800),
  metodologia varchar(999),
  cronograma varchar(999),
  resultadosProductos varchar(999),
  bibliografia varchar(999),
  presupuesto varchar(999),
  gastosprofesores varchar(999),
  gastosequipos varchar(999),
  gastossoftware varchar(999),
  gastosviajes varchar(999),
  gastosplanformacion varchar(999),
   rutaarchivo_pro varchar(100)

);

CREATE TABLE tipoproyectos (
  codigo_tip_pro integer PRIMARY KEY,
  nombre_tip_pro varchar(50)
);

CREATE TABLE estudiantes_proyectos (
  ide_est_pro integer PRIMARY KEY,
  codigo_pro integer,
  documento_per varchar(15),
  rol_est_pro integer,
  horassemana integer,
  semestreacademico integer,
  promedio float,
  mesessemillero integer
);

CREATE TABLE departamentos (
  codigo_dep integer PRIMARY KEY,
  nombre_dep varchar(70)
);

CREATE TABLE ciudades (
  codigo_ciu integer PRIMARY KEY,
  nombre_ciu varchar(70),
  codigo_dep integer
);

CREATE TABLE menu (
  codigo_men integer PRIMARY KEY,
  nombre_men varchar(70)
);

CREATE TABLE permisos (
  codigo_per integer PRIMARY KEY,
  codigo_men integer,
  codigo_tip integer,
  acceso boolean
);

ALTER TABLE semilleros ADD FOREIGN KEY (codigo_pro) REFERENCES programas (codigo_pro);

ALTER TABLE lineas ADD FOREIGN KEY (codigo_sem) REFERENCES semilleros (codigo_sem);

ALTER TABLE personas ADD FOREIGN KEY (codigo_tip) REFERENCES tipopersonas (codigo_tip);

ALTER TABLE personas ADD FOREIGN KEY (codigo_sem) REFERENCES semilleros (codigo_sem);

ALTER TABLE ciudades ADD FOREIGN KEY (codigo_dep) REFERENCES departamentos (codigo_dep);

ALTER TABLE estudiantes_proyectos ADD FOREIGN KEY (documento_per) REFERENCES personas (documento_per);

ALTER TABLE estudiantes_proyectos ADD FOREIGN KEY (codigo_pro) REFERENCES proyectos (codigo_pro);

ALTER TABLE proyectos ADD FOREIGN KEY (codigo_ciu) REFERENCES ciudades (codigo_ciu);

ALTER TABLE proyectos ADD FOREIGN KEY (codigo_tip_pro) REFERENCES tipoproyectos (codigo_tip_pro);

ALTER TABLE permisos ADD FOREIGN KEY (codigo_men) REFERENCES menu (codigo_men);

ALTER TABLE permisos ADD FOREIGN KEY (codigo_tip) REFERENCES tipopersonas (codigo_tip);